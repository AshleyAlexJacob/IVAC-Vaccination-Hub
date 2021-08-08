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
    $location = $_POST['location'];


    require_once 'DBConnect.php';
    $db = new DBConnect();
    $flag = $db->registerUser($fname, $mname, $lname, $sex, $mail, $mobile, $haddress, $city, $hstate, $pincode, $dob, $dov, $bg, $cnic, $location);

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


<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <img class="img-fluid" src="assets/FreeVaccineLogo.png" width="80px">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                <!-- <li class="nav-item">
                    <a class="nav-link active" href="details.php">Register a Person</a>
                </li> -->
                <!-- <li class="nav-item">
                    <a class="nav-link" href="details-1.php">Get Vaccination Report</a>
                </li>
                <li class="nav-item"> -->
                <!-- <a class="nav-link" href="logout.php">Log Out</a>
                </li> -->

            </ul>
        </div>
    </div>
</nav>



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
            <div class="row mx-1">
                <div class="form-group col-md-12 col-12  px-2">
                    <label for="Location"><b>Location</b></label>
                    <select id="Location" type="dropdown" name="location">
                        <option value="JB-Abt">Jallal Baba Auditorium,Abottabad</option>
                        <option value="NH-Pesh">Nishtar Hall,Peshawar</option>
                        <option value="KTH-Pesh">Khyber Teaching Hospital,Peshawar</option>
                        <option value="LRH-Pesh">Lady Reading Hospital,Peshawar</option>
                    </select>

                </div>
            </div>
        </div>
        </div>
        <div class="submit-btn">
            <button type="submit" name="submitBtn" class="btn btn-dark">Register</button>
        </div>
    </form>

</div>

</div>
</div>

<?php
include 'layout/footer1.php'
?>