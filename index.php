<?php
require_once '/var/www/happytech63/html/assets/php/log.php';

?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">

        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <title>Dépannage informatique sur Clermont-Ferrand / HappyTech63</title>
        <meta name="description" content="HappyTech63 est une équipe de 2 étudiants souhaitant vous aider dans vos problèmes liés a l'informatique. Notre site vous expliquera comment procéder simplement, vous pourrez également en apprendre plus sur nous. HappyTech63 est dédié à vous en apprendre plus en matière de l'informatique." />



        <link href="assets/img/favicon.png" rel="icon">


        <style>
            @import url('https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,100;1,300;1,400;1,500;1,600;1,700&family=Roboto:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap');
        </style>



        <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
        <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
        <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
        <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
        <link href="assets/vendor/aos/aos.css" rel="stylesheet">
        <!-- Script pour afficher la pop up de cookies-->
        <!--
<link rel="stylesheet" href="/assets/css/purecookie.css"  />
<script src="/assets/js/purecookie.js" ></script>
-->

        <link href="assets/css/style.css" rel="stylesheet">



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







        <header id="header" class="fixed-top ">






            <script async src="https://www.googletagmanager.com/gtag/js?id=UA-168787596-1"></script>
            <script>
                window.dataLayer = window.dataLayer || [];
                function gtag(){dataLayer.push(arguments);}
                gtag('js', new Date());

                gtag('config', 'UA-168787596-1');
            </script>


            <div class="container-fluid">

                <div class="row justify-content-center">
                    <div class="col-xl-9 d-flex align-items-center">
                        <h1 class="logo mr-auto"><a href="index.php">HappyTech63</a></h1>


                        <nav class="nav-menu d-none d-lg-block">
                            <ul>
                                <li class="active"><a href="#hero">Accueil</a></li>
                                <li><a href="#questions">Questionnaire</a></li>
                                <li><a href="#work">Notre façon de travailler</a></li>
                                <li><a href="#nous">Nous</a></li>
                                <li><a href="#tarif">Tarifs</a></li>
                                <li><a href="#faq">FAQ</a></li>
                                <li><a href="#contactt">Contact</a></li>
                                <li><a href="/suivie">Suivre mon dossier</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>

            </div>
        </header>




        <section id="hero" class="d-flex align-items-center">



            <div class="container-fluid" data-aos="fade-up">
                <div class="row justify-content-center">
                    <div class="col-xl-5 col-lg-6 pt-3 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
                        <h1>Votre dépannage informatique sur Clermont-Ferrand et alentours</h1>
                        <h2>Nous sommes des étudiants souhaitant vous aider.</h2>





                        <div><a href="#questions" class="btn-get-started scrollto">Comment procéder ?</a></div>
                        <div class="row" ><a href="#nous" class="btn-get-started scrollto">En apprendre davantage sur nous.</a>
                        </div>



                        <br> <br>

                    </div>

                    <div class="col-xl-4 col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="150">
                        <img src="assets/img/iu.png" class="img-fluid animated" alt="">
                    </div>
                </div>
            </div>
        </section>

        <main id="main">


            <section id="questions" class="about">
                <div class="container">

                    <div class="row">
                        <div class="col-lg-6 order-1 order-lg-2" data-aos="zoom-in" data-aos-delay="150">
                            <img src="assets/img/about2.png" class="img-fluid" alt="">
                        </div>
                        <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content" data-aos="fade-right">
                            <h3>Comment procéder ?</h3>
                            <p class="font-italic">
                                Nous avons créé un questionnaire simple et rapide. Celui-ci nous permettra de :</p>

                            <ul>
                                <li><i class="icofont-check-circled"></i> En savoir plus sur votre ou vos problèmes. </li>
                                <li><i class="icofont-check-circled"></i>Mieux nous organiser pour vous aider.</li>
                                <li><i class="icofont-check-circled"></i>Prendre contact avec vous en sécurisant vos données.</li>
                            </ul>

                            <a href="https://bit.ly/Questionnaire-HappyTech" class="read-more">Commencer le questionnaire <i class="icofont-long-arrow-right"></i></a>
                            <br />
                            <br />
                            <p class="font-italic">
                                Si vous êtes déjà inscrits chez nous vous pouvez :</p>
                            <a href="/suivie" class="btn btn-outline-success">Suivre mon dossier en temps réel<i class="icofont-long-arrow-right"></i></a>

                        </div>
                    </div>

                </div>
            </section>


            <!--   <section id="counts" class="counts">
<div class="container">

<div class="row counters">

<div class="col-lg-3 col-6 text-center">
<span data-toggle="counter-up">10</span>
<p>Clients</p>
</div>

<div class="col-lg-3 col-6 text-center">
<span data-toggle="counter-up">20</span>
<p>Types de dépannages</p>
</div>

<div class="col-lg-3 col-6 text-center">
<span data-toggle="counter-up">167</span>
<p>Heures de travail</p>
</div>

<div class="col-lg-3 col-6 text-center">
<span data-toggle="counter-up">2</span>
<p>Techniciens</p>
</div>

</div>

</div>
</section> -->
            <div class="like">
                <section id="counts" class="counts">
                    <h1> Aimez notre page Facebook: <a target="_blank" href="https://www.facebook.com/HappyTech63/">HappyTech63</a></h1>
                </section>

            </div>


            <!-- ======= Features Section ======= -->
            <section id="work" class="features">
                <div class="container" data-aos="fade-up">

                    <div class="section-title">
                        <h2>Notre façon de travailler</h2>
                        <p>Etant donnée que vous ne nous connaissez probablement pas, nous allons vous expliquer brièvement comment nous procéderons pour régler vos problèmes d’informatique.</p>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column align-items-lg-center">
                            <div class="icon-box mt-5 mt-lg-0" data-aos="fade-up" data-aos-delay="100">
                                <i class="bx bx-receipt"></i>
                                <h4>Questionnaire</h4>
                                <p>Tout d'abord, nous avons besoin que vous remplissiez notre questionnaire pour traiter votre demande. <br>À la suite de l'envoie du questionnaire nous étudierons vos réponses. Nous vous contacterons ensuite pour prendre rendez-vous.</p>
                            </div>
                            <div class="icon-box mt-5" data-aos="fade-up" data-aos-delay="200">
                                <i class="bx bx-support"></i>
                                <h4>Intervention</h4>
                                <p>Nous interviendrons si possible sur votre appareil à distance via un logiciel ou à votre domicile si vous préférez. <br> Si vous souhaitez une intervention à distance, nous communiquerons par téléphone ou tout autre moyen.</p>
                            </div>
                            <div class="icon-box mt-5" data-aos="fade-up" data-aos-delay="300">
                                <i class="bx bx-task"></i>
                                <h4>Fin d’intervention</h4>
                                <p> Lorsque nous aurons terminé, nous vous expliquerons en détail ce que nous aurons fait. Vous recevrez alors notre facture accompagnée d’un rapport écrit.</p>
                            </div>
                            <div class="icon-box mt-5" data-aos="fade-up" data-aos-delay="400">
                                <i class="bx bx-shield"></i>
                                <h4>Suivi du dossier</h4>
                                <p> A la suite de notre intervention, si vous constatez que votre problème persiste, vous pourrez bien entendu nous contacter à nouveau. Nous reprendrons alors votre dossier sans frais supplémentaires. <sup>*</sup> <br> *<sub>Dans les 2 semaines après la fin de votre 1ère intervention.</sub></p>
                            </div>
                        </div>
                        <div class="image col-lg-6 order-1 order-lg-2 " data-aos="zoom-in" data-aos-delay="100">
                            <img src="assets/img/features.svg" alt="" class="img-fluid">
                        </div>
                    </div>

                </div>
            </section>


            <section id="nous" class="testimonials section-bg">
                <div class="container" data-aos="fade-left">

                    <div class="section-title">
                        <h2>Nous</h2>
                        <p>Et si on faisait les présentations ... </p>
                    </div>

                    <div class="owl-carousel testimonials-carousel">



                        <div class="testimonial-item">
                            <p>
                                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                Je suis actuellement étudiant en BTS Services Informatiques aux Organisations au lycée Sidoine Apollinaire. <br> Détenteur d’un baccalauréat professionnel, j’ai effectué 22 semaines de stage en entreprise dont 15 semaines au sein d’un Service Après-Vente où j’ai pu dépanner tous types d’objets informatiques. <br> J'ai donc de l'expérience dans le domaine du dépannage et de la maintenance.
                                <br /> Vous pouvez accéder à mon profil : <a  target="_blank" href="https://bit.ly/Linkdin-nicolas" >linkedin</a>
                                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                            </p>
                            <img src="assets/img/testimonials/nico.jpg" class="testimonial-img" alt="">
                            <h3>Nicolas</h3>
                            <h4>Technicien</h4>
                        </div>

                        <div class="testimonial-item">
                            <p>
                                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                Après avoir obtenu un baccalauréat technologique qui m'a permis d’en apprendre beaucoup sur l’informatique, j’ai décidé de m’orienter vers un BTS Services Informatiques aux Organisations. <br> Je passe la plupart de mon temps sur des forums traitant de l’informatique afin d’aider les personnes qui ont du mal avec ces outils. J’aide régulièrement mon entourage de tout âge au moindre problème informatique, je suis très patient et je sais expliquer de manière simple.
                                <br /> Vous pouvez accéder à mon profil : <a  target="_blank" href="https://www.linkedin.com/in/kilian-duran-mascheix/" >linkedin</a>
                                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                            </p>
                            <img src="assets/img/testimonials/kilian.jpg" class="testimonial-img" alt="">
                            <h3>Kilian</h3>
                            <h4>Technicien</h4>
                        </div>

                    </div>

                </div>
            </section>



            <!-- ======= Pricing Section ======= -->
            <section id="tarif" class="pricing section-bgt">
                <div class="container" data-aos="fade-up">

                    <div class="section-title">
                        <h2>Tarifs</h2>
                        <p>Il est important pour nous d'avoir une parfaite transparence sur les prix vis à vis de nos clients.</p>
                    </div>

                    <div class="row">

                        <!-- ======= DEVIS ======= -->
                        <div class="col-lg-3 col-md-6" data-aos="flip-right" data-aos-delay="100">
                            <br />
                            <div class="box featured">
                                <h3>Devis</h3>
                                <h4>Gratuit</h4>
                                <ul>
                                    <li>Nous pouvons proposer un devis pour chacun de vos appareils.</li>
                                </ul>
                                <div class="btn-wrap">
                                    <a href="#questions" class="btn-buy">Demander un devis</a>
                                </div>
                            </div>
                        </div>



                        <!-- ======= Ordinateur ======= -->
                        <div class="col-lg-3 col-md-6" data-aos="flip-right" data-aos-delay="100">
                            <br />
                            <div class="box">
                                <span class="advanced">Possible à distance</span>
                                <h3>Ordinateur</h3>
                                <h4><sub>à partir de</sub>14,90<sup>&nbsp;€</sup> <br></h4>
                                <ul>
                                    <br>
                                    <li>Les dépannages essentiels pour votre ordinateur.</li>


                                </ul>
                                <div class="btn-wrap">
                                    <a href="/additional/price/"  target="_blank" class="btn-buy">Voir tous les tarifs</a>
                                </div>
                            </div>
                        </div>


                        <!-- ======= Tablettes ======= -->
                        <div class="col-lg-3 col-md-6" data-aos="flip-right" data-aos-delay="100">
                            <br />
                            <div class="box">
                                <h3>Tablette</h3>
                                <h4><sub>à partir de</sub>9,90<sup>&nbsp;€</sup><br></h4>
                                <ul>
                                    <li>Les dépannages essentiels pour votre tablette.</li>
                                    <li>+15<sup>€</sup><span> / heure supplémentaire</span> </li>

                                </ul>
                                <div class="btn-wrap">
                                    <a href="/additional/price/" target="_blank" class="btn-buy">Voir tous les tarifs</a>
                                </div>
                            </div>
                        </div>


                        <!-- ======= Téléphone / Smartphone ======= -->

                        <div class="col-lg-3 col-md-6" data-aos="flip-right" data-aos-delay="100">
                            <br />
                            <div class="box">
                                <h3>Téléphone / Smartphone</h3>
                                <h4><sub>à partir de</sub>9,90<sup>&nbsp;€</sup><br></h4>
                                <ul>
                                    <li>Les dépannages essentiels pour votre smartphone.</li>
                                    <li>+15<sup>€</sup><span> / heure supplémentaire</span> </li>

                                </ul>
                                <div class="btn-wrap">
                                    <a href="/additional/price/" target="_blank" class="btn-buy">Voir tous les tarifs</a>
                                </div>
                            </div>
                        </div>


                        <!-- ======= Aide a l'installation  ======= -->
                        <div class="col-lg-3 col-md-6" data-aos="flip-right" data-aos-delay="100">
                            <br />
                            <div class="box">
                                <h3>Aide à l'installation</h3>
                                <h4>29,90<sup>&nbsp;€</sup></h4>
                                <ul>
                                    <li>Installation de vos imprimantes, cameras, materiels audio,...</li>
                                    <li>Formation rapide à son fonctionnement</li>
                                </ul>
                                <div class="btn-wrap">
                                    <a href="/additional/price/" target="_blank" class="btn-buy">En savoir plus</a>
                                </div>
                            </div>
                        </div>



                        <!-- ======= Pack ======= -->

                        <div class="col-lg-3 col-md-6" data-aos="flip-right" data-aos-delay="100">
                            <br />
                            <div class="box featured">
                                <h3>Pack vie privée</h3>
                                <h4>19,90<sup>&nbsp;€</sup></h4>
                                <ul>
                                    <li>Pack de logiciels libres</li>
                                    <li>Conseil pour que votre vie privée soit enfin respectée</li>
                                </ul>
                                <div class="btn-wrap">
                                    <a href="/additional/price/" target="_blank" class="btn-buy">En savoir plus</a>
                                </div>
                            </div>
                        </div>



                        <!-- ======= Aide a l'achat ======= -->

                        <div class="col-lg-3 col-md-6 mt-4 mt-lg-0" data-aos="flip-right" data-aos-delay="100">
                            <br />
                            <div class="box">
                                <h3>Aide à l'achat</h3>
                                <h4>14,90<sup>&nbsp;€</sup></h4>
                                <ul>
                                    <li>Accompagnement à l'achat d'un appareil high-tech suivant vos besoins</li>
                                </ul>
                                <div class="btn-wrap">
                                    <a href="/additional/price/" target="_blank" class="btn-buy">En savoir plus</a>
                                </div>

                            </div>

                        </div>



                        <div class="col-lg-3 col-md-6 mt-4 mt-lg-0" data-aos="flip-right" data-aos-delay="100">
                            <br />
                            <div class="box">
                                <h3>Suivi de dossier</h3>
                                <h4>Gratuit</h4>
                                <ul>
                                    <li>Vous pouvez suivre l'état d'avancement de votre dossier à tout moment.</li>
                                </ul>
                                <div class="btn-wrap">
                                    <a href="/suivie" target="_blank" class="btn-buy">Suivre mon dossier!</a>
                                </div>

                            </div>

                        </div>


                    </div> </div>

            </section>






            <!-- ======= FAQ ======= -->
            <section id="faq" class="faq">
                <div class="container" data-aos="fade-up">

                    <div class="section-title">
                        <h2>FAQ</h2>
                        <p>Vous vous posez sûrement plein de questions sur notre mode de fonctionnement, <br> alors voici des réponses aux questions les plus fréquentes :</p>
                    </div>

                    <div class="faq-list">
                        <ul>
                            <li data-aos="fade-up" data-aos-delay="100">
                                <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" class="collapse" href="#faq-list-1">Comment entrer en contact avec nous ?<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i> </a>
                                <div id="faq-list-1" class="collapse show" data-parent=".faq-list">
                                    <p>
                                        Vous pouvez nous contacter par le biais de notre formulaire <a href="https://bit.ly/Questionnaire-HappyTech">en cliquant ici</a>, via notre adresse e-mail <a href="mailto:HappyTech63000@gmail.com">HappyTech63000@gmail.com</a> ou par téléphone, n’hésitez pas à nous laisser un message vocal.
                                    </p>
                                </div>
                            </li>

                            <li data-aos="fade-up" data-aos-delay="200">
                                <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" href="#faq-list-2" class="collapsed">Que dois-je faire avant une intervention à distance ?<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                                <div id="faq-list-2" class="collapse" data-parent=".faq-list">
                                    <p>
                                        Tout d'abord avant une intervention à distance de notre part, veuillez bien lire les emails que nous vous enverrons. Ensuite, nous vous conseillons vivement de ne pas utiliser votre appareil lorsque nous intervenons dessus. <br> Vous pouvez tout de même regarder votre écran afin observer ce que l'on fait. Nous pourrons prendre contact avec vous par téléphone si vous souhaitez observer notre intervention à distance.
                                    </p>
                                </div>
                            </li>

                            <li data-aos="fade-up" data-aos-delay="300">
                                <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" href="#faq-list-3" class="collapsed">Que dois-je faire avant une intervention à mon domicile ? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                                <div id="faq-list-3" class="collapse" data-parent=".faq-list">
                                    <p>
                                        Avant toute intervention à votre domicile, étant donné les circonstances actuelles nous vous demanderons de nettoyer vos appareils (clavier/souris/écran tactile). <br> Nous vous demanderons également de porter un masque pour éviter toutes contaminations, mais également de respecter les gestes barrières.
                                    </p>
                                </div>
                            </li>


                            <li data-aos="fade-up" data-aos-delay="400">
                                <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" href="#faq-list-4" class="collapsed"> J'ai moins de 16 ans et je souhaite votre aide. Comment dois-je faire ? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                                <div id="faq-list-4" class="collapse" data-parent=".faq-list">
                                    <p>
                                        Si vous avez moins de 16 ans, discutez avec vos parents ou vos responsables légaux de l’opportunité d’utiliser nos services.<br>  Nous aurons besoin de l’accord de vos responsables via un document écrit (signé) ou email afin d’établir votre dossier et le traiter. (en conformité avec l'<a href="https://www.privacy-regulation.eu/fr/8.htm">article 8 du RGPD </a>)</p>
                                </div>
                            </li>



                            <li data-aos="fade-up" data-aos-delay="500">
                                <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" href="#faq-list-5" class="collapsed">Proposez-vous des formations sur des logiciels ? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                                <div id="faq-list-5" class="collapse" data-parent=".faq-list">
                                    <p>
                                        Pour le moment non, mais nous sommes en train de travailler sur cette éventualité.
                                    </p>
                                </div>
                            </li>

                        </ul>
                    </div>


                </div>

            </section>


            <!-- ======= Contact Section ======= -->
            <section id="contactt" class="contact section-bg">
                <div class="container" data-aos="fade-up">




                    <div class="section-title">
                        <h2>Contact</h2>
                        <p> Vous pouvez nous contacter de différentes façons. Nous nous ferons un plaisir de vous répondre dans les meilleurs délais.</p>
                    </div>



                    <div class="card-group" data-aos="flip-down">




                        <div class="card">

                            <div class="card-body text-center">
                                <h5 class="card-title">Notre adresse email</h5>
                                <p class="card-text"><a href="mailto:HappyTech63000@gmail.com">HappyTech63000@gmail.com</a></p>
                            </div>
                        </div>



                        <div class="card">

                            <div class="card-body text-center">
                                <h5 class="card-title">Numéro de téléphone</h5>
                                <p class="card-text">Bientot disponible</p>
                            </div>
                        </div>


                        <div class="card">


                            <div class="card-body text-center">
                                <h5 class="card-title">Formulaire de contact</h5>
                                <p class="card-text">  <a href="https://bit.ly/Questionnaire-HappyTech">Disponible en cliquant ici </a> </p>
                            </div>
                        </div>

                    </div>
                    <br>

                    <div class="card" data-aos="flip-down" >
                        <div class="card-body text-center">
                            <h5 class="card-title">Abonnement à notre newsletter</h5>
                            <p class="card-text">Vous pouvez vous abonner à notre newsletter afin de connaitre toute nos nouveautés.</p>
                            <a href="/additional/letter" target="_blank" class="btn btn-primary">En savoir plus</a>

                        </div>

                    </div>


                </div>


            </section>

        </main>

        <?php require 'assets/inc/footer.php' ?>

        <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
        <div id="preloader"></div>


        <script src="assets/vendor/jquery/jquery.min.js"></script>
        <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>

        <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
        <script src="assets/vendor/counterup/counterup.min.js"></script>
        <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
        <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
        <script src="assets/vendor/venobox/venobox.min.js"></script>
        <script src="assets/vendor/aos/aos.js"></script>

        <script src="assets/js/main.js"></script>

    </body>

</html>

