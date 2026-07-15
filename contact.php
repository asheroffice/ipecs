<?php

declare(strict_types=1);

require_once __DIR__ . '/assets/include/mailer.php';

$formErrors = [];
$formValues = [
    'name' => '',
    'email' => '',
    'phone' => '',
    'company' => '',
    'subject' => '',
    'message' => '',
];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['inputname'])) {
    // Honeypot: real visitors never see or fill this field.
    if (trim((string) ($_POST['website'] ?? '')) !== '') {
        header('Location: contact.php?sent=1#contact-form');
        exit;
    }

    $formValues['name'] = trim((string) ($_POST['inputname'] ?? ''));
    $formValues['email'] = trim((string) ($_POST['inputemail'] ?? ''));
    $formValues['phone'] = trim((string) ($_POST['inputphone'] ?? ''));
    $formValues['company'] = trim((string) ($_POST['inputcompany'] ?? ''));
    $formValues['subject'] = trim((string) ($_POST['inputsubject'] ?? ''));
    $formValues['message'] = trim((string) ($_POST['message'] ?? ''));

    if ($formValues['name'] === '') {
        $formErrors['name'] = 'Please enter your name.';
    }
    if ($formValues['email'] === '' || !filter_var($formValues['email'], FILTER_VALIDATE_EMAIL)) {
        $formErrors['email'] = 'Please enter a valid email address.';
    }
    if ($formValues['message'] === '') {
        $formErrors['message'] = 'Please enter a message.';
    }

    if (!$formErrors) {
        $sentOk = ipc_send_contact_mail($formValues);
        header('Location: contact.php?sent=' . ($sentOk ? '1' : '0') . '#contact-form');
        exit;
    }
}

$sentStatus = $_GET['sent'] ?? null;
?>
<!DOCTYPE html>
<html lang="en">

<head>
<title>IPECS Consulting PVT Ltd. | Home</title>
    <meta name="description" content="IPECS Consulting. We believe that our commitment to our people is the guarantee of the quality of our service. We strive to pass on to our people a style of building relationships with our clients.">
    <meta name="keywords" content="IPECS,Consulting,Training,Development,Research">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="assets/img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <!-- Load Require CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font CSS -->
    <link href="assets/css/boxicon.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">
    <!-- Load Tempalte CSS -->
    <link rel="stylesheet" href="assets/css/templatemo.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/custom.css">

</head>

<body class="home-page">
    <!-- Header -->

    <?php include __DIR__ . '/assets/include/header.php'; ?>


    <!-- Close Header -->


    <!-- Contact hero (same system as Home) -->
    <section class="contact-hero">
        <div class="contact-hero-deco" aria-hidden="true">
            <span class="contact-hero-ring contact-hero-ring--1"></span>
            <span class="contact-hero-ring contact-hero-ring--2"></span>
            <span class="contact-hero-blob"></span>
        </div>
        <div class="container">
            <div class="contact-hero-inner">
                <h1 class="contact-title">Contact Us</h1>
                <p class="contact-subtitle mb-0">We’re here to respond to your queries. Share your details and our team will get back to you.</p>
            </div>
        </div>
    </section>

    <!-- Contact content -->
    <section class="contact-content">
        <div class="container">
    <!--    <h2 class="col-12 col-xl-8 h4 text-left regular-400">Elit, sed do eiusmod tempor </h2>
        <p class="col-12 col-xl-8 text-left text-muted pb-5 light-300">
            Incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices
            gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. Laboris
            nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit
            in voluptate.
        </p>
-->
            <div class="row g-4 g-lg-5 align-items-start">
                <div class="col-lg-4">
                    <div class="contact-card mb-3">
                        <div class="contact-card-icon"><i class="bx bx-phone"></i></div>
                        <div>
                            <h2 class="contact-card-title">Phone</h2>
                            <p class="contact-card-text mb-0"><a class="contact-link" href="tel:+9221111737467">UAN +92 21 111 737467</a></p>
                            <p class="contact-card-text mb-0"><a class="contact-link" href="tel:++922133377777">+92 21 33377777</a></p>
                            <p class="contact-card-text mb-1"><a class="contact-link" href="tel:+92213722542">+92 213 722 542</a></p>
                            <p class="contact-card-text mb-0"><a class="contact-link" href="tel:+923302800660">+92 330 2800 660</a></p>
                        </div>
                    </div>

                    <div class="contact-card mb-3">
                        <div class="contact-card-icon"><i class="bx bx-envelope"></i></div>
                        <div>
                            <h2 class="contact-card-title">Email</h2>
                            <p class="contact-card-text mb-1"><a class="contact-link" href="mailto:md@ipecs.org.pk">md@ipecs.org.pk</a></p>
                            <p class="contact-card-text mb-0"><a class="contact-link" href="mailto:ipecs.pk@gmail.com">ipecs.pk@gmail.com</a></p>
                            <p class="contact-card-text mb-0"><a class="contact-link" href="mailto:info@ipecs.org.pk">info@ipecs.org.pk</a></p>
                        </div>
                    </div>

                    <div class="contact-card">
                        <div class="contact-card-icon"><i class="bx bx-map"></i></div>
                        <div>
                            <h2 class="contact-card-title">Main Office</h2>
                            <p class="contact-card-text mb-0">Office No. 808, 8th Floor, Tower A, Saima Trade Tower, I.I Chundrigar Road, Karachi, Pakistan</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8">
                    <div class="contact-form-wrap" id="contact-form">
                        <h2 class="contact-form-title">Send us a message</h2>
                        <p class="contact-form-sub mb-4">Tell us what you’re looking for and we’ll respond shortly.</p>

                        <?php if ($sentStatus === '1') : ?>
                            <div class="alert alert-success" role="status">Thank you! Your message has been sent — we'll get back to you soon.</div>
                        <?php elseif ($sentStatus === '0') : ?>
                            <div class="alert alert-danger" role="alert">Sorry, something went wrong sending your message. Please try again, or email us directly at <a href="mailto:ipecs.pk@gmail.com">ipecs.pk@gmail.com</a>.</div>
                        <?php endif; ?>

                        <form class="contact-form row g-3" method="post" action="contact.php#contact-form" role="form" novalidate>

                            <div class="ipc-hp" aria-hidden="true">
                                <label for="website">Website</label>
                                <input type="text" id="website" name="website" tabindex="-1" autocomplete="off">
                            </div>

                            <div class="col-lg-6">
                                <label class="form-label contact-label" for="floatingname">Name</label>
                                <input type="text" class="form-control contact-input<?php echo isset($formErrors['name']) ? ' is-invalid' : ''; ?>" id="floatingname" name="inputname" placeholder="Your name" value="<?php echo htmlspecialchars($formValues['name'], ENT_QUOTES, 'UTF-8'); ?>" required>
                                <?php if (isset($formErrors['name'])) : ?><div class="invalid-feedback d-block"><?php echo htmlspecialchars($formErrors['name'], ENT_QUOTES, 'UTF-8'); ?></div><?php endif; ?>
                            </div>

                            <div class="col-lg-6">
                                <label class="form-label contact-label" for="floatingemail">Email</label>
                                <input type="email" class="form-control contact-input<?php echo isset($formErrors['email']) ? ' is-invalid' : ''; ?>" id="floatingemail" name="inputemail" placeholder="name@example.com" value="<?php echo htmlspecialchars($formValues['email'], ENT_QUOTES, 'UTF-8'); ?>" required>
                                <?php if (isset($formErrors['email'])) : ?><div class="invalid-feedback d-block"><?php echo htmlspecialchars($formErrors['email'], ENT_QUOTES, 'UTF-8'); ?></div><?php endif; ?>
                            </div>

                            <div class="col-lg-6">
                                <label class="form-label contact-label" for="floatingphone">Phone</label>
                                <input type="tel" class="form-control contact-input" id="floatingphone" name="inputphone" placeholder="+92 ..." value="<?php echo htmlspecialchars($formValues['phone'], ENT_QUOTES, 'UTF-8'); ?>">
                            </div>

                            <div class="col-lg-6">
                                <label class="form-label contact-label" for="floatingcompany">Organization</label>
                                <input type="text" class="form-control contact-input" id="floatingcompany" name="inputcompany" placeholder="Company / Organization" value="<?php echo htmlspecialchars($formValues['company'], ENT_QUOTES, 'UTF-8'); ?>">
                            </div>

                            <div class="col-12">
                                <label class="form-label contact-label" for="floatingsubject">Subject</label>
                                <input type="text" class="form-control contact-input" id="floatingsubject" name="inputsubject" placeholder="How can we help?" value="<?php echo htmlspecialchars($formValues['subject'], ENT_QUOTES, 'UTF-8'); ?>">
                            </div>

                            <div class="col-12">
                                <label class="form-label contact-label" for="floatingtextarea">Message</label>
                                <textarea class="form-control contact-input contact-textarea<?php echo isset($formErrors['message']) ? ' is-invalid' : ''; ?>" rows="6" placeholder="Write your message..." id="floatingtextarea" name="message" required><?php echo htmlspecialchars($formValues['message'], ENT_QUOTES, 'UTF-8'); ?></textarea>
                                <?php if (isset($formErrors['message'])) : ?><div class="invalid-feedback d-block"><?php echo htmlspecialchars($formErrors['message'], ENT_QUOTES, 'UTF-8'); ?></div><?php endif; ?>
                            </div>

                            <div class="col-12 d-flex justify-content-end pt-2">
                                <button type="submit" class="btn home-btn-navy px-4 py-2">Send Message <i class='bx bx-right-arrow-alt'></i></button>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <!-- Footer -->
    <?php include __DIR__ . '/assets/include/footer.php'; ?>

    <!-- Bootstrap -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <!-- Load jQuery (required for isotope blocks used site-wide) -->
    <script src="assets/js/jquery.min.js"></script>
    <!-- Isotope -->

    <!-- Custom -->
    <script src="assets/js/custom.js"></script>

</body>

</html>