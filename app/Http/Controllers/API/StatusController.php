<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Status;
use App\Http\Requests\StoreStatusRequest;
use App\Http\Requests\UpdateStatusRequest;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $statuses = Status::where('active', 1)->get();
        return response($statuses, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStatusRequest $request)
    {
        $newStatus = Status::create($request->validated());
        return response($newStatus, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Status $status)
    {
        return response($status, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStatusRequest $request, Status $status)
    {
        $status->update($request->validated());
        $status->save();
        return response($status, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Status $status)
    {
        $status->active = 0;
        $status->save();
        return response(true, 200);
    }
}
