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
  <title>GreenScape - Professional Landscaping Services</title>
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
      <li><a href="index.php" class="active">Home</a></li>
      <li><a href="about.php">About</a></li>
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

  <!-- Hero Section -->
  <section class="hero">
    <div class="hero-content">
      <h1>Transform Your Outdoor Space</h1>
      <p>Professional landscaping services that bring your vision to life</p>
      <div class="hero-buttons">
        <a href="contact.php" class="btn btn-primary">Get Started <i class="fas fa-arrow-right"></i></a>
        <a href="gallery.php" class="btn btn-secondary">View Our Work</a>
      </div>
    </div>
  </section>

  <!-- Services Section -->
  <section class="section services-section">
    <div class="section-header">
      <h2>Our Services</h2>
      <p>Comprehensive landscaping solutions tailored to your needs</p>
    </div>
    <div class="services-grid">
      <div class="service-card">
        <div class="service-image" style="background-image: url('https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=400')"></div>
        <div class="service-content">
          <div class="service-icon">
            <i class="fas fa-leaf"></i>
          </div>
          <h3>Lawn Maintenance</h3>
          <p>Keep your lawn lush and healthy with our comprehensive maintenance services.</p>
        </div>
      </div>
      <div class="service-card">
        <div class="service-image" style="background-image: url('https://images.unsplash.com/photo-1585320806297-9794b3e4eeae?w=400')"></div>
        <div class="service-content">
          <div class="service-icon">
            <i class="fas fa-tree"></i>
          </div>
          <h3>Garden Design</h3>
          <p>Transform your outdoor space with our custom garden design solutions.</p>
        </div>
      </div>
      <div class="service-card">
        <div class="service-image" style="background-image: url('https://images.unsplash.com/photo-1558904541-efa843a96f01?w=400')"></div>
        <div class="service-content">
          <div class="service-icon">
            <i class="fas fa-hammer"></i>
          </div>
          <h3>Hardscaping</h3>
          <p>Beautiful patios, walkways, and retaining walls that stand the test of time.</p>
        </div>
      </div>
      <div class="service-card">
        <div class="service-image" style="background-image: url('https://images.unsplash.com/photo-1416879595882-3373a0480b5b?w=400')"></div>
        <div class="service-content">
          <div class="service-icon">
            <i class="fas fa-tint"></i>
          </div>
          <h3>Irrigation Systems</h3>
          <p>Efficient watering systems to keep your landscape thriving year-round.</p>
        </div>
      </div>
    </div>
    <a href="services.php" class="btn btn-primary btn-view-all">View All Services</a>
  </section>

  <!-- Testimonials Section -->
  <section class="section testimonials-section">
    <div class="section-header">
      <h2>What Our Clients Say</h2>
      <p>Don't just take our word for it</p>
    </div>
    <div class="testimonials-grid">
      <div class="testimonial-card">
        <div class="stars">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
        </div>
        <p class="testimonial-text">"GreenScape transformed our backyard into a beautiful oasis. The team was professional, timely, and the results exceeded our expectations!"</p>
        <div class="testimonial-author">
          <h4>Sarah Johnson</h4>
          <p>Complete Backyard Redesign</p>
        </div>
      </div>
      <div class="testimonial-card">
        <div class="stars">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
        </div>
        <p class="testimonial-text">"Outstanding work on our front lawn. They understood exactly what we wanted and delivered perfection. Highly recommend!"</p>
        <div class="testimonial-author">
          <h4>Michael Chen</h4>
          <p>Lawn Maintenance</p>
        </div>
      </div>
      <div class="testimonial-card">
        <div class="stars">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
        </div>
        <p class="testimonial-text">"The stone patio they built is absolutely stunning. Great attention to detail and excellent customer service throughout the project."</p>
        <div class="testimonial-author">
          <h4>Emily Rodriguez</h4>
          <p>Hardscaping</p>
        </div>
      </div>
    </div>
  </section>

  <!-- CTA Section -->
  <section class="cta-section">
    <h2>Ready to Transform Your Landscape?</h2>
    <p>Get a free consultation and quote for your next project</p>
    <a href="contact.php" class="btn btn-white">Get Free Quote</a>
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