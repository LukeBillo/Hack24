<html>
    <body>
    <h3>
        <?php
        session_start();
        /**
         * Created by PhpStorm.
         * User: Victor
         * Date: 18/03/2017
         * Time: 12:53
         */
        //echo $_POST ["usernameInput"];
        //"<br>";
        //echo $_POST ["passwordInput"];
//        "<br>";

        //echo helloWorld::is_Power_of_Two(4);
        //echo helloWorld::is_Power_of_Two(32);
        //echo helloWorld::is_Power_of_Two(5);

        class helloWorld
        {

            function is_Power_of_Two($n)
            {
                //code here.
                $testVar = -1;
                do
                {
                    $testVar = $testVar + 1;
                    if ($n == pow(2, $testVar))
                    {
                        return "$n is a power of two. <br>";
                    }
                    elseif ($n < pow(2, $testVar))
                    {
                        return "$n is not a power of two. <br>";
                    }
                } while ($n >= pow(2, $testVar));
            }
        }
        class authenticator
        {
            function loginVerify()
            {
                //code here
                if (isset( $_POST["usernameInput"] ) AND isset( $_POST["passwordInput"] ))
                {
                    //authentication stuff
                    $_SESSION["loggedin"] = True;
                    header("location: homepage");
                }


            }
        }
        ?>
    </h3>
    </body>
</html>
