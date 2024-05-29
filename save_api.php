<?php
include 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uname = $_POST['uname'];
    $uphone = $_POST['uphone'];
    $uemail = $_POST['uemail'];
    $umsg = $_POST['umsg'];

    // Prepare the SQL statement with placeholders
    $stmt = $conn->prepare("INSERT INTO rex_ecom_requests (uname, uphone, uemail, umsg) VALUES (?, ?, ?, ?)");
    
    // Bind the actual values to the placeholders
    $stmt->bind_param("ssss", $uname, $uphone, $uemail, $umsg);

    // Execute the statement
    if ($stmt->execute()) {
        // Redirect to dashboard.php after successful insertion
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Close the connection
$conn->close();

?>
