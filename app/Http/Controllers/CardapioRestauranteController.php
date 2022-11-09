<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\CardapioRestaurante;
use App\Models\Restaurante;
use Illuminate\Http\Request;

class CardapioRestauranteController extends Controller
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
        if((Auth::check()) && (Auth::user()->isAdmin())) {
            $restaurantes = Restaurante::all();
            return view('cardapio_restaurante.create',array('restaurantes'=>$restaurantes));
        } else {
            return redirect('login');
        }
      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if((Auth::check()) && (Auth::user()->isAdmin())) {
            $this->validate($request,[
                'nome'=>'required',
                'descricao'=>'required',
                'valor'=>'required',
                'restaurante_id'=>'required',
            ]);
    
            $cardapio = new CardapioRestaurante();
            $cardapio->nome = $request->input('nome');
            $cardapio->descricao = $request->input('descricao');
            $cardapio->valor = $request->input('valor');
            $cardapio->restaurante_id = $request->input('restaurante_id');
    
            if($cardapio->save()) {
                if($request->hasFile('foto')){
                    $imagem = $request->file('foto');
                    $nomearquivo = md5($cardapio->id).'.'.$imagem->getClientOriginalExtension();
                    $request->file('foto')->move(public_path('.\img\restaurante\cardapio'),$nomearquivo);
                }
                return redirect('restaurantes');
            }
        } else {
            return redirect('login');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CardapioRestaurante  $cardapioRestaurante
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cardapios = CardapioRestaurante::where('restaurante_id','=',$id)->get();
        return view('cardapio_restaurante.show', array('cardapios'=>$cardapios));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CardapioRestaurante  $cardapioRestaurante
     * @return \Illuminate\Http\Response
     */
    public function edit(CardapioRestaurante $cardapioRestaurante)
    {
        if((Auth::check()) && (Auth::user()->isAdmin())) {

        } else {
            return redirect('login');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CardapioRestaurante  $cardapioRestaurante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CardapioRestaurante $cardapioRestaurante)
    {
        if((Auth::check()) && (Auth::user()->isAdmin())) {

        } else {
            return redirect('login');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CardapioRestaurante  $cardapioRestaurante
     * @return \Illuminate\Http\Response
     */
    public function destroy(CardapioRestaurante $cardapioRestaurante)
    {
        //
    }
}
