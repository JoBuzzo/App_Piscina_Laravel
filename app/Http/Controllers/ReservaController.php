<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReservaFormRequest;
use App\Models\Config;
use App\Models\Reserva;
use Illuminate\Http\Request;

class ReservaController extends Controller
{
    public function index(){

        $reservas = Reserva::all();
        $nao_pago = 0;
        $entrada = 0;
        $completo = 0;
        $datas = 0;
        $totalTodos = 0;

        $janeiro = 0;
        $fevereiro = 0;
        $marco = 0;
        $abril = 0;
        $maio = 0;
        $junho = 0;
        $julho = 0;
        $agosto = 0;
        $setembro = 0;
        $outubro = 0;
        $novembro = 0;
        $dezembro = 0;
        $totalAno = 0;

        $ano = date('Y');

        foreach ($reservas as $reserva) {
            if($reserva->pagamento === "Não-Pago"){
                $nao_pago ++;
                $totalTodos+=$reserva->valor;
            }
            if($reserva->pagamento === "Entrada"){
                $entrada ++;
                $totalTodos+=$reserva->valor;
            }
            if($reserva->pagamento === "Completo"){
                $completo ++;
                $totalTodos+=$reserva->valor;
            }
            if($reserva->primeiro_dia){
                $datas ++;
            }
            if($reserva->ultimo_dia){
                $datas ++;
            }

            switch($reserva->primeiro_dia){
                case ((date('m', strtotime($reserva->primeiro_dia)) == 1) && (date('Y', strtotime($reserva->primeiro_dia)) == $ano)) :
                    $janeiro+= $reserva->valor;
                    $totalAno+= $reserva->valor;
                break;
                case ((date('m', strtotime($reserva->primeiro_dia)) == 2)  && (date('Y', strtotime($reserva->primeiro_dia)) == $ano)) :
                    $fevereiro+= $reserva->valor;
                    $totalAno+= $reserva->valor;
                break;
                case ((date('m', strtotime($reserva->primeiro_dia)) == 3)  && (date('Y', strtotime($reserva->primeiro_dia)) == $ano)) :
                    $marco+= $reserva->valor;
                    $totalAno+= $reserva->valor;
                break;
                case ((date('m', strtotime($reserva->primeiro_dia)) == 4)  && (date('Y', strtotime($reserva->primeiro_dia)) == $ano)) :
                    $abril+= $reserva->valor;
                    $totalAno+= $reserva->valor;
                break;
                case ((date('m', strtotime($reserva->primeiro_dia)) == 5)  && (date('Y', strtotime($reserva->primeiro_dia)) == $ano)) :
                    $maio+= $reserva->valor;
                    $totalAno+= $reserva->valor;
                break;
                case ((date('m', strtotime($reserva->primeiro_dia)) == 6)  && (date('Y', strtotime($reserva->primeiro_dia)) == $ano)) :
                    $junho+= $reserva->valor;
                    $totalAno+= $reserva->valor;
                break;
                case ((date('m', strtotime($reserva->primeiro_dia)) == 7)  && (date('Y', strtotime($reserva->primeiro_dia)) == $ano)) :
                    $julho+= $reserva->valor;
                    $totalAno+= $reserva->valor;
                break;
                case ((date('m', strtotime($reserva->primeiro_dia)) == 8)  && (date('Y', strtotime($reserva->primeiro_dia)) == $ano)) :
                    $agosto+= $reserva->valor;
                    $totalAno+= $reserva->valor;
                break;
                case ((date('m', strtotime($reserva->primeiro_dia)) == 9)  && (date('Y', strtotime($reserva->primeiro_dia)) == $ano)) :
                    $setembro+= $reserva->valor;
                    $totalAno+= $reserva->valor;
                break;
                case ((date('m', strtotime($reserva->primeiro_dia)) == 10)  && (date('Y', strtotime($reserva->primeiro_dia)) == $ano)) :
                    $outubro+= $reserva->valor;
                    $totalAno+= $reserva->valor;
                break;
                case ((date('m', strtotime($reserva->primeiro_dia)) == 11)  && (date('Y', strtotime($reserva->primeiro_dia)) == $ano)) :
                    $novembro+= $reserva->valor;
                    $totalAno+= $reserva->valor;
                break;
                case ((date('m', strtotime($reserva->primeiro_dia)) == 12)  && (date('Y', strtotime($reserva->primeiro_dia)) == $ano)) :
                    $dezembro+= $reserva->valor;
                    $totalAno+= $reserva->valor;
                break;
            }
        }
        
        $reservas = count($reservas);


        return 
        view('index',compact(
            'reservas','totalTodos', 'totalAno','datas','nao_pago','entrada', 'completo',
            'janeiro','fevereiro','marco','abril','maio','junho','julho','agosto','setembro','outubro','novembro','dezembro',
            'ano'
        ));
    }

    public function config(Request $request){
        if(!$config = Config::find(1)){
            return redirect()->back('reservas');
        }
            
        $config->update([
            'nao_pago' => $request->nao_pago = 0,
            'entrada_um' => $request->entrada_um,
            'entrada_dois' => $request->entrada_dois,
            'completo_um' => $request->completo_um,
            'completo_dois' => $request->completo_dois,
        ]);
        return redirect()->route('viewConfig');

    }

    public function viewConfig(){
        if(!$config = Config::find(1)){
            Config::create([
                'nao_pago' => $nao_pago = 0,
                'entrada_um' => $entrada_um = 200 ,
                'entrada_dois' => $entrada_dois = 350,
                'completo_um' => $completo_um = 400,
                'completo_dois' => $completo_dois = 700,
            ]);
        return redirect()->route('viewConfig');
        
        }
        return view('config' ,compact('config'));
    }

    public function reservas(Request $request){
        
        $search = $request->search;

        $reservas = Reserva::where(function ($query) use ($search) {
            if($search){
                $query->where("primeiro_dia",'LIKE', "%{$search}%");
                $query->orWhere('ultimo_dia', 'LIKE', "%{$search}%");
            }
        })->paginate(8)->withQueryString();

        if(!$search){
            $reservas = Reserva::orderBy('primeiro_dia', 'asc')->paginate(8)->withQueryString();
        }

        return view('reservas', compact('reservas','search'));
    }


    public function adicionar(){
        return view('adicionar');
    }

    public function store(ReservaFormRequest $request){

        $config = Config::find(1);

        if($request->pagamento === "Não-Pago"){
            $valor = $config->nao_pago;
        }

        if(($request->pagamento === "Entrada") && ($request->ultimo_dia === null)){
            $valor = $config->entrada_um;
        }else if(($request->pagamento === "Entrada") && !($request->ultimo_dia === null)){
            $valor = $config->entrada_dois;
        }

        if(($request->pagamento === "Completo") && ($request->ultimo_dia === null)){
            $valor = $config->completo_um;
        }else if(($request->pagamento === "Completo") && !($request->ultimo_dia === null)){
            $valor = $config->completo_dois;
        }
        
        Reserva::create([
            'nome' => $request->nome,
            'primeiro_dia' => $request->primeiro_dia,
            'ultimo_dia' => $request->ultimo_dia,
            'pagamento' => $request->pagamento,
            'valor' => $valor,
        ]);

        return redirect()->route('reservas');
    }

    public function edit($id){
        if(!$reserva =  Reserva::find($id)){
            return redirect()->back('reservas');
        }
        return view('ver' ,compact('reserva'));
    }

    public function update(ReservaFormRequest $request, $id){

        
        if(!$reserva = Reserva::find($id)){
            return redirect()->route('reservas');
        }

        $config = Config::find(1);

        if($request->pagamento === "Não-Pago"){
            $valor = $config->nao_pago;
        }

        if(($request->pagamento === "Entrada") && ($request->ultimo_dia === null)){
            $valor = $config->entrada_um;
        }else if(($request->pagamento === "Entrada") && !($request->ultimo_dia === null)){
            $valor = $config->entrada_dois;
        }

        if(($request->pagamento === "Completo") && ($request->ultimo_dia === null)){
            $valor = $config->completo_um;
        }else if(($request->pagamento === "Completo") && !($request->ultimo_dia === null)){
            $valor = $config->completo_dois;
        }

        $reserva->update([
            'nome' => $request->nome,
            'primeiro_dia' => $request->primeiro_dia,
            'ultimo_dia' => $request->ultimo_dia,
            'pagamento' => $request->pagamento,
            'valor' => $valor,
        ]);

        return redirect()->route('reservas');   
    }

    public function destroy($id){

        if(!$reserva = Reserva::find($id)){
            return redirect()->route('reservas');
        }
    
    $reserva->delete();
    
    return redirect()->route('reservas');
    }
}
