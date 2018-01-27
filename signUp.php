<?php include('connexion.php');
	  include('menu.php');

	$msg="";
	if (isset($_POST['btnValider'])){

		    /* Requête pour récupérer les enregistrements répondant à la clause : champ du pseudo et champ du mdp de la table = pseudo et mdp posté dans le formulaire */
    		$requete = "SELECT * FROM employeurs WHERE username = :nom AND email = :mail AND mdp = :MDP";
    		$requete=mysqli_query($link,$requete);
    	if ($requete) {
    		$msg = "Le nom d'utilisateur, le mail ou le mot de passe existe déjà.";
    	}else{
			
			$sql= "INSERT INTO employeurs (username, email, mdp)
			 VALUES ('".($_POST['nom'])."',
			        '".($_POST['mail'])."',
			 		'".sha1($_POST['MDP'])."')"; //protection des variable

			$result=mysqli_query($link,$sql);
			if ($result) {
				/* Démarre une session si aucune n'est déjà existante et enregistre le pseudo dans la variable de session $_SESSION['login'] qui donne au visiteur la possibilité de se connecter.  */
          		if (!session_id()) session_start();{
          			$_SESSION['login'] = $_POST['nom'];
		          
		          /* A MODIFIER Remplacer le '#' par l'adresse de votre page de destination, sinon ce lien indique la page actuelle.*/
		          $message = 'Votre inscription est enregistrée.';
		          /*ou redirection vers une page en cas de succès ex : menu.php*/
		          header("Location: login.php");
		            exit();
		        }
				$msg='Vous avez été bien enreigistré';
			}else{
				$msg=mysqli_error($link);
			}
		}

	}
 ?>

 



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
        
        <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!--navigateur internet Exploreur-->
        <meta name="Viewport" content="witdth=device-width, initial-scale=1">
        <meta neme="description" content="offre de stage">
        <meta name="author" content="Marie Danielle YEBOUA">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/menu.css">

</head>
<body>

	<div class="container">
        <div class="row">

          <div class="col-md-2"></div>
            <div class="col-md-8">

            	<form action="" method="POST" role="form">
						<legend>Enrégistrement employeur</legend><br><br>

						<div class="form-group">
							<label >Nom d'utilisateur</label>
							<input type="texte" name="nom" class="form-control" id="" placeholder="Saisir un nom d'utilisateur"><br>
						</div>

						<div class="form-group">
							<label for="">E-mail</label>
							<input name="mail" type="email"  class="form-control" id="" placeholder="example@gmail.com"><br>
						</div>

						<div class="form-group">
							<label >Mot de passe</label>
							<input type="password" name="MDP" class="form-control" id="" placeholder="Saisir un mot de passe"><br>
						</div>
						
						<center><a href="#"><button type="submit" name="btnValider" class="btn btn-success" style="width: 300px">Submit</button></a></center>
					</form>

			</div>
		</div>
	</div>


	<span><?php
		echo $msg;
	 ?></span>

</body>
</html>