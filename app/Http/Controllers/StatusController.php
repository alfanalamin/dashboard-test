<?php
// StatusController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Status;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $status = Status::all(); // Use plural 'statu$status' to fetch all

        return view('pages.status.index-status', compact('status')); // Correct variable name
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.status.create-status');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Status::create($request->all());

        return redirect()->route('status.index')
            ->with('success', 'Status created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $status = Status::findOrFail($id);

        return view('pages.status.show-status', compact('status'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $status = Status::findOrFail($id);

        return view('pages.status.edit-status', compact('status'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $status = Status::findOrFail($id);
        $status->update($request->all());

        return redirect()->route('status.index')
            ->with('success', 'Status updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $status = Status::findOrFail($id);
        $status->delete();

        return redirect()->route('status.index')
            ->with('success', 'Status deleted successfully.');
    }
}
