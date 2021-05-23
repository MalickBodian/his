<?php session_start(); ?>
<?php include "../../includes/dao.php" ?>
<?php include "../../includes/patients/PatientsController.php";
$patients = new PatientsController();
$GetPatient = $patients->viewDiag($_GET['id']);

?>
<div class="container">
    <?= $jumbo->getJumbo("Dossier de " . $patient['firstname'] . " " . $patient['lastname'], "<a href='addDiagnosis.php?id=" . $patient['user_id'] . "'>Ajouter au dossier du patient</a>") ?>

    <table class="table table-resposive table-striped table-hover">
        <thead>
            <th id="1">Nom</th>
            <th id="2">Date d'enregistrement</th>
            <th id="3">Diagnostique</th>
            <th id="4">Traitement</th>
            <th id="5">Ordonnance</th>
            <th id="6">Chirurgie</th>
            <th id="7">Dent concernée</th>
            <th id="8">Radio</th>
            <th id=""> Remarques</th>
        </thead>
        <tbody>
        <?php 
        while($patient = $GetPatient->fetch(PDO::FETCH_ASSOC)){
        ?>
        <tr>
            <td><?= $patient['firstname'] ?> <?= $patient['lastname'] ?></td>
            <td><?= $patient['created'] ?></td>
            <td><?= $patient['temp'] ?></td>
            <td><?= $patient['bp'] ?></td>
            <td><?= $patient['presp1'] ?></td>
            <td><?= $patient['surgery'] ?></td>
            <td><?= $patient['theeth'] ?></td>
            <td><?= $patient['radio'] ?></td>
            <td><?= $patient['remarks'] ?></td>
        </tr>
        <?php }?>    
        </tbody>
    </table>
</div>

<?php include "../../includes/footer.php"; ?>