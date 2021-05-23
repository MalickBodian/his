<?php session_start(); ?>
<?php include "../../includes/dao.php" ?>
<?php include "../../includes/patients/PatientsController.php";
?>

<div class="container">
    <?= $jumbo->getJumbo("Ajout de patient", "Détails du patient à ajouter") ?>
    <form method='POST' class='addP' action='#' onsubmit="addPatient()">
        <input type="hidden" name="type" value="addPatient" id="">
        <div class='form-group'>
            <label for='in_Firstname'>Prénom</label>
            <input name='in_Firstname' id='in_Firstname' class='form-control' type='text' placeholder='Prénom...' required>
        </div>
        <div class='form-group'>
            <label for='in_Lastname'>Nom</label>
            <input name='in_Lastname' id='in_Lastname' class='form-control' type='text' placeholder='Nom...' required>
        </div>
        <div class='form-group'>
            <label for='in_Dob'>Date de naissance</label>
            <input name='in_Dob' id='in_Dob' class='form-control' type='date' placeholder='Date de naissance...' required>
        </div>
        <div class='form-group'>
            <label for='in_Address'>Addresse</label>
            <textarea name='in_Address' id='in_Address' class=' form-control' rows='5' placeholder='Addresse...' required></textarea>
        </div>
        <label for='in_Married'>Sexe</label>
        <div class='form-group'>
            <select name="in_Married" id="" class="form-control browser-default">
                <option value="Masculin">Masculin</option>
                <option value="Féminin">Féminin</option>
            </select>
        </div>
        <div class='form-group'>
            <label for='in_Contact'>Contact</label>
            <input name='in_Contact' id='in_Contact' class='form-control' type='text' placeholder='Contact...' required>
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
            <input name='in_Rdv' id='in_Rdv' class='form-control' type='date' placeholder='Date de rendez-vous...' required>
        </div>

        <div class='form-group'>
            <input type="submit" value="Ajouter patient" class="btn btn-success">
        </div>
    </form>

    <?php include "../../includes/footer.php"; ?>

    <script>
        function addPatient(e) {
            event.preventDefault();
            var form = $('.addP').serialize();
            $.ajax({
                type: 'POST',
                url: '../../includes/patients/PatientsController.php',
                data: form,
                beforeSend: function() {
                    Swal.fire({
                        title: "Ajout du patient",
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
                            title: "Patient ajouté",
                            type: "success",
                        }).then(result => {
                            window.location.reload();
                        });
                    } else {
                        Swal.fire({
                            title: "Erreur" + resp,
                            type: "error",
                        }).then(result => {
                            window.location.reload();
                        });
                    }
                },

            })
        }
    </script>