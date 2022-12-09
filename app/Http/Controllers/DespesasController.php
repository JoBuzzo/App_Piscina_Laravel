<?php

namespace App\Http\Controllers;

use App\Http\Requests\DespesaFormRequest;
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
        })->orderBy('data', 'asc')->paginate(12)->withQueryString();

        return view('despesas', compact('despesas'));
    }

    public function adicionar(){
        return view('add_despesa');
    }

    public function store(DespesaFormRequest $request){
        $data = $request->only('descricao', 'valor');
        if(!$request->data){
            $data['data'] = date('Y-m-d');
        }else{
            $data['data'] = $request->data;
        }
        
        Despesa::create($data);

        return redirect()->route('despesas');
    }

    public function edit($id){
        if(!$despesa = Despesa::find($id)){
            return redirect()->back();
        }

        return view('edit_despesa', compact('despesa'));
    }
    
    public function update(DespesaFormRequest $request, $id){

        if(!$despesa = Despesa::find($id)){
            return redirect()->back();
        }

        $data = $request->all();

        $despesa->update($data);

        return redirect()->route('despesas.edit', ['id'=> $id]  )->with('mensagem', 'Editado com Sucesso!');   
    }

    public function destroy($id){
        if(!$despesa = Despesa::find($id)){
            return redirect()->back();
        }
        $despesa->delete();

        return redirect()->route('despesas');
    }

}
