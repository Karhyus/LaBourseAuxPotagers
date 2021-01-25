<!-- Footer -->
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="text-container about">
                        <h4>La bourse aux potagers</h4>
                        <p class="white">Ce projet est un projet etudiant entrepris à l'ECE Paris dans le cadre de notre curcus d'ingénieur. </p>
                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
                <div class="col-md-2">
                    <div class="text-container">
                        <h4>Compte</h4>
                        <ul class="list-unstyled li-space-lg white">
                            <?php if(!isset($_SESSION['user_account'])){ ?>
                                <li>
                                    <a class="white" href="connexion.php">Connexion</a>
                                </li>
                            <?php } else { 
                                if($_SESSION['user_account']['type'] == 1) { ?>
                                <li>
                                    <a class="white" href="espace-producteur.php">Espace Producteurs</a>
                                </li>
                                <li>
                                    <a class="white" href="espace-investisseur.php">Espace Investisseurs</a>
                                </li>
                            <?php } else { ?>
                                <li>
                                    <a class="white" href="espace-investisseur.php">Espace Investisseurs</a>
                                </li>
                            <?php } } ?>
                        </ul>
                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
                <div class="col-md-2">
                    <div class="text-container">
                        <h4 class="white" href="terms-conditions.php">Conditions Generale</h4>
                        <ul class="list-unstyled li-space-lg">
                            <li>
                                <a class="white" href="terms-conditions.php">Conditions Generale</a>
                            </li>
                        </ul>
                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
                <div class="col-md-2">
                    <div class="text-container">
                        <h4>Partenaire</h4>
                        <ul class="list-unstyled li-space-lg">
                            <li>
                                <a class="white" href="http://www.cueillette-de-la-croix-verte.com">Cueillette de la croix verte</a>
                            </li>

                        </ul>
                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
                <div class="col-md-2">
                    <div class="text-container">
                               <a href=onu.php> <img class="img-fluid" src="images/eco.png" alt="alternative"> </a>
                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of footer -->  
    <!-- end of footer -->