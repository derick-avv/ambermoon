<?php
session_start();
require_once 'includes/config.php';

$pageTitle = "Admin Login - My Site";

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = :username LIMIT 1");
    $stmt->execute(['username' => $username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_id'] = $user['id'];
        header('Location: index.php?page=admin_dashboard');
        exit;
    } else {
        $error = 'Invalid username or password';
    }
}
?>

<main class='admin'>
    <section class='login'>
        <div class='login-container'>
            <h2>Admin Login</h2>
            <?php if ($error) echo "<p style='color:red;'>$error</p>"; ?>
            <form method="POST">
                <input type="text" name="username" placeholder="Username" required><br><br>
                <input type="password" name="password" placeholder="Password" required><br><br>
                <button type="submit">Login</button>
            </form>
        </div>
        
    </section>
    
</main>

