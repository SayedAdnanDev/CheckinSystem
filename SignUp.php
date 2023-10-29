<?php
include 'Models/Employee.php';

$outcome = "";
if (isset($_POST['submitted'])) {
    $Email = $_POST['Email'];
    $FullName = $_POST['FullName'];
    $Password = $_POST['Password'];
    $Department = $_POST['Department'];
    $PhoneNumber = $_POST['PhoneNumber'];
    $JobTitle = $_POST['JobTitle'];

    $employee = new Employee();

    $hashedPassword = password_hash($Password, PASSWORD_DEFAULT);

    $data = array(
        'Email' => $Email,
        'FullName' => $FullName,
        'PasswordHash' => $hashedPassword,
        'Department' => $Department,
        'ContactNumber' => $PhoneNumber,
        'JobTitle' => $JobTitle
    );

    $cond = $employee->save($data);

    if ($cond) {
        header("Location: login.php");
    } else {
        $outcome = "make sure to fill in all fields";
    }
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
        }

        html,
        body {
            width: 100%;
            height: 100vh;
            background-color: gray;
        }
    </style>
    <?php
    include 'Partials/header.php';
    ?>
    <meta charset="UTF-8">
    <title> Sign Up </title>
</head>

<body>
    <?php
    include 'Partials/navigation.php';
    ?>
    <div class="cont">
        <div class="card" style="width: auto; padding: 2rem;">
            <form method="POST">
                <h1 class="center" style="align-self: center;">Sign Up</h1>
                <p class="text-muted"> Please enter your Email and password</p>
                <input type="text" name="FullName" placeholder="Full Name" required>
                <br />
                <input type="text" name="Email" placeholder="Email" required>
                <br />
                <input type="password" name="Password" placeholder="Password" required>
                <br />
                <p class="text-muted"> Select Your Department</p>
                <select class="form-select" name="Department" required>
                    <option value="HR">HR</option>
                    <option value="Sales">Sales</option>
                    <option value="IT">IT</option>
                    <option value="Business">Business</option>
                </select>
                <br />
                <input type="text" name="PhoneNumber" placeholder="+973 xxxxxxxx" required>
                <br />
                <input type="text" name="JobTitle" placeholder="Job Title" required>
                <br />
                <input type="submit" value="Sign Up" class="btn btn-primary">
                <input type="hidden" name="submitted" value="TRUE">
                <p>
                    <?php echo $outcome; ?>
                </p>
            </form>
        </div>
    </div>
</body>

</html>