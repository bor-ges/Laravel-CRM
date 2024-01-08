<?php

namespace App\Http\Controllers;

use App\Models\Prospecto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProspectoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prospecto = DB::table('prospecto')->get();

        return view('gestao-oportunidade.prospecto', compact('prospecto'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('gestao-oportunidade.prospecto');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome_cliente' => 'required|max:4294967295',
            'conhecimento' => 'required|max:4294967295',
            'origem' => 'required|max:4294967295',
            'nome_oportunidade' => 'required|max:4294967295',
            'tipo_oportunidade' => 'required|max:4294967295',
            'data' => 'required|numeric|max:255',
            'estimado' => 'required|numeric|max:255',
            'probabilidade' => 'required|max:4294967295',
            'proximo' => 'required|max:4294967295',

        ]);

        $prospecto = new Prospecto();

        $prospecto->nome_cliente = $validated['nome_cliente'];
        $prospecto->conhecimento = $validated['conhecimento'];
        $prospecto->origem = $validated['origem'];
        $prospecto->nome_oportunidade = $validated['nome_oportunidade'];
        $prospecto->tipo_oportunidade = $validated['tipo_oportunidade'];
        $prospecto = Carbon::parse($validated['prospecto'])->format('Y/m/d');
        $prospecto->estimado = $validated['estimado'];
        $prospecto->probabilidade = $validated['probabilidade'];
        $prospecto->proximo = $validated['proximo'];

        $prospecto->save();

        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(Prospecto $prospecto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prospecto $prospecto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Prospecto $prospecto): \Illuminate\Http\RedirectResponse
    {
        $validated = $request->validate([
            'nome_cliente' => 'required|max:4294967295',
            'conhecimento' => 'required|max:4294967295',
            'origem' => 'required|max:4294967295',
            'nome_oportunidade' => 'required|max:4294967295',
            'tipo_oportunidade' => 'required|max:4294967295',
            'data' => 'required|numeric|max:255',
            'estimado' => 'required|numeric|max:255',
            'probabilidade' => 'required|max:4294967295',
            'proximo' => 'required|max:4294967295',

        ]);

        $prospecto->nome_cliente = $validated['nome_cliente'];
        $prospecto->conhecimento = $validated['conhecimento'];
        $prospecto->origem = $validated['origem'];
        $prospecto->nome_oportunidade = $validated['nome_oportunidade'];
        $prospecto->tipo_oportunidade = $validated['tipo_oportunidade'];
        $prospecto->data = $validated['data'];
        $prospecto->estimado = $validated['estimado'];
        $prospecto->probabilidade = $validated['probabilidade'];
        $prospecto->proximo = $validated['proximo'];

        $prospecto->save();

        return redirect()->route('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prospecto $prospecto)
    {
        $prospecto->delete();
        return redirect()->route('dashboard');
    }
}
