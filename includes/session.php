<?php

session_start();

$logged_in = isset($_SESSION['user']);

function login($user) {
    $_SESSION['user'] = $user;
}

function logout() {
    session_destroy();
}

function authenticate(PDO $pdo, $username, $password) {
    $sql = "SELECT * FROM customer WHERE username = :username;";
    $user = pdo($pdo, $sql, ['username' => $username])->fetch();

    // plain text password check (for your assignment)
    if ($user && $password === $user['password']) {
        return $user;
    }

    return false;
}