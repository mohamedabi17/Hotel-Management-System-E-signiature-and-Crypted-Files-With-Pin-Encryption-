<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>side bar</title>
     <link href="css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
    
<div class="sidebar">
    <header >
<div  style="font-family:Georgia, 'Times New Roman', Times, serif">
<?php if (isset($user['name'])): ?>
    <div class="fa fa-user-circle" style="color:white;">
        <a style="color: lime;">Utilisateur : </a>
        <?php echo htmlspecialchars($user['name']); ?>
    </div>
<?php else: ?>
    <div class="fa fa-user-circle" style="color:white;">
        <a style="color: lime;">Utilisateur : </a> Guest
    </div>
<?php endif; ?>

</header>
    <ul>
    <?php 
        if (isset($_GET['dashboard'])){ ?>
            <li>
                <a href="index.php?dashboard"><i class="fa fa-qrcode" style="color:red;">&nbsp;</i>
                 Tab De Bord
                </a>
            </li>
        <?php } else{?>
            <li>
                <a href="index.php?dashboard"><i class="fa fa-qrcode" style="color:white;">&nbsp;</i>
                Tab De Bord
                </a>
            </li>
        <?php }
        if (isset($_GET['reservation'])){ ?>
            <li>
                <a href="index.php?reservation"><i class="fa fa-calendar" style="color:red;">&nbsp;</i>
                  Réservation
                </a>
            </li>
        <?php } else{?>
            <li>
                <a href="index.php?reservation"><i class="fa fa-calendar" style="color:white;">&nbsp;</i>
                  Réservation
                </a>
            </li>
        <?php }
        if (isset($_GET['room_mang'])){ ?>
           <li>
                <a href="index.php?room_mang"><i class="fa fa-bed" style="color:red;">&nbsp;</i>
               Chambres
                </a>
            </li>
        <?php } else{?>
            <li>
                <a href="index.php?room_mang"><i class="fa fa-bed" style="color:white;">&nbsp;</i>
              Chambres
                </a>
            </li>
        <?php }
       if  (isset($_GET['staff_mang'])){ ?>
           <li>
                <a href="index.php?staff_mang"><i class="fa fa-users" style="color:red;">&nbsp;</i>
              Employés
                </a>
            </li>
        <?php } else{?>
            <li>
                <a href="index.php?staff_mang"><i class="fa fa-users" style="color:white;">&nbsp;</i>
                Employés
                </a>
            </li>
        <?php }

if  (isset($_GET['help'])){ ?>
     <li>
                <a href="index.php?help"><i class="fa fa-phone" style="color:red;">&nbsp;</i>
               Plainte
                </a>
            </li>
<?php } else{?>
    <li>
                <a href="index.php?help"><i class="fa fa-phone" style="color:white;">&nbsp;</i>
              Plainte
                </a>
            </li>
<?php }
        if (isset($_GET['verify'])) { ?>
            <li>
                <a href="verify.php"><i class="fa fa-check" style="color:red;">&nbsp;</i>
                    Verification
                </a>
            </li>
        <?php } else { ?>
            <li>
                <a href="verify.php"><i class="fa fa-check" style="color:white;">&nbsp;</i>
                    Verification
                </a>
            </li>
        <?php } ?>

        
    </ul>
</div>

 <script src="js/bootstrap.min.js"></script>

</body>
