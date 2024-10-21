<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEnderecoRequest;
use App\Http\Requests\UpdateEnderecoRequest;
use App\Models\Cidade;
use App\Models\Endereco;

class EnderecoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $enderecos = Endereco::all();
        return view('admin.enderecos.index', compact('enderecos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $cidades = Cidade::all();
        
        return view('admin.enderecos.index', compact('cidades'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEnderecoRequest $request)
    {
        //
        Endereco::create($request->all());
        return redirect()->away('/enderecos')
        ->with('success', 'Endereços possui dependentes!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $endereco = Endereco::find($id);
        return view('admin.enderecos.index', compact('endereco'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $cidades = Cidade::all();
        $endereco = Endereco::find($id);
        return view('admin.enderecos.index', compact('cidades','endereco'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEnderecoRequest $request, $id)
    {
        //
          $endereco = Endereco::find($id);
        $endereco->update($request->all());

        return redirect()->away('/enderecos')
            ->with('success', 'Endereço possui dependentes!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
          $endereco = Endereco::find($id);
        if($endereco->negocios()->count > 0 
       ||  $endereco->pontosTuristicos()->count() > 0)
        {
            return redirect()->away('/enderecos')
            ->with('error', 'Endereços possui dependentes!');
        }
        $endereco->delete();
        
        return redirect()->away('/enderecos')
            ->with('success', 'Endereços possui dependentes!');
    }
}
