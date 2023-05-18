<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Noticia extends Model
{
    use HasFactory;
    protected $fillable = ['titulo', 'cuerpo', 'autor', 'imagen'];   
    use SoftDeletes;
    protected $dated = ['deleted_at'];
}
