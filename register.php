<!DOCTYPE html>
<html lang="en"> 
<head> 
  <title>Account Registration</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  
  <style>
    body {
      font-family: 'Inter', sans-serif;
      background-color: #f9fafb;
      background-image: radial-gradient(circle at 100% 100%, rgba(79, 70, 229, 0.1) 0, transparent 400px), 
                        radial-gradient(circle at 0% 0%, rgba(59, 130, 246, 0.1) 0, transparent 400px);
      background-attachment: fixed;
      margin: 0;
      padding: 0;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    
    .container {
      width: 100%;
      max-width: 480px;
      padding: 20px;
    }
    
    .register-card {
      background: white;
      border-radius: 16px;
      box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.05);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      padding: 40px;
      overflow: hidden;
      position: relative;
    }
    
    .register-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 20px 30px -10px rgba(0, 0, 0, 0.08);
    }
    
    .brand-logo {
      font-size: 32px;
      font-weight: 700;
      margin-bottom: 10px;
      background: linear-gradient(135deg, #4f46e5 0%, #3b82f6 100%);
      -webkit-background-clip: text;
      background-clip: text;
      -webkit-text-fill-color: transparent;
    }
    
    .register-card h1 {
      font-size: 24px;
      font-weight: 600;
      color: #111827;
      margin-bottom: 30px;
    }
    
    .form-group {
      margin-bottom: 24px;
    }
    
    .form-label {
      display: block;
      font-size: 14px;
      font-weight: 500;
      color: #374151;
      margin-bottom: 8px;
    }
    
    .form-input {
      width: 100%;
      padding: 12px 16px;
      border-radius: 10px;
      border: 1px solid #e5e7eb;
      background-color: #f9fafb;
      font-size: 15px;
      color: #111827;
      transition: all 0.3s ease;
      box-sizing: border-box;
    }
    
    .form-input:focus {
      outline: none;
      border-color: #3b82f6;
      box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.25);
      background-color: #ffffff;
    }
    
    .form-input::placeholder {
      color: #9ca3af;
    }
    
    .register-btn {
      width: 100%;
      padding: 14px;
      font-size: 16px;
      font-weight: 500;
      color: white;
      background: linear-gradient(135deg, #4f46e5 0%, #3b82f6 100%);
      border: none;
      border-radius: 10px;
      cursor: pointer;
      transition: all 0.3s ease;
      margin-top: 10px;
    }
    
    .register-btn:hover {
      background: linear-gradient(135deg, #4338ca 0%, #2563eb 100%);
      transform: translateY(-2px);
      box-shadow: 0 10px 15px -3px rgba(59, 130, 246, 0.3);
    }
    
    .sign-in-link {
      text-align: center;
      margin-top: 24px;
      font-size: 15px;
      color: #6b7280;
    }
    
    .sign-in-link a {
      color: #3b82f6;
      font-weight: 500;
      text-decoration: none;
      transition: color 0.2s ease;
    }
    
    .sign-in-link a:hover {
      color: #4f46e5;
      text-decoration: underline;
    }
    
    .alert {
      padding: 14px;
      border-radius: 10px;
      margin-bottom: 20px;
      font-size: 14px;
      font-weight: 500;
    }
    
    .alert-success {
      background-color: #ecfdf5;
      color: #047857;
      border: 1px solid #a7f3d0;
    }
    
    .alert-error {
      background-color: #fef2f2;
      color: #b91c1c;
      border: 1px solid #fecaca;
    }
    
    @media (max-width: 640px) {
      .container {
        padding: 16px;
      }
      
      .register-card {
        padding: 30px 20px;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="register-card">
      <div class="brand-logo">YourBrand</div>
      <h1>Create your account</h1>
      
      <?php
      $conn = mysqli_connect("localhost", "root", "", "ecommerce");
      
      if (isset($_POST['submit'])) {
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $psw = mysqli_real_escape_string($conn, $_POST['password']);
        $cpsw = mysqli_real_escape_string($conn, $_POST['confirmpassword']);
        
        if ($psw == $cpsw) {
          $sql = "SELECT * FROM adminlogin WHERE username='$name'";
          $res = mysqli_query($conn, $sql);
          $count = mysqli_num_rows($res);
          
          if ($count == 0) {
            mysqli_query($conn, "INSERT INTO adminlogin(username, password) VALUES('$name', '$psw')");
            
            echo '<div class="alert alert-success">
                    Account created successfully! Redirecting you to login...
                  </div>';
            
            echo '<script type="text/Javascript">
                    setTimeout(function() {
                      window.location = "login.php";
                    }, 2000);
                  </script>';
          } else {
            echo '<div class="alert alert-error">
                    This username is already taken. Please try another one.
                  </div>';
          }
        } else {
          echo '<div class="alert alert-error">
                  Passwords don\'t match. Please try again.
                </div>';
        }
      }
      ?>
      
      <form method="post">
        <div class="form-group">
          <label class="form-label" for="username">Username</label>
          <input class="form-input" type="text" id="username" name="name" placeholder="Enter your username" required>
        </div>
        
        <div class="form-group">
          <label class="form-label" for="password">Password</label>
          <input class="form-input" type="password" id="password" name="password" placeholder="Create a password" required>
        </div>
        
        <div class="form-group">
          <label class="form-label" for="confirmpassword">Confirm Password</label>
          <input class="form-input" type="password" id="confirmpassword" name="confirmpassword" placeholder="Confirm your password" required>
        </div>
        
        <button type="submit" name="submit" class="register-btn">Create Account</button>
      </form>
      
      <div class="sign-in-link">
        Already have an account? <a href="login.php">Sign in</a>
      </div>
    </div>
  </div>
</body>
</html>