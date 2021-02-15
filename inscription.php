<?php
	$nom=  isset($_POST['nom'])?($_POST['nom']):'';
	$num=  isset($_POST['num'])?($_POST['num']):'';
	$prenom=  isset($_POST['prenom'])?($_POST['prenom']):'';
	$email=  isset($_POST['email'])?($_POST['email']):'';
	$msg='';

	if  (count($_POST)==0)
              require ("inscription.tpl") ;
    else {
	    $profil = array();
		
	if(isset($_POST['nom'],$_POST['prenom'], $_POST['num'], $_POST['email'])){
        
		if(!preg_match("/^[a-zA-Z0-9- ]+$/",$_POST['nom'])){
			$msg = "Le nom doit être saisi en lettres minuscules sans accents et sans caractères spéciaux.";
            require ("inscription.tpl");
		}			
		elseif(!preg_match("#^[a-zA-Z0-9]+$#",$_POST['prenom'])){
			$msg = "Le prenom doit être renseigné en lettres minuscules sans accents, sans caractères spéciaux.";
            require ("inscription.tpl") ;
		}
		elseif(strlen($_POST['nom'])>20){
			$msg = "Le nom est trop long, il dépasse 20 caractères.";
            require ("inscription.tpl") ;
		} 
		elseif(strlen($_POST['num'])>10){
            $msg = "La matricule est trop longue.";
            require ("inscription.tpl") ;
		} 
		elseif(strlen($_POST['num'])<8){
			$msg = "La matricule est trop courte.";
            require ("inscription.tpl") ;
		} 
        elseif(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
			$msg = "L'email saisi est invalide.";
            require ("inscription.tpl") ;
		} 
		elseif  (verif_ident($nom,$num,$profil)) {
				$msg ="Vous êtes déjà inscrit";
				require ("inscription.tpl") ;
			}
			else { 
				ajout_inscrit($nom, $num, $prenom, $email);
				echo ("Bonjour! Bienvenue Mr/Mme $nom, votre inscription a bien été prise en compte :)"); 
			}
		}
	}

	function ajout_inscrit($nom,$num,$prenom,$email){
        //connexion au serveur de BD -> voir fichier connect.php
		require ("connect.php");       
        //requete select en BD  -> voir fin cours PDO -> requete paramétrée	
		$sql="INSERT INTO utilisateur (nom, num, prenom, email) VALUES (:nom, :num, :prenom, :email)";
		try {
			$commande = $pdo->prepare($sql);
			$commande->bindParam(':nom', $nom, PDO::PARAM_STR);
			$commande->bindParam(':num', $num, PDO::PARAM_INT);
			$commande->bindParam(':prenom', $prenom, PDO::PARAM_STR);
			$commande->bindParam(':email', $email, PDO::PARAM_STR);
			$commande->execute();
			return true;
		}
			catch (PDOException $e) {
			echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
			die(); // On arrête tout.
		}
	}
/* --- Vérification de l'identité --- */	
	function verif_ident($nom,$num, &$profil) {
		//connexion au serveur de BD -> voir fichier connect.php
		require ("connect.php");
        //requete select en BD  -> voir fin cours PDO -> requete paramétrée	
		$sql="SELECT * FROM utilisateur  where nom=:nom and num=:num"; 
		try {
			$commande = $pdo->prepare($sql);
			$commande->bindParam(':nom', $nom, PDO::PARAM_STR);
			$commande->bindParam(':num', $num, PDO::PARAM_INT);
			$commande->execute();

			if ($commande->rowCount() > 0) {  
				$profil = $commande->fetch(PDO::FETCH_ASSOC); 
				return true;
			}
			else {
				return false;
			}
		}
		
		catch (PDOException $e) {
			echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
			die(); // On arrête tout.
		}
	}





?>

