<!DOCTYPE html>
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
  <input type="text" placeholder="Search.." name="search">
</div>
<div>
      <a href="foodAndDrink.php?AZ" class="button">Sort A-Z</a>
		<a href="foodAndDrink.php?ZA" class="button">Sort Z-A</a>
	<a href="foodAndDrink.php?HL" class="button">Sort Price high to low</a>
  <a href="foodAndDrink.php?LH" class="button">Sort Price low to high</a>
  <a href="categories/popularItemsMeat.html" class="button">Sort Meat</a>
	<a href="categories/popularItemsDairy.html" class="button">Sort Dairy</a>
	<a href="categories/popularItemsSweet.html" class="button">Sort Sweet</a>
    </div>

    


<?php
  
	require 'connect.php';
	
  if (isset($_GET['AZ'])) {
    $result = mysqli_query($con, 'select * from product ORDER BY name');
}elseif (isset($_GET['ZA'])) {
  $result = mysqli_query($con, 'select * from product ORDER BY name DESC');
}elseif (isset($_GET['HL'])) {
  $result = mysqli_query($con, 'select * from product ORDER BY price DESC');
}elseif (isset($_GET['LH'])) {
  $result = mysqli_query($con, 'select * from product ORDER BY price');
}

else {
  $result = mysqli_query($con, 'select * from product');
}
?>
  
	<?php while($product = mysqli_fetch_object($result)) { ?>
    
      <div class="column">
			<div class="card">
      
			
			<a href="<?php echo $product->page; ?>"><img src="<?php echo $product->image; ?>" style="20%"></a>
			<h2><?php echo $product->name; ?></h2>
      <p><?php echo $product->description; ?></p>
			<p><?php echo $product->price; ?></p>
			<a class="button" href="cart.php?id=<?php echo $product->id; ?>">Add to Basket</a>
			
			</div>
			</div>
	<?php } ?>
 
  
</table>
</body>
</html>
