<?php


require_once 'DB.php';

$db = Database::getInstance();

require_once 'RecordsController.php';

$RecCon = new RecordsController();

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

    if (!isset($_SESSION['EmployeeID'])) {
        header('Location: Login.php');
    }
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
                            <h3> Attendance Records: </h3>
                            <br>
                            <?PHP
                            $result = $RecCon->getAllRecordsByID($_SESSION['EmployeeID']);
                            if (isset($result)) {
                                echo "<table style='border-collapse: collapse;'>";
                                echo "<tr><th style='border: 1px solid black; padding: 5px;'>Record ID</th><th style='border: 1px solid black; padding: 5px;'>EmployeeID</th><th style='border: 1px solid black; padding: 5px;'>CheckInTime</th><th style='border: 1px solid black; padding: 5px;'>CheckOutTime</th></tr>";
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr><td style='border: 1px solid black; padding: 5px;'>" . $row["id"] . "</td><td style='border: 1px solid black; padding: 5px;'>" . $row["EmployeeID"] . "</td><td style='border: 1px solid black; padding: 5px;'>" . $row["CheckInTime"] . "</td><td style='border: 1px solid black; padding: 5px;'>" . $row["CheckOutTime"] . "</td></tr>";
                                }
                                echo "</table>";
                            } else {
                                echo '<p> No records Yet </p>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <br>
        </div>
        <br />
    </div>
</body>

</html>