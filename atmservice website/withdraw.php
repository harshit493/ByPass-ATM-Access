<?php
include 'connection.php';
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Withdrawal</title>
    <link rel="stylesheet" href="webATM.css">
</head>

<body>
    <div class="p_title">
        <h3>Bypass ATM Access </h3>
    </div>
    <p id="wdPageTitle"><br>Withdrawal Page<br></p>
    <div>
        <div id="wdBlock">
            <?php
            session_start();
            $withdraw_query = "SELECT Blocked FROM atmcarddetails WHERE AccNo = '$_SESSION[AccNo]'";
            $result = $conn->query($withdraw_query);
            $row = $result->fetch_assoc();
            $block = $row["Blocked"];
            if ($block > 0) {
                echo "The Card is blocked";
                ?>
                <div class="contact">
                    <b>Contact us <br></b>
                    Bank authority<br>Contact no.:1234567890<br>Email : Bank@gmail.com
                </div>
                <?php
                exit;
            }
            ?>
        </div>
        <div id="wd">
            <?php
            //session_start();
            $withdraw_query = "SELECT WithdrawAmount, WithdrawerMobNo FROM withdrawdetails WHERE AccNo = '$_SESSION[AccNo]'";
            //$withdraw_query = "SELECT WithdrawAmount, WithdrawerMobNo FROM withdrawdetails WHERE AccNo = 123";
            $result = $conn->query($withdraw_query);
            $row = $result->fetch_assoc();
            $Amt = $row["WithdrawAmount"];
            echo "Amount to be withdrawn : Rs. $Amt";
            $Mobno = $row["WithdrawerMobNo"];
            ?>
            <p>Mobile No of the withdrawer : <?php echo $Mobno; ?></p>
        </div>
        <div id="wdButton">
            <form method="post" action="withdraw.php">
                <div class="container">
                    <label for="byppin"><b>Enter Bypass Pin : </b></label>
                    <input type="password" placeholder="" name="byppin" required>

                    <br><button type="submit" name="save">Withdraw</button>
                    <?php
                    if (isset($_POST['save'])) {
                        $Bypin = $_POST['byppin'];
                        $by_query = "SELECT ByPassPin FROM atmcarddetails WHERE AccNo = '$_SESSION[AccNo]'";
                        $res = $conn->query($by_query);
                        $row = $res->fetch_assoc();
                        $Pin = $row["ByPassPin"];
                        if ($Pin == "$Bypin") {
                            $Bypin_query = "UPDATE withdrawdetails SET BypassVerfied=1, WithdrawSuccess=1 WHERE AccNo = '$_SESSION[AccNo]'";
                            $result = $conn->query($Bypin_query);
                            ?>
                            <p id="amt">Amount withdrawed</p>
                            <?php
                        }
                        exit;
                    }
                    ?>
                </div>
            </form>
        </div>
        <!-- need to put mob no of withdrawer, ok and edit button, enter pin and check it from db if ok then update withdrawVerified and withdraw
        success and cancel button-->
    </div>
    <div class="base">
        <div class="rules">
            <p>
                <li>Do not enter bypass pin if you are not sure of the person.</li>
                <li>Enter pin only when image of the person is clearly visible.</li>
                <li>Act wise while doing financial transactions.</li>
                <li>Report the stolen or lost card to the bank and the police to avoid financial frauds.</li>
            </p>
        </div>
        <div class="contact">
            <b>Contact us <br></b>
            Bank authority<br>Contact no.:1234567890<br>Email : Bank@gmail.com
        </div>
    </div>
</body>

</html>