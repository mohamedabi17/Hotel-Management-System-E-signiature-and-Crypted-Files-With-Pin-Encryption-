<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Confirmation</title>
</head>
<body>
    <h1>Booking Confirmed</h1>
    <?php if (isset($_GET['invoice'])): ?>
        <p>Your booking is confirmed. <a href="<?php echo urldecode($_GET['invoice']); ?>" download>Download Invoice</a></p>
    <?php endif; ?>
</body>
</html>
