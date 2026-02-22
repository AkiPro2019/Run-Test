<?php 
require 'db.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $pass = $_POST['password'];
    $confirm = $_POST['confirm-password'];

    if ($pass !== $confirm) {
        $error = "Passwords do not match.";
    } else {
        $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->execute([$email]);
        if ($stmt->fetch()) {
            $error = "Email already registered.";
        } else {
            $hashedPass = password_hash($pass, PASSWORD_BCRYPT);
            $stmt = $pdo->prepare("INSERT INTO users (fullname, email, phone, password) VALUES (?, ?, ?, ?)");
            if ($stmt->execute([$fullname, $email, $phone, $hashedPass])) {
                header("Location: login.php?success=Account created. Please sign in.");
                exit;
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up - GreenScape</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
  <div class="auth-page">
    <div class="auth-container">
      <div class="auth-image">
        <div class="auth-image-content">
          <h2>Join Us!</h2>
          <p>Create an account to track your landscaping projects and get exclusive offers.</p>
        </div>
      </div>
      <div class="auth-form">
        <!-- Back Button -->
        <a href="index.php" class="back-btn">
          <i class="fas fa-arrow-left"></i> Back to Home
        </a>

        <a href="index.php" class="auth-logo">
          <div class="logo-icon">
            <i class="fas fa-leaf"></i>
          </div>
          GreenScape
        </a>
        <h2>Create Account</h2>
        <?php if(isset($error)): ?><p style="color:red; margin-bottom: 1rem;"><?= $error ?></p><?php endif; ?>
        
        <form method="POST">
          <div class="form-group">
            <label>Full Name</label>
            <input type="text" name="fullname" placeholder="Enter your full name" required>
          </div>
          <div class="form-group">
            <label>Email Address</label>
            <input type="email" name="email" placeholder="Enter your email" required>
          </div>
          <div class="form-group">
            <label>Phone Number</label>
            <input type="tel" name="phone" placeholder="Enter your phone number">
          </div>
          <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" placeholder="Create a password" required>
          </div>
          <div class="form-group">
            <label>Confirm Password</label>
            <input type="password" name="confirm-password" placeholder="Confirm your password" required>
          </div>
          <button type="submit" class="btn btn-primary" style="width: 100%;">Create Account</button>
        </form>

        <div class="auth-footer">
          <p>Already have an account? <a href="login.php">Sign in</a></p>
        </div>
      </div>
    </div>
  </div>
</body>
</html>