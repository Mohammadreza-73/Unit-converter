<?php

namespace UnitConverter\Classes;

use UnitConverter\Contracts\ConverterInterface;

class LengthConverter implements ConverterInterface
{
    private array $conversions = [
        'millimeter' => 0.001,
        'centimeter' => 0.01,
        'meter' => 1,
        'kilometer' => 1000,
        'inch' => 0.0254,
        'foot' => 0.3048,
        'yard' => 0.9144,
        'mile' => 1609.34
    ];

    public function convert($value, string $fromUnit, string $toUnit)
    {
        if (! isset($this->conversions[$fromUnit]) || ! isset($this->conversions[$toUnit])) {
            return "Invalid units for length conversion.";
        }
        
        $meters = $value * $this->conversions[$fromUnit];

        return $meters / $this->conversions[$toUnit];
    }
}