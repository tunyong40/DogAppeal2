<!doctype html>
<html lang="en">
<?php
require_once("header.php");
$allAppeal = getAllAppealSuccess();
$status_map = array( 0=>'<a style="color:red">รอการตอบรับ</a>',1=>'<a style="color:blue">ตอบรับข้อร้องเรียน</a>',2=>'<a style="color:orange">กำลังดำเนินการ</a>',3=>'<a style="color:green">ดำเนินการเสร็จสิ้น</a>',4=>'<a style="color:red">ปฏิเสธข้อร้องเรียน</a>');
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

    
    
    <section class="site-section" id="faq-section">
      <div class="container" id="accordion">
        <div class="row justify-content-center" data-aos="fade-up">
          <div class="col-lg-6 text-center heading-section mb-5">
            <div class="paws">
              <span class="icon-paw"></span>
            </div>
            <h2 class="text-black mb-2">รายงาน</h2>
          </div>
        </div>
        <div class="row accordion justify-content-center block__76208">
          <div class="col-lg-12 order-lg-2 mb-5 mb-lg-0" data-aos="fade-up"  data-aos-delay="">
            <table class="table" style="width:100%;">
              <thead class=" text-primary">
                <th>รหัสร้องเรียน</th>
                <th>ชื่อ - สกุล ผู้ร้องเรียน</th>
                <th>จำนวนที่พบ</th>
                <th>หมายเลขโทรศัพท์</th>
                <th>สภานที่ใกล้เคียง</th>
                <th>ถนน</th>
                <th>ซอย</th>
                <th>ตำบล</th>
                <th>หน่วยงานที่ต้องการแจ้ง</th>
                <th>วัน / เวลา ที่แจ้ง</th>
                <th>สถานะ</th>
              </thead>
              <tbody>
                <?php if(empty($allAppeal)){ ?>
                <?php echo "<h3>ไม่พบข้อมูล</h3>";?>
                <?php }else{?>
                <?php foreach($allAppeal as $data){ ?>   
                <tr>
                  <td><?php echo $data["id"];?></td>
                  <td><?php echo $data["full_name"];?></td>
                  <td><?php echo $data["amount"];?></td>
                  <td><?php echo $data["telephone"];?></td>
                  <td><?php echo $data["address_nearby"];?></td>
                  <td><?php echo $data["street"];?></td>
                  <td><?php echo $data["soi"];?></td>
                  <td><?php echo $data["tumbol"];?></td>
                  <td><?php echo $data["goverment"];?></td>
                  <td><?php echo formatDateTime($data["date_appeal"]);?></td>
                  <td><?php echo $status_map[$data["status"]];?></td>
                </tr>
                <?php } ?>
                <?php } ?>


              </tbody>
            </table>
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