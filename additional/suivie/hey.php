<?php


require_once '/var/www/happytech63/html/additional/inc/auth.php';

logged();
require_once '/var/www/happytech63/html/assets/php/log.php';

require_once '/var/www/happytech63/html/additional/inc/db.php';


$ID = $_SESSION['auth']->identifiantunique;
$etat = $_SESSION['auth']->etat;


$reqq = $pdo->prepare('SELECT * FROM appareil WHERE identifiantunique = ? AND DateFin is NULL');
$reqq->execute([$ID]);
$appareil = $reqq->fetch();


$insertDatafin = $pdo->prepare("UPDATE data SET connexion = NOW() WHERE identifiantunique = ?");
$insertDatafin->execute(array($ID));



$typeappareil = $appareil->typeappareil;
$marque = $appareil->marque;
$numeroserie = $appareil->numeroserie;
$etatappareil = $appareil->etat;
$panne = $appareil->panne;
$modele = $appareil->modele;
$technicien = $appareil->technicien;
$achat = $appareil->achat;
$DateSaisie = $appareil->DateSaisie;
$message = $_SESSION['auth']->message;
$email = $_SESSION['auth']->email;
$numerotel = $_SESSION['auth']->numerotel;



if($technicien == "1"){
   $nomtech = "Nicolas Tournadre" ;

}elseif($technicien == "2"){
    $nomtech = "Kilian Duran Mascheix" ;

}

if ($achat == "1"){
    $messachat = "Appareil acheté + de 2 ans";

}elseif ($achat == "2"){
    $messachat = "Appareil acheté - de 2 ans";


}elseif ($achat == "3"){
    $messachat = "Aucune information d'achat";
}else
    $messachat = "Aucune information d'achat";

 // https://youtu.be/haTwY4yp0lQ?t=614

?>



<!DOCTYPE html>
<html lang="fr" >
<head>
  <meta charset="UTF-8">

    
   <title>Suivie intervention : HappyTech63</title>


     <meta name="description" content="HappyTech63 est une équipe de 2 étudiants souhaitant vous aider dans vos problèmes liés a l'informatique. Notre site vous expliquera comment procéder simplement, vous pourrez également en apprendre plus sur nous. Happy Tech 63 est dédié à vous en apprendre plus en matière de l'informatique." />

  <link href="../../../assets/img/favicon.png" rel="icon">
    <link href="../../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../../../assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="../../../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../../../assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="../../../assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="../../../assets/vendor/aos/aos.css" rel="stylesheet">

  <link href="../../../assets/css/style.css" rel="stylesheet">



  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="./style.css">


 <style>
@import url('https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,100;1,300;1,400;1,500;1,600;1,700&family=Roboto:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap');
</style>



</head>
<body>


<ul class="nav nav-pills">
    <li class="nav-item">
        <a class="nav-link" href="logout.php">Déconnexion</a>
    </li>

</ul>

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



        <div class="section-title">
          <h2>Suivie de votre intervention </h2>
          <p> Bonjour <?= $_SESSION['auth']->prenom ?> <?= $_SESSION['auth']->nom ?> ici vous pouvez visualiser l'état d'avancement de votre dossier.</p>
<br> <br>

            <div class="alert alert-info" role="alert">
                Les lignes affichés en gras sont suceptibles de changer.
            </div>

        </div>
<div class="progress-container">

    <?php if($etat == '1'): ?>


    <ol class="progression-bar step-1">


        <li class="is-active"><span class="progression-title">En cours d'analyse</span></li>
        <li class=""><span class="progression-date">Prise de contact</span></li>
        <li><span class="progression-title">Prise d'un rendez-vous / Traitement du dossier</span></li>
        <li class=""><span class="progression-date">Dossier en attente de réparation</span></li>
        <li class=""><span class="progression-title">Dossier clos, paiement non effectué</span></li>
    </ol></div>


        </div>
    <?php endif; ?>

<?php if($etat == '2'): ?>


    <ol class="progression-bar step-2">


        <li class="is-active"><span class="progression-title">En cours d'analyse</span></li>
        <li class="is-active"><span class="progression-date">Prise de contact</span></li>
        <li><span class="progression-title">Prise d'un rendez-vous / Traitement du dossier</span></li>
        <li class=""><span class="progression-date">Dossier en attente de réparation</span></li>
        <li class=""><span class="progression-title">Dossier clos, paiement non effectué</span></li>
    </ol></div>


    </div>
<?php endif; ?>

<?php if($etat == '3'): ?>


    <ol class="progression-bar step-3">


        <li class="is-active"><span class="progression-title">En cours d'analyse</span></li>
        <li class="is-active"><span class="progression-date">Prise de contact effectué</span></li>
        <li class="is-active" ><span class="progression-title">Prise d'un rendez-vous / Traitement du dossier</span></li>
        <li class=""><span class="progression-date">Dossier en attente de réparation</span></li>
        <li class=""><span class="progression-title">Dossier clos, paiement non effectué</span></li>
    </ol></div>


    </div>
<?php endif; ?>

<?php if($etat == '4'): ?>


    <ol class="progression-bar step-4">


        <li class="is-active"><span class="progression-title">En cours d'analyse</span></li>
        <li class="is-active"><span class="progression-date">Prise de contact</span></li>
        <li class="is-active" ><span class="progression-title">Prise d'un rendez-vous / Traitement du dossier</span></li>
        <li class="is-active"><span class="progression-date">Dossier en attente de réparation</span></li>
        <li class=""><span class="progression-title">Dossier clos, paiement non effectué</span></li>
    </ol></div>


    </div>
<?php endif; ?>

<?php if($etat == '5'): ?>


    <ol class="progression-bar step-5">


        <li class="is-active"><span class="progression-title">En cours d'analyse</span></li>
        <li class="is-active"><span class="progression-date">Prise de contact</span></li>
        <li class="is-active" ><span class="progression-title">Prise d'un rendez-vous / Traitement du dossier</span></li>
        <li class="is-active"><span class="progression-date">Dossier en attente de réparation</span></li>
        <li class="is-active"><span class="progression-title">Dossier clos, paiement non effectué</span></li>
    </ol></div>


    </div>
<?php endif; ?>

<?php if($etat  >= '5'): ?>


    <ol class="progression-bar step-5">


        <li class="is-active"><span class="progression-title">En cours d'analyse</span></li>
        <li class="is-active"><span class="progression-date">Prise de contact</span></li>
        <li class="is-active" ><span class="progression-title">Prise d'un rendez-vous / Traitement du dossier</span></li>
        <li class="is-active"><span class="progression-date">Dossier en attente de réparation</span></li>
        <li class="is-active"><span class="progression-title">Dossier clos, paiement non effectué</span></li>
    </ol></div>


    </div>
<?php endif; ?>

<br />
<br />

<div class="section-title">
    <h2>Autres informations sur votre dossier en cours</h2>


<br />

<p class="font-weight-normal">Type d'appareil : <?= $typeappareil ?> </p> <br />
<p class="font-weight-normal">Marque de l'appareil : <?= $marque ?> </p><br />
<p class="font-weight-normal">Modèle de l'appareil : <?= $modele ?> </p><br />
<p class="font-weight-normal">Numéro de série : <?= $numeroserie ?> </p><br />

<p class="font-weight-bold">Etat de l'appareil : <?= $etatappareil ?> </p><br />
<p class="font-weight-normal">Achat : <?=  $messachat ?> </p><br />

<p class="font-weight-normal">Technicien en charge du dossier : <?= $nomtech ?> </p><br />
<p class="font-weight-bold">Panne constatée : <?= $panne ?> </p><br />
<p class="font-weight-bold">Message du technicien concernant le dossier : <?= $message ?> </p><br />
<p class="font-weight-normal">Date de saisie du dossier : <?= $DateSaisie ?> </p><br />

<h2>Nos moyen de contact :</h2>

    <p class="font-weight-normal">Votre adresse email : <?= $email ?> </p><br />
    <p class="font-weight-normal">Votre numéro de téléphone : <?= $numerotel ?> </p><br />
</div>
  
</body>
<br /><br /><br /><br /><br />



  <footer id="footer">





    <div class="container">

      <div class="copyright-wrap d-md-flex py-4">
        <div class="mr-md-auto text-center text-md-left">
          <div class="copyright">
            &copy; 2020-<?php echo date("Y");?> Copyright <strong><span>HappyTech63</span></strong>. All Rights Reserved


            </div>
        </div>
       
      </div>

    </div>

  </footer>

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
  <div id="preloader"></div>


  <script src="../../../assets/vendor/jquery/jquery.min.js"></script>
  <script src="../../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../../assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="../../../assets/vendor/php-email-form/validate.js"></script>
  <script src="../../../assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="../../../assets/vendor/counterup/counterup.min.js"></script>
  <script src="../../../assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="../../../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../../../assets/vendor/venobox/venobox.min.js"></script>
  <script src="../../../assets/vendor/aos/aos.js"></script>
  <script src="../../../assets/js/main.js"></script>



</html>