<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;
    ////Define os campos da Viagem que serão salvos no banco de dados
    protected $fillable = [
        'vehicle_id',
        'initial_km',
        'final_km',
    ];

//// Relacionamento entre a viagem e o veículo
public function vehicle()
{
    return $this->belongsTo('App\Models\Vehicle', 'vehicle_id');
}

//// Relacionamento entre a viagem e os motoristas
public function drivers()
{
    return $this->belongsToMany(Driver::class, 'driver_trip');
}
}