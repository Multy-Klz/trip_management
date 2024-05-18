<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;
    ////Define os campos da Viagem que serão salvos no banco de dados
    protected $fillable = [
        'driver_id',
        'vehicle_id',
        'initial_km',
        'final_km',
    ];

    ////Relacionamento entre a viagem e o motorista e o veículo
    public function driver()
    {
        return $this->belongsTo('App\Models\Driver', 'driver_id');
    }

    public function vehicle()
    {
        return $this->belongsTo('App\Models\Vehicle', 'vehicle_id');
    }
}