<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Models\AdoptionProcess;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\AdoptionProcessCollection;
use App\Models\Petpost;
use Illuminate\Support\Facades\Auth;

class AdoptionProcessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $latesAdoptions = AdoptionProcess::latest()->paginate();
        return new AdoptionProcessCollection($latesAdoptions);
    }


    public function search(Request $request)
    {
        $adoptions = AdoptionProcess::filter($request->all())->get();
        return new AdoptionProcessCollection($adoptions);
    }

    public function ownAdoptions()
    {
        $myAdoptions = Auth::user()->adoptionProcesses;
        return new AdoptionProcessCollection($myAdoptions);
    }

    public function createAdoption(Request $request)
    {
        $request->validate([
            'petpost_id' => 'required',
        ]);
        // Create a new adoptionProcess
        auth()->user()->adoptionProcess()->create($request->all());

        // Update the status of the related petpost 
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AdoptionProcess  $adoptionProcess
     * @return \Illuminate\Http\Response
     */
    public function show(AdoptionProcess $adoptionProcess)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AdoptionProcess  $adoptionProcess
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AdoptionProcess $adoptionProcess)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AdoptionProcess  $adoptionProcess
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdoptionProcess $adoptionProcess)
    {
        //
    }
}
