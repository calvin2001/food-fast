<!doctype html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../styles/style.css">
</head>
<body>
<a href="../index.php"><img src="../img/logo1.png" alt="Logo" style="width:30%"></a>

<div class="topnav">
  <a href="../auth/accountPage.php">My Account</a>
  <a class="active" href="productCategories.php">Product Categories</a>
  <a href="cart.php">Basket</a>
	<input type="text" placeholder="Search...">
</div>
<h2 style="text-align:center">Popular Items</h2>
<div>
<a href="popular.php?AZ" class="button">Sort A-Z</a>
		<a href="popular.php?ZA" class="button">Sort Z-A</a>
	<a href="popular.php?HL" class="button">Sort Price high to low</a>
  <a href="popular.php?LH" class="button">Sort Price low to high</a>
    </div>


<?php
	require 'connect.php';
	$results = mysqli_query($con, 'select productid, COUNT(productid) AS value_occurrence from ordersdetail GROUP BY productid ORDER BY value_occurrence DESC LIMIT 4');
  
  $data = array();
  
?>

<?php while($x = mysqli_fetch_object($results)) { ?>
  <?php $data[] = $x->productid; ?>
  <?php } ?>
  
  <?php
  if (isset($_GET['AZ'])) {
    $result = mysqli_query($con, "select * from product WHERE ID IN ($data[0], $data[1], $data[2], $data[3]) ORDER BY name");
    }elseif (isset($_GET['ZA'])) {
      $result = mysqli_query($con, "select * from product WHERE ID IN ($data[0], $data[1], $data[2], $data[3]) ORDER BY name DESC");
    }elseif (isset($_GET['HL'])) {
      $result = mysqli_query($con, "select * from product WHERE ID IN ($data[0], $data[1], $data[2], $data[3]) ORDER BY price DESC");
    }elseif (isset($_GET['LH'])) {
      $result = mysqli_query($con, "select * from product WHERE ID IN ($data[0], $data[1], $data[2], $data[3]) ORDER BY price");
    }else {
      $result = mysqli_query($con, "select * from product WHERE ID IN ($data[0], $data[1], $data[2], $data[3])");
    }
?>
  
  

  <?php while($product = mysqli_fetch_object($result)) { ?>
    
    <div class="column">
    <div class="card">
    
    
    <img src="<?php echo $product->image; ?>" style="20%">
    <h2><?php echo $product->name; ?></h2>
    <p><?php echo $product->price; ?></p>
    <p><?php echo $product->description; ?></p>
    <a class="button" href="cart.php?id=<?php echo $product->id; ?>">Add to Basket</a>
    
    </div>
    </div>
<?php } ?>

</body>
</html>
