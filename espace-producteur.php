<!DOCTYPE html>
<html lang="en">
<?php include('bdd_connexion.php'); 
include('fonctions.php');
session_start();
$req_part = $bdd->query('SELECT * FROM participant WHERE user_account_id=' . $_SESSION['user_account']['id']);
$participant = $req_part->fetch();
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
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="#reussite">MES REUSSITES</a>
                </li>
                <!-- end of dropdown menu -->

                <li class="nav-item">
                    <a class="nav-link page-scroll" href="#aide">AIDE</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="espace-investisseur.php">ESPACE INVESTISSEUR</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="mon_compte.php">MES INFOS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="index.php">DECONNEXION</a>
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
                            <div class="section-title">ESPACE PRODUCTEUR </div>
                        <?php } } ?>
                        <div id="counter">
                            <div class="cell">
                                <div class="counter-value number-count" data-count="5">1</div>
                                <div class="counter-info">Nombre<br>Projets</div>
                            </div>
                            <div class="cell">
                                <div class="counter-value number-count" data-count="121">1</div>
                                <div class="counter-info">Argent<br>Récolté</div>
                            </div>
                            <div class="cell">
                                <div class="counter-value number-count" data-count="12">1</div>
                                <div class="counter-info">Personnes<br>Engagées</div>
                            </div>
                        </div>

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
                                <?php
                                    $req = $bdd->query('SELECT * FROM project');
                                    while($tmp = $req->fetch()){
                                        //Faire en fonction du status aussi
                                        if($tmp['participant_id'] == $participant['id']){ ?>
                                             <!-- Slide -->
                                            <div class="swiper-slide">
                                                <!-- Card -->
                                                <div class="card">
                                                    <div class="card-image">
                                                        <a class="nav-link page-scroll"  href="projet.php?id=<?php echo ($tmp['id']) ?>"><img class="img-fluid" src="<?php echo(chemin_photo('upload/', $_SESSION['user_account']['user_name']. '/' . $tmp['id']. '/' . 1)) ?>" alt="alternative" ></a>
                                                    </div>
                                                    <div class="card-body">
                                                        <h3 class="card-title"><?php echo $tmp['project_name'] ?></h3>
                                                        <p><?php echo $tmp['project_description_short'] ?></p>
                                                        
                                                        <ul class="list-unstyled li-space-lg">
                                                            <li class="media">
                                                                <i class="fas fa-square"></i>
                                                                <div class="media-body"><?php echo $tmp['collected'] ?></div>
                                                            </li>
                                                            <li class="media">
                                                                <i class="fas fa-square"></i>
                                                                <div class="media-body"><?php echo $tmp['investors'] ?></div>
                                                            </li>                                         
                                                        </ul> <!-- end of points -->
                                                        
                                                        <!-- Progress Bars -->
                                                        <div class="progress-container">
                                                            <div class="price">Cagnotte current/total</div>
                                                            <div class="progress">
                                                                <div class="progress-bar first" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
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
                                                        </div> <!-- end of rol -->
                                                    </div> <!-- end of button-container -->                
                                                    
                                                </div>
                                                <!-- end of card -->
                                             </div> <!-- end of swiper-slide -->
                                            <!-- end of slide -->
                                       <?php } ?>
                                   <?php } ?>
                                
                                <!-- Slide -->
                                <div class="swiper-slide">
                                    <!-- Card -->
                                    <div class="card">
                                        <div class="card-image">
                                            <a class="nav-link page-scroll"  href="projet.php"><img class="img-fluid" src="images/project-5.jpg" alt="alternative" ></a>
                                        </div>
                                        <div class="card-body">
                                            <h3 class="card-title">Aubergines XXL</h3>
                                            <p>Description courte du projet</p>
                                            
                                            <ul class="list-unstyled li-space-lg">
                                                <li class="media">
                                                    <i class="fas fa-square"></i>
                                                    <div class="media-body">Argent récolté</div>
                                                </li>
                                                <li class="media">
                                                    <i class="fas fa-square"></i>
                                                    <div class="media-body">Nombre d'investisseurs</div>
                                                </li>                                         
                                            </ul> <!-- end of points -->
                                            
                                            <!-- Progress Bars -->
                                            <div class="progress-container">
                                                <div class="price">Cagnotte current/total</div>
                                                <div class="progress">
                                                    <div class="progress-bar first" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
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
                                            </div> <!-- end of rol -->
                                        </div> <!-- end of button-container -->                
                                        
                                    </div>
                                    <!-- end of card -->
                                 </div> <!-- end of swiper-slide -->
                                <!-- end of slide -->
                                
                                
                                <!-- Slide -->
                                <div class="swiper-slide">
                                    <!-- Card -->
                                    <div class="card">
                                        <div class="card-image">
                                            <a class="nav-link page-scroll"  href="projet.php"><img class="img-fluid" src="images/project-3.png" alt="alternative" ></a>
                                        </div>
                                        <div class="card-body">
                                            <h3 class="card-title">Clémentines de Marseille</h3>
                                            <p>Description courte du projet </p>
                                            <ul class="list-unstyled li-space-lg">
                                                <li class="media">
                                                    <i class="fas fa-square"></i>
                                                    <div class="media-body">Argent récolté</div>
                                                </li>
                                                <li class="media">
                                                    <i class="fas fa-square"></i>
                                                    <div class="media-body">Nombre d'investisseurs</div>
                                                </li>                                         
                                            </ul> <!-- end of points -->
                                            
                                            <!-- Progress Bars -->
                                            <div class="progress-container">
                                                <div class="price">Cagnotte current/total</div>
                                                <div class="progress">
                                                    <div class="progress-bar second" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
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
                                            </div> <!-- end of rol -->
                                        </div> <!-- end of button-container -->                
                                        
                                    </div>
                                    <!-- end of card -->
                                 </div> <!-- end of swiper-slide -->
                                <!-- end of slide -->
                                
                                
                                <!-- Slide -->
                                <div class="swiper-slide">                                
                                    <!-- Card -->
                                    <div class="card">
                                        <div class="card-image">
                                            <a class="nav-link page-scroll"  href="projet.php"><img class="img-fluid" src="images/project-6.jpg" alt="alternative" ></a>
                                        </div>
                                        <div class="card-body">
                                            <h3 class="card-title"> Citrons </h3>
                                            <p>Description courte du projet</p>
                                            <ul class="list-unstyled li-space-lg">
                                                <li class="media">
                                                    <i class="fas fa-square"></i>
                                                    <div class="media-body">Argent récolté</div>
                                                </li>
                                                <li class="media">
                                                    <i class="fas fa-square"></i>
                                                    <div class="media-body">Nombre d'investisseurs</div>
                                                </li>                                         
                                            </ul> <!-- end of points -->
                                            
                                            <!-- Progress Bars -->
                                            <div class="progress-container">
                                                <div class="price">Cagnotte current/total</div>
                                                <div class="progress">
                                                    <div class="progress-bar second" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
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
                                            </div> <!-- end of rol -->
                                        </div> <!-- end of button-container -->                
                                        
                                    </div>
                                    <!-- end of card -->
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
    <div id="video-1" class="lightbox-basic zoom-anim-dialog mfp-hide">
        <div class="row">
            <button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
            <div class="col-lg-12">
                <h3>Mettre une nouvelle video pour ma communauté</h3>
                <div class="ecolo"><i class="fab fa-envira" size="2x"><em> Le clic écologique : Une vidéo à la fois ! Le moins de contenu est stocké, le plus de banquises seront sauvées</em></i></div><br>
                <br><input type="file" id="video" name="video1" accept="video/*"> 
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
                <h3>Mettre des news pour ma communauté</h3>
                <a class="ecolo"><i class="fab fa-envira" size="2x"><em> Le clic écologique : Un fichier à la fois ! Le moins de contenu est stocké, le plus de banquises seront sauvées</em></i></a><br>
                <br><input type="file" id="news" name="news1" accept=".doc,.pdf"> 
             </div> <!-- end of col -->
        </div> <!-- end of row -->
    </div> <!-- end of lightbox-basic -->
    <!-- end of lightbox -->

 <!-- Projects -->
	<div id="reussite" class="filter">
		<div class="container">
                    <div class="section-title">MES PROJETS ACCOMPLIS </div>
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
                            <a class="popup-with-move-anim" href="#project-1"><div class="element-item-overlay"><span> Carottes de Patrick</span></div><img src="images/project-1.jpg" alt="alternative"></a>
                        </div>
                        <div class="element-item innovations fruits">
                            <a class="popup-with-move-anim" href="#project-2"><div class="element-item-overlay"><span> Fraises hors sol de Brigitte</span></div><img src="images/project-2.jpg" alt="alternative"></a>
                        </div>
                        <div class="element-item fruits">
                            <a class="popup-with-move-anim" href="#project-3"><div class="element-item-overlay"><span> Clémentines Marseillaises</span></div><img src="images/project-3.png" alt="alternative"></a>
                        </div>
                        <div class="element-item legumes">
                            <a class="popup-with-move-anim" href="#project-4"><div class="element-item-overlay"><span> Courgettes Bretonnes </span></div><img src="images/project-4.jpg" alt="alternative"></a>
                        </div>
                        <div class="element-item legumes innovations">
                            <a class="popup-with-move-anim" href="#project-5"><div class="element-item-overlay"><span> Aubergines XXL </span></div><img src="images/project-5.jpg" alt="alternative"></a>
                        </div>
                        <div class="element-item design legumes innovations">
                            <a class="popup-with-move-anim" href="#project-7"><div class="element-item-overlay"><span> Mini salades</span></div><img src="images/project-7.jpg" alt="alternative"></a>
                        </div>
                        <div class="element-item design marketing">
                            <a class="popup-with-move-anim" href="#project-8"><div class="element-item-overlay"><span> Olives provencales</span></div><img src="images/project-8.jpg" alt="alternative"></a>
                        </div>
                    </div> <!-- end of grid -->
                    <!-- end of filter -->
                 
                </div> <!-- end of col -->
            </div> <!-- end of row -->
		</div> <!-- end of container -->
    </div> <!-- end of filter -->
    <!-- end of projects -->

<!-- Project Lightboxes -->
    <!-- Lightbox -->
    <div id="project-1" class="lightbox-basic zoom-anim-dialog mfp-hide">
        <div class="row">
            <button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
            <div class="col-lg-6">
                <img class="img-fluid" src="images/project-1.jpg" alt="alternative">
            </div> <!-- end of col -->
            <div class="col-lg-6">
                <h3>Carottes de Patrick</h3>
                <hr class="line-heading">
                <h6>Légumes</h6>
                <p>Need a solid foundation for your business growth plans? Aria will help you manage sales and meet your current needs</p>
                <p>Si vous êtes interessé par la proposition, cliquez sur "Investir" pour poursuivre les démarches</p>
                <a class="btn-solid-reg" href="#your-link">ANALYSE</a> <a class="btn-outline-reg mfp-close as-button" href="#projects">RETOUR</a> 
            </div> <!-- end of col -->
        </div> <!-- end of row -->
    </div> <!-- end of lightbox-basic -->
    <!-- end of lightbox -->

    <!-- Lightbox -->
    <div id="project-2" class="lightbox-basic zoom-anim-dialog mfp-hide">
        <div class="row">
            <button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
            <div class="col-lg-6">
                <img class="img-fluid" src="images/project-2.jpg" alt="alternative">
            </div> <!-- end of col -->
            <div class="col-lg-6">
                <h3>Fraises hors sol de Brigitte</h3>
                <hr class="line-heading">
                <h6>Fruits</h6>
                <p>Need a solid foundation for your business growth plans? Aria will help you manage sales and meet your current needs</p>
                <p>Si vous êtes interessé par la proposition, cliquez sur "Investir" pour poursuivre les démarches</p>
                <a class="btn-solid-reg" href="#your-link">ANALYSE</a> <a class="btn-outline-reg mfp-close as-button" href="#projects">RETOUR</a> 
            </div> <!-- end of col -->
        </div> <!-- end of row -->
    </div> <!-- end of lightbox-basic -->
    <!-- end of lightbox -->

    <!-- Lightbox -->
    <div id="project-3" class="lightbox-basic zoom-anim-dialog mfp-hide">
        <div class="row">
            <button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
            <div class="col-lg-6">
                <img class="img-fluid" src="images/project-3.png" alt="alternative">
            </div> <!-- end of col -->
            <div class="col-lg-6">
                <h3>Clémentines Marseillaises</h3>
                <hr class="line-heading">
                <h6>Fruits</h6>
                <p>Need a solid foundation for your business growth plans? Aria will help you manage sales and meet your current needs</p>
                <p>Si vous êtes interessé par la proposition, cliquez sur "Investir" pour poursuivre les démarches</p>
                <a class="btn-solid-reg" href="#your-link">ANALYSE</a> <a class="btn-outline-reg mfp-close as-button" href="#projects">RETOUR</a> 
            </div> <!-- end of col -->
        </div> <!-- end of row -->
    </div> <!-- end of lightbox-basic -->
    <!-- end of lightbox -->

    <!-- Lightbox -->
    <div id="project-4" class="lightbox-basic zoom-anim-dialog mfp-hide">
        <div class="row">
            <button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
            <div class="col-lg-6">
                <img class="img-fluid" src="images/project-4.jpg" alt="alternative">
            </div> <!-- end of col -->
            <div class="col-lg-6">
                <h3>Courgettes Bretonnes</h3>
                <hr class="line-heading">
                <h6>Légumes</h6>
                <p>Need a solid foundation for your business growth plans? Aria will help you manage sales and meet your current needs</p>
                <p>Si vous êtes interessé par la proposition, cliquez sur "Investir" pour poursuivre les démarches</p>
                <a class="btn-solid-reg" href="#your-link">ANALYSE</a> <a class="btn-outline-reg mfp-close as-button" href="#projects">RETOUR</a> 
            </div> <!-- end of col -->
        </div> <!-- end of row -->
    </div> <!-- end of lightbox-basic -->
    <!-- end of lightbox -->

    <!-- Lightbox -->
    <div id="project-5" class="lightbox-basic zoom-anim-dialog mfp-hide">
        <div class="row">
            <button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
            <div class="col-lg-6">
                <img class="img-fluid" src="images/project-5.jpg" alt="alternative">
            </div> <!-- end of col -->
            <div class="col-lg-6">
                <h3>Aubergines XXL</h3>
                <hr class="line-heading">
                <h6>Légumes</h6>
                <p>Need a solid foundation for your business growth plans? Aria will help you manage sales and meet your current needs</p>
                <p>Si vous êtes interessé par la proposition, cliquez sur "Investir" pour poursuivre les démarches</p>
                <a class="btn-solid-reg" href="#your-link">ANALYSE</a> <a class="btn-outline-reg mfp-close as-button" href="#projects">RETOUR</a> 
            </div> <!-- end of col -->
        </div> <!-- end of row -->
    </div> <!-- end of lightbox-basic -->
    <!-- end of lightbox -->

    <!-- Lightbox -->
    <div id="project-7" class="lightbox-basic zoom-anim-dialog mfp-hide">
        <div class="row">
            <button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
            <div class="col-lg-6">
                <img class="img-fluid" src="images/project-7.jpg" alt="alternative">
            </div> <!-- end of col -->
            <div class="col-lg-6">
                <h3>Mini salades</h3>
                <hr class="line-heading">
                <h6>Légumes</h6>
                <p>Need a solid foundation for your business growth plans? Aria will help you manage sales and meet your current needs</p>
                <p>Si vous êtes interessé par la proposition, cliquez sur "Investir" pour poursuivre les démarches</p>
                <a class="btn-solid-reg" href="#your-link">ANALYSE</a> <a class="btn-outline-reg mfp-close as-button" href="#projects">RETOUR</a> 
            </div> <!-- end of col -->
        </div> <!-- end of row -->
    </div> <!-- end of lightbox-basic -->
    <!-- end of lightbox -->

    <!-- Lightbox -->
    <div id="project-8" class="lightbox-basic zoom-anim-dialog mfp-hide">
        <div class="row">
            <button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
            <div class="col-lg-6">
                <img class="img-fluid" src="images/project-8.jpg" alt="alternative">
            </div> <!-- end of col -->
            <div class="col-lg-6">
                <h3>Olives provencales</h3>
                <hr class="line-heading">
                <h6>Strategy Development</h6>
                <p>Need a solid foundation for your business growth plans? Aria will help you manage sales and meet your current needs</p>
                <p>Si vous êtes interessé par la proposition, cliquez sur "Investir" pour poursuivre les démarches</p>
                <a class="btn-solid-reg" href="#your-link">ANALYSE</a> <a class="btn-outline-reg mfp-close as-button" href="#projects">RETOUR</a> 
            </div> <!-- end of col -->
        </div> <!-- end of row -->
    </div> <!-- end of lightbox-basic -->
    <!-- end of lightbox -->
    <!-- end of project lightboxes -->
 
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