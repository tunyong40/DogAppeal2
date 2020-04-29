<!doctype html>
<html lang="en">
<?php
require_once("header.php");
$allGoverment = getAllGoverment();
if (isset($_GET['delete'])) {
  deleteGoverment($_GET['delete']);
}
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
            <h2 class="text-black mb-2">หน่วยงานทั้งหมด</h2>
          </div>
        </div>
        <div class="row accordion justify-content-center block__76208">
          <div class="col-lg-12 order-lg-2 mb-5 mb-lg-0" data-aos="fade-up"  data-aos-delay="">
            <a href="edit_goverment.php" class="btn btn-success">เพิ่ม</a>
            <table class="table" style="width:100%;">
              <thead class=" text-primary">
                <th>ชื่อหน่วยงาน</th>
                <th></th>
              </thead>
              <tbody>
                <?php if(empty($allGoverment)){ ?>
                <?php echo "<h3>ไม่พบข้อมูล</h3>";?>
                <?php }else{?>
                <?php foreach($allGoverment as $data){ ?>   
                <tr>
                  <td><?php echo $data["goverment_name"];?></td>
                  <td style="width:20%;">
                    <a href="edit_goverment.php?id=<?php echo $data["id"];?>" class="btn btn-warning">แก้ไข</a>
                    <a href="?delete=<?php echo $data['id'];?>" class="btn btn-danger" onClick="javascript: return confirm('ยืนยันการลบ');">ลบ</a>
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
    
    
    <?php
    require_once("footer.php");
    ?>

  </div> <!-- .site-wrap -->


</body>
</html>