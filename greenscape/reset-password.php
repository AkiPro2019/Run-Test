<?php 
require 'db.php'; 

$error = "";
$resetRequest = null;

if (!isset($_GET['token'])) { 
    die("Error: No token provided in the URL."); 
}

$token = $_GET['token'];

// Debugging: Check if token exists at all
$stmt = $pdo->prepare("SELECT * FROM password_resets WHERE token = ?");
$stmt->execute([$token]);
$resetRequest = $stmt->fetch();

if (!$resetRequest) {
    die("Error: Token not found in database. Did you request a new one? The old link becomes invalid.");
}

// Check expiration manually to see if it's the culprit
$expiryTime = strtotime($resetRequest['expiry']);
$currentTime = time();

if ($expiryTime < $currentTime) {
    die("Error: Token expired. Expiry: " . $resetRequest['expiry'] . " | Current Server Time: " . date("Y-m-d H:i:s"));
}

// If we reached here, the token is valid
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $newPass = $_POST['password'];
    $confirm = $_POST['confirm-password'];

    if (empty($newPass) || strlen($newPass) < 6) {
        $error = "Password must be at least 6 characters.";
    } elseif ($newPass === $confirm) {
        $hashed = password_hash($newPass, PASSWORD_BCRYPT);
        
        $stmt = $pdo->prepare("UPDATE users SET password = ? WHERE email = ?");
        $stmt->execute([$hashed, $resetRequest['email']]);
        
        $stmt = $pdo->prepare("DELETE FROM password_resets WHERE email = ?");
        $stmt->execute([$resetRequest['email']]);
        
        header("Location: login.php?success=Password updated successfully. Please login.");
        exit;
    } else {
        $error = "Passwords do not match.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>New Password - GreenScape</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
  <div class="auth-page">
    <div class="auth-container" style="max-width: 500px;">
      <div class="auth-form">
        <a href="login.php" class="back-btn"><i class="fas fa-arrow-left"></i> Back to Login</a>
        <h2>Enter New Password</h2>
        <p style="margin-bottom: 1rem; color: var(--text-gray);">Resetting password for: <strong><?= htmlspecialchars($resetRequest['email']) ?></strong></p>
        
        <?php if($error !== ""): ?>
            <p style="color:red; background: rgba(220, 53, 69, 0.1); padding: 0.75rem; border-radius: 8px; margin-bottom: 1rem;"><?= $error ?></p>
        <?php endif; ?>

        <form method="POST">
          <div class="form-group">
            <label>New Password</label>
            <input type="password" name="password" placeholder="At least 6 characters" required>
          </div>
          <div class="form-group">
            <label>Confirm New Password</label>
            <input type="password" name="confirm-password" placeholder="Repeat password" required>
          </div>
          <button type="submit" class="btn btn-primary" style="width: 100%;">Update Password</button>
        </form>
      </div>
    </div>
  </div>
</body>
</html>