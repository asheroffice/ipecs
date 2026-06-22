<?php

declare(strict_types=1);

$db = require __DIR__ . '/assets/include/sectors-data.php';
$order = $db['order'] ?? [];
$sectors = $db['sectors'] ?? [];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>IPECS Consulting PVT Ltd. | Sectors</title>
    <meta name="description" content="IPECS Consulting - nine technical sectors: education, governance, engineering, climate, WASH, digital, inclusion, MEAL, and health - each with dedicated expertise and portfolio.">
    <meta name="keywords" content="IPECS,Sectors,Consulting,Education,Governance,Infrastructure,Climate,WASH,Digital,MEAL,Health,Pakistan">
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

<body class="home-page sector-page sector-hub-page">

    <?php include __DIR__ . '/assets/include/header.php'; ?>

    <section class="sector-hub-masthead" aria-labelledby="sector-hub-title">
        <div class="sector-hub-masthead__bg" aria-hidden="true"></div>
        <div class="container">
            <div class="contact-hero-inner text-center mx-auto sector-hub-hero-inner">
                <h1 id="sector-hub-title" class="contact-title">Our sectors</h1>
                <p class="contact-subtitle mb-0">Nine technical sectors drawn from our portfolio documentation - full sector overview, core capabilities, cumulative impact, contract value, and key clients and funders on each page.</p>
            </div>
        </div>
    </section>

    <section class="services-intro-section">
        <div class="container">
            <div class="services-intro-inner mx-auto text-center">
                <p class="services-intro-text mb-0">Select a sector to read the complete narrative: hero overview, detailed technical capabilities, impact table, and client ecosystem - aligned with IPECS sector briefs.</p>
            </div>
        </div>
    </section>

    <section class="home-services-section sector-hub-grid-section">
        <div class="container">
            <h2 class="home-section-title dark text-center d-block mb-2">Explore by sector</h2>
            <p class="sector-hub-lead text-center mx-auto mb-5">Each card previews the opening lines of that sector’s overview; open the page for the full PDF-aligned content.</p>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <article class="home-service-card">
                        <img src="./assets/img/services-01.jpg" alt="">
                        <div class="card-body">
                            <p class="home-service-label mb-1">Sector</p>
                            <h3>Education systems strengthening &amp; skills development</h3>
                            <p class="excerpt">Integrated education and TVET solutions from early childhood through higher education, aligned with SDG 4.</p>
                            <a class="btn-read" href="sector-education.php">Read More</a>
                        </div>
                    </article>
                </div>
                <div class="col-lg-4 col-md-6">
                    <article class="home-service-card">
                        <img src="./assets/img/governance/1.jpeg" alt="">
                        <div class="card-body">
                            <p class="home-service-label mb-1">Sector</p>
                            <h3>Governance, policy &amp; public sector reform</h3>
                            <p class="excerpt">Institutional diagnostics, policy design, PPP advisory, and accountability systems at all government levels.</p>
                            <a class="btn-read" href="sector-governance.php">Read More</a>
                        </div>
                    </article>
                </div>
                <div class="col-lg-4 col-md-6">
                    <article class="home-service-card">
                        <img src="./assets/img/engineering/1.jpeg" alt="">
                        <div class="card-body">
                            <p class="home-service-label mb-1">Sector</p>
                            <h3>Engineering, infrastructure &amp; urban development</h3>
                            <p class="excerpt">Full infrastructure lifecycle: feasibility, design, supervision, and sustainable O&amp;M planning.</p>
                            <a class="btn-read" href="sector-infrastructure.php">Read More</a>
                        </div>
                    </article>
                </div>
                <div class="col-lg-4 col-md-6">
                    <article class="home-service-card">
                        <img src="./assets/img/climate/1.jpeg" alt="">
                        <div class="card-body">
                            <p class="home-service-label mb-1">Sector</p>
                            <h3>Climate-smart environment, energy &amp; resilience</h3>
                            <p class="excerpt">Climate policy, renewable energy, CSA, NRM, DRR, and safeguards aligned with Pakistan's climate commitments.</p>
                            <a class="btn-read" href="sector-climate.php">Read More</a>
                        </div>
                    </article>
                </div>
                <div class="col-lg-4 col-md-6">
                    <article class="home-service-card">
                        <img src="./assets/img/home-main-slider/slide-005.jpg" alt="">
                        <div class="card-body">
                            <p class="home-service-label mb-1">Sector</p>
                            <h3>Water, sanitation &amp; integrated urban services</h3>
                            <p class="excerpt">WASH engineering, solid waste, hygiene BCC, and institutional sustainability across rural and urban contexts.</p>
                            <a class="btn-read" href="sector-wash.php">Read More</a>
                        </div>
                    </article>
                </div>
                <div class="col-lg-4 col-md-6">
                    <article class="home-service-card">
                        <img src="./assets/img/technology/4.webp" alt="">
                        <div class="card-body">
                            <p class="home-service-label mb-1">Sector</p>
                            <h3>Technology, digital transformation &amp; smart systems</h3>
                            <p class="excerpt">E-government, MIS, digital data collection, IoT, digital GRM, and analytics for evidence-based decisions.</p>
                            <a class="btn-read" href="sector-technology.php">Read More</a>
                        </div>
                    </article>
                </div>
                <div class="col-lg-4 col-md-6">
                    <article class="home-service-card">
                        <img src="./assets/img/services-07.jpg" alt="">
                        <div class="card-body">
                            <p class="home-service-label mb-1">Sector</p>
                            <h3>Social inclusion, gender equity &amp; rural development</h3>
                            <p class="excerpt">GESI mainstreaming, community-driven development, livelihoods, social protection, and safe programming.</p>
                            <a class="btn-read" href="sector-inclusion.php">Read More</a>
                        </div>
                    </article>
                </div>
                <div class="col-lg-4 col-md-6">
                    <article class="home-service-card">
                        <img src="./assets/img/monitoring/1.jpg" alt="">
                        <div class="card-body">
                            <p class="home-service-label mb-1">Sector</p>
                            <h3>Monitoring, evaluation, learning &amp; impact</h3>
                            <p class="excerpt">RBM, independent evaluations, third-party monitoring, surveys, and adaptive management for accountability.</p>
                            <a class="btn-read" href="sector-meal.php">Read More</a>
                        </div>
                    </article>
                </div>
                <div class="col-lg-4 col-md-6">
                    <article class="home-service-card">
                        <img src="./assets/img/health/1.jpeg" alt="">
                        <div class="card-body">
                            <p class="home-service-label mb-1">Sector</p>
                            <h3>Health systems strengthening &amp; nutrition</h3>
                            <p class="excerpt">WHO-framed health systems support, multi-sectoral nutrition, MNCH, SBCC, and community health delivery.</p>
                            <a class="btn-read" href="sector-health.php">Read More</a>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>

    <section class="sector-hub-reach-section" id="reach">
        <div class="container">
            <h2 class="home-section-title dark text-center d-block mb-2">Geographic reach</h2>
            <p class="sector-hub-lead text-center mx-auto mb-4">Operational presence across provinces - urban, peri-urban, and remote rural contexts.</p>
            <div class="table-responsive">
                <table class="table table-bordered sector-hub-table align-middle">
                    <thead>
                        <tr>
                            <th scope="col">Province</th>
                            <th scope="col">Districts covered</th>
                            <th scope="col">Operational context</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>Sindh</strong></td>
                            <td>29 districts</td>
                            <td>Karachi, Hyderabad, Sukkur, Larkana, Thatta, Badin, Tharparkar, Umerkot, Sanghar, Mirpurkhas, Nawabshah, Naushahro Feroze, Khairpur, Ghotki, Jacobabad, Kashmore, Shikarpur, Dadu, Matiari, Tando Allahyar, Tando Muhammad Khan, Sujawal, Kambar Shahdadkot, Jamshoro, and others</td>
                        </tr>
                        <tr>
                            <td><strong>Balochistan</strong></td>
                            <td>3 districts</td>
                            <td>Quetta, Gwadar, Lasbela</td>
                        </tr>
                        <tr>
                            <td><strong>KPK</strong></td>
                            <td>2 districts</td>
                            <td>Upper Dir, Swat</td>
                        </tr>
                        <tr>
                            <td><strong>Total</strong></td>
                            <td>34+ districts</td>
                            <td>Urban, peri-urban, and remote rural</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <section class="sector-hub-ecosystem-section" id="partners">
        <div class="container">
            <h2 class="home-section-title dark text-center d-block mb-2">Our trusted client ecosystem</h2>
            <p class="sector-hub-lead text-center mx-auto mb-4">Categories of institutions we work with across sectors.</p>
            <div class="table-responsive">
                <table class="table table-bordered sector-hub-table align-middle">
                    <thead>
                        <tr>
                            <th scope="col">Category</th>
                            <th scope="col">Key partners</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Multilateral banks</td>
                            <td>World Bank, Asian Development Bank, AIIB, Islamic Development Bank</td>
                        </tr>
                        <tr>
                            <td>United Nations &amp; development agencies</td>
                            <td>UNDP, UNICEF, FAO, UNESCO, IFAD, USAID</td>
                        </tr>
                        <tr>
                            <td>Government of Sindh</td>
                            <td>Planning &amp; Development Department, SSPA, LGD, Energy Department, Agriculture Department, PHED</td>
                        </tr>
                        <tr>
                            <td>Government of Balochistan</td>
                            <td>Secondary Education Department</td>
                        </tr>
                        <tr>
                            <td>Government of Pakistan</td>
                            <td>Ministry of Education, Ministry of Climate Change</td>
                        </tr>
                        <tr>
                            <td>International NGOs</td>
                            <td>Save the Children, Oxfam, Concern Worldwide, ACTED, HEKS/EPER, Kindernothilfe, KOICA, WWF</td>
                        </tr>
                        <tr>
                            <td>Private sector &amp; CSR</td>
                            <td>Pakistan Petroleum Limited, PPAF, Indus Valley School System</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <section class="sector-hub-quote-section" aria-label="IPECS ethos">
        <div class="container">
            <p class="sector-hub-quote mb-0">“Our impact is not measured in contracts alone. It is measured in lives improved, institutions strengthened, communities empowered, and systems built to endure.”</p>
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
                <h2 class="contact-title">Not sure which sector fits your programme?</h2>
                <p class="contact-subtitle mb-4">We work across boundaries every day - tell us what you are trying to achieve and we will map the right practice area.</p>
                <a class="btn home-btn-navy" href="contact.php">
                    <span>Contact us</span>
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
