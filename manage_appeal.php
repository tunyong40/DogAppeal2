<!doctype html>
<html lang="en">
<?php
require_once("header.php");
$allAppeal = getAllAppeal();
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
            <h2 class="text-black mb-2">ผลการดำเนินงาน</h2>
          </div>
        </div>
        <div class="row accordion justify-content-center block__76208">
          <div class="col-lg-12 order-lg-2 mb-5 mb-lg-0" data-aos="fade-up"  data-aos-delay="">
            <input type="text" id="myInput" onKeyup="myFunction()" class="form-control" placeholder="Search" title="Type in a name">
            <table class="table" style="width:100%;" id="myTable">
              <thead class=" text-primary">
                <th class = "mitr">ลำดับ</th>
                <th width="125" class = "mitr">ชื่อผู้ร้องเรียน</th>
                <th width="50" class = "mitr">จำนวนที่พบ</th>
                <th width="125" class = "mitr">หมายเลขโทรศัพท์</th>
                <th width="155" class = "mitr">สถานที่ใกล้เคียง</th>
                <th class = "mitr">ถนน</th>
                <th class = "mitr">ซอย</th>
                <th class = "mitr">ตำบล</th>
                <th width="125"class = "mitr">หน่วยงานที่ต้องการแจ้ง</th>
                <th class = "mitr">สถานะ</th>
                <th></th>
              </thead>
              <tbody>
                <?php if(empty($allAppeal)){ ?>
                  <?php echo "<h3>ไม่พบข้อมูล</h3>";?>
                <?php }else{?>
                  <?php foreach($allAppeal as $data){ ?>   
                    <tr>
                      <td class = "mitr"><?php echo $data["id"];?></td>
                      <td class = "mitr"><?php echo $data["full_name"];?></td>
                      <td class = "mitr"><?php echo $data["amount"];?></td>
                      <td class = "mitr"><?php echo $data["telephone"];?></td>
                      <td class = "mitr"><?php echo $data["address_nearby"];?></td>
                      <td><?php echo $data["street"];?></td>
                      <td><?php echo $data["soi"];?></td>
                      <td><?php echo $data["tumbol"];?></td>
                      <td><?php echo $data["goverment"];?></td>
                      <td><?php echo $status_map[$data["status"]];?></td>
                      <td>
                        <?php if($data["status"] != 4){ ?>
                          <a href="approve_appeal.php?id=<?php echo $data["id"];?>" class="btn btn-warning">อัพเดทงาน</a>
                        <?php } ?>
                      </td>
                    </tr>
                  <?php } ?>
                <?php } ?>


              </tbody>
            </table>
          </div>
          
        </div>
      </div>
    </section>

    <script>
      function filterTable(event) {
        var filter = event.target.value.toUpperCase();
        var rows = document.querySelector("#myTable tbody").rows;
        
        for (var i = 0; i < rows.length; i++) {
          var firstCol = rows[i].cells[1].textContent.toUpperCase();
          var secondCol = rows[i].cells[4].textContent.toUpperCase();
          var thirdCol = rows[i].cells[5].textContent.toUpperCase();
          var fourCol = rows[i].cells[6].textContent.toUpperCase();
          var fiveCol = rows[i].cells[7].textContent.toUpperCase();
          if (firstCol.indexOf(filter) > -1 || secondCol.indexOf(filter) > -1 || thirdCol.indexOf(filter) > -1 || fourCol.indexOf(filter) > -1 || fiveCol.indexOf(filter) > -1) {
            rows[i].style.display = "";
          } else {
            rows[i].style.display = "none";
          }      
        }
      }

      document.querySelector('#myInput').addEventListener('keyup', filterTable, false);
    </script>
    
    
    <?php
    require_once("footer.php");
    ?>

  </div> <!-- .site-wrap -->


</body>
</html>