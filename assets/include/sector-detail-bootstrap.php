<?php

declare(strict_types=1);

/**
 * Expects $sectorKey (string) set by caller, e.g. sector-education.php.
 */
$db = require __DIR__ . '/sectors-data.php';

if (!isset($sectorKey) || !is_string($sectorKey) || $sectorKey === '') {
    header('Location: sector.php', true, 302);
    exit;
}

if (!isset($db['sectors'][$sectorKey])) {
    header('Location: sector.php', true, 302);
    exit;
}

$sector = $db['sectors'][$sectorKey];
$order = $db['order'];
$idx = array_search($sectorKey, $order, true);
$idx = $idx === false ? 0 : (int) $idx;

$prevKey = $idx > 0 ? $order[$idx - 1] : null;
$nextKey = $idx < count($order) - 1 ? $order[$idx + 1] : null;
$sectorIndex = $idx + 1;

/* Per-sector photography */
$sectorImages = [
    'education'      => [
        'hero'    => 'assets/img/services-01.jpg',
        'gallery' => [
            'assets/img/education/1.jpeg',
            'assets/img/education/2.jpeg',
            'assets/img/education/3.jpeg',
        ],
    ],
    'governance'     => [
        'hero'    => 'assets/img/governance/1.jpeg',
        'gallery' => [
            'assets/img/governance/1.jpeg',
            'assets/img/governance/2.jpg',
            'assets/img/governance/3.jpg',
        ],
    ],
    'infrastructure' => [
        'hero'    => 'assets/img/engineering/1.jpeg',
        'gallery' => [
            'assets/img/engineering/1.jpeg',
            'assets/img/engineering/2.jpeg',
            'assets/img/engineering/3.jpg',
        ],
    ],
    'climate'        => [
        'hero'    => 'assets/img/climate/1.jpeg',
        'gallery' => [
            'assets/img/climate/2.jpeg',
            'assets/img/climate/3.jpeg',
            'assets/img/climate/4.jpeg',
        ],
    ],
    'wash'           => [
        'hero'    => 'assets/img/water/2.jpeg',
        'gallery' => [
            'assets/img/water/2.jpeg',
            'assets/img/water/1.jpg',
            'assets/img/water/3.jpeg',
        ],
    ],
    'technology'     => [
        'hero'    => 'assets/img/services-06.jpg',
        'gallery' => [
            'assets/img/technology/3.jpg',
            'assets/img/technology/2.jpeg',
            'assets/img/technology/4.webp',
        ],
    ],
    'inclusion'      => [
        'hero'    => 'assets/img/social/1.jpeg',
        'gallery' => [
            'assets/img/social/1.jpeg',
            'assets/img/social/2.jpeg',
            'assets/img/social/3.jpeg',
        ],
    ],
    'meal'           => [
        'hero'    => 'assets/img/monitoring/4.jpeg',
        'gallery' => [
            'assets/img/monitoring/2.jpg',
            'assets/img/monitoring/3.jpg',
            'assets/img/monitoring/4.jpeg',
        ],
    ],
    'health'         => [
        'hero'    => 'assets/img/health/1.jpeg',
        'gallery' => [
            'assets/img/health/2.jpeg',
            'assets/img/health/3.jpeg',
            'assets/img/health/4.jpeg',
        ],
    ],
];
$imgs = $sectorImages[$sectorKey] ?? [];
$sector['resolved_hero_image'] = $imgs['hero']    ?? 'assets/img/about-img.jpg';
$sector['gallery_images']      = $imgs['gallery'] ?? [];

require __DIR__ . '/sector-detail-template.php';
