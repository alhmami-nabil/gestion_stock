<?php
require_once 'db.php';

$stmt = $pdo->query('SELECT * FROM produit');
// supprmer les produits
if(isset($_REQUEST['del']))
{
    $sup = intval($_GET['del']);

    $sql = "DELETE FROM produit WHERE id_produit=:id_produit";
    $query = $pdo->prepare($sql);
    $query ->bindParam(':id_produit', $sup , PDO::PARAM_STR);
    $query ->execute();
    echo "<script> window.location.href='produit.php' </script>";
}
//fin supprimer

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
    <?php require_once 'navbar.php'; ?>
    <div class="container">
        <table class="table table-striped display" id="example">
            <thead>
                <th>Image</th>
                <th>Reference</th>
                <th>Libelle</th>
                <th>Prix Unitaire</th>
                <th>Quantite Min</th>
                <th>Quantite Stock</th>
                <th>Etat en stock</th>
                <th>Action</th>
            </thead>
            <tbody>
                <?php
                while ($row =  $stmt->fetch()) {
                ?>

                    <tr>
                        <td><img src="./uploads/<?php echo $row->images; ?>" alt=" " class="image_product "></td>
                        <td><?php echo $row->reference; ?> </td>
                        <td><?php echo $row->libelle; ?> </td>
                        <td><?php echo $row->prix_unitaire; ?> </td>
                        <td><?php echo $row->quantite_min; ?> </td>
                        <td><?php echo $row->quantite_stock; ?> </td>
                        <td> <span class="badge bg-success">en Stock</span> </td>
                        <td>

                            <a href="updateproduit.php?id_produit=<?php echo $row->id_produit;?>"><dutton class="btn btn-primary"><i class="fas fa-edit"></i></dutton></a>
                            <a href="produit.php?del=<?php echo $row->id_produit;?>"><dutton class="btn btn-danger" onclick="return confirm('voulez vous vraiment supprimer')"><i class="fas fa-trash"></i></dutton></a>

                        </td>
                    </tr>
                <?php } ?>

            </tbody>
        </table>
    </div>

    <script>
      $(document).ready(function() {
    $('#example').DataTable( {
        "scrollY":        "400px",
        "scrollCollapse": true,
        "paging":         false
        } );
       } ); 
    </script>

</body>

</html>