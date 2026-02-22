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
  <title>Our Services - GreenScape Landscaping</title>
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
      <li><a href="services.php" class="active">Services</a></li>
      <li><a href="gallery.php">Gallery</a></li>
      <li><a href="contact.php">Contact</a></li>
      <?php if ($isLoggedIn): ?>
        <li><a href="profile.php" class="btn-login">My Profile</a></li>
      <?php else: ?>
        <li><a href="login.php" class="btn-login">Log in</a></li>
      <?php endif; ?>
    </ul>
  </nav>

  <!-- Services Hero -->
  <section class="services-hero">
    <div class="hero-content">
      <h1>Our Services</h1>
      <p>Comprehensive landscaping solutions for every need</p>
    </div>
  </section>

  <!-- Detailed Services -->
  <section class="section">
    <div class="detailed-services">
      <!-- Lawn Maintenance -->
      <div class="service-detail">
        <div class="service-detail-image" style="background-image: url('https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=600')"></div>
        <div class="service-detail-content">
          <h3>Lawn Maintenance</h3>
          <p>Keep your lawn looking its best year-round with our professional maintenance services. We provide regular mowing, edging, fertilizing, and weed control to ensure your grass stays healthy and vibrant.</p>
          <p>Our team uses eco-friendly products and techniques to maintain your lawn while protecting the environment.</p>
          <ul class="service-features">
            <li>Weekly/Bi-weekly mowing</li>
            <li>Edging and trimming</li>
            <li>Fertilization programs</li>
            <li>Weed and pest control</li>
            <li>Aeration and overseeding</li>
          </ul>
        </div>
      </div>

      <!-- Garden Design -->
      <div class="service-detail">
        <div class="service-detail-image" style="background-image: url('https://images.unsplash.com/photo-1585320806297-9794b3e4eeae?w=600')"></div>
        <div class="service-detail-content">
          <h3>Garden Design</h3>
          <p>Transform your outdoor space into a stunning garden paradise. Our expert designers work with you to create a custom garden that reflects your style and complements your home.</p>
          <p>From flower beds to vegetable gardens, we design and install beautiful, functional outdoor spaces.</p>
          <ul class="service-features">
            <li>Custom garden plans</li>
            <li>Plant selection and sourcing</li>
            <li>Seasonal color programs</li>
            <li>Native plant gardens</li>
            <li>Butterfly and pollinator gardens</li>
          </ul>
        </div>
      </div>

      <!-- Hardscaping -->
      <div class="service-detail">
        <div class="service-detail-image" style="background-image: url('https://images.unsplash.com/photo-1558904541-efa843a96f01?w=600')"></div>
        <div class="service-detail-content">
          <h3>Hardscaping</h3>
          <p>Add structure and functionality to your landscape with our hardscaping services. We design and build patios, walkways, retaining walls, and outdoor living spaces that enhance your property.</p>
          <p>Using quality materials and expert craftsmanship, we create durable, beautiful hardscape features.</p>
          <ul class="service-features">
            <li>Patios and terraces</li>
            <li>Walkways and paths</li>
            <li>Retaining walls</li>
            <li>Outdoor kitchens</li>
            <li>Fire pits and fireplaces</li>
          </ul>
        </div>
      </div>

      <!-- Irrigation Systems -->
      <div class="service-detail">
        <div class="service-detail-image" style="background-image: url('https://images.unsplash.com/photo-1416879595882-3373a0480b5b?w=600')"></div>
        <div class="service-detail-content">
          <h3>Irrigation Systems</h3>
          <p>Keep your landscape properly hydrated with our efficient irrigation solutions. We design, install, and maintain sprinkler systems that deliver the right amount of water to every area of your property.</p>
          <p>Our smart irrigation systems save water and money while keeping your plants healthy.</p>
          <ul class="service-features">
            <li>Custom system design</li>
            <li>Smart controller installation</li>
            <li>Drip irrigation</li>
            <li>System repairs and upgrades</li>
            <li>Seasonal maintenance</li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <!-- Pricing Section -->
  <section class="section" style="background-color: var(--light-cream);">
    <div class="section-header">
      <h2>Service Packages</h2>
      <p>Choose the perfect plan for your landscape needs</p>
    </div>
    <div class="services-grid">
      <div class="service-card" style="text-align: center; padding: 2rem;">
        <div class="service-icon" style="margin: 0 auto 1rem;">
          <i class="fas fa-seedling"></i>
        </div>
        <h3>Basic Care</h3>
        <p style="font-size: 2rem; color: var(--primary-green); font-weight: bold;">$99<span style="font-size: 1rem; color: var(--text-gray);">/month</span></p>
        <ul style="text-align: left; margin: 1.5rem 0; color: var(--text-gray);">
          <li>Weekly lawn mowing</li>
          <li>Edge trimming</li>
          <li>Basic weed control</li>
          <li>Monthly fertilizing</li>
        </ul>
        <a href="contact.php" class="btn btn-primary">Get Started</a>
      </div>
      <div class="service-card" style="text-align: center; padding: 2rem; border: 2px solid var(--primary-green);">
        <div class="service-icon" style="margin: 0 auto 1rem;">
          <i class="fas fa-leaf"></i>
        </div>
        <h3>Premium Care</h3>
        <p style="font-size: 2rem; color: var(--primary-green); font-weight: bold;">$199<span style="font-size: 1rem; color: var(--text-gray);">/month</span></p>
        <ul style="text-align: left; margin: 1.5rem 0; color: var(--text-gray);">
          <li>Everything in Basic</li>
          <li>Bi-weekly garden maintenance</li>
          <li>Seasonal plantings</li>
          <li>Irrigation monitoring</li>
          <li>Priority scheduling</li>
        </ul>
        <a href="contact.php" class="btn btn-primary">Get Started</a>
      </div>
      <div class="service-card" style="text-align: center; padding: 2rem;">
        <div class="service-icon" style="margin: 0 auto 1rem;">
          <i class="fas fa-crown"></i>
        </div>
        <h3>Complete Care</h3>
        <p style="font-size: 2rem; color: var(--primary-green); font-weight: bold;">$349<span style="font-size: 1rem; color: var(--text-gray);">/month</span></p>
        <ul style="text-align: left; margin: 1.5rem 0; color: var(--text-gray);">
          <li>Everything in Premium</li>
          <li>Full landscape design</li>
          <li>Hardscape maintenance</li>
          <li>24/7 emergency service</li>
          <li>Dedicated account manager</li>
        </ul>
        <a href="contact.php" class="btn btn-primary">Get Started</a>
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