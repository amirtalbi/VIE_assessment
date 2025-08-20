<?php

$cars = json_decode(file_get_contents(__DIR__ . '/../../../../data/cars.json'), true);
$garages = json_decode(file_get_contents(__DIR__ . '/../../../../data/garages.json'), true);
$clientCars = array_filter($cars, fn($c) => $c['customer'] === 'clienta');

$garageMap = [];
foreach ($garages as $garage) {
    $garageMap[$garage['id']] = $garage['title'];
}

$html = '<div class="list-group">';
foreach ($clientCars as $car) {
    $dateFormatted = date('d/m/Y', $car['year']);
    
    $garageName = isset($garageMap[$car['garageId']]) ? $garageMap[$car['garageId']] : 'Garage inconnu';
    
    $html .= "<div class='list-group-item'>
                <strong>{$car['modelName']}</strong> - {$car['brand']} - {$dateFormatted} - {$car['power']} HP - {$garageName}
              </div>";
}
$html .= '</div>';

echo $html;
