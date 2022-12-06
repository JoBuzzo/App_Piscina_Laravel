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

        $primeiro = Reserva::all()->where('primeiro_dia', '!=', false)->count();
        $ultimo = Reserva::all()->where('ultimo_dia', '!=', false)->count();

        $datas = $primeiro + $ultimo; //todas datas reservadas (card)

        //total de ganhos de todos os anos (card)
        $totalTodos = Reserva::all()->sum('valor_pago');

        //grafico de pizza
        $pagamentos['pagos'] = Reserva::all()->where('valor_pendente', '=', 0)->sum('valor_pago'); //soma dos valores pagos por completo (sem dever nada)
        $quantia['pagos'] = Reserva::all()->where('valor_pendente', '=', 0)->count(); //quantia dos valores pagos por completo (sem dever nada)

        $pagamentos['valor_pago'] = Reserva::all()->where('valor_pendente', '!=', 0)->sum('valor_pendente'); //soma dos valores pendentes
        $quantia['valor_pago'] = Reserva::all()->where('valor_pendente', '!=', 0)->count(); //quantia dos valores pendentes

        $pagamentos['valor_pendente'] = Reserva::all()->where('valor_pendente', '>', 0)->sum('valor_pago'); //soma dos valores pagos por incompleto (devendo)
        $quantia['valor_pendente'] = Reserva::all()->where('valor_pendente', '>', 0)->count(); //quantia dos valores pagos por incompleto (devendo)

        

        //total de ganhos em cada mes (grafico de barras)
        $geral['janeiro'] = 0;  $faltam['janeiro'] = 0; //1
        $geral['fevereiro'] = 0; $faltam['fevereiro'] = 0;//2
        $geral['marco'] = 0; $faltam['marco'] = 0;//3
        $geral['abril'] = 0; $faltam['abril'] = 0;//4
        $geral['maio'] = 0; $faltam['maio'] = 0;//5
        $geral['junho'] = 0; $faltam['junho'] = 0;//6
        $geral['julho'] = 0; $faltam['julho'] = 0;//7
        $geral['agosto'] = 0; $faltam['agosto'] = 0;//8
        $geral['setembro'] = 0;$faltam['setembro'] = 0; //9
        $geral['outubro'] = 0; $faltam['outubro'] = 0;//10
        $geral['novembro'] = 0;$faltam['novembro'] = 0; //11
        $geral['dezembro'] = 0;$faltam['dezembro'] = 0; //12
        $geral['janeiro'] = 0;  $faltam['janeiro'] = 0; //1

        $pagos_parte['janeiro'] = 0;  $completo['janeiro'] = 0; //1
        $pagos_parte['fevereiro'] = 0; $completo['fevereiro'] = 0;//2
        $pagos_parte['marco'] = 0; $completo['marco'] = 0;//3
        $pagos_parte['abril'] = 0; $completo['abril'] = 0;//4
        $pagos_parte['maio'] = 0; $completo['maio'] = 0;//5
        $pagos_parte['junho'] = 0; $completo['junho'] = 0;//6
        $pagos_parte['julho'] = 0; $completo['julho'] = 0;//7
        $pagos_parte['agosto'] = 0; $completo['agosto'] = 0;//8
        $pagos_parte['setembro'] = 0;$completo['setembro'] = 0; //9
        $pagos_parte['outubro'] = 0; $completo['outubro'] = 0;//10
        $pagos_parte['novembro'] = 0;$completo['novembro'] = 0; //11
        $pagos_parte['dezembro'] = 0;$completo['dezembro'] = 0; //12

        $total['pagos_parte'] = 0; //total de ganhos do ano atual
        $total['geral'] = 0; //total de ganhos do ano atual
        $total['faltam'] = 0; //total de ganhos do ano atual
        $total['completo'] = 0; //total de ganhos do ano atual

        $ano = date('Y'); //ano atual

        if($request->ano){
            $ano = $request->ano;
        }
        
        foreach ($reservas as $reserva) {

            //total de ganhos em cada mes (grafico de barras) //total de ganhos do ano atual
            switch($reserva->primeiro_dia){
                case ((date('m', strtotime($reserva->primeiro_dia)) == 1) && (date('Y', strtotime($reserva->primeiro_dia)) == $ano)) :
                    $geral['janeiro']+= $reserva->valor_pago;
                    $faltam['janeiro']+= $reserva->valor_pendente;
                    
                    if($reserva->valor_pendente > 0){
                        $pagos_parte['janeiro']+= $reserva->valor_pago;
                        $total['pagos_parte'] += $reserva->valor_pago;
                    }else{
                        $completo['janeiro'] +=  $reserva->valor_pago;
                        $total['completo'] += $reserva->valor_pago;
                    }

                    $total['faltam']+= $reserva->valor_pendente;
                    $total['geral']+= $reserva->valor_pago;

                break;
                case ((date('m', strtotime($reserva->primeiro_dia)) == 2)  && (date('Y', strtotime($reserva->primeiro_dia)) == $ano)) :
                    $geral['fevereiro']+= $reserva->valor_pago;
                    $faltam['fevereiro']+= $reserva->valor_pendente;
                    
                    if($reserva->valor_pendente > 0){
                        $pagos_parte['fevereiro']+= $reserva->valor_pago;
                        $total['pagos_parte'] += $reserva->valor_pago;
                    }else{
                        $completo['fevereiro'] +=  $reserva->valor_pago;
                        $total['completo'] += $reserva->valor_pago;
                    }

                    $total['faltam']+= $reserva->valor_pendente;
                    $total['geral']+= $reserva->valor_pago;

                break;
                case ((date('m', strtotime($reserva->primeiro_dia)) == 3)  && (date('Y', strtotime($reserva->primeiro_dia)) == $ano)) :
                    $geral['marco']+= $reserva->valor_pago;
                    $faltam['marco']+= $reserva->valor_pendente;

                    if($reserva->valor_pendente > 0){
                        $pagos_parte['marco']+= $reserva->valor_pago;
                        $total['pagos_parte'] += $reserva->valor_pago;
                    }else{
                        $completo['marco'] +=  $reserva->valor_pago;
                        $total['completo'] += $reserva->valor_pago;
                    }

                    $total['faltam']+= $reserva->valor_pendente;
                    $total['geral']+= $reserva->valor_pago;

                break;
                case ((date('m', strtotime($reserva->primeiro_dia)) == 4)  && (date('Y', strtotime($reserva->primeiro_dia)) == $ano)) :
                    $geral['abril']+= $reserva->valor_pago;
                    $faltam['abril']+= $reserva->valor_pendente;

                    if($reserva->valor_pendente > 0){
                        $pagos_parte['abril']+= $reserva->valor_pago;
                        $total['pagos_parte'] += $reserva->valor_pago;
                    }else{
                        $completo['abril'] +=  $reserva->valor_pago;
                        $total['completo'] += $reserva->valor_pago;
                    }

                    $total['faltam']+= $reserva->valor_pendente;
                    $total['geral']+= $reserva->valor_pago;
                break;
                case ((date('m', strtotime($reserva->primeiro_dia)) == 5)  && (date('Y', strtotime($reserva->primeiro_dia)) == $ano)) :
                    $geral['maio']+= $reserva->valor_pago;
                    $faltam['maio']+= $reserva->valor_pendente;

                    if($reserva->valor_pendente > 0){
                        $pagos_parte['maio']+= $reserva->valor_pago;
                        $total['pagos_parte'] += $reserva->valor_pago;
                    }else{
                        $completo['maio'] +=  $reserva->valor_pago;
                        $total['completo'] += $reserva->valor_pago;
                    }

                    $total['faltam']+= $reserva->valor_pendente;
                    $total['geral']+= $reserva->valor_pago;

                break;
                case ((date('m', strtotime($reserva->primeiro_dia)) == 6)  && (date('Y', strtotime($reserva->primeiro_dia)) == $ano)) :
                    $geral['junho']+= $reserva->valor_pago;
                    $faltam['junho']+= $reserva->valor_pendente;

                    if($reserva->valor_pendente > 0){
                        $pagos_parte['junho']+= $reserva->valor_pago;
                        $total['pagos_parte'] += $reserva->valor_pago;
                    }else{
                        $completo['junho'] +=  $reserva->valor_pago;
                        $total['completo'] += $reserva->valor_pago;
                    }
                    
                    $total['faltam']+= $reserva->valor_pendente;
                    $total['geral']+= $reserva->valor_pago;

                break;
                case ((date('m', strtotime($reserva->primeiro_dia)) == 7)  && (date('Y', strtotime($reserva->primeiro_dia)) == $ano)) :
                    $geral['julho']+= $reserva->valor_pago;
                    $faltam['julho']+= $reserva->valor_pendente;

                    if($reserva->valor_pendente > 0){
                        $pagos_parte['julho']+= $reserva->valor_pago;
                        $total['pagos_parte'] += $reserva->valor_pago;
                    }else{
                        $completo['julho'] +=  $reserva->valor_pago;
                        $total['completo'] += $reserva->valor_pago;
                    }

                    $total['faltam']+= $reserva->valor_pendente;
                    $total['geral']+= $reserva->valor_pago;
                break;
                case ((date('m', strtotime($reserva->primeiro_dia)) == 8)  && (date('Y', strtotime($reserva->primeiro_dia)) == $ano)) :
                    $geral['agosto']+= $reserva->valor_pago;
                    $faltam['agosto']+= $reserva->valor_pendente;

                    if($reserva->valor_pendente > 0){
                        $pagos_parte['agosto']+= $reserva->valor_pago;
                        $total['pagos_parte'] += $reserva->valor_pago;
                    }else{
                        $completo['agosto'] +=  $reserva->valor_pago;
                        $total['completo'] += $reserva->valor_pago;
                    }

                    $total['faltam']+= $reserva->valor_pendente;
                    $total['geral']+= $reserva->valor_pago;

                break;
                case ((date('m', strtotime($reserva->primeiro_dia)) == 9)  && (date('Y', strtotime($reserva->primeiro_dia)) == $ano)) :
                    $geral['setembro']+= $reserva->valor_pago;
                    $faltam['setembro']+= $reserva->valor_pendente;

                    if($reserva->valor_pendente > 0){
                        $pagos_parte['setembro']+= $reserva->valor_pago;
                        $total['pagos_parte'] += $reserva->valor_pago;
                    }else{
                        $completo['setembro'] +=  $reserva->valor_pago;
                        $total['completo'] += $reserva->valor_pago;
                    }

                    $total['faltam']+= $reserva->valor_pendente;
                    $total['geral']+= $reserva->valor_pago;

                break;
                case ((date('m', strtotime($reserva->primeiro_dia)) == 10)  && (date('Y', strtotime($reserva->primeiro_dia)) == $ano)) :
                    $geral['outubro']+= $reserva->valor_pago;
                    $faltam['outubro']+= $reserva->valor_pendente;

                    if($reserva->valor_pendente > 0){
                        $pagos_parte['outubro']+= $reserva->valor_pago;
                        $total['pagos_parte'] += $reserva->valor_pago;
                    }else{
                        $completo['outubro'] +=  $reserva->valor_pago;
                        $total['completo'] += $reserva->valor_pago;
                    }

                    $total['faltam']+= $reserva->valor_pendente;
                    $total['geral']+= $reserva->valor_pago;

                break;
                case ((date('m', strtotime($reserva->primeiro_dia)) == 11)  && (date('Y', strtotime($reserva->primeiro_dia)) == $ano)) :
                    $geral['novembro']+= $reserva->valor_pago;
                    $faltam['novembro']+= $reserva->valor_pendente;

                    if($reserva->valor_pendente > 0){
                        $pagos_parte['novembro']+= $reserva->valor_pago;
                        $total['pagos_parte'] += $reserva->valor_pago;
                    }else{
                        $completo['novembro'] +=  $reserva->valor_pago;
                        $total['completo'] += $reserva->valor_pago;
                    }

                    $total['faltam']+= $reserva->valor_pendente;
                    $total['geral']+= $reserva->valor_pago;

                break;
                case ((date('m', strtotime($reserva->primeiro_dia)) == 12)  && (date('Y', strtotime($reserva->primeiro_dia)) == $ano)) :
                    $geral['dezembro']+= $reserva->valor_pago;
                    $faltam['dezembro']+= $reserva->valor_pendente;

                    if($reserva->valor_pendente > 0){
                        $pagos_parte['dezembro']+= $reserva->valor_pago;
                        $total['pagos_parte'] += $reserva->valor_pago;
                    }else{
                        $completo['dezembro'] +=  $reserva->valor_pago;
                        $total['completo'] += $reserva->valor_pago;
                    }

                    $total['faltam']+= $reserva->valor_pendente;
                    $total['geral']+= $reserva->valor_pago;

                break;
            }
        }


        return view('index',compact('totalTodos', 'total','datas','geral','ano', 'pagamentos', 'quantia','faltam','pagos_parte','completo'));
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
        if( $filter === "Hoje"){
            $reservas = Reserva::where('primeiro_dia', '=', "$date")->orWhere('ultimo_dia', '=', "$date")->paginate() ;
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
        return view('ver' ,compact('reserva'));
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
