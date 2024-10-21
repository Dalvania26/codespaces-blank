<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAutorRequest;
use App\Http\Requests\UpdateAutorRequest;
use App\Models\Autor;

class AutorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $autores = Autor::paginate(25);
        return view('admin.autores.index', compact('autores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.autores.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAutorRequest $request)
    {
        //
        Autor::create($request->all());
        return redirect()->away('/autores')
            ->with('success', 'Autor criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $autor = Autor::find($id);
        return view('admin.autores.show', compact('autor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $autor = Autor::find($id);
        return view('admin.autores.edit', compact('autor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAutorRequest $request, $id)
    {
        //
         $autor = Autor::find($id);
        $autor->update($request->all());
        return redirect()->away('/autores')
            ->with('success', 'Autor atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     * route('admin.autores.index',$autor)
     */
    public function destroy($id)
    {
        //
        $autor = Autor::find($id);
        if ($autor->noticias()->count() > 0) {

            return redirect()->away('/autores')
                ->with('success', 'Autor possui dependentes!');
        }
        $autor->delete();
        return redirect()->away('/autores')
            ->with('success', 'Autor criado com sucesso!');

            
    }
}
