<?php 
require 'db.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $pass = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($pass, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['fullname'];
        $_SESSION['role'] = $user['role'];
        
        if ($user['role'] == 'admin') {
            header("Location: admin.php");
        } else {
            header("Location: profile.php");
        }
        exit;
    } else {
        $error = "Invalid email or password.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - GreenScape</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
  <div class="auth-page">
    <div class="auth-container">
      <div class="auth-image">
        <div class="auth-image-content">
          <h2>Welcome Back!</h2>
          <p>Sign in to access your account and manage your landscaping services.</p>
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
        <h2>Sign In</h2>
        <?php if(isset($_GET['success'])): ?><p style="color:green; margin-bottom: 1rem;"><?= htmlspecialchars($_GET['success']) ?></p><?php endif; ?>
        <?php if(isset($error)): ?><p style="color:red; margin-bottom: 1rem;"><?= $error ?></p><?php endif; ?>
        
        <form method="POST">
          <div class="form-group">
            <label>Email Address</label>
            <input type="email" name="email" placeholder="Enter your email" required>
          </div>
          <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" placeholder="Enter your password" required>
          </div>
          <div class="remember-forgot">
            <label class="remember">
              <input type="checkbox" name="remember"> Remember me
            </label>
            <a href="forgot-password.php" class="forgot">Forgot password?</a>
          </div>
          <button type="submit" class="btn btn-primary" style="width: 100%;">Sign In</button>
        </form>

        <div class="auth-footer">
          <p>Don't have an account? <a href="signup.php">Sign up</a></p>
        </div>
      </div>
    </div>
  </div>
</body>
</html>