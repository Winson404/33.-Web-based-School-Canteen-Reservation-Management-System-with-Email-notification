<?php
require '../includes/config.php';
require '../classes/authentication.php';

if (isset($_POST['login'])) {
    $db = new Database();
    $userAuth = new UserAuthentication($db->getConnection());

    $email = $_POST['email'];
    $password = $_POST['password'];

    $userAuth->login($email, $password);
}
?>