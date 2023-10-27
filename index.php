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
            <div class="card" style="width: 30%; padding: 1rem;">
                <div class="mb" style="display: flex;flex-direction: column;">
                    <div class="row">
                        <div class=" col-md-6">
                            <h3> Welcome <b><?php echo $user->getName(); ?> </b></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6" style="width: 150rem;">
            <br>
            <br>
            <div class="card" style="width: 30%; padding: 1rem;">
                <form method="post">
                    <div class="mb" style="display: flex;flex-direction: column;">
                        <div class="row">
                            <div class=" col-auto">
                                <p> Enter Reservation Code to View Reservation</p>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Unique Code</span>
                                <input type="text" name="UniqueCode" class="form-control" aria-label="UniqueCode" aria-describedby="basic-addon1" value="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary">Go</button>
                                <input type="hidden" name="submitted">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-auto">
                                <br>
                                <p><?php echo $mslbl ?></p>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <br>
    </div>
    <br>
    <br>
    <?php
    include 'Partials/footer.php';
    ?>
</body>

</html>