<?php
require_once 'DBConnect.php';
$db = new DBConnect();
session_start();

// echo $_SESSION['emp'];
$employeeDetails = $db->getEmployeeDetails($_SESSION['emp']);
$loc = $employeeDetails[0]['location'];
$users = $db->allschedule($loc);
$centerName = $db->getCenterName($loc);
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
          <a class="nav-link" href="register.php">Register a Person</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="details-1.php">Get Vaccination Report</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./actions.php">Actions</a>
        </li>

        <li class="nav-item">
          <a class="nav-link active" href="schedule_detail.php">Scheduled</a>
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
                    <a class="nav-link" href="vaccination_location.php">Vaccination & Locations</a>
                </li>

        <li class="nav-item">
          <a class="nav-link" href="logout.php">Log Out</a>
        </li>

      </ul>
    </div>
  </div>
</nav>
<div class="container" style="height:100%;">
  <div class="container" style="margin-top:5%;">
    <h1 style="text-align:center">Scheduled Vaccination Details</h1>
    <h3 style="text-align:center"><?php echo $centerName[0]['name'] ?></h3>

    <hr>

  </div>
  <div class="container">
    <div class="row">

      <div class="col-md-12" style="overflow-x:auto;">

        <table class="table table-condensed">
          <thead>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>CNIC</th>
            <th>DOB</th>
            <th>Gender</th>
            <th>Mobile</th>
            <th>Address</th>
            <th>City</th>
            <th>State</th>
            <th>Date of Schedule</th>


          </thead>
          <?php foreach ($users as $u) : ?>
            <tr>
              <td>COE<?= $u['ID']; ?></td>
              <td><?= $u['fname'] . " " . $u['mname'] . " " . $u['lname']; ?></td>
              <td><?= $u['email']; ?></td>

              <td><?= $u['sex']; ?></td>
              <td><?= $u['email']; ?></td>
              <td><?= $u['cnic']; ?></td>
              <td><?= $u['dob']; ?></td>

              <td><?= wordwrap($u['haddress'], 26, '<br>'); ?></td>
              <td><?= $u['city']; ?></td>
              <td><?= $u['hstate']; ?></td>
              <td><?= $u['dov']; ?></td>

            </tr>
          <?php endforeach; ?>

        </table>

      </div>

    </div>
  </div>
</div>

<?php
include 'layout/footer3.php'
?>