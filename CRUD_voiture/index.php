
<!-- VOITURE
ID:INT
PROPRIETAIRE/INT
MARQUE:VAR
MATRICULE:BIGINT
PAPIER:VAR
PHOTO1,2,3 /BLOB
PLACE/INT -->
<?php
session_start();
include('config.php');
if(isset($_SESSION['successMessage'])){
    echo $_SESSION['successMessage'];
    unset($_SESSION['successMessage']);
}
if(isset($_SESSION['errorMessage'])){
    echo $_SESSION['errorMessage'];
    unset($_SESSION['errorMessage']);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>CRUD Example - Covoiturage</title>
</head>
<body>
    <h1>CRUD Example - Covoiturage</h1>

    <!-- Create New voiture -->
    <h2>Create New voiture</h2>
    <form method="post" action="create.php" enctype="multipart/form-data">
        Propriétaire: <input type="text" name="proprietaire" required><br><br>
        Marque: <input type="text" name="marque" required><br><br>
        Matricule: <input type="number" name="matricule" required><br><br>
        Photo1: <input type="file" name="photo1" required><br><br>
        <input type="submit" name="submit_voiture" value="Create"><br><br>
    </form>
    <div><a href="read.php">voir la liste des voitures</a></div>
    
   
</body>
</html>
