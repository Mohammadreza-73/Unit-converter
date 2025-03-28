<?php

namespace UnitConverter\Classes;

use UnitConverter\Contracts\ConverterInterface;

class TempConverter implements ConverterInterface
{
    public function convert($value, string $fromUnit, string $toUnit)
    {
        $validUnits = ['celsius', 'fahrenheit', 'kelvin'];
        
        if (! in_array(strtolower($fromUnit), $validUnits) || ! in_array(strtolower($toUnit), $validUnits)) {
            return "Invalid units for temperature conversion.";
        }

        switch (strtolower($fromUnit)) {
            case 'fahrenheit':
                $celsius = ($value - 32) * 5/9;
                break;
            case 'kelvin':
                $celsius = $value - 273.15;
                break;
            default: // Celsius
                $celsius = $value;
        }

        switch (strtolower($toUnit)) {
            case 'fahrenheit':
                return ($celsius * 9/5) + 32;
            case 'kelvin':
                return $celsius + 273.15;
            default: // Celsius
                return $celsius;
        }
    }
}