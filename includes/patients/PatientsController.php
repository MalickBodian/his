<?php
include "../../includes/DBconn.php";

if (isset($_POST['type'])) :

    $patients = new PatientsController();

    switch ($_POST['type']) {

        case "addPatient":

            echo $patients->addPatient(
                $_POST['in_Firstname'],
                $_POST['in_Lastname'],
                $_POST['in_Dob'],
                $_POST['in_Address'],
                $_POST['in_Married'],
                $_POST['in_Contact'],
                $_POST['in_Referred'],
                $_POST['in_Rdv']
            );
            break;
        case "editPatient":
            echo $patients->updatePatient(
                $_POST['id'],
                $_POST['in_Firstname'],
                $_POST['in_Lastname'],
                $_POST['in_Dob'],
                $_POST['in_Address'],
                $_POST['in_Married'],
                $_POST['in_Contact'],
                $_POST['in_Referred'],
                $_POST['in_Rdv']
            );
            break;
        case "deletePatient":
            echo $patients->deletePatient($_POST['id']);
            break;
        case "addDiag":
            echo $patients->addDiag(
                $_POST['in_User_id'],
                $_POST['in_Temp'],
                $_POST['in_Bp'],
                $_POST['in_Presp1'],
                $_POST['in_Surgery'],
                $_POST['in_Theeth'],
                $_POST['in_Radio'],
                $_POST['in_Remarks'],
                $_POST['in_Bills'],
                isset($_POST['test_id']) ? $_POST['test_id'] : ''
            );
            break;
            case "editDiag":
                echo $patients->editDiag(
                    $_POST['id'],
                    $_POST['in_Temp'],
                    $_POST['in_Bp'],
                    $_POST['in_Presp1'],
                    $_POST['in_Surgery'],
                    $_POST['in_Theeth'],
                    $_POST['in_Radio'],
                    $_POST['in_Remarks'],
                    $_POST['in_Bills']
                );
            case "deleteDiag":
                echo $patients->deleteDiag($_POST['id']);
                break;
    }
endif;
class PatientsController
{
    function addPatient($firstname, $lastname, $dob, $address, $married, $contact, $referred, $rdv)
    {
        $db = new DBconnection();
        $dbConn = $db->getConnection();
        $date =  date("Y-m-d");
        $sql = "INSERT INTO patients (firstname,lastname,dob,address,dor,married,contact,referred,rdv) VALUES (:firstname,:lastname,:dob,:address,:dor,:married,:contact,:referred,:rdv)";
        $query = $dbConn->prepare($sql);
        $query->bindparam(':firstname', $firstname);
        $query->bindparam(':lastname', $lastname);
        $query->bindparam(':dob', $dob);
        $query->bindparam(':address', $address);
        $query->bindparam(':dor', $date);
        $query->bindparam(':married', $married);
        $query->bindparam(':contact', $contact);
        $query->bindparam(':referred', $referred);
        $query->bindparam(':rdv', $rdv);
        try {
            if ($query->execute()) :
                return "success";
            endif;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function viewAllPatients()
    {
        $db = new DBconnection();
        $dbConn = $db->getConnection();
        return $dbConn->query("SELECT * FROM patients ORDER BY user_id DESC");
        if (isset($_GET['q']) AND !empty($_GET['q'])){
            $q = htmlspecialchars($_GET['q']);
            $dbConn = $dbConn->query("SELECT firstname, lastname FROM patients where firstname, lastname LIKE "%'.$q.'%" ORDER BY id DESC");
        }
    }

    public function getPatient($id)
    {
        $db = new DBconnection();
        $dbConn = $db->getConnection();
        return $dbConn->query("SELECT * FROM patients where user_id = '$id' LIMIT 1");
    }


    public function updatePatient($id, $firstname, $lastname, $dob, $address, $married, $contact, $referred, $rdv)
    {
        $db = new DBconnection();
        $dbConn = $db->getConnection();
        $sql = "UPDATE patients SET firstname=:firstname,lastname=:lastname,dob=:dob,address=:address,married=:married,contact=:contact,referred=:referred,rdv=:rdv WHERE user_id=:user_id";
        $query = $dbConn->prepare($sql);
        $query->bindparam(':user_id', $id);
        $query->bindparam(':firstname', $firstname);
        $query->bindparam(':lastname', $lastname);
        $query->bindparam(':dob', $dob);
        $query->bindparam(':address', $address);
        $query->bindparam(':married', $married);
        $query->bindparam(':contact', $contact);
        $query->bindparam(':referred', $referred);
        $query->bindparam(':rdv', $rdv);
        try {
            if ($query->execute()) :
                return "success";
            endif;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }


    public function deletePatient($id)
    {
        $db = new DBconnection();
        $dbConn = $db->getConnection();
        $sql = "DELETE FROM patients WHERE user_id=:user_id";
        $query = $dbConn->prepare($sql);
        try {
            if ($query->execute(array(':user_id' => $id))) :
                return "success";
            endif;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }


    function addDiag($id, $temp, $bp, $presp, $surgery, $theeth, $radio, $remarks, $bills)
    {
        $db = new DBconnection();
        $dbConn = $db->getConnection();
        $sql = "INSERT INTO diagnosis (user_id, temp,bp,presp1,surgery,theeth,radio,remarks,bills) VALUES (:user_id, :temp,:bp,:presp1,:surgery,:theeth,:radio,:remarks,:bills)";
        $query = $dbConn->prepare($sql);
        $query->bindparam(':user_id', $id);
        $query->bindparam(':temp', $temp);
        $query->bindparam(':bp', $bp);
        $query->bindparam(':presp1', $presp);
        $query->bindparam(':surgery', $surgery);
        $query->bindparam(':theeth', $theeth);
        $query->bindparam(':radio', $radio);
        $query->bindparam(':remarks', $remarks);
        $query->bindparam(':bills', $bills);
        try {
            if ($query->execute()) :
                return "success";
            endif;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function editDiag($id, $temp, $bp, $presp, $surgery, $theeth, $radio, $remarks, $bills)
    {
        $db = new DBconnection();
        $dbConn = $db->getConnection();
        $sql = "UPDATE patients SET temp=:temp,bp=:bp,presp1=:presp,surgery=:surgery,theeth=:theeth,radio=:radio,remarks=:remarks,bills=:bills WHERE diag_id=:diag_id";
        $query = $dbConn->prepare($sql);
        $query->bindparam(':diag_id', $id);
        $query->bindparam(':temp', $temp);
        $query->bindparam(':bp', $bp);
        $query->bindparam(':presp1', $presp);
        $query->bindparam(':surgery', $surgery);
        $query->bindparam(':theeth', $theeth);
        $query->bindparam(':radio', $radio);
        $query->bindparam(':remarks', $remarks);
        $query->bindparam(':bills', $bills);
        try {
            if ($query->execute()) :
                return "success";
            endif;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function deleteDiag($id)
    {
        $db = new DBconnection();
        $dbConn = $db->getConnection();
        $sql = "DELETE FROM diagnosis WHERE diag_id=:diag_id";
        $query = $dbConn->prepare($sql);
        try {
            if ($query->execute(array(':diag_id' => $id))) :
                return "success";
            endif;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function viewDiag($id)
    {
        $db = new DBconnection();
        $dbConn = $db->getConnection();
        return $dbConn->query("SELECT patients.*, diagnosis.*
                                FROM patients
                                RIGHT JOIN diagnosis
                                ON patients.user_id = diagnosis.user_id 
                                WHERE patients.user_id = '$id' 
                                ORDER BY created DESC");
    }

}
