<?php
require_once "DBConnect.php";
include 'login.php';
$message = NULL;
if (isset($_POST['SubmitBtn'])) {
    $cnic = $_POST['cnic'];
    $dob = $_POST['dob'];

    $report = $db->getDetails($cnic, $dob);
    if ($report) {
    } else {

        echo '<script>alert("No record found!")</script>';
    }
}
$title = "Report";
include 'layout/header1.php'
?>

<style>
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
        padding-left: 40vw;

    }
</style>

<nav class="navbar navbar-expand-lg navbar-dark mB">
    <div class="container-fluid">
        <img class="img-fluid " src="assets/IVAC logo.png" width="80px">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="index.php">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" href="details.php">Get Vaccination Report</a>
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


<div class="container" style="margin-top:5%;">
    <h1 style="text-align:center" class="mC">Enter Your Details</h1>
    <hr>
    <?php if (isset($message)) : ?>
        <div class="alert-danger"><?= $message; ?></div>
    <?php endif; ?>
    <form role="form" method="post" action="details.php">
        <div class="container details row">

            <div class="col-lg-6 col-sm-12">
                <label for="mobile"><b>CNIC</b></label>
                <input type="text" class="form-control" placeholder="17301*********" name="cnic" required>
            </div>
            <div class="col-lg-6 col-sm-12">
                <label for="dob"><b>Enter Date of Birth </b></label>

                <input type="date" class="form-control" placeholder="mm/dd/yyyy" name="dob" required>
            </div>
        </div>
        <div class="row justify-content-center pt-5">
            <div class="col-md-1">
                <button type="submit" name="SubmitBtn" class="btn text-white fs-5 mB hBtn">Submit</button>

            </div>

        </div>


    </form>
</div>

<!-- if result has been fetched succesffully -->
<?php if (isset($report)) : ?>
    <div class="container" style="margin-top:5% ;overflow-x:auto;">
        <table class="table table-condensed">
            <tr style="background-color:#D3D3D3">
                <th>ID</th>
                <th>Name</th>
                <th>Gender</th>
                <th>CNIC</th>
                <th>Center</th>
                <th>Date of Schedule</th>
                <th>Status</th>
                <th>Vaccine</th>



            <tr>
                <?php foreach ($report as $d) : ?>
            <tr class="<?php

                        ?>">

                <td>COV<?= $d['ID']; ?></td>
                <td><a href="reports.php?id=<?= $d['ID']; ?>"><?= $d['fname'] . " " . $d['mname'] . " " . $d['lname']; ?></a></td>
                <td><?= $d['sex']; ?></td>
                <td><?= $d['cnic']; ?></td>
                <td><?= $d['center_id']; ?></td>
                <td><?= $d['dov']; ?></td>
                <td><?= $d['status']; ?></td>
                <td><?php
                    if ($d['doneDoses'] != null)
                        echo $d['v_id'];

                    ?></td>

            </tr>

        <?php endforeach; ?>
        </table>
    </div>
<?php endif; ?>

<?php include 'loginmodel.php' ?>

<?php

include 'layout/footer2.php'
?>