<?php
include("config.php");
session_start();
if(isset($_SESSION['successMessage'])){
    echo $_SESSION['successMessage'];
    unset($_SESSION['successMessage']);
}
if(isset($_SESSION['errorMessage'])){
    echo $_SESSION['errorMessage'];
    unset($_SESSION['errorMessage']);
}
if(isset($_POST['id'])){
    $_SESSION['id']=$_POST['id'];
}

if(isset($_SESSION['id'])){
    $id= $_SESSION['id'];
    $stmt = $conn->prepare("SELECT * FROM VOITURE where ID = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $voitures = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>CRUD Example - Covoiturage</title>
</head>
<body>
    <h1>Update voiture</h1>
    <?php foreach ($voitures as $voiture): ?>
    <form method="post" action="update.php" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $voiture['ID']; ?>">
        Propriétaire: <input type="number" name="proprietaire" value="<?php echo $voiture['PROPRIETAIRE']; ?>" required><br>
        Marque: <input type="text" name="marque" value="<?php echo $voiture['MARQUE']; ?>" required><br>
        Matricule: <input type="number" name="matricule" value="<?php echo $voiture['MATRICULE']; ?>" required><br>
        Photo1: <input type="file" name="photo1" required><br><br>
        <input type="submit" name="update_voiture" value="Update">
    </form>
    <?php endforeach; ?>
    
</body>
</html>