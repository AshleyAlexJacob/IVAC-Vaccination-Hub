<?php
require_once 'DBConnect.php';
$db = new DBConnect();
$users = $db->getEmployees();



if (isset($_POST['delete_emp'])) {
    $id = $_POST['id_emp'];
   
  
  
    $flag = $db->remove_employee($id);
    if ($flag) {
        echo "Successfully deleted!";
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
                    <a class="nav-link active" href="employeedetail.php">Employee Details</a>
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
        <h1 style="text-align:center" class="mC">Employee Details</h1>
        <hr>

    </div>
    <div class="container">
        <div class="row">

            <div>

                <table class="table table-condensed">
                    <thead>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Location</th>
                        <th>Username</th>
                        <th>Password</th>

                        <th>Gender</th>
                        <th>Mobile</th>
                        <th>Address</th>
                        <th>City</th>
                        <th>State</th>
                        <th>Pincode</th>
                        <th>CNIC</th>

                    </thead>
                    <?php foreach ($users as $u) : ?>
                        <tr>
                            <td>COE<?= $u['para_id']; ?></td>
                            <td><?= $u['fname'] . " " . $u['mname'] . " " . $u['lname']; ?></td>
                            <td><?= $u['email']; ?></td>
                            <td><?= $u['center_id']; ?></td>
                            <td><?= $u['uname']; ?></td>
                            <td><?= $u['psw']; ?></td>

                            <td><?= $u['sex']; ?></td>
                            <td><?= $u['mobile']; ?></td>
                            <td><?= wordwrap($u['haddress'], 26, '<br>'); ?></td>
                            <td><?= $u['city']; ?></td>
                            <td><?= $u['hstate']; ?></td>
                            <td><?= $u['pincode']; ?></td>
                            <td><?= $u['cnic']; ?></td>
                            <td>

<form name="form1"  method="post">
<button type="submit" name="delete_emp" class="btn text-white fs-10 del hBtn" value="">Rem</button>
<input type="hidden" name="id_emp" value="<?php echo $u['para_id']; ?>"/>

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
include 'layout/footer3.php'
?>