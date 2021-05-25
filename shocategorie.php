<?php 
$k = $_POST['id'];
 $k = trim($k);
$connection = mysqli_connect("localhost","root","","gestion_stock");
$sql = "SELECT * FROM produit WHERE categorie='{$k}'";
$res = mysqli_query($connection,$sql);

while ($rows = mysqli_fetch_array($res)){
 ?>

 <tr>
     <td><img src="./uploads/<?php echo $rows['images']; ?>" alt=" " class="image_product "></td>
     <td><?php echo $rows['reference']; ?></td>
     <td><?php echo $rows['quantite_min']; ?></td>
     <td><?php echo $rows['categorie']; ?></td>
 </tr>

<?php
}
echo $sql;
?>