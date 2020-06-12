<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePessoaRequest;
use App\Http\Requests\UpdatePessoaRequest;
use App\Models\Pessoa;
use Illuminate\Http\Request;

class PessoaController extends Controller
{
    //Cria uma nova pessoa
    public static function store(CreatePessoaRequest $request) {
        if(Pessoa::create($request->all())) 
            return back()->with('success', 'Pessoa criada com sucesso');
        
        return back()->with('error', 'Não foi possível criar o registro.');
    }
    
    //Retorna todas as pessoas
    public static function index(Request $request) {
        $pessoas = Pessoa::all();
        return view('pessoas', compact('pessoas'));
    }
    
    //Altera uma pessoa
    public static function edit(Request $request, $id) {
        $pessoa = Pessoa::find($id);
        return view('edit_pessoa', compact('pessoa'));
    }

    //Altera uma pessoa
    public static function update(UpdatePessoaRequest $request, $id) {
        $pessoa = Pessoa::find($id);

        if($pessoa->update($request->all()))
            return redirect(route('pessoas.index'))->with('success', 'Os dados foram atualizados corretamente.');
        
        return redirect(route('pessoas.index'))->with('error', 'Não foi possível atualizar as informações.');
        
    }

    //Deleta uma pessoa
    public static function destroy(Request $request, $id) {
        if(Pessoa::destroy($id))
            return redirect(route('pessoas.index'))->with('success', 'A pessoa foi excluída com sucesso.');
        
        return redirect(route('pessoas.index'))->with('error', 'Não foi possível excluir essa pessoa.');
        
    }
}
