<?php
require_once 'db.php';

if(isset($_POST['update'])){

    $userid = intval ($_GET['id_produit']);

    $reference = $_POST['reference'];
    $libelle = $_POST['libelle'];
    $prix_unitaire = $_POST['prix_unitaire'];
    $quantite_min = $_POST['quantite_min'];
    $quantite_stock = $_POST['quantite_stock'];
    $categorie = $_POST['categorie'];

    $sql = "UPDATE `produit` SET `reference`=:ref,`libelle`=:lib,`prix_unitaire`=:prix_u,`quantite_min`=:quant_min,`quantite_stock`=:quant_st,`categorie`=:cate WHERE id_produit=:nouvellid";
    
     $query = $pdo->prepare($sql);
     $query -> bindParam(':ref',$reference,PDO::PARAM_STR);
     $query -> bindParam(':lib',$libelle,PDO::PARAM_STR);
     $query -> bindParam(':prix_u',$prix_unitaire,PDO::PARAM_STR);
     $query -> bindParam(':quant_min',$quantite_min,PDO::PARAM_STR);
     $query -> bindParam(':quant_st',$quantite_stock,PDO::PARAM_STR);
     $query -> bindParam(':cate',$categorie,PDO::PARAM_STR);
     $query -> bindParam(':nouvellid',$userid,PDO::PARAM_STR);

    $query->execute();

    echo "<script>alert('vous avez modifier un produit');</script>" ;
    echo "<script>window.location.href='produit.php'</script>" ;

}
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
        <div class="row">
            <div class="col-8">

            <?php 

            $userid = intval ($_GET['id_produit']);
            $sql = "SELECT `reference`, `libelle`, `prix_unitaire`, `quantite_min`, `quantite_stock`, `images`, `categorie` FROM `produit` WHERE id_produit=:nouvellid";
            
            $query = $pdo->prepare($sql);
            $query->bindParam(':nouvellid', $userid, PDO::PARAM_STR);
            $query->execute();

            $result = $query->fetchAll(PDO::FETCH_OBJ);

            foreach($result as $row){

                ?>

                <form action="#" class="form-group" method="POST" enctype="multipart/form-data">
                     <!-- <label for="">Image du Produit :</label>
                    <input type="file" class="form-control" name="profile" accept="*/image" value="<?php echo $row->images; ?>">  -->

                    <label for="">Reference :</label>
                    <input type="text" class="form-control" name="reference" value="<?php echo $row->reference; ?>">

                    <label for="">Libelle :</label>
                    <input type="text" class="form-control" name="libelle" value="<?php echo $row->libelle; ?>">

                    <label for="">prix_unitaire :</label>
                    <input type="text" class="form-control" name="prix_unitaire"  value="<?php echo $row->prix_unitaire; ?>">

                    <label for="">quantite_min :</label>
                    <input type="text" class="form-control" name="quantite_min"  value="<?php echo $row->quantite_min; ?>">

                    <label for="">quantite_stock :</label>
                    <input type="text" class="form-control" name="quantite_stock"  value="<?php echo $row->quantite_stock; ?>"> 

                    <label for="">categorie :</label>
                    <input type="text" class="form-control" name="categorie"  value="<?php echo $row->categorie; ?>">

                    <input type="submit" name="update" id="" value="Metre a jours" class="btn btn-primary mt-3"/>

                    <?php } ?>
                </form>
            </div>
        </div>
    </div>

</body>

</html>