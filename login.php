<?php include('connexion.php');
	  include('menu.php');
$msg="";
if (isset($_POST['btnValider'])){

	$sql="INSERT INTO login (email,mdp)
		VALUES ('".$_POST['email']."',
				'".$_POST['mdp']."')";

	$result=mysqli_query($link,$sql);
	if ($result) {
		$msg='Enreigistrement reussie';

	}else{
		$msg=mysqli_error($link);
	}

}
?>

<!DOCTYPE html>

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

				<div class="col-md-4"> 
				</div>
				<div class="col-md-4">

					<form action="" method="POST" role="form">
						<legend>Se connecter</legend>

						<div class="form-group">
							<label for="">EMAIL</label>
							<input type="email" name="email" class="form-control" id="" placeholder="Exemple@email.com">
						</div>

						<div class="form-group">
							<label for="">MOT DE PASSE</label>
							<input type="password" name="mdp" class="form-control" id="" placeholder="Saisir le mot de passe">
						</div>
					
						<button type="submit" name="btnValider" class="btn btn-primary">Valider</button>
					</form>
					
					
					
				<div class="col-md-4"></div>


	</tbody>
	</table>
			</div>


		</div>



		
	</body>
</html>