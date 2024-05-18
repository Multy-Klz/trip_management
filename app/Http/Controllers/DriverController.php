<?php

namespace App\Http\Controllers;
use App\Http\Requests\DriverStore;
USE App\Models\Driver;
use Illuminate\Http\Request;

////Controlador que vai lidar com as requisições e processamento das informações
class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        ////Retorna todos os motoristas e passa para a view
        $data = Driver::all();
        return view('drivers.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        ////Retorna a view para criar um novo motorista
        return view('drivers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DriverStore $request)
    {
        $input = $request->validated();
        Driver::create($input);
        return redirect()->back()->withSuccess('Driver created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        Driver::destroy($id);
        return redirect()->back()->withSuccess('Driver deleted successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Driver::find($id);
        return view('drivers.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DriverStore $request, string $id)
    {
        $input = $request->validated();
        Driver::where('id', $id)->update($input);
        return redirect()->back()->withSuccess('Driver updated successfully!');
    }

    /**
     * Remove the specified resource from storage. NOT USED
     */
    public function destroy(string $id)
    {
        //
    }
}
