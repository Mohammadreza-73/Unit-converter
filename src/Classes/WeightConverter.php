<?php

namespace UnitConverter\Classes;

use UnitConverter\Contracts\ConverterInterface;

class WeightConverter implements ConverterInterface
{
    private array $conversions = [
        'milligram' => 0.000001,
        'gram' => 0.001,
        'kilogram' => 1,
        'ounce' => 0.0283495,
        'pound' => 0.453592
    ];

    public function convert($value, string $fromUnit, string $toUnit)
    {
        if (! isset($this->conversions[$fromUnit]) || ! isset($this->conversions[$toUnit])) {
            return "Invalid units for weight conversion.";
        }
        
        $kilograms = $value * $this->conversions[$fromUnit];

        return $kilograms / $this->conversions[$toUnit];
    }
}