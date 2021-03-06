<!DOCTYPE html>
<html lang="en">
<?php include('bdd_connexion.php'); 
include('fonctions.php');
session_start();
$req = $bdd->query('SELECT * FROM project WHERE id = ' . $_GET['id']);
$tmp = $req->fetch();
$req2 = $bdd->query('SELECT * FROM participant WHERE id=' . $tmp['participant_id']);
$participant = $req2->fetch();
$req3 = $bdd->query('SELECT * FROM user_account WHERE id=' . $participant['user_account_id']);
$user = $req3->fetch();
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
            
            <ul class="navbar-nav ml-auto">
                <?php if(!isset($_SESSION['user_account']['id'])){ ?>
                    <a class="btn-solid-reg page-scroll" href="connexion.php">Connectez-vous</a>
            	<?php }else{ if($_SESSION['user_account']['id'] == $participant['user_account_id']){ ?>
            		<a class="btn-solid-reg page-scroll" href="modif_projet.php?id=<?php echo $tmp['id'] ?>">Modifier (P)</a>
            	<?php }else { ?>
            		<a class="btn-solid-reg page-scroll" href="<?php if($tmp['lydia']!=''){ echo $tmp['lydia'];} ?>">Investir (I)</a>
            	<?php }?>
                <?php } ?>	
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
                        <span class="fa-stack ">
                                <a class ="white" href="user.php?id=<?php echo $user['id'] ?>"><?php echo $user['user_name']  ?><span class="hexagon "><i class="fas fa-user fa-stack-1x"></i></span></a>             
                        </span>  
                    </div> <!-- end of text-container --> 
                </div> <!-- end of col -->
                <div class="col-lg-6">
                        <div class="image-container">
                            <img class="img-fluid" src="<?php echo(chemin_photo('upload/', $user['user_name']. '/' . $tmp['id']. '/' . 1)) ?>" alt="alternative">
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
                    <div class="section-title">PHOTOS</div>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
            <div class="row">
                <div class="col-lg-12">
                    
                    <!-- Card Slider -->
                    <div class="slider-container">
                        <div class="swiper-container card-sliderbis">
                            <div class="swiper-wrapper">
                            	<?php if(file_exists(file_existance('upload/', $user['user_name']. '/' . $tmp['id']. '/' . 1))){ ?>
                            		<div class="swiper-slide">
                                        <img class="img-fluid" src="<?php echo(chemin_photo('upload/', $user['user_name']. '/' . $tmp['id']. '/' . 1)) ?>" alt="alternative">
                                    </div>
                                <?php } ?>
                                <?php if(file_exists(file_existance('upload/', $user['user_name']. '/' . $tmp['id']. '/' . 2))){ ?>
                                	<!-- Slide -->
                               		<div class="swiper-slide">
                                    	<img class="img-fluid" src="<?php echo(chemin_photo('upload/', $user['user_name']. '/' . $tmp['id']. '/' . 2)) ?>" alt="alternative" >
                                	</div>
                                <?php } ?>
                                <?php if(file_exists(file_existance('upload/', $user['user_name']. '/' . $tmp['id']. '/' . 3))){ ?>
	                                <!-- Slide -->
	                                <div class="swiper-slide">
	                                    <img class="img-fluid" src="<?php echo(chemin_photo('upload/', $user['user_name']. '/' . $tmp['id']. '/' . 3)) ?>" alt="alternative" >
	                                </div>
	                            <?php } ?>
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

                    </div> <!-- end of text-container -->
                    
                    <div class="text-container">
                        <h4>Localisation</h4>
                        <<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d83998.75786876524!2d2.276848183603692!3d48.85895057719529!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66e1f06e2b70f%3A0x40b82c3688c9460!2sParis!5e0!3m2!1sfr!2sfr!4v1612084975213!5m2!1sfr!2sfr" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
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
                                                        <a class="nav-link page-scroll"  href="projet.php?id=<?php echo ($tmp2['id']) ?>"><img class="img-fluid" src="<?php echo(chemin_photo('upload/', $user['user_name']. '/' . $tmp2['id']. '/' . 1)) ?>" alt="alternative" ></a>
                                                    </div>
                                                    <div class="card-body">
                                                        <h3 class="card-title"><?php echo $tmp2['project_name'] ?></h3>
                                                        <p><?php echo $tmp2['project_description_short'] ?></p>
                                                        
                                                        <ul class="list-unstyled li-space-lg">
                                                            <li class="media">
                                                                <i class="fas fa-square"></i>
                                                                <div class="media-body"><?php echo $tmp2['collected'] ?>€ collectés</div>
                                                            </li>
                                                            <li class="media">
                                                                <i class="fas fa-square"></i>
                                                                <div class="media-body"><?php echo $tmp2['investors'] ?> investisseurs</div>
                                                            </li>                                         
                                                        </ul> <!-- end of points -->
                                                        
                                                        <!-- Progress Bars -->
                                                        <div class="progress-container">
                                                            <div class="price">Cagnotte <?php echo $tmp2['collected'] ?>€/<?php echo intval($tmp2['goal']) ?>€</div>
                                                        <br>
                                                        </div> <!-- end of progress-container -->
                                                        <!-- end of progress bars -->
                                                        
                                                    </div> <!-- end of card-body -->
                                                    
                                                    <div class="button-container">
                                                        <div class="row">  
                                                        <span class="fa-stack">
                                                            <a href="projet.php?id=<?php echo ($tmp2['id']) ?>"><span class="hexagon"><i class="fas fa-eye fa-stack-1x"></i></span></a>                  
                                                        </span>
                                                        <span class="fa-stack">
                                                            <a href="user.php?id=<?php echo($user['id']) ?>"><span class="hexagon"><i class="fas fa-user fa-stack-1x"></i></span></a>                  
                                                        </span>
                                                        </div> <!-- end of rol -->
                                                    </div> <!-- end of button-container -->                
                                                    
                                                </div>
                                                <!-- end of card -->
                                             </div> <!-- end of swiper-slide -->
                                            <!-- end of slide -->
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
