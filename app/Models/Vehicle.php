<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;
    
    ////Define os campos do Veículo que serão salvos no banco de dados
    protected $fillable = [
        'model',
        'year',
        'date_of_aquisition',
        'km_on_aquisition',
        'renavam',
    ];

    
}
