<?php
require './vendor/autoload.php';

use UnitConverter\Classes\TempConverter;
use UnitConverter\Classes\LengthConverter;
use UnitConverter\Classes\WeightConverter;

$conversionTypes = [
    'length' => ['millimeter', 'centimeter', 'meter', 'kilometer', 'inch', 'foot', 'yard', 'mile'],
    'weight' => ['milligram', 'gram', 'kilogram', 'ounce', 'pound'],
    'temperature' => ['celsius', 'fahrenheit', 'kelvin']
];

$converterStrategies = [
    'length' => new LengthConverter(),
    'weight' => new WeightConverter(),
    'temperature' => new TempConverter(),
];

$result = '';
$conversionType = $_POST['conversion_type'] ?? 'length';
$fromUnit = $_POST['from_unit'] ?? $conversionTypes[$conversionType][0];
$toUnit = $_POST['to_unit'] ?? $conversionTypes[$conversionType][1];
$value = $_POST['value'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['convert'])) {
    if (! is_numeric($value)) {
        $result = "Please enter a valid number.";
    } else {
        $converter = $converterStrategies[$conversionType];
        $convertedValue = $converter->convert($value, $fromUnit, $toUnit);
        $result = "$value $fromUnit = " . round($convertedValue, 6) . " $toUnit";
    }
}
