<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Bares;
use App\Models\Categoria;
use App\Models\CardapioBares;
use App\Models\FuncionarioBar;
use Illuminate\Http\Request;

class BaresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bares = Bares::simplepaginate(6);
        $categorias = Categoria::where('categoria_pai','=','7')->get(); 
        return view('bares.bar.index',array('bares'=>$bares, 'busca'=>null, 'filtro'=>null, 'categorias'=>$categorias));
    }

    public function filtrar(Request $request) {
        $categorias = Categoria::where('categoria_pai','=','7')->get(); 
        $bares = Bares::where('categoria_id','=',$request->input('filtro'))->simplepaginate(6);
        return view('bares.bar.index', array('bares'=>$bares,'filtro'=>$request->input('filtro'), 'busca'=>null, 'categorias'=>$categorias));
    }

    public function buscar(Request $request) {
        $categorias = Categoria::where('categoria_pai','=','7')->get(); 
        $bares = Bares::where('nome','LIKE', '%'.
        $request->input('busca'). '%')->orwhere('cidade', 'LIKE', '%'.
        $request->input('busca'). '%')->orwhere('estado', 'LIKE', '%'.
        $request->input('busca'). '%')->orwhere('rua', 'LIKE', '%'.
        $request->input('busca'). '%')->simplepaginate(6);
        return view('bares.bar.index', array('bares'=>$bares, 'busca'=>$request->input('busca'),'filtro'=>null,'categorias'=>$categorias));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if((Auth::check()) && (Auth::user()->isAdmin())) {
            $categorias = Categoria::where('categoria_pai','=', '7')->get();
            return view('bares.bar.create',array('categorias'=>$categorias));
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

            $bar = new Bares();
            $bar->nome = $request->input('nome');
            $bar->email = $request->input('email');
            $bar->telefone = $request->input('telefone');
            $bar->cidade = $request->input('cidade');
            $bar->estado = $request->input('estado');
            $bar->rua = $request->input('rua');
            $bar->categoria_id = $request->input('categoria_id');
            if($bar->save()) {
                if($request->hasFile('foto')){
                    $imagem = $request->file('foto');
                    $nomearquivo = md5($bar->id).'.'.$imagem->getClientOriginalExtension();
                    $request->file('foto')->move(public_path('.\img\bar\foto'),$nomearquivo);
                }
                if($request->hasFile('logo')){
                    $imagem = $request->file('logo');
                    $nomearquivo = md5($bar->id).'.'.$imagem->getClientOriginalExtension();
                    $request->file('logo')->move(public_path('.\img\bar\logo'),$nomearquivo);
                }
                if($request->hasFile('ambiente1')){
                    $imagem = $request->file('ambiente1');
                    $nomearquivo = md5($bar->id).'-'.$cont.'.'.$imagem->getClientOriginalExtension();
                    $request->file('ambiente1')->move(public_path('.\img\bar\ambiente'),$nomearquivo);
                    $cont++;
                }
                if($request->hasFile('ambiente2')){
                    $imagem = $request->file('ambiente2');
                    $nomearquivo = md5($bar->id).'-'.$cont.'.'.$imagem->getClientOriginalExtension();
                    $request->file('ambiente2')->move(public_path('.\img\bar\ambiente'),$nomearquivo);
                    $cont++;
                }
                if($request->hasFile('ambiente3')){
                    $imagem = $request->file('ambiente3');
                    $nomearquivo = md5($bar->id).'-'.$cont.'.'.$imagem->getClientOriginalExtension();
                    $request->file('ambiente3')->move(public_path('.\img\bar\ambiente'),$nomearquivo);
                    $cont++;
                }

                return redirect('bares');
            }
        } else {
            return redirect('login');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bares  $bares
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bar = Bares::find($id);
        $funcionarios = FuncionarioBar::where('bar_id','=',$id)->get();
        $cardapios = CardapioBares::where('bar_id','=',$id)->get();
        return view('bares.bar.show',array('bar'=>$bar, 'funcionarios'=>$funcionarios, 'cardapios'=>$cardapios));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bares  $bares
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bar = Bares::find($id);
        $categorias = Categoria::where('categoria_pai','=','7')->get();
        return view('bares.bar.edit',array('bar'=>$bar, 'categorias'=>$categorias));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bares  $bares
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

            $bar = Bares::find($id);
            $bar->nome = $request->input('nome');
            $bar->email = $request->input('email');
            $bar->telefone = $request->input('telefone');
            $bar->cidade = $request->input('cidade');
            $bar->estado = $request->input('estado');
            $bar->rua = $request->input('rua');
            $bar->categoria_id = $request->input('categoria_id');
            if($bar->save()) {
                if($request->hasFile('foto')){
                    $imagem = $request->file('foto');
                    $nomearquivo = md5($bar->id).'.'.$imagem->getClientOriginalExtension();
                    $request->file('foto')->move(public_path('.\img\bar\foto'),$nomearquivo);
                }
                if($request->hasFile('logo')){
                    $imagem = $request->file('logo');
                    $nomearquivo = md5($bar->id).'.'.$imagem->getClientOriginalExtension();
                    $request->file('logo')->move(public_path('.\img\bar\logo'),$nomearquivo);
                }
                if($request->hasFile('ambiente1')){
                    $imagem = $request->file('ambiente1');
                    $nomearquivo = md5($bar->id).'-'.$cont.'.'.$imagem->getClientOriginalExtension();
                    $request->file('ambiente1')->move(public_path('.\img\bar\ambiente'),$nomearquivo);
                    $cont++;
                }
                if($request->hasFile('ambiente2')){
                    $imagem = $request->file('ambiente2');
                    $nomearquivo = md5($bar->id).'-'.$cont.'.'.$imagem->getClientOriginalExtension();
                    $request->file('ambiente2')->move(public_path('.\img\bar\ambiente'),$nomearquivo);
                    $cont++;
                }
                if($request->hasFile('ambiente3')){
                    $imagem = $request->file('ambiente3');
                    $nomearquivo = md5($bar->id).'-'.$cont.'.'.$imagem->getClientOriginalExtension();
                    $request->file('ambiente3')->move(public_path('.\img\bar\ambiente'),$nomearquivo);
                    $cont++;
                }

                return redirect('bares/'.$bar->id);
            }
        } else {
            return redirect('login');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bares  $bares
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bares $bares)
    {
        //
    }
}
