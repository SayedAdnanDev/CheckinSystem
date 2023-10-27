<?php

include_once './Models/Employee.php';
//start the session
if (!isset($_SESSION)) {
  session_start();
}

// to initialize a user in every page
$ThereIsUser = false;

if (isset($_SESSION['EmployeeID'])) {
  $id = $_SESSION['EmployeeID'];
  if ($id < 0) {
  } else {
    $ThereIsUser = true;
  }
}
?>


<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

<style>
  footer {
    position: fixed;
    left: 0px;
    bottom: 0px;
    width: 100%;
    display: flex;
    flex-direction: column;
    width: 100%;
    background-color: #212529;
    color: white;
    text-align: center;
    align-content: center;
    align-items: center;
    justify-content: center;
  }
</style>