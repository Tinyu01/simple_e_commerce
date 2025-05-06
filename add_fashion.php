<?php 
    session_start();
    $conn = mysqli_connect("localhost", "root", "", "ecommerce");
    
    if(isset($_SESSION['login']) && ($_SESSION['login'] != "")) { 
        
        if(isset($_POST['submit'])) { 
            $catname = "fashion";    
            $pname = mysqli_real_escape_string($conn, $_POST['pname']);
            $pimage = mysqli_real_escape_string($conn, $_POST['pimage']);
            $pprice = mysqli_real_escape_string($conn, $_POST['pprice']);
            
            mysqli_query($conn, "INSERT INTO product_demo(category_name, image, product_name, price) VALUES('$catname', '$pimage', '$pname', '$pprice')");
            
            echo '<script type="text/JavaScript">
                    setTimeout(function() {
                        const toast = document.createElement("div");
                        toast.className = "toast toast-success";
                        toast.innerHTML = "<i class=\"fas fa-check-circle\"></i> Product added successfully";
                        document.body.appendChild(toast);
                        setTimeout(() => toast.classList.add("show"), 100);
                        setTimeout(() => {
                            toast.classList.remove("show");
                            setTimeout(() => {
                                toast.remove();
                                window.location = "product_manage.php";
                            }, 300);
                        }, 2000);
                    }, 500);
                  </script>';
        }
    } else {
        header('location:login.php');
        die();
    }
?>

<!DOCTYPE html>
<html lang="en"> 
<head>
  <title>Add Fashion Product</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

  <style>
    /* Base Styles */
    :root {
      --primary: #4f46e5;
      --primary-light: #818cf8;
      --primary-dark: #4338ca;
      --secondary: #3b82f6;
      --secondary-dark: #2563eb;
      --success: #10b981;
      --danger: #ef4444;
      --text-primary: #111827;
      --text-secondary: #4b5563;
      --text-tertiary: #6b7280;
      --bg-white: #ffffff;
      --bg-light: #f9fafb;
      --border-light: #e5e7eb;
      --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
      --shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
      --shadow-md: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
    }
    
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    
    body {
      font-family: 'Inter', sans-serif;
      background-color: #f9fafb;
      background-image: radial-gradient(circle at 100% 100%, rgba(79, 70, 229, 0.1) 0, transparent 400px), 
                        radial-gradient(circle at 0% 0%, rgba(59, 130, 246, 0.1) 0, transparent 400px);
      background-attachment: fixed;
      color: var(--text-primary);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 2rem 1rem;
    }
    
    /* Header */
    .header {
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      background-color: var(--bg-white);
      box-shadow: var(--shadow);
      padding: 1rem 2rem;
      display: flex;
      align-items: center;
      justify-content: space-between;
      z-index: 100;
    }
    
    .brand-logo {
      font-size: 1.5rem;
      font-weight: 700;
      background: linear-gradient(135deg, #4f46e5 0%, #3b82f6 100%);
      -webkit-background-clip: text;
      background-clip: text;
      -webkit-text-fill-color: transparent;
      display: flex;
      align-items: center;
      gap: 0.5rem;
    }
    
    .back-btn {
      padding: 0.5rem 1rem;
      background: linear-gradient(135deg, #4f46e5 0%, #3b82f6 100%);
      color: white;
      border-radius: 8px;
      font-weight: 500;
      text-decoration: none;
      transition: all 0.3s ease;
      display: flex;
      align-items: center;
      gap: 0.5rem;
      font-size: 0.875rem;
    }
    
    .back-btn:hover {
      background: linear-gradient(135deg, #4338ca 0%, #2563eb 100%);
      transform: translateY(-2px);
      box-shadow: 0 10px 15px -3px rgba(59, 130, 246, 0.3);
    }
    
    /* Product Form Card */
    .container {
      width: 100%;
      max-width: 520px;
    }
    
    .product-card {
      background: white;
      border-radius: 16px;
      box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.05);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      padding: 2rem;
      overflow: hidden;
      position: relative;
    }
    
    .product-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 20px 30px -10px rgba(0, 0, 0, 0.08);
    }
    
    .product-card::before {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 6px;
      background: linear-gradient(135deg, #4f46e5 0%, #3b82f6 100%);
    }
    
    .card-header {
      display: flex;
      align-items: center;
      margin-bottom: 2rem;
    }
    
    .card-icon {
      width: 42px;
      height: 42px;
      background: linear-gradient(135deg, rgba(79, 70, 229, 0.1) 0%, rgba(59, 130, 246, 0.1) 100%);
      border-radius: 10px;
      display: flex;
      align-items: center;
      justify-content: center;
      margin-right: 1rem;
    }
    
    .card-icon i {
      font-size: 1.5rem;
      background: linear-gradient(135deg, #4f46e5 0%, #3b82f6 100%);
      -webkit-background-clip: text;
      background-clip: text;
      -webkit-text-fill-color: transparent;
    }
    
    .card-title {
      font-size: 1.5rem;
      font-weight: 600;
      color: var(--text-primary);
      margin: 0;
    }
    
    /* Form Elements */
    .form-group {
      margin-bottom: 1.5rem;
    }
    
    .form-label {
      display: block;
      font-size: 0.875rem;
      font-weight: 500;
      color: var(--text-secondary);
      margin-bottom: 0.5rem;
    }
    
    .form-input {
      width: 100%;
      padding: 0.75rem 1rem;
      border-radius: 8px;
      border: 1px solid var(--border-light);
      background-color: var(--bg-light);
      font-size: 1rem;
      color: var(--text-primary);
      transition: all 0.3s ease;
    }
    
    .form-input:focus {
      outline: none;
      border-color: var(--secondary);
      box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.25);
      background-color: white;
    }
    
    .form-input::placeholder {
      color: var(--text-tertiary);
    }
    
    .file-input-group {
      position: relative;
    }
    
    .file-input-label {
      display: flex;
      align-items: center;
      justify-content: center;
      width: 100%;
      padding: 0.75rem 1rem;
      border-radius: 8px;
      border: 1px dashed var(--border-light);
      background-color: var(--bg-light);
      font-size: 1rem;
      color: var(--text-secondary);
      cursor: pointer;
      transition: all 0.3s ease;
    }
    
    .file-input-label:hover {
      border-color: var(--secondary);
      background-color: rgba(59, 130, 246, 0.05);
    }
    
    .file-input-label i {
      margin-right: 0.5rem;
      color: var(--secondary);
    }
    
    .file-input {
      position: absolute;
      top: 0;
      left: 0;
      opacity: 0;
      width: 100%;
      height: 100%;
      cursor: pointer;
    }
    
    .submit-btn {
      width: 100%;
      padding: 0.875rem 1.5rem;
      background: linear-gradient(135deg, #4f46e5 0%, #3b82f6 100%);
      color: white;
      border-radius: 8px;
      font-weight: 500;
      font-size: 1rem;
      border: none;
      cursor: pointer;
      transition: all 0.3s ease;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 0.5rem;
    }
    
    .submit-btn:hover {
      background: linear-gradient(135deg, #4338ca 0%, #2563eb 100%);
      transform: translateY(-2px);
      box-shadow: 0 10px 15px -3px rgba(59, 130, 246, 0.3);
    }
    
    /* Toast Notifications */
    .toast {
      position: fixed;
      bottom: 1.5rem;
      right: 1.5rem;
      padding: 1rem 1.5rem;
      border-radius: 8px;
      color: white;
      font-weight: 500;
      box-shadow: var(--shadow-md);
      transform: translateY(20px);
      opacity: 0;
      transition: all 0.3s ease;
      z-index: 1000;
      max-width: 24rem;
      display: flex;
      align-items: center;
      gap: 0.75rem;
    }
    
    .toast.show {
      transform: translateY(0);
      opacity: 1;
    }
    
    .toast-success {
      background: linear-gradient(135deg, #10b981 0%, #059669 100%);
    }
    
    .toast i {
      font-size: 1.25rem;
    }
    
    /* Responsive Design */
    @media (max-width: 640px) {
      .product-card {
        padding: 1.5rem;
      }
      
      .card-title {
        font-size: 1.25rem;
      }
    }
  </style>
</head>
<body> 
    <header class="header">
      <div class="brand-logo">
        <i class="fas fa-store"></i>
        ProductManager
      </div>
      <a href="product_manage.php" class="back-btn">
        <i class="fas fa-arrow-left"></i>
        Back to Products
      </a>
    </header>

    <div class="container">
      <div class="product-card">
        <div class="card-header">
          <div class="card-icon">
            <i class="fas fa-tshirt"></i>
          </div>
          <h1 class="card-title">Add Fashion Product</h1>
        </div>
        
        <form method="post">  
          <div class="form-group">
            <label class="form-label" for="pname">Product Name</label>
            <input type="text" id="pname" class="form-input" placeholder="Enter product name" name="pname" required>
          </div>
          
          <div class="form-group">
            <label class="form-label" for="pimage">Product Image</label>
            <div class="file-input-group">
              <label class="file-input-label">
                <i class="fas fa-cloud-upload-alt"></i>
                <span id="file-name">Choose an image file</span>
              </label>
              <input type="file" id="pimage" class="file-input" name="pimage" required>
            </div>
          </div>
          
          <div class="form-group">
            <label class="form-label" for="pprice">Product Price</label>
            <input type="text" id="pprice" class="form-input" placeholder="Enter product price" name="pprice" required>
          </div>
          
          <button type="submit" class="submit-btn" name="submit">
            <i class="fas fa-plus-circle"></i>
            Add Product
          </button>
        </form>
      </div>
    </div>

    <script>
      // Display selected filename
      document.getElementById('pimage').addEventListener('change', function() {
        const fileName = this.files[0]?.name || 'Choose an image file';
        document.getElementById('file-name').textContent = fileName;
      });
    </script>
</body>
</html>