<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Petpost extends Model
{
    use HasFactory;

    protected $casts = [
        'healh_status' => 'array',
        'petage' => 'array',
    ];

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

    public function petbreed()
    {
        return $this->belongsTo(Petbreed::class);
    }

    // Relacion  Through 1:M   petpost <-- petbreed --> pettype
    // hasOneThrough(model final que queremos acceder, model intermediario entre los 2)
    public function pettype()
    {

        return $this->hasOneThrough(Pettype::class, Petbreed::class, 'id', 'id', 'petbreed_id', 'pettype_id');
    }
}
