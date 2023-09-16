<?php
	
$activities = new Dbh;
$editValue = $_POST['newid'];
$editUser = $activities->select("stored_contacts", " WHERE `id` = '$editValue'");

$error1 = "";
$success= "";


if (isset($_POST['editRecord'])) {
	
	$edit_title = $_POST['edit_title'];
	$edit_firstname = $_POST['edit_firstname'];
	$edit_lastname = $_POST['edit_lastname'];
	$edit_gender = $_POST['edit_gender'];
	$edit_email = $_POST['edit_email'];
	$edit_address = $_POST['edit_address'];
	$edit_number = $_POST['edit_number'];

if (empty($edit_title) || empty($edit_firstname) || empty($edit_lastname) || empty($edit_gender) || empty($edit_address) || empty($edit_email) || empty($edit_number)){

          echo "<script>" . "alert('ERROR: Some Fields Were Left Empty')" . "</script>";
          $error1 = "<h6 class='text-danger'><i class='icon-info'></i> Some Fields Were Left Empty</h6>";
}   
else{
	$command = "`cnt_firstname` = '$edit_firstname', `cnt_title` = '$edit_title', `cnt_gender` = '$edit_gender', `cnt_address` = '$edit_address', `cnt_email` = '$edit_email', `cnt_number` = '$edit_number', `cnt_lastname` = '$edit_lastname'";
	 		$uid = $_POST['newid'];
 	$str_id = "`id`= ". $uid ." ";
 	$interpret_str_id = "$str_id";

	$UpdateUser = $activities->update("stored_contacts", $command, $interpret_str_id);
	
	$success = "<h6 class='text-success'><i class='icon-'></i> Contact Successfully Updated</h6>";
    echo "<script>alert('Update Successful')</script>";
    $uid = $_POST['newid'];	
	}		
}

?>