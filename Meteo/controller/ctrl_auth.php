<?php
session_start();

require '../connect.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = ($_POST['username']);
    $password = ($_POST['password']);

    $stmt =  $PDO->prepare("SELECT * FROM user WHERE login = ? AND password = ?");
    $stmt->execute(array($username, $password));
    $user = $stmt->fetch(PDO::FETCH_OBJ);

    if ($user->login == $username && $user->password == $password) {
        $_SESSION['logged_in'] = true;
        header('Location: ../weather.php');
        exit();
    } else {
       $_SESSION['error'] = "Identifiant ou mot de passe incorrect!";
       header('Location: ../index.php');
    }
}
?>

