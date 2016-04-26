<!DOCTYPE html>
<meta chartset="utf-8">
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
    <div class="panel-heading"> <bold> <h1> Welcome <!-- <?php  echo $first_name = $_POST['inputEmail']; ?> --></h1> </bold></div>
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




 





<!--

        OLD IDEA FOR MUSIC: AFTER SOME RESEARCH, IT IS POSSIBLE BUT NOT AN EASY FEAT WITHIN THE TIME FRAME FOR THIS PROJECT.

        SWITCHING GERS TO ANOTHER IEAD




      -->



        <!-- <h3><form class="navbar-form navbar-left" role="search">
  <div class="form-group">
    <b> TEST</b>: <input type="text" class="form-control" placeholder="Search"> 
  </div> -->
  <!--<button type="submit" class="btn btn-default">Submit</button> -->
 

 <!-- FORM TO TAKE IN USER SELECTION -->

<!-- <form action="parse.php" method="post">
  Title: <input type="text" name="title" size="10" value="" placeholder="Search">
  Genre: <select name="genre">
  <option value="Rock N Roll">Rock N Roll</option>
  <option value="Country">Country</option>
  <option value="R&B">R&B</option>
  <option value="Classic">Classic</option>
  <option value="Metal">Metal</option>
  <option value="BlueGrass">Blue Grass</option>
  <option value="Jazz">Jazz</option>
  <option value="Rap">Rap</option>
  <option value="Pop">Pop</option>
  <option value="Indie">Indie</option>
</select>
Release Year <select name="year">
<option value="1950">1950</option>
<option value="1951">1951</option>
<option value="1952">1952</option>
<option value="1953">1953</option>
<option value="1954">1954</option>
<option value="1955">1955</option>
<option value="1956">1956</option>
<option value="1957">1957</option>
<option value="1958">1958</option>
<option value="1959">1959</option>
<option value="1960">1960</option>
<option value="1961">1961</option>
<option value="1962">1962</option>
<option value="1963">1963</option>
<option value="1964">1964</option>
<option value="1965">1965</option>
<option value="1966">1966</option>
<option value="1967">1967</option>
<option value="1968">1968</option>
<option value="1969">1969</option>
<option value="1970">1970</option>
<option value="1971">1971</option>
<option value="1972">1972</option>
<option value="1973">1973</option>
<option value="1974">1974</option>
<option value="1975">1975</option>
<option value="1976">1976</option>
<option value="1977">1977</option>
<option value="1978">1978</option>
<option value="1979">1979</option>
<option value="1980">1980</option>
<option value="1981">1981</option>
<option value="1982">1982</option>
<option value="1983">1983</option>
<option value="1984">1984</option>
<option value="1985">1985</option>
<option value="1986">1986</option>
<option value="1987">1987</option>
<option value="1988">1988</option>
<option value="1989">1989</option>
<option value="1990">1990</option>
<option value="1991">1991</option>
<option value="1992">1992</option>
<option value="1993">1993</option>
<option value="1994">1994</option>
<option value="1995">1995</option>
<option value="1996">1996</option>
<option value="1997">1997</option>
<option value="1998">1998</option>
<option value="1999">1999</option>
<option value="2000">2000</option>
<option value="2001">2001</option>
<option value="2002">2002</option>
<option value="2003">2003</option>
<option value="2004">2004</option>
<option value="2005">2005</option>
<option value="2006">2006</option>
<option value="2007">2007</option>
<option value="2008">2008</option>
<option value="2009">2009</option>
<option value="2010">2010</option>
<option value="2011">2011</option>
<option value="2012">2012</option>
<option value="2013">2013</option>
<option value="2014">2014</option>
<option value="2015">2015</option>
</select>
  <input type="submit" value="Search">
</form>
</form></h3>




-->
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



                        
            
            



                        
                   

</body>
</html>