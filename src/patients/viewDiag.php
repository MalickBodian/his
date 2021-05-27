<?php session_start(); ?>
<?php include "../../includes/dao.php" ?>
<?php include "../../includes/patients/PatientsController.php";
$patients = new PatientsController();
$GetPatient = $patients->viewDiag($_GET['id']);
$patient = $GetPatient->fetch(PDO::FETCH_ASSOC);
?>
<div class="container">
    <?= $jumbo->getJumbo("Dossier de " . $patient['firstname'] . " " . $patient['lastname'], "<a href='addDiagnosis.php?id=" . $patient['user_id'] . "'>Ajouter au dossier du patient</a>") ?>

    <?php     echo '<table class="table table-resposive table-striped table-hover">';
        echo "<thead>";
            echo "<th>Nom</th>";
            echo "<th>Date d'enregistrement</th>";
            echo "<th>Diagnostique</th>"; 
            echo "<th>Traitement</th>"; 
            echo "<th>Ordonnance</th>"; 
            echo "<th>Chirurgie</th>"; 
            echo "<th>Dent concernée</th>";
            echo "<th>Radio</th>";
            echo "<th> Remarques</th>";
        echo "</thead>";
        echo "<tbody>";
        
            foreach($patient as $row=>$patient){
        
            echo "<tr>";
                echo "<td>" . $patient['firstname'] . ' ' . $patient['lastname'] . "</td>"; 
                echo "<td>" . $patient['created'] . "</td>"; 
                echo "<td>" . $patient['temp'] . "</td>"; 
                echo "<td>" . $patient['bp'] . "</td>"; 
                echo "<td>" . $patient['presp1'] . "</td>"; 
                echo "<td>" . $patient['surgery'] . "</td>";
                echo "<td>" . $patient['theeth'] . "</td>";
                echo "<td>" . $patient['radio'] . "</td>"; 
                echo "<td>" . $patient['remarks'] . "</td>"; 
            echo "</tr>";
        }
    
        echo "</tbody>";
    echo "</table>";
    ?> 
</div>

<?php include "../../includes/footer.php"; ?>