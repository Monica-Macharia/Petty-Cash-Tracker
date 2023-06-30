<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pettycash;
use Illuminate\Http\Request;
use App\Http\Requests\PettycashRequest;
use App\Http\Resources\PettycashResource;

class PettycashController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //created a CollegeResource component to control the return
        //returning an array.
       return PettycashResource::collection(Pettycash::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PettycashRequest $request)
    {
        //created CollegeRequest
        $pettycash= Pettycash::create($request->validated());
        return new PettycashResource($pettycash);
    }

    /**
     * Display the specified resource.
     *
     * 
     */
    public function show(Pettycash $pettycash)
    {
        return new PettycashResource($pettycash);
    }

    /**
     * Update the specified resource in storage.
     *
     * 
     */
    public function update(PettycashRequest $request, Pettycash $pettycash)
    {
        $pettycash->update($request->validated());
        return new PettycashResource($pettycash);
    }

    
    public function destroy(Pettycash $pettycash)
    {
        $pettycash->delete();
        return response()->noContent();
    }
}
