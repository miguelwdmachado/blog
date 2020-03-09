<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserTypes extends Model
{
    protected $table = 'user_types';

    protected $fillable = [
      'type',
      'created_at',
      'updated_at'
  ];

  public function user()
  {
      return $this->belongsTo('App\User');
  }

}
