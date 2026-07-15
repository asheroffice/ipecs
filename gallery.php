<?php

declare(strict_types=1);

$h = static function (?string $s): string {
    return htmlspecialchars((string) $s, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
};

$categories = [
    ['key' => 'all',            'label' => 'All projects'],
    ['key' => 'education',      'label' => 'Education & Schools'],
    ['key' => 'infrastructure', 'label' => 'Infrastructure & Construction'],
    ['key' => 'climate',        'label' => 'Climate, Energy & Agriculture'],
    ['key' => 'wash',           'label' => 'WASH & Water'],
    ['key' => 'inclusion',      'label' => 'Social Inclusion & Skills'],
    ['key' => 'shs',            'label' => 'Sindh Solar Energy Project'],
    ['key' => 'undp',           'label' => 'UNDP Education'],
    ['key' => 'karachi',        'label' => 'Click Karachi'],
    ['key' => 'gbv',            'label' => 'GBV Programme'],
    ['key' => 'social',         'label' => 'Social Protection'],
    ['key' => 'ipecs',          'label' => 'IPECS Team'],
    ['key' => 'minister',       'label' => 'Stakeholder Engagement'],
];

$galleryItems = [
    /* SHS */
    ['src' => 'assets/img/gallery/shs-01.jpg',      'cat' => 'shs',      'cat_label' => 'SHS Project',          'caption' => 'Solar Home Systems installation - field operations'],
    ['src' => 'assets/img/gallery/shs-02.jpg',      'cat' => 'shs',      'cat_label' => 'SHS Project',          'caption' => 'Field survey and quality assurance - SHS programme'],
    ['src' => 'assets/img/gallery/shs-03.jpg',      'cat' => 'shs',      'cat_label' => 'SHS Project',          'caption' => 'Chief Minister Sindh presenting Solar Home System - SSEP launch'],
    ['src' => 'assets/img/gallery/shs-04.jpg',      'cat' => 'shs',      'cat_label' => 'SHS Project',          'caption' => 'Solar Home System distribution ceremony - Sindh'],
    ['src' => 'assets/img/gallery/shs-05.jpg',      'cat' => 'shs',      'cat_label' => 'SHS Project',          'caption' => 'Beneficiary verification and handover - SHS programme'],
    ['src' => 'assets/img/gallery/shs-06.jpg',      'cat' => 'shs',      'cat_label' => 'SHS Project',          'caption' => 'Community awareness session - Sindh Solar Energy Project'],
    /* UNDP */
    ['src' => 'assets/img/gallery/undp-01.jpg',     'cat' => 'undp',     'cat_label' => 'UNDP Education',       'caption' => 'Girls school classroom - UNDP education programme, Larkana'],
    ['src' => 'assets/img/gallery/undp-02.jpg',     'cat' => 'undp',     'cat_label' => 'UNDP Education',       'caption' => 'MHM health awareness session - IPECS Consulting with UNDP funding'],
    ['src' => 'assets/img/gallery/undp-03.jpg',     'cat' => 'undp',     'cat_label' => 'UNDP Education',       'caption' => 'UNDP field monitoring visit - Sindh schools programme'],
    ['src' => 'assets/img/gallery/undp-04.jpg',     'cat' => 'undp',     'cat_label' => 'UNDP Education',       'caption' => 'Community training session - GBHS Gabar Massan, Larkana'],
    ['src' => 'assets/img/gallery/undp-05.jpg',     'cat' => 'undp',     'cat_label' => 'UNDP Education',       'caption' => 'School visit - GBPS Babar District, Larkana'],
    ['src' => 'assets/img/gallery/undp-06.jpg',     'cat' => 'undp',     'cat_label' => 'UNDP Education',       'caption' => 'School monitoring - GGPS Gujjar District, Larkana'],
    /* Click Karachi */
    ['src' => 'assets/img/gallery/karachi-01.jpg',  'cat' => 'karachi',  'cat_label' => 'Click Karachi',        'caption' => 'Urban road improvement - Click Karachi programme'],
    ['src' => 'assets/img/gallery/karachi-02.jpg',  'cat' => 'karachi',  'cat_label' => 'Click Karachi',        'caption' => 'Infrastructure assessment - Karachi'],
    ['src' => 'assets/img/gallery/karachi-03.jpg',  'cat' => 'karachi',  'cat_label' => 'Click Karachi',        'caption' => 'Road development progress - Click Karachi'],
    ['src' => 'assets/img/gallery/karachi-04.jpg',  'cat' => 'karachi',  'cat_label' => 'Click Karachi',        'caption' => 'Urban beautification - Karachi'],
    ['src' => 'assets/img/gallery/karachi-05.jpg',  'cat' => 'karachi',  'cat_label' => 'Click Karachi',        'caption' => 'Urban infrastructure survey - Click Karachi'],
    /* GBV */
    ['src' => 'assets/img/gallery/gbv-01.jpg',      'cat' => 'gbv',      'cat_label' => 'GBV Programme',        'caption' => 'GBV awareness and response training session'],
    ['src' => 'assets/img/gallery/gbv-02.jpg',      'cat' => 'gbv',      'cat_label' => 'GBV Programme',        'caption' => 'GBV programme - community sensitisation'],
    ['src' => 'assets/img/gallery/gbv-03.jpg',      'cat' => 'gbv',      'cat_label' => 'GBV Programme',        'caption' => 'Beneficiary engagement - GBV protection programme'],
    ['src' => 'assets/img/gallery/gbv-04.jpg',      'cat' => 'gbv',      'cat_label' => 'GBV Programme',        'caption' => 'Community outreach - GBV programme, Sindh'],
    ['src' => 'assets/img/gallery/gbv-05.jpg',      'cat' => 'gbv',      'cat_label' => 'GBV Programme',        'caption' => 'GBV survivor support and empowerment programme'],
    /* Social Protection */
    ['src' => 'assets/img/gallery/social-01.jpg',   'cat' => 'social',   'cat_label' => 'Social Protection',    'caption' => 'Feasibility study workshop - Women Agricultural Workers Programme'],
    ['src' => 'assets/img/gallery/social-02.jpg',   'cat' => 'social',   'cat_label' => 'Social Protection',    'caption' => 'Women agricultural workers - field data collection, Naushahro Feroze'],
    ['src' => 'assets/img/gallery/social-03.jpg',   'cat' => 'social',   'cat_label' => 'Social Protection',    'caption' => 'Community consultation - social protection programme'],
    ['src' => 'assets/img/gallery/social-04.jpg',   'cat' => 'social',   'cat_label' => 'Social Protection',    'caption' => 'Women beneficiary engagement - Sindh'],
    ['src' => 'assets/img/gallery/social-05.jpg',   'cat' => 'social',   'cat_label' => 'Social Protection',    'caption' => 'Formative research session - social protection programme'],
    ['src' => 'assets/img/gallery/social-06.jpg',   'cat' => 'social',   'cat_label' => 'Social Protection',    'caption' => 'Field research - social protection formative study'],
    /* IPECS General */
    ['src' => 'assets/img/gallery/ipecs-01.jpg',    'cat' => 'ipecs',    'cat_label' => 'IPECS Team',           'caption' => 'IPECS Consulting team - Karachi headquarters'],
    ['src' => 'assets/img/gallery/ipecs-02.jpg',    'cat' => 'ipecs',    'cat_label' => 'IPECS Team',           'caption' => 'Solar-powered water pump - WASH infrastructure delivery'],
    ['src' => 'assets/img/gallery/ipecs-03.jpg',    'cat' => 'ipecs',    'cat_label' => 'IPECS Team',           'caption' => 'Urban beautification - Karachi night view'],
    ['src' => 'assets/img/gallery/ipecs-04.jpg',    'cat' => 'ipecs',    'cat_label' => 'IPECS Team',           'caption' => 'Click Karachi road improvement - IPECS field supervision'],
    ['src' => 'assets/img/gallery/ipecs-05.jpg',    'cat' => 'ipecs',    'cat_label' => 'IPECS Team',           'caption' => 'Community programme session - IPECS field team, Mirpurkhas'],
    ['src' => 'assets/img/gallery/ipecs-06.jpg',    'cat' => 'ipecs',    'cat_label' => 'IPECS Team',           'caption' => 'Community jirga consultation - Khyber Pakhtunkhwa'],
    /* Minister */
    ['src' => 'assets/img/gallery/minister-01.jpg', 'cat' => 'minister', 'cat_label' => 'Stakeholder Engagement','caption' => 'Inauguration ceremony - project ribbon cutting'],
    ['src' => 'assets/img/gallery/minister-02.jpg', 'cat' => 'minister', 'cat_label' => 'Stakeholder Engagement','caption' => 'Government stakeholder engagement'],
    ['src' => 'assets/img/gallery/minister-03.jpg', 'cat' => 'minister', 'cat_label' => 'Stakeholder Engagement','caption' => 'High-level government partnership event'],
    ['src' => 'assets/img/gallery/minister-04.jpg', 'cat' => 'minister', 'cat_label' => 'Stakeholder Engagement','caption' => 'Government engagement - IPECS programme launch'],
    /* IPECS PIC - WASH */
    ['src' => 'assets/img/gallery/ipec-01.jpg',  'cat' => 'wash',            'cat_label' => 'WASH & Water',                  'caption' => 'Solar-powered community water supply - WASH infrastructure delivery'],
    ['src' => 'assets/img/gallery/ipec-11.jpg',  'cat' => 'wash',            'cat_label' => 'WASH & Water',                  'caption' => 'SDG Clean Water & Sanitation meeting - Mehran University of Engineering, Jamshoro'],
    /* IPECS PIC - Education */
    ['src' => 'assets/img/gallery/ipec-35.jpg',  'cat' => 'education',       'cat_label' => 'Education & Schools',           'caption' => 'School morning assembly - students in uniform, public school Pakistan'],
    ['src' => 'assets/img/gallery/ipec-20.jpg',  'cat' => 'education',       'cat_label' => 'Education & Schools',           'caption' => 'UNDP field officer teaching children - outdoor IRC classroom'],
    ['src' => 'assets/img/gallery/ipec-16.jpg',  'cat' => 'education',       'cat_label' => 'Education & Schools',           'caption' => 'Students with books in school garden - environmental outdoor learning'],
    ['src' => 'assets/img/gallery/ipec-22.jpg',  'cat' => 'education',       'cat_label' => 'Education & Schools',           'caption' => 'School science laboratory - fully equipped facility'],
    ['src' => 'assets/img/gallery/ipec-23.jpg',  'cat' => 'education',       'cat_label' => 'Education & Schools',           'caption' => 'Students sitting examination - quality education programme'],
    ['src' => 'assets/img/gallery/ipec-21.jpg',  'cat' => 'education',       'cat_label' => 'Education & Schools',           'caption' => 'School garden pathway - campus greening project'],
    /* IPECS PIC - Infrastructure */
    ['src' => 'assets/img/gallery/ipec-08.jpg',  'cat' => 'infrastructure',  'cat_label' => 'Infrastructure & Construction', 'caption' => 'Bridge foundation construction - concrete works, Pakistan'],
    ['src' => 'assets/img/gallery/ipec-09.jpg',  'cat' => 'infrastructure',  'cat_label' => 'Infrastructure & Construction', 'caption' => 'Construction workers on structural foundation - civil engineering works'],
    ['src' => 'assets/img/gallery/ipec-12.jpg',  'cat' => 'infrastructure',  'cat_label' => 'Infrastructure & Construction', 'caption' => 'Indoor sports hall construction - community infrastructure delivery'],
    ['src' => 'assets/img/gallery/ipec-31.jpg',  'cat' => 'infrastructure',  'cat_label' => 'Infrastructure & Construction', 'caption' => 'Irrigation channel - water management infrastructure, Gilgit-Baltistan'],
    ['src' => 'assets/img/gallery/ipec-37.jpg',  'cat' => 'infrastructure',  'cat_label' => 'Infrastructure & Construction', 'caption' => 'Coastal road earthworks - infrastructure construction, Karachi'],
    ['src' => 'assets/img/gallery/ipec-36.jpg',  'cat' => 'infrastructure',  'cat_label' => 'Infrastructure & Construction', 'caption' => 'Village road paving with interlocking bricks - rural connectivity programme'],
    /* IPECS PIC - Climate, Energy & Agriculture */
    ['src' => 'assets/img/gallery/ipec-13.jpg',  'cat' => 'climate',         'cat_label' => 'Climate & Agriculture',         'caption' => 'Mango orchard in bloom - climate-smart agriculture programme, Sindh'],
    ['src' => 'assets/img/gallery/ipec-05.jpg',  'cat' => 'climate',         'cat_label' => 'Climate & Agriculture',         'caption' => 'Farmers inspecting mango trees - climate-smart agriculture'],
    ['src' => 'assets/img/gallery/ipec-06.jpg',  'cat' => 'climate',         'cat_label' => 'Climate & Agriculture',         'caption' => 'Solar panel array installation - renewable energy project'],
    ['src' => 'assets/img/gallery/ipec-02.jpg',  'cat' => 'climate',         'cat_label' => 'Climate & Agriculture',         'caption' => 'Cotton crop field survey - agricultural resilience programme, Sindh'],
    ['src' => 'assets/img/gallery/ipec-03.jpg',  'cat' => 'climate',         'cat_label' => 'Climate & Agriculture',         'caption' => 'Children with tree saplings - school plantation and environmental awareness'],
    ['src' => 'assets/img/gallery/ipec-25.jpg',  'cat' => 'climate',         'cat_label' => 'Climate & Agriculture',         'caption' => 'Students with tree saplings - school plantation drive'],
    ['src' => 'assets/img/gallery/ipec-32.jpg',  'cat' => 'climate',         'cat_label' => 'Climate & Agriculture',         'caption' => 'Capacity building workshop - high-value agriculture and greenhouse technology, GB'],
    ['src' => 'assets/img/gallery/ipec-33.jpg',  'cat' => 'climate',         'cat_label' => 'Climate & Agriculture',         'caption' => 'Greenhouse vegetable production - high-value agriculture, Gilgit-Baltistan'],
    ['src' => 'assets/img/gallery/ipec-34.jpg',  'cat' => 'climate',         'cat_label' => 'Climate & Agriculture',         'caption' => 'Women farmers preparing land for greenhouse cultivation - Gilgit-Baltistan'],
    /* IPECS PIC - Social Inclusion & Skills */
    ['src' => 'assets/img/gallery/ipec-14.jpg',  'cat' => 'inclusion',       'cat_label' => 'Social Inclusion & Skills',     'caption' => 'Women vocational training - sewing and tailoring skills centre'],
    ['src' => 'assets/img/gallery/ipec-19.jpg',  'cat' => 'inclusion',       'cat_label' => 'Social Inclusion & Skills',     'caption' => 'Food processing facility - agricultural value chain project'],
    /* IPECS PIC - Social Protection / Community */
    ['src' => 'assets/img/gallery/ipec-15.jpg',  'cat' => 'social',          'cat_label' => 'Social Protection',             'caption' => 'Community Jirga consultation - GBV programme, Mirpurkhas'],
    ['src' => 'assets/img/gallery/ipec-26.jpg',  'cat' => 'social',          'cat_label' => 'Social Protection',             'caption' => 'Community circle gathering - Khyber Pakhtunkhwa'],
    /* IPECS PIC - IPECS Team / Events */
    ['src' => 'assets/img/gallery/ipec-10.jpg',  'cat' => 'ipecs',           'cat_label' => 'IPECS Team',                    'caption' => 'Thar Will Change Pakistan - stakeholder screening event'],
    ['src' => 'assets/img/gallery/ipec-17.jpg',  'cat' => 'ipecs',           'cat_label' => 'IPECS Team',                    'caption' => 'High-level roundtable - IPECS donor and partner coordination'],
    ['src' => 'assets/img/gallery/ipec-24.jpg',  'cat' => 'ipecs',           'cat_label' => 'IPECS Team',                    'caption' => 'Road safety training session - IPECS programme delivery'],
    ['src' => 'assets/img/gallery/ipec-27.jpg',  'cat' => 'ipecs',           'cat_label' => 'IPECS Team',                    'caption' => 'IPECS Karachi head office - main entrance corridor, heritage building'],
    ['src' => 'assets/img/gallery/ipec-28.jpg',  'cat' => 'ipecs',           'cat_label' => 'IPECS Team',                    'caption' => 'IPECS office staircase - classical architecture, Karachi'],
    ['src' => 'assets/img/gallery/ipec-29.jpg',  'cat' => 'ipecs',           'cat_label' => 'IPECS Team',                    'caption' => 'IPECS Karachi office - modern reception and workspace'],
    ['src' => 'assets/img/gallery/ipec-30.jpg',  'cat' => 'ipecs',           'cat_label' => 'IPECS Team',                    'caption' => 'IPECS office lobby - contemporary interior design, Karachi'],
    /* IPECS PIC - Click Karachi */
    ['src' => 'assets/img/gallery/ipec-04.jpg',  'cat' => 'karachi',         'cat_label' => 'Click Karachi',                 'caption' => 'Click Karachi road improvement - urban infrastructure delivery'],
    ['src' => 'assets/img/gallery/ipec-07.jpg',  'cat' => 'karachi',         'cat_label' => 'Click Karachi',                 'caption' => 'Click Karachi urban beautification - illuminated public space at night'],
    /* Click Karachi - Field Survey */
    ['src' => 'assets/img/gallery/ck-01.jpg',    'cat' => 'karachi',         'cat_label' => 'Click Karachi',                 'caption' => 'Door-to-door field survey - Click Karachi socioeconomic survey, Karachi'],
    ['src' => 'assets/img/gallery/ck-02.jpg',    'cat' => 'karachi',         'cat_label' => 'Click Karachi',                 'caption' => 'Field survey team conducting household interviews - Click Karachi'],
    ['src' => 'assets/img/gallery/ck-03.jpg',    'cat' => 'karachi',         'cat_label' => 'Click Karachi',                 'caption' => 'Female enumerator at household - socioeconomic survey, Karachi'],
    ['src' => 'assets/img/gallery/ck-04.jpg',    'cat' => 'karachi',         'cat_label' => 'Click Karachi',                 'caption' => 'Field surveyor interviewing resident - Click Karachi data collection'],
    ['src' => 'assets/img/gallery/ck-05.jpg',    'cat' => 'karachi',         'cat_label' => 'Click Karachi',                 'caption' => 'Evening field survey - door-to-door data collection, Karachi'],
    ['src' => 'assets/img/gallery/ck-06.jpg',    'cat' => 'karachi',         'cat_label' => 'Click Karachi',                 'caption' => 'Field surveyor marking house numbers - Click Karachi survey enumeration'],
    ['src' => 'assets/img/gallery/ck-07.jpg',    'cat' => 'karachi',         'cat_label' => 'Click Karachi',                 'caption' => 'Field interviewer with community resident - Click Karachi survey'],
    ['src' => 'assets/img/gallery/ck-08.jpg',    'cat' => 'karachi',         'cat_label' => 'Click Karachi',                 'caption' => 'Community focus group - women stakeholders, Click Karachi programme'],
    ['src' => 'assets/img/gallery/ck-09.jpg',    'cat' => 'karachi',         'cat_label' => 'Click Karachi',                 'caption' => 'Neighbourhood community consultation - Click Karachi, Karachi'],
    ['src' => 'assets/img/gallery/ck-10.jpg',    'cat' => 'karachi',         'cat_label' => 'Click Karachi',                 'caption' => 'Women\'s community focus group - Click Karachi social engagement'],
    ['src' => 'assets/img/gallery/ck-11.jpg',    'cat' => 'karachi',         'cat_label' => 'Click Karachi',                 'caption' => 'Two-day field staff training - socioeconomic survey of six old areas of Karachi'],
    ['src' => 'assets/img/gallery/ck-12.jpg',    'cat' => 'karachi',         'cat_label' => 'Click Karachi',                 'caption' => 'Click Karachi training workshop - IPECS field staff briefing, Karachi'],
    ['src' => 'assets/img/gallery/ck-13.jpg',    'cat' => 'karachi',         'cat_label' => 'Click Karachi',                 'caption' => 'Field survey training - Click Karachi & IPECS socioeconomic programme'],
    /* IPECS PIC - Stakeholder Engagement */
    ['src' => 'assets/img/gallery/ipec-18.jpg',  'cat' => 'minister',        'cat_label' => 'Stakeholder Engagement',        'caption' => 'Minister addressing Public Private Partnership education forum - Karachi'],
];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>IPECS Consulting PVT Ltd. | Project Gallery</title>
    <meta name="description" content="IPECS Consulting project gallery - photographs of programme delivery across Pakistan: solar energy, education, WASH, urban development, social protection, and community engagement.">
    <meta name="keywords" content="IPECS,Gallery,Projects,Pakistan,SHS,UNDP,Karachi,Social Protection,Development">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="assets/img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/boxicon.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/templatemo.css">
    <link rel="stylesheet" href="assets/css/custom.css">
</head>

<body class="home-page gallery-page">

    <?php include __DIR__ . '/assets/include/header.php'; ?>

    <!-- Hero -->
    <section class="contact-hero gallery-page-hero">
        <div class="contact-hero-deco" aria-hidden="true">
            <span class="contact-hero-ring contact-hero-ring--1"></span>
            <span class="contact-hero-ring contact-hero-ring--2"></span>
            <span class="contact-hero-blob"></span>
        </div>
        <div class="container">
            <div class="contact-hero-inner text-center mx-auto">
                <p class="clients-pdf-kicker mb-2">Project Photography</p>
                <h1 class="contact-title">Gallery</h1>
                <p class="contact-subtitle mb-0">A visual record of IPECS programme delivery across Pakistan - communities, infrastructure, education, energy, and social development.</p>
            </div>
        </div>
    </section>

    <!-- Gallery -->
    <section class="gallery-section">
        <div class="container-xl">

            <!-- Filters -->
            <div class="gallery-filters d-flex flex-wrap justify-content-center gap-2 mb-5" role="tablist" aria-label="Filter gallery by project">
                <?php foreach ($categories as $cat) { ?>
                    <button
                        class="gallery-filter-btn<?php echo $cat['key'] === 'all' ? ' active' : ''; ?>"
                        data-cat="<?php echo $h($cat['key']); ?>"
                        type="button"
                        role="tab"
                        aria-selected="<?php echo $cat['key'] === 'all' ? 'true' : 'false'; ?>"
                    ><?php echo $h($cat['label']); ?></button>
                <?php } ?>
            </div>

            <!-- Count badge -->
            <p class="gallery-count text-center mb-4" id="gallery-count"><?php echo count($galleryItems); ?> photos</p>

            <!-- Grid -->
            <div class="row g-3" id="gallery-grid">
                <?php foreach ($galleryItems as $i => $item) { ?>
                    <div class="col-6 col-md-4 col-lg-3 gallery-item" data-cat="<?php echo $h($item['cat']); ?>" data-idx="<?php echo (int) $i; ?>">
                        <div class="gallery-thumb" role="button" tabindex="0" aria-label="View photo: <?php echo $h($item['caption']); ?>">
                            <img src="<?php echo $h($item['src']); ?>" alt="<?php echo $h($item['caption']); ?>">
                            <div class="gallery-overlay" aria-hidden="true">
                                <i class="bx bx-zoom-in"></i>
                                <span class="gallery-cat-pill"><?php echo $h($item['cat_label']); ?></span>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>

        </div>
    </section>

    <!-- Lightbox -->
    <div id="gallery-lightbox" class="gallery-lightbox" aria-hidden="true" role="dialog" aria-modal="true" aria-label="Photo viewer">
        <div class="gallery-lb-backdrop" id="gallery-lb-backdrop"></div>
        <button class="gallery-lb-close" id="gallery-lb-close" aria-label="Close photo viewer"><i class="bx bx-x"></i></button>
        <button class="gallery-lb-nav gallery-lb-prev" id="gallery-lb-prev" aria-label="Previous photo"><i class="bx bx-chevron-left"></i></button>
        <button class="gallery-lb-nav gallery-lb-next" id="gallery-lb-next" aria-label="Next photo"><i class="bx bx-chevron-right"></i></button>
        <div class="gallery-lb-stage">
            <div class="gallery-lb-img-wrap">
                <img id="gallery-lb-img" src="" alt="">
            </div>
            <p id="gallery-lb-caption" class="gallery-lb-caption"></p>
            <p id="gallery-lb-counter" class="gallery-lb-counter"></p>
        </div>
    </div>

    <?php include __DIR__ . '/assets/include/footer.php'; ?>

    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/custom.js"></script>
    <script>
    (function ($) {
        'use strict';

        /* ---- Build items index ---- */
        var allItems = [];
        var visibleItems = [];

        $('.gallery-item').each(function (i) {
            var $img = $(this).find('img');
            allItems.push({ src: $img.attr('src'), caption: $img.attr('alt'), idx: i });
        });
        visibleItems = allItems.slice();

        /* ---- Filter ---- */
        function applyFilter(cat) {
            visibleItems = [];
            var shown = 0;

            $('.gallery-item').each(function (i) {
                var itemCat = $(this).data('cat');
                if (cat === 'all' || itemCat === cat) {
                    $(this).removeClass('gallery-item--hidden');
                    visibleItems.push(allItems[i]);
                    shown++;
                } else {
                    $(this).addClass('gallery-item--hidden');
                }
            });

            $('#gallery-count').text(shown + ' photo' + (shown !== 1 ? 's' : ''));
        }

        $('.gallery-filter-btn').on('click', function () {
            var cat = $(this).data('cat');
            $('.gallery-filter-btn').removeClass('active').attr('aria-selected', 'false');
            $(this).addClass('active').attr('aria-selected', 'true');
            applyFilter(cat);
        });

        /* ---- Lightbox ---- */
        var cur = 0;
        var $lb  = $('#gallery-lightbox');
        var $img = $('#gallery-lb-img');
        var $cap = $('#gallery-lb-caption');
        var $ctr = $('#gallery-lb-counter');

        function openLb(visIdx) {
            cur = ((visIdx % visibleItems.length) + visibleItems.length) % visibleItems.length;
            var item = visibleItems[cur];
            $img.attr('src', item.src).attr('alt', item.caption);
            $cap.text(item.caption);
            $ctr.text((cur + 1) + ' / ' + visibleItems.length);
            $lb.attr('aria-hidden', 'false').addClass('is-open');
            $('body').addClass('lb-open');
        }

        function closeLb() {
            $lb.attr('aria-hidden', 'true').removeClass('is-open');
            $('body').removeClass('lb-open');
        }

        function navLb(dir) {
            openLb(cur + dir);
        }

        /* Open on thumb click / keyboard */
        $(document).on('click keydown', '.gallery-thumb', function (e) {
            if (e.type === 'keydown' && e.key !== 'Enter' && e.key !== ' ') return;
            e.preventDefault();
            var globalIdx = parseInt($(this).closest('.gallery-item').data('idx'), 10);
            var visIdx = visibleItems.findIndex(function (it) { return it.idx === globalIdx; });
            if (visIdx !== -1) openLb(visIdx);
        });

        $('#gallery-lb-close, #gallery-lb-backdrop').on('click', closeLb);
        $('#gallery-lb-prev').on('click', function () { navLb(-1); });
        $('#gallery-lb-next').on('click', function () { navLb(1); });

        $(document).on('keydown', function (e) {
            if (!$lb.hasClass('is-open')) return;
            if (e.key === 'Escape')     { closeLb(); }
            if (e.key === 'ArrowLeft')  { navLb(-1); }
            if (e.key === 'ArrowRight') { navLb(1);  }
        });

        /* Swipe support */
        var touchStartX = 0;
        document.getElementById('gallery-lightbox').addEventListener('touchstart', function (e) {
            touchStartX = e.changedTouches[0].screenX;
        }, { passive: true });
        document.getElementById('gallery-lightbox').addEventListener('touchend', function (e) {
            var diff = touchStartX - e.changedTouches[0].screenX;
            if (Math.abs(diff) > 50) navLb(diff > 0 ? 1 : -1);
        }, { passive: true });

    }(jQuery));
    </script>
</body>

</html>
