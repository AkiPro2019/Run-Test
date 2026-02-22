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
  <title>About Us - GreenScape Landscaping</title>
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
      <li><a href="about.php" class="active">About</a></li>
      <li><a href="services.php">Services</a></li>
      <li><a href="gallery.php">Gallery</a></li>
      <li><a href="contact.php">Contact</a></li>
      <?php if ($isLoggedIn): ?>
        <li><a href="profile.php" class="btn-login">My Profile</a></li>
      <?php else: ?>
        <li><a href="login.php" class="btn-login">Log in</a></li>
      <?php endif; ?>
    </ul>
  </nav>

  <!-- About Hero -->
  <section class="about-hero">
    <div class="hero-content">
      <h1>About GreenScape</h1>
      <p>Creating beautiful outdoor spaces since 2010</p>
    </div>
  </section>

  <!-- About Content -->
  <section class="section">
    <div class="about-content">
      <div class="about-grid">
        <div class="about-image">
          <img src="https://images.unsplash.com/photo-1558904541-efa843a96f01?w=800" alt="GreenScape Team">
        </div>
        <div class="about-text">
          <h3>Our Story</h3>
          <p>GreenScape was founded in 2010 with a simple mission: to transform ordinary outdoor spaces into extraordinary landscapes. What started as a small family business has grown into one of the most trusted landscaping companies in the region.</p>
          <p>Our team of passionate horticulturists, designers, and craftsmen work together to create sustainable, beautiful outdoor environments that our clients love. We believe that every landscape has the potential to be a masterpiece.</p>
        </div>
      </div>

      <div class="about-grid">
        <div class="about-text">
          <h3>Our Mission</h3>
          <p>At GreenScape, we're committed to excellence in every project we undertake. Our mission is to provide exceptional landscaping services that enhance the beauty and value of your property while promoting environmental sustainability.</p>
          <p>We use eco-friendly practices, native plants, and efficient irrigation systems to create landscapes that are not only beautiful but also sustainable for years to come.</p>
        </div>
        <div class="about-image">
          <img src="https://images.unsplash.com/photo-1585320806297-9794b3e4eeae?w=800" alt="Beautiful Garden">
        </div>
      </div>

      <div class="stats-grid">
        <div class="stat-item">
          <h4>15+</h4>
          <p>Years of Experience</p>
        </div>
        <div class="stat-item">
          <h4>500+</h4>
          <p>Projects Completed</p>
        </div>
        <div class="stat-item">
          <h4>100%</h4>
          <p>Client Satisfaction</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Team Section -->
  <section class="section" style="background-color: var(--light-cream);">
    <div class="section-header">
      <h2>Meet Our Team</h2>
      <p>The passionate experts behind GreenScape</p>
    </div>
    <div class="services-grid">
      <div class="service-card">
        <div class="service-image" style="background-image: url('https://images.unsplash.com/photo-1560250097-0b93528c311a?w=400')"></div>
        <div class="service-content">
          <h3>David Martinez</h3>
          <p style="color: var(--primary-green); font-weight: 600;">Founder & CEO</p>
          <p>With over 20 years of experience in landscape architecture, David leads our team with vision and expertise.</p>
        </div>
      </div>
      <div class="service-card">
        <div class="service-image" style="background-image: url('https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=400')"></div>
        <div class="service-content">
          <h3>Jennifer Walsh</h3>
          <p style="color: var(--primary-green); font-weight: 600;">Lead Designer</p>
          <p>Jennifer brings creativity and innovation to every project, transforming ideas into stunning landscapes.</p>
        </div>
      </div>
      <div class="service-card">
        <div class="service-image" style="background-image: url('https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=400')"></div>
        <div class="service-content">
          <h3>Robert Kim</h3>
          <p style="color: var(--primary-green); font-weight: 600;">Operations Manager</p>
          <p>Robert ensures every project runs smoothly, on time, and exceeds our clients' expectations.</p>
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