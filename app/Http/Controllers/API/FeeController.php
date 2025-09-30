<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Fee;
use App\Http\Requests\StoreFeeRequest;
use App\Http\Requests\UpdateFeeRequest;

class FeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fees = Fee::where('active', 1)->get();
        return response($fees, 200);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFeeRequest $request)
    {
        $newFee = Fee::create($request->validated());
        return response($newFee, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Fee $fee)
    {
        return response($fee, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFeeRequest $request, Fee $fee)
    {
        $fee->update($request->validated());
        $fee->save();
        return response($fee, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fee $fee)
    {
        $fee->active = 0;
        $fee->save();
        return response(true, 200);
    }
}
