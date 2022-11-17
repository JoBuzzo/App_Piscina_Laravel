<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use Illuminate\Http\Request;

class ReservaController extends Controller
{
    public function reservas(Request $request){

        
        $search = $request->search;


        $reservas = Reserva::where(function ($query) use ($search) {
            if($search){

                $query->where("primeiro_dia",'LIKE', "%{$search}%");
                $query->orWhere('ultimo_dia', 'LIKE', "%{$search}%");
            }
        })->get();

        return view('reservas', compact('reservas','search'));
    }


    public function adicionar(){
        return view('adicionar');
    }

    public function store(Request $request){

        if($request->ultimo_dia == null){
            $request->ultimo_dia = $request->primeiro_dia;
        }
        
        Reserva::create([
            'nome' => $request->nome,
            'primeiro_dia' => $request->primeiro_dia,
            'ultimo_dia' => $request->ultimo_dia,
            'pagamento' => $request->pagamento,
            'valor' => $request->valor,
        ]);

        return redirect()->route('reservas');
    }

    public function edit($id){
        if(!$reserva =  Reserva::find($id)){
            return redirect()->back('reservas');
        }
        return view('ver' ,compact('reserva'));
    }

    public function update(Request $request, $id){
        if(!$reserva = Reserva::find($id)){
            return redirect()->route('reservas');
        }

        $reserva->update([
            'nome' => $request->nome,
            'primeiro_dia' => $request->primeiro_dia,
            'ultimo_dia' => $request->ultimo_dia,
            'pagamento' => $request->pagamento,
            'valor' => $request->valor,
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
