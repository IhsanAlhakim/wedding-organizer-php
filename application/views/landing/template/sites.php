<?php
// Mendapatkan lokasi halaman saat ini
$url = $this->uri->segment(1);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>CaterServ - Catering Services Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Playball&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?= base_url('assets/landing/') ?>lib/animate/animate.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/landing/') ?>lib/lightbox/css/lightbox.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/landing/') ?>lib/owlcarousel/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?= base_url('assets/landing/') ?>css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="<?= base_url('assets/landing/') ?>css/style.css" rel="stylesheet">
</head>

<body>

    <!-- Spinner Start -->
    <div id="spinner"
        class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->

    <!-- Navbar start -->
    <div class="container-fluid nav-bar">
        <div class="container">
            <nav class="navbar navbar-light navbar-expand-lg py-4">
                <a href="<?= base_url('') ?>" class="navbar-brand">
                    <img src="<?= base_url('assets/files/') . $getDataWeb->logo; ?>" alt="" height="30">
                </a>
                <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars text-primary"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav mx-auto">
                        <a href="<?= base_url('') ?>"
                            class="nav-item nav-link <?= ($url == '' || $url == 'Beranda') ? 'active' : ''; ?>">Beranda</a>
                        <a href="<?= base_url('Kontak') ?>"
                            class="nav-item nav-link <?= $url == 'Kontak' ? 'active' : ''; ?>">Kontak Kami</a>
                    </div>
                    <a href="<?= base_url('Login') ?>"
                        class="btn btn-primary py-2 px-4 d-none d-xl-inline-block rounded-pill">Login</a>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->

    <!-- Menampilkan halaman yang bukan template -->
    <?php $this->load->view($page); ?>

    <!-- Footer Start -->
    <div class="container-fluid footer py-6 my-6 mb-0 bg-light wow bounceInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="footer-item">
                        <img src="<?= base_url('assets/files/') . $getDataWeb->logo; ?>" alt="" height="50">
                        <p class="lh-lg mb-4">Penyedia layanan pernikahan profesional yang berdedikasi untuk
                            mewujudkan setiap detail hari istimewa Anda dengan sempurna.</p>
                        <div class="footer-icon d-flex">
                            <a target="_blank" class="btn btn-primary btn-sm-square me-2 rounded-circle"
                                href="<?= $getDataWeb->facebook_url; ?>"><i class="fab fa-facebook-f"></i></a>
                            <a target="_blank" href="<?= $getDataWeb->instagram_url; ?>"
                                class="btn btn-primary btn-sm-square me-2 rounded-circle"><i
                                    class="fab fa-instagram"></i></a>
                            <a target="_blank" href="<?= $getDataWeb->youtube_url; ?>"
                                class="btn btn-primary btn-sm-square rounded-circle"><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="footer-item">
                        <h4 class="mb-4">Special Facilities</h4>
                        <div class="d-flex flex-column align-items-start">
                            <p class="text-body mb-3" href=""><i class="fa fa-check text-primary me-2"></i>Wedding
                                Consultation</p>
                            <p class="text-body mb-3" href=""><i class="fa fa-check text-primary me-2"></i>Bridal
                                Makeup
                            </p>
                            <p class="text-body mb-3" href=""><i class="fa fa-check text-primary me-2"></i>Entertainment
                            </p>
                            <p class="text-body mb-3" href=""><i class="fa fa-check text-primary me-2"></i>Guest
                                Management</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="footer-item">
                        <h4 class="mb-4">Contact Us</h4>
                        <div class="d-flex flex-column align-items-start">
                            <p><i class="fa fa-map-marker-alt text-primary me-2"></i> <?= $getDataWeb->address; ?></p>
                            <p><i class="fa fa-phone-alt text-primary me-2"></i> <?= $getDataWeb->phone_number1; ?></p>
                            <p><i class="fas fa-envelope text-primary me-2"></i> <?= $getDataWeb->email1; ?></p>
                            <p><i class="fa fa-clock text-primary me-2"></i> <?= $getDataWeb->time_business_hour; ?></p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Copyright Start -->
    <div class="container-fluid copyright bg-dark py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    <span class="text-light"><a href="#"><i
                                class="fas fa-copyright text-light me-2"></i><?= date('Y') ?>.
                            <?= $getDataWeb->website_name; ?></a>.
                        All
                        right reserved.</span>
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-md-square btn-primary rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('assets/landing/') ?>lib/wow/wow.min.js"></script>
    <script src="<?= base_url('assets/landing/') ?>lib/easing/easing.min.js"></script>
    <script src="<?= base_url('assets/landing/') ?>lib/waypoints/waypoints.min.js"></script>
    <script src="<?= base_url('assets/landing/') ?>lib/counterup/counterup.min.js"></script>
    <script src="<?= base_url('assets/landing/') ?>lib/lightbox/js/lightbox.min.js"></script>
    <script src="<?= base_url('assets/landing/') ?>lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="<?= base_url('assets/landing/') ?>js/main.js"></script>
</body>

</html>