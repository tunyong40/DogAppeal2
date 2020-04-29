<!doctype html>
<html lang="en">
<?php
require_once("header.php");
?>
<?php
$currentAppeal = getCurrentAppeal($_GET["id"]);
$status_map = array( 0=>'<a style="color:red">รอการตอบรับ</a>',1=>'<a style="color:blue">ตอบรับข้อร้องเรียน</a>',2=>'<a style="color:orange">กำลังดำเนินการ</a>',3=>'<a style="color:green">ดำเนินการเสร็จสิ้น</a>',4=>'<a style="color:red">ปฏิเสธข้อร้องเรียน</a>');
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
                    <input type="hidden" class="form-control" value="<?php echo $currentAppeal['latbox']; ?>" name="latbox" id="lat" readonly>
                    <input type="hidden" class="form-control" value="<?php echo $currentAppeal['lngbox']; ?>" name="lngbox" id="lng" readonly>
                    <label for="fname">ตำแหน่งละติจูด : <?php echo $currentAppeal['latbox']; ?></label>
                  </div>
                  <div class="col-md-6 ">
                    <label for="fname">ตำแหน่งลองติจูด : <?php echo $currentAppeal['lngbox']; ?></label>
                  </div>
                </div>
                <div class="row form-group">
                  <div class="col-md-6 ">
                    <label for="fname">ชื่อ - สกุล ผู้ร้องเรียน : <?php echo $currentAppeal['full_name']; ?></label>
                  </div>
                  <div class="col-md-6 ">
                    <label for="fname">หมายเลขโทรศัพท์ : <?php echo $currentAppeal['telephone']; ?></label>
                  </div>
                </div>
                <div class="row form-group">
                  <div class="col-md-12 ">
                    <label for="fname">จำนวนที่พบ <?php echo $currentAppeal['amount']; ?></label>
                  </div>
                </div>
                <div class="row form-group">
                  <div class="col-md-6 ">
                    <label for="fname">สถานที่ใกล้เคียง : <?php echo $currentAppeal['address_nearby']; ?></label>
                  </div>
                  <div class="col-md-6 ">
                    <label for="fname">ถนน : <?php echo $currentAppeal['street']; ?></label>
                  </div>
                </div>
                <div class="row form-group">
                  <div class="col-md-6 ">
                    <label for="fname">ซอย : <?php echo $currentAppeal['soi']; ?></label>
                  </div>
                  <div class="col-md-6 ">
                    <label for="fname">ตำบล : <?php echo $currentAppeal['tumbol']; ?></label>
                  </div>
                </div>
                <div class="row form-group">
                  <div class="col-md-12 ">
                    <?php if($currentAppeal['gender'] == 1){ ?>
                      <label for="fname">เพศสุนัข : เพศผู้</label>
                    <?php }else{ ?>
                      <label for="fname">เพศสุนัข : เพศเมีย</label>
                    <?php } ?>
                  </div>
                </div>
                <div class="row form-group">
                  <div class="col-md-12 ">
                    <label for="fname">ข้อคิดเห็นเพิ่มเติม : <?php echo $currentAppeal['detail_comment']; ?></label>
                  </div>
                </div>
                <div class="row form-group">
                  <div class="col-md-12 mitr">
                    <label for="fname">ปัญหาอื่นๆ : </label><br/>
                    <?php if($currentAppeal['ch1']=="1"){ ?>
                      <?php echo "ดุร้าย";?>
                    <?php } ?>
                    <?php if($currentAppeal['ch2']=="1"){ ?>
                      <?php echo "พิษสุนัขบ้า";?>
                    <?php } ?>
                    <?php if($currentAppeal['ch3']=="1"){ ?>
                      <?php echo "สร้างความรำคาญทางกลิ่นหรือเสียง";?>
                    <?php } ?>

                  </div>
                </div>
                <div class="row form-group">
                  <div class="col-md-12 ">
                    <label for="fname">หน่วยงานที่ต้องการแจ้ง : <?php echo $currentAppeal['goverment']; ?></label>
                  </div>
                </div>
                <div class="row form-group">
                  <div class="col-md-12 ">
                    <label for="fname">สถานะ : <?php echo $status_map[$currentAppeal['status']]; ?></label>
                  </div>
                </div>
                <div class="row form-group">
                  <div class="col-md-12 ">
                    <label for="fname">หลักฐานหรือภาพสุนัขจรจัด</label><br/>
                    <img src="images/appeal/<?php echo $currentAppeal['img_appeal']; ?>" class="img-fluid rounded" style="width:338px;height:338px;">
                  </div>
                </div>
                <div class="row form-group">
                  <div class="col-md-12 ">
                    <label for="fname">ภาพการดำเนินงาน</label><br/>
                    <img src="images/approve/<?php echo $currentAppeal['img_approve']; ?>" class="img-fluid rounded" style="width:338px;height:338px;">
                  </div>
                </div>
                <div class="row form-group">
                  <div class="col-md-12 ">
                    <div align="center">
                    <a href="manage_user_appeal.php?id=<?php echo $data["id"];?>" class="btn btn-danger mitr ">ย้อนกลับ</a>
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