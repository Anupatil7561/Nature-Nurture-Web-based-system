<?php
// Database connection details
include 'db.php';


// Capture form data
$card_number = $_POST['card_number'];
$expiration_date = $_POST['expiration_date'];
$cvv = $_POST['cvv'];

// Sanitize and hash the sensitive data (for educational purposes)
$card_number = htmlspecialchars($card_number);
$expiration_date = htmlspecialchars($expiration_date);
$cvv = htmlspecialchars($cvv);

// Prepare SQL statement
$stmt = $conn->prepare("INSERT INTO payment_info (card_number, expiration_date, cvv) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $card_number, $expiration_date, $cvv);

// Execute statement
if ($stmt->execute()) {
    echo "payment successful! <a href='index.html'>Go To Index</a>";
} else {
    echo "Error: " . $stmt->error;
}

// Close connections
$stmt->close();
$conn->close();
?>
