<?php
$connection = mysqli_connect("localhost", "root", "", "gestion_stock");
$sql = "SELECT DISTINCT categorie FROM produit";
$res = mysqli_query($connection, $sql);

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


    <script src="code.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

    <h1 class="text-center mt-5">Welcome to categories</h1>

    <div class="container">
        <div class="row">
            <div class="col-2 mt-5">
                <label>les categories :</label>
            </div>
            <div class="col-6 mt-5">
                <select name="categories" id="category" onchange="selectcategorie()">
                    <option>selection un choix</option>
                    <?php while ($rows = mysqli_fetch_array($res)) {  ?>
                        <option value="<?php echo $rows['categorie']; ?>"><?php echo $rows['categorie']; ?></option>
                    <?php } ?>
                </select>
            </div>

        </div>
    </div>

    <div class="container mt-5">
        <div class="row">
            <table class="table table-striped" id="example">
                <thead>
                    <th>Image</th>
                    <th>Reference</th>
                    <th>Quantite Min</th>
                    <th>Categorie</th>
                </thead>
                <tbody id="cate">

                </tbody>
            </table>
        </div>
    </div>
    </div>


</body>

</html>