<?php
require_once("./view/constantes.php");
require_once(HEADER_TEMPLATE);


?>


<main>
  <!-- Hero Area Start-->
  <div class="slider-area ">
    <div class="single-slider slider-height2 d-flex align-items-center">
      <div class="container">
        <div class="row">
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
  <!--================Single Product Area =================-->
  <div class="product_image_area">
    <div class="container ">
      <div class="row  ">
        <div class="col-md-5 ">
          <div class="product_img_slide owl-carousel">
            <div class="single_product_img">
              <img src="./public/assets/img/products/producto<?= $producto->getId() ?>.png" alt="#" class="img-fluid">
            </div>
            <div class="single_product_img">
              <img src="./public/assets/img/products/producto<?= $producto->getId() ?>.png" alt="#" class="img-fluid">
            </div>
            <div class="single_product_img">
              <img src="./public/assets/img/products/producto<?= $producto->getId() ?>.png" alt="#" class="img-fluid">
            </div>
          </div>
        </div>
        <div class="col-md-7 ">
          <div class="single_product_text">
            <h3><?= $producto->getNombre() ?></h3>
            <p>
              <?= $producto->getDescripcion() ?>
            </p>
            <div class="card_area ">
              <div class="product_count_area ">

                <p class="h3">$ <span id="precio"><?= $producto->getPrecio() ?></span></p>
                <!--  <div class="product_count d-inline-block">
                  <span class="product_count_item inumber-decrement d-none" id="menos"> <i class="ti-minus"></i></span>
                  <input class="product_count_item input-number" id="cantidad" type="text" value="1" max="100">
                  <span class="product_count_item number-increment" id="mas"> <i class="ti-plus"></i></span>
                </div>
                <p>Quantity</p> -->

              </div>
              <div class="add_to_cart text-center">
                <a href="#" class="btn_3">add to cart</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class=" contenedor mx-3 px-3 mb-5">
    <h1 class="titulo"> Dejenos su pregunta</h1>

    <form action="./index.php?controller=productos&action=mostrarProducto&productoID=<?= $idProducto?>" id="formulario" method="post">
      <div class="form-group">
        <input type="text" name="in_pregunta" class="form-control" id="exampleFormControlInput1" placeholder="Coloque su pregunta aca" required>
      </div>

      <input type="hidden" name="id_producto" value=<?= $idProducto?>>
      <input type="submit" class="btn btn-lg btn-block boton" name="in_enviar_pregunta" value="Enviar">


    </form>
  </div>


  <!--================End Single Product Area =================-->
  <!-- subscribe part here -->
  <section class="subscribe_part section_padding">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="subscribe_part_content">
            <h2>Get promotions & updates!</h2>
            <p>Seamlessly empower fully researched growth strategies and interoperable internal or “organic” sources credibly innovate granular internal .</p>
            <div class="subscribe_form">
              <input type="email" placeholder="Enter your mail">
              <a href="#" class="btn_1">Subscribe</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- subscribe part end -->
</main>



<?php
require_once(FOOTER_TEMPLATE);

?>