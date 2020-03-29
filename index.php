<?php 
   if ( empty(session_id()) ) session_start(); 
?>
<!DOCTYPE html>
<html>
<head>
    <?php
    require 'pages/function.php'; 
            global $bdd;
            if (isset ($_POST['deconnexion'])){
                $req_destroy = $bdd ->query('DELETE FROM cart WHERE id_commande="'.$_SESSION['id_commande'].'"');
                $_SESSION = array();
                session_destroy();
                
                setcookie('login', '');
                setcookie('pass_hache', '');
                }
                if (!isset($_SESSION['id_commande'])) {
                    $_SESSION['id_commande']=session_create_id();
                }
                $id_anonyme=$_SESSION['id_commande'];
            $inactive = 60; 
            $_session['timeout']=time();

            $session_life = time() - $_session['timeout'];

            if($session_life > $inactive){  
                $req_destroy = $bdd ->query('DELETE FROM cart WHERE id_commande="'.$_SESSION['id_commande'].'"');
                session_destroy();
                }
            ?>
<meta charset="utf-8" />
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
<link rel="stylesheet" href="build/css/bootstrap.min.css" type="text/css" media="all" />
<link rel="stylesheet" href="build/css/all.css" type="text/css" media="all" />
<link rel="stylesheet" href="build/css/style.css" type="text/css" media="all" />
<title>Oni - 鬼</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="index.php">Oni - 鬼</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01"
            aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Accueil <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="index.php?page=2"
                        aria-haspopup="true" aria-expanded="false">Hommes</a>
                    <div class="dropdown-menu" style="">
                        <?php
                    categorie('hommes');
                ?>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="index.php?page=3"
                        aria-haspopup="true" aria-expanded="false">femmes</a>
                    <div class="dropdown-menu" style="">
                        <?php
                    categorie('femmes');
                ?>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="index.php?page=3"
                        aria-haspopup="true" aria-expanded="false">Accessoires</a>
                    <div class="dropdown-menu" style="">
                        <?php
                    categorie('accessoires');
                ?>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
                
            </ul>
            <ul class="navbar-nav">
            <li class="nav-item">
                    <a class="nav-link align-self-center"
                        href="index.php?page=20&id_anonyme=<?php echo $id_anonyme?>&id=0"><i class="fas fa-shopping-cart"></i>
                        Mon panier
                    </a>
                </li>
                <li class="nav-item dropdown align-self-center">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                        aria-haspopup="true" aria-expanded="false"><i class="fas fa-user"></i> Mon compte</a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-default"
                        aria-labelledby="navbarDropdownMenuLink-333">
                        <?php if(!isset($_SESSION['id'])){
                                    echo '
                                    <button id="conexionBtn" type="submit" class="btn btn-outline-secondary dropdown-item">Connexion</button>';
                                }
                                else{
                                    echo'
                                    <a href="index.php?page=4" style="text-decoration:none;"><button type="button" class="btn btn-outline-secondary dropdown-item" id="mes_commandes">Mes commandes</button></a>
                                    <button type="submit" class="btn btn-outline-secondary dropdown-item" id="infoCompte">Mon compte</button>
                                            <form action="index.php" method="post">
                                            <button type="submit" class="btn btn-outline-secondary dropdown-item" value="Deconnexion" name="deconnexion">Deconnexion</button>
                                            </form>
                                        ';
                                }
                                ?>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <div class="mainbody">
        <?php
        inc();
        ?>
    </div>
    <footer class="page-footer font-small bg-primary pt-4 border-top mt-5 text-white sticky-bottom">
        <div class="container-fluid text-center text-md-left">
            <div class="row">
                <div class="col-md-6 mt-md-0 mt-3">
                    <h2 class="text-uppercase text-white">Oni - 鬼</h2>
                    <p>Mode alternative et produits dérivés</p>
                </div>
                <hr class="clearfix w-100 d-md-none pb-3">
                <div class="col-md-3 mb-md-0 mb-3">
                    <h5 class="text-uppercase text-white">Services</h5>
                    <ul class="list-unstyled text-white">
                        <li>
                            <a href="index.php?page=22" class="text-white">Aide</a>
                        </li>
                        <li>
                            <a href="index.php?page=5" class="text-white">Contact</a>
                        </li>
                        <li>
                            <a href="mailto:ngretten@gmail.com" class="text-white">ngretten@gmail.com</a>
                        </li>
                        <li>
                            <a href="#!" class="text-white">06.07.23.96.37</a>
                        </li>
                    </ul>

                </div>
                <div class="col-md-3 mb-md-0 mb-3">
                    <h5 class="text-uppercase text-white">Société</h5>
                    <ul class="list-unstyled">
                        <li>
                            <a href="index.php?page=23" class="text-white"> A propos</a>
                        </li>
                        <li>
                            <a href="index.php?page=23" class="text-white">Informations légales</a>
                        </li>
                        <li>
                            <a href="index.php?page=23" class="text-white">Protection des données</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <script src="build/js/jquery-3.4.1.min.js"></script>
    <script src="build/js/bootstrap.min.js"></script>
    <script src="build/js/all.js"></script>
    <script src="build/js/script.js"></script>
</body>
</html>