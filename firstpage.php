<!DOCTYPE html>
<html lang="en">
<head>
  <title>Ateu Mart | Premium Shopping Destination</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
      color: #1f2937;
    }

    /* Header Styles */
    .header {
      background: linear-gradient(135deg, #4f46e5 0%, #3b82f6 100%);
      padding: 1rem 2rem;
      display: flex;
      align-items: center;
      justify-content: space-between;
      box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    }

    .brand {
      display: flex;
      align-items: center;
      text-decoration: none;
    }

    .logo {
      width: 48px;
      height: 48px;
      object-fit: cover;
      border-radius: 12px;
      box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
      background: white;
      padding: 4px;
      margin-right: 12px;
      transition: transform 0.3s ease;
    }

    .brand:hover .logo {
      transform: rotate(5deg);
    }

    .brand-name {
      font-size: 1.5rem;
      font-weight: 700;
      color: white;
      background: linear-gradient(to right, #ffffff, #e0e7ff);
      -webkit-background-clip: text;
      background-clip: text;
      -webkit-text-fill-color: transparent;
      letter-spacing: 0.05em;
    }

    /* Navigation Styles */
    .nav {
      margin-top: 0;
      background-color: white;
      box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
      position: sticky;
      top: 0;
      z-index: 100;
    }

    .nav ul {
      list-style-type: none;
      margin: 0;
      padding: 0;
      display: flex;
      align-items: center;
      max-width: 1200px;
      margin: 0 auto;
    }

    .nav .categories {
      padding: 0;
      position: relative;
    }

    .nav .categories a {
      color: #4b5563;
      text-decoration: none;
      padding: 1.25rem 1.5rem;
      display: block;
      font-weight: 500;
      transition: all 0.3s ease;
    }

    .nav .categories a:hover {
      color: #4f46e5;
      background-color: #f3f4f6;
    }

    .nav .categories a::after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 50%;
      width: 0;
      height: 3px;
      background: linear-gradient(135deg, #4f46e5 0%, #3b82f6 100%);
      transform: translateX(-50%);
      transition: width 0.3s ease;
    }

    .nav .categories a:hover::after {
      width: 80%;
    }

    .nav .addtocart {
      margin-left: auto;
      padding: 0.75rem 1.5rem;
    }

    .nav .addtocart a {
      display: flex;
      align-items: center;
      gap: 0.5rem;
      text-decoration: none;
      background: linear-gradient(135deg, #4f46e5 0%, #3b82f6 100%);
      color: white;
      padding: 0.75rem 1.25rem;
      border-radius: 9999px;
      font-weight: 600;
      font-size: 0.9rem;
      transition: all 0.3s ease;
      box-shadow: 0 4px 6px -1px rgba(59, 130, 246, 0.3);
    }

    .nav .addtocart a:hover {
      transform: translateY(-2px);
      box-shadow: 0 10px 15px -3px rgba(59, 130, 246, 0.4);
    }

    .cart-icon {
      display: inline-block;
      width: 1.5rem;
      height: 1.5rem;
    }

    /* Slideshow Styles */
    .slideshow {
      max-width: 1200px;
      margin: 2rem auto;
      border-radius: 16px;
      overflow: hidden;
      box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
      position: relative;
    }

    .slideshow .image {
      width: 100%;
      height: auto;
      display: block;
      border-radius: 16px;
      transition: transform 10s ease;
    }

    .slideshow:hover .image {
      transform: scale(1.05);
    }

    .slideshow-overlay {
      position: absolute;
      bottom: 0;
      left: 0;
      right: 0;
      padding: 2rem;
      background: linear-gradient(to top, rgba(0,0,0,0.8), transparent);
      color: white;
    }

    .slideshow-title {
      font-size: 2.5rem;
      font-weight: 700;
      margin-bottom: 0.5rem;
    }

    .slideshow-subtitle {
      font-size: 1.2rem;
      opacity: 0.9;
    }

    /* Category Sections */
    .items {
      max-width: 1200px;
      margin: 3rem auto;
      background-color: white;
      border-radius: 16px;
      box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.05);
      overflow: hidden;
      transition: transform 0.3s ease;
    }

    .items:hover {
      transform: translateY(-5px);
    }

    .items .categoryheading {
      background: linear-gradient(135deg, #4f46e5 0%, #3b82f6 100%);
      padding: 1.25rem;
      margin: 0;
      font-size: 1.5rem;
      text-align: center;
      color: white;
      font-weight: 600;
      letter-spacing: 0.05em;
    }

    .gridcontents {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
      gap: 2rem;
      padding: 2rem;
    }

    .griditem {
      background-color: #f9fafb;
      border-radius: 12px;
      padding: 1.5rem;
      text-align: center;
      transition: all 0.3s ease;
      box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
      position: relative;
      overflow: hidden;
    }

    .griditem:hover {
      transform: translateY(-5px);
      box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
    }

    .griditem img {
      width: 120px;
      height: 120px;
      object-fit: cover;
      border-radius: 12px;
      margin-bottom: 1rem;
      transition: transform 0.5s ease;
    }

    .griditem:hover img {
      transform: scale(1.1);
    }

    .griditem h2 {
      font-size: 1.25rem;
      margin: 0.5rem 0;
      font-weight: 600;
      color: #1f2937;
    }

    .griditem h3 {
      font-size: 1.25rem;
      color: #4f46e5;
      margin: 0.5rem 0 1.5rem;
      font-weight: 700;
    }

    .griditem a {
      display: inline-block;
      text-decoration: none;
      background: linear-gradient(135deg, #4f46e5 0%, #3b82f6 100%);
      color: white;
      font-size: 0.9rem;
      padding: 0.75rem 1.5rem;
      border-radius: 9999px;
      font-weight: 600;
      transition: all 0.3s ease;
      box-shadow: 0 4px 6px -1px rgba(59, 130, 246, 0.3);
    }

    .griditem a:hover {
      transform: translateY(-2px);
      box-shadow: 0 10px 15px -3px rgba(59, 130, 246, 0.4);
    }

    /* Product badge */
    .badge {
      position: absolute;
      top: 1rem;
      right: 1rem;
      background: linear-gradient(135deg, #f59e0b 0%, #ef4444 100%);
      color: white;
      padding: 0.25rem 0.75rem;
      border-radius: 9999px;
      font-size: 0.75rem;
      font-weight: 600;
    }

    /* Footer */
    .footer {
      background: linear-gradient(135deg, #1f2937 0%, #111827 100%);
      color: #f9fafb;
      padding: 3rem 2rem;
      margin-top: 4rem;
    }

    .footer-content {
      max-width: 1200px;
      margin: 0 auto;
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
      gap: 2rem;
    }

    .footer-column h3 {
      font-size: 1.25rem;
      margin-bottom: 1.5rem;
      font-weight: 600;
      color: white;
    }

    .footer-column ul {
      list-style: none;
      padding: 0;
      margin: 0;
    }

    .footer-column li {
      margin-bottom: 0.75rem;
    }

    .footer-column a {
      color: #d1d5db;
      text-decoration: none;
      transition: color 0.3s ease;
    }

    .footer-column a:hover {
      color: #3b82f6;
    }

    .copyright {
      text-align: center;
      padding-top: 2rem;
      margin-top: 2rem;
      border-top: 1px solid rgba(255, 255, 255, 0.1);
      color: #9ca3af;
      font-size: 0.9rem;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
      .header {
        padding: 1rem;
      }

      .brand-name {
        font-size: 1.25rem;
      }

      .nav ul {
        flex-wrap: wrap;
      }

      .nav .addtocart {
        margin: 0.5rem 1rem;
      }

      .slideshow-title {
        font-size: 1.75rem;
      }

      .slideshow-subtitle {
        font-size: 1rem;
      }

      .gridcontents {
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        padding: 1rem;
      }
    }

    @media (max-width: 480px) {
      .gridcontents {
        grid-template-columns: 1fr;
      }

      .footer-content {
        grid-template-columns: 1fr;
      }
    }
  </style>
</head>

<body>
  <!-- Header -->
  <div class="header">
    <a href="index.php" class="brand">
      <img class="logo" src="logo.png" alt="Ateu Mart Logo">
      <span class="brand-name">ATEU MART</span>
    </a>
  </div>

  <!-- Navigation bar -->
  <div class="nav">
    <ul>
      <li class="categories"><a href="fashion.php">Fashion</a></li>
      <li class="categories"><a href="toys.php">Toys</a></li>
      <li class="categories"><a href="devices.php">Devices</a></li>
      <li class="categories"><a href="new-arrivals.php">New Arrivals</a></li>
      <li class="addtocart">
        <a href="cart.php">
          <svg class="cart-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
          </svg>
          <span>Cart</span>
        </a>
      </li>
    </ul>
  </div>

  <!-- Slideshow -->
  <div class="slideshow">
    <img src="slidephoto1.png" alt="Trending Products" class="image">
    <div class="slideshow-overlay">
      <h2 class="slideshow-title">Summer Collection 2025</h2>
      <p class="slideshow-subtitle">Discover the latest trends and innovations</p>
    </div>
  </div>

  <!-- Fashion category -->
  <div class="items">
    <h1 class="categoryheading">Fashion</h1>
    <div class="gridcontents">
      <div class="griditem">
        <span class="badge">Trending</span>
        <img src="c1.png" alt="Stylish Pants">
        <h2>Premium Denim</h2>
        <h3>R 500.00</h3>
        <a href="cart.php?add=fashion1">Add to Cart</a>
      </div>

      <div class="griditem">
        <img src="c2.png" alt="Casual Shirt">
        <h2>Modern Shirt</h2>
        <h3>R 400.00</h3>
        <a href="cart.php?add=fashion2">Add to Cart</a>
      </div>

      <div class="griditem">
        <span class="badge">New</span>
        <img src="c3.png" alt="Fashion Accessory">
        <h2>Designer Watch</h2>
        <h3>R 1200.00</h3>
        <a href="cart.php?add=fashion3">Add to Cart</a>
      </div>

      <div class="griditem">
        <img src="c4.png" alt="Fashion Item">
        <h2>Leather Jacket</h2>
        <h3>R 1500.00</h3>
        <a href="cart.php?add=fashion4">Add to Cart</a>
      </div>
    </div>
  </div>

  <!-- Toys category -->
  <div class="items">
    <h1 class="categoryheading">Toys</h1>
    <div class="gridcontents">
      <div class="griditem">
        <img src="c6.png" alt="Duck Toy">
        <h2>Interactive Duck</h2>
        <h3>R 100.00</h3>
        <a href="cart.php?add=toy1">Add to Cart</a>
      </div>

      <div class="griditem">
        <span class="badge">Best Seller</span>
        <img src="c7.png" alt="Pyramid Toy">
        <h2>Educational Pyramid</h2>
        <h3>R 200.00</h3>
        <a href="cart.php?add=toy2">Add to Cart</a>
      </div>

      <div class="griditem">
        <img src="/api/placeholder/200/200" alt="Toy Robot">
        <h2>Smart Robot</h2>
        <h3>R 350.00</h3>
        <a href="cart.php?add=toy3">Add to Cart</a>
      </div>

      <div class="griditem">
        <img src="/api/placeholder/200/200" alt="Building Blocks">
        <h2>Building Blocks</h2>
        <h3>R 250.00</h3>
        <a href="cart.php?add=toy4">Add to Cart</a>
      </div>
    </div>
  </div>

  <!-- Devices category -->
  <div class="items">
    <h1 class="categoryheading">Devices</h1>
    <div class="gridcontents">
      <div class="griditem">
        <span class="badge">Premium</span>
        <img src="c11.png" alt="Desktop Computer">
        <h2>Gaming Desktop</h2>
        <h3>R 12,000.00</h3>
        <a href="cart.php?add=device1">Add to Cart</a>
      </div>

      <div class="griditem">
        <img src="c12.png" alt="Digital Camera">
        <h2>Pro Camera</h2>
        <h3>R 10,000.00</h3>
        <a href="cart.php?add=device2">Add to Cart</a>
      </div>

      <div class="griditem">
        <span class="badge">New</span>
        <img src="/api/placeholder/200/200" alt="Smart Watch">
        <h2>Smart Watch</h2>
        <h3>R 4,500.00</h3>
        <a href="cart.php?add=device3">Add to Cart</a>
      </div>

      <div class="griditem">
        <img src="/api/placeholder/200/200" alt="Wireless Earbuds">
        <h2>Wireless Earbuds</h2>
        <h3>R 2,800.00</h3>
        <a href="cart.php?add=device4">Add to Cart</a>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <div class="footer">
    <div class="footer-content">
      <div class="footer-column">
        <h3>About Us</h3>
        <ul>
          <li><a href="#">Our Story</a></li>
          <li><a href="#">Careers</a></li>
          <li><a href="#">Press</a></li>
          <li><a href="#">Blog</a></li>
        </ul>
      </div>
      <div class="footer-column">
        <h3>Customer Service</h3>
        <ul>
          <li><a href="#">Contact Us</a></li>
          <li><a href="#">FAQ</a></li>
          <li><a href="#">Shipping & Returns</a></li>
          <li><a href="#">Size Guide</a></li>
        </ul>
      </div>
      <div class="footer-column">
        <h3>Legal</h3>
        <ul>
          <li><a href="#">Terms of Service</a></li>
          <li><a href="#">Privacy Policy</a></li>
          <li><a href="#">Cookie Policy</a></li>
          <li><a href="#">POPIA Compliance</a></li>
        </ul>
      </div>
      <div class="footer-column">
        <h3>Follow Us</h3>
        <ul>
          <li><a href="#">Instagram</a></li>
          <li><a href="#">Twitter</a></li>
          <li><a href="#">Facebook</a></li>
          <li><a href="#">LinkedIn</a></li>
        </ul>
      </div>
    </div>
    <div class="copyright">
      © 2025 Ateu Mart. All rights reserved.
    </div>
  </div>

</body>
</html>