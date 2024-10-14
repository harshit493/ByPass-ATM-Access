<?php
include 'connection.php';
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deny</title>
    <link rel="stylesheet" href="webATM.css">
</head>
<body>
<div class="p_title">
        <h3>Bypass ATM Access </h3>
    </div>
    <div class="block">
        <span id="b_title"> Denied the permission for money withdrawal <br></span>
        Permission for money withdrawal has been denied and no action is taken against the person or the card.
        <?php
        session_start();
       $deny_query = "UPDATE withdrawdetails SET WithdrawSuccess=-1 WHERE AccNo = '$_SESSION[AccNo]'";
        //$deny_query = "UPDATE withdrawdetails SET WithdrawSuccess=-1 WHERE AccNo = 916265534730";
        $result = $conn->query($deny_query);
         ?>
    </div>
    <div class="base">
    <div class="rules">
           <p>
            <li>Your card is not blocked.Only permission to withdraw money is denied.</li>
            <li>It does not change anything in your account.</li>
            <li>Deny permission if you do not recognize the person.</li>
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