





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
<title>RAM-O-naire</title>


  <center>

   <div class="container" style="max-height: 200px; padding-top: 20%;">
        <div class="row centered-form">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Thank for for choosing RAM-O-naire</h3>
               <h3 class="panel-title">Please sign up to continue</h3>
            </div>
            <div class="panel-body">
              <form role="form" method="post" action="test_createAccount.php" >
                <div class="row">
                  <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                      <input type="text" name="first_name" id="first_name" class="form-control input-sm" placeholder="First Name">
                    </div>
                  </div>
                  <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                      <input type="text" name="last_name" id="last_name" class="form-control input-sm" placeholder="Last Name">
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <input type="email" name="email" id="email" class="form-control input-sm" placeholder="Email Address">
                </div>

                <div class="row">
                  <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                      <input type="password" name="password" id="password" class="form-control input-sm" placeholder="Password">
                    </div>
                  </div>
                  <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                      <input type="password" name="password_confirmation" id="password_confirmation" class="form-control input-sm" placeholder="Confirm Password">
                    </div>
                  </div>
                </div>
                
                <input type="submit" value="Register" class="btn btn-info btn-block">
                

            <!-- For Debugging purposes: Uncomment when needed --> 
                <!-- <a href="dashboard.php">
              Link to dashboard while debugging php
              </a> -->
              
              </form>

            

            <!--

                PHP insine HTML for debugging purposes:

                Needs to validate user input and hash user passwords before input into database


            -->

            


              <!--<?php
/*echo "<h2>Your Input:</h2>";
echo $first_name;
echo "<br>";
echo $last_name;
echo "<br>";
echo $email;
echo "<br>";
echo $password;
echo "<br>";
echo $password_confirmation;*/


?> -->
            </div>
          </div>
        </div>
      </div>
      
    </div>
</center>

     





</body>
</html>

