<?php

declare(strict_types=1);

$clientsData = require __DIR__ . '/assets/include/clients-data.php';

$h = static function (?string $s): string {
    return htmlspecialchars((string) $s, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
};

$gov = $clientsData['government'] ?? [];
$un = $clientsData['un_and_development'] ?? [];
$ngo = $clientsData['ngo_and_civil_society'] ?? [];
$totalRows = count($gov) + count($un) + count($ngo);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>IPECS Consulting PVT Ltd. | Valued clients and partners</title>
    <meta name="description" content="IPECS Consulting — valued clients and partner organisations: government of Sindh and Pakistan, United Nations agencies, multilateral banks, international NGOs, and private sector partners.">
    <meta name="keywords" content="IPECS,Clients,Partners,UNDP,World Bank,Government of Sindh,Pakistan,Consulting">
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

<body class="home-page clients-pdf-page">

    <?php include __DIR__ . '/assets/include/header.php'; ?>

    <section class="contact-hero clients-page-hero">
        <div class="contact-hero-deco" aria-hidden="true">
            <span class="contact-hero-ring contact-hero-ring--1"></span>
            <span class="contact-hero-ring contact-hero-ring--2"></span>
            <span class="contact-hero-blob"></span>
        </div>
        <div class="container">
            <div class="contact-hero-inner text-center mx-auto clients-pdf-hero-inner">
                <p class="clients-pdf-kicker mb-2">VI · Valued clients and partner organisations</p>
                <h1 class="contact-title">Our clients &amp; partners</h1>
                <p class="contact-subtitle mb-0">Government, multilateral and bilateral partners, United Nations agencies, international NGOs, and private sector — aligned with IPECS’s corporate client documentation.</p>
            </div>
        </div>
    </section>

    <section class="clients-content-section" id="clients-overview">
        <div class="container">
            <div class="row g-4 align-items-start mb-5">
                <div class="col-lg-4">
                    <div class="clients-intro-card">
                        <div class="clients-intro-card__top">
                            <span class="clients-intro-card__kicker">Documented partnerships</span>
                            <span class="clients-intro-card__count"><?php echo (int) $totalRows; ?></span>
                            <span class="clients-intro-card__label">Entries</span>
                        </div>
                        <p class="clients-intro-card__text mb-0">IPECS works with public institutions, development partners, and communities across Pakistan. The tables below reflect programme alignment by organisation, technical focus, and funding source.</p>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="clients-pdf-toc">
                        <h2 class="clients-pdf-toc__title mb-3">On this page</h2>
                        <ul class="clients-pdf-toc__list list-unstyled mb-0">
                            <li><a class="clients-pdf-toc__link" href="#clients-government"><span class="clients-pdf-toc__n">6.1</span> Government clients</a></li>
                            <li><a class="clients-pdf-toc__link" href="#clients-un"><span class="clients-pdf-toc__n">6.2</span> United Nations and international development organisations</a></li>
                            <li><a class="clients-pdf-toc__link" href="#clients-ngo"><span class="clients-pdf-toc__n">6.3</span> International NGOs and civil society organisations</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <section class="clients-pdf-block mb-5" id="clients-government" aria-labelledby="clients-h-gov">
                <h2 id="clients-h-gov" class="clients-pdf-section-title"><span class="clients-pdf-section-n">6.1</span> Government clients</h2>
                <div class="our-impacts-table-wrap">
                    <div class="table-responsive">
                        <table class="table about-spec-table clients-pdf-table mb-0">
                            <thead>
                                <tr>
                                    <th scope="col">Organisation</th>
                                    <th scope="col">Sector / focus</th>
                                    <th scope="col">Funding source</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($gov as $row) { ?>
                                    <tr>
                                        <td><?php echo $h($row[0] ?? ''); ?></td>
                                        <td><?php echo $h($row[1] ?? ''); ?></td>
                                        <td><?php echo $h($row[2] ?? ''); ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>

            <section class="clients-pdf-block mb-5" id="clients-un" aria-labelledby="clients-h-un">
                <h2 id="clients-h-un" class="clients-pdf-section-title"><span class="clients-pdf-section-n">6.2</span> United Nations and international development organisations</h2>
                <div class="our-impacts-table-wrap">
                    <div class="table-responsive">
                        <table class="table about-spec-table clients-pdf-table mb-0">
                            <thead>
                                <tr>
                                    <th scope="col">Organisation</th>
                                    <th scope="col">Sector / focus</th>
                                    <th scope="col">Funding source</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($un as $row) { ?>
                                    <tr>
                                        <td><?php echo $h($row[0] ?? ''); ?></td>
                                        <td><?php echo $h($row[1] ?? ''); ?></td>
                                        <td><?php echo $h($row[2] ?? ''); ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>

            <section class="clients-pdf-block mb-0" id="clients-ngo" aria-labelledby="clients-h-ngo">
                <h2 id="clients-h-ngo" class="clients-pdf-section-title"><span class="clients-pdf-section-n">6.3</span> International NGOs and civil society organisations</h2>
                <div class="our-impacts-table-wrap">
                    <div class="table-responsive">
                        <table class="table about-spec-table clients-pdf-table mb-0">
                            <thead>
                                <tr>
                                    <th scope="col">Organisation</th>
                                    <th scope="col">Sector / focus</th>
                                    <th scope="col">Funding source</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($ngo as $row) { ?>
                                    <tr>
                                        <td><?php echo $h($row[0] ?? ''); ?></td>
                                        <td><?php echo $h($row[1] ?? ''); ?></td>
                                        <td><?php echo $h($row[2] ?? ''); ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>
    </section>

    <section class="contact-hero sector-page-contact-hero" aria-label="Explore impact">
        <div class="contact-hero-deco" aria-hidden="true">
            <span class="contact-hero-ring contact-hero-ring--1"></span>
            <span class="contact-hero-ring contact-hero-ring--2"></span>
            <span class="contact-hero-blob"></span>
        </div>
        <div class="container">
            <div class="contact-hero-inner text-center mx-auto">
                <h2 class="contact-title">See our impact</h2>
                <p class="contact-subtitle mb-4">Consolidated results and sector portfolio — one view across nine technical sectors.</p>
                <a class="btn home-btn-navy me-2 mb-2" href="our-impacts.php">Our impacts <i class="bx bx-right-arrow-alt" aria-hidden="true"></i></a>
                <a class="btn clients-secondary-btn mb-2" href="contact.php">Contact</a>
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
