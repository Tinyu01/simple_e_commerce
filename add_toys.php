<!DOCTYPE html>
<html>
<head>
  <title>Add Toys</title>
  <meta charset="utf8">
  <meta name="viewport" content="width=device-width,initial-scale=1"> 
  
  <style> 
    .addproduct{
	   background-color:#E8E8E8;
     }
  
    .addproduct h1{
         text-align: center;
	    }
	
    .addproduct label {
		    margin-left: 20px;
            font-size: 20px;
			color: red;
	   }	
	   
	.addproduct input { 
	        width:100%;
	        padding:12px 20px; 
            margin:8px 0;
			box-sizing:border-box;
			border:1px solid #ccc;
	   } 
	   
	.addproduct button {
            width:50%;
            margin: 0 25%;
            font-size:25px;
            padding: 12px 20px;
			color:white;
			border:none;
			background-color: #4CAF50;
	  }	   
	  
  </style>
  
</head>

<body>
  <div class="addproduct"> 
     <h1>Add Toy</h1>
	  
	  <form method="post" > 
	  
	     <label><b>Product Name</b></label>
		 <input type="text" placeholder="Enter Prodct Name" name="pname" required>
		 
		 <label><b>Product Image</b></label>
		 <input type="file" name="pimage" required>
		 
		 <label><b>Product price</b></label>
		 <input type="text" placeholder="Enter Price" name="pprice" required>
		 
		 <button type="submit" name="submit">Insert</button>
	  
	  </form> 
	  
  </div>
 </body>
 
</html>

    <?php 
	
	session_start();
	$conn=mysqli_connect("localhost","root","","ecommerce");
     	
    if(isset($_SESSION['login'])&&($_SESSION['login']!="")) {
		
		if(isset($_POST['submit'])) {
			$catname="toys";	
            $pname=mysqli_real_escape_string($conn,$_POST['pname']);
			$pimage=mysqli_real_escape_string($conn,$_POST['pimage']);
			$pprice=mysqli_real_escape_string($conn,$_POST['pprice']);
			
			mysqli_query($conn,"insert into product_demo(category_name,image,product_name,price) value('$catname','$pimage','$pname','$pprice')");
			
			echo '<script type="text/JavaScript"> alert("Product Added Successfully"); window.location= "product_manage.php" ; </script>';
			die();
		}	
		
    }
	else
    {
	  header('localhost:login.php');
	  die();
	}  
		
    ?>