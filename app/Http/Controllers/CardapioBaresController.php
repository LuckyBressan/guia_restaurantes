<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\CardapioBares;
use App\Models\Bares;
use Illuminate\Http\Request;

class CardapioBaresController extends Controller
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
    public function create($id)
    {
        if((Auth::check()) && (Auth::user()->isAdmin())) {
            $bares = Bares::all();
            return view('bares.cardapio_bar.create',array('bares'=>$bares));
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
                'bar_id'=>'required',
            ]);
    
            $cardapio = new CardapioBares();
            $cardapio->nome = $request->input('nome');
            $cardapio->descricao = $request->input('descricao');
            $cardapio->valor = $request->input('valor');
            $cardapio->bar_id = $request->input('bar_id');
    
            if($cardapio->save()) {
                if($request->hasFile('foto')){
                    $imagem = $request->file('foto');
                    $nomearquivo = md5($cardapio->id).'.'.$imagem->getClientOriginalExtension();
                    $request->file('foto')->move(public_path('.\img\bar\cardapio'),$nomearquivo);
                }
                return redirect('cardapiosBar/'.$cardapio->bar_id);
            }
        } else {
            return redirect('login');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CardapioBares  $cardapioBares
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cardapios = CardapioBares::where('bar_id','=',$id)->simplepaginate(9);
        return view('bares.cardapio_bar.show', array('cardapios'=>$cardapios));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CardapioBares  $cardapioBares
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if((Auth::check()) && (Auth::user()->isAdmin())) {
            $cardapio = CardapioBares::find($id);
            $bares = Bares::all();
            return view('bares.cardapio_bar.edit', array('cardapio'=>$cardapio, 'bares'=>$bares));
        } else {
            return redirect('login');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CardapioBares  $cardapioBares
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if((Auth::check()) && (Auth::user()->isAdmin())) {
            $this->validate($request,[
                'nome'=>'required',
                'descricao'=>'required',
                'valor'=>'required',
                'bar_id'=>'required',
            ]);
    
            $cardapio = CardapioBares::find($id);
            $cardapio->nome = $request->input('nome');
            $cardapio->descricao = $request->input('descricao');
            $cardapio->valor = $request->input('valor');
            $cardapio->bar_id = $request->input('bar_id');
    
            if($cardapio->save()) {
                if($request->hasFile('foto')){
                    $imagem = $request->file('foto');
                    $nomearquivo = md5($cardapio->id).'.'.$imagem->getClientOriginalExtension();
                    $request->file('foto')->move(public_path('.\img\bar\cardapio'),$nomearquivo);
                }
                return redirect('cardapiosBar/'.$cardapio->bar_id);
            }
        } else {
            return redirect('login');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CardapioBares  $cardapioBares
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if((Auth::check()) && (Auth::user()->isAdmin())) {
            $cardapio = CardapioBares::find($id);
            if(isset($request->foto)){
                unlink($request->foto);
            }
            $cardapio->delete();
            return redirect('cardapiosBar/'.$cardapio->bar_id);
        } else {
            return redirect('login');
        }
    }
}
