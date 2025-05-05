<!DOCTYPE html>
<html> 
<head> 
  <title>registeration page</title>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scaled=1">
	
	<style>
      .register {
		  background-color:#E8E8E8;
		  border-radius:30px;
	  }
	  .register h1{
		  text-align:center;
	  }
	  
	  .register label {
		  color:red;
		  font-size:25px;
		  margin-left:20px;
	  }
	  
	  .register input {
		  width:100%;
		  padding:12px 20px;
		  box-sizing:border-box;
		  margin:8px 0;
	  }
	  
	  .register button {
		  width:50%;
		  margin:0 25%;
		  font-size:25px;
		  background-color:#4CAF50;
		  color:white;
		  border:none:
		  padding:12px 20px;
	  }
	  
	  .register p {
		  margin-left:20px;
	  }
	  
	  .register a {
		  color:red;
		  font-size:25px;
	  }
	  
	  </style>
	
</head>
      <body>
      <div class="register"> 
      <h1>Registeration Form</h1>
		
	  <form method="post">
		
	  <label><b>Username</b></label>
	  <input type="text" name="name" placeholder="Enter Username..." required>
	  
	  <label><b>Password</b></label>
	  <input type="password" name="password" placeholder="Enter password..." required>
	  
	  <label><b>Confirm Password</b></label>
	  <input type="password" name="confirmpassword" placeholder="Enter password..." required>
	  
	  <button type="submit" name="submit">Register</button>
		</form>
		<p>Already have an account?<a href="login.php">Sign In</a></p>
		</div>
	  </body>
</html>

   <?php 
     
	 $conn=mysqli_connect("localhost","root","","ecommerce");
	 
	  if(isset($_POST['submit'])) {
		   $name=mysqli_real_escape_string($conn, $_POST['name']);
		   $psw=mysqli_real_escape_string($conn, $_POST['password']);
		   $cpsw=mysqli_real_escape_string($conn, $_POST['confirmpassword']);
		 
		   if($psw == $cpsw) 
		   {
			   $sql="select * from adminlogin where username='$name'";
			   $res=mysqli_query($conn,$sql);
			   $count=mysqli_num_rows($res);
			
		       if($count == 0) {
				  mysqli_query($conn,"insert into adminlogin(username,password) values('$name','$psw')");
				
			      echo '<script type="text/Javascript">
				       alert("Username Registered Successfully");
					   window.location="login.php";
				       </script>';	   
			    }	
			    else
			   {
				   echo '<script type="text/Javascript">alert("Username Already Exists");</script>';
			   }
		    }
		   else 
		   {
			 echo '<script type="text/Javascript">alert("Password Did Not Matching. Please Try Again...");</script>';
		   } 
	  } 
   ?>