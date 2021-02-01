<!DOCTYPE html>
<html lang="en">
<?php include('bdd_connexion.php'); 
include('fonctions.php');
session_start();
$req_pinv = $bdd->query('SELECT * FROM project_investor WHERE user_account_id=' . $_SESSION['user_account']['id']);
$cpt = 0;
$amount_givent = 0;
while($pinv = $req_pinv->fetch()){
    $cpt = $cpt + 1;
    $amount_givent = $amount_givent + $pinv['amount_given'];
}
$cpt_investors = $bdd->query('SELECT COUNT(*) FROM project_investor')->fetchColumn();

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
    <link href="css/slick.css" rel="stylesheet" >
	
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
                    <a class="nav-link page-scroll" href="#projets">MES PROJETS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="#Reussite">MES REUSSITES</a>
                </li>
                <!-- end of dropdown menu -->
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="#aide">AIDE</a>
                </li>

                <?php if(!isset($_SESSION['user_account'])){ ?>

                    <?php } else { 
                        if($_SESSION['user_account']['type'] == 1) { ?>
                        <li class="nav-item">
                            <a class="nav-link page-scroll" href="espace-producteur.php">ESPACE PRODUCTEUR</a>
                        </li>
                    <?php } } ?>
            </ul>

            <ul class="navbar-nav ml-auto">
            <a class="btn-solid-reg page-scroll" href="index.php">Investir dans de nouveaux projets</a>
            </ul>  
    
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="mon_compte.php">MES INFOS</a>
                </li>
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
                            if($_SESSION['user_account']['type'] == 1) { ?>
                            <div class="section-title">ESPACE INVESTISSEUR </div>
                        <?php } } ?>
                            <div id="counter">
                                <div class="cell">
                                    <div class="counter-value number-count" data-count="<?php echo $cpt ?>"></div>
                                    <div class="counter-info"><br>Projets</div>
                                </div>
                                <div class="cell">
                                    <div class="counter-value number-count" data-count="<?php echo $amount_givent ?>"></div>
                                    <div class="counter-info">€<br>Donnés</div>
                                </div>
                                <div class="cell">
                                    <div class="counter-value number-count" data-count="<?php echo $cpt_investors ?>"></div>
                                    <div class="counter-info">Personnes<br>Engagées</div>
                                </div>
                             </div>

                    </div> <!-- end of col -->
                </div> <!-- end of row -->
            </div> <!-- end of container -->
    </header> <!-- end of header -->
    <!-- end of header -->

   
   <!-- VOS Projets -->
    <div id="projetsE" class="cards-2 slider ">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">PROJETS EN COURS </div>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
            <div class="row">
                <div class="col-lg-12">
                    <!-- Card Slider -->
                    <div class="slider-container">
                        <div class="swiper-container card-slider">
                            <div class="swiper-wrapper">
                                <?php $req_pinv2 = $bdd->query('SELECT * FROM project_investor WHERE user_account_id=' . $_SESSION['user_account']['id']);
                                
                                while($pinvestors = $req_pinv2->fetch()){
                                    $req = $bdd->query('SELECT * FROM project WHERE id=' . $pinvestors['project_id']);
                                    $project = $req->fetch();
                                    $req2 = $bdd->query('SELECT * FROM participant WHERE id=' . $project['participant_id']);
                                    $participant = $req2->fetch();
                                    $req3 = $bdd->query('SELECT * FROM user_account WHERE id=' . $participant['user_account_id']);
                                    $user = $req3->fetch(); ?>
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
                                                    <br>
                                                </div> <!-- end of progress-container -->
                                                <!-- end of progress bars -->

                                            </div> <!-- end of card-body -->

                                            <div class="button-container">
                                                <div class="row">  
                                                    <span class="fa-stack">
                                                        <a class="popup-with-move-anim" href="#video-1"><span class="hexagon"><i class="fas fa-video fa-stack-1x"></i></span></a>                  
                                                    </span>
                                                    <span class="fa-stack">
                                                        <a class="popup-with-move-anim" href="#news-1"><span class="hexagon"><i class="fas fa-newspaper fa-stack-1x"></i></span></a>                  
                                                    </span>
                                                    <span class="fa-stack">
                                                        <a href="user.php?id=<?php echo ($user['id']) ?>"><span class="hexagon"><i class="fas fa-user fa-stack-1x"></i></span></a>                  
                                                    </span>
                                                </div> <!-- end of rol -->
                                            </div> <!-- end of button-container -->   
                                        </div>
                                    </div>
                                <?php } ?>
                                
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
    <div id="video-1" class="lightbox-basic zoom-anim-dialog mfp-hide">
        <div class="row">
            <button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
            <div class="col-lg-12">
                <h3>Nouvelle video de mon projet</h3>
                <!-- Afficher video-->
             </div> <!-- end of col -->
        </div> <!-- end of row -->
    </div> <!-- end of lightbox-basic -->
    <!-- end of lightbox -->

<!-- Project Lightboxes -->
    <!-- Lightbox -->
    <div id="news-1" class="lightbox-basic zoom-anim-dialog mfp-hide">
        <div class="row">
            <button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
            <div class="col-lg-12">
                <h3>News sur mon projet</h3>
                <!-- Afficher news-->
             </div> <!-- end of col -->
        </div> <!-- end of row -->
    </div> <!-- end of lightbox-basic -->
    <!-- end of lightbox -->
    
 

    <!-- Projects -->
	<div id="reussite" class="filter">
		<div class="container">
                    <div class="section-title">PROJETS ACCOMPLIS </div>
            <div class="row">
                <div class="col-lg-12">
                    <!-- Filter -->
                    <div class="button-group filters-button-group">
                        <a class="button is-checked" data-filter="*"><span>TOUS</span></a>
                        <a class="button" data-filter=".legumes"><span>Légumes</span></a>
                        <a class="button" data-filter=".fruits"><span>Fruits</span></a>
                        <a class="button" data-filter=".innovations"><span>Innovations</span></a>
                    </div> <!-- end of button group -->
                    <div class="grid">
                        <div class="element-item legumes">
                            <a class="popup-with-move-anim" href="#project-4"><div class="element-item-overlay"><span> Courgettes Bretonnes </span></div><img src="images/project-4.jpg" alt="alternative"></a>
                        </div>
                        <div class="element-item legumes innovations">
                            <a class="popup-with-move-anim" href="#project-5"><div class="element-item-overlay"><span> Aubergines XXL </span></div><img src="images/project-5.jpg" alt="alternative"></a>
                        </div>
                        <div class="element-item fruit">
                            <a class="popup-with-move-anim" href="#project-6"><div class="element-item-overlay"><span> Citrons des montagnes</span></div><img src="images/project-6.jpg" alt="alternative"></a>
                        </div>
                    </div> <!-- end of grid -->
                    <!-- end of filter -->
                 
                </div> <!-- end of col -->
            </div> <!-- end of row -->
		</div> <!-- end of container -->
    </div> <!-- end of filter -->
    <!-- end of projects -->

    <?php include('aide.php') ?>
    <?php include('footer.php') ?>

    <!-- Copyright -->
    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p class="p-small">Copyright © 2020</p>
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
  