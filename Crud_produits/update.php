<?php
include 'includes/db.php';

if(isset($_GET['update'])){
    $id = $_GET['update'];

    $query = "SELECT * FROM student WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
            $nom    = $row['nom'];
            $detail = $row['detail'];
            $prix   = $row['prix'];
            $image  = $row['image'];
        }
    }
}

if(isset($_POST['update'])){
    $nom         = clean($_POST['nom']);
    $detail      = clean($_POST['detail']);
    $prix        = clean($_POST['prix']);
    $image_name  = $_FILES['image']['name'];
    $image       = $_FILES['image']['tmp_name'];

    $location    = "images/".$image_name;
    move_uploaded_file($image, $location);

    $query  = "UPDATE student SET ";
    $query .= "nom = '".escape($nom)."', ";
    $query .= "detail = '".escape($detail)."', ";
    $query .= "prix = '".escape($prix)."', ";
    $query .= "image = '{$image_name}' ";
    $query .= "WHERE id = {$id} ";

    $result = mysqli_query($conn, $query);

    if($result){
        header('location:index.php');
    } else {
        die('error' . mysqli_error($conn));
    }
}
?>
