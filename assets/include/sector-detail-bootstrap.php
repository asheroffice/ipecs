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

/* Shared photography across all sector pages */
$sector['resolved_hero_image'] = 'assets/img/about-img.jpg';

require __DIR__ . '/sector-detail-template.php';
