<?php

$cars = json_decode(file_get_contents(__DIR__ . '/../../../data/cars.json'), true);
$clientCars = array_filter($cars, fn($c) => $c['client'] === 'clientc');

$html = '<div class="list-group">';
foreach ($clientCars as $car) {
    $html .= "<div class='list-group-item' style='color: {$car['color']}'>
                <strong>{$car['name']}</strong> - {$car['brand']}
              </div>";
}
$html .= '</div>';

echo $html;
