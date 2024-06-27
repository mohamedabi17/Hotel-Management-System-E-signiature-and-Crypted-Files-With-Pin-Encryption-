<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="css/datepicker3.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
</head>
<body>
<?php
include_once "header.php";
include_once "sidebar.php";
if (isset($_GET['room_id'])){
    $get_room_id = $_GET['room_id'];
    $get_room_sql = "SELECT * FROM room NATURAL JOIN room_type WHERE room_id = '$get_room_id'";
    $get_room_result = mysqli_query($connection,$get_room_sql);
    $get_room = mysqli_fetch_assoc($get_room_result);

    $get_room_type_id = $get_room['room_type_id'];
    $get_room_type = $get_room['room_type'];
    $get_room_no = $get_room['room_no'];
    $get_room_price = $get_room['price'];
}

?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main"style="background:#11045a">
    

<div class="row">
        <div class="col-lg-16">
            <form role="form" id="booking" data-toggle="validator">
                <div class="response"></div>
                <div class="col-lg-12">
                    <?php
                    if (isset($_GET['room_id'])){?>

                        <div class="panel panel-default">
                            <div class="panel-heading" >Information De Chambre :
                                <a class="btn btn-secondary pull-right" href="index.php?room_mang">Retour</a>
                            </div>
                            <div class="panel-body">
                                <div class="form-group col-lg-6">
                                    <label>Type De Chambre</label>
                                    <select class="form-control" id="room_type" data-error="Choisissez Le Type De Chambre" required>
                                        <option selected disabled>Choisissez Le Type De Chambre</option>
                                        <option selected value="<?php echo $get_room_type_id; ?>"><?php echo $get_room_type; ?></option>
                                    </select>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group col-lg-6">
                                    <label>Numéro De Chambre</label>
                                    <select class="form-control" id="room_no" onchange="fetch_price(this.value)" required data-error="Numéro De Chambre">
                                        <option selected disabled>Choisissez Le Numéro De Chambre</option>
                                        <option selected value="<?php echo $get_room_id; ?>"><?php echo $get_room_no; ?></option>
                                    </select>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group col-lg-6">
                                    <label>Date De Réservation</label>
                                    <input type="text" class="form-control" placeholder="JJ/MM/AAAA" id="check_in_date" data-error="Choisissez La Date De Réservation" required>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group col-lg-6">
                                    <label>Date De Fin Réservation</label>
                                    <input type="text" class="form-control" placeholder="JJ/MM/AAAA" id="check_out_date" data-error="Choisissez La Date De Fin Réservation " required>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="col-lg-12">
                                    <h4 style="font-weight: bold">Nombre De Jours: <span id="staying_day"></span> </h4>
                                    <h4 style="font-weight: bold">Prix: <span id="price"><?php echo $get_room_price; ?></span> </h4>
                                    <h4 style="font-weight: bold">Montant Total : <span id="total_price"></span> </h4>
                                </div>
                            </div>
                        </div>
                    <?php } else{?>
                        <div class="panel panel-default">
                            <div class="panel-heading"><a style="color:black;">Informations De Chambre:</a>
                               
                            </div>
                            <div class="panel-body">
                                <div class="form-group col-lg-6">
                                    <label>Type De Chambre</label>
                                    <select class="form-control" id="room_type" onchange="fetch_room(this.value);" required data-error="Choisissez Le Type De Chambre">
                                        <option selected disabled>Choisissez Le Type De Chambre</option>
                                        <?php
                                        $query  = "SELECT * FROM room_type";
                                        $result = mysqli_query($connection,$query);
                                        if (mysqli_num_rows($result) > 0){
                                            while ($room_type = mysqli_fetch_assoc($result)){
                                                echo '<option value="'.$room_type['room_type_id'].'">'.$room_type['room_type'].'</option>';
                                            }}
                                        ?>
                                    </select>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group col-lg-6">
                                    <label>Numéro De Chambre</label>
                                    <select class="form-control" id="room_no" onchange="fetch_price(this.value)" required data-error="Choisissez Le Numéro De Chambre">

                                    </select>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group col-lg-6">
                                    <label>Date De Réservation</label>
                                    <input type="text" class="form-control" placeholder="JJ/MM/AAAA" id="check_in_date" data-error="Choisissez La Date De Réservation" required>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group col-lg-6">
                                    <label>Date De Fin Réservation</label>
                                    <input type="text" class="form-control" placeholder="JJ/MM/AAAA" id="check_out_date" data-error="Date De Fin Réservation" required>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="col-lg-12">
                                    <h4 style="font-weight: bold">Nombre Total De Jours: <span id="staying_day"></span> </h4>
                                    <h4 style="font-weight: bold">Prix : <span id="price"></span> </h4>
                                    <h4 style="font-weight: bold">Montant Total :<span id="total_price"></span> </h4>
                                </div>
                            </div>
                        </div>
                    <?php }
                    ?>
                    <div class="panel panel-default">
                        <div class="panel-heading"><a style="color: black;">Information Du Client</a></div>
                        <div class="panel-body">
                            <div class="form-group col-lg-6">
                                <label>Prénom </label>
                                <input class="form-control" placeholder="Prénom Du Client" id="first_name" data-error="Entrer Le Prénom Du Client" required>
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group col-lg-6">
                                <label>Nom</label>
                                <input class="form-control" placeholder="Nom Du Client" id="last_name" data-error="Entrer Le Nom Du Client" required>
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group col-lg-6">
                                <label>Numéro De Téléphone</label>
                                <input type="number" class="form-control" data-error=" Entrez Un Minimum De Dix Chiffres" data-minlength="10" placeholder=" Entrer Le numéro de téléphone" id="contact_no" required>
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group col-lg-6">
                                <label>E-mail</label>
                                <input type="email" class="form-control" placeholder="Entrez L'E-mail" id="email" data-error="Entrez Une Adresse E-mail Valide" required>
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group col-lg-6">
                                <label>Type D'identification</label>
                                <select class="form-control" id="id_card_id" data-error="Sélectionnez Le Type De Carte D'identité" required onchange="validId(this.value);">
                                    <option selected disabled>Choisissez Le Type De Carte D'identité</option>
                                    <?php
                                    $query  = "SELECT * FROM id_card_type";
                                    $result = mysqli_query($connection,$query);
                                    if (mysqli_num_rows($result) > 0){
                                        while ($id_card_type = mysqli_fetch_assoc($result)){
                                            echo '<option value="'.$id_card_type['id_card_type_id'].'">'.$id_card_type['id_card_type'].'</option>';
                                        }}
                                    ?>
                                </select>
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group col-lg-6">
                                <label>Numéro de  la carte </label>
                                <input type="text" class="form-control" placeholder=" Entrez Le Numéro De La Cart" id="id_card_no" data-error="Entrez Un Numéro De Carte Valide" required>
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group col-lg-12">
                                <label>Domicile</label>
                                <input type="text" class="form-control" placeholder="Entrez L'address" id="address"
                                 >
                            </div>
                            <a style="color: black;"><button type="submit" class="btn btn-lg pull-right" style="background:green"><b style="color: black;">Réserver</b></button></a>
                        </div>
                    </div>
                    
                </div>
            </form>
        </div>
    </div>

   
</div>    


<!-- Booking Confirmation-->
<div id="bookingConfirm" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title text-center"><b>Information De Réserrvation</b></h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert bg-success alert-dismissable" role="alert"><em class="fa fa-lg fa-check-circle">&nbsp;</em>Chambre Réservé Avec Succsess </div>
                        <table class="table table-striped table-bordered table-responsive">
                           
                            <tbody>
                            <tr>
                                <td><b>Numéro De Client</b></td>
                                <td id="getCustomerName"></td>
                            </tr>
                            <tr>
                                <td><b>Type Du Chambre</b></td>
                                <td id="getRoomType"></td>
                            </tr>
                            <tr>
                                <td><b>Numéro Du Chambre</b></td>
                                <td id="getRoomNo"></td>
                            </tr>
                            <tr>
                                <td><b>Date De Réservation</b></td>
                                <td id="getCheckIn"></td>
                            </tr>
                            <tr>
                                <td><b>Date De Fin</b></td>
                                <td id="getCheckOut"></td>
                            </tr>
                            <tr>
                                <td><b></b></td>montant Total
                                <td id="getTotalPrice"></td>
                            </tr>
                            <tr>
                                <td><b>Statut De Résevation</b></td>
                                <td id="getPaymentStaus"></td>
                            </tr>

                            </tbody>
                        </table>
                        <a  href="index.php?room_mang"><button type="submit" class="btn btn-lg btn-success pull-right"  style="border-radius:60%">OK</button></a>
                    </div>
                </div>
            </div>
           
        </div>

    </div>
</div>
    <script>
        // Add click event listener to the reserve button
        $('#reserveBtn').click(function() {
            console.log('Reservation successfully');
        });
    </script> 
</body>
</html>