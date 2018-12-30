<!-- header -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <?php
                if ( empty($_SESSION['nom']) ) { 
                    echo "<a class='navbar-brand' href='index.php'>Connectez-vous à votre emploi du temps</a> ";
                }
                else {
                    echo "<a class='navbar-brand' href='index.php?controle=utilisateur&action=accueil'>Mes services</a> ";
                }
        ?>
            
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav mr-auto">
                <?php
                if ( !empty($_SESSION['nom']) ) { 
                    echo "<li class='nav-item active'>
                        <a class='nav-link' href='index.php?controle=edt&action=afficher&parametre=1''>Mon emploi du temps <span class='sr-only'>(current)</span></a>
                    </li>";
                }
                
                ?>
                
                
                </ul>
                <form class="form-inline my-2 my-lg-0">
                <?php
                if ( empty($_SESSION['nom']) ) { 
                    echo "
                    <a class='btn btn-secondary my-2 my-sm-0' href='index.php' role='button'>Connexion &nbsp;<i class='fas fa-sign-in-alt'></i></a>
                    ";
                }
                else {
                    echo "
                    <a class='btn btn-secondary my-2 my-sm-0' href='index.php?controle=utilisateur&action=compte' role='button'>Mon compte &nbsp;<i class='fas fa-user'></i></a>

                    <a class='btn btn-secondary my-2 my-sm-0' href='index.php?controle=utilisateur&action=deconnexion' role='button'>Déconnexion &nbsp;<i class='fas fa-sign-out-alt'></i></a>
                    ";
                }
                ?>

                
                </form>
            </div>
        </nav>