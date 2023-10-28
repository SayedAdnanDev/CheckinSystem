<?php


require_once 'DB.php';
require_once 'CheckinController.php';

$db = Database::getInstance();

$chk = new CheckinController();

if(isset($_POST["CheckIn"])){
    $chk->CheckIn();
} elseif (isset($_POST["CheckOut"])) {
    $chk->CheckOut();
}

?>

<!DOCTYPE html>

<html>

<head>
    <style>
        .cont {
            display: flex;
            align-content: center;
            align-items: center;
            justify-content: center;
            background-color: white;
            width: 100%;
            height: 100vh;
            flex-direction: row;
        }

        .input {
            align-self: center;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        p {
            display: flex;
            flex-direction: row;
            align-content: center;
            align-items: center;
            justify-content: center;
        }

        html,
        body {
            width: 100% !important;
            height: 100%;
            background-color: gray;
        }
    </style>
    <?php
    include 'Partials/header.php';

    if(!isset($_SESSION['EmployeeID'])){
        header('Location: Login.php');
    }
    ?>
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Orbitron'>
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Aldrich'>
    <link rel="stylesheet" href="digitalClock/clock.css" />
    <meta charset="UTF-8">
    <title> HomePage </title>
</head>

<body>
    <?php
    include 'Partials/navigation.php';
    ?>
    <br>
    <div class="row" style="padding-left: 3rem;width:100%!important">
        <div class="col-md-6" style="width: 150rem;">
            <div class="card" style="width: 35%; padding: 1rem;">
                <div class="mb" style="display: flex;flex-direction: column;">
                    <div class="row">
                        <div class=" col-md-6">
                            <?php
                            if ($didCheckIn) {
                                echo '
                                <h3> Check Out
                                </h3>
                                ';
                            } else {
                                echo '
                                <h3> Check In 
                                </h3>
                                ';
                            }
                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class=" col-md-6">
                            <br>
                            <br>
                            <div id="MyClockDisplay" class="clock" onload="showTime()"></div>
                            <script src="digitalClock/script.js"></script>
                            <br>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <?php
                            if ($didCheckIn) {
                                echo "
                                <div class='text-center'>
                                    <form method='POST'>
                                        <input type='submit' class='btn btn-primary btn-lg btn-block' name='CheckOut' value='Check Out'></input>
                                    </form>
                                </div>
                                ";
                            } else {
                                echo "
                                <div class='text-center'>
                                    <form method='POST'>
                                        <input type='submit' class='btn btn-primary btn-lg btn-block' name='CheckIn' value='Check In'></input>
                                    </form>
                                </div>
                                ";
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <br />
    </div>
</body>

</html>