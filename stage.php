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
				<h2 class="text-primary border border-primary border-top-0 border-right-0 border-left-0">Offres disponibles</h2>

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

					$req = $bdd->query('SELECT * FROM stages ORDER BY id DESC');
					while ($donnees = $req->fetch())
					{?>
				
				<div class="col-md-12">
					<div class="card jumbotron">
					  <div class="card-body">
					  	<img src="logo/<?php echo $donnees['logo'];?>" width="100px" height="100px" alt="Mon Image"/><br>
					  	<h4><!-- htmlspecialchars : permet de proteger les textes -->
							<?php echo htmlspecialchars($donnees['titre_offre']); ?>
						</h4>
						<div style="font-size:15px;">Nom de l'entréprise: <?php
					  		echo htmlspecialchars($donnees['nom_entreprise']);
							?>
						</div>
						<div style="font-size:15px;">Description de l'offre: <br> <?php
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
