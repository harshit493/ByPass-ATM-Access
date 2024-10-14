<?php include 'connection.php';
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Block card</title>
    <link rel="stylesheet" href="webATM.css">
</head>

<body>
    <div class="p_title">
        <h3>Bypass ATM Access </h3>
    </div>
    <div class="block">
        <span id="b_title"> Blocked the card <br></span>
        Your card has been blocked temporaryily <br> Report this to bank authority for your account safety.
        <div>
            <?php
            session_start();
            $block_query = "UPDATE atmcarddetails SET Blocked=1 WHERE AccNo = '$_SESSION[AccNo]'";
            //$block_query = "UPDATE atmcarddetails SET Blocked=1 WHERE AccNo = 916265534730";
            $result = $conn->query($block_query);
            ?>
        </div>
    </div>
    <div class="base">
        <div class="rules">
            <p>
                <li>Your card is blocked temporarily, not permanently.</li>
                <li>To permanently block your card, contact bank.</li>
                <li>Report the person to the bank.</li>
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