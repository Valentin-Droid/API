<?php

require '../connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $token = $_GET['token'];

    $stmt =  $PDO->prepare("SELECT id,login,token FROM user WHERE token = ?");
    $stmt->execute(array($token));
    $user = $stmt->fetch(PDO::FETCH_OBJ);

    if($user->token == $token) {
        $result =  json_encode($user, JSON_PRETTY_PRINT);
        echo $result;
        exit();
    } else {
       http_response_code(401);
    }

}
?>