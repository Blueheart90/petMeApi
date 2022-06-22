<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Models\AdoptionProcess;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\AdoptionProcessCollection;
use App\Http\Resources\V1\AdoptionProcessResource;
use App\Models\Petpost;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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


    public function status(Request $request)
    {
        $adoptions = AdoptionProcess::filter($request->all())->get();
        return new AdoptionProcessCollection($adoptions);
    }

    public function ownAdoptions()
    {
        $myAdoptions = Auth::user()->adoptionProcesses;
        return new AdoptionProcessCollection($myAdoptions);
    }

    public function createAdoption(Petpost $petpost)
    {
        // check if the petpost status is published
        if ($petpost->status == Petpost::PUBLISHED) {

            DB::transaction(function () use ($petpost) {

                // Create a new adoptionProcess
                auth()->user()->adoptionProcesses()->create(['petpost_id' => $petpost->id]);

                // Update the status of the related petpost 
                $petpost->status = Petpost::REVIEWREQUIRED;
                $petpost->save();
            });
            return response(['message' => 'Adoption created successfully'], 200);
        }
        return response(['message' => 'This petpost is not published'], 400);
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
