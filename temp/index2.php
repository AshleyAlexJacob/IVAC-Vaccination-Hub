<?php

// Include config file
require_once "DBConnect.php";
include 'login.php';
?>


<?php
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


    $db = new DBConnect();
    $flag = $db->registerUser($fname, $mname, $lname, $sex, $mail, $mobile, $haddress, $city, $hstate, $pincode, $dob, $dov, $bg, $cnic);

    if ($flag) {
        $success = "The Report has been successfully added to the database!";
    } else {
        $message = "There was some error saving the user to the database!";
    }
}
// Employee Ke Game
$title = "Employee";
$setEmployeeActive = "active";
include 'layout/header1.php';

?>
<style>
    #intro {
        background-image: url(./assets/back.jpg);
        height: 100vh;
    }

    #content {
        height: 50vh;
    }

    #primary {
        background-color: #02AEAE;
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
</style>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark mB">
        <div class="container px-5 mx-5">
            <img class="img-fluid " src="assets/FreeVaccineLogo.png" width="80px">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>

                    <!--     // user side register
       -->
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
                    <div class="badge text-wrap py-3 px-3 fs-6 mat" id="primary">
                        Hello we are
                        <!-- <h3>Hello I am</h3> -->
                    </div>
                    <div class="fs-1 fw-bold mt-5 mC">IVAC</div>
                    <div class="fs-6  mt-1">A Vaccination Management System Designed to Meet your Needs</div>

                </div>
            </div>
            <div class="row justify-content-start mt-4 mx-3">
                <div class="col ">
                    <!-- <button class="btn text-white fs-5" id="primary">Get Report</button> -->
                    <button class="btn btn-outline-dark fs-5">Get Report</button>
                    <div class="fs-6  mt-1">Or register Below</div>

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
            <h1 style="text-align:center">Register for Vaccine</h1>
            <hr>
            <form method="post" role="form" action="register.php">
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
                        <div class="form-group col-md-4 col-12">
                            <label for="city"><b>City </b></label>
                            <input type="city" placeholder="City" class="form-control" name="city" required>
                        </div>

                        <div class="form-group col-md-4 col-12">
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
                <!-- <div class="submit-btn">
            <button type="submit" name="submitBtn" class="btn mB">Register</button>
        </div> -->
                <!-- <div class="submit-btn mB"> -->
                <div class="vertical-center pt-5">
                    <button type="submit" name="submitBtn" class="btn text-white fs-5 mB hBtn">Register</button>
                </div>
                <!-- </div> -->
            </form>

        </div>

    </div>
</body>

<!-- </div> -->
<!-- </div> -->

<?php
include 'layout/footer1.php'
?>