<?php

declare(strict_types=1);

$order = [
    'education',
    'governance',
    'infrastructure',
    'climate',
    'wash',
    'technology',
    'inclusion',
    'meal',
    'health',
];

$sectors = [];
foreach ($order as $key) {
    $path = __DIR__ . '/sectors-pack/' . $key . '.php';
    if (!is_file($path)) {
        continue;
    }
    $sectors[$key] = require $path;
}

return [
    'order' => $order,
    'sectors' => $sectors,
];
