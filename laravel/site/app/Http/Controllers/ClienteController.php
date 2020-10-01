<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClienteController extends Controller
{
    private $clientes = [
        ['id'=> 1, 'nome'=>'Orlando'],
        ['id'=> 2, 'nome'=>'Ana'],
        ['id'=> 3, 'nome'=>'Lucas'],
        ['id'=> 4, 'nome'=>'Lourdes']
    ];

    public function index()
    {
      $clientes = $this->clientes;
      return view('clientes.index', compact(['clientes']));
    }

    public function create()
    {
        return view('clientes.create');   
    }

    public function store(Request $request)
    {
        $id = count($this->clientes) + 1;
        $nome = $request->nome;
        $dados = ['id'=>$id, 'nome'=>$nome];
        $this->clientes[] = $dados;
        // dd($this->clientes);
        $clientes = $this->clientes;
        return view('clientes.index',compact(['clientes']));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
