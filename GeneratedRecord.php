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
            min-height: 100%;
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
                            <h3> Generated Report: </h3>
                            <br>
                            <?PHP
                            $result = $RecCon->getAllRecords();

                            if ($result->num_rows > 0) {
                                echo "<table style='border-collapse: collapse;'>";
                                echo "<thead>";
                                echo "<tr style='border: 1px solid black;'>";
                                echo "<th style='padding: 5px; border: 1px solid black;'>id</th>";
                                echo "<th style='padding: 5px; border: 1px solid black;'>FullName</th>";
                                echo "<th style='padding: 5px; border: 1px solid black;'>Department</th>";
                                echo "<th style='padding: 5px; border: 1px solid black;'>JobTitle</th>";
                                echo "<th style='padding: 5px; border: 1px solid black;'>Email</th>";
                                echo "<th style='padding: 5px; border: 1px solid black;'>ContactNumber</th>";
                                echo "<th style='padding: 5px; border: 1px solid black;'>CheckInTime</th>";
                                echo "<th style='padding: 5px; border: 1px solid black;'>CheckOutTime</th>";
                                echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";

                                // output data of each row
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr style='border: 1px solid black;'>";
                                    echo "<td style='padding: 5px; border: 1px solid black; text-align:center; vertical-align:middle'>" . $row["id"] . "</td>";
                                    echo "<td style='padding: 5px; border: 1px solid black; text-align:center; vertical-align:middle'>" . $row["FullName"] . "</td>";
                                    echo "<td style='padding: 5px; border: 1px solid black; text-align:center; vertical-align:middle'>" . $row["Department"] . "</td>";
                                    echo "<td style='padding: 5px; border: 1px solid black; text-align:center; vertical-align:middle'>" . $row["JobTitle"] . "</td>";
                                    echo "<td style='padding: 5px; border: 1px solid black; text-align:center; vertical-align:middle'>" . $row["Email"] . "</td>";
                                    echo "<td style='padding: 5px; border: 1px solid black; text-align:center; vertical-align:middle'>" . $row["ContactNumber"] . "</td>";
                                    echo "<td style='padding: 5px; border: 1px solid black; text-align:center; vertical-align:middle'>" . $row["CheckInTime"] . "</td>";
                                    echo "<td style='padding: 5px; border: 1px solid black; text-align:center; vertical-align:middle'>" . $row["CheckOutTime"] . "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";
                                echo "</table>";
                            } else {
                                echo "0 results";
                            }

                            echo "
                                <br>
                                <br>
                                <div class='text-center'>
                                    <form method='POST' action='ExportReport.php'>
                                        <input type='submit' class='btn btn-primary btn-lg btn-block' name='DownloadCSV' value='Download CSV'></input>
                                    </form>
                                </div>
                                ";
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