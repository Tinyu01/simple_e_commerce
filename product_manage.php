<?php 
   session_start();
   $conn = mysqli_connect("localhost", "root", "", "ecommerce");
   $query = "SELECT * FROM product_demo";
   $result = mysqli_query($conn, $query);
   $count = mysqli_num_rows($result);
   
   if(isset($_SESSION['login']) && ($_SESSION['login'] != "")) {
       // User is logged in
   } else {
       header('location:login.php');
       die();
   }
   
   // Truncating Product_demo after all products are deleted from the table
   if($count == 0) {
       $trun = "TRUNCATE TABLE product_demo";
       mysqli_query($conn, $trun);
       echo '<script type="text/Javascript">
               const toast = document.createElement("div");
               toast.className = "toast toast-error";
               toast.innerHTML = "Product table is empty";
               document.body.appendChild(toast);
               setTimeout(() => toast.classList.add("show"), 100);
               setTimeout(() => {
                 toast.classList.remove("show");
                 setTimeout(() => toast.remove(), 300);
               }, 3000);
             </script>';
   }
   
   if(isset($_GET['action']) && ($_GET['action'] != "")) {
       $type = mysqli_real_escape_string($conn, $_GET['action']);
       
       if($type == 'delete') { 
           $id = $_GET['id'];
           $delete_query = "DELETE FROM product_demo WHERE id='$id'";
           mysqli_query($conn, $delete_query);
           
           // Refresh web page
           header('location:product_manage.php');
           die();
       }  
   }
?>

<!DOCTYPE html>
<html lang="en"> 
<head>
  <title>Product Management Dashboard</title>
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
      --danger-dark: #dc2626;
      --warning: #f59e0b;
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
    }
    
    /* Header & Navigation */
    .header {
      background-color: var(--bg-white);
      box-shadow: var(--shadow);
      padding: 1rem 2rem;
      display: flex;
      align-items: center;
      justify-content: space-between;
      position: sticky;
      top: 0;
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
    
    .logout-btn {
      padding: 0.5rem 1.25rem;
      background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
      color: white;
      border-radius: 8px;
      font-weight: 500;
      text-decoration: none;
      transition: all 0.3s ease;
      border: none;
      display: flex;
      align-items: center;
      gap: 0.5rem;
      font-size: 0.875rem;
    }
    
    .logout-btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 10px 15px -3px rgba(239, 68, 68, 0.3);
    }
    
    /* Main Container */
    .container {
      max-width: 1280px;
      margin: 2rem auto;
      padding: 0 1rem;
    }
    
    /* Category Sections */
    .category {
      background-color: var(--bg-white);
      border-radius: 12px;
      box-shadow: var(--shadow);
      padding: 1.5rem;
      margin-bottom: 2rem;
      overflow: hidden;
    }
    
    .category-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding-bottom: 1rem;
      border-bottom: 1px solid var(--border-light);
      margin-bottom: 1.5rem;
    }
    
    .category-title {
      font-size: 1.25rem;
      font-weight: 600;
      color: var(--text-primary);
      display: flex;
      align-items: center;
      gap: 0.5rem;
    }
    
    .add-product-btn {
      padding: 0.5rem 1rem;
      background: linear-gradient(135deg, #4f46e5 0%, #3b82f6 100%);
      color: white;
      border-radius: 8px;
      font-weight: 500;
      text-decoration: none;
      transition: all 0.3s ease;
      border: none;
      display: flex;
      align-items: center;
      gap: 0.5rem;
      font-size: 0.875rem;
    }
    
    .add-product-btn:hover {
      background: linear-gradient(135deg, #4338ca 0%, #2563eb 100%);
      transform: translateY(-2px);
      box-shadow: 0 10px 15px -3px rgba(59, 130, 246, 0.3);
    }
    
    /* Table Styles */
    .product-table {
      width: 100%;
      border-collapse: collapse;
    }
    
    .product-table th {
      background-color: var(--bg-light);
      color: var(--text-secondary);
      font-weight: 500;
      font-size: 0.875rem;
      text-transform: uppercase;
      letter-spacing: 0.05em;
      padding: 0.75rem 1rem;
      text-align: left;
      border-bottom: 1px solid var(--border-light);
    }
    
    .product-table td {
      padding: 1rem;
      border-bottom: 1px solid var(--border-light);
      font-size: 0.95rem;
      vertical-align: middle;
    }
    
    .product-table tr:last-child td {
      border-bottom: none;
    }
    
    .product-table tr:hover td {
      background-color: rgba(79, 70, 229, 0.05);
    }
    
    .product-img {
      width: 60px;
      height: 60px;
      object-fit: cover;
      border-radius: 8px;
      box-shadow: var(--shadow-sm);
    }
    
    .product-name {
      font-weight: 500;
      color: var(--text-primary);
    }
    
    .product-price {
      font-weight: 600;
      color: var(--text-primary);
    }
    
    .delete-btn {
      padding: 0.4rem 0.8rem;
      background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
      color: white;
      border-radius: 6px;
      font-weight: 500;
      text-decoration: none;
      transition: all 0.3s ease;
      border: none;
      display: inline-flex;
      align-items: center;
      gap: 0.25rem;
      font-size: 0.75rem;
    }
    
    .delete-btn:hover {
      background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%);
      transform: translateY(-1px);
      box-shadow: 0 4px 6px -1px rgba(239, 68, 68, 0.2);
    }
    
    /* Empty State */
    .empty-state {
      padding: 2rem;
      text-align: center;
      color: var(--text-tertiary);
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
    }
    
    .toast.show {
      transform: translateY(0);
      opacity: 1;
    }
    
    .toast-error {
      background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
    }
    
    .toast-success {
      background: linear-gradient(135deg, #10b981 0%, #059669 100%);
    }
    
    /* Responsive Design */
    @media (max-width: 768px) {
      .header {
        padding: 1rem;
      }
      
      .container {
        padding: 0.5rem;
        margin: 1rem auto;
      }
      
      .category {
        padding: 1rem;
        margin-bottom: 1rem;
      }
      
      .product-table th:nth-child(1),
      .product-table td:nth-child(1) {
        display: none;
      }
      
      .delete-btn {
        padding: 0.3rem 0.6rem;
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
      <a href="logout.php" class="logout-btn">
        <i class="fas fa-sign-out-alt"></i>
        Logout
      </a>
    </header>

    <div class="container">
        <!-- FASHION CATEGORY -->
        <section class="category">
            <div class="category-header">
                <h2 class="category-title">
                    <i class="fas fa-tshirt"></i>
                    Fashion
                </h2>
                <a href="add_fashion.php" class="add-product-btn">
                    <i class="fas fa-plus"></i>
                    Add Product
                </a>
            </div>
            
            <table class="product-table">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                $query = "SELECT * FROM product_demo WHERE category_name='fashion'";
                $result = mysqli_query($conn, $query);
                $count = mysqli_num_rows($result);
                
                if($count > 0) {
                    while($row = mysqli_fetch_array($result)) {
                    ?>
                        <tr> 
                            <td>
                                <img src="<?php echo $row['image']; ?>" class="product-img" alt="Product Image">
                            </td>
                            <td class="product-name"><?php echo $row['product_name']; ?></td>
                            <td class="product-price">$<?php echo $row['price']; ?></td>
                            <td>
                                <a href="?action=delete&id=<?php echo $row['id']; ?>" class="delete-btn">
                                    <i class="fas fa-trash-alt"></i>
                                    Delete
                                </a>
                            </td>
                        </tr>
                    <?php
                    }
                } else {
                    echo '<tr><td colspan="4" class="empty-state">No fashion products added yet</td></tr>';
                }
                ?>
                </tbody>
            </table>
        </section>
        
        <!-- TOYS CATEGORY -->
        <section class="category">
            <div class="category-header">
                <h2 class="category-title">
                    <i class="fas fa-gamepad"></i>
                    Toys
                </h2>
                <a href="add_toys.php" class="add-product-btn">
                    <i class="fas fa-plus"></i>
                    Add Toy
                </a>
            </div>
            
            <table class="product-table">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                $query = "SELECT * FROM product_demo WHERE category_name='toys'";
                $result = mysqli_query($conn, $query);
                $count = mysqli_num_rows($result);
                
                if($count > 0) {
                    while($row = mysqli_fetch_array($result)) {
                    ?>
                        <tr> 
                            <td>
                                <img src="<?php echo $row['image']; ?>" class="product-img" alt="Product Image">
                            </td>
                            <td class="product-name"><?php echo $row['product_name']; ?></td>
                            <td class="product-price">$<?php echo $row['price']; ?></td>
                            <td>
                                <a href="?action=delete&id=<?php echo $row['id']; ?>" class="delete-btn">
                                    <i class="fas fa-trash-alt"></i>
                                    Delete
                                </a>
                            </td>
                        </tr>
                    <?php
                    }
                } else {
                    echo '<tr><td colspan="4" class="empty-state">No toys added yet</td></tr>';
                }
                ?>
                </tbody>
            </table>
        </section>
        
        <!-- DEVICES CATEGORY -->
        <section class="category">
            <div class="category-header">
                <h2 class="category-title">
                    <i class="fas fa-mobile-alt"></i>
                    Devices
                </h2>
                <a href="add_device.php" class="add-product-btn">
                    <i class="fas fa-plus"></i>
                    Add Device
                </a>
            </div>
            
            <table class="product-table">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                $query = "SELECT * FROM product_demo WHERE category_name='device'";
                $result = mysqli_query($conn, $query);
                $count = mysqli_num_rows($result);
                
                if($count > 0) {
                    while($row = mysqli_fetch_array($result)) {
                    ?>
                        <tr> 
                            <td>
                                <img src="<?php echo $row['image']; ?>" class="product-img" alt="Product Image">
                            </td>
                            <td class="product-name"><?php echo $row['product_name']; ?></td>
                            <td class="product-price">$<?php echo $row['price']; ?></td>
                            <td>
                                <a href="?action=delete&id=<?php echo $row['id']; ?>" class="delete-btn">
                                    <i class="fas fa-trash-alt"></i>
                                    Delete
                                </a>
                            </td>
                        </tr>
                    <?php
                    }
                } else {
                    echo '<tr><td colspan="4" class="empty-state">No devices added yet</td></tr>';
                }
                ?>
                </tbody>
            </table>
        </section>
    </div>
</body>
</html>