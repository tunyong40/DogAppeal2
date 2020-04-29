<!doctype html>
<html lang="en">
<?php
require_once("header.php");
?>
<?php
$currentUser = getCurrentUser($_GET["id"]);
$allGoverment = getAllGoverment();
if(isset($_POST["submit"])){
  if($_POST["id"] == ""){
    saveUser($_POST["firstname"],$_POST["lastname"],$_POST["telephone"],$_POST["email"],$_POST["address"],$_POST["goverment"],$_POST["username"],$_POST["password"]);
  }else{
    editUser($_POST["id"],$_POST["firstname"],$_POST["lastname"],$_POST["telephone"],$_POST["email"],$_POST["address"],$_POST["goverment"],$_POST["username"],$_POST["password"]);
  }
  

}
if($_GET["id"] == ""){
  $txtHead = "เพิ่มผู้ใช้งาน";
}else{
  $txtHead = "แก้ไขผู้ใช้งาน";
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
            <h2 class="text-black mb-2"><?php echo $txtHead;?></h2>
          </div>
        </div>
        <form name="prduct_detail_form" action="" method="post" enctype="multipart/form-data">
          <input type="hidden" id="id" class="form-control" name="id" value="<?php echo $currentUser['id'];?>">
          <div class="row accordion justify-content-center block__76208">
            <div class="col-lg-6 order-lg-2 mb-5 mb-lg-0" data-aos="fade-up"  data-aos-delay="">
              <img src="images/dogger_img_sm_1.jpg" alt="Image" class="img-fluid rounded">
            </div>
            <div class="col-lg-5 mr-auto order-lg-1" data-aos="fade-up"  data-aos-delay="100">
              <div class="row form-group">
                <div class="col-md-6 ">
                  <label for="fname">ชื่อ</label>
                  <input type="text" id="amount" class="form-control" name="firstname" value="<?php echo $currentUser['firstname'];?>">
                </div>
                <div class="col-md-6 ">
                  <label for="fname">นามสกุล</label>
                  <input type="text" id="amount" class="form-control" name="lastname" value="<?php echo $currentUser['lastname'];?>">
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-6 ">
                  <label for="fname">หมายเลขโทรศัพท์</label>
                  <input type="text" id="amount" class="form-control" name="telephone" value="<?php echo $currentUser['telephone'];?>">
                </div>
                <div class="col-md-6 ">
                  <label for="fname">อีเมล์</label>
                  <input type="text" id="amount" class="form-control" name="email" value="<?php echo $currentUser['email'];?>">
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12 ">
                  <label for="fname">ที่อยู่</label><br/>
                  <input type="text" id="address" class="form-control" name="address" value="<?php echo $currentUser['address'];?>">
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12 ">
                  <label for="fname">หน่วยงานที่สังกัด</label>
                  <select name="goverment" class="form-control" id="goverment">
                    <option value="">-- โปรดเลือกประเภท --</option>
                    <?php foreach($allGoverment as $data){ ?>
                      <?php $selected = ""; 
                      if($currentUser['goverment'] == $data['goverment_name']){
                        $selected = " selected"; 

                      } 
                      ?> 
                      <option value="<?php echo $data['goverment_name']?>" <?php echo $selected;?>><?php echo $data['goverment_name']?></option>
                    <?php } ?>
                  </select>

                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-6 ">
                  <label for="fname">ชื่อผู้ใช้งาน</label>
                  <input type="text" id="username" class="form-control" name="username" value="<?php echo $currentUser['username'];?>">
                </div>
                <div class="col-md-6 ">
                  <label for="fname">รหัสผ่าน</label>
                  <input type="text" id="password" class="form-control" name="password" value="<?php echo $currentUser['password'];?>">
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12 ">
                  <div align="center">
                    <input type="submit" name="submit" value="ยืนยัน" class="btn btn-dark btn-md text-white">
                  </div>
                </div>
              </div>



            </div>
          </div>
        </form>

      </div>
    </section>

    <script>
      var map;
      var geocoder;
      var marker;

      function initialize() {
        var latlng = new google.maps.LatLng(13.778089, 100.556681);
        var myOptions = {
          zoom: 5,
          center: latlng,
          mapTypeId: google.maps.MapTypeId.ROADMAP 
        };
        map = new google.maps.Map(document.getElementById("map"),
          myOptions);
        geocoder = new google.maps.Geocoder();
        marker = new google.maps.Marker({
          position: latlng, 
          map: map
        });

        map.streetViewControl=false;

        google.maps.event.addListener(map, 'click', function(event) {
      marker.setPosition(event.latLng);  /// จิ้มตรงไหนก็ให้ขึ้น ละติจูดลองจิจูด

      var yeri = event.latLng;
      document.getElementById('lat').value=yeri.lat().toFixed(6);
      document.getElementById('lng').value=yeri.lng().toFixed(6);

    });
      }

  function codeAddress() { //google developer //ค้นหาจาก google
    var address = document.getElementById("gadres").value;
    geocoder.geocode( { 'address': address}, function(results, status) {
      if (status == google.maps.GeocoderStatus.OK) {
        map.setCenter(results[0].geometry.location);
        document.getElementById('lat').value=results[0].geometry.location.lat().toFixed(6); //ใส่ค่าลงไปตอนกดค้นหา
        document.getElementById('lng').value=results[0].geometry.location.lng().toFixed(6);
        var latlong = "(" + results[0].geometry.location.lat().toFixed(6) + " , " +
        + results[0].geometry.location.lng().toFixed(6) + ")";


        var infowindow = new google.maps.InfoWindow({
          content: latlong
        });

        marker.setPosition(results[0].geometry.location);
        map.setZoom(16);

        google.maps.event.addListener(marker, 'click', function() {
          infowindow.open(map,marker);
        });

      } else {
        alert("impossibile trovare la lang e la lat del punto");
      }
    });
  }
</script>
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDGJZYkTiKEVDu5DxA57Ri3og_70N4WyDI&callback=initialize">
</script>
<script>
  $('#birthdate').datetimepicker({
    lang:'th',
    timepicker:false,
    format:'d/m/Y'
  });
</script>


<?php
require_once("footer.php");
?>

</div> <!-- .site-wrap -->


</body>
</html>