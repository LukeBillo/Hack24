<html>
    <body style="background-color: #66CEFF">
    <h2>Welcome to your homepage0</h2>
    <div style="background-color: #FFFFFF">
    <table border="1">
        <?php
        /**
         * Created by PhpStorm.
         * User: Victor
         * Date: 18/03/2017
         * Time: 17:50
         */

        $host = "localhost";
        $username = "";
        $password = "";
        $db_name = "hack24";
        $connection = mysqli_connect("$host","$username","$password","$db_name");
        if (mysqli_connect_errno())
        {
            echo "The application has failed to connect to the mysql database server: " .mysqli_connect_error();
        }
        $tbl_users = "users";
        $tbl_userInterests = "userInterests";
        $tbl_interests = "interests";
        $tbl_participants = "participants";
        $tbl_events = "events";
        $tbl_eventHistory = "eventHistory";
        ?>
    </table>
    </div>
    </body>
</html>
