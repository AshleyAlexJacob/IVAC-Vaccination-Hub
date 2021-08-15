<?php
require_once 'DBConnect.php';
$db = new DBConnect();
session_start();

$vaccines_list = $db->getVaccineList();


$locations_list = $db->getcentersList();



if (isset($_POST['add_vaccine_btn'])) {
  $Vname = $_POST['vName'];
  $doses = $_POST['doses'];



  $flag = $db->add_vaccine($Vname, $doses);

  if ($flag) {
      echo "Successfully Added!";
      header("Refresh:0");
  } else {
    echo "There was some error !";
  }



}


if (isset($_POST['delete'])) {
  $id = $_POST['id_catch'];
 


  $flag = $db->remove_vaccine($id);
  if ($flag) {
      echo "Successfully deleted!";
      header("Refresh:0");
  } else {
    echo "There was some error !";
  }



}


if (isset($_POST['delete_loc'])) {
  $id = $_POST['id_loc'];
 


  $flag = $db->remove_center($id);
  if ($flag) {
      echo "Successfully deleted!";
      header("Refresh:0");
  } else {
    echo "There was some error !";
  }



}




if (isset($_POST['add_location_btn'])) {
  $name = $_POST['name'];
  $shortname = $_POST['shortname'];



  $flag = $db->add_center($name, $shortname);

  if ($flag) {
      echo "Successfully Added!";
      header("Refresh:0");
  } else {
    echo "There was some error !";
  }



}








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
                    <a class="nav-link" href="employee.php">Employee Registration</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="employeedetail.php">Employee Details</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="vaccination_location.php">Vaccination & Locations</a>
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
    <h1 style="text-align:center">Vaccines</h1>
    <!-- <h3 style="text-align:center"><?php echo $centerName[0]['name'] ?></h3> -->

    <hr>
    <form method="post" role="form" action="">

    <div class="row  justify-content-center">
                    <div class="form-group col-md-4 col-12">
                        <label for="fname"><b>Vaccine Name</b></label>
                        <input type="text" class="form-control" placeholder="Vaccine Name*" name="vName" required>
                    </div>

                    <div class="form-group col-md-4 col-12">
                        <label for="mname"><b>Total Doses</b></label>
                        <input type="text" class="form-control" placeholder="Total Doses*" name="doses" required>
                    </div>
                <div class="col-md-2">
                    <button type="submit" name="add_vaccine_btn" class="btn text-white fs-5 mB hBtn">Add</button>
            </div>


  </div>

    </form>
  <div class="container">
    <div class="row">

      <div class="col-md-12" style="overflow-x:auto;">

        <table class="table table-condensed">
          <thead>
            <th>ID</th>
            <th>Vaccine Name</th>
            <th>No of Doses</th>
          </thead>
          <?php foreach ($vaccines_list as $u) : ?>
            <tr>
              <td>COE<?= $u['v_id']; ?></td>
              <td><?= $u['vName']; ?></td>

              <td><?= $u['doses']; ?></td>
<td>

<form name="form1"  method="post">
<button type="submit" name="delete" class="btn text-white fs-10 del hBtn" value="">Rem</button>
<input type="hidden" name="id_catch" value="<?php echo $u['v_id']; ?>"/>

</form>

</td>

            </tr>
          <?php endforeach; ?>

        </table>

      </div>

    </div>
  </div>
</div>













<div class="container" style="height:100%;">
  <div class="container" style="margin-top:5%;">
    <h1 style="text-align:center">Locations</h1>
    <!-- <h3 style="text-align:center"><?php echo $centerName[0]['name'] ?></h3> -->

    <hr>
    <form method="post" role="form" action="">

<div class="row  justify-content-center">
                <div class="form-group col-md-4 col-12">
                    <label for="fname"><b>Location Name</b></label>
                    <input type="text" class="form-control" placeholder="Location*" name="name" required>
                </div>
 
                <div class="form-group col-md-4 col-12">
                    <label for="mname"><b>Short Name</b></label>
                    <input type="text" class="form-control" placeholder="Short Name for Location*" name="shortname" required>
                </div>
            <div class="col-md-2">
                <button type="submit" name="add_location_btn" class="btn text-white fs-5 mB hBtn">Add</button> 
        </div>


</div>

</form>
  </div>
  <div class="container">
    <div class="row">

      <div class="col-md-12" style="overflow-x:auto;">

        <table class="table table-condensed">
          <thead>
            <th>ID</th>
            <th>Location Name</th>
            <th>Short Name</th>
          </thead>
          <?php foreach ($locations_list as $u) : ?>
            <tr>
              <td>COE<?= $u['center_id']; ?></td>
              <td><?= $u['name']; ?></td>

              <td><?= $u['shortname']; ?></td>
              <td>

<form name="form1"  method="post">
<button type="submit" name="delete_loc" class="btn text-white fs-10 del hBtn" value="">Rem</button>
<input type="hidden" name="id_loc" value="<?php echo $u['center_id']; ?>"/>

</form>

</td>

          
            </tr>
          <?php endforeach; ?>

        </table>

      </div>

    </div>
  </div>
</div>






<?php
// include 'layout/footer3.php'
?>