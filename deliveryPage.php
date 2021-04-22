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
  <a href="productCategories.php">Product Categories</a>
  <a class="active" href="cart.php">Basket</a>
  <input type="text" placeholder="Search.." name="search">
</div>
<div>

 <div style="text-align: center;">
   <h2> Delivery Times </h2>
   <p>Please search your delivery date and then select an available slot </p>
</div>


<?php
include 'timeSlot.php';
?>

<div class="container"> 
  <div class="row"> 
   <div class="col-md-12"> 
    <div id="calendar"> 
     <?php 
        
            
             
        echo build_calendar($month,$year); 
     ?> 
    </div> 
   </div> 
  </div> 
 </div>
</body>

 </html>
