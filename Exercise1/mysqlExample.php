<html>
    <link href="style.css" rel="stylesheet" type="text/css"/>
    <link href="https://fonts.googleapis.com/css?family=Mukta+Vaani" rel="stylesheet">
</html>

<?php
// https://www.w3schools.com/php/php_mysql_select.asp

$mysqli = new mysqli("mysql.eecs.ku.edu", "j961w796", "zaT9uWah", "j961w796");

/* check connection */
if ($mysqli->connect_errno)
{
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$query = "SELECT SSN, LastName, FirstName, Address, City FROM Persons ORDER by SSN ";

echo "<body>";

if ($result = $mysqli->query($query))
{
    echo "<h3> List: Persons </h3>";

    /* fetch associative array */
    while ($row = $result->fetch_assoc())
    {
        //printf ("%s (%s)\n", $row["Name"], $row["CountryCode"]);
        echo "<h4> SSN: " .$row["SSN"]. "</h4>";
        echo "<h4> LastName: " .$row["LastName"]. "</h4>";
        echo "<h4> FirstName: " .$row["FirstName"]. "</h4>";
        echo "<h4> Address: " .$row["Address"]. "</h4>";
        echo "<h4> City: " .$row["City"]. "</h4>";
    }

    /* free result set */
    $result->free();
}

echo "</body>";

/* close connection */
$mysqli->close();

?>