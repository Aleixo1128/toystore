<?php

require_once 'includes/session.php';

if (!$logged_in) {
    header('Location: login.php');
    exit;
}

require_once 'includes/header.php';

$user = $_SESSION['user'];
?>
</div>

<?php include 'includes/footer.php'; ?>