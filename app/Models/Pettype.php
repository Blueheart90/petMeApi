<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pettype extends Model
{
    use HasFactory;

    public function petposts()
    {
        return $this->hasMany(Petpost::class);
    }

    public function petbreeds()
    {
        return $this->hasMany(Petbreed::class);
    }
}
