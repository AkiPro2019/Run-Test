<?php
require 'db.php';
// Check if user is logged in to toggle navigation items
$isLoggedIn = isset($_SESSION['user_id']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gallery - GreenScape Landscaping</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
  <!-- Navigation -->
  <nav class="navbar">
    <a href="index.php" class="logo">
      <div class="logo-icon">
        <i class="fas fa-leaf"></i>
      </div>
      GreenScape
    </a>
    <div class="menu-toggle" onclick="toggleMenu()">
      <span></span>
      <span></span>
      <span></span>
    </div>
    <ul class="nav-links" id="navLinks">
      <li><a href="index.php">Home</a></li>
      <li><a href="about.php">About</a></li>
      <li><a href="services.php">Services</a></li>
      <li><a href="gallery.php" class="active">Gallery</a></li>
      <li><a href="contact.php">Contact</a></li>
      <?php if ($isLoggedIn): ?>
        <li><a href="profile.php" class="btn-login">My Profile</a></li>
      <?php else: ?>
        <li><a href="login.php" class="btn-login">Log in</a></li>
      <?php endif; ?>
    </ul>
  </nav>

  <!-- Gallery Hero -->
  <section class="gallery-hero">
    <div class="hero-content">
      <h1>Our Gallery</h1>
      <p>See the transformations we've created</p>
    </div>
  </section>

  <!-- Gallery Grid -->
  <section class="section">
    <div class="section-header">
      <h2>Featured Projects</h2>
      <p>Browse through our portfolio of completed landscaping projects</p>
    </div>
    <div class="gallery-grid">
      <div class="gallery-item">
        <img src="https://images.unsplash.com/photo-1558904541-efa843a96f01?w=600" alt="Beautiful Garden">
        <div class="gallery-overlay">
          <h3>Backyard Oasis</h3>
          <p>Complete garden redesign with native plants</p>
        </div>
      </div>
      <div class="gallery-item">
        <img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=600" alt="Lawn Care">
        <div class="gallery-overlay">
          <h3>Perfect Lawn</h3>
          <p>Professional lawn maintenance result</p>
        </div>
      </div>
      <div class="gallery-item">
        <img src="https://images.unsplash.com/photo-1585320806297-9794b3e4eeae?w=600" alt="Garden Design">
        <div class="gallery-overlay">
          <h3>Flower Garden</h3>
          <p>Seasonal color garden design</p>
        </div>
      </div>
      <div class="gallery-item">
        <img src="https://images.unsplash.com/photo-1416879595882-3373a0480b5b?w=600" alt="Irrigation">
        <div class="gallery-overlay">
          <h3>Smart Irrigation</h3>
          <p>Efficient watering system installation</p>
        </div>
      </div>
      <div class="gallery-item">
        <img src="https://images.unsplash.com/photo-1564013799919-ab600027ffc6?w=600" alt="Front Yard">
        <div class="gallery-overlay">
          <h3>Front Yard Makeover</h3>
          <p>Curb appeal enhancement project</p>
        </div>
      </div>
      <div class="gallery-item">
        <img src="https://images.unsplash.com/photo-1598902108854-10e335adac99?w=600" alt="Patio">
        <div class="gallery-overlay">
          <h3>Stone Patio</h3>
          <p>Custom hardscaping project</p>
        </div>
      </div>
      <div class="gallery-item">
        <img src="https://images.unsplash.com/photo-1591857177580-dc82b9ac4e1e?w=600" alt="Water Feature">
        <div class="gallery-overlay">
          <h3>Water Feature</h3>
          <p>Tranquil pond and waterfall</p>
        </div>
      </div>
      <div class="gallery-item">
        <img src="https://images.unsplash.com/photo-1466692476868-aef1dfb1e735?w=600" alt="Outdoor Living">
        <div class="gallery-overlay">
          <h3>Outdoor Living</h3>
          <p>Complete backyard transformation</p>
        </div>
      </div>
      <div class="gallery-item">
        <img src="https://images.unsplash.com/photo-1557429287-b2e26467fc2b?w=600" alt="Walkway">
        <div class="gallery-overlay">
          <h3>Garden Path</h3>
          <p>Natural stone walkway</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Before & After Section -->
  <section class="section" style="background-color: var(--light-cream);">
    <div class="section-header">
      <h2>Before & After</h2>
      <p>See the dramatic transformations we've achieved</p>
    </div>
    <div class="gallery-grid">
      <div class="gallery-item">
        <img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=600" alt="After">
        <div class="gallery-overlay">
          <h3>Project: Johnson Residence</h3>
          <p>Complete lawn renovation</p>
        </div>
      </div>
      <div class="gallery-item">
        <img src="https://images.unsplash.com/photo-1585320806297-9794b3e4eeae?w=600" alt="After">
        <div class="gallery-overlay">
          <h3>Project: Smith Estate</h3>
          <p>Garden design and installation</p>
        </div>
      </div>
      <div class="gallery-item">
        <img src="https://images.unsplash.com/photo-1558904541-efa843a96f01?w=600" alt="After">
        <div class="gallery-overlay">
          <h3>Project: Green Valley</h3>
          <p>Hardscaping and patio</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="footer">
    <div class="footer-content">
      <div class="footer-section">
        <h3>GreenScape</h3>
        <p>Professional landscaping services that bring your outdoor vision to life. We create beautiful, sustainable landscapes for homes and businesses.</p>
      </div>
      <div class="footer-section">
        <h3>Quick Links</h3>
        <p><a href="index.php">Home</a></p>
        <p><a href="about.php">About Us</a></p>
        <p><a href="services.php">Services</a></p>
        <p><a href="gallery.php">Gallery</a></p>
        <p><a href="contact.php">Contact</a></p>
      </div>
      <div class="footer-section">
        <h3>Services</h3>
        <p><a href="services.php">Lawn Maintenance</a></p>
        <p><a href="services.php">Garden Design</a></p>
        <p><a href="services.php">Hardscaping</a></p>
        <p><a href="services.php">Irrigation Systems</a></p>
      </div>
      <div class="footer-section">
        <h3>Contact Us</h3>
        <p><i class="fas fa-phone"></i> (555) 123-4567</p>
        <p><i class="fas fa-envelope"></i> info@greenscape.com</p>
        <p><i class="fas fa-map-marker-alt"></i> 123 Garden Lane, Green City</p>
      </div>
    </div>
    <div class="footer-bottom">
      <p>&copy; 2026 GreenScape Landscaping. All rights reserved.</p>
    </div>
  </footer>

  <script>
    function toggleMenu() {
      document.getElementById('navLinks').classList.toggle('active');
    }
  </script>
</body>
</html>