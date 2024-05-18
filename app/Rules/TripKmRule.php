<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class TripKmRule implements Rule
{
    ////Atributo que armazena o valor do Km de inicio
    private $startKm;

    public function __construct($startKm)
    {
        $this->startKm = $startKm;
    }

    ////Função que valida se o Km final é maior que o Km de inicio
    public function passes($attribute, $value)
    {
        return $this->startKm < $value;
    }

    public function message()
    {
        return 'O Km final tem que ser maior que Km de inicio.';
    }
}
?>