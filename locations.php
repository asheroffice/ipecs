<?php
$districts = [
    'Malir District, Karachi',
    'Naushahro Feroze',
    'Sukkur',
    'Tando Muhammad Khan',
    'Tharparkar',
    'Khairpur',
    'Umerkot',
    'Thatta',
    'Matiari',
    'Shaheed Benazirabad',
    'Sanghar',
    'Dadu',
    'Hyderabad',
    'Jacobabad',
    'Mirpur Khas',
    'Badin',
    'Kashmore',
    'Ghotki',
    'Jamshoro',
    'Sujawal',
    'Larkana',
    'Shikarpur',
    'Qambar Shahdadkot',
    'Tando Allahyar',
];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>IPECS Consulting PVT Ltd. | Locations</title>
    <meta name="description" content="IPECS Consulting — operational presence across Sindh, Pakistan. Offices in Karachi and Hyderabad, field capacity in districts province-wide.">
    <meta name="keywords" content="IPECS,Locations,Sindh,Karachi,Hyderabad,Consulting,Pakistan">
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

    <?php include __DIR__ . '/assets/include/header.php'; ?>

    <section class="contact-hero locations-page-hero">
        <div class="contact-hero-deco" aria-hidden="true">
            <span class="contact-hero-ring contact-hero-ring--1"></span>
            <span class="contact-hero-ring contact-hero-ring--2"></span>
            <span class="contact-hero-blob"></span>
        </div>
        <div class="container">
            <div class="row align-items-center g-4 g-lg-5">
                <div class="col-lg-6">
                    <div class="contact-hero-inner">
                        <h1 class="contact-title">IPECS presence in Sindh</h1>
                        <p class="contact-subtitle mb-0">We work across urban and rural Sindh with permanent offices in Karachi and Hyderabad, and teams that can be mobilised at short notice. Reach out for collaboration in any of the districts below.</p>
                    </div>
                </div>
                <div class="col-lg-6 text-center text-lg-end">
                    <img src="./assets/img/locations.svg" alt="" class="locations-hero-img" width="520" height="320" loading="eager">
                </div>
            </div>
        </div>
    </section>

    <section class="contact-content">
        <div class="container">
            <h2 class="locations-section-heading">Districts &amp; areas</h2>
            <div class="locations-intro">
                <p>IPECS is a well-established consultancy with a strong footprint in Sindh. The firm has been active in the region since 2012 and maintains permanent offices in <strong>Hyderabad</strong> and <strong>Karachi</strong>. We have worked in all districts of Sindh, including remote areas, with experts and enumerators ready to deploy when programmes require it.</p>
                <p>We have partnered with national and international organisations including FAO, UNDP, UNICEF, ADB, the World Bank, Save the Children, WWF, the Government of Sindh, and the Government of Balochistan, among others. For programme enquiries in a specific area, <a class="contact-link fw-semibold" href="contact.php">contact us</a>.</p>
            </div>

            <div class="row g-3 g-md-4">
                <?php foreach ($districts as $name) :
                    $label = 'Contact IPECS about work in ' . $name;
                    ?>
                <div class="col-md-6 col-xl-4">
                    <a class="locations-district-card" href="contact.php" aria-label="<?php echo htmlspecialchars($label, ENT_QUOTES, 'UTF-8'); ?>">
                        <span class="locations-district-icon" aria-hidden="true"><i class="bx bxs-map"></i></span>
                        <p class="locations-district-name"><?php echo htmlspecialchars($name, ENT_QUOTES, 'UTF-8'); ?></p>
                        <span class="locations-district-action" aria-hidden="true"><i class="bx bx-right-arrow-alt"></i></span>
                    </a>
                </div>
                <?php endforeach; ?>
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
