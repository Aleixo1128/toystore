<?php

require_once 'includes/session.php';

// redirect if already logged in
if ($logged_in) {
    header('Location: profile.php');
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $user = authenticate($pdo, $username, $password);

    if ($user) {
        login($user);
        header('Location: profile.php');
        exit;
    }
}

require_once 'includes/header.php';
?>

<div id="content" class="login-container animate-bottom">
    <h1>Log In</h1>
    <hr />

    <form method="POST" action="login.php" class="login-form">
        <div class="form-group">
            <label>Username:</label>
            <input type="text" name="username" required>
        </div>

        <div class="form-group">
            <label>Password:</label>
            <input type="password" name="password" required>
        </div>

        <div class="form-group">
            <input type="submit" value="Log In" class="submit-btn">
        </div>
    </form>
</div>

<?php include 'includes/footer.php'; ?>