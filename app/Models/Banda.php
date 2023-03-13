<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banda extends Model
{
    use HasFactory;


    public $timestamps=false;

    protected $fillable = [
        'nombre',
        'integrantes',
        'descripcion',
        'genero_id',
        'origen',
        'historia',
        'imagen'
    ];

    public function genero(){
        return $this->belongsTo(Genero::class);
    }
    

    protected $table = "bandas";
}
