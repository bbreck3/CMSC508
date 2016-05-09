<!DOCTYPE html>
<meta chartset="utf-8">
<!--<meta http-equiv="refresh" content="5;URL='dashboard.php" />-->
<head>
  <link rel="stylesheet" href="public_html/style/stylesheet.css">
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



$(function(){ 
     //alert(event.timeStamp);
     $('.new-com-bt').click(function(event){    
         $(this).hide();
         $('.new-com-cnt').show();
         $('#name-com').focus();
     });
 
     /* when start writing the comment activate the "add" button */
     $('.the-new-com').bind('input propertychange', function() {
        $(".bt-add-com").css({opacity:0.6});
        var checklength = $(this).val().length;
        if(checklength){ $(".bt-add-com").css({opacity:1}); }
     });
 
     /* on clic  on the cancel button */
     $('.bt-cancel-com').click(function(){
         $('.the-new-com').val('');
         $('.new-com-cnt').fadeOut('fast', function(){
             $('.new-com-bt').fadeIn('fast');
         });
     });
 
     // on post comment click 
     $('.bt-add-com').click(function(){
         var theCom = $('.the-new-com');
         var theName = $('#name-com');
         var theMail = $('#mail-com');
 
         if( !theCom.val()){ 
             alert('You need to write a comment!'); 
         }else{ 
             $.ajax({
                 type: "POST",
                 url: "ajax/add-comment.php",
                 data: 'act=add-com&id_post='+<?php echo $id_post; ?>+'&name='+theName.val()+'&email='+theMail.val()+'&comment='+theCom.val(),
                 success: function(html){
                     theCom.val('');
                     theMail.val('');
                     theName.val('');
                     $('.new-com-cnt').hide('fast', function(){
                         $('.new-com-bt').show('fast');
                         $('.new-com-bt').before(html);  
                     })
                 }  
             });
         }
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
      Problem 4


    </h1> </bold></div>
   
    <div class="panel-body">


<!-- CANVASAS FOR EACH OF YOUR CLASSES -->



  <div class="col">


    <div class="jumbotron jumbotron-fluid">
  <div class="container">
    
    <p class="lead">

        
      <?php 
      $conn = oci_connect('breckenridrw', 'V00637965' ,'localhost:20037/xe');

      if(!$conn) {
        $m = oci_error();
        echo "Connection Unsuccessful!";
        exit;
      }else{




          $sql="SELECT problem, description, answer FROM puzzle
              WHERE ID='4'";
          //$sql = "SELECT * FROM user_info";


          $results=oci_parse($conn, $sql);
          oci_execute($results);
          $res = oci_fetch_array($results);
          
          //var_dump($res);


         

        

       
        $problem = $res[0];
        $answer = $res[2];
        $description = $res[1];
          
        echo "Description";
        echo "<br>";
        echo $description;
        echo "<br>";
        echo "Problem";
        echo "<br>";
        echo $problem;
       

       


        $answer = $res[0];
        $problem = $res[1];
        $description = $res[2];

        $user_input = $_POST['responce'];
        //echo $user_input;
        //echo strlen($user_input);
     
        $user_answer_update = "UPDATE user_answer
                                SET user_answer = '$user_input'
                                WHERE ID ='1'";



        $user_answer_update_results = oci_parse($conn, $user_answer_update);

        oci_execute( $user_answer_update_results);




     
        $user_answer_select = "SELECT  user_answer FROM user_answer
                                    WHERE ID ='1'";
        $user_answer_insert_select = oci_parse($conn, $user_answer_select);

        oci_execute( $user_answer_insert_select);





         $user_input_from_DB = oci_fetch_array($user_answer_insert_select);
         $user_input_check =  $user_input_from_DB[0];

        
        $temp1 = trim($user_input_check);
        $temp2 = trim($res['ANSWER']);
        
        
          if($temp1===$temp2) {
            
            
         echo file_get_contents("public_html/standard/responce_answer/correct_answer.php");
            echo  file_get_contents("public_html/standard/linkToNext/linkToProblem5.php");

            
           
              
            } else{
          echo file_get_contents("public_html/standard/responce_answer/incorrect_answer.php");
            
          } 
          
      }
         
?>



<form action="public_html/standard/problem_responce/problem4_responce.php" method="post">
      <textarea name="responce" rows="1" cols="100"> </textarea>

      <!-- <input type="text" name="responce"> -->
     <input type="submit" value="Submit">
  </form>








</div>
</div> 

<!-- END FORM -->


</body>
</html>