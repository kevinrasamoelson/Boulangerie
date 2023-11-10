<?php
session_start();
include('config.php');

$_SESSION['successMessage'] = '';
$_SESSION['errorMessage'] = '';

// Update voiture
if (isset($_POST['update_voiture'])) {
    // Vérifier si tous les champs obligatoires ont été remplis
    if (empty($_POST['proprietaire']) || empty($_POST['marque']) || empty($_POST['matricule']) || empty($_POST['place'])) {
        $_SESSION['errorMessage'] = 'Veuillez remplir tous les champs obligatoires.';
        header('Location: update_page.php');
        die();
    } else {
        $_SESSION['id'] = $_POST['id'];
        $id = $_SESSION['id'];
        $proprietaire = $_POST['proprietaire'];
        $marque = $_POST['marque'];
        $matricule = $_POST['matricule'];

        // Vérifiez si les fichiers ont été correctement téléchargés
        if (isset($_FILES['photo1']['tmp_name'])) {
            $photo1 = file_get_contents($_FILES['photo1']['tmp_name']);
        } else {
            $_SESSION['errorMessage'] = 'Erreur lors du téléchargement des fichiers.';
            header('Location: update_page.php');
            die();
        }

        $stmt = $conn->prepare("UPDATE VOITURE SET PROPRIETAIRE = :proprietaire, MARQUE = :marque, MATRICULE = :matricule,  PHOTO1 = :photo1 WHERE ID = :id");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':proprietaire', $proprietaire);
        $stmt->bindParam(':marque', $marque);
        $stmt->bindParam(':matricule', $matricule);
        $stmt->bindParam(':photo1', $photo1);
        $stmt->execute();
        $_SESSION['successMessage'] = 'Voiture mise à jour avec succès !';
    }         
}
header("Location: index.php");
die();
?>