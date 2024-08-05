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
        $prospecto = DB::table('prospectos')->get();

        return view('gestao-oportunidade.prospecto', compact('prospecto'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Prospecto $prospecto)
    {
        return view('gestao-oportunidade.prospecto',compact('prospecto'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'cliente' => 'required|max:4294967295',
            'descr_cliente' => 'required|max:4294967295',
            'descr_projeto' => 'required|max:4294967295',
            'valor_estimado' => 'required|max:4294967295',
            'descr_dores' => 'required|max:4294967295',
            'data_contato' => 'required|date',
            'indicacao' => 'required|max:255',
            'chance_conversao' => 'required|max:4294967295',
            'situacao' => 'required|max:4294967295',
            'motivo' => 'required|max:4294967295',
            'data_reabordar' => 'required|date',
            'confidencial' => 'required',
        ]);
//        dd($request->all());

        $prospecto = new Prospecto();

        $prospecto->cliente = $validated['cliente'];
        $prospecto->descr_cliente = $validated['descr_cliente'];
        $prospecto->descr_projeto = $validated['descr_projeto'];
        $prospecto->valor_estimado = $validated['valor_estimado'];
        $prospecto->descr_dores = $validated['descr_dores'];
        $prospecto->data_contato = Carbon::parse($validated['data_contato'])->format('Y/m/d');
        $prospecto->indicacao = $validated['indicacao'];
        $prospecto->chance_conversao = $validated['chance_conversao'];
        $prospecto->situacao = $validated['situacao'];
        $prospecto->motivo = $validated['motivo'];
        $prospecto->data_reabordar = Carbon::parse($validated['data_reabordar'])->format('Y/m/d');
        $prospecto->confidencial = $validated['confidencial'];

        $prospecto->save();

        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(Prospecto $prospecto)
    {
        return view('gestao-oportunidade.prospecto', compact('prospecto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prospecto $prospecto)
    {
        return view('gestao-oportunidade.prospecto-edit', compact('prospecto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Prospecto $prospecto)
    {
        $validated = $request->validate([
            'cliente' => 'required|max:4294967295',
            'descr_cliente' => 'required|max:4294967295',
            'descr_projeto' => 'required|max:4294967295',
            'valor_estimado' => 'required|max:4294967295',
            'descr_dores' => 'required|max:4294967295',
            'data_contato' => 'required|date',
            'indicacao' => 'required|max:255',
            'chance_conversao' => 'required|max:4294967295',
            'situacao' => 'required|max:4294967295',
            'motivo' => 'required|max:4294967295',
            'data_reabordar' => 'required|date',
            'confidencial' => 'required',
        ]);
//        dd($request->all());

        $prospecto->cliente = $validated['cliente'];
        $prospecto->descr_cliente = $validated['descr_cliente'];
        $prospecto->descr_projeto = $validated['descr_projeto'];
        $prospecto->valor_estimado = $validated['valor_estimado'];
        $prospecto->descr_dores = $validated['descr_dores'];
        $prospecto->data_contato = Carbon::parse($validated['data_contato'])->format('Y/m/d');
        $prospecto->indicacao = $validated['indicacao'];
        $prospecto->chance_conversao = $validated['chance_conversao'];
        $prospecto->situacao = $validated['situacao'];
        $prospecto->motivo = $validated['motivo'];
        $prospecto->data_reabordar = Carbon::parse($validated['data_reabordar'])->format('Y/m/d');
        $prospecto->confidencial = $validated['confidencial'];

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
