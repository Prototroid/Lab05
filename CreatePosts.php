<html>
    <link href="style.css" rel="stylesheet" type="text/css"/>
    <link href="https://fonts.googleapis.com/css?family=Mukta+Vaani" rel="stylesheet">
</html>

<?php
//https://stackoverflow.com/questions/11292468/how-to-check-if-value-exists-in-a-mysql-database

//// Create Post Backend ////
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
    $user_post = $_POST['user_post'];

    echo "<div class='a'>";
    echo "<h2> You entered username: $username </h2>";
    echo "<h2> Your thoughts were: $user_post </h2></div>";
    echo "<br>";

    //// Users List ////
    $userQuery = "SELECT user_id FROM Users WHERE user_id = '$username'";
    $result = $mysqli->query($userQuery);

    //// Post validation ////
    if ($result->num_rows == 0)
    {   
        //// User Doesn't Exist ////
        echo "<h3 style='color:red'> Looks like that username doesn't exist! </h3>";
        echo "<h3> Try creating a username and coming back next time! </h3>";
    }
    else
    {
        //// User Exists ////
        echo "<h3 style='color:green'> High five for expressing your feelings! </h3>";
        $user_postAdd = "INSERT INTO Posts (author_id, content) VALUES ('" .$username. "', '" .$user_post. "')";
        $mysqli->query($user_postAdd);
        echo "<h3> Post has been added! </h3>";
    }

    /* free result set */
    $result->free();

    echo "</body>";
    $mysqli->close();
}
?>