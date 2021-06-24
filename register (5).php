
<?php
//Show date
echo date("I F d, Y");
// Database name
$database_name = "sample.db";
// Database Connection
$db = new SQLite3($database_name);
$hashedPass="";
$message = "";


if( isset($_POST['submit']) ){
	// Includs database connection
	// Gets the data from post
	$pass = $_POST['pass'];
  //This is the part that hashes the password
  $hashedPass = password_hash($pass, PASSWORD_DEFAULT);
	$email = $_POST['email'];
	// Makes query with post data
  $db->exec("CREATE TABLE IF NOT EXISTS users(id INTEGER PRIMARY KEY, email TEXT, password TEXT)");
  $db->exec("INSERT INTO users(email, password) VALUES('$email', '$hashedPass')");
}
?>


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  background-color: #E0B0FF;
}

* {
  box-sizing: border-box;
}

/* Add padding to containers */
.container {
  padding: 16px;
  background-color: white;
  width :60%;
  margin: auto;
  border-radius: 8px;
}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
  border-radius: 8px;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit button */
.registerbtn {
  background-color: #04AA6D;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
  border-radius: 8px;
}

.registerbtn:hover {
  opacity: 1;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align: center;
}
</style>
</head>
<body>


<form method= "post" action="<?=$_SERVER['PHP_SELF'];?>">
  <div class="container">
    <h1>Register</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" id="email" required>

    <label for="pass"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="pass" id="pass" required>

    <hr>
    <button type="submit" class="registerbtn" name = "submit">Register</button>
  </div>
</form>

</body>
</html>
