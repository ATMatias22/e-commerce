<!doctype html>
<html class="no-js" lang="zxx">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Watch shop | eCommers</title>
  <meta name="description" content="">
  <meta name=".port" content="width=device-width, initial-scale=1">
  <link rel="manifest" href="site.webmanifest">
  <link rel="shortcut icon" type="image/x-icon" href="./public/assets/img/favicon.ico">

  <!-- CSS here -->
  <link rel="stylesheet" href="./public/assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="./public/assets/css/owl.carousel.min.css">
  <link rel="stylesheet" href="./public/assets/css/flaticon2.css">
  <link rel="stylesheet" href="./public/assets/css/slicknav.css">
  <link rel="stylesheet" href="./public/assets/css/animate.min.css">
  <link rel="stylesheet" href="./public/assets/css/magnific-popup.css">
  <link rel="stylesheet" href="./public/assets/css/fontawesome-all.min.css">
  <link rel="stylesheet" href="./public/assets/css/themify-icons.css">
  <link rel="stylesheet" href="./public/assets/css/slick.css">
  <link rel="stylesheet" href="./public/assets/css/nice-select.css">
  <link rel="stylesheet" href="./public/assets/css/style.css">
</head>

<body>
  <!--? Preloader Start -->
  <div id="preloader-active">
    <div class="preloader d-flex align-items-center justify-content-center">
      <div class="preloader-inner position-relative">
        <div class="preloader-circle"></div>
        <div class="preloader-img pere-text">
          <img src="./public/assets/img/logo/logo.png" alt="">
        </div>
      </div>
    </div>
  </div>
  <!-- Preloader Start -->
  <header>
    <!-- Header Start -->
    <div class="header-area">
      <div class="main-header header-sticky">
        <div class="container-fluid">
          <div class="menu-wrapper">
            <!-- Logo -->
            <div class="logo">
              <a href="./index.php"><img src="./public/assets/img/logo/logo.png" alt=""></a>
            </div>
            <!-- Main-menu -->
            <div class="main-menu d-none d-lg-block">
              <nav>
                <ul id="navigation">
                  <li><a href="./index.php">Home</a></li>
                  <li><a href="./index.php?controller=productos&action=shop">shop</a></li>
                  <li><a href="./index.php?controller=home&action=about">about</a></li>
                  <li><a href=" #">Pages</a>
                    <ul class="submenu">
                      <li><a href="./index.php?controller=home&action=login">Login</a></li>
                      <li><a href="./index.php?controller=home&action=cart">Cart</a></li>
                      <li><a href=" ./index.php?controller=home&action=confirmation">Confirmation</a></li>
                      <li><a href="./index.php?controller=home&action=checkout">Product Checkout</a></li>
                    </ul>
                  </li>
                  <li><a href=" ./index.php?controller=home&action=contact">Contact</a></li>
                </ul>
              </nav>
            </div>
            <!-- Header Right -->
            <div class="header-right">
              <ul>
                <li>
                  <div class="nav-search search-switch">
                    <span class="flaticon-search"></span>
                  </div>
                </li>
                <li><a href="./cart.php"><span class="flaticon-shopping-cart"></span></a> </li>
                <li> <a href="./index.php?controller=home&action=login"><span class="flaticon-user" <?php if (isset($_SESSION['username'])) 
                {echo "style='color:red'";}?>>
                <?php if (isset($_SESSION['username'])) {
                  echo $_SESSION['username'];}?></span></a></li>

                <!--   CREAMOS OTRO LI PARA PONER EL ICONO DE LOGOUT -->
                <?php if (isset($_SESSION['username'])) {
                  echo "<li><a href='./index.php?controller=home&action=cerrar_sesion'><span class='flaticon-turn-off'></span></a> </li>";
                } ?>
                <!-- -------------------------------------------------- -->
              </ul>
            </div>
          </div>
          <!-- Mobile Menu -->
          <div class="col-12">
            <div class="mobile_menu d-block d-lg-none"></div>
          </div>
        </div>
      </div>
    </div>
    <!-- Header End -->
  </header>