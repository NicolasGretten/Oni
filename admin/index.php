<?php if ( empty(session_id()) ) session_start(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="icon" href="../favicon.ico" type="image/ico" />
    <title>Oni - 鬼 | Administration </title>
    <link href="vendors/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <link href="build/css/custom.min.css" rel="stylesheet">
    <?php 
      require '../pages/connexion.php';
      if (isset ($_POST['deconnexion'])){
          $_SESSION = array();
          session_destroy();
          setcookie('login', '');
          setcookie('pass_hache', '');
          }
      ?>
  </head>
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.php" class="site_title"><span>Oni - 鬼</span></a>
            </div>
            <div class="clearfix"></div>
            <div class="profile clearfix">
              <div class="profile_info">
                Bonjour, <h2><?php if(!isset($_SESSION['pseudo_admin'])){echo "Conectez vous";}else{echo $_SESSION['pseudo_admin'];}?></h2>
              </div>
            </div>
            <br />
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
                  <li><a href="index.php"><i class="fa fa-home"></i> Accueil</a></li>
                  <li><a><i class="fa fa-edit"></i> Ajouter <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="index.php?page=3">Catégorie</a></li>
                      <li><a href="index.php?page=2">Produit</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-desktop"></i> Media <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="index.php?page=5">Images</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-table"></i> Commandes <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="index.php?page=7">Commandes</a></li>
                    </ul>
                  </li>
              </div>
            </div>
          </div>
        </div>
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <?php if(!isset($_SESSION['pseudo_admin'])){echo "inviter";}else{echo $_SESSION['pseudo_admin'];}?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu">
                    <form action="index.php" method="post"><input type="submit" value="Déconnexion" name="deconnexion" class="btn btn-primary"></form>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <div class="right_col" role="main">
          <?php
          if(isset($_GET['page'])) {
               $page=$_GET["page"];

              if($page ==2){
                if (!isset($_SESSION['identifiant'])) {
                  include('pages/login.php');
              }
                else{
                  include('pages/form_validation.php');
                }
              }
              elseif($page ==3){
                if (!isset($_SESSION['identifiant'])) {
                  include('pages/login.php');
              }
                else{
                  include('pages/form_Categorie.php');
                }
              }
              elseif($page ==5){
                if (!isset($_SESSION['identifiant'])) {
                  include('pages/login.php');
              }
                else{
                  include('pages/media_gallery.php');
                }
              }  
              elseif($page ==6){
                if (!isset($_SESSION['identifiant'])) {
                  include('pages/login.php');
              }
                else{
                  include('pages/widgets.php');
                }
              }   
              elseif($page ==7){
                if (!isset($_SESSION['identifiant'])) {
                  include('pages/login.php');
              }
                else{
                  include('pages/invoice.php');
                }
              }    
              elseif($page ==8){
                if (!isset($_SESSION['identifiant'])) {
                  include('pages/login.php');
              }
                else{
                  include('pages/tables_dynamic.php');
                }
              }
                
              else{
                  include('pages/widgets.php');
              }
          }
          else {
            if (!isset($_SESSION['identifiant'])) {
                include('pages/login.php');
            } 
            else{
              include('pages/widgets.php');
            }
          }
           
      ?>
        </div>
        <footer>
          <div class="pull-left">
          boutique : <a href="../">Oni - 鬼</a>
          </div>
          <div class="clearfix"></div>
        </footer>
      </div>
    </div>
    <script src="vendors/jquery/jquery.min.js"></script>
    <script src="vendors/bootstrap/bootstrap.min.js"></script>
    <script src="build/js/custom.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
  </body>
</html>
