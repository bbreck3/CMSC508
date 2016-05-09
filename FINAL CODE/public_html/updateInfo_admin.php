<!DOCTYPE html>
 <meta http-equiv="refresh" content="5;URL='admin.php" />
<head>
  <link rel="stylesheet" href="stylesheet.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

</head>


<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"> </script>
<script>



$(document).ready(function() {
    $('.dropdown-menu').dropit();
});
    function htmlbodyHeightUpdate(){
      var height3 = $( window ).height()
    var height1 = $('.nav').height()+50
    height2 = $('.main').height()
    if(height2 > height3){
      $('html').height(Math.max(height1,height3,height2)+10);
      $('body').height(Math.max(height1,height3,height2)+10);
    }
    else
    {
      $('html').height(Math.max(height1,height3,height2));
      $('body').height(Math.max(height1,height3,height2));
    }
    
  }
  $(document).ready(function () {
    htmlbodyHeightUpdate()
    $( window ).resize(function() {
      htmlbodyHeightUpdate()
    });
    $( window ).scroll(function() {
      height2 = $('.main').height()
        htmlbodyHeightUpdate()
    });
  });
</script>
<style>
   
</style>
<body>




<!--    SIDE MENU  -->

    
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
      <a class="navbar-brand" href="#">MyProfile</a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <!-- <li class="active"><a href="#">Home<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-home"></span></a></li> -->
        <li ><a href="#">PlusPLus's<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user"></span></a></li>
        <!--<li ><a href="#">Favorites<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-envelope"></span></a></li> -->
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
  
  <div class="panel panel-default">
   
    <div class="panel-body">


<!-- CANVASAS FOR EACH OF YOUR CLASSES -->



  <div class="col">


    <div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-3"></h1>
    <p class="lead">
          <?php

          /** Grab the info from the user and prep it for database insertion **/

          
          $ID = $_POST['selectedProblem'];
          $UPDATE_TAG = $_POST['selectedField'];
          $UPDATE_FIELD = $_POST['toUpdate'];

          $conn = oci_connect('breckenridrw', 'V00637965' ,'localhost:20037/xe');

      if(!$conn) {
        $m = oci_error();
        //echo "Connection Unsuccessful!";
        exit;
      }else{


          if($UPDATE_TAG=="Problem Name"){

           
            $sql="UPDATE puzzle
                  SET NAME = '$UPDATE_FIELD'
                  WHERE ID = $ID";

          }

          if($UPDATE_TAG=="Problem Description"){
             
            $sql="UPDATE puzzle
                  SET DESCRIPTION = '$UPDATE_FIELD'
                   WHERE ID = $ID";


          }

          if($UPDATE_TAG=="Problem Answer"){
            

            $sql="UPDATE puzzle
                  SET ANSWER = '$UPDATE_FIELD'
                   WHERE ID = $ID";

          }

          if($UPDATE_TAG=="Problem"){
            

            $sql="UPDATE puzzle
                  SET PROBLEM = '$UPDATE_FIELD'
                   WHERE ID = $ID";

          }
          $results=oci_parse($conn, $sql);
          oci_execute($results);
      }  

        if(!$results)
        {
            //something went wrong, display the error
            echo 'Something went wrong when uploading the informaton. Please try again!';
            //echo mysql_error(); //debugging purposes, uncomment when needed
        }
        else
        {
            echo 'Problem Number.' . $ID . ' was updated';
        }
        oci_close($conn);
      ?>


<!-- 

  OLD  IDEA DATABASE STUFF 
<?php

/*$data1="";
$prep = $_POST['responce'];
$temp = explode(" ", $prep);
 
$dataSize = sizeof($temp);

for($i = 0; $i < $dataSize;$i++)
{
  $data1 .=$temp[$i]." ";
}
echo "<br>";
$conn = oci_connect('breckenridrw', 'V00637965', 'localhost:20037/xe'); // this is localhost, i.e., jasmine.cs.vcu.edu

if (!$conn) {
 $m = oci_error();
 echo "Connection Unsuccessful";//$m['Connection Unsuccessful!'], "\n";
 exit;
}
else {
        $sql = "INSERT INTO
                    comments(comments)
                VALUES('$data1'
                       )";    
        $result = oci_parse($conn, $sql);
        oci_execute($result);
        //if(!$result)
        if(!$result)
        {
           echo 'Something went wrong with the data insertion. Please try again.';
        }
        else
        {  
            echo 'Your input has been recorded.';
            echo "You will be redirected momentarily";

            $data1="";

        }
      oci_close($conn);
      } */

      ?> -->
</div>
</div>