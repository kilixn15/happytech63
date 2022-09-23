<?php
require_once '/var/www/happytech63/html/assets/php/log.php';


if(!empty($_POST)){
    require_once '/var/www/happytech63/html/additional/inc/db.php';

    $errors = array();

    if(empty($_POST['prenom'])) {
        $errors['prenom'] = "Erreur lors de la saisie de votre prénom.";
    }
    if(empty($_POST['nom'])){
        $errors['nom'] = "Erreur lors de la saisir de votre nom.";
    }

    if(empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
    $errors['email'] = "Adresse email non conforme.";
    }else {

        $req = $pdo->prepare('SELECT id FROM newsletter WHERE email = ?');
        $req->execute([$_POST['email']]);
        $user = $req->fetch();

        if($user){
            $errors['email'] = "Adresse email déjà enregistrée.";

        }
    }

if(empty($errors)){

    $req = $pdo->prepare("INSERT INTO newsletter SET prenom = ?, nom = ?, email = ?, statut = '1', Date = NOW() ");
    $req->execute([$_POST['prenom'], $_POST['nom'], $_POST['email']]);

    header('Location: https://happytech63.fr');
}

}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>HappyTech63 : Newsletter</title>
    <meta content="Inscription aux newsletters" name="description">

    
    <link href="functions.php" rel="php">


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

    <link href="../../assets/img/favicon.png" rel="icon">



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


<header>
    <a class="btn btn-outline-secondary" href="https://happytech63.fr">Retour au site</a>

</header>

<main id="main">









    <section id="work">
        <div data-aos="zoom-out-right">

            <div class="section-title">

                <h2>Inscription à notre newsletter</h2>
                <p class="font-italic">Vous pouvez vous abonner à notre newsletter afin de recevoir par email de nombreux avantages tel que : </p>
                <br /><br />







                Des promotions spéciales (jusqu'à -30%)<br />
                Nos dernières prestations disponibles<br />
                Les dernières informations nous concernant<br />



                <br /><br />


                <p class="font-italic">Vous pouvez vous désabonner à tout moment.</p>


    </section>




    <form class="needs-validation" novalidate data-aos="fade-up" method="post">
        <div class="form-row">
            <div class="col-md-4 mb-3">
                <label for="validationCustom01">Prénom</label>
                <input name="prenom" type="text" class="form-control" id="validationCustom01" placeholder="Prénom" maxlength="100" minlength="3"  required>
                <div class="valid-feedback">
                    Ici, tout parait bien
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <label for="validationCustom02">Nom</label>
                <input name="nom" type="text" class="form-control" id="validationCustom02" placeholder="Nom" maxlength="100" minlength="7" required>
                <div class="valid-feedback">
                    Ici, tout parait bien
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <label for="validationCustom02">Email</label>
                <input name="email" type="email" class="form-control" id="validationCustom02" placeholder="email@exemple.com" maxlength="100" minlength="7" required>
                <div class="valid-feedback">
                    Ici, tout parait bien
                </div>
            </div>

        </div>

        <div class="form-group">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                <label class="form-check-label" for="invalidCheck">
                    <span>Jaccepte les <a href="https://happytech63.fr/additional/cgu/">conditions générales d'utilisation</a> du service</span>
                </label>
                <div class="invalid-feedback">
                    Vous devez accepter les conditions d'utilisation du service
                </div>
                <?php if(!empty($errors)): ?>

                    <div class="alert alert-danger">
                        <p> Vous n'avez pas remplis le formulaire correctement </p>
                        <ul>
                            <?php foreach($errors as $error): ?>

                                - <?= $error; ?>


                            <?php endforeach; ?>


                        </ul>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <button name="register_btn" class="btn btn-primary" type="submit" >M'inscrire aux newsletter</button>
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

<?php
require_once '/var/www/happytech63/html/assets/inc/smallfooter.php';
?>

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




</html>