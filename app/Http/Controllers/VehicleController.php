<?php

namespace App\Http\Controllers;
use App\Http\Requests\VehicleStore;
USE App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $data = Vehicle::all();
        return view('vehicles.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('vehicles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VehicleStore $request)
    {
        $input = $request->validated();
        
        Vehicle::create($input);
        return redirect()->back()->withSuccess('Vehicle created successfully!');
    }

    /**
     * Display the specified resource
     */
    public function show(string $id)
    {
        Vehicle::destroy($id);
        return redirect()->back()->withSuccess('Vehicle deleted successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Vehicle::find($id);
        
        return view('vehicles.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VehicleStore $request, string $id)
    {
        $input = $request->validated();
        Vehicle::where('id', $id)->update($input);
        return redirect()->back()->withSuccess('Vehicle updated successfully!');
    }

    /**
     * Remove the specified resource from storage.  NOT USED
     */
    public function destroy(string $id)
    {
        //
    }
}
