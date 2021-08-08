<?php
$id = $_GET['id']; // primary key for the donor in the database

require_once 'DBConnect.php';
include 'login.php';
// Search by Id
$flag = $db->getReportById($id);

$title = "Report";
include 'layout/header1.php';



?>


<nav class="navbar navbar-expand-lg navbar-dark mB">
    <div class="container-fluid">
      <img class="img-fluid " src="./assets/IVAC logo.png" width="80px">
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

<div class="container" style="margin-bottom:50px">
    <div class="container report-box" id="printableArea" style="margin-top:5%; border: 1px solid transparent; padding: 20px; border-radius: 10px; box-shadow:0px 1px 10px rgba(0,0,0,.5)">
        <img class="img-fluid" src="assets/FreeVaccineLogo.png" width="80px">
        <h4 style="text-align:center">Vaccination Report</h4>
        <hr>
        <div class="container">
            <table class="table table-condensed">
                <tr>
                    <td><label><b>ID :</b></label></td>
                    <td>COV<?= $flag[0]['ID']; ?></td>
                </tr>
                <tr>
                    <td><label><b>Name :</b></label></td>
                    <td><?= $flag[0]['fname'] . " " . $flag[0]['mname'] . " " . $flag[0]['lname']; ?></td>
                </tr>
                <tr>
                    <td><label><b>Gender :</b></label></td>
                    <td><?= $flag[0]['sex']; ?></td>
                </tr>
                <tr>
                    <td><label><b>Email :</b></label></td>
                    <td><?= $flag[0]['email']; ?></td>
                </tr>
                <tr>
                    <td><label><b>Mobile :</b></label></td>
                    <td><?= $flag[0]['mobile']; ?></td>
                </tr>
                <tr>
                    <td><label><b>D.O.B :</b></label></td>
                    <td><?= $flag[0]['dob']; ?></td>
                </tr>
                <tr>
                    <td><label><b>Vaccination Date :</b></label></td>
                    <td><?= $flag[0]['dov']; ?></td>
                </tr>
                <tr>
                    <td><label><b>Blood Group :</b></label></td>
                    <td><?= $flag[0]['bg']; ?></td>
                </tr>

                <tr>
                    <td><label><b>Address :</b></label></td>
                    <td><?= $flag[0]['haddress']; ?></td>
                </tr>
                <tr>
                    <td><label><b>City :</b></label></td>
                    <td><?= $flag[0]['city']; ?></td>
                </tr>
                <tr>
                    <td><label><b>State :</b></label></td>
                    <td><?= $flag[0]['hstate']; ?></td>
                </tr>
                <tr>
                    <td><label><b>Pincode :</b></label></td>
                    <td><?= $flag[0]['pincode']; ?></td>
                </tr>

                <tr>
                    <td><label><b>Vaccine :</b></label></td>
                    <td><?php
                    if ($flag[0]['vaccine'] != null)
                        echo $flag[0]['vaccine'];
                        else
                        echo "No Vaccine Assigned";
                    ?></td>



                </tr>
                <tr>
                    <td><label><b>DoneDoses :</b></label></td>
                
                    <td><?php
                    if ($flag[0]['doneDoses'] != null)
                        echo $flag[0]['doneDoses'];
                        else
                        echo "No Vaccine Assigned";
                    ?></td>

                
                </tr>
                <tr>
                    <td><label><b>Total Doses :</b></label></td>
                
                    <td><?php
                    if ($flag[0]['doses'] != null)
                        echo $flag[0]['doses'];
                        else
                        echo "No Vaccine Assigned";
                    ?></td>

                </tr>


            </table>
        </div>
    </div>
    <div class="container" style="width:100%; margin-top: 15px">
        <input type="button" class="btn mB hBtn tc" style="float:right; padding: 5px 40px; font-size:1.2em" onclick="printDiv('printableArea')" value="Print" />
    </div>
</div>


<script>
    function printDiv(printableArea) {
        var printContents = document.getElementById(printableArea).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }
</script>

<?php include 'loginmodel.php' ?>


<?php
include 'layout/footer1.php'
?>