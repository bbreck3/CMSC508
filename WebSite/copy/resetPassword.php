<!DOCTYPE HTML/>
<META CHARSET='UTF-8'/>
<html>
<head>
	<link rel="stylesheet" href="stylesheet.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"> </script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	
	<script>
	
	</script>

  <style>
    body
    {
      
      background-image: url("pictures/compass.jpg");
      background-repeat: no-repeat;
       background-attachment: fixed;
      background-position: center; 
      background-size: 100% 100%
      
      }
  </style>
</head>
<body>
<title> RAM-O-naire</title>


  

    <div class="container" style="margin:auto; max-width: 500px; max-height: 200px; padding-top: 20%;">
<div class="panel panel-default">
  <div class="panel-body">
<center>
     <form class="form-signin" method="post" action="">

        
        <h2 class="form-signin-heading">Reset Password</h2>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" name="inputEmail" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="inputPassword" id="inputPassword" class="form-control" placeholder="Password" required>
        <label for="inputPassword" class="sr-only">Password Check</label>
         <input type="password" name="inputPasswordCheck" id="inputPasswordCheck" class="form-control" placeholder="Password" required>
        
        <button class="btn btn-lg btn-primary btn-block" type="submit">Reset</button>
      </form>

      

</center>

<!-- For debugging purposes only: Uncomment when needed -->
<!-- <a href="dashboard.php"> -->
<!--<a href="dashboard.php">
    <button>Link to dashboard while debugging php</button>
</a> -->

<!-- BEGIN PHP :== USER AUTHENTICATION   -->


<?php

  //$inputEmail =$_POST['inputEmail'];
  //$inputPassword =$_POST['inputPassword'];
  
//For debugging 
  //echo $inputEmail;
  //echo "<br>";
  //echo $inputPassword;


if($_SERVER['REQUEST_METHOD'] != 'POST')
{
    /*the form hasn't been posted yet, display it
      note that the action="" will cause the form to post to the same page it is on */
    /*echo '<form method="post" action="">
        First Name: <input type="text" name="fName" id="first_name/>
        Last Name : <input type ="text" name="lName" id="last_name" />
        Email: <input type="email" name ="email" id="email" />
        Password: <input type="password" name="user_pass" id="password">
        Password again: <input type="password" name="user_pass_check" id="password_check">
        
        <input type="submit" value="Register" />
     </form>';*/
}
else
{
    /* so, the form has been posted, we'll process the data in three steps:
        1.  Check the data
        2.  Let the user refill the wrong fields (if necessary)
        3.  Save the data 
    */
    $errors = array(); /* declare the array for later use */
     //first name check
    if(isset($_POST['inputEmail']) and isset($_POST['inputPassword']) and isset($_POST['inputPasswordCheck']))
    {
      $email= $_POST['inputEmail'];
      $password = trim($_POST['inputPassword']);
      $password_check = trim($_POST['inputPasswordCheck']);
      if($password===$password_check){
        echo "<br>Passwords match <br>";
      $passwordHash = hashPass($_POST['inputPassword'], $hash_method = 'sha1');

      $conn = oci_connect('breckenridrw', 'V00637965' ,'localhost:20037/xe');



      if(!$conn) {
        $m = oci_error();
        echo "Connection Unsuccessful!";
        exit;
      }else{
        //echo "Connection Successful!";
          //$sql = "SELECT email, password FROM user_info WHERE email= '$email' and password='$passwordHash'";
          //$sql = "SELECT * FROM user_info";

          //$results = oci_parse($conn, $sql);

          $sql="UPDATE user_info
               SET  password='$passwordHash' WHERE email='$email'";
          //$sql = "SELECT * FROM user_info";
          $results=oci_parse($conn, $sql);

          oci_execute($results);
          //$res = oci_fetch_array($results);
          if(!$results){
            echo "An error occured while updating your password.<br>";
            echo "Please Try Again";
          } else {
              echo "Your password has successfully been updated!<br>";
              echo file_get_contents("changePassSuccRedirect.php");
          }
    }
  } else {
    echo "Passwords do not match!<br> Please try again.";
  }
  }
}









function validateLogin($pass, $hashed_pass, $salt) {
  if (function_exists('hash') && in_array($hash_method, hash_algos())) {
    return ($hashed_pass === crypt($pass, $hashed_pass));
  }
  return ($hashed_pass === _create_hash($pass, $salt));
}
function hashPass($string, $hash_method = 'sha1') {
        // generate random salt
        //$salt = randomSalt($salt_length);
  if (function_exists('hash') && in_array($hash_method, hash_algos())) {
    return hash($hash_method, $string);
  }
  return sha1($string);
}


?>


<!-- END PHP -->



  </div>
</div>








     





</body>
</html>