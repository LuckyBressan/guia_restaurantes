<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\FuncionarioBar;
use App\Models\Bares;

use Illuminate\Http\Request;

class FuncionarioBarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if((Auth::check()) && (Auth::user()->isAdmin())) {
            $bares = Bares::all();
            return view('bares.funcionario_bar.create',array('bares'=>$bares));
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
                'idade'=>'required',
                'funcao'=>'required',
                'bar_id'=>'required',
            ]);
    
            $funcionario = new FuncionarioBar();
            $funcionario->nome = $request->input('nome');
            $funcionario->idade = $request->input('idade');
            $funcionario->funcao = $request->input('funcao');
            $funcionario->bar_id = $request->input('bar_id');
    
            if($funcionario->save()) {
                if($request->hasFile('foto')){
                    $imagem = $request->file('foto');
                    $nomearquivo = md5($funcionario->id).'.'.$imagem->getClientOriginalExtension();
                    $request->file('foto')->move(public_path('.\img\bar\funcionario'),$nomearquivo);
                }
                return redirect('funcionariosBar/'.$funcionario->bar_id);
            }
        } else {
            return redirect('login');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FuncionarioBar  $funcionarioBar
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $funcionarios = FuncionarioBar::where('bar_id','=',$id)->simplepaginate(9);
        return view('bares.funcionario_bar.show',array('funcionarios'=>$funcionarios));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FuncionarioBar  $funcionarioBar
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $funcionario = FuncionarioBar::find($id);
        $bares = Bares::all();
        return view('bares.funcionario_bar.edit',array('funcionario'=>$funcionario, 'bares'=>$bares));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FuncionarioBar  $funcionarioBar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if((Auth::check()) && (Auth::user()->isAdmin())) {
            $this->validate($request,[
                'nome'=>'required',
                'idade'=>'required',
                'funcao'=>'required',
                'bar_id'=>'required',
            ]);
    
            $funcionario = FuncionarioBar::find($id);
            $funcionario->nome = $request->input('nome');
            $funcionario->idade = $request->input('idade');
            $funcionario->funcao = $request->input('funcao');
            $funcionario->bar_id = $request->input('bar_id');
    
            if($funcionario->save()) {
                if($request->hasFile('foto')){
                    $imagem = $request->file('foto');
                    $nomearquivo = md5($funcionario->id).'.'.$imagem->getClientOriginalExtension();
                    $request->file('foto')->move(public_path('.\img\bar\funcionario'),$nomearquivo);
                }
                return redirect('funcionariosBar/'.$funcionario->bar_id);
            }
        } else {
            return redirect('login');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FuncionarioBar  $funcionarioBar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if((Auth::check()) && (Auth::user()->isAdmin())) {
            $funcionario = FuncionarioBar::find($id);
            if(isset($request->foto)){
                unlink($request->foto);
            }
            $funcionario->delete();
            return redirect('funcionariosBar/'.$funcionario->bar_id);
        } else {
            return redirect('login');
        }
    }
}
