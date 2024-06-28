<img width="943" alt="Screenshot 2024-06-28 031804" src="https://github.com/mohamedabi17/Hotel-Management-System-E-signiature-and-Crypted-Files-With-Pin-Encryption-/assets/89711322/2d33928b-dec1-4dc4-83ce-2a20d34a7b85"><img width="958" alt="Screenshot 2024-06-28 023535" src="https://github.com/mohamedabi17/Hotel-Management-System-E-signiature-and-Crypted-Files-With-Pin-Encryption-/assets/89711322/318b3b72-3b98-45c6-822b-205bbec28f3a">"# Hotel-Management-System-E-signiature-and-Crypted-Files-With-Pin-Encryption-" 


# Invoice Generation with Electronic Signatures and Encryption

This project demonstrates how to generate invoices in PHP, incorporate electronic signatures for enhanced security, and encrypt the resulting PDFs using a user-provided PIN code.

## Dependencies

* PHP (tested with version 7.4 or later)
* Composer for package management
* FPDI library (https://github.com/Setasign/FPDF/blob/master/fpdf.php) for PDF manipulation
* FPDI Protection library (https://github.com/madnh/FPDI-Protection) for PDF encryption

## Installation :Download The Source Code from this Link then Put it inside this directory of your PC C:\xampp\htdocs

D
1. Make Sur You Have Php (+7.4 version) Installed then Install Composer: https://getcomposer.org/
2. Open a terminal in your project directory and run:


```bash
composer require setasign/fpdi setasign/fpdi-protection
```
```bash
if You got an Erreur Go to the php.ini php.production.ini php.developement.ini remove the ; before extension=gd if it exists then repeat the previous commands
```

3. Go to : http://localhost/system/System

<img width="560" alt="Screenshot 2024-06-27 141620" src="https://github.com/mohamedabi17/Hotel-Management-System-E-signiature-and-Crypted-Files-With-Pin-Encryption-/assets/89711322/af673474-8bd5-44cf-b9ba-443f1478559b">
```

## Script Breakdown:

db.php (not provided): This file likely contains the database connection details and functions for interacting with your database.
generate_invoice.php: This script handles invoice generation, electronic signature creation, and PDF encryption.
Key Functions:

##generateInvoice($bookingDetails, $signaturePath, $pinCode):

Creates a new PDF using FPDI Protection.
Adds invoice header and booking details sections with formatting.
Generates an electronic signature image based on the provided text ($signatureText).
Calculates a unique string from booking details and PIN code.
Hashes the unique string using MD5 (consider using a more secure hashing algorithm like SHA-256).
Uses the hash to randomize font size, angle, and position for a more dynamic signature appearance.
Inserts the electronic signature image at the bottom.
Saves the PDF to a file with a unique name based on the customer ID.
Calls encryptPDF to encrypt the generated PDF.
Returns the path to the encrypted invoice file.
encryptPDF($filePath, $pinCode):

##Creates a new FPDI Protection instance.
Imports all pages from the provided PDF ($filePath).
Creates new pages and copies content from imported pages.
Sets PDF encryption permissions (print, copy) requiring the user-provided PIN code for access.
Saves the encrypted PDF to the same file path.
generateSignature($signatureText, $filePath, $pinCode, $bookingDetails) (revised):

##Creates a signature image with dynamic font size, angle, and position based on a hash of the combined booking details and PIN code.
Saves the signature image to the specified path ($filePath).
Usage:

##The script is likely triggered when a user submits a booking form.
The form data (room details, customer information, etc.) is used to populate the $bookingDetails array.
A user-provided PIN code is likely used in the $pinCode variable.
The script generates the invoice, electronic signature, encrypts the PDF, and sends a success response with the invoice file path.
Security Considerations:

##Database Security: The provided code snippet doesn't include database interaction. However, ensure proper database security practices are followed, such as using prepared statements to prevent SQL injection vulnerabilities.
PIN Code Strength: Encourage users to choose strong PIN codes that are not easily guessable.
Server-Side Processing: Process all booking and invoice generation logic on the server-side to prevent potential client-side manipulation.
Additional Notes:

##This example uses MD5 for hashing, which is considered less secure than newer algorithms like SHA-256. Consider updating the hashing function if desired.
The code might require adjustments depending on your specific database structure and form submission process.
Error handling and logging are essential for robust functionality.

## The Private Key Or THe E-Signiature Are Defferent Rather That they Look The Same , Just Look deeper in this Signiature Comparision
<img width="917" alt="Screenshot 2024-06-26 042407" src="https://github.com/mohamedabi17/Hotel-Management-System-E-signiature-and-Crypted-Files-With-Pin-Encryption-/assets/89711322/597bdc6a-388d-4ce5-9f40-4217469cd435">


##The function generateSignature creates an electronic signature by dynamically generating an image of the signature text with randomized font size, angle, and position based on a hash of booking details and a PIN code. Here's a breakdown of what this function does:

1-Image Creation: It creates a blank image with a specified width and height.
2-Color Allocation: It sets up white and black colors for the background and text.
3-Background Fill: It fills the image background with white.
4-Font Path: It specifies the path to a TTF font file to render the text.
5-Hashing and Randomization:
-It combines the booking details and the PIN code into a single string.
-It hashes this string using MD5 to ensure a unique and consistent output for the same input.
-It uses parts of the hashed string to randomize the font size, angle, and position of the text within the image.
6-Text Rendering: It renders the signature text onto the image using the TrueType font.
7-Image Saving: It saves the generated image to the specified file path.
8-Memory Cleanup: It frees up memory used by the image resource.


##Type of Electronic Signature
This electronic signature is a dynamic graphical representation of a signature. It doesn't involve cryptographic techniques for the signature itself but uses a hash-based approach to ensure the appearance of the signature varies based on the input data.

##Characteristics:
##Graphical Signature: It is a graphical image file (.png) that visually represents the signature text.
Dynamic and Unique: The visual appearance (font size, angle, position) is influenced by the hash of booking details and the PIN code, making it unique for different inputs.
Non-Cryptographic: While it uses hashing to influence the visual representation, it does not provide cryptographic assurance about the identity of the signer or the integrity of the signed data.
##Use Cases:
Visual Verification: Can be used for visual verification purposes where the uniqueness of the signature image adds a layer of security.
Document Decoration: Suitable for adding a signature look to documents where formal cryptographic signatures are not required.
Example Usage in a Booking System

he randomized appearance, it is not a replacement for more secure digital signatures that use public key infrastructure (PKI) for cryptographic signing and verification.

<img width="948" alt="Screenshot 2024-06-28 031718" src="https://github.com/mohamedabi17/Hotel-Management-System-E-signiature-and-Crypted-Files-With-Pin-Encryption-/assets/89711322/df9cebb1-8526-486f-8076-2f0b68acf1a8"><img width="956" alt="Screenshot 2024-06-28 031321" src="https://github.com/mohamedabi17/Hotel-Management-System-E-signiature-and-Crypted-Files-With-Pin-Encryption-/assets/89711322/3ac1655b-e35e-49ab-8bcc-09e23a009328">
<img width="944" alt="Screenshot 2024-06-28 031432" src="https://github.com/mohamedabi17/Hotel-Management-System-E-signiature-and-Crypted-Files-With-Pin-Encryption-/assets/89711322/2260cac4-b130-4240-b123-3b9de7a7846e">
<img width="952" alt="Screenshot 2024-06-28 031501" src="https://github.com/mohamedabi17/Hotel-Management-System-E-signiature-and-Crypted-Files-With-Pin-Encryption-/assets/89711322/5155eb5f-ab9d-4911-bada-0a3fa33a7527">
<img width="952" alt="Screenshot 2024-06-28 031544" src="https://github.com/mohamedabi17/Hotel-Management-System-E-signiature-and-Crypted-Files-With-Pin-Encryption-/assets/89711322/03039e6f-06e3-4a00-816a-be5d1c4ac0ac">
<img width="943" alt="Screenshot 2024-06-28 031624" src="https://github.com/mohamedabi17/Hotel-Management-System-E-signiature-and-Crypted-Files-With-Pin-Encryption-/assets/89711322/823b192f-e747-4c04-b74c-bc4dec84a321">
and some security through t<img width="955" alt="Screenshot 2024-06-28 032959" src="https://github.com/mohamedabi17/Hotel-Management-System-E-signiature-and-Crypted-Files-With-Pin-Encryption-/assets/89711322/afbec811-f209-4da7-a1c8-6cbaa70ae63c">




#Conclusion:

##This solution demonstrates a basic implementation of invoice generation with electronic signatures and user-provided PIN code encryption. Enhance security by following the additional recommendations and tailoring the script to your specific application requirements.


