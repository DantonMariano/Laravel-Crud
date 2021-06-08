<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ReceitaModel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
  public function envia_receita(Request $request){
    $nome = $request->input('nome');
    $texto = $request->input('texto');
    $insert = [
      'nome' => $nome,
      'texto' => $texto
    ];
    ReceitaModel::insere_receita($insert);
    return back();
  }
  public function retorna_receitas(){
    $objeto = ReceitaModel::recebe_receitas();
    return view('home', ['receitas' => $objeto]);
  }
  public function deletar_receita($id){
    ReceitaModel::deleta_receita($id);
    return back();
  }
  public function altera_receita(Request $request){
    $nome  = $request->input('nome');
    $texto = $request->input('texto');
    $id    = $request->input('id');
    $update = [
      'nome'  => $nome,
      'texto' => $texto,
      'id'    => $id
    ];
    ReceitaModel::update_receita($update);
    return back();
  }
}