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

    public function __construct(){
        $clientes = session('clientes');
        if(!isset($clientes)) {
           session(['clientes' => $this->clientes]);
        }
    }
    
    public function index()
    {
        $clientes = session('clientes');
        return view('clientes.index', compact(['clientes']));
    }

    public function create()
    {
        return view('clientes.create');   
    }

    public function store(Request $request)
    {
        $clientes = session('clientes');
        $id = count($clientes) + 1;
        $nome = $request->nome;
        $dados = ['id'=>$id, 'nome'=>$nome];
        $clientes[] = $dados;
        session(['clientes' => $clientes]);
        return redirect()->route('cliente.index');
    }

    public function show($id)
    {
        $clientes = session('clientes');
        $cliente = $clientes[$id - 1];
        return view('clientes.info', compact(['cliente']));
    }

    public function edit($id)
    {
        $clientes = session('clientes');
        $index = $this->getIndex($id, $clientes);
        $cliente = $clientes[$index];
        return view('clientes.edit', compact(['cliente']));
    }

    public function update(Request $request, $id)
    {
        $clientes = session('clientes');
        $index = $this->getIndex($id, $clientes);
        $clientes[$index]['nome'] = $request->nome;
        session(['clientes' => $clientes]);
        return redirect()->route('cliente.index');
    }

    public function destroy($id)
    {
        $clientes = session('clientes');
        $index = $this->getIndex($id, $clientes);
        array_splice($clientes, $index, 1);
        session(['clientes' => $clientes]);
        return redirect()->route('cliente.index');
    }

    private function getIndex($id, $clientes) {
        $ids = array_column($clientes, 'id');
        $index = array_search($id, $ids);
        return $index;
    }
}
