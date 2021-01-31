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

    <script type="text/javascript" src="jquery.js"></script>
    <script type="text/javascript">
        function add_counterpart()
        {
            $lino=$("#counterpart_list li").length;
            $lino=$lino+1;
            $("#counterpart_list li:last").after("<li class='nav-item' id='counterpart_"+$lino+"'><div class='section-title' name='counterpart'>CRITERE DE DONS N°"+$lino+"</div><div class='form-group'><input type='text' class='form-control-input' id='counterpart_name' name='counterpart_name[]' required><label class='label-control' for='counterpart_name'>Nom de la contrepartie</label><div class='help-block with-errors'></div></div><div class='form-group'><input type='text' class='form-control-input' id='option_min' name='option_min[]' required><label class='label-control' for='option_min'>Don minimum</label><div class='help-block with-errors'></div></div><div class='form-group'><input type='text' class='form-control-input' id='option_max' name='option_max[]' required><label class='label-control' for='option_max'>Don maximum</label><div class='help-block with-errors'></div></div><div class='form-group'><textarea form='ajouterProjetForm' class='form-control-input' id='counterpart_description' name='counterpart_description[]' required></textarea><label class='label-control' for='counterpart_description'>En échange du don</label><div class='help-block with-errors'></div></div></li>");
        }
    </script>

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
                <a class="nav-link page-scroll" href="javascript:history.back()">RETOUR<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link page-scroll" href="#aide">AIDE</a>
            </li>
            </ul>
        </div>
    </nav> <!-- end of navbar -->
    <!-- end of navbar -->
  
     <!-- Profil -->
     <div id="profil" class="basic-3">
        <div class="container">
            <div class="section-title">MON COMPTE</div>
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="whiteC white"><?php echo $_SESSION['user_account']['user_name'] ?></h2>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of basic-3 -->
    <!-- end of Partenaire -->

<!-- Changement  -->
<div class="cards-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">AJOUTER UN PROJET</div>
                        <div class="text-container">
                             <!-- Contact Form -->
                            <form id="ajouterProjetForm" data-toggle="validator" data-focus="false" method="post" action="forms/ajouter.php" enctype="multipart/form-data">
                                <?php 
                                if(isset($_GET['erreur'])){
                                    if ($_GET['erreur'] == true) {?><p style="color:red">Une erreur est survenue veuillez réessayer s'il vous plaît.</p> <?php } 
                                }
                                ?>
                                <div class="form-group">
                                    <input type="text" class="form-control-input" id="project_name" name="project_name" required>
                                    <label class="label-control" for="project_name">Nom du projet</label>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <textarea form="ajouterProjetForm" class="form-control-input" id="project_description_short" maxlength="140" name="project_description_short" required></textarea>
                                    <label class="label-control" for="project_description_short">Description courte</label>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <textarea form="ajouterProjetForm" class="form-control-textarea" id="project_description_long" name="project_description_long" required></textarea>
                                    <label class="label-control" for="project_description_long">Description longue</label>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                <label for="photo">Mettre vos photos du projet</label> <br>
                                <div class="ecolo"><i class="fab fa-envira" size="2x"><em> Le clic écologique : Pas plus de 3 images ! Le moins de contenu est stocké, le plus de banquises seront sauvées</em></i></div>
                                    <input type="file" id="photo1" name="photo1"> 
                                    <input type="file" id="photo2" name="photo2"> 
                                    <input type="file" id="photo3" name="photo3">
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control-input" id="project_location" name="project_location" required>
                                    <label class="label-control" for="project_location">Localisation</label>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <!-- PENSER à convertir le text en float -->
                                    <input type="text" class="form-control-input" min = "0" id="goal" name="goal" required>
                                    <label class="label-control" for="goal">Objectif financier</label>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group">
                                    <input type="date" class="form-control-input" min = "0" id="end_date" name="end_date" required>
                                    <label class="label-control" for="goal">Date de fin de financement</label>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group checkbox ">
                                    <label for="product_type"></label>
                                    <select id="product_type" name="product_type" form="ajouterProjetForm" class = "label-control">
                                        <option value="">Type de produit</option>
                                        <option value="legume">Légumes</option>
                                        <option value="fruit">Fruits</option>
                                    </select>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group checkbox">
                                    <input type="checkbox" id="innovative" name="innovative" value="1">
                                    <label class="label-control white" for="innovative">Est-ce que c'est un projet innovant?</label>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <ul class="navbar-nav ml-auto" id="counterpart_list">
                                    <li class="nav-item" id="counterpart_1">
                                        <div class="section-title" name="counterpart">CRITERE DE DONS N°1</div>
                                        <div class="form-group">    
                                            <input type="text" class="form-control-input" id="counterpart_name" name="counterpart_name[]" required>
                                            <label class="label-control" for="counterpart_name">Nom de la contrepartie</label>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                        <div class="form-group">    
                                            <input type="text" class="form-control-input" id="option_min" name="option_min[]" required>
                                            <label class="label-control" for="option_min">Don minimum</label>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                        <div class="form-group">    
                                            <input type="text" class="form-control-input" id="option_max" name="option_max[]" required>
                                            <label class="label-control" for="option_max">Don maximum</label>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                        <div class="form-group">
                                            <textarea form="ajouterProjetForm" class="form-control-input" id="counterpart_description" name="counterpart_description[]" required></textarea>
                                            <label class="label-control" for="counterpart_description">En échange du don</label>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </li>
                                    <div class="button"><input class="btn-solid-reg page-scroll" type="button" onclick="add_counterpart();" value="Ajouter une contrepartie"></div>
                                </ul>
                                <br>
                                <input type="hidden" name="redirection" value="<?php 
                                if(isset($_GET['redirection'])){echo $_GET['redirection']; } ?>" />
                                <input class="btn-solid-reg page-scroll" type="submit" value="Soumettre le projet"/>
                            </form>
                        </div>

                    </div><!-- end of col --> 
                </div> <!-- end of row -->
            </div> <!-- end of container -->
        </div> <!-- end of header-content -->
    </header> <!-- end of header -->
    <!-- end of header -->
    
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
