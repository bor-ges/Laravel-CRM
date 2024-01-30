<?php

namespace App\Http\Controllers;

use App\Models\Abordagem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AbordagemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("gestao-oportunidade.abordagem");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("gestao-oportunidade.abordagem-create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome_abordagem' => 'required|max:4294967295',
            'tipo_abordagem' => 'required|max:4294967295',
            'data_abordagem' => 'required|numeric|max:255',


        ]);

        $abordagem = new Abordagem();

        $abordagem->nome_abordagem = $validated['nome_abordagem'];
        $abordagem->tipo_abordagem = $validated['tipo_abordagem'];
        $abordagem->data_abordagem = Carbon::parse($validated['data_abordagem'])->format('Y/m/d');


        $abordagem->save();

        return view("gestao-oportunidade.abordagem");
    }

    /**
     * Display the specified resource.
     */
    public function show(Abordagem $abordagem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Abordagem $abordagem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Abordagem $abordagem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Abordagem $abordagem)
    {
        //
    }
}
