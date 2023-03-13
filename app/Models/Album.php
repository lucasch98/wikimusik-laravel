<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;
    
    public $timestamps=false;
    protected $fillable = [
        'nombre',
        'banda_id',
        'fecha',
        'duracion',
    ];


    
    public function banda(){
        return $this->belongsTo(Banda::class);
    }


    protected $table = "albumes";
}
