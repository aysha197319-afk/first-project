
<?php
include "config.php";
?>

<?php
include "config.php";

$result = mysqli_query($conn, "SELECT * FROM products");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Ecommerce</title>
</head>
<body>

<h2>All Products</h2>

<?php while($row = mysqli_fetch_assoc($result)) { ?>

    <div style="border:1px solid #ccc; padding:10px; margin:10px; width:250px;">
        <img src="uploads/<?php echo $row['image']; ?>" width="200"><br>
        <h3><?php echo $row['name']; ?></h3>
        <p>৳ <?php echo $row['price']; ?></p>
        <p><?php echo $row['description']; ?></p>
    </div>

<?php } ?>

</body>
</html>
