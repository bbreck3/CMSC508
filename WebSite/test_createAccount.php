






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
<title> RamTunes</title>


  <center>

   <div class="container" style="max-height: 200px; padding-top: 20%;">
        <div class="row centered-form">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h2 class="panel-title">Account Creation Successfull!</h2>
            </div>
            <div class="panel-body">
              <h3 class="panel-title"> <a href="index.php"> Sign in to continue </a>
               <a href="index.php"></h3>
               <!-- For Debugging purposes: Uncomment when needed --> 
                <!-- <a href="dashboard.php">
              Link to dashboard while debugging php
              </a> -->




<?php           
            

             

              $first_name = $_POST['first_name'];
              $last_name = $_POST['last_name'];
              $email =$_POST['email'];
              $password = $_POST['password'];
             

            // For debugging Purposes

             /* echo "First Name: ";
              echo $first_name;

              echo "Last Name: ";
              echo $last_name;

              echo "Email: ";
              echo $email;


              echo "Password: ";
              echo $password;
    
              echo "Debugging PHP Test: ";
              echo $test;*/

 
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
    if(isset($_POST['first_name']))
    {
        //the user name exists
        if(!ctype_alnum($_POST['first_name']))
        {
            $errors[] = 'The username can only contain letters and digits.';
        }
        if(strlen($_POST['first_name']) > 30)
        {
            $errors[] = 'The username cannot be longer than 30 characters.';
        }
    }

    //last name check
    if(isset($_POST['last_name']))
    {
        //the user name exists
        if(!ctype_alnum($_POST['last_name']))
        {
            $errors[] = 'The username can only contain letters and digits.';
        }
        if(strlen($_POST['last_name']) > 30)
        {
            $errors[] = 'The username cannot be longer than 30 characters.';
        }
    }
    else
    {
        $errors[] = 'The last_name field must not be empty.';
    }
     
     
    if(isset($_POST['password']))
    {
        if($_POST['password'] != $_POST['password_confirmation'])
        {
            $errors[] = 'The two passwords did not match.';
        }
        else{
          $hashedPass = create_hash($password, $hash_method='sha1');
        }
    }
    else
    {
        $errors[] = 'The password field cannot be empty.';
    }

    if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format"; 
    }
  }
     
    if(!empty($errors)) /*check for an empty array, if there are errors, they're in this array (note the ! operator)*/
    {
        echo 'Uh-oh.. a couple of fields are not filled in correctly..';
        echo '<ul>';
        foreach($errors as $key => $value) /* walk through the array so all the errors get displayed */
        {
            echo '<li>' . $value . '</li>'; /* this generates a nice error list */
        }
        echo '</ul>';
    }
    else
    {
        //the form has been posted without, so save it
        //notice the use of mysql_real_escape_string, keep everything safe!
        //also notice the sha1 function which hashes the password
    //$servername = "localhost:20037/xe";
    //$username = "breckenridrw";
    //$password = "V00637965";
    //$database = "breckenridrw";

// Create connection

$conn = oci_connect('breckenridrw', 'V00637965', 'localhost:20037/xe'); // this is localhost, i.e., jasmine.cs.vcu.edu

if (!$conn) {
 $m = oci_error();
 echo "Connection Unsuccessful";//$m['Connection Unsuccessful!'], "\n";
 exit;
}
else {
   echo "Connection Successful"; //$m['Connection successful!'], "\n";
        $sql = "INSERT INTO
                    user_info(first_name, last_name, email,password)
                VALUES( '$first_name',
                        '$last_name',
                        '$email',
                        '$hashedPass'
                       )";
                         
       
        $result = oci_parse($conn, $sql);
        oci_execute($result);
        //if(!$result)
        if(!$result)
        {
            //something went wrong, display the error
            echo 'Something went wrong while registering. Please try again later.';
            //echo mysql_error(); //debugging purposes, uncomment when needed
        }
        else
        {
            echo 'Successfully registered. You can now <a href="index.php">sign in</a> and start listening! :-)';

              /*   FOR DEBUGGING --> Comment and Uncomment as needed 
              echo $first_name;
              echo $last_name;
              echo $email;
              echo $password;
              






              echo "First Name: ";
              echo "<br>";
              echo $first_name;
              echo "<br>";
              echo "Last Name: ";
              echo $last_name;
              echo "<br>";
              echo "Email: ";
              echo $email;

              echo "<br>";
              echo "Password: ";
              echo $hashedPass;
            */

        }
        // Close the Oracle connection
      oci_close($conn);
      }
    }
}
 
//include 'footer.php';

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

function create_hash($string, $hash_method = 'sha1') {
        // generate random salt
        //$salt = randomSalt($salt_length);
  if (function_exists('hash') && in_array($hash_method, hash_algos())) {
    return hash($hash_method, $string);
  }
  return sha1($string);
}













            
?>

            </div>
          </div>
        </div>
      </div>
      
    </div>
</center>

     





</body>
</html>


