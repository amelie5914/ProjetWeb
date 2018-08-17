<?php
require './admin/lib/php/adm_liste_include.php';
$cnx = Connexion :: getInstance($dsn, $user, $pass);
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel ="stylesheet" type="text/css" href="admin/lib/css/bootstrap-4.1.0/dist/css/bootstrap.css"/>
        <link rel="stylesheet" type="text/css" href="lib/css/style_principal.css"/>
		<link href="https://fonts.googleapis.com/css?family=Berkshire+Swash|El+Messiri" rel="stylesheet">
        <script src="admin/lib/js/jquery-3.3.1.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        
        <script src="admin/lib/css/bootstrap-4.1.3-dist/js/bootstrap.js"></script>
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.2.0/js/tether.min.js" ></script>

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.3/js/bootstrap.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/jquery.validate.min.js"></script>

        <!--<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>-->
        <script language="javascript" src="admin/lib/js/fonctions.js"></script>
	<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>-->
<!--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>-->
<!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>        
--><meta charset="UTF-8">
        <title>Pas de titre encore</title>
    </head>
    <body class="fond img-fluid">
        <div>
           
            <img src="admin/images/accueil.jpg" class="img-responsive banniere" style="width:100%;" alt="banniere">
            <?php
                if(file_exists('lib/php/menu.php')){
                    include ('lib/php/menu.php');
                }
                ?>
            <section id="main">
                <div>
                    <?php
                        if(!isset($_SESSION['page'])){
                            $_SESSION['page']="accueil";
                        }
                        if(isset($_GET['page'])){
                            $_SESSION['page']=$_GET['page'];
                        }
                        $path='pages/'.$_SESSION['page'].'.php';
                        
                        if(file_exists($path)){
                            include ($path);
                        }
                        else {
                            print "Oups...";
                        }
                    ?>
                </div>
            </section>
        </div>
        <footer class="footer centrer clear">
            <?php
                if(file_exists('lib/php/footer.php')){
                    include ('lib/php/footer.php');
                }
                ?>
        </footer>
       
    </body>
</html>
