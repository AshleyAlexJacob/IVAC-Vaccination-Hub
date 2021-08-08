<?php
class DBConnect
{
    private $db = NULL;

    const DB_SERVER = "localhost";
    const DB_USER = "root";
    const DB_PASSWORD = "";
    const DB_NAME = "database";

    public function __construct()
    {
        $dsn = 'mysql:dbname=' . self::DB_NAME . ';host=' . self::DB_SERVER;
        try {
            $this->db = new PDO($dsn, self::DB_USER, self::DB_PASSWORD);
        } catch (PDOException $e) {
            throw new Exception('Connection failed: ' .
                $e->getMessage());
        }
        return $this->db;
    }
    // public function auth()
    // {
    //     session_start();
    //     if (!isset($_SESSION['username'])) {
    //         header("Location: index.php");
    //     }
    // }
    public function authLogin()
    {
        session_start();
        if (isset($_SESSION['username'])) {
            header("Location: employee.php");
        }
    }

    // public function checkAuth()
    // {
    //     session_start();
    //     if (!isset($_SESSION['username'])) {
    //         return false;
    //     } else {
    //         return true;
    //     }
    // }
    public function adminlogin($username, $password)
    {
        $stmt = $this->db->prepare("SELECT * FROM admin WHERE username=? AND password=?");
        $stmt->execute([$username, $password]);
        if ($stmt->rowCount() > 0) {
            session_start();
            $emp = $stmt->fetchAll();
            foreach ($emp as $e) {
                $_SESSION['id'] = $e['ID'];
                $_SESSION['username'] = $username;
                $_SESSION['password'] = $password;
            }

            return true;
        } else {
            return false;
        }
    }
    public function employeelogin($username, $password)
    {
        $stmt = $this->db->prepare("SELECT * FROM employeedetails WHERE uname=? AND psw=?");
        $stmt->execute([$username, $password]);
        if ($stmt->rowCount() > 0) {
            session_start();
            $emp = $stmt->fetchAll();
            $_SESSION['emp'] = $username;
            foreach ($emp as $e) {
                $_SESSION['uname'] = $username;
                $_SESSION['psw'] = $password;
            }

            return true;
        } else {
            return false;
        }
    }

    public function addEmployee($uname, $psw, $fname, $mname, $lname, $sex, $mail, $mobile, $haddress, $city, $hstate, $pincode,$cnic,$loc)
    {
        $stmt = $this->db->prepare("INSERT INTO employeedetails (uname,psw,fname,mname,lname,sex,email,mobile,haddress,city,hstate,pincode,cnic,location)"
            . "VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $stmt->execute([$uname, $psw, $fname, $mname, $lname, $sex, $mail, $mobile, $haddress, $city, $hstate, $pincode,$cnic,$loc]);
        return true;
    }

    public function addreport($fname, $mname, $lname, $sex, $mail, $mobile, $haddress, $city, $hstate, $pincode, $dob, $dov, $bg)
    {
        $stmt = $this->db->prepare("INSERT INTO register (fname,mname,lname,sex,email,mobile,haddress,city,hstate,pincode,dob,dov,bg)"
            . "VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $stmt->execute([$fname, $mname, $lname, $sex, $mail, $mobile, $haddress, $city, $hstate, $pincode, $dob, $dov, $bg]);
        return true;
    }
    public function registerUser($fname, $mname, $lname, $sex, $mail, $mobile, $haddress, $city, $hstate, $pincode, $dob, $dov, $bg, $cnic, $location)
    {
        $stmt = $this->db->prepare("INSERT INTO register (fname,mname,lname,sex,email,mobile,haddress,city,hstate,pincode,dob,dov,bg,cnic,location)"
            . "VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $stmt->execute([$fname, $mname, $lname, $sex, $mail, $mobile, $haddress, $city, $hstate, $pincode, $dob, $dov, $bg, $cnic, $location]);
        return true;
    }

    public function reportdeatils($mobile, $dob)
    {
        $stmt = $this->db->prepare("SELECT * FROM register WHERE mobile=? AND dob=?");
        $stmt->execute([$mobile, $dob]);
        return $stmt->fetchAll();
    }

    public function getDetails($cnic, $dob)
    {
        //  $stmt = $this->db->prepare("SELECT * FROM register WHERE cnic=? AND dob=?");
        $stmt = $this->db->prepare(" select *,location.name from register,location where location.shortname = register.location AND cnic=? AND dob=?");

        $stmt->execute([$cnic, $dob]);
        return $stmt->fetchAll();
    }


    public function all_register()
    {
        $stmt = $this->db->prepare("SELECT * FROM register WHERE status='scheduled' ");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function allschedule($location)
    {
        $stmt = $this->db->prepare("select * from register where register.location= ? AND status = 'scheduled'");
        $stmt->execute([$location]);
        return $stmt->fetchAll();
    }
    public function allVaccinated($location)
    {
        $stmt = $this->db->prepare("select * from register where register.location= ? AND status = 'vacinated'");
        $stmt->execute([$location]);
        return $stmt->fetchAll();
    }
    public function allRejected($location)
    {
        $stmt = $this->db->prepare("select * from register where register.location= ? AND status = 'rejected'");
        $stmt->execute([$location]);
        return $stmt->fetchAll();
    }
    public function allPVacinated($location)
    {
        $stmt = $this->db->prepare("select * from register where register.location= ? AND status = 'p-vacinated'");
        $stmt->execute([$location]);
        return $stmt->fetchAll();
    }

    public function getEmployeeDetails($uname)
    {
        $stmt = $this->db->prepare("select * from employeedetails where uname=?");
        $stmt->execute([$uname]);
        return $stmt->fetchAll();
    }
    public function vaccinate($vaccine, $totalDoses, $doneDoses, $cnic, $dob, $loc)
    {
        if ($doneDoses == $totalDoses) {
            $stmt = $this->db->prepare("update register set vaccine=?,doses=?,doneDoses=?,status='vacinated',location=? where cnic=? AND dob=? AND status='p-vacinated'");
            // Error Handling required
            $stmt->execute([$vaccine, $totalDoses, $doneDoses, $loc, $cnic, $dob]);
            return true;
        } else {
            $stmt = $this->db->prepare("update register set vaccine=?,doses=?,doneDoses=?,status='p-vacinated',location=? where cnic=? AND dob=? AND status='scheduled'");
            $stmt->execute([$vaccine, $totalDoses, $doneDoses, $loc, $cnic, $dob]);
            return true;
        }
    }
    public function reject($cnic, $dob, $loc)
    {
        $stmt = $this->db->prepare("update register set status='rejected',vaccine=null, doses=null,doneDoses=null,location=? where cnic=? AND dob=?");
        // Error Handling required
        $stmt->execute([$loc, $cnic, $dob]);
        return true;
    }
    public function getVaccineList()
    {
        $stmt = $this->db->prepare("select * from vaccine");
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function getLocationsList()
    {
        $stmt = $this->db->prepare("select * from location");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getCenterName($loc)
    {
        $stmt = $this->db->prepare("select location.name from location where shortname =?");
        $stmt->execute([$loc]);
        return $stmt->fetchAll();
    }

    public function rejected()
    {
        $stmt = $this->db->prepare("SELECT * FROM register WHERE status='rejected' ");
        $stmt->execute();
        return $stmt->fetchAll();
    }


    public function perform($code, $option)
    {
        $stmt = $this->db->prepare("UPDATE register SET status=$option WHERE id=$code");
        $stmt->execute();
        return $stmt->fetchAll();
    }



    public function vaccinated()
    {
        $stmt = $this->db->prepare("SELECT * FROM register WHERE status='vaccinated' ");
        $stmt->execute();
        return $stmt->fetchAll();
    }


    public function getReportById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM register WHERE ID=?");
        $stmt->execute([$id]);
        return $stmt->fetchAll();
    }
    public function getEmployees()
    {
        $stmt = $this->db->prepare("SELECT * FROM employeedetails");
        $stmt->execute();
        return $stmt->fetchAll();
    }


    public function add_location($location,$short_name)
    {
        $stmt = $this->db->prepare("INSERT INTO location (`name`, `shortname`)"
            . "VALUES (?,?)");
        $stmt->execute([$location,$short_name]);
        return true;
    }

    public function add_vaccine($vName,$doeses)
    {
        $stmt = $this->db->prepare("INSERT INTO vaccine (`vName`, `doses`)"
            . "VALUES (?,?)");
        $stmt->execute([$vName,$doeses]);
        return true;
    }

    public function remove_vaccine($id)
    {
        $stmt = $this->db->prepare("DELETE FROM vaccine WHERE id=$id");
        $stmt->execute();
        return true;
    }

    public function remove_location($id)
    {
        $stmt = $this->db->prepare("DELETE FROM location WHERE id=$id");
        $stmt->execute();
        return true;
    }

    public function remove_employee($id)
    {
        $stmt = $this->db->prepare("DELETE FROM employeedetails WHERE ID=$id");
        $stmt->execute();
        return true;
    }
}
