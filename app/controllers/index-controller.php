<?php 
	
	$activities = new Dbh;
	$fetchUsers = $activities->select("stored_contacts", " ORDER BY `stored_contacts`.`cnt_firstname` ASC, `stored_contacts`.`cnt_lastname` ASC");
	$fetchGroup = $activities->select("stored_groups", "");
	$reset = "";
	$error_msg = "";
		
	if ($reset == "") {
		$fetchUsers = $activities->select("stored_contacts", " ORDER BY `stored_contacts`.`cnt_firstname` ASC, `stored_contacts`.`cnt_lastname` ASC");
	}
	if (isset($_POST['btnNewOld'])) {
		$NewOld = $_POST['NewOld'];
		$fetchUsers = $activities->select("stored_contacts", " ORDER BY `stored_contacts`.`id` DESC");	
	}
	if (isset($_POST['btnOldNew'])) {
		$NewOld = $_POST['OldNew'];
		$fetchUsers = $activities->select("stored_contacts", " ORDER BY `stored_contacts`.`id` ASC");		
	}
	if (isset($_POST['DelBtn'])) {
		$activities = new Dbh;
		$userid = trim($_POST['DelID']);
		$activities->delete("stored_contacts", "WHERE `stored_contacts`.`id` = '$userid'");
		echo "<script>window.location.assign('". PROOT ."')</script>";
		header("Location: " . PROOT ."");
		} 
	if (isset($_POST['add_group'])){
		$error_msg = "";
		$g_name = strtolower($_POST['group_name']);
		if (empty($_POST['group_name'])) {
			$error_msg = "<script> alert('Field Cannot Be EMPTY')</script>";
		}else{
			$checksql = "SELECT * FROM `stored_groups` WHERE group_name='$g_name'";
		    $result = $activities->connect()->query($checksql);
		    $resultCheck = $result->num_rows;
		    if ($resultCheck > 0) {     
		       	$error_msg = "<script> alert('Sorry.. " . ucfirst($g_name) . " Group Already EXISTS')</script>";
		    }else{
				$add = $activities->newgroup("$g_name");
				echo "<script>window.location.assign('" . PROOT . "')</script>";
			}
		}
	}else{}

		echo $error_msg;
		$search_err_message = "";
		$resetSearch = "";

		if (isset($_POST['btnByName'])){
			$name = $_POST['byName'];
			if (empty($name)) {
				echo "<script>alert('Contact's Name Field Cannot Be Empty')</script>";
			}else{
				$fetchUsers = $activities->select("stored_contacts", " WHERE `cnt_firstname` = '$name' OR `cnt_lastname` = '$name'");
				$reset = "true";
				$resetSearch = "<button class='btn btn-outline-danger btn-sm' style='float:right; margin-right:5px;' onclick='resetSearch()'>Reset Search</button>";
			}
		}

		if (isset($_POST['btnByEmail'])){
			$email = trim($_POST['byEmail']);
			if (empty($email)) {
				echo "<script>alert('Contact's Email Field Cannot Be Empty')</script>";
			}else{
				$fetchUsers = $activities->select("stored_contacts", " WHERE `cnt_email` = '$email'");
				$reset = "true";
				$resetSearch = "<button class='btn btn-outline-danger btn-sm' style='float:right; margin-right:5px;' onclick='resetSearch()'>Reset Search</button>";
			}

		}
		
		if(isset($_POST['btnByNumber'])){
			$number = trim($_POST['byNumber']);
			if (empty($number)) {
				echo "<script>alert('Contact's Number Field Cannot Be Empty')</script>";
			}else{
				$fetchUsers = $activities->select("stored_contacts", " WHERE `cnt_number` = '$number'");
				$reset = "true";
				$resetSearch = "<button class='btn btn-outline-danger btn-sm' style='float:right; margin-right:5px;' onclick='resetSearch()'>Reset Search</button>";
			}
		}

		echo $search_err_message;

		function counter1($table){
			$activities = new Dbh;
			$value = $activities->count("$table");
				echo $value;
		}

	?>