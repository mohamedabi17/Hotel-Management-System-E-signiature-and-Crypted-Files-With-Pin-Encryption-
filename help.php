<?php
include_once "header.php";
include_once "sidebar.php";
?>
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
    <title>help</title>
</head>
<body>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
   
    

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading"><a style="color:black;">Poser Plainte..!</a></div>
                <div class="panel-body">
                    <?php
                    if (isset($_GET['error'])) {
                        echo "<div class='alert alert-danger'>
                                <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Erreur Sur plainte !
                            </div>";
                    }
                    if (isset($_GET['success'])) {
                        echo "<div class='alert alert-success'>
                                <span class='glyphicon glyphicon-info-sign'></span> &nbsp; plainte Ajouter Avec Success  !
                            </div>";
                    }
                    ?>
                    <form role="form"  data-toggle="validator" method="post" action="ajax.php">
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label>Nom De La Plainte</label>
                                <input type="text" class="form-control" placeholder="Nom De La Plainte" name="complainant_name" required>
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group col-lg-6">
                                <label>Type De La Plainte</label>
                                <input type="text" class="form-control" placeholder="Type De La Plainte" name="complaint_type" required>
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group col-lg-12">
                                <label>Décrivez La Plainte S'il Vous Plait </label>
                                <textarea class="form-control" name="complaint" placeholder="plainte ..." required></textarea>
                            </div>

                        </div>

                        <button type="submit" class="btn btn-lg btn-success" name="createComplaint" style="border-radius:45%">Ajouter</button>
                        <button type="reset" class="btn btn-lg btn-danger" style="border-radius:45%">Annuler</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading"><a style="color: black;">Gestion Des Plaintes :</a></div>
                <div class="panel-body">
                    <?php
                    if (isset($_GET['resolveError'])) {
                        echo "<div class='alert alert-danger'>
                                <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Erreur De Résoudre !
                            </div>";
                    }
                    if (isset($_GET['resolveSuccess'])) {
                        echo "<div class='alert alert-success'>
                                <span class='glyphicon glyphicon-info-sign'></span> &nbsp;  Résoudre la plainte Avec Success  !
                            </div>";
                    }
                    ?>
                    <table class="table table-striped table-bordered table-responsive" cellspacing="0" width="100%" id="rooms">
                        <thead>
                        <tr>
                            <th>//</th>
                            <th>Nom Du Plaignant</th>
                            <th>Type Du Plainte</th>
                            <th>Plainte</th>
                            <th>Date De Création</th>
                            <th>Résoudre</th>
                            <th>Budget</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $complaint_query = "SELECT * FROM complaint";
                        $complaint_result = mysqli_query($connection, $complaint_query);
                        if (mysqli_num_rows($complaint_result) > 0) {
                            $num = 0;
                            while ($complaint = mysqli_fetch_assoc($complaint_result)) {
                                $num++
                                ?>
                                <tr>
                                    <td><?php echo $num ?></td>
                                    <td><?php echo $complaint['complainant_name'] ?></td>
                                    <td><?php echo $complaint['complaint_type'] ?></td>
                                    <td><?php echo $complaint['complaint'] ?></td>
                                    <td><?php echo date('M j, Y',strtotime($complaint['created_at'])) ?></td>
                                    <td>
                                        <?php if(!$complaint['resolve_status']){
                                            echo '<button class="btn btn-info" data-toggle="modal" style="border-radius:45%" data-target="#complaintModal" data-id="' . $complaint['id'] . '" id="complaint">Résoudre</a>';
                                        } else{
                                            echo date('M j, Y',strtotime($complaint['resolve_date']));
                                        }
                                        ?>
                                    </td>
                                    <th><?php echo $complaint['budget'] ?></th>


                                </tr>
                            <?php }
                        } else {
                            echo "Aucun Chambre";
                        }
                        ?>

                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

    <!-- Add Room Modal -->
    <div id="complaintModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Résoudre Plainte</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form data-toggle="validator" role="form" method="post" action="ajax.php">
                                <div class="form-group">
                                    <label>Budget</label>
                                    <input class="form-control" placeholder="Budget" name="budget" data-error="Entrer un Budget" required>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <input type="hidden" id="complaint_id" name="complaint_id" value="">
                                <button class="btn btn-success pull-right" name="resolve_complaint">Résoudre Plainte </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

   

</div>    