
  <div class="container-fluid ">
  <div>
  <h1 class="display-5 fw-bold" style="float: left;">Contact Book</h1>
  <button class="btn btn-outline-danger btn-sm" onclick="window.location.assign('<?=PROOT?>')" style="margin-right: 5px; float: right;"> < Back</button>
  </div><br/><br/><br/>
 	<div class="row">
  <div class="col-lg-12 mb-4 order-0">
  <div class="card">
  <div class="card-body">
  <h4 class="text-dark"><i class="fa fa-user"></i> Add Contact</h4>
  <br/>
  <?php echo $error1; ?>
  <?php echo $error2; ?>
  <?php echo $success; ?>
  
  <form class="needs-validation " method="POST" action="<?=PROOT?>newcontact">
  
  <div class="mb-3 form-floating">
  <select id="title" name="title" class="select2 is- form-control form-select" required>
  <option value="">Select Contact's Title</option>
  <option value="Mr.">Mr.</option>
  <option value="Mrs.">Mrs.</option>
  <option value="Miss.">Miss.</option>
  </select>
  <label for="title" class="form-label">Title</label>
  <div class="valid-feedback">
  Looks good!
  </div>
  <div class="invalid-feedback">
  Please choose a Title.
  </div>
  </div>
  
  <div class="mb-3 form-floating">
  <input
  type="text"
  name="firstname"
  class="form-control"
  id="firstname"
  placeholder="John Doe"
  value="<?php echo $firstname; ?>" 
  required
  />
  <label for="firstname">Firstname</label>
  <div class="valid-feedback">
  Looks good!
  </div>
  <div class="invalid-feedback">
  Please Enter a Firstname.
  </div>
  </div>
  
  <div class="mb-3 form-floating">
  <input
  type="text"
  name="lastname"
  class="form-control"
  id="lastname"
  placeholder="John Doe"
  value="<?php echo $lastname; ?>"
  required
  />
  <label class="form-label" for="lastname">Lastname</label>
  <div class="valid-feedback">
  Looks good!
  </div>
  <div class="invalid-feedback">
  Please choose a Lastname.
  </div>
  </div>

  <div class="mb-3 form-floating">
  <select id="gender" name="gender" class="select2 form-select" required>
  <option value="">Select Contact's Gender</option>
  <option value="Male">Male</option>
  <option value="Female">Female</option>
  </select>
  <label for="gender" class="form-label">Gender</label>
  <div class="invalid-feedback">
  Please choose a Gender
  </div>
  <div class="valid-feedback">
  Looks good!
  </div>
  </div>
  
  <div class="mb-3 form-floating">
  <input
  type="text"
  name="address"
  value="<?php echo $address; ?>"
  id="basic-icon-default-company"
  class="form-control"
  placeholder="Enter Contact's Address"
  required
  />
  <label class="form-label" for="address">Address</label>
  <div class="valid-feedback">
  Looks good!
  </div>
  <div class="invalid-feedback">
  Please enter an Address.
  </div>
  </div>  
  <div class="mb-3 form-floating">
  <input
  type="email"
  name="email"
  id="basic-icon-default-email"
  class="form-control"
  placeholder="john.doe1@mail.com"
  required
  />
  <label class="form-label" for="email">Email</label>
  <div class="valid-feedback">
  Looks good!
  </div>
  <div class="invalid-feedback">
  Please enter an Email.
  </div>
  <div class="form-text">You can use letters & numbers</div>
  </div>
  
  <div class="mb-3 form-floating">
  <input
  type="number"
  name="number"
  value="<?php echo $number; ?>"
  id="phone"
  class="form-control phone-mask"
  placeholder="658 799 8941"
  required
  />
  <label class="form-label" for="phone">Phone No.</label>
  <div class="valid-feedback">
  Looks good!
  </div>
  <div class="invalid-feedback">
  Please enter a Phone Number.
  </div>
  </div>

  <button type="submit" name="insertRecord" class="btn btn-primary">Add Contact</button>
  </form>
  </div>



  </div>
  </div>
  </div>
  </div>
  </body>
  </html>

