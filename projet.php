<!DOCTYPE html>
<html lang="en">
<?php include('bdd_connexion.php'); 
include('fonctions.php');
session_start();
$req = $bdd->query('SELECT * FROM project WHERE id = ' . $_GET['id']);
$tmp = $req->fetch();
$req2 = $bdd->query('SELECT * FROM user_account WHERE id=' . $tmp['participant_id']);
$user = $req2->fetch();
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
                        <a class="nav-link page-scroll" href="#resume">RESUME<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="#photo">PHOTOS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="#projet">PROJET</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="#autre">AUTRES PROJETS</a>
                    </li>
            </ul>
            <span class="fa-stack">
                    <a href="user.php"><span class="hexagon "><i class="fas fa-user fa-stack-1x"></i></span></a>             
            </span>  
            
            <ul class="navbar-nav ml-auto">
            <a class="btn-solid-reg page-scroll" href="lien cagnotte lydia">Investir (I) OU Modifier (P)</a>
            </ul>  
    
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="javascript:history.back()">RETOUR <span class="sr-only">(current)</span></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link page-scroll" href="#aide">AIDE</a>
                </li>
            </ul>
        </div>
    </nav> <!-- end of navbar -->
    <!-- end of navbar -->


     <!-- Resume -->
    <div id="resume" class="basic-3">
        <div class="container">
            <div class="section-title">RESUME DU PROJET</div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="text-container">
                        <h2 class = "white"><?php echo $tmp['project_name'] ?></h2>
                        <p class = "white"><?php echo $tmp['project_description_short'] ?></p>
                        <p class="testimonial-text white">"Our mission here at Aira is to get you through those tough moments relying on our team's expertise in starting and growing companies."</p>                    
                        <span class="fa-stack ">
                                <a class ="white" href="user.php?id=<?php echo $user['id'] ?>"><?php echo $user['user_name']  ?><span class="hexagon "><i class="fas fa-user fa-stack-1x"></i></span></a>             
                        </span>  
                    </div> <!-- end of text-container --> 
                </div> <!-- end of col -->
                <div class="col-lg-6">
                        <div class="image-container">
                            <img class="img-fluid" src="<?php echo(chemin_photo('upload/', $_SESSION['user_account']['user_name']. '/' . $tmp['id']. '/' . 1)) ?>" alt="alternative">
                        </div> <!-- end of image-container -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of basic-3 -->
    <!-- end of Partenaire -->
   
    <!--Image-->
    <div id="photo" class="slider">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">IMAGES</div>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
            <div class="row">
                <div class="col-lg-12">
                    
                    <!-- Card Slider -->
                    <div class="slider-container">
                        <div class="swiper-container card-slider">
                            <div class="swiper-wrapper">

                                <!-- Slide -->
                                <div class="swiper-slide">
                                    <img class="img-fluid" src="<?php echo(chemin_photo('upload/', $_SESSION['user_account']['user_name']. '/' . $tmp['id']. '/' . 1)) ?>" alt="alternative" >
                                </div>
                                <!-- Slide -->
                                <div class="swiper-slide">
                                    <img class="img-fluid" src="<?php echo(chemin_photo('upload/', $_SESSION['user_account']['user_name']. '/' . $tmp['id']. '/' . 2)) ?>" alt="alternative" >
                                </div>
                                <!-- Slide -->
                                <div class="swiper-slide">
                                    <img class="img-fluid" src="<?php echo(chemin_photo('upload/', $_SESSION['user_account']['user_name']. '/' . $tmp['id']. '/' . 3)) ?>" alt="alternative" >
                                </div>
                    </div> <!-- end of swiper-wrapper -->
                        </div> <!-- end of swiper-container -->
                    </div> <!-- end of sliedr-container -->
                    <!-- end of card slider -->
                </div>
            </div>
        </div>
    </div>
        


    <!-- Terms Content -->
    <div class="ex-basic-2 tabs">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">LE PROJET EN DETAIL</div>
                    <div class="text-container">
                        <p><?php echo $tmp['project_description_long'] ?></p>
                        <p>When you first register for a Aria account, and when you use the Services, we collect some <a class="green" href="#your-link">Personal Information</a> about you such as:</p>
                        <ul class="list-unstyled">
                            <li class="media">
                                <i class="fas fa-square"></i>
                                <div class="media-body"> <p>The geographic area where you use your computer and mobile devices</p></div>
                            </li>
                            <li class="media">
                                <i class="fas fa-square"></i>
                                <div class="media-body"><p>Your full name, username, and email address and other contact details</p></div>
                            </li>
                            <li class="media">
                                <i class="fas fa-square"></i>
                                <div class="media-body"><p>Your full name, username, and email address and other contact details</p></div>
                            </li>
                            <li class="media">
                                <i class="fas fa-square"></i>
                                <div class="media-body"><p>Your full name, username, and email address and other contact details</p></div>
                            </li>
                            <li class="media">
                                <i class="fas fa-square"></i>
                                <div class="media-body"><p>Your full name, username, and email address and other contact details</p></div>
                            </li>
                            <li class="media">
                                <i class="fas fa-square"></i>
                                <div class="media-body"><p>Your full name, username, and email address and other contact details</p></div>
                            </li>
                        </ul>
                    </div> <!-- end of text-container -->
                    
                    <div class="text-container">
                        <h4>Localisation</h4>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2763.7007694423496!2d-1.3391071846688374!3d46.156704379115205!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4803fed16f83bd8b%3A0xaf75a1b1294ae082!2s7%20Rue%20des%20Acacias%2C%2017740%20Sainte-Marie-de-R%C3%A9!5e0!3m2!1sfr!2sfr!4v1610442497531!5m2!1sfr!2sfr" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                    </div> <!-- end of text-container -->

                    <div class="text-container">
                        <h4> Catégories de dons</h4>
                        <div class="tabs">
                            <div class="area-3">
                                <div class="tabs-containerbis">

                                    <!-- Tabs Links -->
                                    <ul class="nav nav-tabs" id="ariaTabs" role="tablist">
                                        <?php
                                        $req3 = $bdd->query('SELECT * FROM counterpart WHERE project_id='. $tmp['id']);
                                        $inc = 1;
                                        while($ct = $req3->fetch()){ ?>
                                            <li class="nav-item">
                                            <a class="nav-link" id="nav-tab-<?php echo ($inc) ?>" data-toggle="tab" href="#tab-<?php echo ($inc) ?>" role="tab" aria-controls="tab-<?php echo ($inc) ?>" aria-selected="false"><i class="fas fa-wallet"></i><?php echo $ct['counterpart_name'] ?> (de <?php echo $ct['option_min'] ?>€ à <?php echo $ct['option_max']?>€)</a>
                                            </li>
                                        <?php
                                            $inc = $inc + 1;
                                        }
                                        ?> 
                                    </ul>
                                    <!-- end of tabs links -->

                                    <!-- Tabs Content -->
                                    <div class="tab-content" id="ariaTabsContent">
                                        <?php
                                        $req4 = $bdd->query('SELECT * FROM counterpart WHERE project_id='. $tmp['id']);
                                        $inc = 1;
                                        while($ct2 = $req4->fetch()){

                                        ?>
                                            <!-- Tab -->
                                            <div class="tab-pane fade" id="tab-<?php echo ($inc) ?>" role="tabpanel" aria-labelledby="tab-<?php echo ($inc) ?>">
                                                <p><?php echo $ct2['counterpart_description'] ?></p>
                                                <a class="btn-solid-reg page-scroll" href="lien cagnotte lydia">Investir</a>
                                            </div> <!-- end of tab-pane -->
                                        <?php 
                                          $inc = $inc + 1;  
                                        }
                                        ?>
                                    </div> <!-- end of tab-content -->
                                    <!-- end of tabs content -->  

                                      

                                    

                                </div> <!-- end of tabs-container -->
                            </div><!-- end of area-1 on same line and no space between comments to eliminate margin white space -->
                        </div> <!-- end of tabs -->
                        <!-- end of details 2 -->
                    </div> <!-- end of text-container -->

                    <div class="text-container">
                        <h4>Designer Membership And How It Applies</h4>
                        <p>By using any of the Services, or submitting or collecting any Personal Information via the Services, you consent to the collection, transfer, storage disclosure, and use of your Personal Information in the manner set out in this Privacy Policy. If you do not consent to the use of your Personal Information in these ways, please stop using the Services.</p>
                    </div> <!-- end of text-container -->
                    
                    <div class="text-container last">
                        <h4>Assets Used In The Live Preview Content</h4>
                        <p>Aria Landing Page uses tracking technology on the landing page, in the Applications, and in the Platforms, including mobile application identifiers and a unique Hootsuite user ID to help us recognize you across different Services, to monitor usage and web traffic routing for the Services, and to customize and improve the Services. By visiting Aria or using the Services you agree to the use of cookies in your browser and HTML-based emails. Cookies are small text files placed on your device when you visit a <a class="green" href="#your-link">web site</a> in order to track use of the site and to improve your user experience.</p>
                    </div> <!-- end of text-container -->
                </div>
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of ex-basic -->
    <!-- end of terms content -->
    
   <!-- Autre Projets -->
    <div id="autre" class="cards-2 slider ">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">LES AUTRES PROJETS</div>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
            <div class="row">
                <div class="col-lg-12">
                    
                    <!-- Card Slider -->
                    <div class="slider-container">
                        <div class="swiper-container card-slider">
                            <div class="swiper-wrapper">
                                <?php
                                    $req4 = $bdd->query('SELECT * FROM project WHERE participant_id=' . $tmp['participant_id'] . ' AND id!=' . $tmp['id']);
                                    while($tmp2 = $req4->fetch()){ ?>
                                        <!-- Slide -->
                                            <div class="swiper-slide">
                                                <!-- Card -->
                                                <div class="card">
                                                    <div class="card-image">
                                                        <a class="nav-link page-scroll"  href="projet.php?id=<?php echo ($tmp2['id']) ?>"><img class="img-fluid" src="<?php echo(chemin_photo('upload/', $_SESSION['user_account']['user_name']. '/' . $tmp2['id']. '/' . 1)) ?>" alt="alternative" ></a>
                                                    </div>
                                                    <div class="card-body">
                                                        <h3 class="card-title"><?php echo $tmp2['project_name'] ?></h3>
                                                        <p><?php echo $tmp2['project_description_short'] ?></p>
                                                        
                                                        <ul class="list-unstyled li-space-lg">
                                                            <li class="media">
                                                                <i class="fas fa-square"></i>
                                                                <div class="media-body"><?php echo $tmp2['collected'] ?></div>
                                                            </li>
                                                            <li class="media">
                                                                <i class="fas fa-square"></i>
                                                                <div class="media-body"><?php echo $tmp2['investors'] ?></div>
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
                                                    <a href="#your-link"><span class="hexagon"><i class="fas fa-eye fa-stack-1x"></i></span></a>                  
                                                </span>
                                                <span class="fa-stack">
                                                    <a href="#your-link"><span class="hexagon"><i class="fas fa-user fa-stack-1x"></i></span></a>                  
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
                                                    <a href="#your-link"><span class="hexagon"><i class="fas fa-eye fa-stack-1x"></i></span></a>                  
                                                </span>
                                                <span class="fa-stack">
                                                    <a href="#your-link"><span class="hexagon"><i class="fas fa-user fa-stack-1x"></i></span></a>                  
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
                                                    <a href="#your-link"><span class="hexagon"><i class="fas fa-eye fa-stack-1x"></i></span></a>                  
                                                </span>
                                                <span class="fa-stack">
                                                    <a href="#your-link"><span class="hexagon"><i class="fas fa-user fa-stack-1x"></i></span></a>                  
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
