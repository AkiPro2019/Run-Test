<?php
require 'db.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Fetch user data from session (or database for fresh info)
$userId = $_SESSION['user_id'];
$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$userId]);
$user = $stmt->fetch();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Profile - GreenScape Landscaping</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
  <!-- Navigation -->
  <nav class="navbar">
    <a href="index.php" class="logo">
      <div class="logo-icon"><i class="fas fa-leaf"></i></div>
      GreenScape
    </a>
    <div class="menu-toggle" onclick="toggleMenu()">
      <span></span><span></span><span></span>
    </div>
    <ul class="nav-links" id="navLinks">
      <li><a href="index.php">Home</a></li>
      <li><a href="about.php">About</a></li>
      <li><a href="services.php">Services</a></li>
      <li><a href="gallery.php">Gallery</a></li>
      <li><a href="contact.php">Contact</a></li>
      <li><a href="profile.php" class="active">My Profile</a></li>
    </ul>
  </nav>

  <div class="profile-page">
    <div class="profile-header">
      <div class="profile-header-content">
        <div class="profile-avatar">
          <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=200" alt="Profile">
        </div>
        <div class="profile-info">
          <h1><?php echo htmlspecialchars($user['fullname']); ?></h1>
          <p><i class="fas fa-envelope"></i> <?php echo htmlspecialchars($user['email']); ?></p>
          <p><i class="fas fa-user-tag"></i> Role: <?php echo ucfirst($user['role']); ?></p>
        </div>
      </div>
    </div>

    <div class="profile-content">
      <div class="profile-grid">
        <div class="profile-sidebar">
          <div class="profile-menu">
            <a href="#" class="profile-menu-item active"><i class="fas fa-home"></i> Overview</a>
            <a href="logout.php" class="profile-menu-item" style="color: var(--danger-red);"><i class="fas fa-sign-out-alt"></i> Logout</a>
          </div>
        </div>
        <div class="profile-main">
          <div class="profile-card">
            <h3>Account Details</h3>
            <p><strong>Phone:</strong> <?php echo htmlspecialchars($user['phone'] ?? 'Not provided'); ?></p>
            <p><strong>Member Since:</strong> <?php echo date('M d, Y', strtotime($user['created_at'])); ?></p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>function toggleMenu() { document.getElementById('navLinks').classList.toggle('active'); }</script>
</body>
</html>