<?php
/**
 * Created by PhpStorm.
 * User: chris
 * Date: 18/03/2017
 * Time: 17:50
 */

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = ((isset($_POST['usernameInput'])) ? $_POST['usernameInput'] : '');
    $password = ((isset($_POST['passwordInput'])) ? $_POST['passwordInput'] : '');

    $_SESSION['loggedIn'] = true;
    //echo $username . '<br>';
    //echo $password . '<br>';
    header('Location: /hack24/home.php');
} else {
    header('Location: /hack24/index.php');
}