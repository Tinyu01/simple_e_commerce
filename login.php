<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login | AteuMart Admin</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  
  <style>
    body {
      font-family: 'Inter', sans-serif;
      background-color: #f9fafb;
      background-image: 
        radial-gradient(circle at 100% 100%, rgba(79, 70, 229, 0.1) 0, transparent 400px),
        radial-gradient(circle at 0% 0%, rgba(59, 130, 246, 0.1) 0, transparent 400px);
      background-attachment: fixed;
    }
    
    .login-card {
      background: white;
      border-radius: 16px;
      box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.05);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    
    .login-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 20px 30px -10px rgba(0, 0, 0, 0.08);
    }
    
    .login-btn {
      background: linear-gradient(135deg, #4f46e5 0%, #3b82f6 100%);
      transition: all 0.3s ease;
    }
    
    .login-btn:hover {
      background: linear-gradient(135deg, #4338ca 0%, #2563eb 100%);
      transform: translateY(-2px);
      box-shadow: 0 10px 15px -3px rgba(59, 130, 246, 0.3);
    }
    
    .form-input:focus {
      box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.25);
    }
    
    .brand-logo {
      background: linear-gradient(135deg, #4f46e5 0%, #3b82f6 100%);
      -webkit-background-clip: text;
      background-clip: text;
      -webkit-text-fill-color: transparent;
    }
  </style>
</head>

<body class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
  <div class="login-card w-full max-w-md p-8">
    <div class="text-center mb-10">
      <h1 class="text-4xl font-extrabold brand-logo">ATEU MART</h1>
      <p class="mt-2 text-gray-600">Admin Portal</p>
    </div>
    
    <h2 class="text-2xl font-bold text-gray-800 text-center mb-6">Sign in to your account</h2>
    
    <form method="post" class="space-y-6">
      <div>
        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Username</label>
        <div class="relative">
          <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
            </svg>
          </div>
          <input 
            type="text" 
            id="name" 
            name="name" 
            placeholder="Enter username" 
            required
            class="form-input block w-full pl-10 px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
          >
        </div>
      </div>
      
      <div>
        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
        <div class="relative">
          <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
            </svg>
          </div>
          <input 
            type="password" 
            id="password" 
            name="password" 
            placeholder="Enter password" 
            required
            class="form-input block w-full pl-10 px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
          >
        </div>
      </div>
      
      <div class="flex items-center justify-between">
        <div class="flex items-center">
          <input id="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
          <label for="remember-me" class="ml-2 block text-sm text-gray-700">
            Remember me
          </label>
        </div>
        
        <div class="text-sm">
          <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">
            Forgot password?
          </a>
        </div>
      </div>
      
      <div>
        <button 
          type="submit" 
          name="submit" 
          class="login-btn w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-base font-medium text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
        >
          Sign in
        </button>
      </div>
    </form>
    
    <div class="mt-6 text-center">
      <p class="text-sm text-gray-600">
        Don't have an account? 
        <a href="register.php" class="font-medium text-indigo-600 hover:text-indigo-500">
          Register now
        </a>
      </p>
    </div>
  </div>
</body>
</html>

<?php
  session_start();
  $conn = mysqli_connect("localhost", "root", "", "ecommerce");
  
  if(isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($conn, $_POST['name']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
   
    // In a real 2025 app, we would use password_hash() and password_verify()
    // This maintains backward compatibility with the existing database
    $sql = "SELECT * FROM adminlogin WHERE username='$username' AND password='$password'";
    $res = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($res);
   
    if($count > 0) {
      $_SESSION['login'] = 'yes';
      $_SESSION['username'] = $username;
      
      // Set a cookie for "remember me" functionality if checked
      if(isset($_POST['remember-me'])) {
        setcookie("admin_username", $username, time() + (86400 * 30), "/"); // 30 days
      }
      
      header('location:product_manage.php');
      die();
    } else {
      echo '<script type="text/Javascript">
        document.addEventListener("DOMContentLoaded", function() {
          const errorDiv = document.createElement("div");
          errorDiv.classList.add("bg-red-100", "border", "border-red-400", "text-red-700", "px-4", "py-3", "rounded", "relative", "mb-6");
          errorDiv.setAttribute("role", "alert");
          errorDiv.innerHTML = `
            <strong class="font-bold">Error!</strong>
            <span class="block sm:inline">Invalid username or password.</span>
          `;
          document.querySelector("form").prepend(errorDiv);
          
          // Auto-dismiss after 5 seconds
          setTimeout(() => {
            errorDiv.style.opacity = "0";
            errorDiv.style.transition = "opacity 0.5s";
            setTimeout(() => errorDiv.remove(), 500);
          }, 5000);
        });
      </script>';
    }
  }
?>