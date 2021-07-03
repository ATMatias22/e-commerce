<?php

//ESTA VARIABLE SIRVE PARA CAMBIAR EL TITLE AL HEADER, EL HEADER CONTIENE UNA VARIABLE $NOMRBESECCION EN LA ETIQUETA TITLE

$nombreSeccion = "Home";

require_once("./view/constantes.php");
require_once(HEADER_TEMPLATE);


?>

<main>

  <!--? slider Area Start -->
  <div class="slider-area ">
    <div class="slider-active">
      <!-- Single Slider -->
      <div class="single-slider slider-height d-flex align-items-center slide-bg">
        <div class="container">
          <div class="row justify-content-between align-items-center">
            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8">
              <div class="hero__caption">
                <h1 data-animation="fadeInLeft" data-delay=".4s" data-duration="2000ms">Select Your New Perfect Style
                </h1>
                <!--  <p data-animation="fadeInLeft" data-delay=".7s" data-duration="2000ms">Ut enim ad minim veniam, quis
                  nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat is aute irure.</p> -->
                <!-- Hero-btn -->
                <div class="hero__btn" data-animation="fadeInLeft" data-delay=".8s" data-duration="2000ms">
                  <a href="./index.php?controller=productos&action=shop" class="btn hero-btn">Shop Now</a>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-4 d-none d-sm-block">
              <div class="hero__img" data-animation="bounceIn" data-delay=".4s">
                <img src="./public/assets/img/hero/watch.png" alt="" class=" heartbeat">
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Single Slider -->
      <div class="single-slider slider-height d-flex align-items-center slide-bg">
        <div class="container">
          <div class="row justify-content-between align-items-center">
            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8">
              <div class="hero__caption">
                <h1 data-animation="fadeInLeft" data-delay=".4s" data-duration="2000ms">Select Your New Perfect Style
                </h1>
                <p data-animation="fadeInLeft" data-delay=".7s" data-duration="2000ms">Ut enim ad minim veniam, quis
                  nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat is aute irure.</p>
                <!-- Hero-btn -->
                <div class="hero__btn" data-animation="fadeInLeft" data-delay=".8s" data-duration="2000ms">
                  <a href="./index.php?controller=productos&action=shop" class="btn hero-btn" class="btn hero-btn">Shop Now</a>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-4 d-none d-sm-block">
              <div class="hero__img" data-animation="bounceIn" data-delay=".4s">
                <img src="./public/assets/img/hero/watch.png" alt="" class=" heartbeat">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- slider Area End-->
  <!-- ? New Product Start -->


  <section class="popular-items latest-padding">
    <div class="container">
      <div class="row">
        <div class="col-xl-12">
          <div class="section-tittle mb-70">
            <h2>New Arrivals</h2>
          </div>
        </div>
      </div>
      <!-- Nav Card -->
      <div class="tab-content" id="nav-tabContent">
        <!-- card one -->
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
          <div class="row justify-content-center">
            <?php
            foreach ($array_prod as $prod) {
              $id = $prod->getId();
              $precio = $prod->getPrecio();
              $nombre = $prod->getNombre();
            ?>

              <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                <div class="single-popular-items mb-50 text-center">
                  <div class="popular-img">
                    <img src="<?= home::RUTA_IMGS . $id ?>/product<?= $id ?>-1.png" alt="">
                    <div class="img-cap">
                      <form action="" class="carrito">
                        <input type="text" class="d-none" value=<?= $id ?>>
                        <input type="text" class="d-none" value="<?= $nombre ?>">
                        <input type="text" class="d-none" value=<?= $precio ?>>
                        <span class="enviarIDProducto" id='producto<?= $id ?>'>Add to cart</span>
                      </form>
                    </div>
                    <div class="favorit-items" style="opacity: 1 !important;">
                      <svg id='like<?= $id ?>' xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-heart" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M19.5 13.572l-7.5 7.428l-7.5 -7.428m0 0a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                      </svg>
                    </div>
                  </div>
                  <div class="popular-caption">
                    <h3><a href="./index.php?controller=productos&action=mostrarProducto&productoID=<?= $id ?>"><?= $nombre ?></a></h3>
                    <span class="text-danger">$<?= $precio ?></span>
                  </div>
                </div>
              </div>
            <?php
            }
            ?>
          </div>
        </div>
      </div>
      <!-- End Nav Card -->
    </div>
  </section>



  <!--  New Product End -->
  <!--? Gallery Area Start -->
  <div class="gallery-area">
    <div class="container-fluid p-0 fix">
      <div class="row">
        <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6">
          <div class="single-gallery mb-30">
            <div class="gallery-img big-img" style="background-image: url(./public/assets/img/gallery/gallery1.png);"></div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
          <div class="single-gallery mb-30">
            <div class="gallery-img big-img" style="background-image: url(./public/assets/img/gallery/gallery2.png);"></div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-4 col-md-12">
          <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-6 col-sm-6">
              <div class="single-gallery mb-30">
                <div class="gallery-img small-img" style="background-image: url(./public/assets/img/gallery/gallery3.png);">
                </div>
              </div>
            </div>
            <div class="col-xl-12 col-lg-12  col-md-6 col-sm-6">
              <div class="single-gallery mb-30">
                <div class="gallery-img small-img" style="background-image: url(./public/assets/img/gallery/gallery4.png);">
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
  <!-- Gallery Area End -->


  <!-- Watch Choice  End-->
  <!--? Shop Method Start-->
  <div class="shop-method-area mb-4">
    <div class="container">
      <div class="method-wrapper">
        <div class="row d-flex justify-content-between">
          <div class="col-xl-4 col-lg-4 col-md-6">
            <div class="single-method mb-40">
              <i class="ti-package"></i>
              <h6>Free Shipping Method</h6>
              <p>aorem ixpsacdolor sit ameasecur adipisicing elitsf edasd.</p>
            </div>
          </div>
          <div class="col-xl-4 col-lg-4 col-md-6">
            <div class="single-method mb-40">
              <i class="ti-unlock"></i>
              <h6>Secure Payment System</h6>
              <p>aorem ixpsacdolor sit ameasecur adipisicing elitsf edasd.</p>
            </div>
          </div>
          <div class="col-xl-4 col-lg-4 col-md-6">
            <div class="single-method mb-40">
              <i class="ti-reload"></i>
              <h6>Secure Payment System</h6>
              <p>aorem ixpsacdolor sit ameasecur adipisicing elitsf edasd.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Shop Method End-->
</main>


<?php
require_once(FOOTER_TEMPLATE);


?>