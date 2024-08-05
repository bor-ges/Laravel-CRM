<?php

namespace App\Http\Controllers;

use App\Models\Grupo;
use App\Http\Controllers\Controller;
use App\Models\Tecnico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MaoDeObraController extends Controller
{

    //MEMBROS

    public function getMembers()
    {
        $tecnico = DB::table('tecnicos')->orderByRaw('tec_name ASC')->get();
        return $tecnico;
    }

    public function addNewMember(Request $request)
    {

        $validated = $request->validate([
            'tec_name' => 'required|max:255',
            'tec_grupo' => 'required|max:255'
        ]);

        $tecnico = new Tecnico();

        $tecnico->tec_name = $validated['tec_name'];
        $tecnico->tec_func = '';
        $tecnico->tec_entrada = '';
        $tecnico->tec_saida = '';
        $tecnico->tec_interv = '';
        $tecnico->tec_grupo = $validated['tec_grupo'];
        $tecnico->tec_status = 'common';

        $tecnico->save();

        if ($request->input('action') == 'fill') {

            return redirect('/diario-de-obras/relatorios/fill/'.$request->input('id_report'));

        } else {

            return redirect()->route('mao-de-obra');
        }

    }

    public function addCustomizedMember(Request $request)
    {

        $validated = $request->validate([
            'tec_name' => 'required|max:255',
            'tec_func'=> 'required|max:255',
            'tec_entrada'=> 'required|max:255',
            'tec_saida'=> 'required|max:255',
            'tec_interv'=> 'required|max:255',
            'tec_grupo' => 'required|max:255'
        ]);

        $tecnico = new Tecnico();

        $tecnico->tec_name = $validated['tec_name'];
        $tecnico->tec_func = $validated['tec_func'];
        $tecnico->tec_entrada = $validated['tec_entrada'];
        $tecnico->tec_saida = $validated['tec_saida'];
        $tecnico->tec_interv = $validated['tec_interv'];
        $tecnico->tec_grupo = $validated['tec_grupo'];
        $tecnico->tec_status = 'custom';

        $tecnico->save();

        return redirect()->route('mao-de-obra');
    }

    public function updateMember(Request $request)
    {
        $tecnico = DB::table('tecnicos')->where('id', $request->input('id'))->update(['tec_name' => $request->input('tec_name')]);
        return redirect()->route('mao-de-obra');
    }

    
    public function deleteMember(Request $request)
    {
        $tecnico = DB::table('tecnicos')->where('id', $request->input('id'))->delete();
        return redirect()->route('mao-de-obra');
    }

    public function getCustomizedMembers()
    {
        $custom = DB::table('tecnicos')->where('tec_status', 'custom')->orderByRaw('tec_name ASC')->get();
        return $custom;
    }

    //GRUPOS

    public function getGroups()
    {
        $grupo = DB::table('grupos')->orderByRaw('grupo ASC')->get();
        return $grupo;
    }

    public function createNewGroup(Request $request)
    {
        $validated = $request->validate([
            'grupo' => 'required|max:255'
        ]);

        $group = new Grupo();

        $group->grupo = $validated['grupo'];
        $group->status = 'Visible';
        $group->save();

        return redirect()->route('mao-de-obra');
    }

    public function updateGroup(Request $request)
    {
        $tecnico = DB::table('grupos')->where('id', $request->input('id'))->update(['grupo' => $request->input('grupo')]);
        return redirect()->route('mao-de-obra');
    }

    public function deleteGroup(Request $request)
    {
        $tecnico = DB::table('grupos')->where('id', $request->input('id'))->delete();
        return redirect()->route('mao-de-obra');
    }

    public function index()
    {
        $grupo = self::getGroups();
        $tecnico = self::getMembers();
        $custom = self::getCustomizedMembers();
        return view('gestao-oportunidade/mao-de-obra', compact('grupo', 'tecnico', 'custom'));
    }
}
