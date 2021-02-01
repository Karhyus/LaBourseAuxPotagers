    <!DOCTYPE html>
    <html lang="en">
    <?php include('bdd_connexion.php');
    include('fonctions.php');
    session_start();
    $cpt_project = $bdd->query('SELECT COUNT(*) FROM project')->fetchColumn();
    $cpt_agri = $bdd->query('SELECT COUNT(*) FROM participant')->fetchColumn();
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
            <a class="navbar-brand logo-image" href=""><img src="images/logo3.png" alt="alternative"></a>
            
            <!-- Mobile Menu Toggle Button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-awesome fas fa-bars"></span>
                <span class="navbar-toggler-awesome fas fa-times"></span>
            </button>
            <!-- end of mobile menu toggle button -->

            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="#header">ACCUEIL<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="#projects">PROJETS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="#comment">COMMENT ÇA MARCHE</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle page-scroll" id="navbarDropdown" role="button" aria-haspopup="true" aria-expanded="false">LES REUSSITES</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="page-scroll dropdown-item" href="#reussite"><span class="item-text">PROJETS ACCOMPLIS</span></a>
                            <div class="dropdown-items-divide-hr"></div>
                            <a class="page-scroll dropdown-item" href="onu.php"><span class="item-text">OBJECTIFS DEVELOPPEMENT DURABLE</span></a>
                        </div>
                    </li>
                    <!-- Dropdown Menu -->          
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle page-scroll" id="navbarDropdown" role="button" aria-haspopup="true" aria-expanded="false">A PROPOS DE NOUS</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="page-scroll dropdown-item" href="#propos"><span class="item-text">NOTRE IDEE ET NOS VALEURS</span></a>
                            <div class="dropdown-items-divide-hr"></div>
                            <a class="page-scroll dropdown-item" href="#Partenaire"><span class="item-text">NOS PARTENAIRES</span></a>
                            <div class="dropdown-items-divide-hr"></div>
                            <a class="page-scroll dropdown-item" href="#equipe"><span class="item-text">L'EQUIPE</span></a>
                            <div class="dropdown-items-divide-hr"></div>
                            <a class="page-scroll dropdown-item" href="#contact"><span class="item-text">CONTACT</span></a>
                        </div>
                    </li>
                    <!-- end of dropdown menu -->
                   
                    <?php if(!isset($_SESSION['user_account'])){ ?>
                        <?php } else { 
                            if($_SESSION['user_account']['type'] == 1) { ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle page-scroll" id="navbarDropdown" role="button" aria-haspopup="true" aria-expanded="false">MON ESPACE</a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="page-scroll dropdown-item" href="espace-producteur.php"><span class="item-text">ESPACE PRODUCTEUR</span></a>
                                    <div class="dropdown-items-divide-hr"></div>
                                    <a class="page-scroll dropdown-item" href="espace-investisseur.php"><span class="item-text">ESPACE INVESTISSEUR</span></a>
                                </div>
                            </li>
                        <?php } else { ?>
                            <li class="nav-item">
                                <a class="nav-link page-scroll" href="espace-investisseur.php">MON ESPACE</a>
                            </li>
                        <?php } } ?>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <?php if(!isset($_SESSION['user_account'])){ ?>
    					<li class="nav-item">
                    		<a class="nav-link page-scroll" href="connexion.php">CONNEXION</a>
                    	</li>
                   	<?php } else { ?>
                   		<li class="nav-item">
                    		<a class="nav-link page-scroll" href="mon_compte.php">MES INFOS</a>
                    	</li>
                    	<li class="nav-item">
                    		<a class="nav-link page-scroll" href="actions/deconnexion.php">DECONNEXION</a>
                    	</li>
                   	<?php } ?>
                </ul>
            </div>
        </nav> <!-- end of navbar -->
        <!-- end of navbar -->


        <!-- Header -->
        <header id="header" class="header counter">
            <div class="header-content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="text-container">
                                <h1><span id="js-rotating">PEOPLE, PLANET, PROFIT</span></h1>
                                <p class="p-heading p-large">La Bourse aux Potagers, là où vos projets deviennent concrets :
                                    Plateforme de financement participatif spécialisée dans les projets agricoles
                                </p>
                            <div id="counter">
                                <div class="cell">
                                    <div class="counter-value number-count" data-count=<?php echo $cpt_project ?>></div>
                                    <div class="counter-info white"> Projets<br>en cours</div>
                                </div>
                                <div class="cell">
                                    <div class="counter-value number-count" data-count=<?php echo $cpt_agri ?>></div>
                                    <div class="counter-info white"> Agriculteurs<br>investis</div>
                                </div>
                                <div class="cell">
                                    <div class="counter-value number-count" data-count=<?php echo $cpt_investors ?>></div>
                                    <div class="counter-info white"> Utilisateurs<br>engagés</div>
                                </div>
                            </div>
                            </div>
                        </div> <!-- end of col -->
                    </div> <!-- end of row -->
                </div> <!-- end of container -->
            </div> <!-- end of header-content -->
        </header> <!-- end of header -->
        <!-- end of header -->
      
       <!-- Projets -->
        <div id="projects" class="cards-2 slider ">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title">PROJETS EN COURS</div>
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
                                                        <a href="projet.php?id=<?php echo ($project['id']) ?>"><span class="hexagon"><i class="fas fa-eye fa-stack-1x"></i></span></a>                  
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
        
        <!-- Comment ça marche -->
        <div id="comment" class="cards-1">
            <div class="container">
                <div class="section-title">COMMENT CA MARCHE ?</div>
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Card -->
                        <div class="card">
                            <span class="fa-stack">
                                <span class="hexagon"><img class="fa-stack" src="images/I_Farmer.png" alt="alternative"></span>  
                            </span>
                            <div class="card-body">
                                <h4 class="card-title">Découvrir les producteurs et leurs projets</h4>
                            </div>
                        </div>
                        <!-- end of card -->

                        <!-- Card -->
                        <div class="card">
                            <span class="fa-stack">
                                <span class="hexagon"><img class="fa-stack" src="images/I_Plant.png" alt="alternative"></span>  
                            </span>
                            <div class="card-body">
                                <h4 class="card-title">Suivre l'avancement du projet dans lequel vous aurez investi</h4>
                            </div>
                        </div>
                        <!-- end of card -->

                        <!-- Card -->
                        <div class="card">
                            <span class="fa-stack">
                                <span class="hexagon"><img class="fa-stack" src="images/I_Recolter.png" alt="alternative"></span>  
                            </span>
                            <div class="card-body">
                                <h4 class="card-title">Enrichisser votre côté agricole</h4>
                            </div>
                        </div>
                        <!-- end of card -->

                    </div> <!-- end of col -->
                </div> <!-- end of row -->
            </div> <!-- end of container -->
        </div> <!-- end of cards-1 -->
        <!-- end of comment ca marche -->

        <!-- Projects -->
    	<div id="reussite" class="filter">
    		<div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title">PROJETS ACCOMPLIS</div>
                    </div> <!-- end of col -->
                </div> <!-- end of row -->
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
                                <a class="popup-with-move-anim" href="#project-1"><div class="element-item-overlay"><span>Les carottes de Picardie</span></div><img src="images/project-1.jpg" alt="alternative"></a>
                            </div>
                            <div class="element-item fruits">
                                <a class="popup-with-move-anim" href="#project-2"><div class="element-item-overlay"><span>Les fraises “Les Reines des Vallées”</span></div><img src="images/project-2.jpg" alt="alternative"></a>
                            </div>
                            <div class="element-item fruits">
                                <a class="popup-with-move-anim" href="#project-3"><div class="element-item-overlay"><span>Les clémentines de la Vallée de Chevreuse</span></div><img src="images/project-3.png" alt="alternative"></a>
                            </div>
                            <div class="element-item legumes">
                                <a class="popup-with-move-anim" href="#project-4"><div class="element-item-overlay"><span> Les courgettes bio d’Alsace</span></div><img src="images/project-4.jpg" alt="alternative"></a>
                            </div>
                            <div class="element-item legumes innovations">
                                <a class="popup-with-move-anim" href="#project-5"><div class="element-item-overlay"><span>Les aubergines de plein champ XXL</span></div><img src="images/project-5.jpg" alt="alternative"></a>
                            </div>
                            <div class="element-item design legumes innovations">
                                <a class="popup-with-move-anim" href="#project-7"><div class="element-item-overlay"><span>Les laitues du Languedoc</span></div><img src="images/project-7.jpg" alt="alternative"></a>
                            </div>
                            <div class="element-item design marketing">
                                <a class="popup-with-move-anim" href="#project-8"><div class="element-item-overlay"><span>Les oliviers d’Aix en Provence</span></div><img src="images/project-8.jpg" alt="alternative"></a>
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
                    <h3>Les carottes de Picardie</h3>
                    <hr class="line-heading">
                    <h6>Gustave<span class="fa-stack"><a href="user.php"><span class="hexagon "><i class="fas fa-user fa-stack-1x"></i></span></a></span></h6>
                    <p>Retraité et ancien ingénieur informaticien, je souhaite mettre à profit mes connaissances en matière de technologie pour la gestion des cultures de carottes biologiques. Ayant déjà un terrain en Picardie, je recherche un financement à hauteur de 3 000 euros pour acquérir les technologies nécessaires à l’optimisation des ressources naturelles utilisées. Mon but est de gérer convenablement le débit d’eau, être informé des fuites d’eau et pouvoir réguler la quantité d’engrais biologiques automatiquement en fonction des besoins des denrées. Je souhaite partager avec mes investisseurs les avancées de mes productions et leur proposer des visites et dégustations sur site 2 fois dans l’année.</p>
                    <p class="testimonial-text">Envie de tenter l'expérience ? cliquez sur "Je me lance" pour découvrir les projets qui n'attendent que vous</p>
                    <a class="btn-solid-reg" href="connexion.php">JE ME LANCE</a> <a class="btn-outline-reg mfp-close as-button" href="#reussite">RETOUR</a> 
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
                    <h3>Les fraises “Les Reines des Vallées”</h3>
                    <hr class="line-heading">
                    <h6>Roméo<span class="fa-stack"><a href="user.php"><span class="hexagon "><i class="fas fa-user fa-stack-1x"></i></span></a></span></h6>
                    <p>Anciennement expert comptable, j’ai décidé de profiter de ma cinquantième bougie pour tout lâcher et complètement changer de voie à l’aide de mon épouse Michelle. Depuis mon enfance, j’attache un attrait particulier à l’écologie, à la nature. Grand sportif, je me lance chaque année le défi de suivre les itinéraires des Grandes Randonnées (GR) à travers la France afin de découvrir la beauté que nous réserve le monde. Cette année, il s’agit d’un défi professionnel et pour cela j’ai besoin de l’aide de chacun. Le fraisier “Reine des Vallées” est une variété de type fraises des bois remontantes que je souhaite cultiver et faire découvrir aux autres. Je souhaite partager mon goût pour les produits sains et bio.  </p>
                    <p class="testimonial-text">Envie de tenter l'expérience ? cliquez sur "Je me lance" pour découvrir les projets qui n'attendent que vous</p>
                    <a class="btn-solid-reg" href="connexion.php">JE ME LANCE</a> <a class="btn-outline-reg mfp-close as-button" href="#reussite">RETOUR</a> 
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
                    <h3>Les clémentines de la Vallée de Chevreuse</h3>
                    <hr class="line-heading">
                    <h6>Damien<span class="fa-stack"><a href="user.php"><span class="hexagon "><i class="fas fa-user fa-stack-1x"></i></span></a></span></h6>
                    <p>Cela fait maintenant 45 ans que je vis à Chevreuse. Cette magnifique commune française a su m’apporter tout le bonheur du monde au travers les années de par sa beauté. Agriculteur depuis mes 16 ans, je décide aujourd’hui de m’orienter vers des clémentines bio. En effet, je veux passer à un mode de culture 100 % biologique. Pour arriver à mes fins, j’ai besoin alors de changer toute ma méthode de travail, la gestion des sols et des engrais etc…  L’équipe de la plateforme “La Bourse aux Potagers” a su me toucher personnellement de par leur volonté de rapprocher les agriculteurs et les citadins. Ils prônent une vision écologique du monde. Ils veulent faire découvrir notre métier difficile et c’est la raison pour laquelle j’ai décidé de déposer une demande d’aide chez eux. J’espère qu’elle aboutira afin d’aider des petits agriculteurs comme nous à grandir et à proposer des produits sains. </p>
                    <p class="testimonial-text">Envie de tenter l'expérience ? cliquez sur "Je me lance" pour découvrir les projets qui n'attendent que vous</p>
                    <a class="btn-solid-reg" href="connexion.php">JE ME LANCE</a> <a class="btn-outline-reg mfp-close as-button" href="#reussite">RETOUR</a> 
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
                    <h3>Les courgettes bio d’Alsace</h3>
                    <hr class="line-heading">
                    <h6>Annie<span class="fa-stack"><a href="user.php"><span class="hexagon "><i class="fas fa-user fa-stack-1x"></i></span></a></span></h6>
                    <p>Habitants de l’Alsace depuis plus de 40 ans, nous avons auparavant investi dans des champs de tomates et de salades. Aujourd’hui nous souhaitons proposer à nos fidèles clients, voisins, amis, investisseurs des courgettes biologiques. Un légume cultivé en France qui va ravir petits et grands aussi bien pour les plats d’été que les ratatouilles d’hiver. La culture de ces légumes nécessite une quantité d’eau très importante ainsi qu’un entretien régulier. Nous souhaitons donc proposer à des investisseurs écolos de nous aider à financer notre projet de récupération d’eau de pluie et d’arrosage optimisé pour nos nouvelles plantations. Nous accueillerons à bras ouverts nos futurs investisseurs et leur proposeront de goûter les saveurs de nos courgettes alsaciennes bio.</p>
                    <p class="testimonial-text">Envie de tenter l'expérience ? cliquez sur "Je me lance" pour découvrir les projets qui n'attendent que vous</p>
                    <a class="btn-solid-reg" href="connexion.php">JE ME LANCE</a> <a class="btn-outline-reg mfp-close as-button" href="#reussite">RETOUR</a> 
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
                    <h3>Les aubergines de plein champ XLL</h3>
                    <hr class="line-heading">
                    <h6>Bernadette<span class="fa-stack"><a href="user.php"><span class="hexagon "><i class="fas fa-user fa-stack-1x"></i></span></a></span></h6>
                    <p>Agriculteur et fils d’agriculteur, j’aimerai réaliser un projet assez fou qui serait de passer l'entièreté de mon exploitation en agriculture biologique d’ici 2026. Il s’agit d’un projet de grande envergure et j’aimerai segmenter cette transition écologique pour être le plus efficace possible. Pour réaliser ce pari, j’ai décidé de commencer par ma production d’aubergines, un de mes produits phares. La France est dans le top 3 européen des producteurs d’aubergines, j’aimerai faire en sorte que nous soyons les premiers producteurs d’aubergines d’origine biologique de notre continent. Les mentalités évoluent vis à vis des enjeux écologiques, il est impératif que notre métier évolue également. Je sollicite donc votre aide afin de récolter 5 000 euros pour cultiver les aubergines en plein champ et non plus sous serre. En effet, la culture d’aubergines en plein champ a un coût de production presque 2 fois plus élevé que son homologue sous serre mais permet de réduire drastiquement son impact écologique.</p>
                    <p class="testimonial-text">Envie de tenter l'expérience ? cliquez sur "Je me lance" pour découvrir les projets qui n'attendent que vous</p>
                    <a class="btn-solid-reg" href="connexion.php">JE ME LANCE</a> <a class="btn-outline-reg mfp-close as-button" href="#reussite">RETOUR</a> 
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
                    <h3>Les laitues du Languedoc</h3>
                    <hr class="line-heading">
                    <h6>Mélanie<span class="fa-stack"><a href="user.php"><span class="hexagon "><i class="fas fa-user fa-stack-1x"></i></span></a></span></h6>
                    <p>Avec le Brevet de Technicien Supérieur Agricole en poche, je souhaite cultiver ma propre production de laitues biologiques. J’ai besoin d’un financement à hauteur de 100 000 euros afin d’acheter un terrain dans le Languedoc, pays de la laitue romaine. Passionnée par les pratiques d’agricultures respectueuses de l’environnement, je souhaite mettre à profit mon savoir pour produire des laitues françaises, fraîches et de saison. Je souhaite créer une réelle communauté éco-responsable avec mes investisseurs et les sensibiliser au monde agricole.</p>
                    <p class="testimonial-text">Envie de tenter l'expérience ? cliquez sur "Je me lance" pour découvrir les projets qui n'attendent que vous</p>
                    <a class="btn-solid-reg" href="connexion.php">JE ME LANCE</a> <a class="btn-outline-reg mfp-close as-button" href="#reussite">RETOUR</a>  
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
                    <h3>Les oliviers d’Aix en Provence</h3>
                    <hr class="line-heading">
                    <h6>Gérard<span class="fa-stack"><a href="user.php"><span class="hexagon "><i class="fas fa-user fa-stack-1x"></i></span></a></span></h6>
                    <p>Issus d’une famille d’oléiculteurs, nous souhaitons profiter de notre terroir ancestral afin de cultiver notre propre verger d’oliviers. Notre volonté est de produire des olives biologiques de qualité et d’utiliser des engrais de type organique. Nous avons de l’expérience en termes de production d’huile d’olive et souhaitons faire partager notre production avec les investisseurs de notre beau projet. Nous recherchons un financement à hauteur de 2 000 euros pour lancer le projet qui sera situé sur les hauteurs d’Aix en Provence (le terrain est déjà en notre possession). Ce que nous attendons le plus de ce projet, c’est qu’il rassemble nos investisseurs autour de notre passion et notre savoir-faire : l’huile d’olive provençale! </p>
                    <p class="testimonial-text">Envie de tenter l'expérience ? cliquez sur "Je me lance" pour découvrir les projets qui n'attendent que vous</p>
                    <a class="btn-solid-reg" href="connexion.php">JE ME LANCE</a> <a class="btn-outline-reg mfp-close as-button" href="#reussite">RETOUR</a> 
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of lightbox-basic -->
        <!-- end of lightbox -->
        <!-- end of project lightboxes -->

        <!-- Details 1 -->
    	<div id="propos" class="accordion">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">A PROPOS DE NOUS</div>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
    		<div class="area-1">
    		</div><!-- end of area-1 on same line and no space between comments to eliminate margin white space --><div class="area-2">
                <!-- Accordion -->
                <div class="accordion-container" id="accordionOne">
                    <h3>La Bourse aux Potagers est une plateforme de financement collaboratif pour les petits et grands projets d’agricultures biologiques ou en transition écologique.</h3>
                    <div class="item">
                        <div id="headingOne">
                            <span data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" role="button">
                                <span class="circle-numbering"></span><span class="accordion-title">Agriculteurs</span>
                            </span>
                        </div>
                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionOne">
                            <div class="accordion-body">
                                Le projet a pour but de soutenir financièrement les agriculteurs et leurs initiatives respectueuses de l’environnement.
                            </div>
                        </div>
                    </div> <!-- end of item -->
                
                    <div class="item">
                        <div id="headingTwo">
                            <span class="collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" role="button">
                                <span class="circle-numbering"></span><span class="accordion-title">Investisseurs</span>
                            </span>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionOne">
                            <div class="accordion-body">
                                Le but du projet est de créer une communauté éco-reponsable sensibilisée, informée et actrice du développement d’initiatives durables qui n’auraient pas pu voir le jour.
                            </div>
                        </div>
                    </div> <!-- end of item -->
                
                    <div class="item">
                        <div id="headingThree">
                            <span class="collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree" role="button">
                                <span class="circle-numbering"></span><span class="accordion-title">Nous</span>
                            </span>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionOne">
                            <div class="accordion-body">
                                L’équipe de "La Bourse aux Potagers", a souhaité ajouter à sa plateforme la dimension sociale entre les agriculteurs et investisseurs.
                            </div>
                        </div>
                    </div> <!-- end of item -->
                </div> <!-- end of accordion-container -->
                <!-- end of accordion -->

    		</div> <!-- end of area-2 -->
        </div> <!-- end of accordion -->
        <!-- end of details 1 -->


        <!-- Details 2 -->
    	<div class="tabs">
            <div class="area-1">
                <div class="tabs-container">
                    
                    <!-- Tabs Links -->
                    <ul class="nav nav-tabs" id="ariaTabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="nav-tab-1" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true"><i class="fas fa-th"></i>Agriculture pédagogique</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="nav-tab-2" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false"><i class="fas fa-th"></i>Circuit court</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="nav-tab-3" data-toggle="tab" href="#tab-3" role="tab" aria-controls="tab-3" aria-selected="false"><i class="fas fa-th"></i>Economie circulaire</a>
                        </li>
                    </ul>
                    <!-- end of tabs links -->
                    
                    <!-- Tabs Content -->
                    <div class="tab-content" id="ariaTabsContent">

                        <!-- Tab -->
                        <div class="tab-pane fade  show active" id="tab-1" role="tabpanel" aria-labelledby="tab-1">
                            <p>Un des objectifs majeurs de notre plateforme est de promouvoir de bonnes pratiques agricoles, alimentaires et environnementales. <br>
                            Nous incitons les agriculteurs à proposer des visites, des ateliers ou simplement de donner des nouvelles des avancées de leurs projets en contrepartie du financement. <br>
                            Les agriculteurs ont aussi la possibilité d’écrire leurs bonnes pratiques agricoles, leurs innovations responsables dans notre dossier <a class="green page-scroll" href="article.php">Les articles des bonnes pratiques</a>. <br>
                            Ceci dans le but de <strong>sensibiliser</strong> et <strong>faire connaître</strong> au plus grand nombre les contraintes du métier ainsi que les bonnes idées et astuces pour une agriculture durable. <br>
                            </p>
                            <p>Cette pédagogie active permettra de faire des rencontres avec des agriculteurs, et de se familiariser avec les bonnes pratiques qu’il propose sur son terrain : compost, gestion des déchets, goûter des produits, apprendre les mécanismes de l’eau et des écosystèmes...
                            </p>
                        </div> <!-- end of tab-pane --> 

                        <!-- end of tab -->

                        <!-- Tab -->
                        <div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="tab-2">
                            <p>La notion de circuit-court implique qu’un seul intermédiaire maximum fasse le lien entre le producteur et le consommateur.  <br>
                            Le concept de faire communiquer directement l’investisseur et le producteur est une forme de circuit-court. Il n’y a pas d’intermédiaire, l’investisseur a une vision directe sur le travail de l’agriculteur, il a une réelle traçabilité des aliments produits. <br>
                            Au moment où l’agriculteur depose son projet sur notre site, nous voulons le sensibiliser au <strong>transport en circuit-court</strong> de ses produits pour qu’au moins une partie de sa production soit vendue dans le cadre des  <a class="green page-scroll" href="https://www.economie.gouv.fr/ess/amap-cest-quoi">AMAP</a>.<br>
                            </p>
                            <p> Ce que nous souhaitons réellement dans cette démarche, c’est de réduire le transport des aliments. Nous avons pour objectif dans un futur plus lointain, de pousser les agriculteurs de notre plateforme à proposer leurs produits dans la restauration collective. 
                            Inclure du bio dans les assiettes des cantines scolaires, d’entreprises, etc de proximité permettrait de réduire les inégalités sur l’accès à une alimentation de qualité.
                            </p>
                        </div> <!-- end of tab-pane --> 

                        <!-- Tab -->
                        <div class="tab-pane fade" id="tab-3" role="tabpanel" aria-labelledby="tab-3">
                            <p> Conscients que notre projet aura un impact sur l’environnement, nous avons souhaité l’inclure dans une dynamique <strong>d’économie circulaire.</strong> Voici nos engagements pour l'éco-conception de notre plateforme : </p>
                            <ul class="list-unstyled li-space-lg">
                                <li class="media">
                                    <i class="fas fa-square"></i>
                                    <div class="media-body">Inclure seulement les fonctionnalités essentielles</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-square"></i>
                                    <div class="media-body">Design simple et minimaliste</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-square"></i>
                                    <div class="media-body">Site optimisé pour la sobriété numérique</div>
                                </li>
                            </ul>
                            <p>En termes de consommation responsable, écologie industrielle et recyclage, nous avons un réel impact sensibilisant et engageant pour notre <strong>communauté éco-responsable :</strong></p>
                            <ul class="list-unstyled li-space-lg">
                                <li class="media">
                                    <i class="fas fa-square"></i>
                                    <div class="media-body">Financement participatif de projets respectueux de l’environnement</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-square"></i>
                                    <div class="media-body">Emergence de “petits” ou “grands” projets locaux</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-square"></i>
                                    <div class="media-body">Témoignages “open source” de bonnes pratiques écologiques</div>
                                </li>
                            </ul>
                        </div> <!-- end of tab-pane -->
                        <!-- end of tab -->

                    </div> <!-- end of tab-content -->
                    <!-- end of tabs content -->

                </div> <!-- end of tabs-container -->
            </div><!-- end of area-1 on same line and no space between comments to eliminate margin white space --><div class="area-2"></div> <!-- end of area-2 -->
        </div> <!-- end of tabs -->
        <!-- end of details 2 -->
     
        
    <!-- valeurs -->
        <div class="cards-1">
            <div class="container">
                <div class="section-title"> NOS VALEURS </div>
                <p class="p-heading">Dans la conception d’un avenir durable où symbiose et équilibre sont nos objectifs, nous axons notre plateforme sur la triple performance (triple bottom line) :</p>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <span class="fa-stack">
                                <span class="hexagon"><img class="fa-stack" src="images/people.png" alt="alternative"></span>  
                            </span>
                            <div class="card-body">
                                <h4 class="card-title">People</h4>
                            </div>
                        </div>
                        <!-- end of card -->

                        <!-- Card -->
                        <div class="card">
                            <span class="fa-stack">
                                <span class="hexagon "><img class="fa-stack" src="images/world.png" alt="alternative"></span>           
                            </span> 
                            <div class="card-body">
                                <h4 class="card-title">Planet</h4>
                            </div>
                        </div>
                        <!-- end of card -->

                        <!-- Card -->
                        <div class="card">
                            <span class="fa-stack">
                                <span class="hexagon"><img class="fa-stack" src="images/profit.png" alt="alternative"></span>  
                            </span>
                            
                            <div class="card-body">
                                <h4 class="card-title">Profit</h4>
                            </div>
                        </div>
                        <!-- end of card -->

                    </div> <!-- end of col -->
                </div> <!-- end of row -->
            </div> <!-- end of container -->
        </div> <!-- end of cards-1 -->
        <!-- end of valeurs -->
      

        <!-- Partenaire -->
        <div id="Partenaire" class="basic-1">
            <div class="container">
                <div class="section-title">NOTRE PARTENAIRE</div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="text-container">
                            <h2>La Cueillette de la Croix Verte</h2>
                            <p>Inscrits dans une vision de collaboration et de partage, nous sommes heureux de vous présenter notre partenaire : <br><a class="green page-scroll" href="http://www.cueillette-de-la-croix-verte.com">la Cueillette de la Croix Verte</a>. <br>Structure agricole de 54 hectares située à côté de Paris, la cueillette partage nos valeurs et perspectives futures de transition écologique.</p>
                        </div> <!-- end of text-container -->
                    </div> <!-- end of col -->
                    <div class="col-lg-6">
                                <img class="img-fluid" src="images/Partenaire.png" alt="alternative">
                    </div> <!-- end of col -->
                </div> <!-- end of row -->
            </div> <!-- end of container -->
        </div> <!-- end of basic-1 -->
        <!-- end of Partenaire -->
        
       <!-- Team -->
        <div id="equipe" class="basic-2 slider">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title">L'EQUIPE</div>
                        <p class="p-heading">Étudiants en dernière année du cycle ingénieur à l’ECE Paris, nous sommes six élèves évoluant dans des domaines variés et essentiels pour mener à bien notre projet. Apportant des compétences dans les systèmes d’information, l’ingénierie financière, l’énergie et l’environnement : nous regroupons tous les domaines nécessaires pour mener à bien notre projet. </p>
                    </div> <!-- end of col -->
                </div> <!-- end of row -->
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Card Slider -->
                        <div class="slider-container">
                            <div class="swiper-container card-sliderbis">
                                <div class="swiper-wrapper">
                                    
                                    <!-- Slide -->
                                    <div class="swiper-slide">
                                        <!-- Card -->
                                        <!-- Team Member -->
                                        <div class="team-member">
                                            <div class="image-wrapper">
                                                <img class="img-fluid" src="images/E_Leonie.png" alt="alternative">
                                            </div> <!-- end of image-wrapper -->
                                            <p class="p-large">Leonie Sorcelle</p>
                                            <p class="job-title">Responsable Web</p>
                                            <ul class="list-unstyled li-space-lg">
                                                <li><a href="mailto:leonie.sorcelle@edu.ece.fr"><i class="fas fa-envelope"></i></a></li>
                                            </ul>
                                        </div> <!-- end of team-member -->
                                        <!-- end of team member -->
                                    </div> <!-- Slide -->
                                    
                                    <!-- Slide -->
                                    <div class="swiper-slide">  
                                        <!-- Team Member -->
                                        <div class="team-member">
                                            <div class="image-wrapper">
                                                <img class="img-fluid" src="images/E_PM.png" alt="alternative">
                                            </div> <!-- end of image wrapper -->
                                            <p class="p-large">Pierre-Mathieu Barras</p>
                                            <p class="job-title">Responsable Technique</p>
                                            <ul class="list-unstyled li-space-lg">
                                                <li><a href="mailto:pierre-mathieu.barras@edu.ece.fr"><i class="fas fa-envelope"></i></a></li>
                                            </ul>
                                        </div> <!-- end of team-member -->
                                        <!-- end of team member -->
                                    </div> <!-- Slide -->       
                                    
                                    <!-- Slide -->
                                    <div class="swiper-slide"> 
                                        <!-- Team Member -->
                                        <div class="team-member">
                                            <div class="image-wrapper">
                                                <img class="img-fluid" src="images/E_Hadri.png" alt="alternative">
                                            </div> <!-- end of image wrapper -->
                                            <p class="p-large">Hadrien Le Dain</p>
                                            <p class="job-title">Chef de Projet</p>
                                            <ul class="list-unstyled li-space-lg">
                                                <li><a href="mailto:hadrien.le-dain@edu.ece.fr"><i class="fas fa-envelope"></i></a></li>
                                            </ul>
                                        </div> <!-- end of team-member -->
                                        <!-- end of team member -->
                                    </div> <!-- Slide -->   
                                    
                                    <!-- Slide -->
                                    <div class="swiper-slide"> 
                                        <!-- Team Member -->
                                        <div class="team-member">
                                            <div class="image-wrapper">
                                                <img class="img-fluid" src="images/E_Alpa.png" alt="alternative">
                                            </div> <!-- end of image wrapper -->
                                            <p class="p-large">Alpaïde Thirouin</p>
                                            <p class="job-title">Responsable Communication</p>
                                            <ul class="list-unstyled li-space-lg">
                                                <li><a href="mailto:alpaide.thirouin@edu.ece.fr"><i class="fas fa-envelope"></i></a></li>
                                            </ul>
                                        </div> <!-- end of team-member -->
                                        <!-- end of team member -->
                                    </div> <!-- Slide --> 
                                    
                                    <!-- Slide -->
                                    <div class="swiper-slide">                                 
                                        <!-- Team Member -->
                                        <div class="team-member">
                                            <div class="image-wrapper">
                                                <img class="img-fluid" src="images/E_Niz.png" alt="alternative">
                                            </div> <!-- end of image wrapper -->
                                            <p class="p-large">Nizar Bezri</p>
                                            <p class="job-title">Responsable Juridique</p>
                                            <ul class="list-unstyled li-space-lg">
                                                <li><i class="fas fa-envelope"><a href="mailto:nizar.bezri@edu.ece.fr"></a></i></li>
                                            </ul>
                                        </div> <!-- end of team-member -->
                                        <!-- end of team member -->
                                    </div> <!-- Slide --> 
                                    
                                     <!-- Slide -->
                                    <div class="swiper-slide">  
                                        <!-- Team Member -->
                                        <div class="team-member">
                                            <div class="image-wrapper">
                                                <img class="img-fluid" src="images/E_Claire.png" alt="alternative">
                                            </div> <!-- end of image wrapper -->
                                            <p class="p-large">Claire Grouhel</p>
                                            <p class="job-title">Responsable Développement Durable</p>
                                            <ul class="list-unstyled li-space-lg">
                                                <li><a href="mailto:claire.grouhel@edu.ece.fr"><i class="fas fa-envelope"></i></a></li>
                                            </ul>
                                        </div> <!-- end of team-member -->
                                        </div> <!-- Slide --> 
                                        <!-- end of team member -->
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
        </div> <!-- end of basic-2 -->
        <!-- end of team -->
        
    <!-- VIDEO-->
    <div id="video" class="basic-2">
        <div class="section-title">NOTRE VIDEO</div>
        <video controls width="600">
            <source src="images/nous.mp4" type="video/mp4">
            Sorry, your browser doesn't support embedded videos.
        </video>
    </div>


        <!-- Contact -->
        <div id="contact" class="form-2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="text-container">
                            <div class="section-title">CONTACT</div>
                            <h2>Envie de nous rencontrer ou juste de nous poser une question ?</h2>
                            <p>N'hésitez pas, nous sommes là pour vous</p>
                            <ul class="list-unstyled li-space-lg">
                                <li class="address"><i class="fas fa-map-marker-alt"></i>37, Quai de grenelle 75015 Paris</li>
                                <li><i class="fas fa-phone"></i><a href="tel:0601172202">0601172202</a></li>
                                <li><i class="fas fa-envelope"></i><a href="mailto:bourseauxpotagers@gmail.com">bourseauxpotagers@gmail.com</a></li>
                            </ul>
                            <div class="ecolo"><i class="fab fa-envira" size="2x"><em> Le clic écologique : En moyenne en emission de CO2, un email = 4g et un SMS = 0.014g. Pensez y en nous contactant !</em></i></div><br>           
                        </div> <!-- end of text-container -->
                    </div> <!-- end of col -->
                    <div class="col-lg-6">
                        
                        <!-- Contact Form -->
                        <form id="contactForm" data-toggle="validator" data-focus="false">
                            <div class="form-group">
                                <input type="text" class="form-control-input" id="cname" required>
                                <label class="label-control" for="cname">Nom et Prénom</label>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control-input" id="cemail" required>
                                <label class="label-control" for="cemail">Email</label>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control-textarea" id="cmessage" required></textarea>
                                <label class="label-control" for="cmessage">Ton message</label>
                                <div class="help-block with-errors"></div>
                            </div>
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
