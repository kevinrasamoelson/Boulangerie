<?php
include 'db.php';

if(isset($_POST['insert'])){
    $nom    = clean($_POST['nom']);
    $prix   = clean($_POST['prix']);
    $detail = clean($_POST['detail']);
    
    $query = "INSERT INTO `student` (nom, prix, detail) VALUES ('".escape($nom)."','".escape($prix)."','".escape($detail)."') ";
    
    $result = mysqli_query($conn, $query);
    
    if($result){
        header('location: ../index.php');
    }
}
?>
