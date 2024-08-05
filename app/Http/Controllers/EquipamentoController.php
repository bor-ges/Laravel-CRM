<?php

namespace App\Http\Controllers;

use App\Models\Equipamento;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EquipamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $equipments = DB::table('equipamentos')->orderByRaw('equip_name ASC')->get();
        return view('gestao-oportunidade.equipamentos', compact('equipments'));
    }

    public function getEquip()
    {
        $equipments = DB::table('equipamentos')->orderByRaw('equip_name ASC')->get();
        return $equipments;
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'equip_name' => 'required|max:255'
        ]);

        $equipament = new Equipamento();
        $equipament->equip_name = $validated['equip_name'];
        $equipament->save();

        if ($request->input('action') == 'fill') {

            return redirect('/diario-de-obras/relatorios/fill/'.$request->input('id_report'));

        } else {

            return redirect()->route('equipamentos');
        }


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function update(Request $request)
    {
        $equip = DB::table('equipamentos')->where('id', $request->input('id'))->update(['equip_name' => $request->input('equip_name')]);
        return redirect()->route('equipamentos');
    }

    public function delete(Request $request)
    {
        $equip = DB::table('equipamentos')->where('id', $request->input('id'))->delete();
        return redirect()->route('equipamentos');
    }
}
