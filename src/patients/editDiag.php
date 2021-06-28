<?php session_start(); ?>
<?php include "../../includes/dao.php" ?>
<?php include "../../includes/patients/PatientsController.php";
$patients = new PatientsController();
$GetPatient = $patients->viewDiag($_GET['id']);
$patient = $GetPatient->fetch(PDO::FETCH_ASSOC);
?>
<div class="container">
    <?= $jumbo->getJumbo("Modification du dossier du patient " .$patient['user_id'] . " " . $patient['firstname'] . " " . $patient['lastname'], "Modification") ?>


    <form method='POST' class='editD' action='#' onsubmit="editDiag()">
        <input type="hidden" name="type" value="editDiag" id="">
        <input type="hidden" name="id" value="<?= $_GET['id'] ?>" id="">
        <div class='form-group'>
        <label for='in_Temp' class="fas fa-diagnoses"> Diagnostique</label>
            <input name='in_Temp' value="<?= $patient['temp'] ?>" id="in_Temp" class='form-control' type='text' placeholder='Saisir le diagnostique...'>
        </div>

        <div class='form-group'>
            <label for='in_Bp' class="fas fa-capsules"> Traitement</label>
            <input name='in_Bp' value="<?= $patient['bp'] ?>" id='in_BP' class='form-control' type='text' placeholder='Saisir le traitement...'>
        </div>

        <div class='form-group'>
            <label for='in_Presp1' class="fas fa-prescription-bottle-alt"> Ordonnance</label>
            <input name='in_Presp1' value="<?= $patient['presp1'] ?>" id='in_Presp1' class='form-control' type='text' placeholder='Saisir le traitement...'>
        </div>

        <div class='form-group'>
            <label for='in_Surgery' class="fas fa-syringe"> Chirurgie</label>
            <input name='in_Surgery' value="<?= $patient['surgery'] ?>" id='in_Surgery' class='form-control' type='text' placeholder='Saisir la chirurgie à faire...'>
        </div>

        <div class='form-group'>
            <label for='in_Theeth' class="fas fa-tooth"> Dent concerné</label>
            <input name='in_Theeth' value="<?= $patient['theeth'] ?>" id='in_Theeth' class='form-control' type='text' placeholder='Saisir la dent concernée...'>
        </div>

        <div class='form-group'>
            <label for='in_Radio' class="fas fa-x-ray"> Radio</label>
            <input name='in_Radio' value="<?= $patient['radio'] ?>" id='in_Radio' class='form-control' type='text' placeholder='Saisir la radio à faire...'>
        </div>

        <div class='form-group'>
            <label for='in_Remarks' class="fas fa-pencil-alt"> Remarques</label>
            <input name='in_Remarks' value="<?= $patient['remarks'] ?>" id='in_Remarks' class='form-control' type='text' placeholder='Saisir les remarques...'>
        </div>

        <div class='form-group'>
            <label for='in_Bills' class="fas fa-coins"> Paiement</label>
            <input name='in_Bills' value="<?= $patient['bills'] ?>" id='in_Bills' class='form-control' type='text' placeholder='Saisir le paiement...'>
        </div>

        <div class='form-group'>
            <input type="submit" value="Confirmer modifications" class="btn btn-success">
        </div>
</div>


<?php include "../../includes/footer.php"; ?>


<script>
    function editDiag(e) {
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
                        title: "Diagnostique mise à jour",
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