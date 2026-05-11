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
            'assets/img/work-02.jpg',
            'assets/img/services-08.jpg',
            'assets/img/home-main-slider/slide-006.jpg',
        ],
    ],
    'governance'     => [
        'hero'    => 'assets/img/services-02.jpg',
        'gallery' => [
            'assets/img/home-main-slider/slide-007.jpg',
            'assets/img/services-06.jpg',
            'assets/img/recent-work-02.jpg',
        ],
    ],
    'infrastructure' => [
        'hero'    => 'assets/img/services-03.jpg',
        'gallery' => [
            'assets/img/recent-work-06.jpg',
            'assets/img/services-05.jpg',
            'assets/img/home-main-slider/slide-008.jpg',
        ],
    ],
    'climate'        => [
        'hero'    => 'assets/img/services-04.jpg',
        'gallery' => [
            'assets/img/home-main-slider/slide-001.jpg',
            'assets/img/home-main-slider/slide-002.jpg',
            'assets/img/services-05.jpg',
        ],
    ],
    'wash'           => [
        'hero'    => 'assets/img/services-05.jpg',
        'gallery' => [
            'assets/img/home-main-slider/slide-004.jpg',
            'assets/img/home-main-slider/slide-005.jpg',
            'assets/img/services-01.jpg',
        ],
    ],
    'technology'     => [
        'hero'    => 'assets/img/services-06.jpg',
        'gallery' => [
            'assets/img/recent-work-02.jpg',
            'assets/img/services-08.jpg',
            'assets/img/home-main-slider/slide-007.jpg',
        ],
    ],
    'inclusion'      => [
        'hero'    => 'assets/img/services-07.jpg',
        'gallery' => [
            'assets/img/work-01.jpg',
            'assets/img/services-09.jpg',
            'assets/img/recent-work-03.jpg',
        ],
    ],
    'meal'           => [
        'hero'    => 'assets/img/services-08.jpg',
        'gallery' => [
            'assets/img/home-main-slider/slide-006.jpg',
            'assets/img/work-02.jpg',
            'assets/img/services-09.jpg',
        ],
    ],
    'health'         => [
        'hero'    => 'assets/img/services-09.jpg',
        'gallery' => [
            'assets/img/recent-work-03.jpg',
            'assets/img/services-07.jpg',
            'assets/img/work-02.jpg',
        ],
    ],
];
$imgs = $sectorImages[$sectorKey] ?? [];
$sector['resolved_hero_image'] = $imgs['hero']    ?? 'assets/img/about-img.jpg';
$sector['gallery_images']      = $imgs['gallery'] ?? [];

require __DIR__ . '/sector-detail-template.php';
