<?php

namespace App\Http\Controllers;

use App\Models\Obra;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ObraController extends Controller
{

    /*
    * Método responsável por retornar os dados da tabela "OBRAS".
    * Return Array
    */

    public function index()
    {
        $projects = DB::table('obras')->get();
        return view('gestao-oportunidade/obra', compact('projects'));
    } 

    public function getProjectsaData()
    {
        $projects = DB::table('obras')->orderByRaw('title ASC')->get();
        return $projects;
    }

    public function getProjectsaDataBySearch($search)
    {
        $projects = DB::table('obras')->where('search', $search)->get();
        return $projects;
    }

    /*
    * Método responsável por retornar os dados de uma obra esprcífica da tabela "OBRAS".
    * Return Array
    */

    public function getAllDataProjects(string $search)
    {
        $specificProject = DB::table('obras')->where('search', $search)->get();
        $reports = DB::table('relatorios')->where('related_project', $search)->get();
        return view('gestao-oportunidade.detalhe', compact('specificProject', 'reports'));
    }

    /*
    * Método responsável por inserir os dados que vem do formulário, na tabela "OBRAS".
    * Return Boolean
    */

    public function store(Request $request)
    {

        $validated = $request->validate([
            'title' => 'required|max:255',
            'num_contrato' => 'required|max:255',
            'tipo_contrato' => 'required|max:255',
            'contratante' => 'required|max:255',
            'endereco' => 'required|max:255',
            'prazo_contratual' => 'required|max:255',
            'data_inicio' => 'required|date|max:255',
            'prev_termino' => 'required|date|max:255',
            'img_capa' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'resumo' => 'required|max:4294967295',
            'status' => 'required|max:255'
        ]);

        $project = new Obra();

        $project->title = $validated['title'];
        $project->num_contrato = $validated['num_contrato'];
        $project->tipo_contrato = $validated['tipo_contrato'];
        $project->contratante = $validated['contratante'];
        $project->endereco = $validated['endereco'];
        $project->prazo_contratual = $validated['prazo_contratual'];
        $project->data_inicio = Carbon::parse($validated['data_inicio'])->format('d/m/Y');
        $project->prev_termino = Carbon::parse($validated['prev_termino'])->format('d/m/Y');;
        $project->resumo = $validated['resumo'];
        $project->status = $validated['status'];

        $img = $request->file('img_capa');
        $img_name = md5(time()).'.'.$img->getClientOriginalExtension();
        $img->move('assets/img/obras', $img_name);
        $project->img_capa = $img_name;
        
        $search = strtolower($validated['title']);
        $search = str_replace(' ', '-', $search);
        $project->search = $search;

        $project->save();

        return redirect()->route('diario-de-obras');

    }

    public function edit(Obra $obra)
    {
        //
    }

    public function update(Request $request, Obra $obra)
    {
        //
    }

    public function destroy(Obra $obra)
    {
        //
    }

}
