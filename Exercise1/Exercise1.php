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

//// Users ////
$userQuery = "SELECT user_id FROM Users ORDER by user_id ";

if ($result1 = $mysqli->query($userQuery))
{
    echo "<h3> List: Users </h3>";
    echo "<div> </div>";

    /* fetch associative array */
    while ($row = $result1->fetch_assoc())
    {
        echo "<h4> User ID: " .$row["user_id"]. "</h4>";
    }

    /* free result set */
    $result1->free();
}
else
{
    echo "<h3> List: 'Users' was not found </h3>";
}

//// Posts ////
$postQuery = "SELECT post_id, content, author_id FROM Posts ORDER by post_id ";

if ($result2 = $mysqli->query($postQuery))
{
    echo "<h3> List: Posts </h3>";
    echo "<div> </div>";

    /* fetch associative array */
    while ($row = $result2->fetch_assoc())
    {
        echo "<h4> Post ID: " .$row["post_id"]. "</h4>";
        echo "<h4> Content: " .$row["content"]. "</h4>";
        echo "<h4> Author ID: " .$row["author_id"]. "</h4>";
    }

    /* free result set */
    $result2->free();
}
else
{
    echo "<h3> List: 'Posts' was not found </h3>";
}

/* close connection */
$mysqli->close();

?>