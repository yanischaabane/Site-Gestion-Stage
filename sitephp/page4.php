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
        
        <?php include("entete.php") ?>
        
        <?php include("menu.php"); ?>
        
        <br> <br>  <br>  <br>  <br>  <br>  <br> <br><br>  <br> <br>  <br>  <br>  <br>  
        <center>
		<h1>Enregistement stage </h1> <br>
        </center>
        <center>
        <?php
        
        echo'<form action="page4.php" method="post"><p>';
        $bdd = new PDO('mysql:host=localhost;dbname=tpstage;charset=utf8', 'root', 'yanis');
    ///Paneau déroulant pour les étudiants
        echo'<label for="ref_etudiant">Etudiants</label> :';
        echo'<select name="ref_etudiant">';
        echo '<option value="">--Choisir un étudiant--</option>';
        foreach ($bdd->query('SELECT * FROM Etudiants') as $etud) 
            
        {
            echo '<option value="' .$etud['Idetud']. '">' .$etud['NomEtud']. " " .$etud['PrenomEtud'].'</option>';
        
            
               
        }
        echo '</select> <br />'; 
    
       
       
        ///Paneau déroulant pour les étudiants
        echo'<label for="ref_tuteur">Tuteur</label> :';
        echo'<select name="ref_tuteur">';
        echo '<option value="">--Choisir un Tuteur--</option>';
        foreach ($bdd->query('SELECT * FROM Tuteur') as $tut) 
        {
            echo '<option value="' .$tut['id']. '">' .$tut['nomtut']. " " .$tut['prenomtut'].'</option>';
        
            
               
        }
        echo '</select> <br />'; 
        
        
        
        ///Paneau déroulant pour les étudiants
        echo'<label for="ref_entreprise">Entreprise</label> :';
        echo'<select name="ref_entreprise">';
        echo '<option value="">--Choisir une Entreprise--</option>';
        foreach ($bdd->query('SELECT * FROM Entreprise') as $entre) 
        {
            echo '<option value="' .$entre['identreprise']. '">' .$entre['denomination'].'</option>';
        
            
               
        }
        echo '</select> <br />
    
    
    
                    Entrez la date de début : <input type="date" name="Datedeb"/> <br/>
                    Entrez la date de fin : <input type="date" name="Datefin"/> <br/>
                    Décrivez le stage : <input type="text" name="Description"/> <br/>
                    Envoyer <input type="submit" name="submit"/>
        </form>';
    
       
        try{
            
            if(isset($_POST['submit'])){
                $Datedeb=$_POST['Datedeb'];
                $Datefin=$_POST['Datefin'];
                $Description=$_POST['Description'];
            if($Datefin > $Datedeb) {
                $req = $bdd->prepare('INSERT INTO Stage VALUES (?,?,?,?,?,?)');   ///met autant de ? que de colonne///
                $success = $req->execute(array($etud['Idetud'],$Datedeb,$Datefin,$tut['id'],$entre['identreprise'],$Description));
                if($success) {
                    echo"<p style='color: green'>Stage enregistré</p>";
                }elseif($success)  {
                    echo"<p style='color: red'>Erreur d'enregistrement</p>";
                }
            
            }
        }    
        }    
        catch(exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }
           
    
    
        ?>
        </center>
            
    </div>
    </div>   
    </div> 
    <?php include("pieddepage.php"); ?>
    
        
</body>
</html>
    

  
