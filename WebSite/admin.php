'<!DOCTYPE html>
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



<!-- BEGIN USER AUTHENTICATION AND TEST IF USER IS VALID

    IF YES:
      THEN LOG THEM IN, REDIRECT TO THEIR DASHBOARD, REGISTER THE SESSSION, AND LOAD ALL CONTENT
    ELSE: 
      DO NOT LOG IN USER, OUTPUT ERROR AND REDIRECT TO LOGIN PAGE -->







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










  <div class="panel panel-default">
    <div class="panel-heading"> <bold> <h1> 
      Welcome to the admin page


    </h1> </bold></div>
    <div class="panel-heading"> <bold> <h2> Put Instructions Here</h3> </bold></div>


       <div class="panel-body">


<!-- CANVASAS FOR EACH OF YOUR CLASSES -->



  <div class="col">


    <div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-3">Class 1</h1>
    <p class="lead">

        
        <h1> Problem 1 </h1>  


<!-- 


		DISPLAY THE CONTENTS OF ALL THE PROBLEMS

-->



<div class="container">
  <h2>Problems</h2>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Answer</th>
        <th>Description </th>
      </tr>
    </thead>
    <tbody>







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

  
 #print "Connection Successfull!";
 echo "<table border='2'>\n";
 $sql = "SELECT ID, NAME, ANSWER, DESCRIPTION, PROBLEM from puzzle";
 $results = oci_parse($conn, $sql);
 oci_execute($results);










 while($row=oci_fetch_array($results, OCI_ASSOC+OCI_RETURN_NULLS)){
  foreach ($row as $item) {
  	


    echo "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") ."</td>\n";
    }
    echo "</tr>\n";
}
echo "</tbody></table>\n";

}

// Close the Oracle connection
oci_close($conn);
?>


<button data-toggle="collapse" data-target="#demo">Upload Problem</button>
&nbsp;&nbsp;&nbsp;&nbsp;
<button data-toggle="collapse" data-target="#demo1">Update Problem</button>




        

 </div>

   <!--- 



				ADMIN FORM TO ADD PROBLEMS TO THE DATABASE --: INSERT DATA

-->


<!-- This is the section to upload an new problem -->
<div id="demo" class="collapse">
<h3> <p> <font color="red"> Use this the section to upload the problem set </font> </p></h> 
<form action="postInfo_admin.php" method="post">
  



  <fieldset class="form-group">
    <label for="exampleSelect1">Problem ID</label>
    <select class="form-control" id="selectedProblem" name="selectedProblem">
     <option>1</option>
<option>2</option>
<option>3</option>
<option>4</option>
<option>5</option>
<option>6</option>
<option>7</option>
<option>8</option>
<option>9</option>
<option>10</option>
<option>11</option>
<option>12</option>
<option>13</option>
<option>14</option>
<option>15</option>
<option>16</option>
<option>17</option>
<option>18</option>
<option>19</option>
<option>20</option>
<option>21</option>
<option>22</option>
<option>23</option>
<option>24</option>
<option>25</option>
<option>26</option>
<option>27</option>
<option>28</option>
<option>29</option>
<option>30</option>
<option>31</option>
<option>32</option>
<option>33</option>
<option>34</option>
<option>35</option>
<option>36</option>
<option>37</option>
<option>38</option>
<option>39</option>
<option>40</option>
<option>41</option>
<option>42</option>
<option>43</option>
<option>44</option>
<option>45</option>
<option>46</option>
<option>47</option>
<option>48</option>
<option>49</option>
<option>50</option>
<option>51</option>
<option>52</option>
<option>53</option>
<option>54</option>
<option>55</option>
<option>56</option>
<option>57</option>
<option>58</option>
<option>59</option>
<option>60</option>
<option>61</option>
<option>62</option>
<option>63</option>
<option>64</option>
<option>65</option>
<option>66</option>
<option>67</option>
<option>68</option>
<option>69</option>
<option>70</option>
<option>71</option>
<option>72</option>
<option>73</option>
<option>74</option>
<option>75</option>
<option>76</option>
<option>77</option>
<option>78</option>
<option>79</option>
<option>80</option>
<option>81</option>
<option>82</option>
<option>83</option>
<option>84</option>
<option>85</option>
<option>86</option>
<option>87</option>
<option>88</option>
<option>89</option>
<option>90</option>
<option>91</option>
<option>92</option>
<option>93</option>
<option>94</option>
<option>95</option>
<option>96</option>
<option>97</option>
<option>98</option>
<option>99</option>
<option>100</option>
    </select>
  </fieldset>
  <fieldset class="form-group">
    <label for="problemName">Problem Name</label>
    <input type="text" class="form-control" id="problemName" name="problemName" placeholder="Problem Name">
  </fieldset>
  <fieldset class="form-group">
    <label for="Description">Problem Description</label>
    <textarea class="form-control" id="description" name="description" rows="3"></textarea>
  </fieldset>
   <fieldset class="form-group">
    <label for="problemName">Problem</label>
    <input type="text" class="form-control" id="theProblem" name="theProblem" placeholder="Problem Name">
  </fieldset>


  <fieldset class="form-group">
    <label for="Answer">Problem Answer</label>
    <textarea class="form-control" id="answer" name="answer" rows="3"></textarea>
  </fieldset>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

</div>





<!--



<!--- 



				ADMIN FORM TO UPDATE PROBLEMS TO THE DATABASE --: UPDATE DATA

				1) User selects the ID of the probem to change
				2) User selects the Field to change
				3) User types in the changes to that particular field.

-->

<div id="demo1" class="collapse">

<h3> <p> <font color="red"> NOTE: Only use this section to update a problem </font> </p></h> 
<h3> <p> <font color="red">To update a problem, select the problem number and the field you wish to update</font> </p></h> 

<form action="updateInfo_admin.php" method="post">
  



  <fieldset class="form-group">
    <label for="exampleSelect1">Problem ID</label>
    <select class="form-control" id="selectedProblem" name="selectedProblem">
     <option>1</option>
<option>2</option>
<option>3</option>
<option>4</option>
<option>5</option>
<option>6</option>
<option>7</option>
<option>8</option>
<option>9</option>
<option>10</option>
<option>11</option>
<option>12</option>
<option>13</option>
<option>14</option>
<option>15</option>
<option>16</option>
<option>17</option>
<option>18</option>
<option>19</option>
<option>20</option>
<option>21</option>
<option>22</option>
<option>23</option>
<option>24</option>
<option>25</option>
<option>26</option>
<option>27</option>
<option>28</option>
<option>29</option>
<option>30</option>
<option>31</option>
<option>32</option>
<option>33</option>
<option>34</option>
<option>35</option>
<option>36</option>
<option>37</option>
<option>38</option>
<option>39</option>
<option>40</option>
<option>41</option>
<option>42</option>
<option>43</option>
<option>44</option>
<option>45</option>
<option>46</option>
<option>47</option>
<option>48</option>
<option>49</option>
<option>50</option>
<option>51</option>
<option>52</option>
<option>53</option>
<option>54</option>
<option>55</option>
<option>56</option>
<option>57</option>
<option>58</option>
<option>59</option>
<option>60</option>
<option>61</option>
<option>62</option>
<option>63</option>
<option>64</option>
<option>65</option>
<option>66</option>
<option>67</option>
<option>68</option>
<option>69</option>
<option>70</option>
<option>71</option>
<option>72</option>
<option>73</option>
<option>74</option>
<option>75</option>
<option>76</option>
<option>77</option>
<option>78</option>
<option>79</option>
<option>80</option>
<option>81</option>
<option>82</option>
<option>83</option>
<option>84</option>
<option>85</option>
<option>86</option>
<option>87</option>
<option>88</option>
<option>89</option>
<option>90</option>
<option>91</option>
<option>92</option>
<option>93</option>
<option>94</option>
<option>95</option>
<option>96</option>
<option>97</option>
<option>98</option>
<option>99</option>
<option>100</option>
    </select>
  </fieldset>

 <fieldset class="form-group">
    <label for="exampleSelect1">Select Field to Update</label>
    <select class="form-control" id="selectedField" name="selectedField">
     <option>Problem Name</option>
<option>Problem Description</option>
<option>Problem Answer</option>
<option>Problem</option>
    </select>
  </fieldset>
  <fieldset class="form-group">
    <label for="Answer">Your Updates</label>
    <textarea class="form-control" id="toUpdate" name="toUpdate" rows="3"></textarea>
  </fieldset>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>



</div>


<form action="reset_DB.php" method="post">
<button type="submit" class="btn btn-primary">Reset Database</button>
</form>




<!-- 

		INSERT DATA INTO THE DB
-->
<!-- 
        <?php
        /* $conn = oci_connect('breckenridrw', 'V00637965', 'localhost:20037/xe'); // this is localhost, i.e., jasmine.cs.vcu.edu

if (!$conn) {
 $m = oci_error();
 echo "Connection Unsuccessful";//$m['Connection Unsuccessful!'], "\n";
 exit;
}
else {
   echo "Connection Successful"; //$m['Connection successful!'], "\n";
        $sql = "INSERT INTO
                   puzzle(ID,NAME, ANSWER,DESCRIPTION)
                VALUES( '$ID',
                        'NAME',
                        '$ANSWER',
                        '$DESCRIPTION'
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
            echo 'The Problem has been uploaded successfully';

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
}  */













            
?> -->
        
      
           <!-- <?php 
        /** $conn = oci_connect('breckenridrw', 'V00637965' ,'localhost:20037/xe');

      if(!$conn) {
        $m = oci_error();
        echo "Connection Unsuccessful!";
        exit;
      }else{



   







         <?php

          $conn = oci_connect('breckenridrw', 'V00637965' ,'localhost:20037/xe');

      if(!$conn) {
        $m = oci_error();
        echo "Connection Unsuccessful!";
        exit;
      }else{




          $sql="SELECT comments FROM comments";
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
} */
          
?> -->



 <!-- <form action="postInfo.php" method="post">
      <textarea name="responce" rows="5" cols="100"> </textarea>

      <!-- <input type="text" name="responce"> 
      <input type="submit" value="Submit">
  </form> -->







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





















                        
            
            



                        
                   

</body>
</html>'