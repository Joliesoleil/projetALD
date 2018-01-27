<?php include('connexion.php');
      include('menu.php');

$msg="";
if (isset($_POST['btnValider'])){

    if (move_uploaded_file($_FILES['image']['tmp_name'], 'upload/'.$_FILES['image']['name'])) {

        $sql="INSERT INTO candidature (civilite, image, nom, prenom, date, numero, etablissement, niveau, secteur, type, description)
            VALUES ('".$_POST['civilite']."',
                    '".($_FILES['image']['name'])."',
                    '".$_POST['nom']."',
                    '".$_POST['prenom']."',
                    '".$_POST['date']."',
                    '".$_POST['numero']."',
                    '".$_POST['etablissement']."',
                    '".$_POST['niveau']."',
                    '".$_POST['secteur']."',
                    '".$_POST['type']."',
                    '".$_POST['description']."')";

        $result=mysqli_query($link,$sql);
        if ($result) {
            $msg='Vos informations ont biens été rereigistrés!';

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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta neme="description" content="c'est un blog">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/menu.css">
    <title>projetALD</title>
</head>
<body>

    <div class="container">
        <div class="row">

          <div class="col-md-2"></div>
            <div class="col-md-8">
               
            <form action="" method="POST" role="form" enctype="multipart/form-data">

            <h2 align="center">Formulaire d'enreigistrement</h2><br>
   
            <legend>Renseignement personnelle</legend><br><br>

                <div class="col-xs-10 col-xs-offset-1 col-md-offset-0 col-sm-5 col-lg-5 col-md-5">
                    <label>Civilité</label>
                    <select id="civilite" name="civilite" class="form-control" >
                        <option value="Civilité">Civilité</option>
                        <option value="M.">M.</option>
                        <option value="Mme">Mme</option>
                        <option value="Mlle">Mlle</option>
                    </select><br>
                </div>

                 <div class="col-xs-10 col-xs-offset-1 col-md-offset-2 col-sm-5 col-lg-5 col-md-6">
                            <label for="">Image*</label>
                            <input name="image" type="file" class="form-control" id="" placeholder="photo" required><br><br>
                    </div>

                    <div class="col-xs-10 col-xs-offset-1 col-md-offset-0 col-sm-5 col-lg-5 col-md-6">
                            <label for="">Nom*</label>
                            <input name="nom" type="texte" class="form-control" id="" placeholder="Entrer votre nom" required><br><br>
                    </div>
                    
                    <div class="col-xs-10 col-xs-offset-1 col-md-offset-2 col-sm-5 col-lg-5 col-md-6">
                            <label for="">Prenom*</label>
                            <input name="prenom" type="texte" class="form-control" id="" placeholder="Entrer votre prenom" required><br><br>
                    </div>
                  
                     <div class="col-xs-10 col-xs-offset-1 col-md-offset-0 col-sm-5 col-lg-5 col-md-6">
                            <label for="">Date de naissance*</label>
                            <input name="date" type="date" class="form-control" id="" placeholder="" required><br><br>
                    </div>

                    <div class="col-xs-10 col-xs-offset-1 col-md-offset-2 col-sm-5 col-lg-5 col-md-6">
                            <label for="">Numero*</label>
                            <input name="numero" type="texte" class="form-control" id="" placeholder="Entrer vos numero" required><br><br><br><br><br><br>
                    </div>

                <legend>Information relative a votre vos critères de recherche de stage</legend><br><br>

                    <div class="col-xs-10 col-xs-offset-1 col-md-offset-0 col-sm-5 col-lg-5 col-md-6">
                            <label for="">Etablissement*</label>
                            <input name="etablissement" type="texte" class="form-control" id="" placeholder="Entrer le nom de l'etablissement" required><br><br>
                    </div>

                    <div class="col-xs-10 col-xs-offset-1 col-md-offset-2 col-sm-5 col-lg-5 col-md-6">
                            <label for="">Niveau d'etude*</label>
                            <select name="niveau" class="form-control" >
                        <option value="niveau">Nievau d'etude</option>
                        <option value="bac+1">Bac+1</option>
                        <option value="bac+2">Bac+2</option>
                        <option value="bac+3">Bac+3</option>
                        <option value="bac+4">Bac+4</option>
                        <option value="bac+5">Bac+5</option>
                        
                        </select><br><br> 
                    </div>

                    <div class="col-xs-10 col-xs-offset-1 col-md-offset-0 col-sm-5 col-lg-5 col-md-6">
                            <label for="">Filière*</label>
                            <input name="secteur" type="texte" class="form-control" id="" placeholder="secteur d'activité" required><br><br>
                    </div>

                    <div class="col-xs-10 col-xs-offset-1 col-md-offset-2 col-sm-5 col-lg-5 col-md-6">
                        <label for="">Type d'offres*</label>
                        <select name="type" class="form-control" >

                        <option value="niveau">Type de satge</option>
                        <option value="stage">Stage école</option>
                        <option value="stage">stage de perfectionnement</option>
                        </select><br><br>
                   </div>

                    <div class="row">
                            <label for="">Qu'est-ce qui vous demarque des autres*</label><br>
                            <input name="description" type="text" style="width: 100%; height: 70px;" class="form-control"
                            ><br><br>
                </div>

                <div>
                      <center><button type="submit" name="btnValider" class="btn btn-primary">Valider</button></center>

                </div><br><br><br>
            </form>
        </div>
    <div class="col-md-2"></div>

</div>
</div>



</body>

</html>