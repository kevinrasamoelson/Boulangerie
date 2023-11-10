<?php

include('config.php');

// Delete user
if (isset($_POST['delete_voiture'])) {
    $id = $_POST['id'];

    $stmt = $conn->prepare("DELETE FROM VOITURE WHERE ID = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();


    // Redirect to the read.php page after deleting the user
    header("Location: read.php");
    exit();
}




?>


