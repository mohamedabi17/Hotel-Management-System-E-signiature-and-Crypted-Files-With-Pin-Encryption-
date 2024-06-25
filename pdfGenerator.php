<?php
// Include the database connection
include 'db.php';

// Include the PDF generation script
include 'generate_invoice.php';

if (isset($_POST['booking'])) {
    $response = [];
    $room_id = $_POST['room_id'];
    $check_in = $_POST['check_in'];
    $check_out = $_POST['check_out'];
    $total_price = $_POST['total_price'];
    $name = $_POST['name'];
    $contact_no = $_POST['contact_no'];
    $email = $_POST['email'];
    $id_card_id = $_POST['id_card_id'];
    $id_card_no = $_POST['id_card_no'];
    $address = $_POST['address'];

    // Start a transaction
    mysqli_begin_transaction($connection);

    try {
        // Save customer details to the database
        $customer_sql = "INSERT INTO customer (customer_name, contact_no, email, id_card_type_id, id_card_no, address) VALUES ('$name', '$contact_no', '$email', '$id_card_id', '$id_card_no', '$address')";
        if (mysqli_query($connection, $customer_sql)) {
            $customer_id = mysqli_insert_id($connection);

            // Save booking details to the database
            $booking_sql = "INSERT INTO booking (customer_id, room_id, check_in, check_out, total_price, remaining_price) VALUES ('$customer_id', '$room_id', '$check_in', '$check_out', '$total_price', '$total_price')";
            if (mysqli_query($connection, $booking_sql)) {
                $booking_id = mysqli_insert_id($connection);

                // Update room status
                $room_stats_sql = "UPDATE room SET status = '1' WHERE room_id = '$room_id'";
                if (mysqli_query($connection, $room_stats_sql)) {
                    // Prepare booking details for the invoice
                    $bookingDetails = [
                        'Numéro De Client' => $booking_id,
                        'Type Du Chambre' => $room_id,
                        'Numéro Du Chambre' => $room_id,
                        'Date De Réservation' => $check_in,
                        'Date De Fin' => $check_out,
                        'Montant Total' => $total_price,
                        'Statut De Résevation' => 'Confirmed'
                    ];

                    // Generate the electronic signature
                    $signatureText = "Client Signature";
                    $signaturePath = 'signatures/signature_' . $booking_id . '.png';
                    generateSignature($signatureText, $signaturePath);

                    // Generate the invoice with the electronic signature
                    $pinCode = '1234';
                    $invoicePath = generateInvoice($bookingDetails, $signaturePath, $pinCode);

                    // Commit transaction
                    mysqli_commit($connection);

                    $response['done'] = true;
                    $response['data'] = 'Réservation Accompli !';
                    $response['invoice'] = $invoicePath;

                    // Redirect to a confirmation page
                    header('Location: confirmation.php?invoice=' . urlencode($invoicePath));
                    exit;
                } else {
                    // Rollback transaction if room status update fails
                    mysqli_rollback($connection);
                    $response['done'] = false;
                    $response['data'] = "Erreur Dans La Base des Données ";
                }
            } else {
                // Rollback transaction if booking saving fails
                mysqli_rollback($connection);
                $response['done'] = false;
                $response['data'] = "Erreur De Réservation Dans La Base des Données";
            }
        } else {
            // Rollback transaction if customer saving fails
            mysqli_rollback($connection);
            $response['done'] = false;
            $response['data'] = "Erreur D'ajouter Un Client Dans La Base des Données";
        }
    } catch (Exception $e) {
        // Rollback transaction in case of error
        mysqli_rollback($connection);
        $response['done'] = false;
        $response['data'] = "Erreur De Réservation Dans La Base des Données";
    }

    // Return response as JSON
    echo json_encode($response);
}
?>
