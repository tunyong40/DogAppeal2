<!doctype html>
<html lang="en">
<?php
require_once("header.php");
?>
<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300" id="home-section">

  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>

    
    <?php
    require_once("sub_header.php");
    ?>


    <section class="site-blocks-cover overflow-hidden bg-light" style="margin-top:-25px;">
      <div class="container">
        <div class="row">
          <div class="col-md-12 align-self-center text-center text-md-center">
          <div class="paws">
              <span class="icon-paw"></span>
            </div>
            <div class="intro-text mitr">
              <h1 class ="mitr">ระบบบริหารจัดการ<span class="d-md-block mitr">จำนวนสุนัขจรจัด</span></h1>
              <p><a href="appeal.php" class="btn btn-primary btn-lg mitr ">แจ้งเรื่องสุนัขจรจัด</a></p>
            </div> 
          </div>
        </div>
      </div>
    </section> 
    <?php
    require_once("footer.php");
    ?>

  </div> <!-- .site-wrap -->


</body>
</html>