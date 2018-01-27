<?php include('connexion.php');
	  include('menu.php');
	$msg="";
	if (isset($_POST['btnValider'])){

		if (move_uploaded_file($_FILES['image']['tmp_name'], 'logo/'.$_FILES['image']['name'])) {
			
			$sql= "INSERT INTO stages (nom_entreprise, logo, titre_offre, description, categories_id)
			 VALUES ('".($_POST['nom'])."',
			 	    '".($_FILES['image']['name'])."',
			        '".($_POST['titre'])."',
			 		'".($_POST['description'])."',
			 		'".($_POST['categorie'])."')"; 

			$result=mysqli_query($link,$sql);
			if ($result) {
				echo $msg='Votre offre a bien été enreigistré';
			}else{
				echo $msg=mysqli_error($link);
			}
		}else {echo $smg="On est dans le else";}

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

            	<form action="" method="POST" role="form" enctype="multipart/form-data">
						<legend>FORMULAIRE ENTREPRISE</legend><br><br>

						<div class="form-group">
							<label >Nom de l'entreprise</label>
							<input type="texte" name="nom" class="form-control" id="" placeholder="Saisir le nom de l'entreprise"><br>
						</div>

						<div class="form-group">
							<label for="">Logo de l'entreprise</label>
							<input name="image" type="file"  class="form-control" id="" placeholder=""><br>
						</div>

						<div class="form-group">
							<label >Titre de l'offre</label>
							<input type="texte" name="titre" class="form-control" id="" placeholder="Saisir le titre"><br>
						</div>

						<div class="form-group">
							<label>Categorie</label>
							<select name="categorie" class="form-control" placeholder="Selectionner la catedorie"><br>
									<?php
								//recupere toutes les categories dans la bd
								$sqlcategorie="SELECT * FROM categories";
								//execute la requete et on la stock dans $repcategorie
								$repcategorie=mysqli_query($link,$sqlcategorie);
								//mysqli_fetch_array = permet de transformer le resultat $repcategorie en variable de type tableau $datacat
								// la boucle while nous permet de parcourir le tableau $datacat et de recuperer les valeurs de chaques elements du tableau $datacat
								while ($datacat=mysqli_fetch_array($repcategorie)) {
									?>
									<option value="<?php echo $datacat['id'];?>">
									<?php echo $datacat['id'].'-'.$datacat['libelle'];?>
										
									</option>

									<?php
								}
								?>
							</select>
						</div>

						<div class="form-group" >
                            <label >Description*</label><br>
                            <input name="description" type="text" style="width: 100%; height: 60px;" class="form-control"
                            ><br>
                    	</div>
						
					
						<center><button type="submit" name="btnValider" class="btn btn-danger" style="width: 300px">Submit</button></center>
					</form>

			</div>
		</div>





</body>
</html>