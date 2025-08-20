<?php

$cars = json_decode(file_get_contents(__DIR__ . '/../../../data/cars.json'), true);
$clientCars = array_filter($cars, fn($c) => $c['client'] === 'clientb');

$html = '<div class="list-group">';
foreach ($clientCars as $car) {
    $html .= "<div class='list-group-item'>
                <strong>" . strtolower($car['name']) . "</strong> - {$car['brand']} - {$car['garage']}
              </div>";
}
$html .= '</div>';

echo $html;
