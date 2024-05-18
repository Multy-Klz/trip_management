<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;

    ////Define os campos do Motorista que serão salvos no banco de dados
    protected $fillable = [
        'name',
        'birth_date',
        'cnh_number',
    ];

    public function drivers()
    {
        return $this->belongsToMany(Driver::class);
    }
}
