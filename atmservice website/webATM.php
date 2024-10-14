<?php
include "connection.php";
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WebATM</title>
    <link rel="stylesheet" href="webATM.css">
    <script src="webATM.js"></script>
    <script src="log.php"></script>
</head>

<body>
    <div>
        <h3 id="title">Bypass ATM Access </h3>
    </div>
    <div>
        <p>
        <h2>Image of the person requesting permission to withdraw money.;</h2>
        </p>
        <div> <!-- inserting img from the database-->
           <?php
            session_start();
            $img_query = "SELECT WithdrawerImage FROM withdrawdetails WHERE AccNo = '$_SESSION[AccNo]'";
            //$img_query = "SELECT WithdrawerImage FROM withdrawdetails WHERE AccNo = 123";
            $result = $conn->query($img_query);
            $row = $result->fetch_assoc();
            $Img = $row["WithdrawerImage"];
            //echo '<img src="data:Img/jpeg;base64,' . $row['WithdrawerImage'] . '" />';
            //echo '<img src="./withdrawdetails/<?php echo $row['WithdrawerImage'];
            //echo '<img class="img_dec" src="data:Img/jpeg;base64,' . base64_encode($row['WithdrawerImage']) . '" />';
            ?>
        </div>
        <img src="face-img.png" alt="Can't load the image">
        <p id="img_desc">*Take the requried action as needed.if you unable to recognize the person, do not allow to
            withdraw money to avoid any financial loss.<br>*Deny the permission if you are unable to see the image of
            the person.</p>
    </div>
    <div id="button">
        <a href="withdraw.php"><button>Withdraw</button></a>
        <a href="deny.php"><button>Deny</button></a>
        <a href="block.php"><button>Block</button></a>
    </div>

    <div class="base-timer">
        <p>
        <h3><b>Site become inactive after</b></h3>
        </p>
        <div>

        </div>
        <div class="base-timer" , id="timer">
            <span><!-- Remaining time label --> </span><b> min</b>
        </div>
    </div>

    <div>
        <p>
            <li>Page becomes inactive after the timer stops.</li>
            <li>Allowing to withdraw will debit money fromm your account.</li>
            <li>Denying the request will only ignore the request. It wont take any action against the person.</li>
            <li>If you do not recognize the person you can block the request and card temporaryily from here and report
                the person to the authority and take required action against them.</li>
            <li>Act wisely to avoid any financial loss.</li>
        </p>
    </div>
</body>

</html>