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
        $trips = Trip::with('drivers')->get();
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
   
        // Cria uma nova viagem com os dados validados
        $trip = new Trip;
        $trip->vehicle_id = $request->vehicle_id;
        $trip->initial_km = $request->initial_km;
        $trip->final_km = $request->final_km;
        
        $trip->save();
        
        // Verifica se driver_id é um array antes de iterar sobre ele
        if (is_array($request->driver_id)) {
            // Associa os motoristas à viagem
            foreach ($request->driver_id as $driver_id) {
                $trip->drivers()->attach($driver_id);
            }
        }
        
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
        // Busca a viagem pelo id
        $trip = Trip::with('drivers')->find($id);

        // Retorna todos os motoristas e veículos
        $drivers = Driver::all();
        $vehicles = Vehicle::all();

        // Passa a viagem, os motoristas e os veículos para a view
        return view('trips.edit', compact('trip', 'drivers', 'vehicles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TripStore $request, string $id)
    {
        $input = $request->validated();

        // Atualiza a viagem
        $trip = Trip::where('id', $id)->first();
        $trip->update($input);
        
        // Remove os motoristas duplicados
        $uniqueDrivers = array_unique($request->driver_id);

        // Atualiza os motoristas da viagem
        $trip->drivers()->sync($uniqueDrivers);
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
