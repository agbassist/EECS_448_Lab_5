<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "agriffin", "password", "agriffin");

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$user_id = $_POST["user_id"];
echo "<h1> $user_id's posts:</h1><br>";


$query = "SELECT content FROM Posts WHERE author_id='$user_id'";
$result = $mysqli->query($query);
$values = $result->fetch_all();

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
