<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class ReceitaModel extends Model
{
  public static function insere_receita($receita)
  {
    $nome  = $receita['nome'];
    $texto = $receita['texto'];

    $insert = [
      'nome' => $nome,
      'receita' => $texto
    ];

    DB::table('receitas')
    ->insert($insert);

  }
  public static function recebe_receitas(){
    return DB::table('receitas')->get();
  }
  public static function deleta_receita($id){
    DB::table('receitas')
    ->where('id', '=' ,$id)
    ->delete();
  }
}
