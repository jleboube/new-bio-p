<?php
require_once 'config/database.php';
require_once 'includes/auth.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['last_name']);
    $email = trim($_POST['email']);
    $mobile = trim($_POST['mobile']);
    $bio = trim($_POST['bio']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    
    try {
        $stmt = $pdo->prepare("INSERT INTO users (first_name, last_name, email, mobile, bio, password) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([$first_name, $last_name, $email, $mobile, $bio, $password]);
        
        header('Location: login.php?registered=1');
        exit();
    } catch(PDOException $e) {
        $error = "Email already exists";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <form method="POST" class="auth-form">
            <h2>Register</h2>
            <?php if (isset($error)): ?>
                <div class="error"><?php echo $error; ?></div>
            <?php endif; ?>
            <input type="text" name="first_name" placeholder="First Name" required>
            <input type="text" name="last_name" placeholder="Last Name" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="tel" name="mobile" placeholder="Mobile Number" required>
            <textarea name="bio" placeholder="Professional Bio" rows="4"></textarea>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Register</button>
            <a href="login.php">Already have an account? Login</a>
        </form>
    </div>
</body>
</html>
