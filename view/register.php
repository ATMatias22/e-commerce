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
              <h2>Register</h2>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Hero Area End-->
  <!--================login_part Area =================-->
  <section class="login_part section_padding ">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 col-md-6">
          <div class="login_part_text text-center w-100">
            <div class="login_part_text_iner">
              <h2>Are you already registered?</h2>
              <a href="./index.php?controller=home&action=login" class="btn_3">Log in</a>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-6">
          <div class="login_part_form">
            <div class="login_part_form_iner">
              <h3>
                Please sign up
                now</h3>
              <form class="row contact_form" action="./index.php?controller=usuarios&action=registrar" method="post" novalidate="novalidate">
                <div class="col-md-12 form-group p_star">
                  <input type="text" class="form-control" id="username" name="username" value="" placeholder="Username">
                </div>
                <div class="col-md-12 form-group p_star">
                  <input type="password" class="form-control" id="password" name="password" value="" placeholder="Password">
                </div>
                <div class="col-md-12 form-group">
                  <div class="creat_account d-flex align-items-center">
                    <input type="checkbox" id="f-option" name="selector">
                    <label for="f-option">Remember me</label>
                  </div>
                  <button type="submit" value="submit" class="btn_3">
                    Register
                  </button>
                  <a class="lost_pass" href="#">forget password?</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--================login_part end =================-->
</main>
<?php
require_once(FOOTER_TEMPLATE)

?>