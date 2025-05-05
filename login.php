<!DOCTYPE html>
<html>
<head>

<meta name="viewport" content="width=device-width,initial-scale=1">

</head>

<style> 
.login {
	 background-color:#E8E8E8;
 }
 
 .login h1 {
	 text-align:center;
 }
 
 .login label {
	 margin-left:20px;
	 font-size:20px;
	 color:red;
 }
 
 .login input {
	 width:100%;
	 padding:10px 20px;
	 margin:8px 0;
	 box-sizing:border-box;
 }
 
 .login button {
    width:50%;
	margin:0 25%;
	font-size:25px;
	background-color:#4CAF50;
	color:white;
	border:none;
	padding:12px 20px;
 }
 
 p{
	 margin-left:20px;
 }
 
 a{
	 color:red;
	 font-size:20px;
 
</style> 
 
 <body> 
    <div class="login"> 
     <h1>Login Form</h1>
	 <form method="post">
	 <label><b>Username</b></label>
	 <input type="text" placeholder="Enter Username..." name="name" required>
	
	 <label><b>Password</b></label>
	 <input type="password" placeholder="Enter Password..." name="password" required>
	
	 <button type="Submit" name="submit">Login</button>
	 </form>
	 <P>New here? <a href="register.php"> Register Here</a> </p>
     </div>
 </body>
 
</html>

<?php
  session_start();
  $conn=mysqli_connect("localhost","root","","ecommerce");
  if(isset($_POST['submit']))
  {
    $username=mysqli_real_escape_string($conn,$_POST['name']);
    $password=mysqli_real_escape_string($conn,$_POST['password']);
   
    $sql="select * from adminlogin where username='$username' and password='$password'";
    $res=mysqli_query($conn,$sql);
    $count=mysqli_num_rows($res);
   
    if($count>0)
    {
	   $_SESSION['login']='yes';
	   $_SESSION['username']=$username;
	   
	   header('location:product_manage.php');
	   die();
	   
    }
    else
    {
	    echo '<script type="text/Javascript">alert("Please enter the correct Username or Password");</script>';
	}
	
  }
?>