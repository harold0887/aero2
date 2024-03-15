<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    protected $guarded = [];

     //relacion con salida, retorna la salida al que pertenece
  public function salida()
  {
    return $this->belongsTo(Salida::class);
  }
}
