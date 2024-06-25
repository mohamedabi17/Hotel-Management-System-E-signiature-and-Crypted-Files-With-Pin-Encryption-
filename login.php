<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>page login</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/login.css"/>
</head>
<body style="background-image: url(img/ww.jpg);background-repeat:no-repeat;background-size:100% 100%">
    



<div class="container" >
    <div class="card card-container" style="background:white" >
        <img id="profile-img" class="profile-img-card" src="img/images.png" />
        
        <br>
        <div class="result" >
            <?php
            if (isset($_GET['empty'])){
                echo '<div class="alert alert-danger">Entrer Le Nom Utilisateur Ou Mot De Pass</div>';
            }elseif (isset($_GET['loginE'])){
                echo '<div class="alert alert-danger">Nom Utilisateur Ou Mot De Pass Corespond Pas</div>';
            } ?>
        </div>
        <form class="form-signin" data-toggle="validator" action="ajax.php" method="post">
            <div class="row">
                <div class="form-group col-lg-12" style="font-size: large;">
                    <label style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">Nom D'utilisateur :</label>
                    <input type="text" name="email" class="form-control" placeholder="Nom D'utilisateur " required
                           data-error="Entrer Le Nom D'utilisateur ">
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group col-lg-12" style="font-size: large;">
                    <label style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">Mot De Passe :</label>
                    <input type="password" name="password" class="form-control" placeholder="Mot De Passe" required
                           data-error="Entrer Le Mot De Passe">
                    <div class="help-block with-errors"></div>
                </div>
            </div>

            <button class="btn btn-lg  btn-block btn-signin" type="submit" name="login" ><b>Se Connecter<b></button>

        </form><!-- /form -->
    </div><!-- /card-container -->
</div><!-- /container -->

<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/validator.min.js"></script>
</body>
</html>