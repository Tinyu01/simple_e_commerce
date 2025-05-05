
<?php 

   session_start();
    $conn=mysqli_connect("localhost","root","","ecommerce");
    $query="SELECT * FROM product_demo";
	$result=mysqli_query($conn,$query);

    $count=mysqli_num_rows($result);
	
    
   
   
    if(isset($_SESSION['login'])&&($_SESSION['login']!="")) {
	    
	}
    else
    {
	    header('location:login.php');
	    die();
    }
	
	    // Truncating Product_demo after all pr0duct are deleted from the table
		// check if Product_demo has data
	    if($count==0) {
			
		    $trun="TRUNCATE TABLE  product_demo";
		    mysqli_query($conn,$trun);
		  
			echo '<script type="text/Javascript">alert("Table Product Demo Has No Data");</script>';
		}
	
    if(isset($_GET['action'])&&($_GET['action']!="")) {
		
	    $type=mysqli_real_escape_string($conn,$_GET['action']);
		
	    if($type=='delete') { 
		
	        $id=$_GET['id'];
		    $delete_query= "DELETE FROM product_demo WHERE id='$id'";
		    mysqli_query($conn,$delete_query);

		    echo '<script type="text/Javascript">alert("");</script>';
			
			// Refresh web page
		    header('location:product_manage.php');
            die();
	        
			
        }  
    }
	  
?>


<!DOCTYPE html>
<html> 
<head>
<title>Product Manage</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1"> 

  <style>
   .head {
	    background-color:#00BFFF;
		padding:20px;
		text-align: center;
		font-size: 40px;
		color: white;
    }
   
   .logout {
	   float:right;
	   color:red;
    }
   
    .categoty {
	   background-color:lightgray;
	   padding:20px;
	   text-align: center;
	   font-size:30px;
	   color:black;
    }
   
     .add {
		float:right;
		text-decoration:none;
		color:white;
		background-color:red;
		text-align: center;
		font-size:30px;
		border:none;
		padding:5px 8px;
	}	 
	
	table {
		width:100%;
	}
   
    th {
		background-color: #4CAF50;
		color: white;
		font-size: 25px;
		padding: 25px;
		text-align: center;
	}
	
	td { 
	    padding: 25px;
		text-align: center;
		font-size: 20px;
	}
	
	.delete {
		background-color: #f44336;
		text-decoration: none;
		text-align: center;
		font-size: 25px;
		color: white;
		border: none;
		padding: 5px 8px;
	}
	
  </style> 
</head>

<body> 

    <div class="head"> Product Manager 
	<a href="logout.php" class="logout">Logout</a>
	</div>
	
	<div class="categoty"> FASHION 
	   <a href="add_fashion.php" class="add"> Add Product</a>
	</div>
	
    <table>
        <tr>
           <th> Image </th>
		   <th> Product Name</th>
		   <th> Price </th>
		   <th> </th>
		</tr>

    <?php 
	  $query="SELECT * FROM product_demo WHERE category_name='fashion'";
	  
	  $result=mysqli_query($conn,$query);
	  
	  while($row=mysqli_fetch_array($result))
	  {
	  ?>
	      <tr> 
		        <td> <img src=" <?php echo $row['image'];?> " width="100" height="100"> </td>
				<td> <?php echo $row['product_name']; ?> </td>
				<td> <?php echo $row['price']; ?> </td>
				
				<td> <?php echo ' <a href=" ?action=delete&id='.$row["id"].' " class="delete">Delete</a> '; ?> </td>
		  </tr>
	 <?php
	 }
	 ?>

	</table>
	
	<div class="categoty"> TOYS
	   <a href="add_toys.php" class="add"> Add Toy </a>
	</div>
	
	<table>
	
        <tr>
           <th> Image </th>
		   <th> Product Name</th>
		   <th> Price </th>
		   <th> </th>
		</tr>
		
	  <?php 
	  $query="SELECT * FROM product_demo WHERE category_name='toys'";
	  
	  $result=mysqli_query($conn,$query);
	  
	  while($row=mysqli_fetch_array($result))
	  {
	  ?>
	      <tr> 
		        <td> <img src=" <?php echo $row['image'];?> " width="100" height="100"> </td>
				<td> <?php echo $row['product_name']; ?> </td>
				<td> <?php echo $row['price']; ?> </td>
				
				<td> <?php echo '<a href=" ?action=delete&id='.$row["id"].' " class="delete">Delete</a> '; ?> </td>
		  </tr>
	  <?php
	  }
	  ?>
		
	</table>
	
	<div class="categoty"> DEVICES 
	   <a href="add_device.php" class="add"> Device</a>
	</div>
	
    <table>
        <tr>
           <th> Image </th>
		   <th> Product Name</th>
		   <th> Price </th>
		   <th> </th>
		</tr>

    <?php 
	  $query="SELECT * FROM product_demo WHERE category_name='device'";
	  
	  $result=mysqli_query($conn,$query);
	  
	  while($row=mysqli_fetch_array($result))
	  {
	  ?>
	      <tr> 
		        <td> <img src=" <?php echo $row['image'];?> " width="100" height="100"> </td>
				<td> <?php echo $row['product_name']; ?> </td>
				<td> <?php echo $row['price']; ?> </td>
				
				<td> <?php echo ' <a href=" ?action=delete&id='.$row["id"].' " class="delete">Delete</a> '; ?> </td>
		  </tr>
	 <?php
	 }
	 ?>

	</table>
	
</body>

</html>