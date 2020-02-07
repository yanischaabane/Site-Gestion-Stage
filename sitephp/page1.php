<!doctype html>
<html lang="fr">
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Gestion de Stage</title>
<meta name="description" content="Le menu change d'apparence en fonction de la taille de la fenetre du navigateur, idéal donc pour les smartphones et tablettes" />
<meta name="Robots" content="all"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<link rel="stylesheet" type="text/css" href="css/default.css" />
<link rel="stylesheet" type="text/css" href="css/component.css" />
<link rel="stylesheet" href="css/style.css" />
<script src="js/modernizr.custom.js"></script>
</head>
 <body>
 <div class="container">	
	<div class="main clearfix">
        
        <?php include("entete.php"); ?>
        
        <?php include("menu.php"); ?>
        
        <br> <br>  <br>  <br>  <br>  <br>  <br> <br><br>  <br> <br>  <br>  <br>  <br>  
        <center>
        <h1> Enregistrement eleves </h1> <br>
        <div id="contenu">

            <h3>Entrez les données demandées :</h3>
            <form method="post" action="page1.php">
                Entrez votre ID : <input type="text" name="Idetud"/> <br/>
                Entrez votre nom : <input type="text" name="Nometudiant"/> <br/>
                Entrez votre prénom : <input type="text" name="Prenometudiant"/> <br/>
                Entrez votre mail : <input type="text" name="Mailetudiant"/> <br/>
                Envoyer <input type="submit" name="submit"/>
            </form>



    
    <?php
    try{
        $bdd = new PDO('mysql:host=localhost;dbname=tpstage', 'root', 'yanis', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        if(isset($_POST['submit'])){
            $idetud=($_POST['Idetud']);
            $nometud=($_POST['Nometudiant']);
            $prenometud=($_POST['Prenometudiant']);
            $mailetud=($_POST['Mailetudiant']);
            $req = $bdd->prepare('INSERT INTO Etudiants VALUES (?,?,?,?)');   ///met autant de ? que de colonne///
            $success = $req->execute(array($idetud,$nometud,$prenometud,$mailetud));
            if($success) {
                echo"<p style='color: green'>Etudiant enregistré</p>";
            } else {
                echo"<p style='color: red'>Erreur d'enregistrement</p>";
            }
          }
        }
    catch(exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
        echo '-----------------------------------------------------------------------<br/>'."\n"; 
        echo 'Liste des élèves enregistrer :';
        $reponse = $bdd->query('SELECT * FROM Etudiants');  
        while ($donnees = $reponse->fetch())          
        {
            echo '<p>' . $donnees['Idetud'] . ' - ' . $donnees['PrenomEtud'] . ' - ' . $donnees['NomEtud'] . ' - ' . $donnees['MailEtud'] . '</p>';
        }


    ?>

    </center>
    </div> 
    </div>
    </div>   
    <?php include("pieddepage.php"); ?>

    
 </body>
</html>



