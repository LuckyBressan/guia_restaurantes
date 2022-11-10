<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
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
        $restaurantes = Restaurante::simplepaginate(6);
        return view('restaurante.index', array('restaurantes'=>$restaurantes, 'busca'=>null));
    }

    public function buscar(Request $request) {
        $restaurantes = Restaurante::where('nome','LIKE', '%'.
        $request->input('busca'). '%')->orwhere('cidade', 'LIKE', '%'.
        $request->input('busca'). '%')->orwhere('estado', 'LIKE', '%'.
        $request->input('busca'). '%')->orwhere('rua', 'LIKE', '%'.
        $request->input('busca'). '%')->simplepaginate(6);
        return view('restaurante.index', array('restaurantes'=>$restaurantes, 'busca'=>$request->input('busca')));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if((Auth::check()) && (Auth::user()->isAdmin())) {
            $categorias = Categoria::where('categoria_pai','=', '1')->get();
            return view('restaurante.create',array('categorias'=>$categorias));
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
            $cont = 1;
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
                if($request->hasFile('ambiente1')){
                    $imagem = $request->file('ambiente1');
                    $nomearquivo = md5($restaurante->id).'-'.$cont.'.'.$imagem->getClientOriginalExtension();
                    $request->file('ambiente1')->move(public_path('.\img\restaurante\ambiente'),$nomearquivo);
                    $cont++;
                }
                if($request->hasFile('ambiente2')){
                    $imagem = $request->file('ambiente2');
                    $nomearquivo = md5($restaurante->id).'-'.$cont.'.'.$imagem->getClientOriginalExtension();
                    $request->file('ambiente2')->move(public_path('.\img\restaurante\ambiente'),$nomearquivo);
                    $cont++;
                }
                if($request->hasFile('ambiente3')){
                    $imagem = $request->file('ambiente3');
                    $nomearquivo = md5($restaurante->id).'-'.$cont.'.'.$imagem->getClientOriginalExtension();
                    $request->file('ambiente3')->move(public_path('.\img\restaurante\ambiente'),$nomearquivo);
                    $cont++;
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
        if((Auth::check()) && (Auth::user()->isAdmin())) {
            $restaurante = Restaurante::find($id);
            $categorias = Categoria::where('categoria_pai','=', '1')->get();
            return view('restaurante.edit', array('restaurante'=>$restaurante, 'categorias'=>$categorias));
        } else {
            return redirect('login');
        }
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
        if((Auth::check()) && (Auth::user()->isAdmin())) {
            $cont = 1;
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
            if($request->hasFile('ambiente1')){
                $imagem = $request->file('ambiente1');
                $nomearquivo = md5($restaurante->id).'-'.$cont.'.'.$imagem->getClientOriginalExtension();
                $request->file('ambiente1')->move(public_path('.\img\restaurante\ambiente'),$nomearquivo);
                $cont++;
            }
            if($request->hasFile('ambiente2')){
                $imagem = $request->file('ambiente2');
                $nomearquivo = md5($restaurante->id).'-'.$cont.'.'.$imagem->getClientOriginalExtension();
                $request->file('ambiente2')->move(public_path('.\img\restaurante\ambiente'),$nomearquivo);
                $cont++;
            }
            if($request->hasFile('ambiente3')){
                $imagem = $request->file('ambiente3');
                $nomearquivo = md5($restaurante->id).'-'.$cont.'.'.$imagem->getClientOriginalExtension();
                $request->file('ambiente3')->move(public_path('.\img\restaurante\ambiente'),$nomearquivo);
                $cont++;
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
        } else {
            return redirect('login');
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
        if((Auth::check()) && (Auth::user()->isAdmin())) {
            
        } else {
            return redirect('login');
        }
    }
}
