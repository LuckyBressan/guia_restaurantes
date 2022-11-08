<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Restaurante;
use App\Models\FuncionarioRestaurante;
use App\Models\CardapioRestaurante;
use Illuminate\Http\Request;


class RestauranteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurantes = Restaurante::simplepaginate(5);
        return view('restaurante.index', array('restaurantes'=>$restaurantes));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::where('categoria_pai','=', '1')->get();
        return view('restaurante.create',array('categorias'=>$categorias));
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
            'email'=>'required|email',
            'telefone'=>'required',
            'cidade'=>'required',
            'estado'=>'required',
            'rua'=>'required',
            'categoria_id'=>'required',
        ]);

        $restaurante = new Restaurante();
        $restaurante->nome = $request->input('nome');
        $restaurante->email = $request->input('email');
        $restaurante->telefone = $request->input('telefone');
        $restaurante->cidade = $request->input('cidade');
        $restaurante->estado = $request->input('estado');
        $restaurante->rua = $request->input('rua');
        $restaurante->categoria_id = $request->input('categoria_id');
        if($restaurante->save()) {
            if($request->hasFile('foto')){
                $imagem = $request->file('foto');
                $nomearquivo = md5($restaurante->id).'.'.$imagem->getClientOriginalExtension();
                $request->file('foto')->move(public_path('.\img\restaurante\foto'),$nomearquivo);
            }
            if($request->hasFile('logo')){
                $imagem = $request->file('logo');
                $nomearquivo = md5($restaurante->id).'.'.$imagem->getClientOriginalExtension();
                $request->file('logo')->move(public_path('.\img\restaurante\logo'),$nomearquivo);
            }
            return redirect('restaurantes');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Restaurante  $restaurante
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $restaurante = Restaurante::find($id);
        $funcionarios = FuncionarioRestaurante::where('restaurante_id','=',$id)->get();
        $cardapios = CardapioRestaurante::where('restaurante_id','=',$id)->get();
        return view('restaurante.show', array('restaurante'=>$restaurante, 'funcionarios'=>$funcionarios, 'cardapios'=>$cardapios));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Restaurante  $restaurante
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $restaurante = Restaurante::find($id);
        $categorias = Categoria::where('categoria_pai','=', '1')->get();
        return view('restaurante.edit', array('restaurante'=>$restaurante, 'categorias'=>$categorias));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Restaurante  $restaurante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nome'=>'required',
            'email'=>'required|email',
            'telefone'=>'required',
            'cidade'=>'required',
            'estado'=>'required',
            'rua'=>'required',
            'categoria_id'=>'required',
        ]);

        $restaurante = Restaurante::find($id);
        if($request->hasFile('foto')){
            $imagem = $request->file('foto');
            $nomearquivo = md5($restaurante->id).'.'.$imagem->getClientOriginalExtension();
            $request->file('foto')->move(public_path('.\img\restaurante\foto'),$nomearquivo);
        }
        if($request->hasFile('logo')){
            $imagem = $request->file('logo');
            $nomearquivo = md5($restaurante->id).'.'.$imagem->getClientOriginalExtension();
            $request->file('logo')->move(public_path('.\img\restaurante\logo'),$nomearquivo);
        }

        $restaurante->nome = $request->input('nome');
        $restaurante->email = $request->input('email');
        $restaurante->telefone = $request->input('telefone');
        $restaurante->cidade = $request->input('cidade');
        $restaurante->estado = $request->input('estado');
        $restaurante->rua = $request->input('rua');
        $restaurante->categoria_id = $request->input('categoria_id');
        if($restaurante->save()) {
            return redirect(url('restaurantes/'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Restaurante  $restaurante
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurante $restaurante)
    {
        //
    }
}
