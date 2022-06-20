<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;

class PetpostFilter extends ModelFilter
{
    /**
     * Related Models that have ModelFilters as well as the method on the ModelFilter
     * As [relationMethod => [input_key1, input_key2]].
     *
     * @var array
     */
    public $relations = [];

    public function petname($name)
    {
        return $this->where('petname', $name);
    }

    public function pettype($pettype)
    {
        return $this->whereHas('pettype', function ($query) use ($pettype) {
            $query->where('pettype_id', $pettype);
        });
    }

    public function search($search)
    {
        if ($search) {
            return $this->whereLike('location',  $search);
        }
    }
}
