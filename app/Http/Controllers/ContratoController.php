<?php

namespace App\Http\Controllers;

use App\Models\Contrato;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContratoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contratos = DB::table('contratos')->get();
        return view('gestao-oportunidade.contrato', compact('contratos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Contrato $contrato)
    {
        return view('gestao-oportunidade.contrato-create',compact('contrato'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'titulo_contrato' => 'required|max:255',
            'descricao' => 'required|max:4294967295',
            'tipo' => 'required|max:255',
            'data_contrato' => 'required|date',
            'numero_contrato' => 'required|max:4294967295',
            'arquivo_contrato' => 'filled|file|mimetypes:application/pdf, application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            'situacao' => 'required|max:4294967295',
            'motivo_recusado' => 'max:4294967295',
        ]);
//        dd($request->all());
        $contrato = new Contrato();

        $contrato->titulo_contrato = $validated['titulo_contrato'];
        $contrato->descricao = $validated['descricao'];
        $contrato->tipo = $validated['tipo'];
        $contrato->data_contrato = Carbon::parse($validated['data_contrato'])->format('Y/m/d');
        $contrato->numero_contrato = $validated['numero_contrato'];
        $contrato->arquivo_contrato = $validated['arquivo_contrato'];

        if ($request->hasFile('arquivo_contrato')) {
            $nomeArquivo = $request->file('arquivo_contrato')->getClientOriginalName(); //pega o nome original do arquivo para salvar no banco
            $path = $request->file('arquivo_contrato')->storeAs('/assets/arquivos-contrato', $nomeArquivo); // Armazene o arquivo na pasta 'arquivos'

            $contrato->arquivo_contrato = $path; // Salve o caminho do arquivo no banco de dados
        }

        $contrato->situacao = $validated['situacao'];
        $contrato->motivo_recusado = $validated['motivo_recusado'];

        $contrato->save();

        return redirect('/contrato')->with('success', 'Contrato salvo com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Contrato $contrato)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contrato $contrato)
    {
        return view('gestao-oportunidade.contrato-edit', compact('contrato'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contrato $contrato)
    {
        $validated = $request->validate([
            'titulo_contrato' => 'required|max:255',
            'descricao' => 'required|max:4294967295',
            'tipo' => 'required|date|max:255',
            'data_contrato' => 'required|date',
            'numero_contrato' => 'required|max:4294967295',
            'arquivo_contrato' => 'filled|file|mimetypes:application/pdf, application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            'situacao' => 'required|max:4294967295',
            'motivo_recusado' => 'max:4294967295',
        ]);
//        dd($request->all());

        $contrato->titulo_contrato = $validated['titulo_contrato'];
        $contrato->descricao = $validated['descricao'];
        $contrato->tipo = $validated['tipo'];
        $contrato->data_contrato = Carbon::parse($validated['data_contrato'])->format('Y/m/d');
        $contrato->numero_contrato = $validated['numero_contrato'];
        $contrato->arquivo_contrato = $validated['arquivo_contrato'];

        if ($request->hasFile('arquivo_contrato')) {
            $nomeArquivo = $request->file('arquivo_contrato')->getClientOriginalName(); //pega o nome original do arquivo para salvar no banco
            $path = $request->file('arquivo_contrato')->storeAs('/assets/arquivos-contrato', $nomeArquivo); // Armazene o arquivo na pasta 'arquivos'

            $contrato->arquivo_contrato = $path; // Salve o caminho do arquivo no banco de dados
        }

        $contrato->contrato = $validated['situacao'];
        $contrato->motivo_recusado = $validated['motivo_recusado'];

        $contrato->save();

        return redirect('/contrato')->with('success', 'Contrato salvo com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contrato $contrato)
    {
        $contrato->delete();
        return redirect()->route('dashboard');
    }
}
