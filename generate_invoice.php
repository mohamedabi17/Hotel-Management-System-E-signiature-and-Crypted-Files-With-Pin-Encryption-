<?php
require 'vendor/autoload.php';

use setasign\Fpdi\Fpdi;
use setasign\FpdiProtection\FpdiProtection;

function generateInvoice($bookingDetails, $signaturePath, $pinCode) {
    // Create a new PDF document with protection
    $pdf = new FpdiProtection();
    $pdf->AddPage();

    // Set font and add content
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(40, 10, 'Reservation Invoice');

    // Add booking details
    $pdf->SetFont('Arial', '', 12);
    foreach ($bookingDetails as $key => $value) {
        $pdf->Ln();
        $pdf->Cell(40, 10, "$key: $value");
    }

    // Add electronic signature
    $pdf->Image($signaturePath, 150, 250, 50);

    // Save the PDF to a file
    $filePath = 'invoices/invoice_' . $bookingDetails['Numéro De Client'] . '.pdf';
    $pdf->Output($filePath, 'F');

    // Encrypt the PDF
    encryptPDF($filePath, $pinCode);

    return $filePath;
}

function encryptPDF($filePath, $pinCode) {
    $pdf = new FpdiProtection();
    $pageCount = $pdf->setSourceFile($filePath);

    for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {
        $templateId = $pdf->importPage($pageNo);
        $pdf->AddPage();
        $pdf->useTemplate($templateId);
    }

    // Set encryption
    $pdf->SetProtection(['print', 'copy'], $pinCode);

    // Save encrypted PDF
    $pdf->Output($filePath, 'F');
}

// Function to generate the signature
function generateSignature($text, $filePath) {
    $width = 300;
    $height = 100;
    $image = imagecreatetruecolor($width, $height);

    // Set colors
    $white = imagecolorallocate($image, 255, 255, 255);
    $black = imagecolorallocate($image, 0, 0, 0);

    // Fill the background with white
    imagefilledrectangle($image, 0, 0, $width, $height, $white);

    // Set the path to the font you want to use
    $fontPath = 'fonts/fontawesome-webfont.ttf'; // You need to provide a path to a valid TTF font

    // Add the text
    imagettftext($image, 20, 0, 10, 50, $black, $fontPath, $text);

    // Save the image to the specified file path
    imagepng($image, $filePath);

    // Free up memory
    imagedestroy($image);
}
?>
