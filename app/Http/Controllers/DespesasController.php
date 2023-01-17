<?php

namespace App\Http\Controllers;

use App\Http\Requests\DespesaFormRequest;
use App\Models\Despesa;
use Illuminate\Http\Request;

class DespesasController extends Controller
{
    public function index(Request $request){
        $search = $request->search;

        $despesas = Despesa::where(function ($query) use ($search) {
            if($search){
                $query->where("descricao",'LIKE', "%{$search}%");
                $query->orwhere("valor",'LIKE', "%{$search}%");
                $query->orwhereDate("data",'LIKE', "%{$search}%");

            }
        })->orderBy('data', 'asc')->paginate(12)->withQueryString();

        return view('despesas.index', compact('despesas'));
    }

    public function create(){
        return view('despesas.create');
    }

    public function store(DespesaFormRequest $request){
        $data = $request->only('descricao', 'valor', 'data');
        $data['data'] = str_replace('/', '-', $data['data']);
        $data['data'] = date('Y-m-d', strtotime($data['data']));
        
        Despesa::create($data);

        return redirect()->route('despesas.index')->with('sucesso', "Despesa adicionada com Sucesso!");
    }

    public function edit($id){
        if(!$despesa = Despesa::find($id)){
            return redirect()->route('despesas.index')->with('erro', 'Despesa não encontrada.');
        }
        $despesa->data = date("d/m/Y", strtotime($despesa->data));

        return view('despesas.edit', compact('despesa'));
    }
    
    public function update(DespesaFormRequest $request, $id){

        if(!$despesa = Despesa::find($id)){
            return redirect()->back();
        }

        $data = $request->all();

        $data['data'] = str_replace('/', '-', $data['data']);
        $data['data'] = date('Y-m-d', strtotime($data['data']));
        $despesa->update($data);

        return redirect()->route('despesas.edit', ['id'=> $id]  )->with('sucesso', 'Editado com Sucesso!');   
    }

    public function destroy($id){
        if(!$despesa = Despesa::find($id)){
            return redirect()->back();
        }
        $despesa->delete();

        return redirect()->route('despesas.index')->with('sucesso', "Despesa excluída com Sucesso!");
    }

}
