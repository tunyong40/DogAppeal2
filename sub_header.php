<?php

  if (isset($_GET['logout'])) {
      logout();
  }

?>
<header class="site-navbar js-sticky-header site-navbar-target" role="banner" >

        <div class="container">
        <div class="row align-items-center">
          <div class="col-6 col-xl-2">
            <img src="images/gg.png" alt="Image" class="img-fluid"  class="mb-0 site-logo">
          </div>
          <div class="col-12 col-md-10 d-none d-xl-block">
            <nav class="site-navigation position-relative text-right" role="navigation">

              <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block mitr">
                <li><a href="index.php" class="nav-link">หน้าหลัก</a></li>
                <?php if(empty($_SESSION) || $_SESSION == ""){ ?>
                <li><a href="appeal.php" class="nav-link">แจ้งเรื่องสุนัขจรจัด</a></li>
                <li><a href="manage_user_appeal.php" class="nav-link">ติดตามผลการร้องเรียน</a></li>
                <li><a href="login.php" class="nav-link">เข้าสู่ระบบ</a></li>
                <li><a href="register.php" class="nav-link">สมัครสมาชิก</a></li>
                <?php }else{ ?>
                <li><a href="manage_user.php" class="nav-link">ผู้ใช้งาน</a></li>
                <li><a href="manage_appeal.php" class="nav-link">ผลการดำเนินงาน</a></li>
                <li><a href="report.php" class="nav-link">รายงาน</a></li>
                <li><a href="?logout=true" class="nav-link">ออกจากระบบ</a></li>
                <?php } ?>
                
              </ul>
            </nav>
          </div>


          <div class="col-6 d-inline-block d-xl-none ml-md-0 py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle float-right"><span class="icon-menu h3"></span></a></div>

        </div>
      </div>
      
    </header>