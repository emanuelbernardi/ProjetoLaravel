<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $table = 'produtos';

    protected function user(){

        return $this->belongsTo(User::class, 'id_user');
        
    }

    protected function categoria(){

        return $this->belongsTo(Categoria::class, 'id_categoria');
        
    }
}
