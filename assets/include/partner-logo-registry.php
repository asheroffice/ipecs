<?php

declare(strict_types=1);

/**
 * Partner / funder tiles - single source of truth for partner logos.
 * Official marks live in assets/img/partners/; a few original tiles
 * (AAP, GoS, PPL, UNICEF, UNDP, SIDA, ACTED, CARE) still use the
 * recent-work-*.png files from the home page.
 * Order here drives the home page "Our Partners" wall.
 */
return [
    // Multilateral & development banks
    'world_bank' => ['img' => 'assets/img/partners/world-bank.png', 'name' => 'World Bank'],
    'adb' => ['img' => 'assets/img/partners/adb.png', 'name' => 'Asian Development Bank'],
    'aiib' => ['img' => 'assets/img/partners/aiib.png', 'name' => 'AIIB'],
    'eu' => ['img' => 'assets/img/partners/european-union.jpg', 'name' => 'European Union'],

    // United Nations agencies
    'unicef' => ['img' => 'assets/img/recent-work-04.png', 'name' => 'UNICEF'],
    'undp' => ['img' => 'assets/img/recent-work-05.png', 'name' => 'UNDP'],
    'unesco' => ['img' => 'assets/img/partners/unesco.png', 'name' => 'UNESCO'],
    'fao' => ['img' => 'assets/img/partners/fao.png', 'name' => 'FAO'],
    'ifad' => ['img' => 'assets/img/partners/ifad.png', 'name' => 'IFAD'],

    // Bilateral cooperation
    'usaid' => ['img' => 'assets/img/partners/usaid.png', 'name' => 'USAID'],
    'koica' => ['img' => 'assets/img/partners/koica.jpg', 'name' => 'KOICA'],
    'canada' => ['img' => 'assets/img/partners/canada.png', 'name' => 'Government of Canada'],
    'giz' => ['img' => 'assets/img/partners/german-cooperation.jpg', 'name' => 'German Cooperation (GIZ / KfW)'],

    // INGOs & civil society
    'save_children' => ['img' => 'assets/img/partners/save-the-children.jpg', 'name' => 'Save the Children'],
    'oxfam' => ['img' => 'assets/img/partners/oxfam.png', 'name' => 'Oxfam'],
    'concern' => ['img' => 'assets/img/partners/concern.png', 'name' => 'Concern Worldwide'],
    'wwf' => ['img' => 'assets/img/partners/wwf.png', 'name' => 'WWF'],
    'acted' => ['img' => 'assets/img/recent-work-07.png', 'name' => 'ACTED'],
    'care' => ['img' => 'assets/img/recent-work-08.png', 'name' => 'CARE'],
    'ppaf' => ['img' => 'assets/img/partners/ppaf.jpg', 'name' => 'PPAF'],

    // Government & public programmes
    'gop' => ['img' => 'assets/img/partners/govt-pakistan.png', 'name' => 'Government of Pakistan'],
    'gos' => ['img' => 'assets/img/recent-work-02.png', 'name' => 'Government of Sindh'],
    'gob' => ['img' => 'assets/img/partners/govt-balochistan.png', 'name' => 'Government of Balochistan'],
    'aap' => ['img' => 'assets/img/recent-work-01.png', 'name' => 'Accelerated Action Plan'],
    'energy_dept' => ['img' => 'assets/img/partners/sindh-energy-dept.jpg', 'name' => 'Energy Department, Sindh'],
    'ssep' => ['img' => 'assets/img/partners/ssep.png', 'name' => 'Sindh Solar Energy Project'],
    'sferp' => ['img' => 'assets/img/partners/sferp.jpg', 'name' => 'SFERP'],
    'rescue_1122' => ['img' => 'assets/img/partners/rescue-1122.png', 'name' => 'Rescue 1122 Sindh'],
    'mumta' => ['img' => 'assets/img/partners/mumta.jpg', 'name' => 'Mumta Programme'],
    'sida' => ['img' => 'assets/img/recent-work-06.png', 'name' => 'Sindh Irrigation & Development Authority'],
    'ppl' => ['img' => 'assets/img/recent-work-03.png', 'name' => 'Pakistan Petroleum Limited'],
];
