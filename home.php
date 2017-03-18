<?php
/**
 * Created by PhpStorm.
 * User: chris
 * Date: 18/03/2017
 * Time: 18:18
 */

session_start();

if (isset($_SESSION['loggedIn']) and $_SESSION['loggedIn'] == true) {
    echo "Home page";
} else {
    header('Location: /hack24/homepage.html');
}