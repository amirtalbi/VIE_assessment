<?php

$cars = json_decode(file_get_contents(__DIR__ . '/../../../data/cars.json'), true);
$clientCars = array_filter($cars, fn($c) => $c['client'] === 'clienta');

$html = '<div class="list-group">';
foreach ($clientCars as $car) {
    $html .= "<div class='list-group-item'>
                <strong>{$car['name']}</strong> - {$car['brand']} - {$car['year']} - {$car['hp']} HP
              </div>";
}
$html .= '</div>';

echo $html;
