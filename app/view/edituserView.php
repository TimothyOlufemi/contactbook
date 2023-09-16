<?php
    if ($editUser != null) {
		foreach ($editUser as $fetched) 
		{	?>

	  <div class="container-fluid py-5">
    <div>
    <h1 class="display-5 fw-bold" style="float: left;"><?php echo $fetched['cnt_title'] . " " . $fetched['cnt_firstname'] . " " . $fetched['cnt_lastname']; ?></h1>
    <a class="btn btn-outline-success btn-sm" href="<?=PROOT?>newcontact" style="float: right;">Add New Contact</a>
    <button class="btn btn-outline-danger btn-sm" onclick="window.location.assign('index.php')" style="margin-right: 5px; float: right;">< Back</button>
    </div><br/><br/><br/>
    <?php echo $success;  ?>
    <form method="POST" action="<?=PROOT?>edituser">
    <div class="mb-3">
		<div class="mb-3">
    <label for="language" class="form-label">Title</label>
    <div class="input-group input-group-merge">
    <span id="basic-icon-default-phone2" class="input-group-text"><i class="bx bx-user"></i></span>
    <select id="" name="edit_title" class="select2 form-select">
    <option value="<?php echo $fetched['cnt_title']; ?>"><?php echo $fetched['cnt_title']; ?></option>
    <option value="Mr.">Mr.</option>
    <option value="Mrs.">Mrs.</option>
    <option value="Miss.">Miss.</option>
    </select>
    </div>
    <br/>
    <div class="mb-3">
    <label class="form-label" for="basic-icon-default-fullname">Firstname</label>
    <div class="input-group input-group-merge">
    <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
    <input
    type="text"
    name="edit_firstname"
    class="form-control"
    id="basic-icon-default-fullname"
    placeholder="John Doe"
    value="<?php echo $fetched['cnt_firstname']; ?>"
    />
    </div>
    </div>
    <div class="mb-3">
    <label class="form-label" for="basic-icon-default-fullname">Lastname</label>
    <div class="input-group input-group-merge">
    <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
    <input
    type="text"
    name="edit_lastname"
    class="form-control"
    id="basic-icon-default-fullname"
    placeholder="John Doe"
    value="<?php echo $fetched['cnt_lastname']; ?>"
    />
    </div>
    </div>
    <div class="mb-3">
    <label for="language" class="form-label">Gender</label>
    <div class="input-group input-group-merge">
    <span id="basic-icon-default-phone2" class="input-group-text"><i class="bx bx-user"></i></span>
    <select id="gender" name="edit_gender" class="select2 form-select">
    <option value="<?php echo $fetched['cnt_gender']; ?>"><?php echo $fetched['cnt_gender']; ?></option>
    <option value="Male">Male</option>
    <option value="Female">Female</option>
    </select>
    </div><br/>
    <div class="mb-3">
    <label class="form-label" for="basic-icon-default-company">Address</label>
    <div class="input-group input-group-merge">
    <span id="basic-icon-default-company2" class="input-group-text"><i class="bx bx-buildings"></i></span>
    <input
    type="text"
    name="edit_address"
    value="<?php echo $fetched['cnt_address']; ?>"
    id="basic-icon-default-company"
    class="form-control"
    placeholder="Enter Contact's Address"
    />
    </div>
    </div>  
    <div class="mb-3">
    <label class="form-label" for="basic-icon-default-email">Email</label>
    <div class="input-group input-group-merge">
    <span class="input-group-text"><i class="bx bx-envelope"></i></span>
    <input
    type="email"
    name="edit_email"
    id="basic-icon-default-email"
    value="<?php echo $fetched['cnt_email']; ?>"
    class="form-control"
    placeholder="john.doe1@mail.com"
    />
    </div>
    <div class="form-text">You can use letters & numbers</div>
    </div>
    <div class="mb-3">
    <label class="form-label" for="basic-icon-default-phone">Phone No.</label>
    <div class="input-group input-group-merge">
    <span id="basic-icon-default-phone2" class="input-group-text"><i class="bx bx-phone"></i></span>
    <input
    type="number"
    name="edit_number"
    value="<?php echo $fetched['cnt_number']; ?>"
    id="basic-icon-default-phone"
    class="form-control phone-mask"
    placeholder="658 799 8941"
    required
    />
    </div>
    </div>
                       
		<input type="password" value="<?php echo $fetched['id']; ?>" name="newid" hidden required><br/>
		<button type="submit" class="btn btn-outline-success" name="editRecord">Edit Record</button>
    </form>
        
    </div>
    </div>
    <?php } }else{ header("Location: " . PROOT . "");} ?>