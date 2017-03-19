<?php

session_start();

require_once ('common.php');

$interests = [];



?>

<html>
    <body style="background-color: #66CEFF">
    <h2>Welcome to your homepage</h2>
    <h2>Your interests are:</h2>
    <?php
    $result = $db->query('SELECT * FROM userinterests where username = "' . $_SESSION['username'] . '"');

    // if the result obj === false then there is a mysql error
    if (!$result) {
        echo $db->error;
    }

    // loop through return results and print to screen but keep track of them
    while ($row = $result->fetch_assoc()) {
        // array push shorthand
        $interests[] = $row['tag'];
        echo ':) ' . $row['tag'] . '<br>';
    }
    ?>

    <h2>Your calender is:</h2>
    <div style="background-color: #FFFFFF">

        <table border="1">
            <?php

            $tbl_users = "users";
            $tbl_userInterests = "userInterests";
            $tbl_interests = "interests";
            $tbl_participants = "participants";
            $tbl_events = "events";
            $tbl_eventHistory = "eventHistory";
            ?>
        </table>
    </div>

    <h2>Events in the local area:</h2>
    <?php
    $where =  '"' . join('", "',$interests) . '"';
    $result = $db->query('SELECT * FROM events where interest IN (' . $where . ')');

    if (!$result) {
        echo $db->error;
    }

    while ($row = $result->fetch_assoc()) {
        echo 'Event: ' . $row['name'] . '<br>';
        echo $row['description'] . '<br>';
        echo 'Creator: ' . $row['author'] . '<br>';
        echo 'Based on your interest #' . $row['interest'] . '<br>';
    }

    ?>
    </body>
</html>
