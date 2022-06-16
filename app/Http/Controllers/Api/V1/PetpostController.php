<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\PetpostCollection;
use App\Http\Resources\V1\PetpostResource;
use App\Models\Petpost;
use Illuminate\Http\Request;

class PetpostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $latestPetposts = Petpost::latest()->get();
        return new PetpostCollection($latestPetposts);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Petpost  $petpost
     * @return \Illuminate\Http\Response
     */
    public function show(Petpost $petpost)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Petpost  $petpost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Petpost $petpost)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Petpost  $petpost
     * @return \Illuminate\Http\Response
     */
    public function destroy(Petpost $petpost)
    {
        //
    }
}
