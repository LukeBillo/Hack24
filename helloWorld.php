<html>
    <body>
    <h1>
        <?php
        /**
         * Created by PhpStorm.
         * User: Victor
         * Date: 18/03/2017
         * Time: 12:53
         */

        echo helloWorld::is_Power_of_Two(4);
        echo helloWorld::is_Power_of_Two(32);
        echo helloWorld::is_Power_of_Two(5);

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
        ?>
    </h1>
    </body>
</html>
