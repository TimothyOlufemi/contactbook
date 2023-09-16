     

        <div class="row">
        <div class="col-sm-9">
        <h1 class="display-5 fw-bold" style="float: left;">Contact Book</h1>
        </div>
        <div class="col-sm-3">
        <a class="btn btn-outline-success btn-sm" href="<?=PROOT?>NewContact" style="float: right;">Add New Contact</a>
        </div>
        </div><hr/><br/>
		
		<div class="row">
	 	<div class="col-md-3 d-xs-none">
 		<div class="card">
 		<div class="card-body">
 		<div class="row">
 		<div class="col-sm-6">
 		<p style="">Contact Groups</p>
 		</div>
 		<div class="col-sm-6">
 		<button class="btn btn-sm btn-outline-success" style="float: right;" data-bs-toggle="modal" data-bs-target="#groupModal">New Group</button>
 		</div>
 		</div>

		<ul class="list-group list-group-flush">
 		<?php
		if ($fetchGroup != null) {
		foreach ($fetchGroup as $value) 
		{ ?>
		<form method="POST" action="<?=PROOT?>ContactGroups">
		<button class="list-group-flush list-group-item list-group-item-action d-flex justify-content-between align-items-start" style="border: 0px 0px 0px 2px solid black">
		<div class="ms-2 me-auto">
		<?php echo ucwords($value['group_name']); ?> 
		</div>
		<span class="badge bg-primary rounded-pill">
		<?php
		$simplified = "grp_". strtolower($value['group_name']);
		echo $activities->count("$simplified");
		?>
		</span>
		</button>
		<input hidden name="sendGroupName" value="<?php echo $value['group_name']; ?>">
		</form>
		<?php 
		}
		}else{
		echo "<hr/><b><center>No Group Yet!</b></center>";
		}
 		?>
		</ul>
 		</div>
 		</div>
 		<!-- MODAL FOR NEW CONTACT GROUP -->

		<div class="modal fade" id="groupModal" tabindex="-1" aria-hidden="true">
  		<div class="modal-dialog modal-sm modal-dialog-centered">
   	 	<div class="modal-content">
      	<br/>
        <center><p style="font-size: 20px;" class="modal-title" id="staticBackdropLabel">Create a New Contact Group</p></center>
        <hr/>
      
     	<div class="modal-body">
		<form action="<?=PROOT?>ContactGroups" method="POST">
      	<div class="">
		<label class="form-label">Group Name</label>
		<input type="text" class="form-control" placeholder="Enter Group Name" name="group_name" required="">
		<input type="text" value="<?php echo $_POST['sendGroupName']; ?>" name="sendGroupName" hidden="">
		</div><br>		
      	<div class="modal-footer">
        <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Dismiss</button>
        <button type="submit" class="btn btn-outline-primary btn-sm" name="add_group">Add</button>
     	</div>
  		</form>
    	</div>
		</div>
		</div>
		</div>
		<!-- END OF MODAL FOR NEW CONTACT GROUP -->
		</div>
		
		<div class="col-sm-9">

		<div class="card">
		<div class="card-body">
		<?php 
		if (!isset($_POST['sendGroupName'])){
			echo "Select A Group";
		}else{
		?>

		<div class="row">
		<div class="col-sm-6">
		<h4>Group Name: <b><?php echo ucwords($GroupName); ?></b></h4>	
		</div>
		<div class="col-sm-6">
		<button class="btn btn-outline-info btn-sm" data-bs-toggle="modal" data-bs-target="#configureModal" style="margin-right: 5px; float: right;">Configure <b><?php echo ucwords($GroupName);?></b></button>
		<button type="button" class="btn btn-outline-success btn-sm" style="margin-right: 5px; float: right;" data-bs-toggle="modal" data-bs-target="#addContactModal">Add To <b><?php echo ucwords($GroupName);?></b></button>
		<button class="btn btn-outline-danger btn-sm" onclick="Home()" style="margin-right: 5px; float: right;"> < Back</button>

		<!-- CONFIGURE BUTTON MODAL -->
		<div class="modal fade" id="configureModal" tabindex="-1" aria-hidden="true">
 		<div class="modal-dialog modal-dialog-centered modal-md">
    	<div class="modal-content">
    	<div class="modal-header">
    	<h5>Change Group Name</h5>
    	<button type="button" class="btn-close" data-bs-dismiss="modal"></button>	
    	</div>
        <div class="modal-body">
       	
       	<ul class="nav nav-pills nav-justified mb-3" id="pills-tab" role="tablist">
  		<li class="nav-item" role="presentation">
    	<button class="nav-link active" id="pills-name-tab" data-bs-toggle="pill" data-bs-target="#pills-name" type="button" role="tab" aria-controls="pills-name" aria-selected="true">Change Group Name</button>
  		</li>
  		<li class="nav-item" role="presentation">
    	<button class="nav-link" id="pills-delete-tab" data-bs-toggle="pill" data-bs-target="#pills-delete" type="button" role="tab" aria-controls="pills-email" aria-selected="false">Delete Group</button>
  		</li>
		</ul>
	
		<div class="tab-content" id="pills-tabContent">
  		<div class="tab-pane fade show active" id="pills-name" role="tabpanel" aria-labelledby="pills-name-tab">
  		<form method="POST" action="<?=PROOT?>ContactGroups">
  		<label>Enter New Group Name</label><p></p>
  		<input type="text" class="form-control" name="newGroupName" placeholder="Enter New Group Name" required>
  		<input hidden name="oldGroupName" value="<?php echo $GroupName; ?>">
  		<p></p>
  		<button class="btn btn-outline-success" name="UpdateGroupName">Update</button>
  		</form>
  		</div>
 		<div class="tab-pane fade bg-dark" style="color: white;" id="pills-delete" role="tabpanel">
 		<center>
 		<p style="font-size: 20px;">Delete <b><?php echo ucwords($GroupName); ?></b> Group</p>
 		<p>Are you Sure you want to delete <b><?php echo ucwords($GroupName); ?></b></p>
  		<form method="POST" action="<?=PROOT?>ContactGroups">
  		<input hidden name="sendGroupName" value="<?php echo $GroupName; ?>">
  		<input name="currentGroupName" hidden value="<?php echo $GroupName; ?>">
  		<button class="btn btn-outline-danger" name="DeleteGroupBtn">DELETE</button>
  		</form>
  		<br/>
  		</center>
  		</div>
		</div>
		</div>
		
		<div class="modal-footer">
      	<button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Dismiss</button>
      	</div>
	 
    		
      	
    	</div>
  		</div>
		</div>


		<!-- Modal to Add Contact to the group -->
		<div class="modal fade" id="addContactModal" tabindex="-1" aria-labelledby="" aria-hidden="true">
  		<div class="modal-dialog">
    	<div class="modal-content">
      	<div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Contacts to <b><?php echo ucwords($GroupName); ?></b></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	    </div>
    	<div class="modal-body">

      	<?php
      	$modalFetchUsers = $activities->select("stored_contacts", " ORDER BY `stored_contacts`.`cnt_firstname` ASC, `stored_contacts`.`cnt_lastname` ASC");
	
		if ($modalFetchUsers != null) {?>
		<table class="table">
      	<tr>
      	<th>Name</th>
      	<th>Email</th>
      	<th>Action</th>
      	</tr>
		<?php
		foreach ($modalFetchUsers as $value) 
		{ ?>
		<tr>
		<form method="POST" action="<?=PROOT?>ContactGroups">
		<input hidden name="CntID" value="<?php echo $value['id']; ?>">
		<input hidden name="CntFullname" value="<?php echo $value['cnt_firstname'] . " " . $value['cnt_lastname']; ?>">
		<input hidden name="CntEmail" value="<?php echo $value['cnt_email']; ?>">
		<input hidden name="sendGroupName" value="<?php echo $GroupName; ?>">
		<td><?php echo $value['cnt_firstname'] . " " . $value['cnt_lastname'];?></td>
		<td><?php echo $value['cnt_email']; ?></td>
		<td><button class="btn btn-outline-success btn-sm" name="addCntBtn">Add</button></td>
		</form>
		</tr>
		<?php
		}}else{
			echo "No Record Found";
		}
		?>

		</table>
        </form>
      	</div>
      	<div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      	</div>
    	</div>
  		</div>
		</div>
		</div>
		</div>
				
		<br/>
		<div class="table-responsive">
		<table class="table table-bordered">
		<tr>
		<th>Name</th>
		<th>Email</th>
		<th>Action</th>
		</tr>
		<?php 
		$group_contacts = $activities->select("$simplifiedName", "");
		if ($group_contacts != null) {
		foreach ($group_contacts as $value) {
		?>
		<tr>
		<td><?php echo $value['cnt_fullname']; ?></td>
		<td><?php echo $value['cnt_email']; ?></td>
		<td>
		<form method="POST" action="<?=PROOT?>ContactGroups">
		<input value="<?php echo $value['id']; ?>" name="DELid" hidden>
		<input hidden name="sendGroupName" value="<?php echo $GroupName; ?>">
		<button class="btn btn-outline-danger btn-sm" name="DelUserBTN">Delete</button>
		</form>
		</td>
		</tr>
		<?php
		}
		}
		?>
		</table>
		</div>
		</div>
		</div>
		</div>
		<?php } ?>	

		<script type="text/javascript">
			function Home(){
				window.location.assign('<?=PROOT?>')
			}
			function Configure(){
				window.location.assign('<?=PROOT . "ContactGroups/Configure"?>')
			}
		</script>
		<script src="js/bootstrap.bundle.min.js"></script>
		<script src="js/jquery.js"></script>

</body>
</html>