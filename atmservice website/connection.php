<?php
/* database connection */
$server_name = "localhost";
$username = "root";
$password = "";
$database_name = "atmservice";

$conn = mysqli_connect($server_name, $username, $password, $database_name);

if ($conn) {
    
} else {
    echo "conn failed";
}

?>