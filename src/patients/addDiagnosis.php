<?php session_start(); ?>
<?php include "../../includes/dao.php" ?>
<?php include "../../includes/patients/PatientsController.php";
$patients = new PatientsController();
$GetPatient = $patients->getPatient($_GET['id']);
$patient = $GetPatient->fetch(PDO::FETCH_ASSOC);
?>
<div class="container">
    <?= $jumbo->getJumbo("Ajouter au dossier du patient " . $patient['firstname'] . " " . $patient['lastname'], "<a href='viewDiag.php?id=" . $patient['user_id'] . "'>Afficher le dossier du patient</a>") ?>

    <form role='form' class="addDiag" onsubmit="addDiag()">
        <input name='type' type="hidden" value="addDiag">
        <input name='id' type="hidden" value=<?= $patient['user_id'] ?>>
        <?php if (isset($_GET['t_id'])) : ?>
            <input name='test_id' type="hidden" value=<?= $_GET['t_id'] ?>>
        <?php endif ?>
        
        <label for='in_Temp' class="fas fa-diagnoses"> Diagnostique</label>
            <div class='form-group'>
            <select name="in_Temp" id="" class="form-control browser-default">
                <option></option>
                <option value="Carie de l'email">Carie de l'email</option>
                <option value="Carie de la dentine">Carie de la dentine</option>
                <option value="Dentinite profonde">Dentinite profonde</option>
                <option value="Pulpite">Pulpite</option>
                <option value="Kyste">Kyste</option>
                <option value="Pulpo-desmodontique">Pulpo-desmodontique</option>
                <option value="Parodontite apicale">Parodontite apicale</option>
                <option value="Necrose pulpaire">Necrose pulpaire</option>
                <option value="DCI">DCI</option>
                <option value="DCT">DCT</option>
                <option value="Racine résiduelle">Racine résiduelle</option>
                <option value="Alvéolyse/Mobilité">Alvéolyse/Mobilité</option>
                <option value="Enclavée">Enclavée</option>
                <option value="Incluse">Incluse</option>
                <option value="Malposition">Malposition</option>
                <option value="Cellulite">Cellulite</option>
                <option value="Abcés">Abcés</option>
                <option value="Poche paro">Poche paro</option>
                <option value="Gingivite tartrique">Gingivite tartrique</option>
                <option value="Gingivite">Gingivite</option>
                <option value="Parodontite">Parodontite</option>
                <option value="Alvéolite">Alvéolite</option>
                <option value="Aphte">Aphte</option>
                <option value="Fistule">Fistule</option>
                <option value="Cas ortho">Cas ortho</option>
                <option value="Autres">Autres</option>
            </select>
            </div>
        <label for='in_Bp' class="fas fa-capsules"> Traitement</label>
            <div class='form-group'>
            <select name="in_Bp" id="" class="form-control browser-default">
                <option></option>
                <option value="Nett + ZnoE">Nett + ZnoE</option>
                <option value="Nett + CVI">Nett + CVI</option>
                <option value="Necro + Pulp">Necro + Pulp</option>
                <option value="Bio + Pulpéryl">Bio + Pulpéryl</option>
                <option value="Bio + R4">Bio + R4</option>
                <option value="Bio + OC">Bio + OC</option>
                <option value="OCP + AlB20 + R4">OCP + AlB20 + R4</option>
                <option value="OCP + AlB25 + R4">OCP + AlB25 + R4</option>
                <option value="OCP + Obturation Ca(OH)2">OCP + Obturation Ca(OH)2</option>
                <option value="OCP + DLO">OCP + DLO</option>
                <option value="OC">OC</option>
                <option value="Ca(OH)2FC + ZnoE">Ca(OH)2FC + ZnoE</option>
                <option value="MSO">MSO</option>
                <option value="Détartrage">Détartrage</option>
                <option value="Curetage">Curetage</option>
                <option value="Prothèse dentaire">Prothèse dentaire</option>
            </select>
            </div>

        <label for='in_Presp1' class="fas fa-prescription-bottle-alt"> Ordonnance</label>    
            <div class='form-group'>
            <select name="in_Presp1" id="" class="form-control browser-default">
                <option></option>
                <option value="Amox">Amox</option>
                <option value="Metro">Metro</option>
                <option value="Para">Para</option>
                <option value="Para-AINS">Para-AINS</option>
                <option value="Bain de bouche">Bain de bouche</option>
                <option value="Amox. Ac.">Amox. Ac.</option>
                <option value="Dentifrice">Dentifrice</option>
            </select>
            </div>

            <label for='in_Surgery' class="fas fa-scalpel-path"> Chirurgie</label>    
            <div class='form-group'>
            <select name="in_Surgery" id="" class="form-control browser-default">
                <option></option>
                <option value="Soins locaux">Soins locaux</option>
                <option value="Exo simple">Exo simple</option>
                <option value="Exo/Alvéolectomie">Exo/Alvéolectomie</option>
                <option value="Exo chirurgicale">Exo chirurgicale</option>
                <option value="Suture">Suture</option>
                <option value="Régularisation osseuse">Régularisation osseuse</option>
                <option value="Gingivectomie">Gingivectomie</option>
                <option value="Décapuchonage">Décapuchonage</option>
                <option value="Résection kyste">Résection kyste</option>
            </select>
            </div>

            <label for='in_Theeth' class="fas fa-tooth"> Dent concernée</label>    
            <div class='form-group'>
            <select name="in_Theeth" id="" class="form-control browser-default">
                <option></option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                <option value="16">16</option>
                <option value="17">17</option>
                <option value="18">18</option>
                <option value="21">21</option>
                <option value="22">22</option>
                <option value="23">23</option>
                <option value="24">24</option>
                <option value="25">25</option>
                <option value="26">26</option>
                <option value="27">27</option>
                <option value="28">28</option>
                <option value="31">31</option>
                <option value="32">32</option>
                <option value="33">33</option>
                <option value="34">34</option>
                <option value="35">35</option>
                <option value="36">36</option>
                <option value="37">37</option>
                <option value="38">38</option>
                <option value="41">41</option>
                <option value="42">42</option>
                <option value="43">43</option>
                <option value="44">44</option>
                <option value="45">45</option>
                <option value="46">46</option>
                <option value="47">47</option>
                <option value="48">48</option>
                <option value="51">51</option>
                <option value="52">52</option>
                <option value="53">53</option>
                <option value="54">54</option>
                <option value="55">55</option>
                <option value="61">61</option>
                <option value="62">62</option>
                <option value="63">63</option>
                <option value="64">64</option>
                <option value="65">65</option>
                <option value="71">71</option>
                <option value="72">72</option>
                <option value="73">73</option>
                <option value="74">74</option>
                <option value="75">75</option>
                <option value="81">81</option>
                <option value="82">82</option>
                <option value="83">83</option>
                <option value="84">84</option>
                <option value="85">85</option>
            </select>
            </div>

            <label for='in_Radio' class="fas fa-x-ray"> Radio</label>    
            <div class='form-group'>
            <select name="in_Radio" id="" class="form-control browser-default">
                <option ></option>
                <option value="Retro">Retro</option>
                <option value="Panoramique">Panoramique</option>
            </select>
            </div>

        <div class='form-group'>
            <label for='in_Remarks' class="fas fa-pencil-alt"> Remarques</label>
            <input name='in_Remarks' id='in_Remarks' class='form-control' type='text' placeholder='Remarques...'>
        </div>
        <div class='form-group'>
            <input type="submit" value="Ajouter le diagnostique" class="btn btn-success">
        </div>
    </form>
</div>


<?php include "../../includes/footer.php"; ?>

<script>
    function addDiag(e) {
        event.preventDefault();
        var form = $('.addDiag').serialize();
        $.ajax({
            type: 'POST',
            url: '../../includes/patients/PatientsController.php',
            data: form,
            beforeSend: function() {
                Swal.fire({
                    title: "Ajouter",
                    type: "info",
                    timer: 10000,
                    onBeforeOpen: () => {
                        Swal.showLoading()
                        timerInterval = setInterval(() => {}, 100);
                    }
                });
            },
            success: function(resp) {
                if (resp == "success") {
                    Swal.fire({
                        title: "Diagnostique patient enregistré",
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