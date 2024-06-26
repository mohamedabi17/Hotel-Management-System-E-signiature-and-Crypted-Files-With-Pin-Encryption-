<?php

include_once "header.php";
include_once "sidebar.php";

require 'vendor/autoload.php';
include 'db.php';

$invoicesDirectory = 'invoices/';
$invoiceFiles = [];

// Open the invoices directory
if (is_dir($invoicesDirectory)) {
    if ($handle = opendir($invoicesDirectory)) {
        while (false !== ($entry = readdir($handle))) {
            // Check if the file is a PDF
            if (pathinfo($entry, PATHINFO_EXTENSION) === 'pdf') {
                $invoiceFiles[] = $entry;
            }
        }
        closedir($handle);
    }
} else {
    echo 'Invoices directory does not exist.';
    exit;
}
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
    <title>verify</title>

  
</head>
<body>
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <h1 style="color:aliceblue" class="mt-5">Facture Consultation</h1>
    <div class="row">
        <div class="col-lg-12">
            <?php if (!empty($invoiceFiles)) { ?>
                <h3 style="color:aliceblue">Tout Les Facture Sont Crypté avec une E-Signiature Unique <br>La Seule Facon Pour Decrypté la signiature est de contaitre la clé public (code pin : 1234) </h3>
                <ul class="list-group">
                    <?php foreach ($invoiceFiles as $invoice) { ?>
                        <li class="list-group-item">
                            <a href="<?php echo $invoicesDirectory . $invoice; ?>" target="_blank"><?php echo htmlspecialchars($invoice); ?></a>
                        </li>
                    <?php } ?>
                </ul>
            <?php } else { ?>
                <div class="alert alert-warning">No invoices found.</div>
            <?php } ?>
        </div>
    </div>
</div>

<?php

