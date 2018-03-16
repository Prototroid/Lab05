<html>
    <link href="style.css" rel="stylesheet" type="text/css"/>
    <link href="https://fonts.googleapis.com/css?family=Mukta+Vaani" rel="stylesheet">
</html>

<?php
//https://stackoverflow.com/questions/11292468/how-to-check-if-value-exists-in-a-mysql-database

// Create User Backend ////
error_reporting(E_ALL);
ini_set("display_errors", 1);

//// Username validation ////
if(isset($_POST['submit']))
{
    //// Access database ////
    $mysqli = new mysqli("mysql.eecs.ku.edu", "j961w796", "zaT9uWah", "j961w796");

    /* check connection */
    if ($mysqli->connect_errno)
    {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }

    echo "<body>";

    $username = $_POST['username'];

    echo "<div class='a'>";
    echo "<h2> You entered: $username </h2></div>";
    echo "<br>";

    //// Users List ////
    $userQuery = "SELECT user_id FROM Users WHERE user_id = '$username'";
    $result = $mysqli->query($userQuery);

    //// Checking Users ////
    if ($result->num_rows == 0)
    {   
        echo "<h3 style='color:green'> You're in luck! Nobody has a username quite like yours my friend! </h3>";
        $usernameAdd = "INSERT INTO Users (user_id) VALUES ('" .$username. "')";
        $mysqli->query($usernameAdd);
    }
    else
    {
        echo "<h3 style='color:red'> Looks like that username already exists! </h3>";
        echo "<h3> Better luck next time! </h3>";
    }

    /* free result set */
    $result->free();

    echo "</body>";
    $mysqli->close();
}
?>