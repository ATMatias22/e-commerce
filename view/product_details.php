<?php
$nombreSeccion = "Product Details";

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
              <img src="./public/assets/img/products/product<?= $producto->getId() ?>/producto<?= $producto->getId() ?>-1.png" alt="#" class="img-fluid">
            </div>
            <div class="single_product_img">
              <img src="./public/assets/img/products/product<?= $producto->getId() ?>/producto<?= $producto->getId() ?>-1.png" alt="#" class="img-fluid">
            </div>
            <div class="single_product_img">
              <img src="./public/assets/img/products/product<?= $producto->getId() ?>/producto<?= $producto->getId() ?>-1.png" alt="#" class="img-fluid">
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
    <h1 class="titulo">Leave your comment</h1>

    <form action="#" id="formulario" method="post">
      <div class="form-group">
        <input type="text" name="in_comentario" class="form-control" id="exampleFormControlInput1" placeholder="Coloque su comentario aca" required>
      </div>
      <input type="submit" class="btn btn-lg btn-block boton" name="in_enviar_comentario" value="Enviar">
    </form>
  </div>

  <div class=" contenedor mx-3 px-3 mb-5 mt-5">
    <h1 class="titulo "><?= count($comentarios) > 0 ? "Comments" : "No comments" ?></h1>

    <?php
    foreach (array_reverse($comentarios) as $com) {

    ?>
      <div style='border: 1px grey solid; ' class="mt-3">
        <div class='m-3'>
          <div><?= UsuariosDAO::buscarUsuarioPorId($com->getIdUsuario()); ?></div>
          <div class="comentario"><?= $com->getComentario() ?></div>
          <div class="text-right">
            <?= date("d-m-Y h:i",strtotime($com->getFechaDePublicacion())) ?>
          </div>
        </div>

      </div>

    <?php
    }
    ?>
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