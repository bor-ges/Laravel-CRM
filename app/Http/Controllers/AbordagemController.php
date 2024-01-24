<?php

namespace App\Http\Controllers;

use App\Models\Abordagem;
use Illuminate\Http\Request;

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
        //
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
