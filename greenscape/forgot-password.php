<?php 
require 'db.php'; 

$debugLink = ""; // Variable to hold the link for testing

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    
    $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->execute([$email]);
    if ($stmt->fetch()) {
        $token = bin2hex(random_bytes(32));
        $expiry = date("Y-m-d H:i:s", strtotime("+1 hour"));
        
        // Delete any existing tokens for this email first
        $stmt = $pdo->prepare("DELETE FROM password_resets WHERE email = ?");
        $stmt->execute([$email]);

        $stmt = $pdo->prepare("INSERT INTO password_resets (email, token, expiry) VALUES (?, ?, ?)");
        $stmt->execute([$email, $token, $expiry]);
        
        // Generate the link for you to click manually since email isn't set up
        $debugLink = "http://localhost/greenscape/reset-password.php?token=" . $token;
        
        $success = "If this email is registered, you will receive a reset link shortly.";
    } else {
        $success = "If this email is registered, you will receive a reset link shortly.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Forgot Password - GreenScape</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
  <div class="auth-page">
    <div class="auth-container" style="max-width: 500px;">
      <div class="auth-form">
        <a href="index.php" class="back-btn"><i class="fas fa-arrow-left"></i> Back to Home</a>
        <h2>Reset Password</h2>
        <?php if(isset($success)): ?>
            <p style="color:green; background: rgba(34, 197, 94, 0.1); padding: 1rem; border-radius: 8px; margin-bottom: 1rem;"><?= $success ?></p>
        <?php endif; ?>
        
        <form method="POST">
          <div class="form-group">
            <label>Email Address</label>
            <input type="email" name="email" placeholder="Enter your email" required>
          </div>
          <button type="submit" class="btn btn-primary" style="width: 100%;">Send Reset Link</button>
        </form>

        <!-- DEBUG BOX: Only for testing on localhost -->
        <?php if($debugLink !== ""): ?>
          <div style="margin-top: 2rem; padding: 1rem; border: 1px dashed #ccc; background: #f9f9f9;">
            <p style="font-size: 0.8rem; color: #666;"><strong>Developer Debug:</strong> Since XAMPP cannot send real emails, use the link below to test your reset page:</p>
            <a href="<?= $debugLink ?>" style="color: blue; word-break: break-all; font-size: 0.85rem;"><?= $debugLink ?></a>
          </div>
        <?php endif; ?>

        <div class="auth-footer" style="margin-top: 1rem;">
            <a href="login.php">Back to Login</a>
        </div>
      </div>
    </div>
  </div>
</body>
</html>