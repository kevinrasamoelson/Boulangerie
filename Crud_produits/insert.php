<?php
include 'includes/db.php';

$error_message = "";

if(isset($_POST['insert']))
{
    $nom         = clean($_POST['nom']);
    $prix        = clean($_POST['prix']);
    $detail      = clean($_POST['detail']);
    $image_name  = $_FILES['image']['name'];
    $image       = $_FILES['image']['tmp_name'];

    $location    = "images/".$image_name;

    move_uploaded_file($image, $location);

    if (empty($nom) || empty($prix) || empty($detail)) {
        $error_message = "Veuillez remplir tous les champs obligatoires.";
    } else {
        $query = "INSERT INTO student (nom, prix, detail, image) VALUES ('".escape($nom)."', '".escape($prix)."','".escape($detail)."' , '$image_name')";
        $result = mysqli_query($conn, $query);

        if ($result) {
            header("Location: index.php");
        } else {
            $error_message = "Erreur lors de l'insertion : " . mysqli_error($conn);
        }
    }
}
?>

<div class="container">
    <div class="jumbotron text-center">
        <h2>Crud Application Using PHP</h2>
    </div>
    <br>
    <?php if (!empty($error_message)) { ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $error_message; ?>
        </div>
    <?php } ?>
    <div class="row">
        <div class="col-md-12">
            <form action="" method="post" enctype="multipart/form-data">
            <form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="nom">Name:</label>
        <input type="text" name="nom" class="form-control" placeholder="Enter Name">
    </div>
    <div class="form-group">
        <label for="prix">Batch:</label>
        <input type="text" name="prix" class="form-control" placeholder="Enter batch">
    </div>
    <div class="form-group">
        <label for="detail">Email:</label>
        <input type="text" name="detail" class="form-control" placeholder="Enter email">
    </div>
    <div class="form-group">
        <label for="name">Image:</label>
        <input type="file" class="btn btn-primary" name="image" class="form-control" placeholder="Enter email">
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-success" value="Insert data" name="insert">
    </div>
</form>
            </form>
        </div>
    </div>
</div>
