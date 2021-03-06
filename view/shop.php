<?php
//ESTA VARIABLE SIRVE PARA CAMBIAR EL TITLE AL HEADER, EL HEADER CONTIENE UNA VARIABLE $NOMRBESECCION EN LA ETIQUETA TITLE

$nombreSeccion = "Shop";
require_once("./view/constantes.php");
require_once(HEADER_TEMPLATE);

?>
<main>
  <!-- Hero Area Start-->
  <div class="slider-area ">
    <div class="single-slider slider-height2 d-flex align-items-center">
      <div class="container">
        <div class="row ">
          <div class="col-xl-12">
            <div class="hero-cap text-center">
              <h2>Watch Shop</h2>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Hero Area End-->
  <!-- Latest Products Start -->
  <section class="popular-items latest-padding">
    <div class="container">
      <div class="row product-btn justify-content-between mb-40">
        <div class="properties__button">
          <!--Nav Button  -->
          <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">

              <a class="nav-item nav-link <?= $_GET['action'] == "shop" ? "active" : "" ?>" id="nav-home-tab" href="./index.php?controller=productos&action=shop" role="tab" aria-controls="nav-home" aria-selected="true">All products</a>

              <a class="nav-item nav-link <?= $_GET['action'] == "productosNuevos" ? "active" : "" ?>" id="nav-home-tab" href="./index.php?controller=productos&action=productosNuevos" role="tab" aria-controls="nav-home" aria-selected="true">New</a>

              <a class="nav-item nav-link <?= $_GET['action'] == "productosOrdenadosPorPrecio" ? "active" : "" ?>" id="nav-profile-tab" href="./index.php?controller=productos&action=productosOrdenadosPorPrecio" role="tab" aria-controls="nav-profile" aria-selected="false">Price from highest to lowest</a>
              <a class="nav-item nav-link <?= $_GET['action'] == "productosPopulares" ? "active" : "" ?>" id="nav-contact-tab" href="./index.php?controller=productos&action=productosPopulares" role="tab" aria-controls="nav-contact" aria-selected="false"> More popular </a>
            </div>
          </nav>
          <!--End Nav Button  -->
        </div>
        <!-- Grid and List view -->
        <div class="grid-list-view">
        </div>
        <!-- Select items -->
        <!-- <div class="select-this">
          <form action="#" method="get" id="formPaginado">
            <div class="select-itms">
              <select name="select" id="select1">
                <option value="a">40 per page</option>
                <option value="b">50 per page</option>
                <option value="c">60 per page</option>
                <option value="d">70 per page</option>
              </select>
            </div>
       
            <input class="d-none" type='submit' id='buttonSubmit' value='btton'> 
          </form>
        </div> -->
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
                    <img src="<?= productos::RUTA_IMGS . $id ?>/product<?= $id ?>-1.png" alt="">
                    <div class="img-cap">
                      <form action="" class="carrito">
                        <input type="text" class="d-none" value=<?= $id ?>>
                        <input type="text" class="d-none" value="<?= $nombre ?>">
                        <input type="text" class="d-none" value=<?= $precio ?>>
                        <span class="enviarIDProducto" id='producto<?= $id ?>' type="submit">Add to cart</span>
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
  <!-- Latest Products End -->
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