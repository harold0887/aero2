<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Caso extends Model
{
    use HasFactory;
    protected $guarded = [];

    //relacion con grado, retorna el status al que pertenece
   public function status()
  {
    return $this->belongsTo(Status::class, 'status_id');
  }
}
