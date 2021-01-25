<!DOCTYPE html>
<html lang="en">
<?php
include('bdd_connexion.php'); 
session_start(); 
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
                <a class="nav-link page-scroll" href="javascript:history.back()"> RETOUR <span class="sr-only">(current)</span></a>
            </li>

                <!-- Dropdown Menu -->          
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle page-scroll" id="navbarDropdown" role="button" aria-haspopup="true" aria-expanded="false">ABOUT</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="terms-conditions.php"><span class="item-text">TERMS CONDITIONS</span></a>
                        <div class="dropdown-items-divide-hr"></div>
                        <a class="dropdown-item" href="privacy-policy.php"><span class="item-text">PRIVACY POLICY</span></a>
                    </div>
                </li>
                <!-- end of dropdown menu -->

                <li class="nav-item">
                    <a class="nav-link page-scroll" href="#aide">AIDE</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
            </ul>
        </div>
    </nav> <!-- end of navbar -->
    <!-- end of navbar -->
  
     <!-- Profil -->
     <div id="profil" class="basic-3">
        <div class="container">
            <div class="section-title"> MON COMPTE</div>
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="whiteC white"><?php echo $_SESSION['user_account']['user_name'] ?></h2>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of basic-1 -->
    <!-- end of Partenaire -->

<!-- Changement  -->
<div class="cards-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">AJOUTER UN PROJET</div>
                        <div class="text-container">
                             <!-- Contact Form -->
                            <form id="ajouterProjetForm" data-toggle="validator" data-focus="false" method="post" action="forms/ajouter.php">
                                <?php 
                                if(isset($_GET['erreur'])){
                                    if ($_GET['erreur'] == true) {?><p style="color:red">Ce mail est déjà utilisé.</p> <?php } 
                                }
                                ?>
                                <div class="form-group">
                                    <input type="text" class="form-control-input" id="project_name" name="project_name" required>
                                    <label class="label-control" for="cusername">Nom du projet</label>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <textarea form="ajouterProjetForm" class="form-control-input" id="project_description_short" maxlength="140" name="project_description_short" required></textarea>
                                    <label class="label-control" for="cnom">Description courte</label>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                <label for="photo">Mettre vos photos du projets</label> <br>
                                    <input type="file" id="photo" name="photo1" accept="image/png, image/jpeg, image/jpg"> 
                                    <input type="file" id="photo" name="photo1" accept="image/png, image/jpeg, image/jpg"> 
                                    <input type="file" id="photo" name="photo1" accept="image/png, image/jpeg, image/jpg">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control-input" id="project_localisation" name="project_localisation" required>
                                    <label class="label-control" for="cprenom">Localisation</label>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <!-- PENSER à convertir le text en float -->
                                    <input type="number" min = "0" class="form-control-input" id="goal" name="goal" required>
                                    <label class="label-control" for="cbirthdate">Objectif financier</label>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <textarea form="ajouterProjetForm" class="form-control-textarea" id="project_description_long" name="project_description_long" required></textarea>
                                    <label class="label-control" for="cnom">Description longue</label>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group">
                                    <label for="group-select"></label>
                                    <select id="cgroup" class = "label-control">
                                        <option value="">Type de produit ...</option>
                                        <option value="legume">Légumes</option>
                                        <option value="fruit">Fruits</option>
                                    </select>
                                </div>

                                <div class="form-group checkbox">
                                    <input type="checkbox" id="innovation" value="innovation" required> Est-ce que c'est un projet innovant
                                    <div class="help-block with-errors"></div>
                                </div>



                                <div class="section-title" name ="counterpart_name" >CRITERE DE DONS N°1</div>
                                <div class="form-group">    
                                    <input type="number" min="0" class="form-control-input" id="don_min" name="option_min" minlength="8" required>
                                    <label class="label-control" for="cmdp">Don minimum</label>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">    
                                    <input type="number" min = "0" class="form-control-input" id="don_max" name="option_max" minlength="8" required>
                                    <label class="label-control" for="cmdp">Don maximum</label>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">    
                                    <input type="text" class="form-control-input" id="counter" name="counterpart_description" minlength="8" required>
                                    <label class="label-control" for="cmdp">En échange du don</label>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="section-title" name ="counterpart_name" >CRITERE DE DONS N°2</div>
                                <div class="form-group">    
                                    <input type="number" min="0" class="form-control-input" id="don_min" name="option_min" minlength="8" required>
                                    <label class="label-control" for="cmdp">Don minimum</label>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">    
                                    <input type="number" min = "0" class="form-control-input" id="don_max" name="option_max" minlength="8" required>
                                    <label class="label-control" for="cmdp">Don maximum</label>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">    
                                    <input type="text" class="form-control-input" id="counter" name="counterpart_description" minlength="8" required>
                                    <label class="label-control" for="cmdp">En échange du don</label>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="section-title" name ="counterpart_name" >CRITERE DE DONS N°3</div>
                                <div class="form-group">    
                                    <input type="number" min="0" class="form-control-input" id="don_min" name="option_min" minlength="8" required>
                                    <label class="label-control" for="cmdp">Don minimum</label>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">    
                                    <input type="number" min = "0" class="form-control-input" id="don_max" name="option_max" minlength="8" required>
                                    <label class="label-control" for="cmdp">Don maximum</label>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">    
                                    <input type="text" class="form-control-input" id="counter" name="counterpart_description" minlength="8" required>
                                    <label class="label-control" for="cmdp">En échange du don</label>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <input type="hidden" name="redirection" value="<?php 
                                if(isset($_GET['redirection'])){echo $_GET['redirection']; } ?>" />
                                <input class="btn-solid-reg page-scroll" type="submit" value="Enregistrer"/>
                            </form>
                        </div>

                    </div><!-- end of col --> 
                </div> <!-- end of row -->
            </div> <!-- end of container -->
        </div> <!-- end of header-content -->
    </header> <!-- end of header -->
    <!-- end of header -->
    
  <!-- Aide -->
    <div id="aide" class="form-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="text-container">
                        <div class="section-title">Aide</div>
                        <h2>Un problème ?</h2>
                        <p>N'hésitez pas, nous sommes là pour vous</p>
                        <ul class="list-unstyled li-space-lg">
                            <li class="address"><i class="fas fa-map-marker-alt"></i>37, Quai de grenelle 75015 Paris</li>
                            <li><i class="fas fa-phone"></i><a href="tel:0601172202">0601172202</a></li>
                            <li><i class="fas fa-envelope"></i><a href="mailto:bourseauxpotagers@gmail.com">bourseauxpotagers@gmail.com</a></li>
                        </ul>
                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
                <div class="col-lg-6">
                    
                    <!-- Contact Form -->
                    <form id="contactForm" data-toggle="validator" data-focus="false">
                        <div class="form-group">
                            <input type="text" class="form-control-input" id="cname_contact" required>
                            <label class="label-control" for="cname_contact">Nom et Prénom </label>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control-input" id="cemail_contact" required>
                            <label class="label-control" for="cemail_contact">Email</label>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control-textarea" id="cmessage" required></textarea>
                            <label class="label-control" for="cmessage">Ton message </label>
                            <div class="help-block with-errors"></div>
                        </div>
                 <!-- 
                        <div class="form-group checkbox">
                            <input type="checkbox" id="cterms" value="Agreed-to-Terms" required>I agree with Aria's stated <a href="privacy-policy.html">Privacy Policy</a> and <a href="terms-conditions.html">Terms Conditions</a> 
                            <div class="help-block with-errors"></div>
                        </div>
                    -->
                        <div class="form-group">
                            <button type="submit" class="form-control-submit-button">CLIQUE et on te répondra au plus vite</button>
                        </div>
                        <div class="form-message">
                            <div id="cmsgSubmit" class="h3 text-center hidden"></div>
                        </div>
                    </form>
                    <!-- end of contact form -->

                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of form-2 -->
    <!-- end of contact -->
    

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
