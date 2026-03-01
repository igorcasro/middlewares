<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Http\Request;

Route::get('/usuarios', 'UsuarioController@index')->middleware('primeiro', 'segundo');

Route::get('/terceiro', function () {
    return 'Passou pelo terceiro middleware';
})->middleware('terceiro:joao,20');

Route::get('/produtos', 'ProdutoController@index');

Route::get('/negado', function () {
    return "Acesso negado";
})->name('negado');

Route::get('/negado-user', function () {
    return "Prezado usuário, você precisa ser admin para acessar esta página.";
})->name('negado-user');

Route::post('/login', function (Request $req) {

    $login_ok = false;
    $admin = false;
    // dd($req->all());
    switch ($req->input('user')) {
        case 'joao':
            $login_ok = $req->input('passwd') === 'senhajoao';
            $admin = true;
            break;
        case 'marcos':
            $login_ok = $req->input('passwd') === 'senhamarcos';
            break;
        default:
            $login_ok = false;
    }

    if ($login_ok) {
        $login = ['user' => $req->input('user'), 'admin' => $admin];
        $req->session()->put('login', $login);
        return response("Sucesso no login", 200);
    }

    $req->session()->flush();
    return response("Erro no login", 400);
});

Route::get('/logout', function (Request $req) {
    $req->session()->flush();
    return response('Deslogado com sucesso!', 200);
});
