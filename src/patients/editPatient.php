<?php session_start(); ?>
<?php include "../../includes/dao.php" ?>
<?php include "../../includes/patients/PatientsController.php";
$patients = new PatientsController();
?>
<div class="container">
    <?= $jumbo->getJumbo("Liste des patients", "Visualisation de la liste des patients") ?>

   
    <form method="GET">
        <input type="search" name="q" placeholder="Recherche..." />
        <input type="submit" value="Valider" />
    </form>

    <?php $patientsList = $patients->viewAllPatients(); ?>

    <table class="table table-responsive table-striped table-hover">
        <thead>
            <th>ID</th>
            <th>Prénom</th>
            <th>Nom</th>
            <th>Age</th>
            <th>Addresse</th>
            <th>Sexe</th>
            <th>Date d'enregistrement</th>
            <th>Contact</th>
            <th>Proffession</th>
            <th>Date rendez-vous</th>
            <th>Actions</th>
        </thead>


        <tbody>
            <?php while ($row = $patientsList->fetch(PDO::FETCH_ASSOC)) {
                ?>
                <tr>
                    <td><?= $row['user_id'] ?></td>
                    <td><?= $row['firstname'] ?></td>
                    <td><?= $row['lastname'] ?></td>
                    <td><?= $row['dob'] ?></td>
                    <td><?= $row['address'] ?></td>
                    <td><?= $row['married'] ?></td>
                    <td><?= $row['dor'] ?></td>
                    <td><?= $row['contact'] ?></td>
                    <td><?= $row['referred'] ?></td>
                    <td><?= $row['rdv'] ?></td>
                    <td><a title="Modifier" href="editPatient.php?id=<?= $row['user_id'] ?>" class="btn btn-sm btn-warning fa fa-pencil"></a> </td>
                    <td><a title="Afficher le dossier du patient" href="viewDiag.php?id=<?= $row['user_id'] ?>" class="btn btn-sm btn-default fas fa-eye"></a> </td>
                    <td><a title="Supprimer" class="delete btn btn-danger btn-sm fa fa-trash-o" onclick="Delete(<?= $row['user_id'] ?>)"></a></td>
                </tr>
            <?php } ?>
        </tbody>

    </table>

</div>



<?php include "../../includes/footer.php"; ?>


<script>
    function Delete(id) {
        event.preventDefault();
        Swal.fire({
            title: "Etes-vous de vouloir supprimer le patient " + id + " ?",
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
                        type: "deletePatient",
                        id: id
                    },
                    beforeSend: function() {
                        Swal.fire({
                            title: "Suppression du patient",
                            type: "info",
                            text: "Suppression du patient " + id,
                            icon: "info",
                        })
                    },
                    success: function(resp) {
                        if (resp = "success") {
                            Swal.fire({
                                text: "Patient supprimé",
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


<div id="publish" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Informations complémentaires</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>
<script>
    function modal(id) {
        event.preventDefault();
        $('.modal').modal('show');
        $('.id').attr("value", id);
    }
</script>