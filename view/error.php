<?php
//ESTA VARIABLE SIRVE PARA CAMBIAR EL TITLE AL HEADER, EL HEADER CONTIENE UNA VARIABLE $NOMRBESECCION EN LA ETIQUETA TITLE

  $nombreSeccion = "Error";

require_once("./view/constantes.php");
require_once(HEADER_TEMPLATE);
?>
<main>
  <div class="slider-area ">
    <div class="single-slider slider-height2 d-flex align-items-center">
      <div class="container">
        <div class="row">
          <div class="col-xl-12">
            <div class="hero-cap text-center">
              <h2><?= $mensaje ?></h2>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
  <?php
  require_once(FOOTER_TEMPLATE);
  ?>