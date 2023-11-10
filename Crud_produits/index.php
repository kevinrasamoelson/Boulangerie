<?php

include 'includes/db.php';

?>

<div class="container">
    <div class="jumbotron text-center">
        <h2>Crud Application Using PHP</h2>
    </div>
    <br>
    
    <a href="insert.php" role="button" class="btn btn-primary pull-right">INSERT DATA</a>
    <br>
    <br>
    <table class="table table-hover table-striped">
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Prix</th>
            <th>details</th>
            <th>Image</th>
            <th>Action</th>
        </tr>
<?php  		            
		
$query = "SELECT * FROM student ORDER BY id DESC ";

$result = mysqli_query($conn,$query);

if(mysqli_num_rows($result) > 0){
    
    while($row = mysqli_fetch_array($result)){
        
        $id    = $row['id'];
        $nom  = $row['nom'];
        $detail = $row['detail'];
        $prix    = $row['prix'];
        $image = $row['image'];

?>
        
        <tr>
            <td><?=$id; ?></td>
            <td><?=$nom; ?></td>
            <td><?=$detail; ?></td>
            <td><?=$prix; ?></td>
            <td>
                <img src="../images/360_F_556291020_q2ieMiOCKYbtoLITrnt7qcSL1LJYyWrU - Copie.jpeg"
               <img src= "<?= "images/".$image?>" alt="<?= $nom ?>" class="thumbnail" width="100px" height="75px">
            </td>
            <td><a href="update.php?update=<?php echo $id ?>" class="btn btn-success btn-sm" role="button">Update</a>
            <a href="index.php?delete=<?php echo $id ?>" class="btn btn-danger btn-sm" id="delete" role="button">Delete</a></td>
        </tr>
<?php
    }
}  
        
    if(isset($_GET['delete'])){
        
        $id = $_GET['delete'];

        $image = "SELECT * FROM student WHERE id = $id";
        
        $query1 = mysqli_query($conn,$image);

        while($row = mysqli_fetch_array($query1))
        {
             $img= $row['image'];
        }

            unlink("images/".$img);

        $query = "DELETE FROM student WHERE id = $id";
        
        $result = mysqli_query($conn,$query);
        
        if($result){

            header('location:index.php');
            
        }
    }    
         
?>

    </table>
</div>

<script>
    $(document).ready(function(){

        $('#delete').click(function(){
            if(!confirm("do you want to delete?"))
            {
                return false;
            }
            else
            {
                return true;
            }
        });


    });
</script>



