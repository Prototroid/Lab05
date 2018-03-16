<html>
    <link href="style.css" rel="stylesheet" type="text/css"/>
    <link href="https://fonts.googleapis.com/css?family=Mukta+Vaani" rel="stylesheet">
</html>

<?php
// https://www.w3schools.com/php/php_mysql_select.asp
//https://stackoverflow.com/questions/11292468/how-to-check-if-value-exists-in-a-mysql-database

//// View User Posts Backend ////
error_reporting(E_ALL);
ini_set("display_errors", 1);

//// Submit ////
if(isset($_POST['submit']))
{
    $mysqli = new mysqli("mysql.eecs.ku.edu", "j961w796", "zaT9uWah", "j961w796");

    /* check connection */
    if ($mysqli->connect_errno)
    {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }

    $username = $_POST['username'];

    //// Posts ////
    $user_postQuery = "SELECT post_id, content, author_id FROM Posts WHERE author_id = '$username'";

    if ($result = $mysqli->query($user_postQuery))
    {
        echo "<body>";

        //// Table ////
        echo "<div class='a'>";
        echo "<h1 style='text-align:center;'> List: Users </h1>";
        echo "</div>";
        echo "<table border='1' align='center'>";

        //// Header ////
        echo "<tr>";
        echo "<th style='text-align:center;'> Post ID </th>";
        echo "<th style='text-align:center;'> Content </th>";
        echo "<th style='text-align:center;'> Author ID </th>";
        echo "</tr>";

        /* fetch associative array */
        while ($row = $result->fetch_assoc())
        {
            echo "<tr>";
            echo "<td style='text-align:center;'>"  .$row["post_id"]. "</td>";
            echo "<td style='text-align:center;'>" .$row["content"]. "</td>";
            echo "<td style='text-align:center;'>" .$row["author_id"]. "</td>";
            echo "</tr>";
        }

        echo "</table>";

        /* free result set */
        $result->free();
    }
    else
    {
        echo "<h3 style='color:red'> No posts for '$username' could be found </h3>";
    }

    echo "<body>";

    /* close connection */
    $mysqli->close();
}

?>