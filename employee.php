<?php  require_once 'DBConnect.php';
  $db = new DBConnect();
$locations = $db->getcentersList();
if (isset($locations)) {
} else {

  echo '<script>alert("No Locations Available")</script>';
}

$success = NULL;
$message = NULL;
if (isset($_POST['add_empl'])) {
    $uname = $_POST['uname'];
    $psw = $_POST['psw'];
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
    $cnic = $_POST['cnic'];
    $location = $_POST['location'];


    require_once 'DBConnect.php';
    $db = new DBConnect();
    // TODO: Add CNIC to database function
    $flag = $db->addEmployee($uname, $psw, $fname, $mname, $lname, $sex, $mail, $mobile, $haddress, $city, $hstate, $pincode,$cnic,$location);

    if ($flag) {
        $success = "The Employee has been successfully added to the database!";
    } else {
        $message = "There was some error saving the user to the database!";
    }
}
// $title = "Employee";
// $setEmployeeActive = "active";
include 'layout/header1.php'
?>


<nav class="navbar navbar-expand-lg navbar-dark mB">
    <div class="container-fluid">
    <img class="img-fluid " src="assets/IVAC logo.png" width="80px">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                <li class="nav-item">
                    <a class="nav-link active" href="employee.php">Employee Registration</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="employeedetail.php">Employee Details</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="vaccination_location.php">Vaccination & Locations</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Log Out</a>
                </li>

            </ul>
        </div>
    </div>
</nav>

<!-- <div class="container" style="margin-top:2%;">
    <h1 style="text-align:center" class="mC">Employee Registration</h1>
    <hr>
    <?php if (isset($success)) : ?>
        <div class="alert-success fade-out-5"><?= $success; ?></div>
    <?php endif; ?>
    <?php if (isset($message)) : ?>
        <div class="alert-danger fade-out-5"><?= $message; ?></div>
    <?php endif; ?>
    <form method="post" role="form" action="employee.php">
        <div class="container details">
            <div class="row">
                <div class="col-lg-6 col-sm-12">
                    <label for="uname"><b>Username :</b></label>
                    <input type="text" placeholder="Enter username*" name="uname" required>
                </div>
                <div class="col-lg-6 col-sm-12">
                    <label for="psw"><b>Password:</b></label>
                    <input type="password" placeholder="password" name="psw" required style="width: auto;">
                </div>
            </div>
            <hr>

            <div class="row">
                <div class="col-md-4 col-12">
                    <label for="fname"><b>First Name :</b></label>
                    <input type="text" placeholder="Enter First Name*" name="fname" required>
                </div>
                <div class="col-md-4 col-12">
                    <label for="mname"><b>Middle Name :</b></label>
                    <input type="text" placeholder="Enter Middle Name" name="mname">
                </div>
                <div class="col-md-4 col-12">
                    <label for="lname"><b>Last Name :</b></label>
                    <input type="text" placeholder="Enter Last Name*" name="lname" required>
                </div>
            </div>
            <br>
            <label for="sex"><b>Gender : </b></label>
            <input type="radio" name="sex" value="male" checked="true"> Male
            <input type="radio" name="sex" value="female"> Female
            <input type="radio" name="sex" value="other"> Other<br>
            <label for="mail"><b>Email :</b></label>
            <input type="text" placeholder="example@gmail.com" name="mail" required>
            <br>
            <label for="mobile"><b>Mobile No. : +91</b></label>
            <input type="text" placeholder="10 digit mobile no" name="mobile" required>
            <br>
            <label for="haddress"><b>Address :</b></label>
            <input type="text" placeholder="Full Address" name="haddress" required style="width: 80%;">
            <br>
            <div class="row">
                <div class="col-md-4 col-12">
                    <label for="city"><b>City :</b></label>
                    <input type="text" placeholder="City" name="city" required>
                </div>
                <div class="col-md-4 col-12">
                    <label for="hstate"><b>State :</b></label>
                    <input type="text" placeholder="State" name="hstate" required>
                </div>
                <div class="col-md-4 col-12">
                    <label for="pincode"><b>Pincode :</b></label>
                    <input type="number" placeholder="Pincode" name="pincode" required>
                </div>
            </div>
            <br>

        </div>

        <div class="submit-btn">
            <button type="submit" name="submitBtn" class="btn btn-primary">Register</button>
        </div>
    </form>
</div> -->

<div class="container" style="margin-top:2%;">
    <?php if (isset($success)) : ?>
        <div class="alert-success fade-out-5"><?= $success; ?></div>
    <?php endif; ?> 
    <?php if (isset($message)) : ?>
        <div class="alert-danger fade-out-5"><?= $message; ?></div>
    <?php endif; ?>
    <h1 style="text-align:center" class="mC">Enter Employee Details</h1>
    <hr>
    <form method="post" role="form" action="">
        <div class="container details">
            <br>
            <div class="row">
                <div class="form-group col-md-6 col-12">
                    <label for="uname"><b>Username </b></label>
                    <input type="text" class="form-control" placeholder="Enter username*" name="uname" required>
                </div>
                <div class="form-group col-md-6 col-12">
                    <label for="psw"><b>Password </b></label>
                    <input type="password" class="form-control" placeholder="password" name="psw" required>
                </div>
            </div>
            <br>
            <div class="row">
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
                <label for="cnic"><b>CNIC</b></label>
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

                <!-- <div class="form-group col-md-4 col-12">
                    <label for="pincode"><b>Pincode </b></label>
                    <input type="number" placeholder="Pincode" class="form-control" name="pincode" required>
                </div> -->
            </div>
            <br>
            <div class="row">
                <div class="col-md-6 col-12">
                    <label for="dob"><b>Enter Date of Birth </b></label>
                    <input type="date" placeholder="mm/dd/yyyy" class="form-control" name="dob" required>
                </div>
            </div>
            <div class="form-group col-md-4 col-12">
                        <label for="pincode"><b>Pincode </b></label>
                        <input type="number" placeholder="Pincode" class="form-control" name="pincode" required>
                    </div>
                    <div class="row mx-1">
          <div class="form-group col-md-12 col-12  px-2">
            <label for="Location"><b>Location</b></label>
            <select id="Location" type="dropdown" name="location">
              <option value="" selected disabled>Select Location</option>
              <?php
              if (isset($locations)) {
                $i = 1;
                foreach ($locations as $l) : ?>
                  <option value="<?php echo $l['shortname'] ?>"> <?php echo $i . "\t\t " . $l['name']; ?>
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
                <button type="submit" name="add_empl" class="btn text-white fs-5 mB hBtn">Register</button>

            </div>

        </div>
        <!-- <div class="vertical-center pt-5">
         </div> -->
    </form>

</div>

</div>
</div>
<?php
include 'layout/footer1.php'
?>