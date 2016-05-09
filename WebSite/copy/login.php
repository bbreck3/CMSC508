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
<title> RAMOverflow</title>


  

    <div class="container" style="margin:auto; max-width: 500px; max-height: 200px; padding-top: 20%;">
<div class="panel panel-default">
  <div class="panel-body">
<center>
     <form class="form-signin" method="post" action="login.php">

        <h1 class="form-signin-heading" >Welcome to RAMOverflow</h1>
        <h2 class="form-signin-heading">Please sign in</h2>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" name="inputEmail" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="inputPassword" id="inputPassword" class="form-control" placeholder="Password" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>

      <p> 

    Need an account?
    <a href="createAccount.php"> Create Account </a>
    </P>

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
    if(isset($_POST['inputEmail']) and isset($_POST['inputPassword']))
    {
      $email= $_POST['inputEmail'];
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

          $sql="SELECT email, password FROM user_info WHERE email='$email' and password='$passwordHash'";
          //$sql = "SELECT * FROM user_info";
          $results=oci_parse($conn, $sql);

          oci_execute($results);
          $res = oci_fetch_array($results);


         /** for debuggin purposes: Uncomment when needed */
          /*echo "DB PASSWORD:";
          echo "<br>";
          
          echo $res['PASSWORD'];
          echo "<br>";
          echo "User Pass:";
          echo "<br>";
          echo $passwordHash;
          //var_dump($res);
          */
          
          

          
  
          if($passwordHash==$res['PASSWORD']){
            /** for debuggin purposes: Uncomment when needed */
            
            /* echo "Passwords Match:";
            echo "<br>";
            echo "From user:";
            echo "<br>";
            echo $passwordHash;
            echo "<br>";
            echo "From DB:";
            echo "<br>";
            echo $res['PASSWORD']; */
            //echo file_get_contents('dashboard.php');
            header('Location: dashboard.php');   

          } else {
          	
          	echo "<!--    SIDE MENU  -->

    
        <!-- Sidebar -->
           <nav class="navbar navbar-inverse sidebar" role="navigation">
    <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-sidebar-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="dashboard.php">MyProfile</a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <!-- <li class="active"><a href="#">Home<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-home"></span></a></li> -->
        <li ><a href="#">PlusPLus's<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user"></span></a></li>
        <li ><a href="php_info.php">PHP Reference<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-envelope"></span></a></li>
        <!-- <li><a href="php_info.php">PHP Reference</a></li> -->
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Settings <span class="caret"></span><span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-cog"></span></a>
          <ul class="dropdown-menu forAnimate" role="menu">
            <li ><a href="#"></a></li>
            <li><a href="index.php">Logout</a></li>
            <li><a href="#">Change Password</a></li>
            <li class="divider"></li>
            <!-- <li><a href="#">Separated link</a></li>
            <li class="divider"></li>
            <li><a href="#">One more separated link</a></li> -->
          </ul>
        </li>
        
      </ul>
    </div>
  </div>
</nav>
<!-- END SIDE MENU   -->


<!-- MAIN BODY CONTENTS GOES HERE -->
<div class="main">



<!--   BROWSE YOUR CLASSES  -->





  
  <div class="container" style="marging-left: auto; margin-right:auto; width:85%">




<?php
           
            session_start();
          

?>








  <div class="panel panel-default">
    <div class="panel-heading"> <bold> <h1> 
      Welcome  
      <?php
            $email = $_POST['inputEmail'];
            //echo $email;
            $_SESSION['inputEmail']=$email;
            echo $_SESSION['inputEmail'];
      ?>


    </h1> </bold></div>
    <div class="panel-heading"> <bold> <h2> Browse Classes</h3> </bold></div>
    <div class="panel-body">


<!-- CANVASAS FOR EACH OF YOUR CLASSES -->



  <div class="col">


    <div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-3">Class 1</h1>
    <p class="lead">

        <div data-spy="scroll" data-target="#navbar-example2" data-offset="0" class="scrollspy-example">
          <?php

          $conn = oci_connect('breckenridrw', 'V00637965' ,'localhost:20037/xe');

      if(!$conn) {
        $m = oci_error();
        echo "Connection Unsuccessful!";
        exit;
      }else{

          $sql="SELECT input FROM comments";
          //$sql = "SELECT * FROM user_info";


          $results=oci_parse($conn, $sql);
          oci_execute($results);
          $res = oci_fetch_array($results);
          //var_dump($res);
        
        


  while($row=oci_fetch_array($results, OCI_ASSOC+OCI_RETURN_NULLS)){
   
  $fromDB = $row['INPUT'];
   $temp = explode(" ", $fromDB);
  for($i = 0; $i < count($temp);$i++)
  {
  echo $temp[$i];
  echo "<br>";
    }
   
}
}
          
?>

</div>

 <form action="postInfo.php" method="post">
      <textarea name="responce" rows="5" cols="100"> </textarea>

      <!-- <input type="text" name="responce"> -->
      <input type="submit" value="Submit">
  </form>







<!-- Like the look but will not use for now -->
<!-- Actual scrollspy markup: -->
<!-- <nav id="navbar-example2" class="navbar navbar-default">
  <h3 class="navbar-brand">Project Name</h3>
  <ul class="nav nav-pills">
    <li class="nav-item"><a class="nav-link" href="#verse1">Verse 1</a></li>
    <li class="nav-item"><a class="nav-link active" href="#verse2">Verse 2</a></li>
  </ul>
</nav>
<div data-spy="scroll" data-target="#navbar-example2" data-offset="0" class="scrollspy-example">
  <h4 id="verse1">Verse 1</h4>
  <p>May <br> the <br> gods <br> forgive <br> me.</p>
  <h4 id="verse2">Verse 2</h4>
  <p>For <br> this <br> rampant <br> abuse <br> of <br> br-tags.</p>
</div> -->


  <!--<div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <!-- <img src="..." alt="..."> 
      <div class="caption">
        <h3> Class 1</h3>
        <p>...</p>
       
      </div>
    </div>
  </div> -->
</div>
</div> 

<!-- END FORM -->

<!-- TABLE TO DISPLAY CONTENT FROM DATABASE  -->

<div class="panel-body">



    <!-- sample dummy data from database-->
                        
 <?php
$servername = "localhost:20037/xe";
$username = "breckenridrw";
$password = "V00637965";
$database = "breckenridrw";

// Create connection

$conn = oci_connect('breckenridrw', 'V00637965', 'localhost:20037/xe'); // this is localhost, i.e., jasmine.cs.vcu.edu

if (!$conn) {
 $m = oci_error();
 echo $m['Connection Unsuccessful!'], "\n";
 echo "<br>";
 echo "Pending data form DB";
 exit;
}
else {

  /**
      THIS WORKS BUT CHANGE THE VARIABLE TO REFLECT COMMENTS, CLASSES AND STUDENT USERS 
        NOT ARTIST, ALBUMS, ETC.....


        **/
 /*print "Connection Successfull!";
 echo "<table border='1'>\n";
 $sql = "SELECT title, artist, album from sample_db";
 $results = oci_parse($conn, $sql);
 oci_execute($results);
 while($row=oci_fetch_array($results, OCI_ASSOC+OCI_RETURN_NULLS)){
  foreach ($row as $item) {
    echo "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
    }
    echo "</tr>\n";
}
echo "</table>\n";

 */


/**

    END WORKS

*/
}




// Close the Oracle connection
oci_close($conn);
?>

</div>

<!-- END DATABASE TABLE  -->
  </div>
</div>

<!-- END SEARCH FOR SONG  -->
            
</div>  
<!-- END MAIN BODY CONTECT  -->";
          	//echo "Incorrect Ussername or Password";
          	//echo file_get_contents('login_error.php');
            
          }
          //header('Location: dashboard.php'); 
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