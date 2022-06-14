<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Petbreed extends Model
{
    use HasFactory;

    public function petposts()
    {
        return $this->hasMany(Petpost::class);
    }

    public function pettype()
    {
        return $this->belongsTo(Pettype::class);
    }
}
