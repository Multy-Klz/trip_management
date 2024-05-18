<?php

namespace App\Http\Controllers;
use App\Http\Requests\TripStore;
USE App\Models\Vehicle;
USE App\Models\Trip;
USE App\Models\Driver;
use Illuminate\Http\Request;

class TripController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        ////Retorna todos os motoristas e veiculos e passa para a view listar as viagens e mostrar as informações relacionadas
        $trips = Trip::with('driver', 'vehicle')->get();
        return view('trips.index', compact('trips'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        ////Retorna todos os motoristas e veiculos e passa para a view criar uma nova viagem
        $drivers = Driver::all();
        $vehicles = Vehicle::all();
        return view('trips.create', compact('drivers', 'vehicles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TripStore $request)
    {   
        ////Valida os dados, buscando o ID dos motoristas e veiculos e salva a viagem
        $driver = Driver::where('id', $request->driver_id)->first();
        $vehicle = Vehicle::where('id', $request->vehicle_id)->first();
        $trip = new Trip;
        $trip->driver_id = $driver->id;
        $trip->vehicle_id = $vehicle->id;
        $trip->initial_km = $request->initial_km;
        $trip->final_km = $request->final_km;
        
        $trip->save();

        return redirect()->back()->withSuccess('Trip created successfully!');
    }

    /**
     * Display the specified resource
     */
    public function show(string $id)
    {
        ////Deleta a viagem
        Trip::destroy($id);
        return redirect()->back()->withSuccess('Trip deleted successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        ////carrega os motoristas e veiculos para a view de edição de viagem
        $trip = Trip::find($id);
        $drivers = Driver::all();
        $vehicles = Vehicle::all();
        
        return view('trips.edit', compact('trip', 'drivers', 'vehicles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TripStore $request, string $id)
    {
        $input = $request->validated();
        Trip::where('id', $id)->update($input);
        return redirect()->back()->withSuccess('Trip updated successfully!');
    }

    /**
     * Remove the specified resource from storage. NOT USED
     */
    public function destroy(string $id)
    {
        //
    }
}
