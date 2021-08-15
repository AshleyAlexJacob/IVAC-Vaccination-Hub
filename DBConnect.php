<?php
class DBConnect
{
    private $db = NULL;

    const DB_SERVER = "localhost";
    const DB_USER = "root";
    const DB_PASSWORD = "";
    const DB_NAME = "database2";

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
    //         header("center: index.php");
    //     }
    // }
    public function authLogin()
    {
        session_start();
        if (isset($_SESSION['username'])) {
            header("center: employee.php");
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
        $stmt = $this->db->prepare("SELECT * FROM paramedics WHERE uname=? AND psw=?");
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



    public function addEmployee($uname, $psw, $fname, $mname, $lname, $sex, $mail, $mobile, $haddress, $city, $hstate, $pincode, $cnic, $loc)
    {
        $stmt = $this->db->prepare("INSERT INTO paramedics (uname,psw,fname,mname,lname,sex,email,mobile,haddress,city,hstate,pincode,cnic,center)"
            . "VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $stmt->execute([$uname, $psw, $fname, $mname, $lname, $sex, $mail, $mobile, $haddress, $city, $hstate, $pincode, $cnic, $loc]);
        return true;
    }

    public function addreport($fname, $mname, $lname, $sex, $mail, $mobile, $haddress, $city, $hstate, $pincode, $dob, $dov, $bg)
    {
        $stmt = $this->db->prepare("INSERT INTO person (fname,mname,lname,sex,email,mobile,haddress,city,hstate,pincode,dob,dov,bg)"
            . "VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $stmt->execute([$fname, $mname, $lname, $sex, $mail, $mobile, $haddress, $city, $hstate, $pincode, $dob, $dov, $bg]);
        return true;
    }
    public function personUser($fname, $mname, $lname, $sex, $mail, $mobile, $haddress, $city, $hstate, $pincode, $dob, $dov, $bg, $cnic, $center)
    {
        $stmt = $this->db->prepare("INSERT INTO person (fname,mname,lname,sex,email,mobile,haddress,city,hstate,pincode,dob,dov,bg,cnic,center_id)"
            . "VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $stmt->execute([$fname, $mname, $lname, $sex, $mail, $mobile, $haddress, $city, $hstate, $pincode, $dob, $dov, $bg, $cnic, $center]);
        return true;
    }

    public function reportdeatils($mobile, $dob)
    {
        $stmt = $this->db->prepare("SELECT * FROM person WHERE mobile=? AND dob=?");
        $stmt->execute([$mobile, $dob]);
        return $stmt->fetchAll();
    }





    public function getDetails($cnic, $dob)
    {
        $stmt = $this->db->prepare("SELECT * FROM person WHERE cnic=? AND dob=?");


        // $stmt = $this->db->prepare("select *, center.name as location  from person INNER JOIN center on person.center_id=? and center.center_id=? where person.status='scheduled';'");


        // $stmt = $this->db->prepare("select *, from person INNER JOIN center on AND cnic=? AND dob=?");

        $stmt->execute([$cnic, $dob]);
        return $stmt->fetchAll();
    }


    public function all_person()
    {
        $stmt = $this->db->prepare("SELECT * FROM person WHERE status='scheduled' ");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // public function allschedule($center)
    // {
    //     $stmt = $this->db->prepare("select *, center.name as location  from person INNER JOIN center on person.center_id=? and center.center_id=? where person.status='scheduled';'");
    //     $stmt->execute([$center,$center]);
    //     return $stmt->fetchAll();
    // }
    public function allschedule($center)
    {

        $stmt = $this->db->prepare("call scheduledPerson(?)");
        $stmt->execute([$center]);
        return $stmt->fetchAll();
    }
    // public function allVaccinated($center)
    // {
    //     $stmt = $this->db->prepare("select *, center.name as location  from person INNER JOIN center on person.center_id=? and center.center_id=? where person.status='vacinated';'");
    //     $stmt->execute([$center,$center]);
    //     return $stmt->fetchAll();
    // } 


    public function allVaccinated($center)
    {

        $stmt = $this->db->prepare("call vacinatedPerson(?)");
        $stmt->execute([$center]);
        return $stmt->fetchAll();
    }
    // public function allRejected($center)
    // {
    //     $stmt = $this->db->prepare("select *, center.name as location  from person INNER JOIN center on person.center_id=? and center.center_id=? where person.status='rejected';'");
    //     $stmt->execute([$center,$center]);
    //     return $stmt->fetchAll();
    // }

    public function allRejected($center)
    {

        $stmt = $this->db->prepare("call rejectedPerson(?)");
        $stmt->execute([$center]);
        return $stmt->fetchAll();
    }




    // public function allPVacinated($center)
    // {
    //     $stmt = $this->db->prepare("select *, center.name as location  from person INNER JOIN center on person.center_id=? and center.center_id=? where person.status='p-vacinated';'");
    //     $stmt->execute([$center,$center]);
    //     return $stmt->fetchAll();
    // }
    public function allPVacinated_procedure($center)
    {

        $stmt = $this->db->prepare("call pVacinatedPerson(?)");
        $stmt->execute([$center]);
        return $stmt->fetchAll();
    }
    public function getparamedics($uname)
    {
        $stmt = $this->db->prepare("select * from paramedics where uname=?");
        $stmt->execute([$uname]);
        return $stmt->fetchAll();
    }
    public function vaccinate($vaccine, $totalDoses, $doneDoses, $cnic, $dob, $loc)
    {
        if ($doneDoses == $totalDoses) {
            $stmt = $this->db->prepare("update person set v_id=?,doses=?,doneDoses=?,status='vacinated',center_id=? where cnic=? AND dob=? AND status='p-vacinated'");
            // Error Handling required
            $stmt->execute([$vaccine, $totalDoses, $doneDoses, $loc, $cnic, $dob]);
            return true;
        } else {
            $stmt = $this->db->prepare("update person set v_id=?,doses=?,doneDoses=?,status='p-vacinated',center_id=? where cnic=? AND dob=? AND status='scheduled'");
            $stmt->execute([$vaccine, $totalDoses, $doneDoses, $loc, $cnic, $dob]);
            return true;
        }
    }
    public function reject($cnic, $dob, $loc)
    {
        $stmt = $this->db->prepare("update person set status='rejected',v_id=null, doses=null,doneDoses=null,center_id=? where cnic=? AND dob=?");
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
    public function getcentersList()
    {
        $stmt = $this->db->prepare("select * from center");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getCenterName($loc)
    {
        $stmt = $this->db->prepare("select center.name from center where center_id =?");
        $stmt->execute([$loc]);
        return $stmt->fetchAll();
    }

    public function rejected()
    {
        $stmt = $this->db->prepare("SELECT * FROM person WHERE status='rejected' ");
        $stmt->execute();
        return $stmt->fetchAll();
    }


    public function perform($code, $option)
    {
        $stmt = $this->db->prepare("UPDATE person SET status=$option WHERE id=$code");
        $stmt->execute();
        return $stmt->fetchAll();
    }



    public function vaccinated()
    {
        $stmt = $this->db->prepare("SELECT * FROM person WHERE status='vaccinated' ");
        $stmt->execute();
        return $stmt->fetchAll();
    }


    public function getReportById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM person WHERE ID=?");
        $stmt->execute([$id]);
        return $stmt->fetchAll();
    }
    public function getEmployees()
    {
        $stmt = $this->db->prepare("SELECT * FROM paramedics");
        $stmt->execute();
        return $stmt->fetchAll();
    }


    public function add_center($center, $short_name)
    {
        $stmt = $this->db->prepare("INSERT INTO center (`name`, `shortname`)"
            . "VALUES (?,?)");
        $stmt->execute([$center, $short_name]);
        return true;
    }

    public function add_vaccine($vName, $doeses)
    {
        $stmt = $this->db->prepare("INSERT INTO vaccine (`vName`, `doses`)"
            . "VALUES (?,?)");
        $stmt->execute([$vName, $doeses]);
        return true;
    }

    public function remove_vaccine($id)
    {
        $stmt = $this->db->prepare("DELETE FROM vaccine WHERE v_id=$id");
        $stmt->execute();
        return true;
    }

    public function remove_center($id)
    {
        $stmt = $this->db->prepare("DELETE FROM center WHERE center_id=$id");
        $stmt->execute();
        return true;
    }

    public function remove_employee($id)
    {
        $stmt = $this->db->prepare("DELETE FROM paramedics WHERE para_id=$id");
        $stmt->execute();
        return true;
    }
}
