<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    const ADMIN = 1;
    const EDITOR = 2;

    protected $fillable = [
        'name',
        'id'
    ];

    public function users(){
        return $this->hasMany(User::class);
    }

}
