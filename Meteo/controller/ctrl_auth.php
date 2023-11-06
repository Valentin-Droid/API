<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    if ($username === 'admin' && $password === 'password') {
        $_SESSION['logged_in'] = true;
        header('Location: ../weather.html');
        exit;
    } else {
       $_SESSION['error'] = "Identifiant ou mot de passe incorrect!";
       header('Location: ../index.php');
    }
}
?>