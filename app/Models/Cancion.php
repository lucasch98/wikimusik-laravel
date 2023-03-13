<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cancion extends Model
{
    use HasFactory;

    public $timestamps=false;

    protected $fillable = [
        'nombre',
        'album_id',
        'banda_id',
        'duracion',
        'url',
    ];

    
    public function banda(){
        return $this->belongsTo(Banda::class);
    }

    public function album(){
        return $this->belongsTo(Album::class);
    }

    protected $table = "canciones";
}
