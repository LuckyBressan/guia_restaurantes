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
            return view('restaurantes.cardapio_restaurante.create',array('restaurantes'=>$restaurantes));
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
                return redirect('cardapios/'.$cardapio->restaurante_id);
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
        $cardapios = CardapioRestaurante::where('restaurante_id','=',$id)->simplepaginate(9);
        return view('restaurantes.cardapio_restaurante.show', array('cardapios'=>$cardapios));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CardapioRestaurante  $cardapioRestaurante
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if((Auth::check()) && (Auth::user()->isAdmin())) {
            $cardapio = CardapioRestaurante::find($id);
            $restaurantes = Restaurante::all();
            return view('restaurantes.cardapio_restaurante.edit', array('restaurantes'=>$restaurantes, 'cardapio'=>$cardapio));
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
    public function update(Request $request, $id)
    {
        if((Auth::check()) && (Auth::user()->isAdmin())) {
            $this->validate($request,[
                'nome'=>'required',
                'descricao'=>'required',
                'valor'=>'required',
                'restaurante_id'=>'required',
            ]);
    
            $cardapio = CardapioRestaurante::find($id);
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
                return redirect('cardapios/'.$cardapio->restaurante_id);
            }
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
    public function destroy(Request $request, $id)
    {
        if((Auth::check())&& (Auth::user()->isAdmin())) {
            $cardapio = CardapioRestaurante::find($id);
            if(isset($request->foto)){
                unlink($request->foto);
            }
            $cardapio->delete();
            return redirect('cardapios/'.$cardapio->restaurante_id);
        } else {
            return redirect('login');
        }
    }
}
