<?php 
	$no=htmlspecialchars($nom); 
	$nu=htmlspecialchars($num); 
	$pr=htmlspecialchars($prenom);  
	$em=htmlspecialchars($email); 
?>

<!doctype html>
<html lang="fr">

<head>
    <link href="style/style1.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="Bootstrap/css/bootstrap.min.css"/>
    <link rel="stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <title>inscription formulaire</title>
</head>

<body>

    <div id="center">
        <h1> Formulaire d'inscription </h1> 
        <div id="contenu">
            <div class ="container-fluid">
            <div class ="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <img class="image1" src="img/icon_clipboard.svg" >
            </div>
            <div id="formulaire" class="col-lg-6 col-md-6 col-sm-6">
                <form action="inscription.php" method="post">
                    <div class="champ">
                        <label>Nom :</label><br>
                        <input name="nom" type="text" value= "<?php echo($no); ?>" placeholder="Nom" required/>
                    </div>
                    <div class="champ">
                        <label>Prénom :</label><br>
                        <input name="prenom" type="text" value= "<?php echo($pr); ?>" placeholder="Prénom" required/>   
                    </div>
                    <div class="champ">
                        <label>Matricule :</label><br>
                        <input name="num" type="text" value= "<?php echo($nu); ?>" placeholder="Matricule" required/>	
                    </div>
                    <div class="champ">
                        <label>E-mail :</label><br>
                        <input name="email" type="email" value= "<?php echo($em) ?>" placeholder="Email" required/>
                    </div>
                    <input id="submit" type= "submit"  value="S'inscrire">
                </form>
                <div id ="msg"> <?php echo $msg; ?> </div> 
            </div>
            </div>
            </div>
        </div>
    </div>
</body>
</html>
