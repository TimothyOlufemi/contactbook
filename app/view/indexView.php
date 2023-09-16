
        <div>
        <h1 class="display-5 fw-bold" style="float: left;">Contact Book</h1>
        <a class="btn btn-outline-success btn-sm" href="<?=PROOT. "NewContact"?>" style="float: right;">Add New Contact</a>
        </div>
        <br/><br/><br/><hr><br/>  
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
 		<div>

		<ul class="list-group list-group-flush">
 		<?php
		if ($fetchGroup != null) {
		foreach ($fetchGroup as $value) {
		?>

		<form method="POST" action="<?=PROOT?>ContactGroups">
		<button class="list-group-flush list-group-item list-group-item-action d-flex justify-content-between align-items-start" style="border: 0px 0px 0px 2px solid black">
		<div class="ms-2 me-auto"><?php echo ucwords($value['group_name']); ?></div>
		<span class="badge bg-primary rounded-pill"><?php
		$simplified = "grp_". strtolower($value['group_name']);
		echo counter1("$simplified");
		?></span>
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
        	<center>
        	<p style="font-size: 20px;" class="modal-title" id="staticBackdropLabel">Create a New Contact Group</p>
        	</center>
        	<hr/>
      
    		<div class="modal-body">
			<form action="<?=PROOT?>" method="POST">
      		<div class="">
		  	<label class="form-label">Group Name</label>
		  	<input type="text" class="form-control" placeholder="Enter Group Name" name="group_name" required>
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

	<!-- MODAL FOR CONTACT SEARCH -->

	<div class="modal fade" id="searchModal" tabindex="-1" aria-hidden="true">
  		<div class="modal-dialog modal-md modal-dialog-centered">
   		<div class="modal-content">
     	
     	<br/>
        <center><p style="font-size: 20px;" class="modal-title" id="staticBackdropLabel">Search Contacts</p></center>
        <hr/>
      
      	<div class="modal-body">

      	<ul class="nav nav-pills nav-justified mb-3" id="pills-tab" role="tablist">
  		<li class="nav-item" role="presentation">
    	<button class="nav-link active" id="pills-name-tab" data-bs-toggle="pill" data-bs-target="#pills-name" type="button" role="tab" aria-controls="pills-name" aria-selected="true">Name</button>
  		</li>
  		<li class="nav-item" role="presentation">
    	<button class="nav-link" id="pills-email-tab" data-bs-toggle="pill" data-bs-target="#pills-email" type="button" role="tab" aria-controls="pills-email" aria-selected="false">Email</button>
  		</li>
  		<li class="nav-item" role="presentation">
    	<button class="nav-link" id="pills-number-tab" data-bs-toggle="pill" data-bs-target="#pills-number" type="button" role="tab" aria-controls="pills-number" aria-selected="false">Number</button>
  		</li>
		</ul>
	
		<div class="tab-content" id="pills-tabContent">
  		<div class="tab-pane fade show active" id="pills-name" role="tabpanel" aria-labelledby="pills-name-tab">
  		<form method="POST" action="<?=PROOT?>">
  		<label>Enter Contact's Name</label><p></p>
  		<input type="text" class="form-control" name="byName" placeholder="Search Contacts By Name" required>
  		<small>Note: You can Enter Either <b>Firstname</b> or <b>Lastname</b>. Just One.</small>
  		<p></p>
  		<button class="btn btn-outline-success" name="btnByName">Search</button>
  		</form>
  		</div>
 		<div class="tab-pane fade" id="pills-email" role="tabpanel" aria-labelledby="pills-email-tab">
  		<form method="POST" action="<?=PROOT?>">
  		<label>Enter Contact's Email</label><p></p>
  		<input type="email" class="form-control" name="byEmail" placeholder="Search Contacts By Email" required>
  		<p></p>
  		<button class="btn btn-outline-success" name="btnByEmail">Search</button>
  		</form>
  		</div>
  		<div class="tab-pane fade" id="pills-number" role="tabpanel" aria-labelledby="pills-number-tab">
  		<form method="POST" action="<?=PROOT?>">
  		<label>Enter Contact's Number</label><p></p>
  		<input type="number" class="form-control" name="byNumber" placeholder="Search Contacts By Number" required>
  		<p></p>
  		<button class="btn btn-outline-success" name="btnByNumber">Search</button>
  		</form>
 		 </div>
		</div>
	 
	  </div>

	  <br>		

      <div class="modal-footer">
      <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Dismiss</button>
      </div>
  
    </div>


	<!-- END OF MODAL FOR CONTACT SEARCH -->

 		<br/><hr/><br/><br/>
 		<div></div><br/><br/>
	 	</div></div></div></div></div>

   <div class="col-md-9">

		<div>
		<h5 style="float: left;">Total Contacts = <?php echo counter1("stored_contacts"); ?>	</h5>
		<div class="dropdown">
		<button class="btn dropdown-toggle btn-outline-warning btn-sm" type="button" id="sortDropDown" data-bs-toggle="dropdown" aria-expanded="false" style="float: right; ;">
		Sort By Date
		</button>
		<ul class="dropdown-menu" aria-labelledby="sortDropDown">
		<li>
		<form method="POST" action="<?=PROOT?>">
		<input hidden name="NewOld" value="NewOld">
		<button class="dropdown-item" name="btnNewOld">Newest to Oldest</button>
		</form>
		</li>
		<li>
		<form method="POST" action="<?=PROOT?>">
		<input hidden name="OldNew" value="OldNew">
		<button class="dropdown-item" name="btnOldNew">Oldest to Newest</button>
		</form>
		</li>
		</ul>
		<div>
		<?php echo $resetSearch; ?>
		<button class="btn btn-outline-success btn-sm" data-bs-toggle="modal" data-bs-target="#searchModal" style="float: right; margin-right: 5px">Search</button>

			<!-- MODAL FOR SORTING  -->


      	

<!-- END OF MODAL FOR SEARCH -->
		
	</div>
	<br/><br/>
	<div class="table-responsive">

			
	

		<?php
		if ($fetchUsers != null) {
			?>
			<table class="table table-bordered" id="myTable">
			<tr>
			<th>Name</th>
			<th>Email</th>
			<th>Actions</th>
			</tr>
			<?php
			foreach ($fetchUsers as $value){
			$bg = $value['bg1'];
			$initials = "";
			$userLettersIcon = substr(strrev($value['cnt_firstname']), -1) . substr(strrev($value['cnt_lastname']), -1);
			$firstname = $value['cnt_firstname'];
			$lastname = $value['cnt_lastname'];
			$fullname = trim($firstname) . trim($lastname);
			if ($bg = "bg-dark" || $bg = "bg-secondary" || $bg = "bg-primary" || $bg = "bg-info" || $bg = "bg-success") {
                 $color = "white";
            }else{
                 $color = "black";
             }
			echo "
			<tr>
			<td>  
			<div class='initial_icon " .$value['bg1']. "' style='background-color: ; float: left;'>
            <center>
            <p class='initial_icon_letter' style='color:  $color'>$userLettersIcon</p>
			</center>
			</div>
			<p class='cnt_name' id='cnt_name'> &nbsp; ".$value['cnt_title']. " " . $value['cnt_firstname']." " .$value['cnt_lastname']."</p></td>
			<td>".$value['cnt_email']."</td>
			<td>
			<div class='btn-group' role='group' aria-label='Basic example'>
			<button class='btn btn-sm btn-outline-dark' data-bs-toggle='modal' data-bs-target='#".$fullname."Modal'> View </button>
			</div>
			<div class='btn-group' role='group' aria-label='Basic example'>
			<form method='POST' action='" . PROOT . "EditContact'>
			<input value='".$value['id']."' name='newid' hidden>
			<button class='btn btn-outline-warning btn-sm' type='submit' name='edituser1'>Edit</button> 
			</form>
			</div>
			<div class='btn-group'>
			<form method='POST' action='" . PROOT . "'>
			<input value='".$value['id']."' name='DelID' hidden>
			<button class='btn btn-outline-danger btn-sm' name='DelBtn'>Delete</button>
			</form>
			</div>
			</div>
			</td>
			</tr>";
				
				?>
		<div class="modal fade" id="<?php echo $fullname; ?>Modal" tabindex="-1">
	 	<div class="modal-dialog">
    	<div class="modal-content">
      	<div class="modal-body">
      	<button type="button" class="btn-close" data-bs-dismiss="modal" style="float: right !important;"></button>
      	<center>
        <div class="initial_icon <?php echo $value['bg1'];?>" style='background-color: ; width: 80px; height: 80px;'>
        <center>
        <p class='initial_icon_letter' style="color:<?php echo $color; ?>; font-size: 50px;"> 
        <?php echo $userLettersIcon;?>
		</p>
		</center>
		</div>
		</center>

		<br/>
		<div class="mb-3 form-floating">
        <input
        type="text"
        name="firstname"
        class="form-control"
        placeholder="John Doe"
        value="<?php echo $value['cnt_title']." ".trim($firstname) . " " . $lastname; ?>"
		readonly
        />
        <label>Contact's Fullname</label>
		</div>

		<div class="mb-3 form-floating">
        <input
        type="text"
        name="firstname"
        class="form-control"
        placeholder="John Doe"
        value="<?php echo $value['cnt_email']; ?>"
		readonly
        />
        <label>Contact's Email Address</label>
		</div>
	
		<div class="mb-3 form-floating">
        <input
        type="text"
        name="firstname"
        class="form-control"
        placeholder="John Doe"
        value="<?php echo $value['cnt_number']; ?>"
        readonly
        />
        <label>Contact's Phone Number</label>
		</div>
		
		<div class="mb-3 form-floating">
        <input
        type="text"
        name="firstname"
        class="form-control"
        placeholder="John Doe"
        value="<?php echo $value['cnt_gender']; ?>"
        readonly
        />
         <label>Contact's Gender</label>
		</div>
	
		<div class="mb-3 form-floating">
        <input
        type="text"
        name="firstname"
        class="form-control"
        placeholder="John Doe"
        value="<?php echo $value['cnt_address']; ?>"
        readonly
        />
        <label>Contact's Address</label>

		</div>
				
      	</div>
    	</div>
  		</div>
		</div>
		<?php }} else{
			echo "<center><h3><b>No Record Found!</b></h3></center>";
		}?>
		</table>
		</div>
		<br/>
		<br/>
		<br/>
		</div>

		</div>

		<br/>
		<script src="js/bootstrap.bundle.min.js"></script>
		<script src="js/jquery.js"></script>
		<script>
		function resetSearch() {
			window.location.assign("<?=PROOT?>")
		}
		</script>


</body>
</html>