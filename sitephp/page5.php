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
		<h1>Liste des stages  </h1> <br>
       

        <?php
        
        
        $bdd = new PDO('mysql:host=localhost;dbname=tpstage;charset=utf8', 'root', 'yanis');
        echo 'Liste des Stages :';
        
        foreach ($bdd->query(
            'SELECT 
            *, 
            Etudiants.Idetud, Etudiants.NomEtud, 
            Entreprise.identreprise, Entreprise.denomination,
            Tuteur.id, Tuteur.nomtut
            FROM Stage
            INNER JOIN Etudiants ON Stage.Idetud=Etudiants.Idetud
            INNER JOIN Entreprise ON Stage.Identreprise=Entreprise.identreprise
            INNER JOIN Tuteur ON Stage.Idtuteur=Tuteur.id') as $donnees)
                
        {
            echo '<p>' . $donnees['NomEtud'] . ' - ' . $donnees['Datedeb']. ' - ' . $donnees['Datefin'].' - ' . $donnees['nomtut'].' - ' . $donnees['denomination'].' - ' . $donnees['Description'].'</p>';
        }

        ?>

        </center>
    </div>
</div>   
    <?php include("pieddepage.php"); ?>

</body>
</html>
