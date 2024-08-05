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
        $abordagens = DB::table('abordagens')->get();
        return view("gestao-oportunidade.abordagem", compact('abordagens'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $abordagens = new Abordagem(); // Instância vazia para a view
        return view("gestao-oportunidade.abordagem-create", compact('abordagens'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome_abordagem' => 'required|max:255',
            'tipo' => 'required|max:255',
            'data_abordagem' => 'required|date',
            'meio_contato' => 'required|max:255',
            'descricao' => 'required|max:255',
            'objecao' => 'max:255',
            'arquivo_abordagem' => 'filled|file|mimetypes:application/pdf, application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document'
        ]);
//    dd($request->all());
        $abordagem = new Abordagem();

        $abordagem->nome_abordagem = $validated['nome_abordagem'];
        $abordagem->tipo = $validated['tipo'];
        $abordagem->data_abordagem = Carbon::parse($validated['data_abordagem'])->format('Y/m/d');
        $abordagem->meio_contato = $validated['meio_contato'];
        $abordagem->descricao = $validated['descricao'];
        $abordagem->objecao = $validated['objecao'];

        if ($request->hasFile('arquivo_abordagem')) {
            $nomeArquivo = $request->file('arquivo_abordagem')->getClientOriginalName();
            $path = $request->file('arquivo_abordagem')->storeAs('public/assets/arquivos-abordagem', $nomeArquivo);
            $abordagem->arquivo_abordagem = $path;
        }

        $abordagem->save();

        return redirect('/abordagem')->with('success', 'Abordagem salva com sucesso!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function edit(Abordagem $abordagens)
    {
        return view('gestao-oportunidade.abordagem-edit', compact('abordagens'));
    }
    public function update(Request $request, Abordagem $abordagem)
    {
        $validated = $request->validate([
            'nome_abordagem' => 'required|max:255',
            'tipo' => 'required|max:255',
            'meio_contato' =>  'required|max:255',
            'data_abordagem' => 'required|date',
            'descricao' => 'required|max:255',
            'objecao' => 'max:255',
            'arquivo_abordagem' => 'filled|file|mimetypes:application/pdf, application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document',
        ]);

        $abordagem->nome_abordagem = $validated['nome_abordagem'];
        $abordagem->tipo = $validated['tipo'];
        $abordagem->meio_contato = $validated['meio_contato']; // Adicionado caso esteja faltando
        $abordagem->data_abordagem = Carbon::parse($validated['data_abordagem'])->format('Y/m/d');
        $abordagem->descricao = $validated['descricao'];
        $abordagem->objecao = $validated['objecao'];

        if ($request->hasFile('arquivo_abordagem')) {
            $nomeArquivo = $request->file('arquivo_abordagem')->getClientOriginalName();
            $path = $request->file('arquivo_abordagem')->storeAs('public/assets/arquivos-abordagem', $nomeArquivo);
            $abordagem->arquivo_abordagem = $path;
        }

        $abordagem->save();

        return redirect('/abordagem')->with('success', 'Abordagem atualizada com sucesso!');
    }


    /**
     * Update the specified resource in storage.
     */


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Abordagem $abordagem)
    {
        $abordagem->delete();
        return redirect('/dashboard')->with('success', 'Abordagem removida com sucesso!');
    }
}
