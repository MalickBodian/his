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
                $_POST['in_Reason'],
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
                $_POST['in_Reason'],
                $_POST['in_Rdv']
            );
            break;
        case "deletePatient":
            echo $patients->deletePatient($_POST['id']);
            break;
        case "addDiag":
            echo $patients->addDiag(
                $_POST['id'],
                $_POST['in_Temp'],
                $_POST['in_Bp'],
                $_POST['in_Presp1'],
                $_POST['in_Surgery'],
                $_POST['in_Theeth'],
                $_POST['in_Radio'],
                $_POST['in_Remarks'],
                isset($_POST['test_id']) ? $_POST['test_id'] : ''
            );
            break;
    }
endif;
class PatientsController
{
    function addPatient($firstname, $lastname, $dob, $address, $married, $contact, $referred, $reason, $rdv)
    {
        $db = new DBconnection();
        $dbConn = $db->getConnection();
        $date =  date("Y-m-d");
        $sql = "INSERT INTO patients (firstname,lastname,dob,address,dor,married,contact,referred,reason,rdv) VALUES (:firstname,:lastname,:dob,:address,:dor,:married,:contact,:referred,:reason,:rdv)";
        $query = $dbConn->prepare($sql);
        $query->bindparam(':firstname', $firstname);
        $query->bindparam(':lastname', $lastname);
        $query->bindparam(':dob', $dob);
        $query->bindparam(':address', $address);
        $query->bindparam(':dor', $date);
        $query->bindparam(':married', $married);
        $query->bindparam(':contact', $contact);
        $query->bindparam(':referred', $referred);
        $query->bindparam(':reason', $reason);
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
    }

    public function getPatient($id)
    {
        $db = new DBconnection();
        $dbConn = $db->getConnection();
        return $dbConn->query("SELECT * FROM patients where user_id = '$id' LIMIT 1");
    }


    public function updatePatient($id, $firstname, $lastname, $dob, $address, $married, $contact, $referred, $reason, $rdv)
    {
        $db = new DBconnection();
        $dbConn = $db->getConnection();
        $sql = "UPDATE patients SET firstname=:firstname,lastname=:lastname,dob=:dob,address=:address,married=:married,contact=:contact,referred=:referred,reason=:reason,rdv=:rdv WHERE user_id=:user_id";
        $query = $dbConn->prepare($sql);
        $query->bindparam(':user_id', $id);
        $query->bindparam(':firstname', $firstname);
        $query->bindparam(':lastname', $lastname);
        $query->bindparam(':dob', $dob);
        $query->bindparam(':address', $address);
        $query->bindparam(':married', $married);
        $query->bindparam(':contact', $contact);
        $query->bindparam(':referred', $referred);
        $query->bindparam(':reason', $reason);
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


    function addDiag($id, $temp, $bp, $presp, $surgery, $theeth, $radio, $remarks)
    {
        $db = new DBconnection();
        $dbConn = $db->getConnection();
        $sql = "INSERT INTO diagnosis (user_id, temp,bp,presp1,surgery,theeth,radio,remarks) VALUES (:id, :temp,:bp,:presp1,:surgery,:theeth,:radio,:remarks)";
        $query = $dbConn->prepare($sql);
        $query->bindparam(':id', $id);
        $query->bindparam(':temp', $temp);
        $query->bindparam(':bp', $bp);
        $query->bindparam(':presp1', $presp);
        $query->bindparam(':surgery', $surgery);
        $query->bindparam(':theeth', $theeth);
        $query->bindparam(':radio', $radio);
        $query->bindparam(':remarks', $remarks);
        try {
            if ($query->execute()) :
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
                                LEFT JOIN diagnosis
                                ON patients.user_id = diagnosis.user_id 
                                WHERE patients.user_id = '$id' 
                                ORDER BY created DESC");
    }

}
