<?php
include "./Partials/header.php";
//check if the user is logged in
if ($ThereIsUser) {
    //logout the user
    session_unset();
    session_destroy();
    $ThereIsUser = false;
    $didCheckIn = false;
}
//redirect the user to the index page
header("Location: index.php");
