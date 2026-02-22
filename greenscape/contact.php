<?php
require 'db.php';

// Check if user is logged in
$isLoggedIn = isset($_SESSION['user_id']);
$successMessage = "";
$errorMessage = "";

// Handle Form Submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if user is logged in before processing
    if (!$isLoggedIn) {
        header("Location: login.php?error=You must be logged in to request a quote.");
        exit();
    }

    // Sanitize and capture inputs
    $userId = $_SESSION['user_id'];
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $service = htmlspecialchars($_POST['service']);
    $message = htmlspecialchars($_POST['message']);

    try {
        $stmt = $pdo->prepare("INSERT INTO quotes (user_id, name, email, phone, service, message) VALUES (?, ?, ?, ?, ?, ?)");
        if ($stmt->execute([$userId, $name, $email, $phone, $service, $message])) {
            $successMessage = "Your quote request has been sent successfully! We will contact you soon.";
        }
    } catch (PDOException $e) {
        $errorMessage = "Error sending request. Please try again later.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Us - GreenScape Landscaping</title>
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
      <li><a href="gallery.php">Gallery</a></li>
      <li><a href="contact.php" class="active">Contact</a></li>
      <?php if ($isLoggedIn): ?>
        <li><a href="profile.php" class="btn-login">My Profile</a></li>
      <?php else: ?>
        <li><a href="login.php" class="btn-login">Log in</a></li>
      <?php endif; ?>
    </ul>
  </nav>

  <!-- Contact Hero -->
  <section class="contact-hero">
    <div class="hero-content">
      <h1>Contact Us</h1>
      <p>Get in touch for a free consultation</p>
    </div>
  </section>

  <!-- Contact Content -->
  <section class="section">
    <div class="contact-content">
      <div class="contact-info">
        <h3>Get In Touch</h3>
        <p style="color: var(--text-gray); margin-bottom: 2rem;">Have questions about our services? Ready to start your landscaping project? We'd love to hear from you!</p>
        
        <!-- Success/Error Alerts -->
        <?php if ($successMessage): ?>
          <div style="background: #dcfce7; color: #166534; padding: 1rem; border-radius: 8px; margin-bottom: 1.5rem; border: 1px solid #bbf7d0;">
            <i class="fas fa-check-circle"></i> <?= $successMessage ?>
          </div>
        <?php endif; ?>

        <?php if ($errorMessage): ?>
          <div style="background: #fee2e2; color: #991b1b; padding: 1rem; border-radius: 8px; margin-bottom: 1.5rem; border: 1px solid #fecaca;">
            <i class="fas fa-exclamation-circle"></i> <?= $errorMessage ?>
          </div>
        <?php endif; ?>

        <div class="contact-item">
          <div class="contact-icon">
            <i class="fas fa-phone"></i>
          </div>
          <div>
            <h4>Phone</h4>
            <p>(555) 123-4567</p>
          </div>
        </div>

        <div class="contact-item">
          <div class="contact-icon">
            <i class="fas fa-envelope"></i>
          </div>
          <div>
            <h4>Email</h4>
            <p>info@greenscape.com</p>
          </div>
        </div>

        <div class="contact-item">
          <div class="contact-icon">
            <i class="fas fa-map-marker-alt"></i>
          </div>
          <div>
            <h4>Address</h4>
            <p>123 Garden Lane, Green City</p>
          </div>
        </div>
      </div>

      <div class="contact-form">
        <h3>Request a Free Quote</h3>
        
        <?php if (!$isLoggedIn): ?>
          <div style="background: #fffbeb; color: #92400e; padding: 1rem; border-radius: 8px; margin-bottom: 1.5rem; border: 1px solid #fef3c7; font-size: 0.9rem;">
            <i class="fas fa-info-circle"></i> You must <a href="login.php" style="font-weight: bold; text-decoration: underline;">Login</a> to submit this form.
          </div>
        <?php endif; ?>

        <form action="contact.php" method="POST">
          <div class="form-group">
            <label for="name">Full Name</label>
            <input type="text" id="name" name="name" placeholder="Enter your full name" required <?= !$isLoggedIn ? 'disabled' : '' ?>>
          </div>
          <div class="form-group">
            <label for="email">Email Address</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" required <?= !$isLoggedIn ? 'disabled' : '' ?>>
          </div>
          <div class="form-group">
            <label for="phone">Phone Number</label>
            <input type="tel" id="phone" name="phone" placeholder="Enter your phone number" <?= !$isLoggedIn ? 'disabled' : '' ?>>
          </div>
          <div class="form-group">
            <label for="service">Service Interested In</label>
            <input type="text" id="service" name="service" placeholder="e.g., Lawn Maintenance" <?= !$isLoggedIn ? 'disabled' : '' ?>>
          </div>
          <div class="form-group">
            <label for="message">Message</label>
            <textarea id="message" name="message" placeholder="Tell us about your project..." <?= !$isLoggedIn ? 'disabled' : '' ?>></textarea>
          </div>
          <button type="submit" class="btn btn-primary" style="width: 100%;">Send Message</button>
        </form>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="footer">
    <div class="footer-content">
      <div class="footer-section">
        <h3>GreenScape</h3>
        <p>Professional landscaping services that bring your outdoor vision to life.</p>
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
        <h3>Contact Us</h3>
        <p><i class="fas fa-phone"></i> (555) 123-4567</p>
        <p><i class="fas fa-envelope"></i> info@greenscape.com</p>
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