<?php

namespace App\Http\Controllers;

use App\Models\Despesa;
use Illuminate\Http\Request;

class DespesasController extends Controller
{
    public function despesas(Request $request){
        $search = $request->search;

        $despesas = Despesa::where(function ($query) use ($search) {
            if($search){
                $query->where("descricao",'LIKE', "%{$search}%");
                $query->orwhere("valor",'LIKE', "%{$search}%");
                $query->orwhereDate("data",'LIKE', "%{$search}%");

            }
        })->paginate(12)->withQueryString();

        return view('despesas', compact('despesas'));
    }

    public function adicionar(){
        return view('add_despesa');
    }

    public function store(Request $request){
        $data = $request->all();

        Despesa::create($data);

        return redirect()->route('despesas');
    }

    public function edit($id){
        if($despesa = Despesa::find($id)){
            return redirect()->back();
        }

        return view('edit_despesa', compact('despesa'));
    }
    
    public function destroy($id){
        if($despesa = Despesa::find($id)){
            return redirect()->back();
        }
        $despesa->delete();

        return view('edit_despesa', compact('despesa'));
    }

}
