<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Postagem extends Model
{
    protected $table = 'postagens';

    protected $fillable = [
      'titulo',
      'imagem',
      'conteudo',
      'categoria_id',
      'autor_id',
      'created_at',
      'updated_at'
  ];

  public function autor() {
    return $this->hasOne('App\User', 'id', 'autor_id');
  }

  public function categoria() {
    return $this->hasOne('App\Categoria', 'id', 'categoria_id');
  }

}
