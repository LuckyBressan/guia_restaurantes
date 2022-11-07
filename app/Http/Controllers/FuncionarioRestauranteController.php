<?php

namespace App\Http\Controllers;

use App\Models\FuncionarioRestaurante;
use Illuminate\Http\Request;
use App\Models\Restaurante;

class FuncionarioRestauranteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $restaurantes = Restaurante::all();
        return view('funcionario.create',array('restaurantes'=>$restaurantes));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nome'=>'required',
            'idade'=>'required',
            'funcao'=>'required',
            'restaurante_id'=>'required',
        ]);

        $funcionario = new FuncionarioRestaurante();
        $funcionario->nome = $request->input('nome');
        $funcionario->idade = $request->input('idade');
        $funcionario->funcao = $request->input('funcao');
        $funcionario->restaurante_id = $request->input('restaurante_id');

        if($funcionario->save()) {
            if($request->hasFile('foto')){
                $imagem = $request->file('foto');
                $nomearquivo = md5($funcionario->id).'.'.$imagem->getClientOriginalExtension();
                $request->file('foto')->move(public_path('.\img\funcionario'),$nomearquivo);
            }
            return redirect('restaurantes');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FuncionarioRestaurante  $funcionarioRestaurante
     * @return \Illuminate\Http\Response
     */
    public function show(FuncionarioRestaurante $funcionarioRestaurante)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FuncionarioRestaurante  $funcionarioRestaurante
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $funcionario = FuncionarioRestaurante::find($id);
        $restaurantes = Restaurante::all();
        return view('funcionario.edit',array('funcionario'=>$funcionario,'restaurantes'=>$restaurantes));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FuncionarioRestaurante  $funcionarioRestaurante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nome'=>'required',
            'idade'=>'required',
            'funcao'=>'required',
            'restaurante_id'=>'required',
        ]);

        $funcionario = FuncionarioRestaurante::find($id);
        $funcionario->nome = $request->input('nome');
        $funcionario->idade = $request->input('idade');
        $funcionario->funcao = $request->input('funcao');
        $funcionario->restaurante_id = $request->input('restaurante_id');

        if($funcionario->save()) {
            if($request->hasFile('foto')){
                $imagem = $request->file('foto');
                $nomearquivo = md5($funcionario->id).'.'.$imagem->getClientOriginalExtension();
                $request->file('foto')->move(public_path('.\img\funcionario'),$nomearquivo);
            }
            return redirect('restaurantes/'.$id);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FuncionarioRestaurante  $funcionarioRestaurante
     * @return \Illuminate\Http\Response
     */
    public function destroy(FuncionarioRestaurante $funcionarioRestaurante)
    {
        //
    }
}
