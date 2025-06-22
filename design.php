<?php
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the T-shirt color
    $color = $_POST['color'];

    // Get the quantity, size, and delivery date
    $quantity = $_POST['quantity'];
    $size = $_POST['size'];
    $deliveryDate = $_POST['delivery-date'];

    // Handle the file upload
    if (isset($_FILES['upload']) && $_FILES['upload']['error'] == 0) {
        $uploadDir = 'uploads/';
        $fileName = basename($_FILES['upload']['name']);
        $targetFilePath = $uploadDir . $fileName;

        // Create the uploads directory if it doesn't exist
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        // Move the uploaded file to the uploads directory
        if (move_uploaded_file($_FILES['upload']['tmp_name'], $targetFilePath)) {
            echo "Your design has been uploaded successfully!<br>";
            echo "File Location: $targetFilePath<br>";
        } else {
            echo "Failed to upload your design. Please try again.<br>";
        }
    } else {
        echo "No file uploaded or an error occurred.<br>";
    }

    // Display order details
    echo "T-Shirt Color: $color<br>";
    echo "Quantity: $quantity<br>";
    echo "Size: $size<br>";
    echo "Delivery Date: $deliveryDate<br>";
}
?>
