<?php
include 'connection.php';
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="log.css">
    <script src="log.php"></script>
</head>

<body>
    <div class="gen">
        <form action="log.php" method="post">
            <div class="container">
                <h1><b>ByPass ATM Access Login</b></h1>
                <label for="uname"><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="uname" required>

                <label for="psw"><br><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="psw" required>

                <button type="submit" name="save">Login</button>
            </div>
        </form>
    </div>
</body>

</html>

<?php
session_start();

if (isset($_POST['save'])) {
    $_SESSION['UserID'] = $_POST['uname'];
    $Pass = $_POST['psw'];
    /*$sql_query = "INSERT INTO log(uname,psw)
    VALUES ('$uname','$psw')";*/
    $sql_query = "SELECT AccNo FROM accountdetails WHERE UserID = '$_SESSION[UserID]' AND Pass = '$Pass'";
    $result = $conn->query($sql_query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['AccNo'] = $row["AccNo"];
        //echo "$AccNo";
        header("Location: webATM.php?AccNo=" . $AccNo);
    } else {
        echo "Invalid password or username";
    }

    //if (mysqli_query($conn, $sql_query)) {
    //  echo "$AccNo";
    /*echo "New Details Entry inserted successfully !";*/
    //echo "okay";
    //header("Location: webATM.html");
    //} else {
    //  echo "Invaild Password or username";
    //}
}

//$sql = "SELECT id, firstname, lastname FROM your_table";
//$result = $conn->query($sql);

// Check if there are results
//if ($result->num_rows > 0) {
// Output data of each row
//while($row = $result->fetch_assoc()) {
//echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
//}
//} else {
//  echo "0 results";
//}

// Close connection
//$conn->close();

?>