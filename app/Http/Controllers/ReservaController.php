<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConfigFormRequest;
use App\Http\Requests\ReservaFormRequest;
use App\Models\Config;
use App\Models\Reserva;
use Illuminate\Http\Request;

class ReservaController extends Controller
{
    public function index(Request $request){

        $reservas = Reserva::all();

        // quantidades de opções de paamento (Gráfico de pizza)
        $nao_pago = 0;
        $entrada = 0;
        $completo = 0;

        $datas = 0; //todas datas reservadas (card)
        $totalTodos = 0; //total de ganhos de todos os anos (card)

        //total de ganhos em cada mes (grafico de barras)
        $mes['janeiro'] = 0; //1
        $mes['fevereiro'] = 0; //2
        $mes['marco'] = 0; //3
        $mes['abril'] = 0; //4
        $mes['maio'] = 0; //5
        $mes['junho'] = 0; //6
        $mes['julho'] = 0; //7
        $mes['agosto'] = 0; //8
        $mes['setembro'] = 0; //9
        $mes['outubro'] = 0; //10
        $mes['novembro'] = 0; //11
        $mes['dezembro'] = 0; //12

        $totalAno = 0; //total de ganhos do ano atual

        $ano = date('Y'); //ano atual

        if($request->ano){
            $ano = $request->ano;
        }
        
        foreach ($reservas as $reserva) {
            // Quantidade de datas reservadas
            if($reserva->primeiro_dia){
                $datas ++;
            }
            if($reserva->ultimo_dia){
                $datas ++;
            }
            
            // quantidades de opções de paamento (Gráfico de pizza)
            if($reserva->pagamento === "Não-Pago"){
                $nao_pago ++;
            }
            if($reserva->pagamento === "Entrada"){
                $entrada ++;
                $totalTodos+=$reserva->valor; //total de ganhos de todos os anos
            }
            if($reserva->pagamento === "Completo"){
                $completo ++;
                $totalTodos+=$reserva->valor; //total de ganhos de todos os anos
            }
            //total de ganhos em cada mes (grafico de barras) //total de ganhos do ano atual
            switch($reserva->primeiro_dia){
                case ((date('m', strtotime($reserva->primeiro_dia)) == 1) && (date('Y', strtotime($reserva->primeiro_dia)) == $ano)) :
                    $mes['janeiro']+= $reserva->valor;
                    $totalAno+= $reserva->valor;
                break;
                case ((date('m', strtotime($reserva->primeiro_dia)) == 2)  && (date('Y', strtotime($reserva->primeiro_dia)) == $ano)) :
                    $mes['fevereiro']+= $reserva->valor;
                    $totalAno+= $reserva->valor;
                break;
                case ((date('m', strtotime($reserva->primeiro_dia)) == 3)  && (date('Y', strtotime($reserva->primeiro_dia)) == $ano)) :
                    $mes['marco']+= $reserva->valor;
                    $totalAno+= $reserva->valor;
                break;
                case ((date('m', strtotime($reserva->primeiro_dia)) == 4)  && (date('Y', strtotime($reserva->primeiro_dia)) == $ano)) :
                    $mes['abril']+= $reserva->valor;
                    $totalAno+= $reserva->valor;
                break;
                case ((date('m', strtotime($reserva->primeiro_dia)) == 5)  && (date('Y', strtotime($reserva->primeiro_dia)) == $ano)) :
                    $mes['maio']+= $reserva->valor;
                    $totalAno+= $reserva->valor;
                break;
                case ((date('m', strtotime($reserva->primeiro_dia)) == 6)  && (date('Y', strtotime($reserva->primeiro_dia)) == $ano)) :
                    $mes['junho']+= $reserva->valor;
                    $totalAno+= $reserva->valor;
                break;
                case ((date('m', strtotime($reserva->primeiro_dia)) == 7)  && (date('Y', strtotime($reserva->primeiro_dia)) == $ano)) :
                    $mes['julho']+= $reserva->valor;
                    $totalAno+= $reserva->valor;
                break;
                case ((date('m', strtotime($reserva->primeiro_dia)) == 8)  && (date('Y', strtotime($reserva->primeiro_dia)) == $ano)) :
                    $mes['agosto']+= $reserva->valor;
                    $totalAno+= $reserva->valor;
                break;
                case ((date('m', strtotime($reserva->primeiro_dia)) == 9)  && (date('Y', strtotime($reserva->primeiro_dia)) == $ano)) :
                    $mes['setembro']+= $reserva->valor;
                    $totalAno+= $reserva->valor;
                break;
                case ((date('m', strtotime($reserva->primeiro_dia)) == 10)  && (date('Y', strtotime($reserva->primeiro_dia)) == $ano)) :
                    $mes['outubro']+= $reserva->valor;
                    $totalAno+= $reserva->valor;
                break;
                case ((date('m', strtotime($reserva->primeiro_dia)) == 11)  && (date('Y', strtotime($reserva->primeiro_dia)) == $ano)) :
                    $mes['novembro']+= $reserva->valor;
                    $totalAno+= $reserva->valor;
                break;
                case ((date('m', strtotime($reserva->primeiro_dia)) == 12)  && (date('Y', strtotime($reserva->primeiro_dia)) == $ano)) :
                    $mes['dezembro']+= $reserva->valor;
                    $totalAno+= $reserva->valor;
                break;
            }
        }

        $pagamentos['nao_pago'] = $nao_pago;
        $pagamentos['entrada'] = $entrada;
        $pagamentos['completo'] = $completo;

        return 
        view('index',compact('totalTodos', 'totalAno','datas','pagamentos','mes','ano'
        ));
    }

    public function config(ConfigFormRequest $request){
        $config = Config::find(1);
            
        $config->update([
            'nao_pago' => $request->nao_pago = 0,
            'entrada_um' => $request->entrada_um,
            'entrada_dois' => $request->entrada_dois,
            'completo_um' => $request->completo_um,
            'completo_dois' => $request->completo_dois,
        ]);
        return redirect()->route('viewConfig')->with('mensagem', 'Editado com Sucesso!');

    }

    public function viewConfig(){
        $config = Config::find(1);
        
        return view('config' ,compact('config'));
    }

    public function reservas(Request $request){
        

        $search = $request->search;
        $filter = $request->filter;
        $reservas = Reserva::where(function ($query) use ($search) {
            if($search){
                $query->where("nome",'LIKE', "%{$search}%");
                $query->orwhere("pagamento",'LIKE', "%{$search}%");
                $query->orwhere("valor",'LIKE', "%{$search}%");
                $query->orwhereDate("primeiro_dia",'LIKE', "%{$search}%");
                $query->orwhereDate("ultimo_dia",'LIKE', "%{$search}%");
            }
        })->paginate(12)->withQueryString();

        $date = date('Y-m-d');
        if(!$search){
            $reservas = Reserva::orderBy('primeiro_dia', 'asc')->where('primeiro_dia', '>=', "$date")->paginate(12)->withQueryString();
        }

        if( $filter === "Vencidas"){
            $reservas = Reserva::orderBy('primeiro_dia', 'asc')->where('primeiro_dia', '<', "$date")->paginate(12)->withQueryString();
        }
        if( $filter === "Todas"){
            $reservas = Reserva::orderBy('primeiro_dia', 'asc')->paginate(12)->withQueryString();
        }
        

        return view('reservas', compact('reservas','search', 'filter'));
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
        

        $data = $request->only('nome', 'primeiro_dia', 'ultimo_dia', 'pagamento');

        if($request->valor){
            $data['valor'] = $request->valor;
            Reserva::create($data);
        }else{
            Reserva::create([
                'nome' => $request->nome,
                'primeiro_dia' => $request->primeiro_dia,
                'ultimo_dia' => $request->ultimo_dia,
                'pagamento' => $request->pagamento,
                'valor' => $valor,
            ]);
        }

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


        $data = $request->only('nome', 'primeiro_dia', 'ultimo_dia');

        
        if($request->pagamento != $reserva->pagamento){
            $data['pagamento'] = $request->pagamento;

            if($request->pagamento === "Não-Pago"){
                $data['valor'] = $config->nao_pago;
            }

            if(($request->pagamento === "Entrada") && ($request->ultimo_dia === null)){
                $data['valor'] = $config->entrada_um;
            }else if(($request->pagamento === "Entrada") && !($request->ultimo_dia === null)){
                $data['valor'] = $config->entrada_dois;
            }

            if(($request->pagamento === "Completo") && ($request->ultimo_dia === null)){
                $data['valor'] = $config->completo_um;
            }else if(($request->pagamento === "Completo") && !($request->ultimo_dia === null)){
                $data['valor'] = $config->completo_dois;
            }

            if($request->valor != $reserva->valor){
                $data['valor'] = $request->valor;
            }

        }else{
            $data['valor'] = $request->valor;
        }
        
        $reserva->update($data);

        return redirect()->route('reservas.ver', ['id'=> $id]  )->with('mensagem', 'Editado com Sucesso!');   
    }

    public function destroy($id){

        if(!$reserva = Reserva::find($id)){
            return redirect()->route('reservas');
        }
    
        $reserva->delete();
    
        return redirect()->route('reservas');
    }
}
