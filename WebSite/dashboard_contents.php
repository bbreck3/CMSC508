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
<!-- END MAIN BODY CONTECT  -->