<?php

namespace App\Http\Controllers;

use App\Models\Proposta;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class PropostaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $propostas = DB::table('propostas')->get();
        return view('gestao-oportunidade.proposta', compact('propostas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Proposta $proposta)
    {
    return view('gestao-oportunidade.proposta-create', compact('proposta'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome_proposta' => 'required|max:4294967295',
            'tipo_proposta' => 'required|max:4294967295',
            'data_proposta' => 'required|date|max:255',
            'descricao' => 'required|max:4294967295',
            'arquivo_proposta' => 'filled|file|mimetypes:application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document',
        ]);
//        dd($request->all());

        $proposta = new Proposta();

        $proposta->nome_proposta = $validated['nome_proposta'];
        $proposta->tipo_proposta = $validated['tipo_proposta'];
        $proposta->data_proposta = Carbon::parse($validated['data_proposta'])->format('Y/m/d');
        $proposta->descricao = $validated['descricao'];
        $proposta->arquivo_proposta = $validated['arquivo_proposta'];

        if ($request->hasFile('arquivo_proposta')) {
            $nomeArquivo = $request->file('arquivo_proposta')->getClientOriginalName();
            $path = $request->file('arquivo_proposta')->storeAs('/assets/arquivos-proposta', $nomeArquivo); // Armazene o arquivo na pasta 'arquivos'

            $proposta->arquivo_proposta = $path; // Salve o caminho do arquivo no banco de dados
        }

        $proposta->save();

        return redirect('/proposta')->with('success', 'Proposta salva com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Proposta $proposta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Proposta $proposta)
    {
        return view('gestao-oportunidade.proposta-edit', compact('proposta'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Proposta $proposta)
    {
        {
            $validated = $request->validate([
                'nome_proposta' => 'required|max:4294967295',
                'tipo_proposta' => 'required|max:4294967295',
                'data_proposta' => 'required|date|max:255',
                'descricao' => 'required|max:4294967295',
                'arquivo_proposta' => 'filled|file|mimetypes:application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            ]);
//        dd($request->all());

            $proposta->nome_proposta = $validated['nome_proposta'];
            $proposta->tipo_proposta = $validated['tipo_proposta'];
            $proposta->data_proposta = Carbon::parse($validated['data_proposta'])->format('Y/m/d');
            $proposta->descricao = $validated['descricao'];
            $proposta->arquivo_proposta = $validated['arquivo_proposta'];

            if ($request->hasFile('arquivo_proposta')) {
                $nomeArquivo = $request->file('arquivo_proposta')->getClientOriginalName();
                $path = $request->file('arquivo_proposta')->storeAs('/assets/arquivos-proposta', $nomeArquivo); // Armazene o arquivo na pasta 'arquivos'

                $proposta->arquivo_proposta = $path; // Salve o caminho do arquivo no banco de dados
            }

            $proposta->save();

            return redirect('/proposta')->with('success', 'Proposta salva com sucesso!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Proposta $proposta)
    {
        //
    }
}
