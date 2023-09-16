<?php
	$activities = new Dbh;
	$fetchGroup = $activities->fetchgroup();
	$GroupName ="";
	if (isset($_POST['sendGroupName'])) {
		$GroupName = $_POST['sendGroupName'];
	}
		if (isset($_POST['UpdateGroupName'])) {
			$GroupName = $_POST['newGroupName'];
		}
	
		$simplifiedName = "grp_". strtolower($GroupName);
		$error_msg = "";
		
		if (isset($_POST['DelUserBTN'])) {
		$id = $_POST['DELid'];
		$DelGroupName = $_POST['sendGroupName'];
		$simplify = "grp_" . strtolower($DelGroupName);
		$activities->delete("$simplify", "WHERE `id` = $id");
		echo "<script>window.location.assign('" . PROOT . "ContactGroups')</script>";
		}
		
		if (isset($_POST['add_group'])){
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
				echo "<script>window.location.assign('" . PROOT . "ContactGroups')</script>";
			}
		}
		}else{}

		$addCntMsg = "";
		if (isset($_POST['addCntBtn'])) {
		$id = $_POST['CntID'];
		$fullname = $_POST['CntFullname'];
		$email = $_POST['CntEmail'];
		$simple_table = "grp_" . strtolower($GroupName);
		$checksql = "SELECT * FROM `$simple_table` WHERE `cnt_id` = '$id' AND `cnt_email` = '$email' ";
        $result = $activities->connect()->query($checksql);
        $resultCheck = $result->num_rows;

        if ($resultCheck > 0) {     
        	$error_msg = "<script> alert('Sorry.. User Already Exists in $GroupName')</script>";
        }else{
	    
		$activities->insert("$simple_table", "`cnt_id`, `cnt_email`, `cnt_fullname`", "'$id', '$email', '$fullname'");
		$addCntMsg = "<script>alert('Contact Added Successfully')</script>";
		}
		}
		if (isset($_POST['UpdateGroupName'])) {
			$newgroupname = "grp_".$_POST['newGroupName'];
			$oldgroupname = "grp_".$_POST['oldGroupName'];
			$activities->updategroup($oldgroupname, $newgroupname);
			header("Location: " . PROOT . "ContactGroups");
		}
		if (isset($_POST['DeleteGroupBtn'])) {
			$groupname = "grp_".$_POST['currentGroupName'];
			$activities->deletegroup($groupname);
			header("Location: " . PROOT . "ContactGroups");

		}
		echo $addCntMsg;
		echo $error_msg;
	
		
?>