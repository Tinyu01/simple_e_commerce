<DOCTYPE html>
<html>

   <head>
   
     <title>ateu  mart</title>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width,initial-scale=">
	  
   </head>
   
     <style> 
	 
	 .header {
		 background-color:#00BFFF;
	 }
	 
	 .logo {
		 vertical-align:middle;
		 width:60px;
		 height:60px;
	 }
	 
	 .header a {
		 font-size:20px;
		 color:#f1f1f1;
		 padding:10px;
	 }
	 
	 .nav ul {
		 list-style-type:none;
		 background-color:#696969;
		 margin:0;
		 padding:0;
		 overflow:hidden;
	 }
	 
	 .nav .categories {
		 float:left;
		 padding:14px 16px;
	 }
	 .nav .addtocart {
		 float:right;
	 }
	 
	 .nav .categories a {
		 color:white;
		 text-decoration:none;
	 }
	 
	  .nav .addtocart a {
		 color:red;
		 display:block;
		 background-color:white;
		 padding:14px 16px;
		 margin-right:20px;
		 text-decoration:none;
		 font-size:20px;
	 }
	 
	 .slideshow .image {
		width:100%;
	   	height:auto;
	 }
	 
	 .items .categoryheading {
	     background-color:#00BFFF;
		 padding:0;
		 margin:0;
		 font-size:30px;
		 text-align:center;
		 color:white;
	 }
	 
	.gridcontents {
         display:grid;
		 grid-template-columns:auto auto auto auto;
	}

    .griditem {
         text-align:center;
		 margin:10px;
	}		 
	 
	.griditem a {
		 text-decoration:none;
		 background-color:orange;
	     font-size:25px;
		 padding:5px 8px;
	 }
	 
	 </style>
	 
	  <body>
	  
	  <!-- header -->
	   <div class="header">
	   <a href="add_toys.php"><img class="logo" src="logo.png"> ATEU MART</a>
	   </div>
	   
	    <!-- navigation bar -->
	  	<div class="nav"> 
	      <ul> 
		  		<li class="categories"> <a href="add_fashion.php">Fashion </a> </li>
		  		<li class="categories"> <a href="add_toys.php"> Toys</a> </li>
		  		<li class="categories"> <a href="add_device.php"> Devices</a> </li>
		  
		  		<li class="addtocart"> <a href=""> AddToCart </a> </li>
		  	</ul>
	    </div>
	   
	   <!-- slideshow -->
	   <div class="slideshow"> 
	   <img src="slidephoto1.png" alt="SlideShow" class="image" >
	   </div>
	   
	   <!-- categories -->
	   <div class="items"> 
	   <h1 class="categoryheading">Fashion</h1>
	   <div class="gridcontents"> 
	    <div class="griditem"> 
		<img src="c1.png" width="100" height="100">
		<h2>Pant</h2>
		<h3>R 500.00</h3>
		<a href="">AddToCArt</a>
		</div>
		
		<div class="griditem"> 
		<img src="c2.png" width="100" height="100">
		<h2>Shirt</h2>
		<h3>R 400.00</h3>
		<a href="">AddToCArt</a>
		</div>
		
	   </div>
	   </div>
	   
	   <!-- toys -->
	   <div class="items"> 
	   <h1 class="categoryheading">Toys</h1>
	   <div class="gridcontents"> 
	   
	    <div class="griditem">
		<img src="c6.png" width="100" height="100">
		<h2>Duck</h2>
		<h3>R 100.00<h3>
		<a href="">AddToCArt</a>
		</div>
		
		<div class="griditem">
		<img src="c7.png" width="100" height="100">
		<h2>Pyramid</h2>
		<h3>R 200.00<h3>
		<a href="">AddToCArt</a>
		</div>
		
	   </div>
	   </div>
	   
	   <!-- Devices -->
	   <div class="items"> 
	   <h1 class="categoryheading">Devices</h1>
	   <div class="gridcontents"> 
	   
	    <div class="griditem">
		<img src="c11.png" width="100" height="100">
		<h2>Desktop</h2>
		<h3>R 12000.00<h3>
		<a href="">AddToCArt</a>
		</div>
		
		<div class="griditem">
		<img src="c12.png" width="100" height="100">
		<h2>Camera</h2>
		<h3>R 10000.00<h3>
		<a href="">AddToCArt</a>
		</div>
		
		</div>
	   </div>
	   
	   </div>
	   
	  </body>
	 
</html>