

<?php
require_once '/var/www/happytech63/html/assets/php/log.php';

require_once '/var/www/happytech63/html/additional/inc/auth.php';




require_once '/var/www/happytech63/html/additional/inc/function.php';
if(!empty($_POST)){
    $errors = array ();



    if(empty($_POST['namemail'])){
        $errors['Nom ou email'] = "Vous devez entrer une adresse email ou votre nom.";

    }

    if(empty($_POST['identifiantunique'])){
        $errors['Indentifiant unique'] = "Vous devez entrer un identifiant unique valide.";

    }

if(empty($errors)) {

   require_once '/var/www/happytech63/html/additional/inc/db.php';
    $req = $pdo->prepare('SELECT * FROM data WHERE (nom = :namemail OR email = :namemail) AND identifiantunique = :identifiantunique');
    $req->execute(['namemail'=> $_POST['namemail'], 'identifiantunique' => $_POST['identifiantunique']]);
    $user = $req->fetch();

    if($user->identifiantunique == $_POST['identifiantunique'] && $_POST['namemail'] == $user->nom or $_POST['namemail'] == $user->email) {



            session_start();



        $_SESSION['auth'] = $user;
        header('Location: hey.php');

    }
   $errors['erreur lors de la saisie'] = "Erreur lors de la saisie des informations";

    }




}

?>


<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">

  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Suivie intervention : HappyTech63</title>
   <meta name="description" content="HappyTech63 est une équipe de 2 étudiants souhaitant vous aider dans vos problèmes liés a l'informatique. Notre site vous expliquera comment procéder simplement, vous pourrez également en apprendre plus sur nous. Happy Tech 63 est dédié à vous en apprendre plus en matière de l'informatique." />



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

<script> // CTRL + U V S
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




  <header>




      <script async src="https://www.googletagmanager.com/gtag/js?id=UA-168787596-1"></script>
      <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-168787596-1');
      </script>
  </header>





     <section id="suivie" class="contact section-bg">

      <div class="container" data-aos="fade-up">






        <div class="section-title">
          <h2>Suivie d'intervention</h2>
          <p> Vous pouvez suivre l'état d'avancement de votre dossier à tout moment via votre identifiant unique</p>
       
        </div>


<br />

          <?php if(!empty($errors)): ?>

              <div class="alert alert-danger">
                  <p> Vous n'avez pas remplis le formulaire correctement </p>
                  <ul>
                      <?php foreach($errors as $error): ?>

                          <li> <?= $error; ?> </li>


                      <?php endforeach; ?>


                  </ul>
              </div>
          <?php endif; ?>
          <br />


    <form class="needs-validation" novalidate data-aos="fade-up" method="post">
  <div class="form-row">
    <div class="col-md-6 mb-3">
      <label for="validationCustom01">Nom ou email</label>
      <input name="namemail" type="text" minlength="2" maxlength="110" style="text-align:center" class="form-control" id="validationCustom01" placeholder="Veuillez entrer votre nom ou adresse email" value="" required>
      <div class="valid-feedback">
         Ici, tout parait bien
      </div>
    </div>
    <div class="col-md-6 mb-3">
      <label for="validationCustom02">Identifiant unique</label>
      <input minlength="10"  style="text-align:center" maxlength="11" name="identifiantunique" type="text" class="form-control" id="validationCustom02" placeholder="Identifiant unique (ex: xxxxxx-xxxxx)" value="" required>
       <small id="iduniquehtml" class="text-muted">
     Vous pouvez obtenir votre identifiant unique, en nous contactant par email, sur votre devis ou facture.
    </small>
      <div class="valid-feedback">
        Ici, tout parait bien
      </div>
    </div>

 
  </div>

 <br> <br> 
  <button name="show_btn" class="btn btn-primary" type="submit">Afficher l'état d'avancement de mon dossier</button> <br /><br />
  <a href="https://happytech63.fr" name="retour" class="btn btn-primary">Retour au site</a>
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


</div>
</section> 




<?php
require_once '/var/www/happytech63/html/assets/inc/smallfooter.php';
?>

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
  <div id="preloader"></div>


  <script src="../../assets/vendor/jquery/jquery.min.js"></script>
  <script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="../../assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="../../assets/vendor/counterup/counterup.min.js"></script>
  <script src="../../assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="../../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../../assets/vendor/venobox/venobox.min.js"></script>
  <script src="../../assets/vendor/aos/aos.js"></script>
  <script src="../../assets/js/main.js"></script>



</body>

</html>