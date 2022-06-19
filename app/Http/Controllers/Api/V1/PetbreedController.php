<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Petbreed;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\PetbreedCollection;
use App\Models\Pettype;

class PetbreedController extends Controller
{

    public function index()
    {
        $breeds = Petbreed::all();
        return new PetbreedCollection($breeds);
    }

    public function getCatbreeds()
    {
        $breeds = Petbreed::where('pettype_id', Pettype::CAT)->get();
        return new PetbreedCollection($breeds);
    }

    public function getDogbreeds()
    {
        $breeds = Petbreed::where('pettype_id', Pettype::DOG)->get();
        return new PetbreedCollection($breeds);
    }

    public function getBirdbreeds()
    {
        $breeds = Petbreed::where('pettype_id', Pettype::BIRD)->get();
        return new PetbreedCollection($breeds);
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Petbreed $petbreed)
    {
        //
    }

    public function update(Request $request, Petbreed $petbreed)
    {
        //
    }

    public function destroy(Petbreed $petbreed)
    {
        //
    }
}
