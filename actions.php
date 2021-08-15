<?php

// Include config file
require_once "DBConnect.php";
include 'login.php';
?>


<?php
$db = new DBConnect();
// Details Logic
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
$vaccineAlert = NULL;
$success = NULL;
$vac = $db->getVaccineList();
if (isset($vac)) {
} else {

    echo '<script>alert("No Vaccine Found")</script>';
}

// Vacination Logic
if (isset($_POST['vacBtn'])) {
    $employeeDetails = $db->getparamedics($_SESSION['emp']);
    $loc = $employeeDetails[0]['center_id'];
    $cnc = $_POST['cnc'];
    $cdob = $_POST['cdob'];
    $vaccine = $_POST['vaccine'];
    $doses = $_POST['doses'];
    $dd = $_POST['doneDoses'];
    $flag = $db->vaccinate($vaccine, $doses, $dd, $cnc, $cdob, $loc);
    if (isset($flag)) {
        $success = "Successfully Vaccinated!";
    } else {
        $vaccineAlert = "There was some error registering to the database!";
    }
}

$rejectAlert = NULL;
$suc = NULL;

//Rejection Logic
if (isset($_POST['rejBtn'])) {

    $employeeDetails = $db->getparamedics($_SESSION['emp']);
    $loc = $employeeDetails[0]['center_id'];
    $nic = $_POST['nic'];
    $dateof = $_POST['dateof'];
    $stat = $db->reject($nic, $dateof, $loc);
    if (isset($stat)) {
        $suc = "Successfully Added to Reject!";
    } else {
        $rejectAlert = "There was some error updating to the database!";
    }
}


$title = "Employee";
$setEmployeeActive = "active";
include 'layout/header1.php';

?>

<style>
    #Location {
        width: 100%;
        padding: 15px;
        padding-right: 5px;
        padding-left: 5px;
        margin: 5px 5px;
        display: inline-block;
        border: 1px solid #cccccc;
        background: white;
        border-radius: 6px;
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
                    <a class="nav-link" href="register.php">Register a Person</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="details-1.php">Get Vaccination Report</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  active" href="./actions.php">Actions</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="schedule_detail.php">Scheduled</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="p-vacinated_detail.php">P-Vacinated</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="vaccinated_detail.php">Vaccinated</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="rejected_detail.php">Rejected</a>
                </li>
        

                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Log Out</a>
                </li>

            </ul>
        </div>
    </div>
</nav>

<div class="container px-5">



    <div class="container" style="margin-top:2%;">
        <h1 style="text-align:center" class="mC">Actions</h1>
        <h3 style="text-align:left">Details</h3>

        <hr>
        <?php if (isset($success)) : ?>
            <div class="alert-success fade-out-5"><?= $success; ?></div>
        <?php endif; ?>

        <?php if (isset($vaccineAlert)) : ?>
            <div class="alert-danger"><?= $vaccineAlert; ?></div>
        <?php endif; ?>

        <?php if (isset($suc)) : ?>
            <div class="alert-success fade-out-5"><?= $suc; ?></div>
        <?php endif; ?>

        <?php if (isset($rejectAlert)) : ?>
            <div class="alert-danger"><?= $rejectAlert; ?></div>
        <?php endif; ?>
        <!-- Details Form -->
        <form role="form" method="post" action="">
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
            <?php
            if (empty($report)) {
                echo '<div class="row justify-content-center pt-5">';
                echo '<div class="col-md-1">';
                echo  ' <button type="submit" name="SubmitBtn" class="btn text-white fs-5 mB hBtn">Submit</button>';

                echo   '</div>';

                echo '</div>';
            }
            ?>
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
                    <th>DOB</th>
                    <th>Center</th>
                    <th>Date of Schedule</th>
                    <th>Status</th>
                    <th>Vaccine</th>
                    <th>Total Doses</th>
                    <th>Done Doses</th>


                <tr>
                    <?php foreach ($report as $d) : ?>
                <tr class="<?php

                            ?>">

                    <td>COV<?= $d['ID']; ?></td>
                    <td><a href="reports.php?id=<?= $d['ID']; ?>"><?= $d['fname'] . " " . $d['mname'] . " " . $d['lname']; ?></a></td>
                    <td><?= $d['sex']; ?></td>
                    <td><?= $d['cnic']; ?></td>
                    <td><?= $d['dob']; ?></td>
                    <td><?= $d['center_id']; ?></td>
                    <td><?= $d['dov']; ?></td>
                    <td><?= $d['status']; ?></td>
                    <td><?= $d['v_id']; ?></td>
                    <td><?= $d['doses']; ?></td>
                    <td><?= $d['doneDoses']; ?></td>


                </tr>
            <?php endforeach; ?>
            </table>
        </div>
    <?php endif; ?>
    <h3 style="text-align:left">Vaccinate</h3>

    <hr>
    <!-- Vacinate From -->
    <form role="form" method="post" action="">
        <div class="container details row">

            <div class="col-lg-6 col-sm-12">
                <label for="mobile"><b>CNIC</b></label>
                <input type="text" class="form-control" placeholder=<?php if (isset($report))
                                                                        echo $report[0]['cnic'];
                                                                    else
                                                                        echo "17301xxxxxx"
                                                                    ?> name="cnc" required>
            </div>
            <div class="col-lg-6 col-sm-12">
                <label for="dob"><b>Enter Date of Birth </b></label>



                <input type="date" class="form-control" placeholder=<?php if (empty($report))
                                                                        echo 'dd/mm/yy';
                                                                    else
                                                                        echo $report[0]['dob'];
                                                                    ?> name="cdob" required>
            </div>
            <br>
            <div class="row mx-1">
                <div class="form-group col-md-12 col-12  px-2">
                    <label for="Location"><b>Vaccine Name</b></label>
                    <select id="Location" type="dropdown" name="vaccine" required>
                        <option value="" selected disabled>Select Vaccine</option>
                        <?php
                        if (isset($vac)) {
                            foreach ($vac as $v) : ?>
                                <option value="<?php echo $v['v_id'] ?>"> <?php echo $v['vName'] . "\t\t (Total Doses: " . $v['doses'].")"; ?>
                                </option>
                        <?php
                            endforeach;
                        }

                        ?>


                    </select>

                </div>
            </div>
            <br>
            <div class="row mx-1">
                <div class="form-group col-md-6 col-12  px-2">
                    <label for="Location"><b>Total Doses</b></label>
                    <select id="Location" type="dropdown" name="doses" required>
                        <option value="" selected disabled>Total Dose</option>
                        <option value="1">1</option>
                        <option value="2">2</option>


                    </select>

                </div>
                <div class="form-group col-md-6 col-12  px-2">
                    <label for="Location"><b>Dose No</b></label>
                    <select id="Location" type="dropdown" name="doneDoses" required>
                        <option value="" selected disabled>Dose No</option>
                        <option value="1">1</option>
                        <option value="2">2</option>


                    </select>

                </div>
            </div>
            <div class="row justify-content-center pt-5">
                <div class="col-md-1">
                    <button type="submit" name="vacBtn" class="btn text-white fs-5 mB hBtn">Vaccinate</button>

                </div>

            </div>

        </div>




    </form>
    <h3 style="text-align:left">Reject</h3>
    <!-- Rejection Form -->
    <hr>
    <form role="form" method="post" action="">
        <div class="container details row">

            <div class="col-lg-6 col-sm-12">
                <label for="mobile"><b>CNIC</b></label>
                <input type="text" class="form-control" placeholder=<?php if (isset($report))
                                                                        echo $report[0]['cnic'];
                                                                    else
                                                                        echo "17301xxxxxx"
                                                                    ?> name="nic" required>
            </div>
            <div class="col-lg-6 col-sm-12">
                <label for="dob"><b>Enter Date of Birth </b></label>



                <input type="date" class="form-control" placeholder=<?php if (empty($report))
                                                                        echo 'dd/mm/yy';
                                                                    else
                                                                        echo $report[0]['dob'];
                                                                    ?> name="dateof" required>
            </div>
            <div class="row justify-content-center pt-5 px-2">
                <div class="col-md-1">
                    <button type="submit" name="rejBtn" class="btn text-white fs-5 mB hBtn">Reject</button>

                </div>

            </div>

        </div>

    </form>

</div>
</div>
</div>

<?php
include 'layout/footer1.php'
?>