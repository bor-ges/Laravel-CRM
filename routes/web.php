<?php

use App\Http\Controllers\AbordagemController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContratoController;
use App\Http\Controllers\PropostaController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\EquipamentoController;
use App\Http\Controllers\InfoUserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\ObraController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ProspectoController;
use \App\Http\Controllers\MaoDeObraController;
use App\Http\Controllers\RelatorioController;

Route::group(['middleware' => 'auth'], function () {

    Route::get('funil', function () {
        return view('gestao-oportunidade.funil');
    });

    //ROTAS PARA CADA MODULO
    Route::resource('prospecto', ProspectoController::class);
    Route::resource('abordagem', AbordagemController::class);
    Route::resource('proposta', PropostaController::class);
    Route::resource('contrato',ContratoController::class);

    //FIM

    Route::get('/', [HomeController::class,'home'])->name('dashboard');


    //ROTAS CRUD USUARIOS
    Route::get('/logout', [SessionsController::class, 'destroy']);
	Route::get('/user-profile', [InfoUserController::class, 'create']);
	Route::post('/user-profile', [InfoUserController::class, 'store']);
    Route::get('/login', function () {
        return view('dashboard');
    })->name('sign-up');
    //FIM
});

Route::group(['prefix' => 'diario-de-obras'], function () {

    Route::get('/',[ObraController::class, 'index'])->name('diario-de-obras');
    Route::get('/equipamentos', [EquipamentoController::class, 'index'])->name('equipamentos');
    Route::get('/mao-de-obra', [MaoDeObraController::class, 'index'])->name('mao-de-obra');
    Route::get('/relatorios',[RelatorioController::class, 'index'])->name('relatorios');
    Route::get('/{search}', [ObraController::class, 'getAllDataProjects'])->name('detalhes-obra');
    Route::get('/relatorios/fill/{id}',[RelatorioController::class, 'toFillInReport'])->name('fill-report');
    Route::get('/relatorios/view/{id}',[RelatorioController::class, 'getReportById'])->name('view-report');
    Route::get('/relatorios/edit/{id}',[RelatorioController::class, 'getReportDataByIdToEdit'])->name('edit-report');
    Route::get('/relatorios/pdf/{id}', [RelatorioController::class, 'renderReportAsPDF'])->name('render-report-as-pdf');
    Route::get('/relatorios/delete/{id}', [RelatorioController::class, 'deleteReport'])->name('delete-report');


    Route::post('/create-group', [MaoDeObraController::class, 'createNewGroup'])->name('create-group');
    Route::post('/update-group', [MaoDeObraController::class, 'updateGroup'])->name('update-group');
    Route::post('/delete-group', [MaoDeObraController::class, 'deleteGroup'])->name('delete-group');


    Route::post('/create-member', [MaoDeObraController::class, 'addNewMember'])->name('create-member');
    Route::post('/create-customized-member', [MaoDeObraController::class, 'addCustomizedMember'])->name('create-customized-member');
    Route::post('/update-member', [MaoDeObraController::class, 'updateMember'])->name('update-member');
    Route::post('/delete-member', [MaoDeObraController::class, 'deleteMember'])->name('delete-member');

    Route::post('/create-project',[ObraController::class, 'store'])->name('create-project');
    Route::post('/create-equipament', [EquipamentoController::class, 'store'])->name('create-equipament');
    Route::post('/update-equipament', [EquipamentoController::class, 'update'])->name('update-equipament');
    Route::post('/delete-equipament', [EquipamentoController::class, 'delete'])->name('delete-equipament');

    Route::post('/create-report', [RelatorioController::class, 'store'])->name('create-report');
    Route::post('/update-report', [RelatorioController::class, 'createReport'])->name('update-report');
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [RegisterController::class, 'create']);
    Route::post('/register', [RegisterController::class, 'store']);
    Route::get('/login', [SessionsController::class, 'create']);
    Route::post('/session', [SessionsController::class, 'store']);
	Route::get('/login/forgot-password', [ResetController::class, 'create']);
	Route::post('/forgot-password', [ResetController::class, 'sendEmail']);
	Route::get('/reset-password/{token}', [ResetController::class, 'resetPass'])->name('password.reset');
	Route::post('/reset-password', [ChangePasswordController::class, 'changePassword'])->name('password.update');

});

Route::get('/login', function () {
    return view('session/login-session');
})->name('login');
