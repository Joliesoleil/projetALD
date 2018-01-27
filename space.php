<?php include('connexion.php');
include('menu.php');
 ?>

<!DOCTYPE html>
<html lang="en">
	<head>

		<meta charset="utf-8">
		
		<meta http-equiv="X-UA-Compatible" content="IE=edge"> <!--navigateur internet Exploreur-->
		<meta name="Viewport" content="witdth=device-width, initial-scale=1">
		<meta neme="description" content="c'est une boutique en ligne">
		<meta name="author" content="Marie Danielle YEBOUA">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/styles.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>

		<title>Site ALD</title>

	</head>

	<body>

		<div class="container" style="padding:10px;">
			<div class="row-padding" style="text-align:center;">
				<h2 class="text-primary border border-primary border-top-0 border-right-0 border-left-0">Profil des stagiaires</h2>

				<?php
				// Connexion à la base de données
				// une autre manière de se connecter à la base de données
					try
					{
						$bdd = new PDO('mysql:host=localhost;dbname=db-ald;charset=utf8', 'root', '');
					}
					catch(Exception $e)
					{
					        die('Erreur : '.$e->getMessage());
					}

					// On récupère les 5 derniers articles
					$req = $bdd->query('SELECT * FROM candidature ORDER BY id DESC');
					while ($donnees = $req->fetch())
					{?>
				
				<div class="col-md-12">
					<div class="card jumbotron">
					  <div class="card-body">
					  	<img src="upload/<?php echo $donnees['image'];?>" width="100px" height="100px" alt="Mon Image"/><br>
					  	<h4><!-- htmlspecialchars : permet de proteger les textes -->
							<?php echo htmlspecialchars($donnees['secteur']); ?>
						</h4>
						<div style="font-size:15px;">Stage souhaité: <?php
					  		echo htmlspecialchars($donnees['type']);
							?>
						</div>
					  	<div style="font-size:15px;">Nom: <?php 
					  		echo htmlspecialchars($donnees['civilite']);
					  		echo htmlspecialchars($donnees['nom']);
							?>
						</div><br>
						<div style="font-size:15px;">Prénom: <?php
					  		echo htmlspecialchars($donnees['prenom']);
							?>
						</div>
						<div style="font-size:15px">Date de naissance: <?php
					  		echo htmlspecialchars($donnees['date']);
							?>
						</div>
						<div style="font-size:15px">Niveau d'étude: <?php
					  		echo htmlspecialchars($donnees['niveau']);
							?>
						</div>
						<div style="font-size:15px">Etablissement: <?php
					  		echo htmlspecialchars($donnees['etablissement']);
							?>
						</div>
						<div style="font-size:15px">Numéro: <?php
					  		echo htmlspecialchars($donnees['numero']);
							?>
						</div>
						<div style="font-size:15px">Description: <?php
					  		echo htmlspecialchars($donnees['description']);
							?>
						</div>

					  	
					  </div>
					</div>
				</div>
				<?php
				} // Fin de la boucle des articles
					$req->closeCursor();
				?>

			</div>
		</div>
		<script type="text/javascript" src="js/bootstrap.js"></script>
	</body>
</html>
