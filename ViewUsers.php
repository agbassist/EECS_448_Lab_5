<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "agriffin", "password", "agriffin");

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$query = "SELECT user_id FROM Users";

$result = $mysqli->query($query);

$values = $result->fetch_all();
echo "<h1>Users:</h1><br>";
echo "<table border='1'>";

    foreach($values as $value){
        echo "<tr><td>";
            echo $value[0];
        echo "</td></tr>";
    }

echo "</table>";

/* close connection */
$mysqli->close();
?>
