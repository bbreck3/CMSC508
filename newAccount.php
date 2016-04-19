
<?php
$uname =$_POST['u_name'];
$password =$_POST['password'];
$cpassword = $_POST['cpassword'];
$email = $_POST['email'];


echo nl2br("Debug-->\nPrinting info: \nUserName:  .$uname. \n Password: .$password. \n CPassword: .$cpassword.\n Email: .$email. \n Information Proccessed");
echo nl2br("To impliment:--> \n connect to and insert info into  database \n Security: password using one way hash ");










//header('Location: dashboard.html'); 

?>

