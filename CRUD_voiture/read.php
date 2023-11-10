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
    $voitures = $conn->query("SELECT * FROM VOITURE")->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>List of voitures</h2>
    <ul>
        <?php foreach ($voitures as $voiture): ?>
            <li>
                <?php echo $voiture['PROPRIETAIRE'] . ' ' . $voiture['MARQUE']; ?> (<?php echo $voiture['MATRICULE']; ?>)
                <!-- Display voiture's profile picture -->
                <img src="data:image/jpeg;base64,<?php echo base64_encode($voiture['PHOTO1']); ?>" width="100px" height="100px">
                <form method="post" action="update_page.php" style="display: inline;">
                    <!-- Include hidden input fields for the update and delete operations -->
                    <input type="hidden" name="id" value="<?php echo $voiture['ID']; ?>">
                    <input type="submit" name="update_voiture" value="Update">
                  
                </form>
                <form method="post" action="delete.php" style="display: inline;">
                    <!-- Include hidden input fields for the update and delete operations -->
                    <input type="hidden" name="id" value="<?php echo $voiture['ID']; ?>">
                    <input type="submit" name="delete_voiture" value="Delete">
                </form>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>