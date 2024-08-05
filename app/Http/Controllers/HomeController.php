<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\AbordagemController;
use App\Http\Controllers\ProspectoController;
use App\Http\Controllers\PropostaController;
use App\Http\Controllers\ContratoController;

class HomeController extends Controller
{
    public function home()
    {
        $prospectos = DB::table('prospectos')->get();
        $abordagens = DB::table('abordagens')->get();
        $propostas = DB::table('propostas')->get();
        $contratos = DB::table('contratos')->get();
//        dd($prospectos, $abordagens, $propostas, $contratos);
        return view('dashboard', compact('prospectos', 'abordagens', 'propostas', 'contratos'));
    }
}
