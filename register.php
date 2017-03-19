<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = ((isset($_POST['usernameInput'])) ? $_POST['usernameInput'] : '');
    $password = ((isset($_POST['passwordInput'])) ? $_POST['passwordInput'] : '');

    $db = new mysqli('localhost', 'php', 'php', 'hack24');

    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }

    $result = $db->query('insert into users(username, password) values(' . $username . ', ' . $password . ')');

    if ($result)
    {
        header('Location: homepage.html');
    } else {
        print("Error inserting user.");
    }

} else {
    header('Location: register.html');
}