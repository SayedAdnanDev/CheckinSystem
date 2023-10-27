<?php
include 'Models/Employee.php';

$oucome = "";
if (isset($_POST['submitted'])) {
    $Email = $_POST['Email'];
    $FullName = $_POST['FullName'];
    $Password = $_POST['Password'];
    $Department = $_POST['Department'];
    $JobTitle = $_POST['JobTitle'];

    $user = new User();
    $cond = $user->CreateUser($email, $password, $username, 2, $nationality, $gender);
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
            <div class="card" style="width: auto; padding: 1rem;">
                <form method="POST">
                    <h1 class="center" style="align-self: center;">Sign Up</h1>
                    <p class="text-muted"> Please enter your Email and password</p>
                    <input type="text" name="Email" placeholder="Email" required>
                    <br />
                    <input type="text" name="Email" placeholder="Email" required>
                    <br />
                    <input type="password" name="Password" placeholder="Password" required>
                    <br />
                    <select class="form-select" name="Department" required>
                        <option value="HR">HR</option>
                        <option value="Sales">Sales</option>
                        <option value="IT">IT</option>
                        <option value="Business">Business</option>
                    </select>
                    <br />
                    <p class="text-muted" style="align-self: center;"> Job Title </p>
                    <br />
                    <input type="text" name="JobTitle" placeholder="Job Title" required>
                    <br />
                    <input type="submit" value="Sign Up" class="btn btn-primary">
                    <input type ="hidden" name="submitted" value="TRUE">
                    <p><?php echo $outcome;?></p>
                </form>
            </div>
        </div>
<?php
include 'Partials/footer.php';
?>
    </body>

</html>