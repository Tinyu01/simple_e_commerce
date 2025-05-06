<!DOCTYPE html>
<html lang="en"> 
<head>
  <title>Add Device | AteuMart Admin</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  
  <style>
    body {
      font-family: 'Inter', sans-serif;
      background-color: #f9fafb;
    }
    
    .form-input:focus {
      box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.25);
    }
    
    .form-card {
      background: white;
      border-radius: 16px;
      box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.05);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    
    .form-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 20px 30px -10px rgba(0, 0, 0, 0.08);
    }
    
    .submit-btn {
      background: linear-gradient(135deg, #4f46e5 0%, #3b82f6 100%);
      transition: all 0.3s ease;
    }
    
    .submit-btn:hover {
      background: linear-gradient(135deg, #4338ca 0%, #2563eb 100%);
      transform: translateY(-2px);
      box-shadow: 0 10px 15px -3px rgba(59, 130, 246, 0.3);
    }

    .file-input-wrapper {
      position: relative;
      overflow: hidden;
      display: inline-block;
      width: 100%;
    }

    .file-input-wrapper input[type=file] {
      position: absolute;
      left: 0;
      top: 0;
      opacity: 0;
      width: 100%;
      height: 100%;
      cursor: pointer;
    }

    .file-upload-btn {
      display: flex;
      align-items: center;
      justify-content: center;
      border: 2px dashed #e2e8f0;
      border-radius: 0.5rem;
      padding: 2rem;
      text-align: center;
      transition: all 0.3s ease;
    }

    .file-upload-btn:hover {
      border-color: #3b82f6;
      background-color: rgba(59, 130, 246, 0.05);
    }

    .file-name {
      margin-top: 0.5rem;
      font-size: 0.875rem;
      color: #6b7280;
    }
  </style>
</head>

<body> 
  <div class="min-h-screen py-12 px-4 sm:px-6 lg:px-8 flex items-center justify-center">
    <div class="form-card w-full max-w-md p-8">
      <div class="flex items-center justify-center mb-8">
        <div class="bg-indigo-100 rounded-full p-3">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
          </svg>
        </div>
      </div>
      
      <h1 class="text-2xl font-bold text-gray-800 text-center mb-8">Add New Device</h1>
      
      <form method="post" enctype="multipart/form-data" class="space-y-6">  
        <div>
          <label for="pname" class="block text-sm font-medium text-gray-700 mb-1">Product Name</label>
          <input 
            type="text" 
            id="pname" 
            placeholder="Enter product name" 
            name="pname" 
            required
            class="form-input block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
          >
        </div>
        
        <div>
          <label for="pimage" class="block text-sm font-medium text-gray-700 mb-1">Product Image</label>
          <div class="file-input-wrapper">
            <div class="file-upload-btn">
              <div class="text-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                <p class="mt-1 text-sm text-gray-600">Click or drag image here to upload</p>
              </div>
            </div>
            <input type="file" name="pimage" id="pimage" required class="hidden">
            <p class="file-name"></p>
          </div>
        </div>
        
        <div>
          <label for="pprice" class="block text-sm font-medium text-gray-700 mb-1">Product Price</label>
          <div class="relative rounded-md shadow-sm">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
              <span class="text-gray-500 sm:text-sm">$</span>
            </div>
            <input 
              type="text" 
              id="pprice" 
              placeholder="0.00" 
              name="pprice" 
              required
              class="form-input block w-full pl-7 px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
            >
          </div>
        </div>
        
        <div>
          <button 
            type="submit" 
            name="submit" 
            class="submit-btn w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-base font-medium text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
          >
            <span>Add Device</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 1.414L10.586 9H7a1 1 0 100 2h3.586l-1.293 1.293a1 1 0 101.414 1.414l3-3a1 1 0 000-1.414z" clip-rule="evenodd" />
            </svg>
          </button>
        </div>
      </form>
      
      <div class="mt-6 text-center">
        <a href="product_manage.php" class="text-indigo-600 hover:text-indigo-800 text-sm font-medium">
          Back to Product Management
        </a>
      </div>
    </div>
  </div>

  <script>
    // Show file name once selected
    document.getElementById('pimage').addEventListener('change', function(e) {
      const fileName = e.target.files[0]?.name;
      if (fileName) {
        document.querySelector('.file-name').textContent = fileName;
      }
    });
  </script>
</body>
</html>

<?php 
session_start();
$conn = mysqli_connect("localhost", "root", "", "ecommerce");

if(isset($_SESSION['login']) && $_SESSION['login'] != "") { 
    if(isset($_POST['submit'])) { 
        $catname = "device";
        $pname = mysqli_real_escape_string($conn, $_POST['pname']);
        
        // Handle file upload
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["pimage"]["name"]);
        $uploadOk = 1;
        
        // Check if file already exists
        if (file_exists($target_file)) {
            $uploadOk = 0;
        }
        
        // Check file size
        if ($_FILES["pimage"]["size"] > 5000000) { // 5MB max
            $uploadOk = 0;
        }
        
        // Allow certain file formats
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
            $uploadOk = 0;
        }
        
        if ($uploadOk == 1) {
            move_uploaded_file($_FILES["pimage"]["tmp_name"], $target_file);
            $pimage = $target_file;
        } else {
            $pimage = $_POST['pimage']; // Fallback to the old behavior
        }
        
        $pprice = mysqli_real_escape_string($conn, $_POST['pprice']);
        
        mysqli_query($conn, "INSERT INTO product_demo(category_name, image, product_name, price) VALUES('$catname', '$pimage', '$pname', '$pprice')");
        
        echo '<script type="text/JavaScript"> 
            alert("Product Added Successfully"); 
            window.location = "product_manage.php"; 
        </script>';
        die();
    }
} else {
    header('location:login.php');
    die();
}
?>