<!doctype html>
<html lang="en">
<?php
require_once("header.php");
?>
<?php
$currentAppeal = getCurrentAppeal($_GET["id"]);
$allGoverment = getAllGoverment();
if(isset($_POST["submit"])){
  if($_POST["id"] == ""){
    saveAppeal($_POST["latbox"],$_POST["lngbox"],$_POST["full_name"],$_POST["telephone"],$_POST["amount"],$_POST["ch1"],$_POST["ch2"],$_POST["ch3"],$_POST["goverment"],$_FILES["img_appeal"]["name"],$_POST["address_nearby"],$_POST["street"],$_POST["soi"],$_POST["tumbol"],$_POST["gender"],$_POST["detail_comment"]);
  }else{
    editAppeal($_POST["id"],$_POST["latbox"],$_POST["lngbox"],$_POST["full_name"],$_POST["telephone"],$_POST["amount"],$_POST["ch1"],$_POST["ch2"],$_POST["ch3"],$_POST["goverment"],$_FILES["img_appeal"]["name"],$_POST["address_nearby"],$_POST["street"],$_POST["soi"],$_POST["tumbol"],$_POST["gender"],$_POST["detail_comment"]);
  }
  

}
?>
<style>
    /* Always set the map height explicitly to define the size of the div
    * element that contains the map. */
    #map {
      height: 400px;
      width:auto;
    }
    /* Optional: Makes the sample page fill the window. */
    html, body {
      height: 100%;
      margin: 0;
      padding: 0;
    }
  </style>
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
              <h2 class="text-black mb-2">ร้องเรียนปัญหา</h2>
            </div>
          </div>
          <form name="prduct_detail_form" action="" method="post" enctype="multipart/form-data">
            <input type="hidden" id="id" class="form-control" name="id" value="<?php echo $currentAppeal['id'];?>">
            <div class="row accordion justify-content-center block__76208">
              <div class="col-lg-6 order-lg-2 mb-5 mb-lg-0" data-aos="fade-up"  data-aos-delay="">
                <div id="map"></div>
              </div>
              <div class="col-lg-5 mr-auto order-lg-1" data-aos="fade-up"  data-aos-delay="100">
                <div class="row form-group">
                  <div class="col-md-6 ">
                    <label for="fname">ตำแหน่งละติจูด</label>
                    <input type="text" class="form-control" value="<?php echo $currentAppeal['latitude']; ?>" name="latbox" id="lat" required readonly>
                  </div>
                  <div class="col-md-6 ">
                    <label for="fname">ตำแหน่งลองติจูด</label>
                    <input type="text" class="form-control" value="<?php echo $currentAppeal['longitude']; ?>" name="lngbox" id="lng" required readonly>
                  </div>
                </div>
                <div class="row form-group">
                  <div class="col-md-6 ">
                    <label for="fname">ชื่อ - สกุล ผู้ร้องเรียน</label>
                    <input type="text" id="full_name" class="form-control" name="full_name">
                  </div>
                  <div class="col-md-6 ">
                    <label for="fname">หมายเลขโทรศัพท์</label>
                    <input type="text" id="telephone" class="form-control" name="telephone">
                  </div>
                </div>
                <div class="row form-group">
                  <div class="col-md-12 ">
                    <label for="fname">จำนวนที่พบ</label>
                    <input type="text" id="amount" class="form-control" name="amount">
                  </div>
                </div>
                <div class="row form-group">
                  <div class="col-md-6 ">
                    <label for="fname">สถานที่ใกล้เคียง</label>
                    <input type="text" id="address_nearby" class="form-control" name="address_nearby">
                  </div>
                  <div class="col-md-6 ">
                    <label for="fname">ถนน</label>
                    <input type="text" id="street" class="form-control" name="street">
                  </div>
                </div>
                <div class="row form-group">
                  <div class="col-md-6 ">
                    <label for="fname">ซอย</label>
                    <input type="text" id="soi" class="form-control" name="soi">
                  </div>
                  <div class="col-md-6 ">
                    <label for="fname">ตำบล</label>
                    <input type="text" id="tumbol" class="form-control" name="tumbol">
                  </div>
                </div>
                <div class="row form-group">
                  <div class="col-md-12 mitr">
                    <label for="fname">เพศสุนัข</label>
                    <input type="radio" name="gender" id="gender" value="1" <?php if($currentEmployee["gender"]==1 || $currentEmployee["gender"]==""){ ?>checked<?php } ?>> เพศผู้ &nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="gender" id="gender" value="2" <?php if($currentEmployee["gender"]==2 ){ ?>checked<?php } ?>> เพศเมีย
                  </div>
                </div>
                <div class="row form-group mitr">
                  <div class="col-md-12 ">
                    <label for="fname">ปัญหาอื่นๆ</label><br/>
                    <input type="checkbox" id="fname" name="ch1" value="1">ดุร้าย <br/><input type="checkbox" id="fname" name="ch2" value="1">พิษสุนัขบ้า <br/><input type="checkbox" id="fname" name="ch3" value="1">สร้างความรำคาญทางกลิ่นหรือเสียง
                  </div>
                </div>
                <div class="row form-group">
                  <div class="col-md-12 ">
                    <label for="fname">หน่วยงานที่ต้องการแจ้ง</label>
                    <select name="goverment" class="form-control mitr" id="goverment">
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
                  <div class="col-md-12 ">
                    <label for="fname">ข้อคิดเห็นเพิ่มเติม</label><br/>
                    <input type="text" id="detail_comment" class="form-control" name="detail_comment">
                  </div>
                </div>
                <div class="row form-group">
                  <div class="col-md-12 mitr ">
                    <label for="fname">หลักฐานหรือภาพสุนัขจรจัด</label>
                    <input type="file" id="fname" class="form-control mitr" name="img_appeal">
                  </div>
                </div>
                <div class="row form-group">
                  <div class="col-md-12 ">
                    <div align="center">
                      <input type="submit" name="submit" value="ยืนยัน" class=" mitr btn btn-dark btn-md text-white">
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