<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function __construct(Produto $produto)
    {
        $this->produto = $produto;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->produto->all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->produto->rules(),$this->produto->feedback());

        $produto = $this->produto->create($request->all());
        return $produto;
    }

    /**
     * Display the specified resource.
     *
     * @param  Integer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produto = $this->produto->find($id);
        if($produto === null){
            return response()->json(['erro' => 'recurso não existe '], 404);
        } 
        return $produto;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit(Produto $produto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Integer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $produto = $this->produto->find($id);
        if($produto === null){
            return response()->json(['erro' => 'recurso não existe '], 404);
        }
        
        if($request->method() === 'PATCH'){//Validar apenas o que for enviado
            $regrasDinamicas = array();
            foreach($produto->rules() as $input => $regra){
                if(array_key_exists($input,$request->all())){
                    $regrasDinamicas[$input] = $regra;
                }
            }
            $request->validate($regrasDinamicas,$produto->feedback());
        } else {
            $request->validate($produto->rules(),$produto->feedback());
        }
        
        $produto->fill($request->all());

        //$produto->update($request->all());
        $produto->save();
        return $produto;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Integer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produto = $this->produto->find($id);
        if($produto === null){
            return response()->json(['erro' => 'recurso não existe '], 404);
        } 
        $produto->delete();
        return response()->json(['sucesso' => 'recurso apagado com sucesso'],200);
    }
}
