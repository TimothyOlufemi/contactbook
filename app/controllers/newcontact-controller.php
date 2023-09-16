<?php
  
$activities = new Dbh;

$title = "";
$firstname = "";
$lastname = "";
$address = "";
$number = "";
$email = "";
$gender = "";
$error1 = "";
$error2 = "";
$error3 = "";
$error4 = "";
$error5 = "";
$success = "";

  
  if (isset($_POST['insertRecord'])) {
    // get all data
  $firstname = ucfirst(trim($_POST['firstname']));
  $lastname = ucfirst(trim($_POST['lastname']));
  $gender = $_POST['gender'];
  $address = $_POST['address'];
  $email = $_POST['email'];
  $title = $_POST['title'];
  $number = $_POST['number'];
  $day = date("d");
  $month = date("m");
  $year = date("Y");    
  $user_bg = array("bg-dark","bg-success","bg-warning","bg-secondary","bg-info", "bg-primary", "bg-danger");
  shuffle($user_bg);
  $user_bg_value = current($user_bg);

  $DB = new Dbh;
  $DataBConn = $DB->connect();

   if (empty($title) || empty($firstname) || empty($lastname) || empty($gender) || empty($address) || empty($email) || empty($number)){
    echo "<script>" . "alert('ERROR: Some Fields Were Left Empty')" . "</script>";
    $error1 = "<h6 class='text-danger'><i class='icon-info'></i> Some Fields Were Left Empty</h6>";
  }else{
    $sql = "SELECT * FROM `stored_contacts` WHERE `cnt_email`='$email' OR `cnt_number` = '$number' ";
    $result = $activities->connect()->query($sql);
    $NumRows = $result->num_rows;
    if ($NumRows > 0) {          
      echo "<script>alert('Sorry... A Contact Exist with the same EMAIL or NUMBER')</script>";
      $error2 = "<h6 class='text-danger'><i class='icon-info'></i> Sorry... A Contact Exist with the same EMAIL or NUMBER</h6>";
    }else{
      $value = "'$firstname', '$email', '$address', '$title', '$number', '$gender', '$lastname', '$day', '$month', '$year', '$user_bg_value'";
      $saveUser = $activities->insert("stored_contacts", "`cnt_firstname`, `cnt_email`, `cnt_address`, `cnt_title`, `cnt_number`, `cnt_gender`, `cnt_lastname`, `cnt_day`, `cnt_month`, `cnt_year`, `bg1`", $value);
        header("Location: ". PROOT . "NewContact");
  }  
  }
  }

?>