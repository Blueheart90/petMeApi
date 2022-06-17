<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\PetpostCollection;
use App\Http\Resources\V1\PetpostResource;
use App\Models\Petpost;
use Illuminate\Http\Request;

class PetpostController extends Controller
{

    public function index()
    {
        $latestPetposts = Petpost::latest()->paginate();
        return new PetpostCollection($latestPetposts);
    }

    public function store(Request $request)
    {
        $request->validate([
            'petbreed_id' => 'required',
            'healh_status' => 'required',
            'petage' => 'required',
            'location' => 'required',
            'petgender' => 'required',
            'petname' => 'required',
            'petsize' => 'required',
            'petdescription' => 'required',
        ]);

        $petpost = auth()->user()->petposts()->create($request->all());

        return response()->json(['message' => 'success', 'petpost' => $petpost], 200);
    }

    public function show(Petpost $petpost)
    {
        return new PetpostResource($petpost);
    }

    public function update(Request $request, Petpost $petpost)
    {
        //
    }

    public function destroy(Petpost $petpost)
    {
        $petpost->delete();
        return response()->json(['message' => 'Petpost successfully removed'], 200);
    }
}
