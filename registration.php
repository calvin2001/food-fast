<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
    <link rel="stylesheet" href="styles.css"/>
</head>
<body>
<?php
    require('db.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['username'])) {
        
        $first_name = stripslashes($_REQUEST['first_name']);
        $first_name = mysqli_real_escape_string($con, $first_name);

        $second_name = stripslashes($_REQUEST['second_name']);
        $second_name = mysqli_real_escape_string($con, $second_name);
        // removes backslashes
        $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
        $username = mysqli_real_escape_string($con, $username);
        
        $email = stripslashes($_REQUEST['email']);
        $email = mysqli_real_escape_string($con, $email);

        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);

        $phone_number = stripslashes($_REQUEST['phone_number']);
        $phone_number = mysqli_real_escape_string($con, $phone_number);

        $address1 = stripslashes($_REQUEST['address1']);
        $address1 = mysqli_real_escape_string($con, $address1);

        $address2 = stripslashes($_REQUEST['address2']);
        $address2 = mysqli_real_escape_string($con, $address2);

        $county = stripslashes($_REQUEST['county']);
        $county = mysqli_real_escape_string($con, $county);

        $postal_code = stripslashes($_REQUEST['postal_code']);
        $postal_code = mysqli_real_escape_string($con, $postal_code);



        $create_datetime = date("Y-m-d H:i:s");
        $query    = "INSERT into `users` (username, password, email, first_name, second_name, phone_number, address1, address2, county, postal_code, create_datetime) 
                     VALUES ('$username', '" . md5($password) . "', '$email', '$first_name', '$second_name', '$phone_number', '$address1', '$address2', '$county', '$postal_code', '$create_datetime')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                  </div>";
        }
    } else {
?>
    <form class="form" action="" method="post">
        <h1 class="login-title">Registration</h1>
        <input type="text" class="login-input" name="first_name" placeholder="First Name" required />
        <input type="text" class="login-input" name="second_name" placeholder="Second Name" required />
        <input type="text" class="login-input" name="address1" placeholder="Address 1" required />
        <input type="text" class="login-input" name="address2" placeholder="Address 2" required />
        <input type="text" class="login-input" name="county" placeholder="County" required />
        <input type="text" class="login-input" name="postal_code" placeholder="Postal Code" required />
        <input type="text" class="login-input" name="phone_number" placeholder="Phone Number" required />
        <input type="text" class="login-input" name="username" placeholder="Username" required />
        <input type="text" class="login-input" name="email" placeholder="Email Adress">
        <input type="password" class="login-input" name="password" placeholder="Password">
        <input type="submit" name="submit" value="Register" class="button">
        <a class="button" href="login.php"> Click to Login </a>
	<a class="button" href="../index.php"> Home </a>
    </form>
<?php
    }
?>
</body>
</html>
