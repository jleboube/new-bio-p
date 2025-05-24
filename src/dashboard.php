<?php
require_once 'config/database.php';
require_once 'includes/auth.php';
requireLogin();

$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$_SESSION['user_id']]);
$user = $stmt->fetch();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <nav>
            <h1>Welcome, <?php echo htmlspecialchars($user['first_name']); ?></h1>
            <div>
                <a href="edit_profile.php">Edit Profile</a>
                <?php if (isAdmin()): ?>
                    <a href="admin.php">Admin Panel</a>
                <?php endif; ?>
                <a href="logout.php">Logout</a>
            </div>
        </nav>
        
        <div class="profile-card">
            <h2><?php echo htmlspecialchars($user['first_name'] . ' ' . $user['last_name']); ?></h2>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
            <p><strong>Mobile:</strong> <?php echo htmlspecialchars($user['mobile']); ?></p>
            <p><strong>Bio:</strong> <?php echo nl2br(htmlspecialchars($user['bio'])); ?></p>
        </div>
    </div>
</body>
</html>
