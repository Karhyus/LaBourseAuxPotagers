<!DOCTYPE html>
<html lang="en">
<?php include('bdd_connexion.php'); 
include('fonctions.php');
session_start();
$req_part = $bdd->query('SELECT * FROM participant WHERE user_account_id=' . $_SESSION['user_account']['id']);
$participant = $req_part->fetch();
$cpt_project = $bdd->query('SELECT COUNT(*) FROM project WHERE participant_id=' . $participant['id'])-> fetchColumn();
$req2 = $bdd->query('SELECT * FROM project WHERE participant_id=' . $participant['id']);
$cpt_recolt = 0;
$cpt_invest = 0;
while($project = $req2->fetch()){
    $cpt_recolt = $cpt_recolt + $project['collected'];
    $cpt_invest = $cpt_invest + $project['investors'];
}  
?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- SEO Meta Tags -->
    <meta name="description" content="Aria is a business focused HTML landing page template built with Bootstrap to help you create lead generation websites for companies and their services.">
    <meta name="author" content="Inovatik">

    <!-- OG Meta Tags to improve the way the post looks when you share the page on LinkedIn, Facebook, Google+ -->
	<meta property="og:site_name" content="" /> <!-- website name -->
	<meta property="og:site" content="" /> <!-- website link -->
	<meta property="og:title" content=""/> <!-- title shown in the actual shared post -->
	<meta property="og:description" content="" /> <!-- description shown in the actual shared post -->
	<meta property="og:image" content="" /> <!-- image link, make sure it's jpg -->
	<meta property="og:url" content="" /> <!-- where do you want your post to link to -->
	<meta property="og:type" content="article" />

    <!-- Website Title -->
    <title>La Bourse aux Potagers</title>
    
    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:500,700&display=swap&subset=latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,600&display=swap&subset=latin-ext" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/fontawesome-all.css" rel="stylesheet">
    <link href="css/swiper.css" rel="stylesheet">
	<link href="css/magnific-popup.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	
	<!-- Favicon  -->
    <link rel="icon" href="images/logosite.png">
</head>
<body data-spy="scroll" data-target=".fixed-top">
    
    <!-- Preloader -->
	<div class="spinner-wrapper">
        <div class="spinner">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>
    <!-- end of preloader -->
    

    <!-- Navbar -->
    <nav class="navbar navbar-expand-md navbar-dark navbar-custom fixed-top">
        <!-- Text Logo - Use this if you don't have a graphic logo -->
        <!-- <a class="navbar-brand logo-text page-scroll" href="index.html">Aria</a> -->

        <!-- Image Logo -->
        <a class="navbar-brand logo-image" href="index.php"><img src="images/logo3.png" alt="alternative"></a>
        
        <!-- Mobile Menu Toggle Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-awesome fas fa-bars"></span>
            <span class="navbar-toggler-awesome fas fa-times"></span>
        </button>
        <!-- end of mobile menu toggle button -->

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="#header">ACCUEIL <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="#projetsE">PROJETS EN COURS</a>
                </li>
                <!-- end of dropdown menu -->

                <li class="nav-item">
                    <a class="nav-link page-scroll" href="#aide">AIDE</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="actions/deconnexion.php">DECONNEXION</a>
                </li>
            </ul>
        </div>
    </nav> <!-- end of navbar -->
    <!-- end of navbar -->
  
     <!-- Header -->
     <header id="header" class="basic-3 counter">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                    <?php if(!isset($_SESSION['user_account'])){ ?>
                        <?php } else { 
                            if($_SESSION['user_account']['type'] == 0) { ?>
                            <div class="section-title">ESPACE ADMIN </div>
                        <?php } } ?>
                    </div> <!-- end of col -->
                </div> <!-- end of row -->
            </div> <!-- end of container -->
    </header> <!-- end of header -->
    <!-- end of header -->
      
   <!-- VOS Projets -->
    <div id="projetsE" class="cards-2 slider filter">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">PROJETS EN COURS <div class="button-group filters-button-group">
                    <a class="btn-solid-reg" href="ajouter.php"> + Ajouter un nouveau projet</a>
                    </div> </div>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
            <div class="row">
                <div class="col-lg-12">
                    <!-- Card Slider -->
                    <div class="slider-container">
                            <div class="swiper-container card-slider">
                                <div class="swiper-wrapper">
                                <?php $req = $bdd->query('SELECT * FROM project ORDER BY id DESC');
                                while($project = $req->fetch()){ 
                                    $req2 = $bdd->query('SELECT * FROM participant WHERE id=' . $project['participant_id']);
                                    $participant = $req2->fetch();
                                    $req3 = $bdd->query('SELECT * FROM user_account WHERE id=' . $participant['user_account_id']);
                                    $user = $req3->fetch();
                                    ?>  
                                    <!-- Slide -->
                                    <div class="swiper-slide">
                                        <!-- Card -->
                                        <div class="card">
                                            <div class="card-image">
                                                <a class="nav-link page-scroll"  href="projet.php?id=<?php echo ($project['id']) ?>"><img class="img-fluid" src="<?php echo(chemin_photo('upload/', $user['user_name']. '/' . $project['id']. '/' . 1)) ?>" alt="alternative" ></a>
                                            </div>
                                            <div class="card-body">
                                                <h3 class="card-title"><?php echo $project['project_name'] ?></h3>
                                                <p><?php echo $project['project_description_short'] ?></p>

                                                <ul class="list-unstyled li-space-lg">
                                                    <li class="media">
                                                        <i class="fas fa-square"></i>
                                                        <div class="media-body"><?php echo intval($project['collected']) ?>€ collectés</div>
                                                    </li>
                                                    <li class="media">
                                                        <i class="fas fa-square"></i>
                                                        <div class="media-body"><?php echo $project['investors'] ?> investisseurs</div>
                                                    </li>                                         
                                                </ul> <!-- end of points -->

                                                <!-- Progress Bars -->
                                                <div class="progress-container">
                                                    <div class="price">Cagnotte <?php echo $project['collected'] ?>€/<?php echo intval($project['goal']) ?>€</div>
                                                    <div class="progress">
                                                        <div class="progress-bar first" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div> <!-- end of progress-container -->
                                                <!-- end of progress bars -->

                                            </div> <!-- end of card-body -->

                                            <div class="button-container">
                                                <div class="row">  
                                                    <span class="fa-stack">
                                                        <a href="#investir?id=<?php echo ($project['id']) ?>"><span class="hexagon"><i class="fas fa-plus fa-stack-1x"></i></span></a>                  
                                                    </span>
                                                    <span class="fa-stack">
                                                        <a href="user.php?id=<?php echo ($user['id']) ?>"><span class="hexagon"><i class="fas fa-user fa-stack-1x"></i></span></a>                  
                                                    </span>
                                                </div> <!-- end of rol -->
                                            </div> <!-- end of button-container -->                

                                        </div>
                                        <!-- end of card -->
                                    </div> <!-- end of swiper-slide -->
                                    <!-- end of slide -->
                                <?php } ?>                                                 <!-- end of card -->
                                </div> <!-- end of swiper-slide -->
                                            <!-- end of slide -->
                            </div> <!-- end of swiper-wrapper -->
        
                            <!-- Add Arrows -->
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                            <!-- end of add arrows -->
        
                        </div> <!-- end of swiper-container -->
                    </div> <!-- end of sliedr-container -->
                    <!-- end of card slider -->

                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of cards-2 -->
    <!-- end of services -->

    <!-- Project Lightboxes -->
    <!-- Lightbox -->
    <div id="investir?id" class="lightbox-basic zoom-anim-dialog mfp-hide">
        <div class="row">
            <button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title">ENTRER LE NOUVEL INVESTISSEUR POUR PROJET A</div>
                        <div class="text-container">
                             <!-- Contact Form -->
                            <form id="inscriptionForm" data-toggle="validator" data-focus="false" method="post" action="forms/espace-admin.php">
                                <div class="form-group">
                                    <input type="email" class="form-control-input" id="cmail" name="projet_investor" required>
                                    <label class="label-control" for="cmail">Email de l'investisseur</label>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">    
                                    <input type="text" class="form-control-input" id="dons" name="amount" required>
                                    <label class="label-control" for="option_max">Montant du don</label>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <input type="hidden" name="redirection" value="<?php 
                                if(isset($_GET['redirection'])){echo $_GET['redirection']; } ?>" />
                                <input class="btn-solid-reg page-scroll" type="submit" value="Enregister"/>
                            </form>
                        </div>
                    </div><!-- end of col --> 
                </div> <!-- end of row -->
            </div> <!-- end of container -->
        </div> <!-- end of row -->
    </div> <!-- end of lightbox-basic -->
    <!-- end of lightbox -->



    <?php include('aide.php') ?>
    <?php include('footer.php') ?>

    <!-- Copyright -->
    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p class="p-small">Copyright © 2020 </p>
                </div> <!-- end of col -->
            </div> <!-- enf of row -->
        </div> <!-- end of container -->
    </div> <!-- end of copyright --> 
    <!-- end of copyright -->
    
    	
    <!-- Scripts -->
    <script src="js/jquery.min.js"></script> <!-- jQuery for Bootstrap's JavaScript plugins -->
    <script src="js/popper.min.js"></script> <!-- Popper tooltip library for Bootstrap -->
    <script src="js/bootstrap.min.js"></script> <!-- Bootstrap framework -->
    <script src="js/jquery.easing.min.js"></script> <!-- jQuery Easing for smooth scrolling between anchors -->
    <script src="js/swiper.min.js"></script> <!-- Swiper for image and text sliders -->
    <script src="js/jquery.magnific-popup.js"></script> <!-- Magnific Popup for lightboxes -->
    <script src="js/morphext.min.js"></script> <!-- Morphtext rotating text in the header -->
    <script src="js/isotope.pkgd.min.js"></script> <!-- Isotope for filter -->
    <script src="js/validator.min.js"></script> <!-- Validator.js - Bootstrap plugin that validates forms -->
    <script src="js/scripts.js"></script> <!-- Custom scripts -->
    
</body>
</html>