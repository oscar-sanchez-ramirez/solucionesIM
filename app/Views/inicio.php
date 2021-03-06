<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>FACTICOM</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link rel="icon" href="img/icono.ico" type="image/icon">

  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Arsha - v2.0.0
  * Template URL: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">

      <h1 class="logo mr-auto"><a href="<?= base_url('/') ?>">FACTICOM</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="<?= base_url('/') ?>">INICIO</a></li>
          <li><a href="#about">Nosotros</a></li>
          <li><a href="#team">Equipo</a></li>
          <li><a href="<?= base_url('login') ?>"><i class="fas fa-user">&nbsp;Iniciar Sesión</i></a></li>
        </ul>
      </nav><!-- .nav-menu -->


  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
          <h1>FACTICOM</h1>
          <h2>El sistema que te garantiza dar una solución a todas tus necesidades de Banca y Facturación Electrónica en un sólo Click</h2>
          <div class="d-lg-flex">
            <a href="#about" class="btn-get-started scrollto">Comenzar</a>
            <a href="https://www.youtube.com/watch?v=XdiBjwJmvEE" class="venobox btn-watch-video" data-vbtype="video" data-autoplay="true"> Ver Video <i class="icofont-play-alt-2"></i></a>
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
          <img src="assets/img/hero-img.png" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Cliens Section ======= -->
    <section id="cliens" class="cliens section-bg">
      <div class="container">

        <div class="row" data-aos="zoom-in">

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="assets/img/clients/PayPal.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="assets/img/clients/stripeblue.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="assets/img/clients/PayU.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="assets/img/clients/Soluciones.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="assets/img/clients/Sicofi.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="assets/img/clients/sa.png" class="img-fluid" alt="SAT">
          </div>

        </div>

      </div>
    </section><!-- End Cliens Section -->

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Sobre nosotros</h2>
        </div>

        <div class="row content">
          <div class="col-lg-6">
            <!-- <p>
            Nos dedicamos a la administracion de los pagos de nuestros clientes al llevarles un control echas por nuestras pasarelas de pagos.
            </p> -->
            <ul>
              <li><i class="ri-check-double-line"></i>PayPal</li>
              <li><i class="ri-check-double-line"></i>Stripe</li>
              <li><i class="ri-check-double-line"></i>PayU</li>
            </ul>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0">
            <p>
            <!-- ¿Buscas alguna función en específico para tu sitio web o tienda en línea? Contamos con programadores especializados en desarrollo de web a la medida. -->
            </p>
            <!-- <a href="#" class="btn-learn-more">Learn More</a> -->
          </div>
        </div>

      </div>
    </section><!-- End About Us Section -->

    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
      <div class="container" data-aos="zoom-in">

        <div class="row">
           <div class="col-lg-9 text-center text-lg-left">
            <h3>La manera más inteligente de hacer tus pagos  </h3>
            <p>Solicita tu cuenta ahora mismo en Soluciones IM y brindanos la confianza de llevarte hasta tu hogar las mejores pasarelas de pago en linea</p>
           </div>
           <div class="col-lg-3 cta-btn-container text-center">
            <a class="cta-btn align-middle" href="https://www.solucionesim.net/" target="_blank">Registrate</a>
          </div>
        </div>

      </div>
    </section><!-- End Cta Section -->



    <!-- ======= Team Section ======= -->
    <section id="team" class="team section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>EQUIPO</h2>
          <!-- <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p> -->
        </div>

        <div class="row">

          <div class="col-lg-6">
            <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="100">
              <div class="pic"><img src="assets/img/team/Oscar.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Oscar Sanchez</h4>
                <span>Desarrollador</span>
                <p>Backend y Frontend</p>
                <div class="social">
                  <a href=""><i class="ri-twitter-fill"></i></a>
                  <a href="https://www.facebook.com/oscar.sanchezramirez1"><i class="ri-facebook-fill"></i></a>
                  <a href="https://www.instagram.com/osrabsent/?hl=es-la"><i class="ri-instagram-fill"></i></a>
                  <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-6 mt-4 mt-lg-0">
            <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="200">
              <div class="pic"><img src="assets/img/team/Hugo.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Hugo Guillermo</h4>
                <span>Desarrollador</span>
                <p>Backend y Frontend</p>
                <div class="social">
                  <a href=""><i class="ri-twitter-fill"></i></a>
                  <a href="https://www.facebook.com/HugoOlympus"><i class="ri-facebook-fill"></i></a>
                  <a href="https://www.instagram.com/_hugocx/?hl=es-la"><i class="ri-instagram-fill"></i></a>
                  <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Team Section -->




  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  
  <footer id="footer">  
    <div class="container footer-bottom clearfix">
      <div class="copyright">
        &copy; Derechos de autor <strong><span>FACTICOM</span></strong>.Todos los derechos reservados
      </div>
      <!-- <div class="credits">
        Designed by <a href="">FACT@E-COM</a>
      </div> -->
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="ri-arrow-up-line"></i></a>
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>