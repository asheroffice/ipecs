<?php

declare(strict_types=1);

/** @var array $sector */
/** @var string|null $prevKey */
/** @var string|null $nextKey */
/** @var int $sectorIndex */
/** @var array $db */

$h = static function (?string $s): string {
    return htmlspecialchars((string) $s, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
};

$prevPage = $prevKey !== null ? ($db['sectors'][$prevKey]['page'] ?? 'sector.php') : null;
$nextPage = $nextKey !== null ? ($db['sectors'][$nextKey]['page'] ?? 'sector.php') : null;
$prevTitle = $prevKey !== null ? ($db['sectors'][$prevKey]['short_title'] ?? '') : '';
$nextTitle = $nextKey !== null ? ($db['sectors'][$nextKey]['short_title'] ?? '') : '';

$partnerLogoRegistry = require __DIR__ . '/partner-logo-registry.php';
$partnerLogoRefs = $sector['partner_logo_refs'] ?? [];
$partnerLogoRefs = is_array($partnerLogoRefs) ? array_unique($partnerLogoRefs) : [];
$partnerLogosList = [];
foreach ($partnerLogoRefs as $ref) {
    if (isset($partnerLogoRegistry[$ref])) {
        $partnerLogosList[] = $partnerLogoRegistry[$ref];
    }
}
$partnerCarouselId = 'sectorPartner_' . preg_replace('/[^a-zA-Z0-9]+/', '_', (string) ($sector['page'] ?? 'sector'));
$partnerLogoSlides = array_chunk($partnerLogosList, 4);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo $h($sector['meta_title'] ?? $sector['title'] ?? 'IPECS'); ?></title>
    <meta name="description" content="<?php echo $h($sector['meta_description'] ?? ''); ?>">
    <meta name="keywords" content="<?php echo $h($sector['meta_keywords'] ?? 'IPECS,Sectors,Consulting,Pakistan'); ?>">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="assets/img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/boxicon.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&family=Open+Sans:wght@300;400;600&family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/templatemo.css">
    <link rel="stylesheet" href="assets/css/custom.css">
</head>

<body class="home-page sector-detail-page">

    <?php include dirname(__DIR__, 2) . '/assets/include/header.php'; ?>

    <nav class="sector-breadcrumb-nav" aria-label="Breadcrumb">
        <div class="container">
            <ol class="breadcrumb sector-breadcrumb mb-0 py-3">
                <li class="breadcrumb-item"><a class="text-decoration-none" href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a class="text-decoration-none" href="sector.php">Sectors</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo $h($sector['short_title'] ?? $sector['title'] ?? ''); ?></li>
            </ol>
        </div>
    </nav>

    <section class="sector-overview-hero" aria-labelledby="sector-overview-title">
        <div class="sector-overview-hero__bg" style="background-image: url('<?php echo $h($sector['resolved_hero_image']); ?>');" aria-hidden="true"></div>
        <div class="container position-relative">
            <div class="sector-overview-hero__inner text-center text-lg-start">
                <?php if (!empty($sector['kicker'])) { ?>
                    <p class="sector-detail-kicker sector-overview-hero__kicker mb-2"><?php echo $h($sector['kicker']); ?></p>
                <?php } ?>
                <h1 id="sector-overview-title" class="contact-title sector-detail-title sector-overview-hero__title"><?php echo $h($sector['title'] ?? ''); ?></h1>
                <?php if (!empty($sector['tagline'])) { ?>
                    <p class="contact-subtitle sector-detail-tagline sector-overview-hero__tagline mb-0"><?php echo $h($sector['tagline']); ?></p>
                <?php } ?>
                <div class="sector-overview-hero__overview">
                    <h2 class="sector-overview-hero__overview-heading"><?php echo $h($sector['overview_heading'] ?? 'Sector overview'); ?></h2>
                    <?php foreach ($sector['brief_paras'] ?? [] as $para) { ?>
                        <p class="sector-overview-hero__text"><?php echo $h($para); ?></p>
                    <?php } ?>
                    <?php if (!empty($sector['stat_pills'])) { ?>
                        <ul class="sector-stat-pills list-unstyled d-flex flex-wrap gap-2 mt-3 mb-0 sector-overview-hero__pills" aria-label="Highlights">
                            <?php foreach ($sector['stat_pills'] as $pill) { ?>
                                <li><span class="sector-stat-pill"><?php echo $h($pill['value'] ?? ''); ?> <span class="sector-stat-pill__label"><?php echo $h($pill['label'] ?? ''); ?></span></span></li>
                            <?php } ?>
                        </ul>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>

    <?php if (!empty($sector['capabilities'])) { ?>
        <section class="sector-capabilities-section" aria-labelledby="sector-capabilities-heading">
            <div class="container-fluid sector-capabilities-section__fluid px-3 px-md-4 px-xl-5">
                <div class="sector-capabilities-section__head text-center mx-auto">
                    <h2 id="sector-capabilities-heading" class="home-section-title dark d-block mb-2">Core technical capabilities</h2>
                    <?php if (!empty($sector['capabilities_intro'])) { ?>
                        <p class="sector-section-lead mb-0"><?php echo $h($sector['capabilities_intro']); ?></p>
                    <?php } ?>
                </div>
                <div class="row g-3 g-lg-4 sector-capabilities-grid">
                    <?php foreach ($sector['capabilities'] as $idx => $cap) { ?>
                        <div class="col-md-6">
                            <article class="sector-capability sector-capability--tile h-100">
                                <span class="sector-capability__index" aria-hidden="true"><?php echo $h((string) ($idx + 1)); ?></span>
                                <h4 class="sector-capability-title"><?php echo $h($cap['title'] ?? ''); ?></h4>
                                <p class="services-card-text mb-0 sector-capability-body"><?php echo $h($cap['body'] ?? ''); ?></p>
                            </article>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </section>
    <?php } ?>

    <section class="sector-impact-section">
        <div class="container">
            <div class="sector-section-head text-center mx-auto">
                <h2 class="home-section-title dark d-block mb-2">Sector portfolio: cumulative impact and delivery</h2>
                <?php if (!empty($sector['work_intro']) || !empty($sector['impact_section_lead'])) { ?>
                    <p class="sector-section-lead mb-0"><?php echo $h($sector['work_intro'] ?? $sector['impact_section_lead'] ?? ''); ?></p>
                <?php } ?>
            </div>

            <div class="sector-impact-matrix d-none d-lg-block">
                <div class="table-responsive sector-table-wrap sector-impact-table-wrap">
                    <table class="table sector-impact-table align-middle mb-0">
                        <thead>
                            <tr>
                                <th scope="col" class="sector-impact-th sector-impact-th--indicator">Impact indicator</th>
                                <th scope="col" class="sector-impact-th sector-impact-th--achievement">Achievement</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($sector['impact_rows'] ?? [] as $row) {
                                $c0 = (string) ($row[0] ?? '');
                                $c1 = trim((string) ($row[1] ?? ''));
                                $c2 = trim((string) ($row[2] ?? ''));
                                $achievement = $c1 === '' ? $c2 : ($c2 === '' ? $c1 : $c1 . ' — ' . $c2);
                                ?>
                                <tr>
                                    <td class="sector-impact-td sector-impact-td--indicator"><?php echo $h($c0); ?></td>
                                    <td class="sector-impact-td sector-impact-td--achievement-text"><?php echo $h($achievement); ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="sector-impact-cards d-lg-none">
                <?php foreach ($sector['impact_rows'] ?? [] as $row) {
                    $c0 = (string) ($row[0] ?? '');
                    $c1 = trim((string) ($row[1] ?? ''));
                    $c2 = trim((string) ($row[2] ?? ''));
                    $achievement = $c1 === '' ? $c2 : ($c2 === '' ? $c1 : $c1 . ' — ' . $c2);
                    ?>
                    <article class="sector-impact-card">
                        <h3 class="sector-impact-card__title"><?php echo $h($c0); ?></h3>
                        <div class="sector-impact-card__row sector-impact-card__row--achievement">
                            <span class="sector-impact-card__label">Achievement</span>
                            <p class="sector-impact-card__value mb-0"><?php echo $h($achievement); ?></p>
                        </div>
                    </article>
                <?php } ?>
            </div>

            <div class="sector-value-partners">
                <div class="row g-3 g-lg-4 align-items-stretch">
                    <div class="col-lg-4">
                        <div class="sector-value-partners__block sector-value-partners__block--value h-100">
                            <span class="sector-value-partners__icon" aria-hidden="true"><i class="bx bx-money"></i></span>
                            <span class="sector-value-partners__label">Cumulative sector contract value</span>
                            <p class="sector-value-partners__emphasis mb-0"><?php echo $h($sector['contract_value'] ?? ''); ?></p>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="sector-value-partners__block sector-value-partners__block--partners h-100">
                            <span class="sector-value-partners__icon" aria-hidden="true"><i class="bx bx-buildings"></i></span>
                            <span class="sector-value-partners__label">Key clients and funders</span>
                            <?php if ($partnerLogosList !== []) { ?>
                                <div
                                    id="<?php echo $h($partnerCarouselId); ?>"
                                    class="carousel slide sector-partner-carousel mt-2<?php echo count($partnerLogoSlides) <= 1 ? ' sector-partner-carousel--single' : ''; ?>"
                                    <?php if (count($partnerLogoSlides) > 1) { ?>
                                        data-bs-ride="carousel"
                                        data-bs-interval="5000"
                                        data-bs-wrap="true"
                                        data-bs-touch="true"
                                    <?php } ?>
                                    role="region"
                                    aria-roledescription="carousel"
                                    aria-label="Partner and funder logos"
                                >
                                    <div class="carousel-inner">
                                        <?php foreach ($partnerLogoSlides as $slideIndex => $slideLogos) { ?>
                                            <div class="carousel-item<?php echo $slideIndex === 0 ? ' active' : ''; ?>">
                                                <div class="row g-2 g-md-3 justify-content-center sector-partner-carousel__row">
                                                    <?php foreach ($slideLogos as $logo) { ?>
                                                        <div class="col-6 col-md-3">
                                                            <div class="home-partner-card sector-partner-logo-card">
                                                                <img src="<?php echo $h($logo['img']); ?>" alt="<?php echo $h($logo['name']); ?>" width="200" height="120" loading="<?php echo $slideIndex === 0 ? 'eager' : 'lazy'; ?>">
                                                                <h3><?php echo $h($logo['name']); ?></h3>
                                                            </div>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <?php if (count($partnerLogoSlides) > 1) { ?>
                                        <div class="carousel-indicators sector-partner-carousel__indicators">
                                            <?php foreach ($partnerLogoSlides as $slideIndex => $_) { ?>
                                                <button
                                                    type="button"
                                                    data-bs-target="#<?php echo $h($partnerCarouselId); ?>"
                                                    data-bs-slide-to="<?php echo (int) $slideIndex; ?>"
                                                    class="<?php echo $slideIndex === 0 ? 'active' : ''; ?>"
                                                    <?php if ($slideIndex === 0) { ?>aria-current="true"<?php } ?>
                                                    aria-label="Slide <?php echo (int) ($slideIndex + 1); ?>"
                                                ></button>
                                            <?php } ?>
                                        </div>
                                        <button class="carousel-control-prev sector-partner-carousel__control" type="button" data-bs-target="#<?php echo $h($partnerCarouselId); ?>" data-bs-slide="prev">
                                            <span class="sector-partner-carousel__control-inner" aria-hidden="true"><i class="bx bx-chevron-left"></i></span>
                                            <span class="visually-hidden">Previous partners</span>
                                        </button>
                                        <button class="carousel-control-next sector-partner-carousel__control" type="button" data-bs-target="#<?php echo $h($partnerCarouselId); ?>" data-bs-slide="next">
                                            <span class="sector-partner-carousel__control-inner" aria-hidden="true"><i class="bx bx-chevron-right"></i></span>
                                            <span class="visually-hidden">Next partners</span>
                                        </button>
                                    <?php } ?>
                                </div>
                            <?php } else { ?>
                                <p class="sector-value-partners__text mb-0"><?php echo $h($sector['clients'] ?? $sector['key_partners'] ?? ''); ?></p>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="sector-flow-nav" aria-label="Sector navigation">
        <div class="container">
            <div class="sector-flow-nav__track">
                <div class="sector-flow-nav__node sector-flow-nav__node--prev">
                    <?php if ($prevPage !== null) { ?>
                        <a class="sector-flow-nav__link sector-flow-nav__link--prev" href="<?php echo $h($prevPage); ?>">
                            <span class="sector-flow-nav__glyph" aria-hidden="true"><i class="bx bx-left-arrow-alt"></i></span>
                            <span class="sector-flow-nav__copy">
                                <span class="sector-flow-nav__eyebrow">Previous</span>
                                <span class="sector-flow-nav__name"><?php echo $h($prevTitle); ?></span>
                            </span>
                        </a>
                    <?php } else { ?>
                        <span class="sector-flow-nav__mute" aria-hidden="true">—</span>
                    <?php } ?>
                </div>
                <div class="sector-flow-nav__node sector-flow-nav__node--hub">
                    <span class="sector-flow-nav__rail" aria-hidden="true"></span>
                    <a class="sector-flow-nav__hub" href="sector.php">
                        <i class="bx bx-category-alt sector-flow-nav__hub-icon" aria-hidden="true"></i>
                        <span class="sector-flow-nav__hub-text">All sectors</span>
                    </a>
                    <span class="sector-flow-nav__rail" aria-hidden="true"></span>
                </div>
                <div class="sector-flow-nav__node sector-flow-nav__node--next">
                    <?php if ($nextPage !== null) { ?>
                        <a class="sector-flow-nav__link sector-flow-nav__link--next" href="<?php echo $h($nextPage); ?>">
                            <span class="sector-flow-nav__copy">
                                <span class="sector-flow-nav__eyebrow">Next</span>
                                <span class="sector-flow-nav__name"><?php echo $h($nextTitle); ?></span>
                            </span>
                            <span class="sector-flow-nav__glyph" aria-hidden="true"><i class="bx bx-right-arrow-alt"></i></span>
                        </a>
                    <?php } else { ?>
                        <span class="sector-flow-nav__mute" aria-hidden="true">—</span>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>

    <section class="contact-hero sector-page-contact-hero" aria-label="Contact call to action">
        <div class="contact-hero-deco" aria-hidden="true">
            <span class="contact-hero-ring contact-hero-ring--1"></span>
            <span class="contact-hero-ring contact-hero-ring--2"></span>
            <span class="contact-hero-blob"></span>
        </div>
        <div class="container">
            <div class="contact-hero-inner text-center mx-auto">
                <h2 class="contact-title">Contact IPECS</h2>
                <p class="contact-subtitle mb-4">For enquiries related to this sector or our wider work.</p>
                <a class="btn home-btn-navy" href="contact.php">
                    <span>Contact</span>
                    <i class="bx bx-right-arrow-alt" aria-hidden="true"></i>
                </a>
            </div>
        </div>
    </section>

    <?php include dirname(__DIR__, 2) . '/assets/include/footer.php'; ?>

    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/isotope.pkgd.js"></script>
    <script src="assets/js/templatemo.js"></script>
    <script src="assets/js/custom.js"></script>
</body>

</html>
