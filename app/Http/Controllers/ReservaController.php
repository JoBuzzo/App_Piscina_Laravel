<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReservaFormRequest;
use App\Models\Reserva;
use Illuminate\Http\Request;

class ReservaController extends Controller
{
 
    public function __construct()
    {
        $this->middleware('admin');
    }
    
    public function index(Request $request)
    {

        $search = $request->search;
        $filter = $request->filter;
        $reservas = Reserva::where(function ($query) use ($search) {
            if ($search) {
                $query->where("nome", 'LIKE', "%{$search}%");
                $query->orwhere("valor_pago", 'LIKE', "%{$search}%");
                $query->orwhere("valor_pendente", 'LIKE', "%{$search}%");
                $query->orwhere("valor_total", 'LIKE', "%{$search}%");
                $query->orwhereDate("primeiro_dia", 'LIKE', "%{$search}%");
                $query->orwhereDate("ultimo_dia", 'LIKE', "%{$search}%");
            }
        })->paginate(12)->withQueryString();

        $date = date('Y-m-d');
        if (!$search) {
            $reservas = Reserva::orderBy('primeiro_dia', 'asc')->where('primeiro_dia', '>=', "$date")->paginate(12)->withQueryString();
        }

        if ($filter === "Vencidas") {
            $reservas = Reserva::orderBy('primeiro_dia', 'asc')->where('primeiro_dia', '<', "$date")->paginate(12)->withQueryString();
        }
        if ($filter === "Todas") {
            $reservas = Reserva::orderBy('primeiro_dia', 'asc')->paginate(12)->withQueryString();
        }
        if ($filter === "Hoje") {
            $reservas = Reserva::where('primeiro_dia', '=', "$date")->orWhere('ultimo_dia', '=', "$date")->paginate();
        }


        return view('reservas.index', compact('reservas', 'search', 'filter'));
    }


    public function create()
    {

        return view('reservas.create');
    }

    public function store(ReservaFormRequest $request)
    {

        $data = $request->only('nome', 'numero', 'primeiro_dia', 'ultimo_dia', 'valor_pago', 'valor_total');

        $data['primeiro_dia'] = str_replace('/', '-', $data['primeiro_dia']);
        $data['primeiro_dia'] = date("Y-m-d", strtotime($data['primeiro_dia']));
        
        $data['ultimo_dia'] = str_replace('/', '-', $data['ultimo_dia']);
        $data['ultimo_dia'] = date("Y-m-d", strtotime($data['ultimo_dia']));

        $pendente = $data['valor_total'] - $data['valor_pago'];

        $data['valor_pendente'] = $pendente;

        Reserva::create($data);

        

        return redirect()->route('reservas.index')->with('sucesso', "A reserva de {$data['nome']} foi cadastrada com Sucesso!");
    }

    public function edit($id)
    {
        if (!$reserva =  Reserva::find($id)) {
            return redirect()->route('reservas.index')->with('erro', 'Reserva não encontrada.');
        }
        $reserva->primeiro_dia = date("d/m/Y", strtotime($reserva->primeiro_dia));
        $reserva->ultimo_dia = date("d/m/Y", strtotime($reserva->ultimo_dia));

        return view('reservas.edit', compact('reserva'));
    }

    public function update(ReservaFormRequest $request, $id)
    {

        if (!$reserva = Reserva::find($id)) {
            return redirect()->route('reservas');
        }


        $data = $request->only('nome', 'numero', 'primeiro_dia', 'ultimo_dia', 'valor_pago', 'valor_total');

        $data['primeiro_dia'] = str_replace('/', '-', $data['primeiro_dia']);
        $data['primeiro_dia'] = date('Y-m-d', strtotime($data['primeiro_dia']));

        $data['ultimo_dia'] = str_replace('/', '-', $data['ultimo_dia']);
        $data['ultimo_dia'] = date("Y-m-d", strtotime($data['ultimo_dia']));

        $pendente = $data['valor_total'] - $data['valor_pago'];

        $data['valor_pendente'] = $pendente;

        $reserva->update($data);

        return redirect()->route('reservas.edit', $id)->with('sucesso', 'Editado com Sucesso!');
    }

    public function destroy($id)
    {

        if (!$reserva = Reserva::find($id)) {
            return redirect()->route('reservas');
        }
        $nome = $reserva->nome;
        $reserva->delete();

        return redirect()->route('reservas.index')->with('sucesso', "A Reserva de $nome foi excluído com Sucesso!");
    }
}
