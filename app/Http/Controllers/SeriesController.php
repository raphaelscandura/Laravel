<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Serie;

class SeriesController extends Controller
{
    public function index(Request $request){
        $series = Serie::all();
        $mensagemSucesso = session('mensagem.sucesso');

        return 
            view('series.index')
                ->with('series', $series)
                ->with('mensagemSucesso', $mensagemSucesso);
    }

    public function create(){
        return view('series.create');
    }

    public function store(Request $request){
        $serie = Serie::create($request->all());

        return to_route('series.index')->with('mensagem.sucesso', "Série '{$serie->nome}' adicionada com sucesso");
    }

    public function destroy(Serie $series){        
        $series->delete();        

        return to_route('series.index')->with('mensagem.sucesso', "Série '{$series->nome}' removida com sucesso");
    }

    public function edit(Serie $series){
        return view("series.edit")->with("serie", $series);
    }

    public function update(Request $request,Serie $series){
        $series->fill($request->all());
        $series->save();
        
        return to_route('series.index')->with('mensagem.sucesso', "Série '{$series->nome}' atualizada com sucesso para '{$request->nome}'");
    }
}