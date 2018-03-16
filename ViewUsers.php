<html>
    <link href="style.css" rel="stylesheet" type="text/css"/>
    <link href="https://fonts.googleapis.com/css?family=Mukta+Vaani" rel="stylesheet">
</html>

<?php
// https://www.w3schools.com/php/php_mysql_select.asp
//https://stackoverflow.com/questions/11292468/how-to-check-if-value-exists-in-a-mysql-database

//// View Users Backend ////
error_reporting(E_ALL);
ini_set("display_errors", 1);

$mysqli = new mysqli("mysql.eecs.ku.edu", "j961w796", "zaT9uWah", "j961w796");

/* check connection */
if ($mysqli->connect_errno)
{
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

//// Users ////
$userQuery = "SELECT user_id FROM Users ORDER by user_id ";

if ($result = $mysqli->query($userQuery))
{
    echo "<body>";

    //// Table ////
    echo "<div class='a'>";
    echo "<h1 style='text-align:center;'> List: Users </h1>";
    echo "</div>";
    echo "<table border='1' align='center'>";

    //// Header ////
    echo "<tr>";
    echo "<th style='text-align:center;'> User ID </th>";
    echo "</tr>";

    /* fetch associative array */
    while ($row = $result->fetch_assoc())
    {
        echo "<tr>";
        echo "<td style='text-align:center;'>" .$row["user_id"]. "</td>";
        echo "</tr>";
    }

    echo "</table>";

    /* free result set */
    $result->free();
}
else
{
    echo "<h3 style='color:red'> List: 'Users' was not found </h3>";
}

echo "</body>";

/* close connection */
$mysqli->close();

?>