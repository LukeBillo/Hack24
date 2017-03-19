<?php

session_start();

require_once ('common.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = ((isset($_POST['usernameInput'])) ? $_POST['usernameInput'] : '');
    $password = ((isset($_POST['passwordInput'])) ? $_POST['passwordInput'] : '');

    $result = $db->query('select * from users where username = "' . $username . '" and password = "' . $password . '"');


    //die($username . $password);
    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        // restore required info in the session
        $_SESSION['loggedIn'] = true;
        $_SESSION['username'] = $username;
        $_SESSION['accessToken'] = $row['accessToken'];
        $_SESSION['renewToken'] = $row['renewToken'];

        $redirect_uri = $GLOBALS['DOMAIN'] . '/loginTools.php';

        if (!isset($_GET['code'])) {
            $authorizationUrl = $cronofy->getAuthorizationUrl(array(
                "redirect_uri" => $redirect_uri,
                "scope" => array("read_account", "create_calendar", "list_calendars", "read_events", "create_event", "delete_event", "read_free_busy", "change_participation_status"),
            ));

            DebugLog("Redirect user to OAuth");

            header('Location: ' . $authorizationUrl);
            exit;
        } else {

        }

        //$redirect_uri = $GLOBALS['DOMAIN'] . '/calendar.php';

        //header('Location: /calendar.php');

    } else {
        header('Location: /homepage.html');
    }

} else {
    try {
        $cronofy->request_token(array("code" => $_GET['code'], "redirect_uri" => $redirect_uri));

        $_SESSION['access_token'] = $cronofy->access_token;
        $_SESSION['refresh_token'] = $cronofy->refresh_token;

        $result = $db->query('UPDATE users set accessToken = "' . $cronofy->access_token . '", renewToken = "' . $cronofy->refresh_token . '" where username = "' . $_SESSION['username'] . '"');

        if (!$result) {
            echo $db->error;
            exit;
        }

        DebugLog("User OAuth successful");
    } catch (CronofyException $ex) {
        DebugLog("User OAuth unsuccessful - " . print_r($ex->error_details(), true) .
            ", message: " . print_r($ex->message_details(), true) .
            ", code: " . print_r($ex->code_details(), true) . ".");
    } finally {
        header('Location: ' . $GLOBALS['DOMAIN'] . '/calendar.php');
    }
}