<?php
require 'vendor/autoload.php';

use setasign\Fpdi\Fpdi;
use setasign\FpdiProtection\FpdiProtection;


function generateInvoice($bookingDetails, $signaturePath, $pinCode) {
    // Create a new PDF document with protection
    $pdf = new FpdiProtection();
    $pdf->AddPage();

    // Set colors and font
    $pdf->SetTextColor(17, 4, 90); // RGB for #11045A
    $pdf->SetFillColor(230, 230, 250); // Light Lavender background for header

    // Add header
    $pdf->SetFont('Arial', 'B', 20);
    $pdf->Cell(0, 15, 'Reservation Invoice', 0, 1, 'C', true);

    // Add booking details section header
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Ln(10);
    $pdf->Cell(0, 10, 'Booking Details:', 0, 1, 'L');

    // Add booking details
    $pdf->SetFont('Arial', '', 12);
    $pdf->SetFillColor(245, 245, 245); // Light grey background for booking details

    foreach ($bookingDetails as $key => $value) {
        $pdf->Ln(8);
        $pdf->Cell(60, 10, "$key:", 0, 0, 'L', true);
        $pdf->Cell(0, 10, $value, 0, 1, 'L', true);
    }

    // Add electronic signature section header
    $pdf->Ln(20);
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(0, 10, 'Electronic Signature:', 0, 1, 'L');

    // Add electronic signature on the right
    $signatureX = $pdf->GetPageWidth() - 60; // Adjust the X position for the right side
    $pdf->SetY($pdf->GetY() + 10); // Adjust the Y position to below the text
    $pdf->Image($signaturePath, $signatureX, $pdf->GetY(), 50);

    // Save the PDF to a file
    $filePath = 'invoices/invoice_' . $bookingDetails['Numero De Client'] . '.pdf';
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
// Function to generate the signature
// function generateSignature($text, $filePath) {
//     $width = 300;
//     $height = 100;
//     $image = imagecreatetruecolor($width, $height);

//     // Set colors
//     $white = imagecolorallocate($image, 255, 255, 255);
//     $black = imagecolorallocate($image, 0, 0, 0);

//     // Fill the background with white
//     imagefilledrectangle($image, 0, 0, $width, $height, $white);

//     // Set the path to the font you want to use
//     $fontPath = 'fonts/fontawesome-webfont.ttf'; // You need to provide a path to a valid TTF font

//     // Randomize font size, angle, and position
//     $fontSize = rand(18, 22); // Random font size between 18 and 22
//     $angle = rand(-10, 10); // Random angle between -10 and 10 degrees
//     $x = rand(10, 50); // Random x position between 10 and 50
//     $y = rand(40, 60); // Random y position between 40 and 60

//     // Add the text
//     imagettftext($image, $fontSize, $angle, $x, $y, $black, $fontPath, $text);

//     // Save the image to the specified file path
//     imagepng($image, $filePath);

//     // Free up memory
//     imagedestroy($image);
// }
// Function to generate the signature
function generateSignature($signatureText, $filePath, $pinCode, $bookingDetails) {
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

    // Combine booking details and pinCode to create a unique string
    $uniqueString = implode(' ', $bookingDetails) . ' ' . $pinCode;
    $hashedString = md5($uniqueString); // Create a hash of the combined string

    // Randomize font size, angle, and position based on the hash
    $fontSize = 18 + (hexdec(substr($hashedString, 0, 2)) % 5); // Random font size between 18 and 22
    $angle = (hexdec(substr($hashedString, 2, 2)) % 21) - 10; // Random angle between -10 and 10 degrees
    $x = 10 + (hexdec(substr($hashedString, 4, 2)) % 41); // Random x position between 10 and 50
    $y = 40 + (hexdec(substr($hashedString, 6, 2)) % 21); // Random y position between 40 and 60

    // Add the text
    imagettftext($image, $fontSize, $angle, $x, $y, $black, $fontPath, $signatureText);

    // Save the image to the specified file path
    imagepng($image, $filePath);

    // Free up memory
    imagedestroy($image);
}


?>
