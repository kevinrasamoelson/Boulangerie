<!-- VOITURE
ID:INT
PROPRIETAIRE/INT
MARQUE:VAR
MATRICULE:BIGINT
PAPIER:VAR
PHOTO1,2,3 /BLOB
PLACE/INT -->
<?php
include('config.php');
session_start();

$_SESSION['successMessage'] = '';
$_SESSION['errorMessage'] = '';

// Create a new voiture
// if (isset($_POST['submit_voiture'])) {
//     // Vérifier si tous les champs obligatoires ont été remplis
//     if (empty($_POST['proprietaire']) || empty($_POST['marque']) || empty($_POST['matricule']) || empty($_POST['papier']) || empty($_FILES['photo1']['tmp_name']) || empty($_FILES['photo2']['tmp_name']) || empty($_FILES['photo3']['tmp_name']) || empty($_POST['place'])) {
//         $_SESSION['errorMessage'] = 'Veuillez remplir tous les champs obligatoires.';
//     } else {
//         $proprietaire = $_POST['proprietaire'];
//         $marque = $_POST['marque'];
//         $matricule = $_POST['matricule'];
//         $papier = $_POST['papier'];
//         $photo1 = file_get_contents($_FILES['photo1']['tmp_name']);
//         $photo2 = file_get_contents($_FILES['photo2']['tmp_name']);
//         $photo3 = file_get_contents($_FILES['photo3']['tmp_name']);
//         $place = $_POST['place'];
        
              

//                 $stmt = $conn->prepare("INSERT INTO VOITURE (PROPRIETAIRE, MARQUE , MATRICULE, PAPIER, PHOTO1, PHOTO2, PHOTO3, PLACE) VALUES (:proprietaire, :marque, :matricule, :papier, :photo1, :photo2, :photo3, :place)");
//                 $stmt->bindParam(':proprietaire', $proprietaire);
//                 $stmt->bindParam(':marque', $marque);
//                 $stmt->bindParam(':matricule', $matricule);
//                 $stmt->bindParam(':photo1', $photo1, PDO::PARAM_LOB);
//                 $stmt->bindParam(':photo2', $photo2, PDO::PARAM_LOB);
//                 $stmt->bindParam(':photo3', $photo3, PDO::PARAM_LOB);
//                 $stmt->bindParam(':place', $place);
//                 $stmt->execute();
//                 $_SESSION['successMessage'] = 'Utilisateur créé avec succès !';
//             }
// }
// header("Location:index.php");
// ...

// Create a new voiture
if (isset($_POST['submit_voiture'])) {
    // Vérifier si tous les champs obligatoires ont été remplis
    if (empty($_POST['proprietaire']) || empty($_POST['marque']) || empty($_POST['matricule']) || empty($_FILES['photo1']['tmp_name'])) {
        $_SESSION['errorMessage'] = 'Veuillez remplir tous les champs obligatoires.';
    } else {
        $proprietaire = $_POST['proprietaire'];
        $marque = $_POST['marque'];
        $matricule = $_POST['matricule'];
        $photo1 = file_get_contents($_FILES['photo1']['tmp_name']);

        try {
            $stmt = $conn->prepare("INSERT INTO VOITURE (PROPRIETAIRE, MARQUE, MATRICULE, PHOTO1) VALUES (:proprietaire, :marque, :matricule, :photo1)");
            $stmt->bindParam(':proprietaire', $proprietaire);
            $stmt->bindParam(':marque', $marque);
            $stmt->bindParam(':matricule', $matricule);
            $stmt->bindParam(':photo1', $photo1, PDO::PARAM_LOB);
            $stmt->execute();
            $_SESSION['successMessage'] = 'Voiture créée avec succès !';
        } catch (PDOException $e) {
            $_SESSION['errorMessage'] = 'Erreur lors de l\'insertion dans la base de données: ' . $e->getMessage();
        }
    }
}

header("Location: index.php");
exit;

?>
