<?php

namespace UnitConverter\Contracts;

interface ConverterInterface
{
    public function convert($value, string $fromUnit, string $toUnit);
}