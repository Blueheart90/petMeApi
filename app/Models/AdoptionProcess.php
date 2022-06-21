<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Model;

class AdoptionProcess extends Model
{
    use HasFactory, Filterable;

    const REVIEWREQUIRED = 1;
    const REJECTED = 2;
    const COMPLETED = 3;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function petpost()
    {
        return $this->belongsTo(Petpost::class);
    }
}
