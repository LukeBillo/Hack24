<?php

session_start();

require_once ('common.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = ((isset($_POST['usernameInput'])) ? $_POST['usernameInput'] : '');
    $password = ((isset($_POST['passwordInput'])) ? $_POST['passwordInput'] : '');

    $result = $db->query('select * from users where username = "' . $username . '" and password = "' . $password . '"');

    if ($result->num_rows === 1) {
        $_SESSION['loggedIn'] = true;
        $_SESSION['username'] = $username;
        header('Location: /hack24/home.php');
    } else {
        header('Location: /hack24/homepage.html');
    }

} else {
    header('Location: /hack24/homepage.html');
}