<?php


require_once 'DB.php';

$db = Database::getInstance();

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
    ?>
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
            <div class="card" style="width: 50%; padding: 1rem;">
                <div class="mb" style="display: flex;flex-direction: column;">
                    <div class="row">
                        <div class=" col-md-6">
                            <h3> Welcome 
                                <b>
                                    <p></p>
                                    <?php
                                    if (isset($_SESSION["EmployeeName"])) {
                                        echo $_SESSION["EmployeeName"];
                                    } else {
                                        echo "Please Sign in to view Your records";
                                    }
                                    ?>
                                </b>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="card" style="width: 50%; padding: 1rem;">
                <div class="mb" style="display: flex;flex-direction: column;">
                    <div class="row">
                        <div class=" col-md-6">
                            <h3> Visit the Check In Page <a href="checkin.php" style="text-decoration:none;">Here </a> !!!</h3>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="card" style="width: 50%; padding: 1rem;">
                <div class="mb" style="display: flex;flex-direction: column;">
                    <div class="row">
                        <div class=" col-md-6">
                            <h3> View Your Records <a href="ViewRecords.php" style="text-decoration:none;">Here </a> !!!</h3>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="card" style="width: 50%; padding: 1rem;">
                <div class="mb" style="display: flex;flex-direction: column;">
                    <div class="row">
                        <div class=" col-md-6">
                            <h3> Generate The Attendance Report <a href="GeneratedRecord.php" style="text-decoration:none;">Here </a> !!!</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br />
    </div>
</body>

</html>