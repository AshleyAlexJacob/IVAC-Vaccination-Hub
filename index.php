<?php

// Include config file
require_once "DBConnect.php";
include 'login.php';
include 'layout/header1.php';
?>
<?php
$locations = $db->getcentersList();
if (isset($locations)) {
} else {

  echo '<script>alert("No Locations Available")</script>';
}

$success = NULL;
$message = NULL;
if (isset($_POST['submitBtn'])) {
  $fname = $_POST['fname'];
  $mname = $_POST['mname'];
  $lname = $_POST['lname'];
  $sex = $_POST['sex'];
  $mail = $_POST['mail'];
  $mobile = $_POST['mobile'];
  $haddress = $_POST['haddress'];
  $city = $_POST['city'];
  $hstate = $_POST['hstate'];
  $pincode = $_POST['pincode'];
  $dob = $_POST['dob'];
  $dov = $_POST['dov'];
  $bg = $_POST['bg'];
  $cnic = $_POST['cnic'];
  $location = $_POST['location'];


  $db = new DBConnect();
  $flag = $db->personUser($fname, $mname, $lname, $sex, $mail, $mobile, $haddress, $city, $hstate, $pincode, $dob, $dov, $bg, $cnic, $location);

  if ($flag) {
    $success = "Successfully Register!";
  } else {
    $message = "There was some error saving the user to the database!";
  }
}
// Employee Ke Game
$title = "Employee";
$setEmployeeActive = "active";
include 'layout/header1.php';

?>
<link rel="stylesheet" href="./css/bootstrap.css">
<link rel="stylesheet" href="./css/style.css">

<style>
  #intro {
    background-image: url(./assets/back2.jpg);
    /* height: 100vh; */
    background-repeat: no-repeat;
    background-size: cover;
    background-attachment: fixed;
    background-position: center center;
  }

  #content {
    height: 50vh;
  }

  #primary {
    background-color: #02AEAE;
  }

  #Location {

    width: 100%;
    padding: 15px;
    padding-right: 5px;
    padding-left: 5px;
    margin: 5px 5px;
    display: inline-block;
    border: 1px solid #CCCCCC;
    background: white;
    border-radius: 6px;
  }

  #primary2 {
    color: #02AEAE;
  }

  #ma-t {
    margin-top: 15vh;
  }

  .mat {
    margin-top: 30vh;
  }

  .mB {
    background-color: #02AEAE;
  }

  .hBtn:hover {
    background-color: #018282;
  }

  .mC {
    color: #02AEAE;
  }

  .vertical-center {
    padding-left: 75vh;

  }

  #mTop {
    margin-top: 20vh;
  }

body::-webkit-scrollbar {
  display: none;
}

</style>



<body>
  <nav class="navbar navbar-expand-lg navbar-dark mB">
    <div class="container-fluid">
      <img class="img-fluid " src="./assets/IVAC logo.png" width="80px">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="details.php">Get Vaccination Report</a>
          </li>



          <li class="nav-item">
            <a class="nav-link" href="" data-bs-toggle="modal" data-bs-target="#employeemodel">Employee Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="" data-bs-toggle="modal" data-bs-target="#exampleModal">Admin Login</a>
          </li>

        </ul>
      </div>
    </div>
  </nav>

  <div div id="intro" class="bg-image">
    <div class="container px-5 mx-5">
      <div class="row justify-content-start mx-3">
        <div class="col ">
          <!-- <div class="badge text-wrap py-3 px-3 fs-6 mat" id="primary">
            Hello we are
          </div> -->
          <div class="fs-1 fw-bold  mat mC">IVAC</div>

          <div class="fs-3  mt-2">Vaccination Hub</div>
          <div class="fs-5  mt-3">Designed to Meet your Needs</div>

        </div>
      </div>
      <div class="row justify-content-start mt-4 mx-3">
        <div class="col ">
          <!-- <button class="btn text-white fs-5" id="primary">Get Report</button> -->
          <button class="btn btn-outline-dark fs-5">Get Report</button>
          <div class="fs-4  mt-4 mC"><b>or Register Below</b> </div>

        </div>

      </div>
    </div>
  </div>

  <div class="container px-5">



    <div class="container" style="margin-top:2%;">
      <?php if (isset($success)) : ?>
        <div class="alert-success fade-out-5"><?= $success; ?></div>
      <?php endif; ?>
      <?php if (isset($message)) : ?>
        <div class="alert-danger fade-out-5"><?= $message; ?></div>
      <?php endif; ?>
      <h1 style="text-align:center" class="mC">Register for Vaccine</h1>
      <hr>
      <form method="post" role="form" action="">
        <div class="container details">
          <div class="row  justify-content-center">
            <div class="form-group col-md-4 col-12">
              <label for="fname"><b>First Name</b></label>
              <input type="text" class="form-control" placeholder="Enter First Name*" name="fname" required>
            </div>

            <div class="form-group col-md-4 col-12">
              <label for="mname"><b>Middle Name</b></label>
              <input type="text" class="form-control" placeholder="Enter Middle Name" name="mname">
            </div>

            <div class="form-group col-md-4 col-12">
              <label for="lname"><b>Last Name</b></label>
              <input type="text" class="form-control" placeholder="Enter Last Name*" name="lname" required>
            </div>
          </div>
          <br>
          <div class="form-group col-md-12 col-12">
            <label for="inputEmail4"><b>Email</b></label>
            <input type="email" class="form-control" placeholder="Email" name="mail">
          </div>
          <br>
          <div class="form-group col-md-12 col-12">
            <label for="gender"><b>Gender </b></label>
            <br>
            <input type="radio" name="sex" value="male" checked="true"> Male
            <input type="radio" name="sex" value="female"> Female
            <input type="radio" name="sex" value="other"> Other<br>

          </div>
          <br>

          <div class="form-group col-md-12 col-12">
            <label for="inpcnic"><b>CNIC</b></label>
            <input type="text" class="form-control" placeholder="17301*********" name="cnic" required>

          </div>
          <br>
          <div class="row">
            <div class="form-group col-md-6 col-12">
              <label for="mobile"><b>Mobile No. +92</b></label>
              <input type="text" class="form-control" placeholder="10 digit mobile no" name="mobile" required>
            </div>

            <div class="form-group col-md-6 col-12">
              <label for="bg"><b>Blood Group </b></label>
              <input type="city" placeholder="Blood Group" class="form-control" name="bg" required>

            </div>

          </div>
          <br>
          <div class="form-group col-md-12 col-12">
            <label for="haddress"><b>Address </b></label>
            <input type="text" placeholder="Full Address" class="form-control" name="haddress" required>

          </div>

          <br>
          <div class="row">
            <div class="form-group col-md-6 col-12">
              <label for="city"><b>City </b></label>
              <input type="city" placeholder="City" class="form-control" name="city" required>
            </div>

            <div class="form-group col-md-6 col-12">
              <label for="hstate"><b>State </b></label>
              <input type="city" placeholder="State" class="form-control" name="hstate" required>
            </div>

            <div class="form-group col-md-4 col-12">
              <label for="pincode"><b>Pincode </b></label>
              <input type="number" placeholder="Pincode" class="form-control" name="pincode" required>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-md-6 col-12">
              <label for="dob"><b>Enter Date of Birth </b></label>
              <input type="date" placeholder="mm/dd/yyyy" class="form-control" name="dob" required>
            </div>
            <div class="col-md-6 col-12">
              <label for="dov"><b>Schedule Date for Vaccination </b></label>
              <input type="date" placeholder="mm/dd/yyyy" class="form-control" name="dov" required>
            </div>
          </div>

        </div>
        <br>
        <div class="row mx-1">
          <div class="form-group col-md-12 col-12  px-2">
            <label for="Location"><b>Location</b></label>
            <select id="Location" type="dropdown" name="location">
              <option value="" selected disabled>Select Location</option>
              <?php
              if (isset($locations)) {
                $i = 1;
                foreach ($locations as $l) : ?>
                  <option value="<?php echo $l['center_id'] ?>"> <?php echo $i . "\t\t " . $l['name']; ?>
                  </option>
              <?php
                  $i++;
                endforeach;
              }

              ?>
            </select>

          </div>
        </div>
        <div class="row justify-content-center pt-5">
          <div class="col-md-1">
            <button type="submit" name="submitBtn" class="btn text-white fs-5 mB hBtn">Register</button>

          </div>

        </div>
        <!-- </div> -->
      </form>

    </div>

  </div>
</body>



<?php include 'loginmodel.php' ?>




<?php include 'layout/footer1.php' ?>