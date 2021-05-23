<?php session_start(); ?>
<?php include "../../includes/dao.php" ?>
<?php include "../../includes/patients/PatientsController.php";
$patients = new PatientsController();
$GetPatient = $patients->viewDiag($_GET['id']);
$patient = $GetPatient->fetch(PDO::FETCH_ASSOC);
?>
<div class="container">
    <?= $jumbo->getJumbo("Modifier les informations de " . $patient['firstname'] . " " . $patient['lastname'] , "<a href='viewPatients.php'>Afficher la liste des patients</a>") ?>

    <form method='POST' class='editP' action='#' onsubmit="editPatient()">
        <input type="hidden" name="type" value="editPatient" id="">
        <input type="hidden" name="id" value="<?= $_GET['id'] ?>" id="">
        <div class='form-group'>
            <label for='in_Firstname'>Prénom</label>
            <input name='in_Firstname' value="<?= $patient['firstname'] ?>" id='in_Firstname' class='form-control' type='text' placeholder='Prénom...' required>
        </div>
        <div class='form-group'>
            <label for='in_Lastname'>Nom</label>
            <input name='in_Lastname' value="<?= $patient['lastname'] ?>" id='in_Lastname' class='form-control' type='text' placeholder='Nom...' required>
        </div>
        <div class='form-group'>
            <label for='in_Dob'>Date de naissance</label>
            <input name='in_Dob' id='in_Dob' value="<?= $patient['dob'] ?>" class='form-control' type='date' placeholder='Date de naissance...' required>
        </div>
        <div class='form-group'>
            <label for='in_Address'>Addresse</label>
            <input value='<?= $patient['address'] ?>' name='in_Address' id='in_Address' class=' form-control' rows='5' placeholder='Addresse...'>
        </div>
        <label for='in_Married'>Sexe</label>
        <div class='form-group'>
            <select name="in_Married" id="" class="form-control browser-default">
                <option value="Male">Male</option>
                <option value="Femelle">Femelle</option>
            </select>
        </div>

        <div class='form-group'>
            <label for='in_Dor'>Date d'enregistrement</label>
            <input name='in_Dor' id='in_Dor' value="<?= $patient['dor'] ?>" class='form-control' type='date' placeholder="Date d'enregiretrement..." required>
        </div>
        <div class='form-group'>
            <label for='in_Contact'>Contact</label>
            <input name='in_Contact' id='in_Contact' value="<?= $patient['contact'] ?>" class='form-control' type='text' placeholder='Contact...' required>
        </div>
        <div class='form-group'>
            <label for='in_Referred'>Proffession</label>
            <input name='in_Referred' id='in_Referred' class='form-control' type='text' placeholder='Proffession...' required>
        </div>
        <div class='form-group'>
            <label for='in_Reason'>Paiement</label>
            <input name='in_Reason' id='in_Reason' class='form-control' type='text' placeholder='Paiement...' required>
        </div>
        <div class='form-group'>
            <label for='in_Rdv'>Date de rendez-vous</label>
            <input name='in_Rdv' id='in_Rdv' value="<?= $patient['rdv'] ?>" class='form-control' type='date' placeholder='Date de rendez-vous...' required>
        </div>

        <div class='form-group'>
            <input type="submit" value="Confirmer modifications" class="btn btn-success">
        </div>
</div>

<?php include "../../includes/footer.php"; ?>


<script>
    function editPatient(e) {
        event.preventDefault();
        var form = $('.editP').serialize();
        $.ajax({
            type: 'POST',
            url: '../../includes/patients/PatientsController.php',
            data: form,
            beforeSend: function() {
                Swal.fire({
                    title: "Requête en cours d'exécution",
                    type: "info",
                    timer: 10000,
                    onBeforeOpen: () => {
                        Swal.showLoading()
                        timerInterval = setInterval(() => {}, 100)
                    }
                });
            },
            success: function(resp) {
                if (resp == "success") {
                    Swal.fire({
                        title: "Patient mise à jour",
                        type: "success",
                    }).then(result => {
                        window.history.back();
                    });
                } else {
                    Swal.fire({
                        title: "Erreur" + resp,
                        type: "error",
                    }).then(result => {
                        window.history.back();
                    });
                }
            },

        })
    }
</script>