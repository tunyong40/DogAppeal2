<?php
error_reporting(0);

//เชื่อต่อ Database
$con = mysqli_connect("localhost","root","","dog");
$con->set_charset("utf8");

function checkLogin($username,$password){
	$data = array();
	global $con;
	$sql = "select * from users where username = '".$username."' AND password='".$password."'";
	$res = mysqli_query($con,$sql);
	
	while($row = mysqli_fetch_array($res)) {
		$data['id'] = $row['id'];

	}
	if (!empty($data)) {
		
			session_start();
			$id = $data['id'];
			$_SESSION['id'] = $data['id'];
			echo ("<script language='JavaScript'>
				window.location.href='index.php';
				</script>");
		
	}else{
		echo "<script type='text/javascript'>alert('ไม่สามารถเข้าสู่ระบบได้ ');</script>";
	}
	
	mysqli_close($con);

}


function logout(){
	session_start();
	session_unset();
	session_destroy();
	echo ("<script language='JavaScript'>
				window.location.href='index.php';
				</script>");
	exit();
}

function getUser($id){

	global $con;

	$res = mysqli_query($con,"SELECT * FROM users WHERE id = '".$id."'");
	$result=mysqli_fetch_array($res,MYSQLI_ASSOC);
	return $result;

	mysqli_close($con);

}

function saveAppeal($latbox,$lngbox,$full_name,$telephone,$amount,$ch1,$ch2,$ch3,$goverment,$img_appeal,$address_nearby,$street,$soi,$tumbol,$gender,$detail_comment){
	
	
	global $con;

	if($img_appeal != null){
		if(move_uploaded_file($_FILES["img_appeal"]["tmp_name"],"images/appeal/".$_FILES["img_appeal"]["name"]))
		{

			$sql = "INSERT INTO appeals (full_name, telephone, amount, ch1, ch2, ch3, goverment, img_appeal, latbox, lngbox, status, address_nearby, street, soi, tumbol, gender, detail_comment) VALUES('".$full_name."','".$telephone."','".$amount."','".$ch1."','".$ch2."','".$ch3."','".$goverment."','".$_FILES["img_appeal"]["name"]."','".$latbox."','".$lngbox."','0','".$address_nearby."','".$street."','".$soi."','".$tumbol."','".$gender."','".$detail_comment."')";
			mysqli_query($con,$sql);
		}
	}else{

		$sql = "INSERT INTO appeals (full_name, telephone, amount, ch1, ch2, ch3, goverment, latbox, lngbox, status, address_nearby, street, soi, tumbol, gender, detail_comment) VALUES('".$full_name."','".$telephone."','".$amount."','".$ch1."','".$ch2."','".$ch3."','".$goverment."','".$latbox."','".$lngbox."','0','".$address_nearby."','".$street."','".$soi."','".$tumbol."','".$gender."','".$detail_comment."')";
			mysqli_query($con,$sql);
		

	}
	mysqli_close($con);
	echo ("<script language='JavaScript'>
		alert('ส่งคำร้องเรียบร้อย');
		window.location.href='manage_user_appeal.php';
		</script>"); 
	
}

function editAppeal($id,$latbox,$lngbox,$full_name,$telephone,$amount,$ch1,$ch2,$ch3,$goverment,$img_appeal,$address_nearby,$street,$soi,$tumbol,$gender,$detail_comment){

	global $con;

	if($img_appeal != null){
		if(move_uploaded_file($_FILES["img_appeal"]["tmp_name"],"images/appeal/".$_FILES["img_appeal"]["name"]))
		{
			$sql="UPDATE appeals SET username='".$username."',password='".$password."',firstname='".$firstname."',lastname='".$lastname."',gender='".$gender."',telephone='".$telephone."',email='".$email."',address='".$address."',image='".$_FILES["img_appeal"]["name"]."',status='".$status."',address_nearby='".$address_nearby."',street='".$street."',soi='".$soi."',tumbol='".$tumbol."',gender='".$gender."',detail_comment='".$detail_comment."' WHERE id = '".$id."'";
			mysqli_query($con,$sql);
			
		}
	}else{
		$sql="UPDATE appeals SET username='".$username."',password='".$password."',firstname='".$firstname."',lastname='".$lastname."',gender='".$gender."',telephone='".$telephone."',email='".$email."',address='".$address."',status='".$status."',address_nearby='".$address_nearby."',street='".$street."',soi='".$soi."',tumbol='".$tumbol."',gender='".$gender."',detail_comment='".$detail_comment."' WHERE id = '".$id."'";
		mysqli_query($con,$sql);

	}
	
	mysqli_close($con);

	echo ("<script language='JavaScript'>
		alert('แก้ไขข้อมูลเรียบร้อย');
		window.location.href='manage_employee.php';
		</script>"); 
	
}


function deleteAppeal($id){
	global $con;

	mysqli_query($con,"DELETE FROM appeals WHERE id='".$id."'");
	mysqli_close($con);
	echo ("<script language='JavaScript'>
			alert('ลบข้อมูลเรียบร้อยแล้ว');
	    	window.location.href='manage_employee.php';
	    	</script>"); 

}

function getAllAppeal(){
	global $con;

	$res = mysqli_query($con,"SELECT * FROM appeals ORDER BY id DESC");

	$data = array();
	while($row = mysqli_fetch_assoc($res)) {
		$namesArray[] = array(
			'id' => $row['id'],
			'full_name' => $row['full_name'],
			'telephone' => $row['telephone'],
			'amount' => $row['amount'],
			'ch1' => $row['ch1'],
			'ch2' => $row['ch2'],
			'ch3' => $row['ch3'],
			'goverment' => $row['goverment'],
			'img_appeal' => $row['img_appeal'],
			'latbox' => $row['latbox'],
			'lngbox' => $row['lngbox'],
			'address_nearby' => $row['address_nearby'],
			'street' => $row['street'],
			'soi' => $row['soi'],
			'tumbol' => $row['tumbol'],
			'gender' => $row['gender'],
			'detail_comment' => $row['detail_comment'],
			'status' => $row['status']);
	}

	$data = $namesArray;

	return $data;
	mysqli_close($con);

}


function getCurrentAppeal($id){

	global $con;

	$res = mysqli_query($con,"SELECT * FROM appeals WHERE id = '".$id."'");
	$result=mysqli_fetch_array($res,MYSQLI_ASSOC);
	return $result;

	mysqli_close($con);

}

function saveRegister($firstname,$lastname,$telephone,$email,$address,$goverment,$username,$password){
	
	
	global $con;

	$sql = "INSERT INTO users (firstname, lastname, telephone, email, address, goverment, username, password) VALUES('".$firstname."','".$lastname."','".$telephone."','".$email."','".$address."','".$goverment."','".$username."','".$password."')";
	mysqli_query($con,$sql);
		
	mysqli_close($con);
	echo ("<script language='JavaScript'>
		alert('สมัครสมาชิกเรียบร้อย');
		window.location.href='login.php';
		</script>"); 
	
}

function saveUser($firstname,$lastname,$telephone,$email,$address,$goverment,$username,$password){
	
	
	global $con;

	$sql = "INSERT INTO users (firstname, lastname, telephone, email, address, goverment, username, password) VALUES('".$firstname."','".$lastname."','".$telephone."','".$email."','".$address."','".$goverment."','".$username."','".$password."')";
	mysqli_query($con,$sql);
		
	mysqli_close($con);
	echo ("<script language='JavaScript'>
		alert('เพิ่มข้อมูลเรียบร้อย');
		window.location.href='manage_user.php';
		</script>"); 
	
}

function editUser($id,$firstname,$lastname,$telephone,$email,$address,$goverment,$username,$password){

	global $con;

	$sql="UPDATE users SET firstname='".$firstname."',lastname='".$lastname."',telephone='".$telephone."',email='".$email."',address='".$address."',goverment='".$goverment."',username='".$username."',password='".$password."' WHERE id = '".$id."'";
	mysqli_query($con,$sql);

	
	mysqli_close($con);

	echo ("<script language='JavaScript'>
		alert('แก้ไขข้อมูลเรียบร้อย');
		window.location.href='manage_user.php';
		</script>"); 
	
}

function editProfile($id,$firstname,$lastname,$telephone,$email,$address,$goverment,$username,$password){

	global $con;

	$sql="UPDATE users SET firstname='".$firstname."',lastname='".$lastname."',telephone='".$telephone."',email='".$email."',address='".$address."',goverment='".$goverment."',username='".$username."',password='".$password."' WHERE id = '".$id."'";
	mysqli_query($con,$sql);

	
	
	mysqli_close($con);

	echo ("<script language='JavaScript'>
		alert('แก้ไขข้อมูลเรียบร้อย');
		window.location.href='edit_profile.php?id=$id';
		</script>"); 
	
}

function deleteUser($id){
	global $con;

	mysqli_query($con,"DELETE FROM users WHERE id='".$id."'");
	mysqli_close($con);
	echo ("<script language='JavaScript'>
			alert('ลบข้อมูลเรียบร้อยแล้ว');
	    	window.location.href='manage_user.php';
	    	</script>"); 

}

function getAllUser(){
	global $con;

	$res = mysqli_query($con,"SELECT * FROM users ORDER BY id DESC");

	$data = array();
	while($row = mysqli_fetch_assoc($res)) {
		$namesArray[] = array(
			'id' => $row['id'],
			'firstname' => $row['firstname'],
			'lastname' => $row['lastname'],
			'telephone' => $row['telephone'],
			'email' => $row['email'],
			'address' => $row['address'],
			'goverment' => $row['goverment'],
			'username' => $row['username'],
			'password' => $row['password']);
	}

	$data = $namesArray;

	return $data;
	mysqli_close($con);

}


function getCurrentUser($id){

	global $con;

	$res = mysqli_query($con,"SELECT * FROM users WHERE id = '".$id."'");
	$result=mysqli_fetch_array($res,MYSQLI_ASSOC);
	return $result;

	mysqli_close($con);

}

function updateApprove($id,$status,$remark,$img_approve){
	global $con;

	//$sql="UPDATE appeals SET status='".$status."',remark='".$remark."' WHERE id = '".$id."'";
	if($img_approve != null){
		if(move_uploaded_file($_FILES["img_approve"]["tmp_name"],"images/approve/".$_FILES["img_approve"]["name"]))
		{
			$sql="UPDATE appeals SET status='".$status."',remark='".$remark."',img_approve='".$_FILES["img_approve"]["name"]."' WHERE id = '".$id."'";
			mysqli_query($con,$sql);
			
		}
	}else{
		$sql="UPDATE appeals SET status='".$status."',remark='".$remark."' WHERE id = '".$id."'";
		mysqli_query($con,$sql);

	}
	mysqli_query($con,$sql);
	
	mysqli_close($con);

	echo ("<script language='JavaScript'>
		alert('แก้ไขข้อมูลเรียบร้อย');
		window.location.href='manage_appeal.php';
		</script>"); 
	
}

function getAllAppealSuccess(){
	global $con;

	$res = mysqli_query($con,"SELECT * FROM appeals WHERE status = '3' ORDER BY id DESC");

	$data = array();
	while($row = mysqli_fetch_assoc($res)) {
		$namesArray[] = array(
			'id' => $row['id'],
			'full_name' => $row['full_name'],
			'telephone' => $row['telephone'],
			'amount' => $row['amount'],
			'ch1' => $row['ch1'],
			'ch2' => $row['ch2'],
			'ch3' => $row['ch3'],
			'goverment' => $row['goverment'],
			'img_appeal' => $row['img_appeal'],
			'address_nearby' => $row['address_nearby'],
			'street' => $row['street'],
			'date_appeal' => $row['date_appeal'],
			'soi' => $row['soi'],
			'tumbol' => $row['tumbol'],
			'latbox' => $row['latbox'],
			'lngbox' => $row['lngbox'],
			'status' => $row['status']);
	}

	$data = $namesArray;

	return $data;
	mysqli_close($con);

}

function formatDateTime($date){
if($date=="0000-00-00 00:00:00"){
    return "";
}
        $raw_datetime = explode(" ", $date);
        if($date=="")
            return $date;
        $raw_date = explode("-", $raw_datetime[0]);
        $raw_date[0]+=543;
        return  $raw_date[2] . "/" . $raw_date[1] . "/" . substr($raw_date[0],2,2) . " " . substr($raw_datetime[1],0,5);
}

function saveGoverment($goverment_name){
	
	
	global $con;

	$sql = "INSERT INTO goverment (goverment_name) VALUES('".$goverment_name."')";
	mysqli_query($con,$sql);
		
	mysqli_close($con);
	echo ("<script language='JavaScript'>
		alert('เพิ่มข้อมูลเรียบร้อย');
		window.location.href='manage_goverment.php';
		</script>"); 
	
}

function editGoverment($id,$goverment_name){

	global $con;

	$sql="UPDATE goverment SET goverment_name='".$goverment_name."' WHERE id = '".$id."'";
	mysqli_query($con,$sql);

	
	mysqli_close($con);

	echo ("<script language='JavaScript'>
		alert('แก้ไขข้อมูลเรียบร้อย');
		window.location.href='manage_goverment.php';
		</script>"); 
	
}

function deleteGoverment($id){
	global $con;

	mysqli_query($con,"DELETE FROM goverment WHERE id='".$id."'");
	mysqli_close($con);
	echo ("<script language='JavaScript'>
			alert('ลบข้อมูลเรียบร้อยแล้ว');
	    	window.location.href='manage_goverment.php';
	    	</script>"); 

}

function getAllGoverment(){
	global $con;

	$res = mysqli_query($con,"SELECT * FROM goverment ORDER BY id DESC");

	$data = array();
	while($row = mysqli_fetch_assoc($res)) {
		$namesArray[] = array(
			'id' => $row['id'],
			'goverment_name' => $row['goverment_name']);
	}

	$data = $namesArray;

	return $data;
	mysqli_close($con);

}


function getCurrentGoverment($id){

	global $con;

	$res = mysqli_query($con,"SELECT * FROM goverment WHERE id = '".$id."'");
	$result=mysqli_fetch_array($res,MYSQLI_ASSOC);
	return $result;

	mysqli_close($con);

}


?>