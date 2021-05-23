<?php session_start(); ?>
<?php include "../../includes/dao.php" ?>
<?php include "../../includes/patients/PatientsController.php";
$patients = new PatientsController();
$GetPatient = $patients->viewDiag($_GET['id']);
$patient = $GetPatient->fetch(PDO::FETCH_ASSOC);
?>
<div class="container">
    <?= $jumbo->getJumbo("Dossier de " . $patient['firstname'] . " " . $patient['lastname'], "<a href='addDiagnosis.php?id=" . $patient['user_id'] . "'>Ajouter au dossier du patient</a>") ?>

    <table class="table table-resposive table-striped table-hover">
        <thead>
            <th>Nom</th>
            <th>Date d'enregistrement</th>
            <th>Diagnostique</th>
            <th>Traitement</th>
            <th>Ordonnance</th>
            <th>Chirurgie</th>
            <th>Dent concernée</th>
            <th>Radio</th>
            <th>Remarques</th>
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