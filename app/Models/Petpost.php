<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Petpost extends Model
{
    use HasFactory;

    const PUBLISHED = 1;
    const REVIEWREQUIRED = 2;
    const COMPLETED = 3;

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
