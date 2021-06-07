<?php
use Illuminate\Support\Facades\Route;

Route::get('/', 'App\Http\Controllers\HomeController@retorna_receitas');
Route::post('/', 'App\Http\Controllers\HomeController@envia_receita');
Route::get('/deletar/{id}', 'App\Http\Controllers\HomeController@deletar_receita');