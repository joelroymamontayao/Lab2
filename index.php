<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="style.css">
	<title>Register</title>

</head>
<body>

	<?php
// define variables and set to empty values
$firstnameErr =$middlenameErr = $lastnameErr = $genderErr = $usernameErr = $passwordErr = $confirmpasswordErr = "";
$firstname = $middlename = $lastname = $gender = $comment = $username = $password = $confirmpassword = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["firstname"])) {
    $firstnameErr = "required";
  } else {
    $firstname = test_input($_POST["firstname"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$firstname)) {
      $firstnameErr = "Only letters and white space allowed";
    }
  }

  if (empty($_POST["middlename"])) {
    $middlenameErr = "required";
  } else {
    $middlename = test_input($_POST["middlename"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$middlename)) {
      $middlenameErr = "Only letters and white space allowed";
        }
  }

  if (empty($_POST["lastname"])) {
    $lastnameErr = "required";
  } else {
    $lastname = test_input($_POST["lastname"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$lastname)) {
      $lastnameErr = "Only letters and white space allowed";
        }
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }

if (empty($_POST["username"])) {
    $usernameErr = "required";
  } else {
    $username = test_input($_POST["username"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$username)) {
      $usernameErr = "Only letters and white space allowed";
        }
  }

  if (empty($_POST["password"])) {
    $passwordnameErr = "required";
  } else {
    $password = test_input($_POST["password"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$password)) {
      $Err = "Only letters and white space allowed";
        }
  }

  if (empty($_POST["confirmpassword"])) {
    $confirmpasswordErr = "required";
  } else {
    $confirmpassword = test_input($_POST["confirmpassword"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$confirmpassword)) {
      $Err = "Only letters and white space allowed";
        }
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


if(isset($_POST['reset'])) {
	$firstname = "";
	$middlename = "";
	$lastname = "";
	$username = "";
	$gender = "";
	$password = "";
	$confirmpassword = "";
	$display = "";
	}
?>

<div class="container">
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

<h2>REGISTRATION FORM</h2>
  <div class="form-group">
  Firstname: <input type="text" name="firstname" value="<?php echo $firstname;?>">
  <span class="error">* <?php echo $firstnameErr;?></span>
  <br><br></div>
   <div class="form-group">
  Middlename: <input type="text" name="middlename" value="<?php echo $middlename;?>">
  <span class="error">* <?php echo $middlenameErr;?></span>
  <br><br></div>
    <div class="form-group">
  Lastname: <input type="text" name="lastname" value="<?php echo $lastname;?>">
  <span class="error">* <?php echo $lastnameErr;?></span>
  <br><br></div>
   <div class="form-group">
  Gender:
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other
  <span class="error">* <?php echo $genderErr;?></span>
  <br><br></div>
   <div class="form-group">
  Username: <input type="text" name="username" value="<?php echo $username;?>">
  <span class="error">* <?php echo $usernameErr;?></span>
  <br><br></div>
   <div class="form-group">
  Password: <input type="text" name="password" value="<?php echo $password;?>">
  <span class="error">* <?php echo $passwordErr;?></span>
  <br><br></div>
  <div class="form-group">
  Confirm Password: <input type="text" name="confirmpassword" value="<?php echo $confirmpassword;?>">
  <span class="error">* <?php echo $confirmpasswordErr;?></span>
  <br><br></div>
  <div class="form-button">
	<form action = "register.php" method = "POST">
  <input class="btn" type="submit" name="submit" value="SUBMIT">
  &nbsp;&nbsp;&nbsp;
  <input class="btn" type="submit" name="reset" value="RESET" />
  	</div>
	<br>

</form>
</div>

<div class = "result" style="background-color: #fff; padding: 30px 35px; width: 500px; position: absolute;
border: 2px solid black; margin-left: 48%; top: 6.3%; font-weight: bold;">
<?php
echo "<h2>RESULT: </h2>";
echo "<p>Firstname: $firstname</p>";
echo "<p>Middlename: $middlename</p>";
echo "<p>Lastname: $lastname</p>";
echo "<p>Gender: $gender</p>";
echo "<p>Username: $username</p>";
echo "<p>Password: $password</p>";
echo "<p>Confirm Password: $confirmpassword</p>";
?>
</div>

</body>
</html>
