<?php

declare(strict_types=1);

$data = require __DIR__ . '/assets/include/our-impacts-data.php';

$h = static function (?string $s): string {
    return htmlspecialchars((string) $s, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
};

$mergeAchievement = static function (array $row): string {
    $c1 = trim((string) ($row[1] ?? ''));
    $c2 = trim((string) ($row[2] ?? ''));

    return $c1 === '' ? $c2 : ($c2 === '' ? $c1 : $c1 . ' — ' . $c2);
};

$sectors = $data['sectors'] ?? [];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>IPECS Consulting PVT Ltd. | Our impacts</title>
    <meta name="description" content="IPECS consolidated development impact across nine sectors — portfolio value, geographic reach, and sector-wise achievements aligned with our corporate profile.">
    <meta name="keywords" content="IPECS,Impact,Development,Portfolio,Sindh,Pakistan,UNDP,World Bank">
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

<body class="home-page our-impacts-page">

    <?php include __DIR__ . '/assets/include/header.php'; ?>

    <section class="contact-hero our-impacts-hero">
        <div class="contact-hero-deco" aria-hidden="true">
            <span class="contact-hero-ring contact-hero-ring--1"></span>
            <span class="contact-hero-ring contact-hero-ring--2"></span>
            <span class="contact-hero-blob"></span>
        </div>
        <div class="container">
            <div class="contact-hero-inner text-center mx-auto our-impacts-hero-inner">
                <p class="our-impacts-hero-kicker mb-2"><?php echo $h($data['hero_tagline'] ?? ''); ?></p>
                <h1 class="contact-title">Our impacts</h1>
                <p class="contact-subtitle mb-2">Consolidated development impact across Pakistan — one firm, nine sectors, measurable results.</p>
                <p class="our-impacts-hero-meta mb-0"><?php echo $h($data['hero_sub'] ?? ''); ?></p>
            </div>
        </div>
    </section>

    <section class="our-impacts-section" aria-labelledby="impacts-glance-heading">
        <div class="container">
            <h2 id="impacts-glance-heading" class="home-section-title dark text-center mb-2">Consolidated impact at a glance</h2>
            <p class="text-center text-muted mx-auto mb-4 our-impacts-section-lead">Key indicators and achievements drawn from IPECS’s corporate impact documentation.</p>
            <div class="our-impacts-table-wrap">
                <div class="table-responsive d-none d-md-block">
                    <table class="table our-impacts-summary-table mb-0">
                        <thead>
                            <tr>
                                <th scope="col">Impact indicator</th>
                                <th scope="col">Achievement</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data['consolidated'] ?? [] as $pair) { ?>
                                <tr>
                                    <td><?php echo $h($pair[0] ?? ''); ?></td>
                                    <td><?php echo $h($pair[1] ?? ''); ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="d-md-none our-impacts-cards">
                    <?php foreach ($data['consolidated'] ?? [] as $pair) { ?>
                        <article class="our-impacts-card">
                            <h3 class="our-impacts-card__title"><?php echo $h($pair[0] ?? ''); ?></h3>
                            <p class="our-impacts-card__value mb-0"><?php echo $h($pair[1] ?? ''); ?></p>
                        </article>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>

    <section class="our-impacts-section our-impacts-section--alt" aria-labelledby="impacts-portfolio-heading">
        <div class="container">
            <h2 id="impacts-portfolio-heading" class="home-section-title dark text-center mb-2">Sector-wise portfolio value</h2>
            <p class="text-center text-muted mx-auto mb-4 our-impacts-section-lead">Cumulative contract value by technical sector.</p>
            <div class="our-impacts-table-wrap">
                <div class="table-responsive">
                    <table class="table our-impacts-portfolio-table mb-0">
                        <thead>
                            <tr>
                                <th scope="col">Sector</th>
                                <th scope="col" class="text-end">Cumulative value</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data['portfolio_rows'] ?? [] as $pr) { ?>
                                <tr>
                                    <td><?php echo $h($pr[0] ?? ''); ?></td>
                                    <td class="text-end fw-semibold"><?php echo $h($pr[1] ?? ''); ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th scope="row">Total cumulative portfolio</th>
                                <td class="text-end"><?php echo $h($data['portfolio_total'] ?? ''); ?></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <section class="our-impacts-section" id="sector-tabs" aria-label="Sector-wise impact detail">
        <div class="container">
            <h2 class="home-section-title dark text-center mb-2">Sector portfolio detail</h2>
            <p class="text-center text-muted mx-auto mb-4 our-impacts-section-lead">Select a sector to view impact indicators, achievements, contract value, and key partners.</p>

            <ul class="nav nav-pills our-impacts-tabs justify-content-start justify-content-lg-center flex-nowrap gap-2 mb-4" id="impactsTab" role="tablist">
                <?php
                $i = 0;
                foreach ($sectors as $key => $sec) {
                    $tabId = 'impacts-' . $key . '-tab';
                    $paneId = 'impacts-' . $key;
                    $isFirst = $i === 0;
                    $i++;
                    ?>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link <?php echo $isFirst ? 'active' : ''; ?>" id="<?php echo $h($tabId); ?>" data-bs-toggle="tab" data-bs-target="#<?php echo $h($paneId); ?>" type="button" role="tab" aria-controls="<?php echo $h($paneId); ?>" aria-selected="<?php echo $isFirst ? 'true' : 'false'; ?>">
                            <span class="our-impacts-tab-n"><?php echo $h((string) ($sec['n'] ?? '')); ?></span>
                            <?php echo $h($sec['tab'] ?? $key); ?>
                        </button>
                    </li>
                <?php } ?>
            </ul>

            <div class="tab-content our-impacts-tab-content" id="impactsTabContent">
                <?php
                $j = 0;
                foreach ($sectors as $key => $sec) {
                    $paneId = 'impacts-' . $key;
                    $isFirst = $j === 0;
                    $j++;
                    $rows = $sec['impact_rows'] ?? [];
                    $page = (string) ($sec['page'] ?? 'sector.php');
                    ?>
                    <div class="tab-pane fade <?php echo $isFirst ? 'show active' : ''; ?>" id="<?php echo $h($paneId); ?>" role="tabpanel" aria-labelledby="impacts-<?php echo $h($key); ?>-tab" tabindex="0">
                        <div class="our-impacts-sector-panel">
                            <header class="our-impacts-sector-header">
                                <p class="our-impacts-sector-label mb-1">Sector <?php echo $h((string) ($sec['n'] ?? '')); ?></p>
                                <h3 class="our-impacts-sector-title mb-3"><?php echo $h($sec['title'] ?? ''); ?></h3>
                                <p class="our-impacts-sector-intro mb-0"><?php echo $h($sec['intro'] ?? ''); ?></p>
                            </header>

                            <div class="our-impacts-table-wrap our-impacts-table-wrap--sector mt-4">
                                <div class="table-responsive d-none d-lg-block">
                                    <table class="table sector-impact-table our-impacts-sector-table mb-0">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="sector-impact-th sector-impact-th--indicator">Impact indicator</th>
                                                <th scope="col" class="sector-impact-th sector-impact-th--achievement">Achievement</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($rows as $row) { ?>
                                                <tr>
                                                    <td class="sector-impact-td sector-impact-td--indicator"><?php echo $h((string) ($row[0] ?? '')); ?></td>
                                                    <td class="sector-impact-td sector-impact-td--achievement-text"><?php echo $h($mergeAchievement($row)); ?></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="d-lg-none sector-impact-cards">
                                    <?php foreach ($rows as $row) { ?>
                                        <article class="sector-impact-card">
                                            <h4 class="sector-impact-card__title"><?php echo $h((string) ($row[0] ?? '')); ?></h4>
                                            <div class="sector-impact-card__row sector-impact-card__row--achievement">
                                                <span class="sector-impact-card__label">Achievement</span>
                                                <p class="sector-impact-card__value mb-0"><?php echo $h($mergeAchievement($row)); ?></p>
                                            </div>
                                        </article>
                                    <?php } ?>
                                </div>
                            </div>

                            <footer class="our-impacts-sector-footer mt-4">
                                <p class="our-impacts-contract mb-2"><strong>Sector contract value:</strong> <?php echo $h($sec['contract_value'] ?? ''); ?></p>
                                <p class="our-impacts-partners mb-4"><strong>Key partners:</strong> <?php echo $sec['key_partners'] ?? ''; ?></p>
                                <a class="btn home-btn-navy" href="<?php echo $h($page); ?>">Full sector profile <i class="bx bx-right-arrow-alt" aria-hidden="true"></i></a>
                            </footer>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>

    <section class="our-impacts-section our-impacts-section--alt" aria-labelledby="impacts-geo-heading">
        <div class="container">
            <h2 id="impacts-geo-heading" class="home-section-title dark text-center mb-2">Geographic reach</h2>
            <div class="our-impacts-table-wrap">
                <div class="table-responsive">
                    <table class="table about-spec-table mb-0">
                        <thead>
                            <tr>
                                <th scope="col">Province</th>
                                <th scope="col">Districts covered</th>
                                <th scope="col">Operational context</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data['geo_rows'] ?? [] as $gr) { ?>
                                <tr>
                                    <td><?php echo $h($gr[0] ?? ''); ?></td>
                                    <td><?php echo $h($gr[1] ?? ''); ?></td>
                                    <td><?php echo $h($gr[2] ?? ''); ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <section class="our-impacts-section" aria-labelledby="impacts-clients-heading">
        <div class="container">
            <h2 id="impacts-clients-heading" class="home-section-title dark text-center mb-2">Our trusted client ecosystem</h2>
            <div class="our-impacts-table-wrap">
                <div class="table-responsive">
                    <table class="table about-spec-table our-impacts-clients-table mb-0">
                        <thead>
                            <tr>
                                <th scope="col">Category</th>
                                <th scope="col">Key partners</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data['client_ecosystem'] ?? [] as $ce) { ?>
                                <tr>
                                    <td class="fw-semibold"><?php echo $h($ce[0] ?? ''); ?></td>
                                    <td><?php echo $ce[1] ?? ''; ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <section class="our-impacts-quote-section" aria-label="IPECS impact ethos">
        <div class="container">
            <blockquote class="our-impacts-quote mb-0">
                <?php echo $h($data['quote'] ?? ''); ?>
            </blockquote>
        </div>
    </section>

    <section class="contact-hero sector-page-contact-hero our-impacts-cta-band" aria-label="Contact call to action">
        <div class="contact-hero-deco" aria-hidden="true">
            <span class="contact-hero-ring contact-hero-ring--1"></span>
            <span class="contact-hero-ring contact-hero-ring--2"></span>
            <span class="contact-hero-blob"></span>
        </div>
        <div class="container">
            <div class="contact-hero-inner text-center mx-auto">
                <h2 class="contact-title">Partner with IPECS</h2>
                <p class="contact-subtitle mb-4">Discuss how our multidisciplinary teams can support your programme or institution.</p>
                <a class="btn home-btn-navy" href="contact.php">
                    <span>Contact</span>
                    <i class="bx bx-right-arrow-alt" aria-hidden="true"></i>
                </a>
            </div>
        </div>
    </section>

    <?php include __DIR__ . '/assets/include/footer.php'; ?>

    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/isotope.pkgd.js"></script>
    <script src="assets/js/templatemo.js"></script>
    <script src="assets/js/custom.js"></script>
</body>

</html>
