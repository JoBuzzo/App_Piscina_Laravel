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
            
            //total de ganhos em cada mes (grafico de barras) //total de ganhos do ano atual
            switch($reserva->primeiro_dia){
                case ((date('m', strtotime($reserva->primeiro_dia)) == 1) && (date('Y', strtotime($reserva->primeiro_dia)) == $ano)) :
                    $mes['janeiro']+= $reserva->valor_pago;
                    $totalAno+= $reserva->valor_pago;
                break;
                case ((date('m', strtotime($reserva->primeiro_dia)) == 2)  && (date('Y', strtotime($reserva->primeiro_dia)) == $ano)) :
                    $mes['fevereiro']+= $reserva->valor_pago;
                    $totalAno+= $reserva->valor_pago;
                break;
                case ((date('m', strtotime($reserva->primeiro_dia)) == 3)  && (date('Y', strtotime($reserva->primeiro_dia)) == $ano)) :
                    $mes['marco']+= $reserva->valor_pago;
                    $totalAno+= $reserva->valor_pago;
                break;
                case ((date('m', strtotime($reserva->primeiro_dia)) == 4)  && (date('Y', strtotime($reserva->primeiro_dia)) == $ano)) :
                    $mes['abril']+= $reserva->valor_pago;
                    $totalAno+= $reserva->valor_pago;
                break;
                case ((date('m', strtotime($reserva->primeiro_dia)) == 5)  && (date('Y', strtotime($reserva->primeiro_dia)) == $ano)) :
                    $mes['maio']+= $reserva->valor_pago;
                    $totalAno+= $reserva->valor_pago;
                break;
                case ((date('m', strtotime($reserva->primeiro_dia)) == 6)  && (date('Y', strtotime($reserva->primeiro_dia)) == $ano)) :
                    $mes['junho']+= $reserva->valor_pago;
                    $totalAno+= $reserva->valor_pago;
                break;
                case ((date('m', strtotime($reserva->primeiro_dia)) == 7)  && (date('Y', strtotime($reserva->primeiro_dia)) == $ano)) :
                    $mes['julho']+= $reserva->valor_pago;
                    $totalAno+= $reserva->valor_pago;
                break;
                case ((date('m', strtotime($reserva->primeiro_dia)) == 8)  && (date('Y', strtotime($reserva->primeiro_dia)) == $ano)) :
                    $mes['agosto']+= $reserva->valor_pago;
                    $totalAno+= $reserva->valor_pago;
                break;
                case ((date('m', strtotime($reserva->primeiro_dia)) == 9)  && (date('Y', strtotime($reserva->primeiro_dia)) == $ano)) :
                    $mes['setembro']+= $reserva->valor_pago;
                    $totalAno+= $reserva->valor_pago;
                break;
                case ((date('m', strtotime($reserva->primeiro_dia)) == 10)  && (date('Y', strtotime($reserva->primeiro_dia)) == $ano)) :
                    $mes['outubro']+= $reserva->valor_pago;
                    $totalAno+= $reserva->valor_pago;
                break;
                case ((date('m', strtotime($reserva->primeiro_dia)) == 11)  && (date('Y', strtotime($reserva->primeiro_dia)) == $ano)) :
                    $mes['novembro']+= $reserva->valor_pago;
                    $totalAno+= $reserva->valor_pago;
                break;
                case ((date('m', strtotime($reserva->primeiro_dia)) == 12)  && (date('Y', strtotime($reserva->primeiro_dia)) == $ano)) :
                    $mes['dezembro']+= $reserva->valor_pago;
                    $totalAno+= $reserva->valor_pago;
                break;
            }
        }



        return view('index',compact('totalTodos', 'totalAno','datas','mes','ano'));
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
                $query->orwhere("valor_pago",'LIKE', "%{$search}%");
                $query->orwhere("valor_pendente",'LIKE', "%{$search}%");
                $query->orwhere("valor_total",'LIKE', "%{$search}%");
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
        $config = Config::find(1);
        return view('adicionar', compact('config'));
    }

    public function store(ReservaFormRequest $request){

        $data = $request->only('nome', 'primeiro_dia', 'ultimo_dia', 'valor_pago', 'valor_total');

        if($request->valor_pago === "OUTRO"){
            $data['valor_pago'] = $request->outrainst;
        }

        if($request->valor_total === "OUTRO"){
            $data['valor_total'] = $request->outraopcao;
        }


        $pendente = $data['valor_total'] - $data['valor_pago'];
        $data['valor_pendente'] = $pendente;
        Reserva::create($data);
        


        return redirect()->route('reservas');
    }

    public function edit($id){
        if(!$reserva =  Reserva::find($id)){
            return redirect()->back('reservas');
        }
        $config = Config::find(1);
        return view('ver' ,compact('reserva','config'));
    }

    public function update(ReservaFormRequest $request, $id){

        if(!$reserva = Reserva::find($id)){
            return redirect()->route('reservas');
        }

        $data = $request->only('nome', 'primeiro_dia', 'ultimo_dia', 'valor_pago', 'valor_total');

        if($request->valor_pago === "OUTRO"){
            $data['valor_pago'] = $request->outrainst;
        }

        if($request->valor_total === "OUTRO"){
            $data['valor_total'] = $request->outraopcao;
        }

        $pendente = $data['valor_total'] - $data['valor_pago'];
        $data['valor_pendente'] = $pendente;

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
