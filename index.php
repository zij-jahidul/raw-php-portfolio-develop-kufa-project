<?php
session_start();
require 'includes/db.php';

?>

<!doctype html>
<html class="no-js" lang="en">

<!-- Mirrored from themebeyond.com/html/kufa/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 06 Feb 2020 06:27:43 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Kufa - Personal Portfolio HTML5 Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/x-icon" href="/web_dev/includes/forntend/img/favicon.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="/web_dev/includes/forntend/css/bootstrap.min.css">
    <link rel="stylesheet" href="/web_dev/includes/forntend/css/animate.min.css">
    <link rel="stylesheet" href="/web_dev/includes/forntend/css/magnific-popup.css">
    <link rel="stylesheet" href="/web_dev/includes/forntend/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="/web_dev/includes/forntend/css/flaticon.css">
    <link rel="stylesheet" href="/web_dev/includes/forntend/css/slick.css">
    <link rel="stylesheet" href="/web_dev/includes/forntend/css/aos.css">
    <link rel="stylesheet" href="/web_dev/includes/forntend/css/default.css">
    <link rel="stylesheet" href="/web_dev/includes/forntend/css/style.css">
    <link rel="stylesheet" href="/web_dev/includes/forntend/css/responsive.css">
</head>

<body class="theme-bg">

    <!-- preloader -->
    <!-- <div id="preloader">
        <div id="loading-center">
            <div id="loading-center-absolute">
                <div class="object" id="object_one"></div>
                <div class="object" id="object_two"></div>
                <div class="object" id="object_three"></div>
            </div>
        </div>
    </div> -->
    <!-- preloader-end -->

    <!-- header-start -->
    <header>
        <div id="header-sticky" class="transparent-header">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="main-menu">
                            <nav class="navbar navbar-expand-lg">
                                <a href="index.html" class="navbar-brand logo-sticky-none"><img src="/web_dev/includes/forntend/img/logo/logo.png" alt="Logo"></a>
                                <a href="index.html" class="navbar-brand s-logo-none"><img src="/web_dev/includes/forntend/img/logo/s_logo.png" alt="Logo"></a>
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
                                    <span class="navbar-icon"></span>
                                    <span class="navbar-icon"></span>
                                    <span class="navbar-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="navbarNav">
                                    <ul class="navbar-nav ml-auto">
                                        <li class="nav-item active"><a class="nav-link" href="#home">Home</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#about">about</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#service">service</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#portfolio">portfolio</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                                    </ul>
                                </div>
                                <div class="header-btn">
                                    <a href="#" class="off-canvas-menu menu-tigger"><i class="flaticon-menu"></i></a>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- offcanvas-start -->
        <div class="extra-info">
            <div class="close-icon menu-close">
                <button>
                    <i class="far fa-window-close"></i>
                </button>
            </div>
            <div class="logo-side mb-30">
                <a href="index-2.html">
                    <img src="/web_dev/includes/forntend/img/logo/logo.png" alt="" />
                </a>
            </div>
            <div class="side-info mb-30">
                <div class="contact-list mb-30">
                    <h4>Office Address</h4>
                    <p>123/A, Miranda City Likaoli
                        Prikano, Dope</p>
                </div>
                <div class="contact-list mb-30">
                    <h4>Phone Number</h4>
                    <p>+0989 7876 9865 9</p>
                </div>
                <div class="contact-list mb-30">
                    <h4>Email Address</h4>
                    <p>info@example.com</p>
                </div>
            </div>
            <div class="social-icon-right mt-20">
                <a href="#">
                  <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-google-plus-g"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
        <div class="offcanvas-overly"></div>
        <!-- offcanvas-end -->
    </header>
    <!-- header-end -->

    <!-- main-area -->
    <main>

        <!-- banner-area -->
        <section id="home" class="banner-area banner-bg fix">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-7 col-lg-6">
                        <div class="banner-content">
                            <h6 class="wow fadeInUp" data-wow-delay="0.2s">HELLO!</h6>
                            <?php
                            $insert_header_query = "SELECT * FROM headers WHERE header_status = 2";
                            $header_from_db = mysqli_query($db_conntect , $insert_header_query);
                            if($header_from_db->num_rows == 0):
                            ?>
                            <h1 class= "text-center m-auto">Kono Data nai...</h1>
                            <?php
                          endif;
                             ?>
                            <?php
                            foreach ($header_from_db as $header):
                            ?>
                            <h2 class="wow fadeInUp" data-wow-delay="0.4s">
                              <td><?=$header['header_name']?></td>
                            </h2>
                            <p class="wow fadeInUp" data-wow-delay="0.6s">
                              <td><?=$header['header_description']?></td>
                            </p>
                          <?php endforeach; ?>
                            <div class="banner-social wow fadeInUp" data-wow-delay="0.8s">


                                <ul>

                                <?php
                                  $insert_social_query = "SELECT * FROM socials WHERE social_status = 2";
                                  $social_from_db = mysqli_query($db_conntect , $insert_social_query);
                                  foreach ($social_from_db as $social):
                                 ?>

                                    <li>
                                      <a href="<?=$social['social_link']?>">
                                        <i class="<?=$social['social_icon']?>"></i>
                                      </a>
                                    </li>

                                <?php
                              endforeach;
                                ?>


                                    <!-- <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                    <li><a href="#"><i class="fab fa-pinterest"></i></a></li> -->
                                </ul>

                            </div>
                            <a href="#" class="btn wow fadeInUp" data-wow-delay="1s">SEE PORTFOLIOS</a>
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-6 d-none d-lg-block">
                        <div class="banner-img text-right">

                          <?php
                          $insert_header_query = "SELECT * FROM headers WHERE header_status = 2";
                          $header_from_db = mysqli_query($db_conntect , $insert_header_query);
                          if($header_from_db->num_rows == 0):
                          ?>
                          <h1 class= "text-center m-auto">Kono Data nai...</h1>
                          <?php
                        endif;
                           ?>
                          <?php
                          foreach ($header_from_db as $header):
                          ?>


                            <img src="/web_dev/uploads/header/<?=$header['header_file']?>" alt="<?=$header['header_file']?>">

                          <?php endforeach; ?>


                        </div>
                    </div>
                </div>
            </div>
            <div class="banner-shape"><img src="/web_dev/includes/forntend/img/shape/dot_circle.png" class="rotateme" alt="img"></div>
        </section>
        <!-- banner-area-end -->

        <!-- about-area-->
        <section id="about" class="about-area primary-bg pt-120 pb-120">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="about-img">
                            <img src="/web_dev/includes/forntend/img/banner/banner_img2.png" title="me-01" alt="me-01">
                        </div>
                    </div>
                    <div class="col-lg-6 pr-90">
                        <div class="section-title mb-25">
                            <span>Introduction</span>
                            <h2>About Me</h2>
                        </div>
                        <div class="about-content">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum, sed repudiandae odit deserunt, quas
                                quibusdam necessitatibus nesciunt eligendi esse sit non reprehenderit quisquam asperiores maxime
                                blanditiis culpa vitae velit. Numquam!</p>
                            <h3>Education:</h3>
                        </div>
                        <!-- Education Item -->
                        <?php
                        $insert_education_query = "SELECT * FROM educations WHERE edu_status = 2";
                        $education_from_db = mysqli_query($db_conntect , $insert_education_query);
                        foreach ($education_from_db as $education):
                        ?>
                        <div class="education">

                            <div class="year"><?=$education['edu_year']?></div>
                            <div class="line"></div>
                            <div class="location"><span><?=$education['edu_description']?></span>
                                <div class="progressWrapper">
                                    <div class="progress"><div class="progress-bar wow slideInLefts" data-wow-delay="0.2s" data-wow-duration="2s" role="progressbar" style="width:<?=$education['edu_per']?>%;" aria-valuenow="<?=$education['edu_per']?>" aria-valuemin="0" aria-valuemax="100"></div></div>
                                </div>
                            </div>

                        </div>
                        <?php endforeach; ?>
                        <!-- End Education Item -->
                     </div>
                </div>
            </div>
        </section>
        <!-- about-area-end -->

        <!-- Services-area -->
        <section id="service" class="services-area pt-120 pb-50">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-8">
                        <div class="section-title text-center mb-70">
                            <span>WHAT WE DO</span>
                            <h2>Services and Solutions</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                  <?php
                  $insert_service_query = "SELECT * FROM services WHERE service_status = 2 ORDER BY id DESC";
                  $service_from_db = mysqli_query($db_conntect , $insert_service_query);
                  if($service_from_db->num_rows == 0):
                  ?>
                  <h1 class= "text-center m-auto">Kono Data nai...</h1>
                  <?php
                endif;
                   ?>
                  <?php
                  foreach ($service_from_db as $service):
                  ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="icon_box_01 wow fadeInLeft" data-wow-delay="0.2s">
                            <i class="<?=$service['service_icon']?>"></i>
                            <h3><?=$service['service_title']?></h3>
                            <p>
                                <?php
                                 echo substr($service['service_describtion'] , 0, 100);
                                 if(strlen($service['service_describtion']) >= 100){
                                   echo "...";
                                 }
                                ?>
                            </p>
                        </div>
                    </div>
                    <?php
                  endforeach;
                    ?>
                </div>
            </div>
        </section>
        <!-- Services-area-end -->

        <!-- Portfolios-area -->
        <section id="portfolio" class="portfolio-area primary-bg pt-120 pb-90">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-8">
                        <div class="section-title text-center mb-70">
                            <span>Portfolio Showcase</span>
                            <h2>My Recent Best Works</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                  <?php
                  $portfolio_service_query = "SELECT * FROM protfolios WHERE protfolio_status = 2 ORDER BY id DESC";
                  $portfoio_from_db = mysqli_query($db_conntect , $portfolio_service_query);
                  foreach($portfoio_from_db as $portfolis):
                  ?>
                    <div class="col-lg-4 col-md-6 pitem">
                        <div class="speaker-box">
                            <div class="speaker-thumb">
                                <img src="/web_dev/uploads/portfolio/<?=$portfolis['protfolio_file']?>" alt="img">
                            </div>
                            <div class="speaker-overlay">
                                <span>Design</span>
                                <h4><a href="portfolio-single.html"><?=$portfolis['protfolio_name']?></a></h4>
                                <a href="portfolio-single.html" class="arrow-btn"><?=$portfolis['protfolio_information']?><span></span></a>
                            </div>
                        </div>
                    </div>
                    <?php
                  endforeach;
                     ?>
                </div>
            </div>
        </section>
        <!-- services-area-end -->

        <!-- fact-area -->
        <section class="fact-area">
            <div class="container">
                <div class="fact-wrap">
                    <div class="row justify-content-between">
                      <?php
                      $insert_exprience_query = "SELECT * FROM expriences WHERE exprience_status = 2 ORDER BY id DESC";
                      $exprience_from_db = mysqli_query($db_conntect , $insert_exprience_query);
                      foreach ($exprience_from_db as $exprience):
                       ?>
                        <div class="col-xl-2 col-lg-3 col-sm-6">
                            <div class="fact-box text-center mb-50">
                                <div class="fact-icon">
                                    <i class="<?=$exprience['exprience_icon']?>"></i>
                                </div>
                                <div class="fact-content">
                                    <h2><span class="count">
                                      <?=$exprience['exprience_number']?>
                                    </span></h2>
                                    <span>
                                      <?=$exprience['exprience_title']?>
                                    </span>
                                </div>
                            </div>
                        </div>

                      <?php
                      endforeach;
                      ?>

                    </div>
                </div>
            </div>
        </section>
        <!-- fact-area-end -->

        <!-- testimonial-area -->
        <section class="testimonial-area primary-bg pt-115 pb-115">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-8">
                        <div class="section-title text-center mb-70">
                            <span>testimonial</span>
                            <h2>happy customer quotes</h2>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                  <?php
                  $insert_customer_query = "SELECT * FROM customers WHERE customer_status = 2";
                  $customer_from_db = mysqli_query($db_conntect , $insert_customer_query);
                  foreach ($customer_from_db as $customer):
                   ?>
                    <div class="col-xl-9 col-lg-10">
                        <div class="testimonial-active">
                            <div class="single-testimonial text-center">
                                <div class="testi-avatar">
                                    <img src="/web_dev/uploads/customer/<?=$customer['customer_image']?>" alt="img">
                                </div>
                                <div class="testi-content">
                                    <h4>
                                      <span>“</span>
                                       <?=$customer['customer_message']?>
                                      <span>”</span>
                                    </h4>

                                    <div class="testi-avatar-info">
                                        <h5><?=$customer['customer_name']?></h5>
                                        <span><?=$customer['customer_position']?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  <?php endforeach; ?>
                </div>
            </div>
        </section>
        <!-- testimonial-area-end -->

        <!-- brand-area -->
        <div class="barnd-area pt-100 pb-100">
            <div class="container">
                <div class="row brand-active">
                  <?php
                  $brand_query = "SELECT * FROM brands WHERE brand_status = 2";
                  $brand_from_db = mysqli_query($db_conntect , $brand_query);

                  foreach ($brand_from_db as $brand):
                   ?>
                    <div class="col-xl-2">
                        <div class="single-brand">
                            <img src="/web_dev/uploads/brand/<?=$brand['brand_image']?>" alt="<?=$brand['brand_image']?>">
                        </div>
                    </div>
                  <?php endforeach; ?>
                </div>
            </div>
        </div>
        <!-- brand-area-end -->

        <!-- contact-area -->
        <section id="contact" class="contact-area primary-bg pt-120 pb-120">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="section-title mb-20">
                            <span>information</span>
                            <h2>Contact Information</h2>
                        </div>
                        <div class="contact-content">
                            <p>Event definition is - somthing that happens occurre How evesnt sentence. Synonym when an unknown printer took a galley.</p>
                            <h5>OFFICE IN <span>NEW YORK</span></h5>
                            <div class="contact-list">
                              <?php
                              $insert_contact_query = "SELECT * FROM contacts WHERE contact_status = 2";
                              $contact_from_db = mysqli_query($db_conntect , $insert_contact_query);
                              foreach($contact_from_db as $contact):
                               ?>
                                <ul>
                                    <li><i class="fas fa-map-marker"></i><span>Address :</span>
                                      <?=$contact['contact_address']?>
                                    </li>
                                    <li><i class="fas fa-headphones"></i><span>Phone :</span>
                                      <?=$contact['contact_number']?>
                                    </li>
                                    <li><i class="fas fa-globe-asia"></i><span>e-mail :</span>
                                      <?=$contact['contact_email']?>
                                    </li>
                                </ul>

                              <?php endforeach; ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="contact-form">

                            <form action="form_post.php" method="post">

                              <?php if(isset($_SESSION['user_name'])): ?>
                                <div class="alert alert-danger">
                                  <?=$_SESSION['user_name']?>
                                </div>
                              <?php endif; unset($_SESSION['user_name']) ?>

                                <input type="text" placeholder="your name *" name = "user_name">
                                <input type="email" placeholder="your email *" name = "user_email">
                                <textarea name="user_message" id="message" placeholder="your message *"></textarea>
                                <button class="btn" type="submit">SEND</button>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- contact-area-end -->
    </main>
    <!-- main-area-end -->

    <!-- footer -->
    <footer>
        <div class="copyright-wrap">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12">
                        <div class="copyright-text text-center">
                            <p>Copyright© <span>Kufa</span> | All Rights Reserved</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer-end -->

    <!-- JS here -->
    <script src="/web_dev/includes/forntend/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="/web_dev/includes/forntend/js/popper.min.js"></script>
    <script src="/web_dev/includes/forntend/js/bootstrap.min.js"></script>
    <script src="/web_dev/includes/forntend/js/isotope.pkgd.min.js"></script>
    <script src="/web_dev/includes/forntend/js/one-page-nav-min.js"></script>
    <script src="/web_dev/includes/forntend/js/slick.min.js"></script>
    <script src="/web_dev/includes/forntend/js/ajax-form.js"></script>
    <script src="/web_dev/includes/forntend/js/wow.min.js"></script>
    <script src="/web_dev/includes/forntend/js/aos.js"></script>
    <script src="/web_dev/includes/forntend/js/jquery.waypoints.min.js"></script>
    <script src="/web_dev/includes/forntend/js/jquery.counterup.min.js"></script>
    <script src="/web_dev/includes/forntend/js/jquery.scrollUp.min.js"></script>
    <script src="/web_dev/includes/forntend/js/imagesloaded.pkgd.min.js"></script>
    <script src="/web_dev/includes/forntend/js/jquery.magnific-popup.min.js"></script>
    <script src="/web_dev/includes/forntend/js/plugins.js"></script>
    <script src="/web_dev/includes/forntend/js/main.js"></script>

      <!--Start of Tawk.to Script-->
      <script type="text/javascript">
        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
          (function(){
          var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
          s1.async=true;
          s1.src='https://embed.tawk.to/5e4f6bcda89cda5a188730ca/default';
          s1.charset='UTF-8';
          s1.setAttribute('crossorigin','*');
          s0.parentNode.insertBefore(s1,s0);
        })();
      </script>
      <!--End of Tawk.to Script-->


</body>

<!-- Mirrored from themebeyond.com/html/kufa/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 06 Feb 2020 06:28:17 GMT -->

</html>
