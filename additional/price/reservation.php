<?php

$envoie = "0";
require_once '/var/www/happytech63/html/assets/php/log.php';
require_once '/var/www/happytech63/html/additional/inc/function.php';



if(!empty($_POST)) {

    $errors = array();

    if (strlen($_POST['idunique']) > 12){
        $errors['idunique'] = "La valeur de votre identifiant unique est <strong>trop élevée. </strong>";

    }

    if(empty($_POST['marque'])){
        $errors['marque'] = "Vous devez obligatoirement entrer <strong>la marque de votre appareil. </strong>";

    }
    if(empty($_POST['model'])){
        $errors['model'] = "Vous devez obligatoirement entrer <strong>le modèle de votre appareil. </strong>";

    }
    if(empty($_POST['panne']) OR $_POST['panne'] == " " OR $_POST['panne'] == "  " OR $_POST['panne'] == "  "){
        $errors['panne'] = "Vous devez obligatoirement entrer <strong>la panne que vous constatez sur votre appareil. </strong> ";

    }

if(empty($_POST['nom'])){
    $errors['nom'] = "Vous devez obligatoirement entrer <strong>votre nom. </strong> ";

}
if(empty($_POST['appareil'])){
    $errors['appareil'] = "Vous devez obligatoirement <strong>choisir votre type d'appareil. </strong> ";

}

if(empty($_POST['prenom'])){
    $errors['prenom'] = "Vous devez obligatoirement entrer <strong>votre prénom. </strong> ";

}

    if(empty($_POST['etatla']) OR $_POST['etatla'] == " "){
        $errors['etatla'] = "Vous devez obligatoirement nous indiquer <strong>l'état de votre appareil. </strong> ";

    }

    if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Votre email n'est pas valide.";


    }

    if(empty($errors)){
        require_once '/var/www/happytech63/html/additional/inc/db.php';


        $insert = $pdo->prepare("INSERT INTO reservation SET nom = ?, prenom = ?, email = ?, prestation = ?, numero = ?, identifiantunique= ?, typeappareil = ?, marque = ?, model = ?, panneconstat = ?, etatappareil = ?, Date = NOW()");

        $insert->execute([$_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['prestation'], $_POST['numero'], $_POST['idunique'], $_POST['appareil'], $_POST['marque'], $_POST['model'], $_POST['panne'], $_POST['etatla']]);


      $envoie = "1";


    }



}


?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>HappyTech63 : Réservation</title>
    <meta content="Réservation de prestation" name="description">


    <link href="../../assets/img/favicon.png" rel="icon">


    <style>
        @import url('https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,100;1,300;1,400;1,500;1,600;1,700&family=Roboto:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap');
    </style>


    <link href="../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="../../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../../assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../../assets/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="../../assets/vendor/aos/aos.css" rel="stylesheet">


    <link href="../../assets/css/style.css" rel="stylesheet">




</head>

<body>



<script> // tout bloquer CTRL + U V S
    document.onkeydown = function(e) {
        if (e.ctrlKey &&
            (e.keyCode === 86 ||
                e.keyCode === 83 ||
                e.keyCode === 85)) {
            document.location.href="#";
            return false;
        } else {
            return true;
        }
    };
</script>








<script async src="https://www.googletagmanager.com/gtag/js?id=UA-168787596-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-168787596-1');
</script>
<br />
<br />
<a class="btn btn-outline-secondary" href="https://happytech63.fr">Retour au site</a>

<main id="main">

        <div data-aos="zoom-out-right">

            <div class="section-title">



                <h2>Réserver votre prestation</h2>
                <p class="font-italic">Ici vous pouvez faire une demande afin de réserver votre prestation en ligne.
                <br/> Suite à l'envoie de ce formulaire, nous vous contacterons. </p>

                <br />

                <label class="text-danger">*</label> = Champs obligatoires <br />
                <label class="text-primary">*</label> = Champs vivement conseillés
                <br />
                <br />


                <?php if($envoie == "1"): ?>

                    <div class="alert alert-success">

                        <p>Les informations nous ont été envoyés correctement. </p>
                        <p>Nous prenderons contact avec vous dés que possible.</p>
                        <p>Vous pouvez inscrire un autre appareil si besoin ou <a href="https://happytech63.fr" >retourner sur notre site.</a> </p>

                    </div>

                <?php endif; ?>




                <?php if(!empty($errors)): ?>
                <div class="alert alert-danger">

                    <p>Vous n'avez pas remplis le formulaire correctement </p>
                    <ul>

                        <?php foreach($errors as $error):  ?>

                            - <?= $error; ?> <br />


                        <?php endforeach; ?>


                    </ul>
                </div>

                <?php endif; ?>



            </div>
        </div>





    <form class="needs-validation" novalidate data-aos="fade-up" method="post">


        <div class="form-row">
            <div class="col-md-4 mb-3">
                Prénom <label class="text-danger">*</label>
                <input required name="prenom" type="text" class="form-control" id="prenom" placeholder="Prénom" maxlength="100" minlength="3">
                <div class="valid-feedback">
                    Ici, tout parait bien
                </div>
            </div>
            <div class="col-md-4 mb-3">
               Nom <label class="text-danger">*</label>
                <input required name="nom" type="text" class="form-control" id="nom" placeholder="Nom" maxlength="100" minlength="3" >
                <div class="valid-feedback">
                    Ici, tout parait bien
                </div>
            </div>
            <div class="col-md-4 mb-3">
                Email <label class="text-danger">*</label>
                <input required name="email" type="email" class="form-control" id="email" placeholder="email@exemple.com" maxlength="100" minlength="7" >
                <div class="valid-feedback">
                    Ici, tout parait bien
                </div>
            </div>



        </div>
        <div class="form-row">
        <div class="col-md-4 mb-3">
            Numéro de téléphone  <label class="text-primary">*</label>
            <input name="numero" type="text" class="form-control" id="num" placeholder="ex : 0606060606" maxlength="100" minlength="10">
            <div class="valid-feedback">
                Ici, tout parait bien
            </div>
        </div>

            <div class="col-md-4 mb-3">
                Prestation souhaité  <label class="text-primary">*</label>
                <input name="prestation" type="text" class="form-control" id="prestation" placeholder="ex : nettoyage de virus" maxlength="100" minlength="5">
                <div class="valid-feedback">
                    Ici, tout parait bien
                </div>
            </div>


            <div class="col-md-4 mb-3">
                Identifiant unique <label class="text-primary">*</label>
                <input name="idunique" type="text" class="form-control" id="idunique" placeholder="ex : xxxxx-xxxxx" maxlength="12" minlength="10">
                <small id="passwordHelpInline" class="text-muted">
                    Si vous êtes déjà clients chez nous, veuillez nous indiquer votre identifiant unique.
                </small>
                <div class="valid-feedback">
                    Ici, tout parait bien
                </div>
            </div>

        </div>

<br />
<br />
        <div class="section-title">



            <h2>Informations sur votre appareil</h2>

        </div>

        <div class="form-row">

            <br />
            <br />
            <div class="col-md-4 mb-3">
         Type d'appareil <label class="text-danger">*</label>

            <select  class="form-control" name="appareil" required>
                <option value="">Choix de votre appareil</option>
                <option value="1">Ordinateur</option>
                <option value="2">Téléphone / Smartphone</option>
                <option value="3">Tablette</option>
                <option value="3">Autre</option>
            </select>
            <div class="invalid-feedback">Veuillez choisir un appareil.</div>
            </div>

            <div class="col-md-4 mb-3">
                Marque de l'appareil <label class="text-danger">*</label>
                <input required name="marque" type="text" class="form-control" id="marque" placeholder="ex : Samsung" maxlength="100" minlength="2">
                <div class="invalid-feedback">
                    Veuillez renseigner la marque de votre appareil
                </div>
            </div>

            <div class="col-md-4 mb-3">
         Modèle de l'appareil <label class="text-danger">*</label>
                <input required name="model" type="text" class="form-control" id="model" placeholder="ex : Galaxy A5" maxlength="100" minlength="6">
                <div class="invalid-feedback">
                    Veuillez renseigner le modéle de votre appareil
                </div>
            </div>

        </div>

        <div class="form-row">

            <div class="col-md-4 mb-4">
               Panne(s) constaté(es) <label class="text-danger">*</label>
                <textarea required name="panne" id="panne" class="form-control" rows="5" maxlength="250" minlength="5" onkeyup="nbrCara('panne','nbrcara');" onkeydown="nbrCara('panne','nbrcara');" onmouseout="nbrCara('panne','nbrcara');"> </textarea>

                <div class="invalid-feedback">
                    Champ obligatoire.
                </div>

                <script type="text/javascript">
                    function nbrCara(cara,nbrcara) {
                        var nombre = document.getElementById(cara).value.length;
                        document.getElementById(nbrcara).innerHTML = nombre;
                    }
                </script>

                <small id="passwordHelpInline" class="text-muted">
                    Nombre de caractères : <span id="nbrcara">0</span> /250
                </small>

        </div>


        <div class="col-md-4 mb-4">
            État de l'appareil <label class="text-danger">*</label>
            <br />
            <small id="passwordHelpInline" class="text-muted">
                Veuillez indiquer les rayures / éclats / fissures etc.
            </small>
            <textarea required name="etatla" id="etatla" class="form-control" rows="4" maxlength="250" minlength="5" onkeyup="nbrCara('etatla','nbrcara2');" onkeydown="nbrCara('etatla','nbrcara2');" onmouseout="nbrCara('etatla','nbrcara2');"> </textarea>

            <div class="invalid-feedback">
                Champ obligatoire.
            </div>

            <script type="text/javascript">
                function nbrCara(cara,nbrcara2) {
                    var nombre = document.getElementById(cara).value.length;
                    document.getElementById(nbrcara2).innerHTML = nombre;
                }
            </script>

            <small id="passwordHelpInline" class="text-muted">
                Nombre de caractères : <span id="nbrcara2">0</span> /250
            </small>

        </div>



        </div>


        <div class="form-group">
            <div class="form-check">
                <input required class="form-check-input" type="checkbox" value="" id="invalidCheck">
                <label class="form-check-label" for="invalidCheck">
                    <span>Jaccepte les <a href="https://happytech63.fr/additional/cgu/">conditions générales d'utilisation</a>.</span>
                    <label class="text-danger">*</label>
                </label>
                <div class="invalid-feedback">
                    Vous devez accepter les conditions d'utilisation.
                </div>
                <br />
                <?php if(!empty($errors)): ?>

                    <div class="alert alert-danger">
                        <p> Vous n'avez pas remplis le formulaire correctement </p>
                        <ul>
                            <?php foreach($errors as $error): ?>

                                - <?= $error; ?> <br />


                            <?php endforeach; ?>


                        </ul>
                    </div>
                <?php endif; ?>


            </div>
        </div>
        <button name="register_btn" class="btn btn-primary" type="submit" >Demander ma réservation</button>
    </form>

    <script>

        (function() {
            'use strict';
            window.addEventListener('load', function() {
                var forms = document.getElementsByClassName('needs-validation');
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
</main>


<a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
<div id="preloader"></div>

<script src="../../assets/vendor/jquery/jquery.min.js"></script>
<script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../../assets/vendor/jquery.easing/jquery.easing.min.js"></script>
<script src="../../assets/vendor/php-email-form/validate.js"></script>
<script src="../../assets/vendor/waypoints/jquery.waypoints.min.js"></script>
<script src="../../assets/vendor/counterup/counterup.min.js"></script>
<script src="../../assets/vendor/owl.carousel/owl.carousel.min.js"></script>
<script src="../../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="../../assets/vendor/venobox/venobox.min.js"></script>
<script src="../../assets/vendor/aos/aos.js"></script>
<script src="../../assets/js/main.js"></script>


</body>


<?php
require_once '/var/www/happytech63/html/assets/inc/smallfooter.php';
?>


</html>