<!DOCTYPE html>
<html lang="en">

<head>
    <title>IPECS Consulting PVT Ltd. | Clients</title>
    <meta name="description" content="IPECS Consulting. We believe that our commitment to our people is the guarantee of the quality of our service. We strive to pass on to our people a style of building relationships with our clients.">
    <meta name="keywords" content="IPECS,Clients,Consulting,Training,Development,Research">
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

<body class="home-page">

    <?php
    $clients = [
        [
            'name' => 'Accelerated action plan(AAP) for reduction of stunting & malnutrition, local government department Government of Sindh Funded by World Bank',
            'url' => 'https://aaphealth.gos.pk/',
        ],
        [
            'name' => 'Saaf Suthro Sindh Program (SSSP) Local Government Department Government of Sindh Funded by World Bank',
            'url' => 'https://www.worldbank.org/',
        ],
        [
            'name' => 'Public Health Engineering Department Government of Sindh',
            'url' => 'https://www.sindh.gov.pk/',
        ],
        [
            'name' => 'Sindh Irrigation and Drainage Authority (SIDA), Government of Sindh',
            'url' => 'http://www.sida.org.pk/',
        ],
        [
            'name' => 'Minority Affair Work and services Department Government of Sindh',
            'url' => 'https://www.sindh.gov.pk/',
        ],
        [
            'name' => 'Shaheed Benazir Bhutto Housing Cell Ministry of Housing Government of Sindh',
            'url' => 'https://www.housing.gos.pk/',
        ],
        [
            'name' => 'Care International (International NGO)',
            'url' => 'https://www.care.org/',
        ],
        [
            'name' => 'Oxfam International',
            'url' => 'https://www.oxfam.org/',
        ],
        [
            'name' => 'UNICEF',
            'url' => 'https://www.unicef.org/',
        ],
        [
            'name' => 'USAID',
            'url' => 'https://www.usaid.gov/',
        ],
        [
            'name' => 'UNDP',
            'url' => 'https://www.undp.org/',
        ],
        [
            'name' => 'ACTED',
            'url' => 'https://www.acted.org/',
        ],
        [
            'name' => 'KOICA, Pakistan',
            'url' => 'https://koica.go.kr/sites/pak_en/index.do#n',
        ],
        [
            'name' => 'Pakistan Petroleum Limited (PPL)',
            'url' => 'https://www.ppl.com.pk/',
        ],
        [
            'name' => 'Save The Children',
            'url' => 'https://www.savethechildren.org/',
        ],
        [
            'name' => 'WWF',
            'url' => 'https://www.worldwildlife.org/',
        ],
        [
            'name' => 'UNFAO',
            'url' => 'http://www.fao.org/pakistan/',
        ],
        [
            'name' => 'Concern Worldwide',
            'url' => 'https://www.concern.net/',
        ],
        [
            'name' => 'Indus Valley School System (IVSS)',
            'url' => 'https://www.indusvalleyschool.com/',
        ],
        [
            'name' => 'Shaheed Benazir Bhutto Housing Cell Government of Sindh',
            'url' => 'https://www.housing.gos.pk/',
        ],
        [
            'name' => 'Social Protection Authority Government of Sindh',
            'url' => 'https://sindh.gov.pk/dpt/SocialProtectionAuthority/',
        ],
    ];

    include __DIR__ . '/assets/include/header.php';
    ?>

    <section class="contact-hero clients-page-hero">
        <div class="contact-hero-deco" aria-hidden="true">
            <span class="contact-hero-ring contact-hero-ring--1"></span>
            <span class="contact-hero-ring contact-hero-ring--2"></span>
            <span class="contact-hero-blob"></span>
        </div>
        <div class="container">
            <div class="contact-hero-inner">
                <h1 class="contact-title">Our clients</h1>
                <p class="contact-subtitle mb-0">Partnerships across government, donors, UN agencies, NGOs, and the private sector.</p>
            </div>
        </div>
    </section>

    <section class="clients-content-section">
        <div class="container">
            <div class="row g-4 align-items-start mb-4 mb-lg-5">
                <div class="col-lg-4">
                    <div class="clients-intro-card">
                        <div class="clients-intro-card__top">
                            <span class="clients-intro-card__kicker">Trusted by</span>
                            <span class="clients-intro-card__count"><?php echo (int) count($clients); ?></span>
                            <span class="clients-intro-card__label">Organizations</span>
                        </div>
                        <p class="clients-intro-card__text mb-0">We support planning, implementation, M&amp;E, surveys, and systems strengthening — with a focus on delivery quality and long-term partnerships.</p>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="clients-list-card">
                        <div class="clients-list-card__header">
                            <h2 class="clients-list-card__title mb-0">Client list</h2>
                            <p class="clients-list-card__subtitle mb-0">Click any name to visit the organization.</p>
                        </div>
                        <div class="row g-2 g-md-3 clients-list">
                            <?php foreach ($clients as $c) : ?>
                                <div class="col-12 col-xl-6">
                                    <a class="clients-list__item" href="<?php echo htmlspecialchars($c['url'], ENT_QUOTES, 'UTF-8'); ?>" target="_blank" rel="noopener">
                                        <span class="clients-list__dot" aria-hidden="true"></span>
                                        <span class="clients-list__name"><?php echo htmlspecialchars($c['name'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); ?></span>
                                        <i class='bx bx-link-external clients-list__icon' aria-hidden="true"></i>
                                    </a>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="clients-grid">
                <div class="clients-grid__header">
                    <h2 class="clients-grid__title mb-0">Featured partnerships</h2>
                    <p class="clients-grid__subtitle mb-0">A few highlights from the wider client list.</p>
                </div>
                <div class="row g-3 g-lg-4">
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="client-tile">
                            <div class="client-tile__media">
                                <img class="client-tile__img" src="assets/img/recent-work-01.png" alt="Accelerated Action Plan (AAP)">
                            </div>
                            <div class="client-tile__body">
                                <p class="client-tile__name mb-0">Accelerated Action Plan (AAP)</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="client-tile">
                            <div class="client-tile__media">
                                <img class="client-tile__img" src="assets/img/recent-work-02.png" alt="Government of Sindh">
                            </div>
                            <div class="client-tile__body">
                                <p class="client-tile__name mb-0">Government of Sindh</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="client-tile">
                            <div class="client-tile__media">
                                <img class="client-tile__img" src="assets/img/recent-work-03.png" alt="Pakistan Petroleum Limited (PPL)">
                            </div>
                            <div class="client-tile__body">
                                <p class="client-tile__name mb-0">Pakistan Petroleum Limited (PPL)</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="client-tile">
                            <div class="client-tile__media">
                                <img class="client-tile__img" src="assets/img/recent-work-04.png" alt="UNICEF">
                            </div>
                            <div class="client-tile__body">
                                <p class="client-tile__name mb-0">UNICEF</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="client-tile">
                            <div class="client-tile__media">
                                <img class="client-tile__img" src="assets/img/recent-work-05.png" alt="UNDP">
                            </div>
                            <div class="client-tile__body">
                                <p class="client-tile__name mb-0">UNDP</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="client-tile">
                            <div class="client-tile__media">
                                <img class="client-tile__img" src="assets/img/recent-work-06.png" alt="Sindh Irrigation and Drainage Authority (SIDA)">
                            </div>
                            <div class="client-tile__body">
                                <p class="client-tile__name mb-0">SIDA</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="client-tile">
                            <div class="client-tile__media">
                                <img class="client-tile__img" src="assets/img/recent-work-07.png" alt="ACTED">
                            </div>
                            <div class="client-tile__body">
                                <p class="client-tile__name mb-0">ACTED</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="client-tile">
                            <div class="client-tile__media">
                                <img class="client-tile__img" src="assets/img/recent-work-08.png" alt="Care International">
                            </div>
                            <div class="client-tile__body">
                                <p class="client-tile__name mb-0">Care</p>
                            </div>
                        </div>
                    </div>
                </div>
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