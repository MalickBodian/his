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
            <th>Paiements</th>
            <th>Actions</th>
        </thead>
        <tbody>
        <?php 
        $row = $patients->viewDiag($_GET['id']);
        while($patient = $row->fetch(PDO::FETCH_ASSOC)){
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
            <td><?= $patient['bills'] ?></td>
            <td><a title="Modifier" href="editDiag.php?id=<?= $patient['diag_id'] ?>" class="btn btn-sm btn-warning fa fa-pencil"></a> </td>
            <td><a title="Supprimer" class="delete btn btn-danger btn-sm fa fa-trash-o" onclick="Delete(<?= $patient['diag_id'] ?>)"></a></td>
        </tr>
        <?php }?>    
        </tbody>
    </table>
</div>

<?php include "../../includes/footer.php"; ?>

<script>
    function Delete(id) {
        event.preventDefault();
        Swal.fire({
            title: "Etes-vous sûr de vouloir supprimer ce diagnostique ?",
            text: "Cette action sera irréversible!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            animation: true,
            cancelButtonColor: "#d33",
            confirmButtonText: "Supprimer!"
        }).then(result => {
            if (result.value) {
                $.ajax({
                    type: "POST",
                    url: '../../includes/patients/PatientsController.php',
                    data: {
                        type: "deleteDiag",
                        id: id
                    },
                    beforeSend: function() {
                        Swal.fire({
                            title: "Suppression du diagnostique",
                            type: "info",
                            text: "Suppression du diagnostique",
                            icon: "info",
                        })
                    },
                    success: function(resp) {
                        if (resp = "success") {
                            Swal.fire({
                                text: "Diagnostique supprimé",
                                type: "success",
                                showConfirmButton: true,
                                timer: 10000,
                                animation: true,
                            }).then(result => {
                                window.location.reload();
                            });
                        } else {
                            Swal.fire({
                                title: "Erreur",
                                type: "error",
                                text: "Erreur " + resp,
                                icon: "error",
                                button: "Réessayer",
                                showConfirmButton: true,
                            }).then(result => {
                                window.location.reload();
                            });
                        }
                    }
                });
            }
        });

    }

    
</script>