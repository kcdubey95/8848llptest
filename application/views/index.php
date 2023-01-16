<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title><?php echo $title ?></title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <link href="" rel="icon">
    <link rel="shortcut icon" type="image/x-icon" href="https://8848digital.com/assets/images/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/vendor/aos/aos.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.1/b-2.3.3/b-html5-2.3.3/b-print-2.3.3/datatables.min.css" />
    <link href="<?php echo base_url() ?>assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <!-- Template Main CSS File -->
    <link href="<?php echo base_url() ?>assets/css/style.css" rel="stylesheet">
</head>
<body>
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top ">
        <div class="container d-flex align-items-center">

            <h1 class="logo me-auto"><a href="<?php echo base_url() ?>schools">8848 LLP</a></h1>

            <nav id="navbar" class="navbar">
                <ul>
                    <a class="nav-link" href="<?php echo base_url() ?>schools">Home </a>
                    <li><a class="nav-link scrollto" href="<?php echo base_url() ?>about">About</a></li>
                    <a class="nav-link" href="<?php echo base_url() ?>logout">Logout</a>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->
        </div>
    </header><!-- End Header -->
    <?php echo $page; ?>
    <footer>
        <!-- ======= Footer ======= -->
        <footer id="footer">
            <div class="footer-top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 footer-contact">
                            <h3>8848LPP</h3>
                            <p>
                                Kailash Business Park, <br>
                                Vikhroli, Mumbai, Maharashtra 400076
                                <strong>Phone:</strong> 229136308188<br>
                                <strong>Email:</strong> info@example.com<br>
                            </p>
                        </div>
                        <div class="col-lg-3 col-md-6 footer-links">
                            <h4>Useful Links</h4>
                            <ul>
                                <li><i class="bx bx-chevron-right"></i> <a href="<?php echo base_url() ?>schools">Home</a></li>
                                <li><i class="bx bx-chevron-right"></i> <a href="<?php echo base_url() ?>about">About us</a></li>
                            </ul>
                        </div>
                        <div class="col-lg-3 col-md-6 footer-links">
                            <h4>Our Services</h4>
                            <ul>
                                <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
                                <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
                            </ul>
                        </div>
                        <div class="col-lg-3 col-md-6 footer-links">
                            <h4>Our Social Networks</h4>
                            <p>Cras fermentum odio eu feugiat lide par naso tierra videa magna derita valies</p>
                            <div class="social-links mt-3">
                                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container footer-bottom clearfix">
                <div class="credits">
                  
                    Made by <a href="#">Krishnachand Dubey</a>
                </div>
            </div>
        </footer><!-- End Footer -->
        <div id="preloader"></div>
        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.1/b-2.3.3/b-html5-2.3.3/b-print-2.3.3/datatables.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="<?php echo base_url() ?>assets/vendor/aos/aos.js"></script>
        <script src="<?php echo base_url() ?>assets/vendor/glightbox/js/glightbox.min.js"></script>
        <script src="<?php echo base_url() ?>assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
        <script src="<?php echo base_url() ?>assets/vendor/swiper/swiper-bundle.min.js"></script>
        <script src="<?php echo base_url() ?>assets/vendor/waypoints/noframework.waypoints.js"></script>
        <script src="<?php echo base_url() ?>assets/vendor/php-email-form/validate.js"></script>
        <!-- Template Main JS File -->
        <script src="<?php echo base_url() ?>assets/js/main.js"></script>
</body>

</html>
</footer>