<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReservaFormRequest;
use App\Models\Reserva;
use Barryvdh\DomPDF\Facade\Pdf;
use DateTime;
use Illuminate\Http\Request;

class ReservaController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index(Request $request)
    {
        
        $filter = $request->filter;

        $search = $request->search;
        
        $data = explode('/', $search);
        //garante que o array possue tres elementos (dia, mes e ano)
        if (count($data) == 3) {
            $dia = (int)$data[0];
            $mes = (int)$data[1];
            $ano = (int)$data[2];

            //testa se a data é válida
            if (checkdate($mes, $dia, $ano)) {
                $search = str_replace('/', '-', $search);
                $search = date("Y-m-d", strtotime($search));
            }
        }

        $reservas = Reserva::where(function ($query) use ($search) {
            if ($search) {
                $query->where("nome", 'LIKE', "%{$search}%");
                $query->orwhere("valor_pago", 'LIKE', "%{$search}%");
                $query->orwhere("valor_pendente", 'LIKE', "%{$search}%");
                $query->orwhere("valor_total", 'LIKE', "%{$search}%");
                $query->orwhereDate("primeiro_dia", 'LIKE', "%{$search}%");
                $query->orwhereDate("ultimo_dia", 'LIKE', "%{$search}%");
            }
        })->orderBy('primeiro_dia', 'asc')
        ->where('primeiro_dia', '>=', date('Y-m-d'))
        ->paginate(12)->withQueryString();

        if ($filter === "Vencidas") {
            $reservas = Reserva::orderBy('primeiro_dia', 'asc')
            ->where('ultimo_dia', '<', date('Y-m-d'))
            ->paginate(12)->withQueryString();
        }
        if ($filter === "Todas") {
            $reservas = Reserva::orderBy('primeiro_dia', 'asc')
            ->paginate(12)->withQueryString();
        }
        if ($filter === "Hoje") {
            $reservas = Reserva::where('primeiro_dia', '=', date('Y-m-d'))
            ->orWhere('ultimo_dia', '=', date('Y-m-d'))->paginate();
        }


        return view('reservas.index', compact('reservas', 'search', 'filter'));
    }


    public function create()
    {

        return view('reservas.create');
    }

    public function store(Request $request)
    {

        $rules = [
            'nome' => 'required|string|min:4|max:30',
            'numero' => 'nullable|string|min:15',
            'primeiro_dia' => "required|unique:reservas,primeiro_dia|unique:reservas,ultimo_dia",
            'ultimo_dia' => "required|unique:reservas,primeiro_dia|unique:reservas,ultimo_dia",
            'valor_pago' => 'required',
            'valor_total' => 'required|gte:valor_pago',
        ];

        $data = $request->except('primeiro_dia', 'ultimo_dia');

        $data['primeiro_dia'] = str_replace('/', '-', $request->primeiro_dia);
        $data['primeiro_dia'] = date("Y-m-d", strtotime($data['primeiro_dia']));

        $data['ultimo_dia'] = str_replace('/', '-', $request->ultimo_dia);
        $data['ultimo_dia'] = date("Y-m-d", strtotime($data['ultimo_dia']));

        $validator = validator()->make($data, $rules);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

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

    public function update(Request $request, $id)
    {

        if (!$reserva = Reserva::find($id)) {
            return redirect()->route('reservas');
        }

        $rules = [
            'nome' => 'required|string|min:4|max:30',
            'numero' => 'nullable|string|min:15',
            'primeiro_dia' => "required|unique:reservas,primeiro_dia,$id,id|required|unique:reservas,ultimo_dia,$id,id",
            'ultimo_dia' =>  "required|unique:reservas,primeiro_dia,$id,id|required|unique:reservas,ultimo_dia,$id,id",
            'valor_pago' => 'required',
            'valor_total' => 'required|gte:valor_pago',
        ];

        $data = $request->except('primeiro_dia', 'ultimo_dia');

        $data['primeiro_dia'] = str_replace('/', '-', $request->primeiro_dia);
        $data['primeiro_dia'] = date("Y-m-d", strtotime($data['primeiro_dia']));

        $data['ultimo_dia'] = str_replace('/', '-', $request->ultimo_dia);
        $data['ultimo_dia'] = date("Y-m-d", strtotime($data['ultimo_dia']));

        $validator = validator()->make($data, $rules);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

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

    public function exportar(Request $request)
    {

        $mes = $request->mes;

        $reservados = Reserva::where('primeiro_dia', 'LIKE', "%$mes%")->orWhere('ultimo_dia', 'LIKE', "%$mes%")->get();

        $dataInicio = new DateTime("$mes-1");
        $dataFim = new DateTime("$mes-31");

        $dias = array();
        //cria um array do dia 1 ao dia 31 do mês da $request
        while ($dataInicio <= $dataFim) {
            $dias[] = $dataInicio->format('Y-m-d');
            $dataInicio = $dataInicio->modify('+1day');
        }

        //remove os dias ja reservado do array
        foreach ($dias as $key => $dia) {
            foreach ($reservados as $reservado) {
                if ($dia == $reservado->primeiro_dia || $dia == $reservado->ultimo_dia) {
                    unset($dias[$key]);
                }
            }
        }
        $dias = array_values($dias);

        $pdf = Pdf::loadView('reservas.pdf', ['dias' => $dias, 'mes' => $mes]);

        return $pdf->stream('dias_livres.pdf');
    }
}
