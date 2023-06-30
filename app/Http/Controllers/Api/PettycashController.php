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
        return PettycashResource::collection(PettyCash::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pettycash = Pettycash::create($request->validated());
        return new PettycashResource($pettycash);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pettycash  $pettycash
     * @return \Illuminate\Http\Response
     */
    public function show(Pettycash $pettycash)
    {
        return new PettycashResource($pettycash)
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pettycash  $pettycash
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pettycash $pettycash)
    {
        $pettycash->update($request->validated());
        return new PettycashResource($pettycash);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pettycash  $pettycash
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pettycash $pettycash)
    {
        $pettycash->delete();
        return response()->noContent();
    }
}
