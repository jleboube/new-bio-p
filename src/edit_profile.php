<?php
require_once 'config/database.php';
require_once 'includes/auth.php';
requireLogin();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['last_name']);
    $mobile = trim($_POST['mobile']);
    $bio = trim($_POST['bio']);
    
    $stmt = $pdo->prepare("UPDATE users SET first_name = ?, last_name = ?, mobile = ?, bio = ? WHERE id = ?");
    $stmt->execute([$first_name, $last_name, $mobile, $bio, $_SESSION['user_id']]);
    
    $success = "Profile updated successfully";
}

$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$_SESSION['user_id']]);
$user = $stmt->fetch();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Profile</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <form method="POST" class="profile-form">
            <h2>Edit Profile</h2>
            <?php if (isset($success)): ?>
                <div class="success"><?php echo $success; ?></div>
            <?php endif; ?>
            <input type="text" name="first_name" value="<?php echo htmlspecialchars($user['first_name']); ?>" required>
            <input type="text" name="last_name" value="<?php echo htmlspecialchars($user['last_name']); ?>" required>
            <input type="tel" name="mobile" value="<?php echo htmlspecialchars($user['mobile']); ?>" required>
            <textarea name="bio" rows="6" required><?php echo htmlspecialchars($user['bio']); ?></textarea>
            <button type="submit">Update Profile</button>
            <a href="dashboard.php">Back to Dashboard</a>
        </form>
    </div>
</body>
</html>
