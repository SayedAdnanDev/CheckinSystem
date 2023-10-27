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

        .text {
            align-self: center;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        html,
        body {
            width: 100%;
            height: 100vh;
            background-color: gray;
        }
    </style>
    <meta charset="UTF-8">
    <?php
    include 'Partials/header.php';
    include_once 'Authentication.php';
    $outcome = "";
    if (isset($_POST['submitted'])) {

        $Email = $_POST['Email'];
        $Password = $_POST['Password'];
        $auth = new Authentication();
        $didLogIn = $auth->login($Email, $Password);
        if ($didLogIn) {
            header("Location: Index.php");
        }else {
            $outcome = "wrong email or password";
        }
    }
    ?>
    <title> Login </title>
</head>

<body>
    <?php
    include 'Partials/navigation.php';
    ?>
    <div class="cont">
        <div class="card" style="width: auto; padding: 1rem;">
            <form method="POST">
                <h1 class="center" style="align-self: center;">Login</h1>
                <p class="text-muted"> Please enter your Email and password </p>
                <input type="text" name="Email" placeholder="Email">
                <br />
                <input type="password" name="Password" placeholder="Password">
                <br />
                <input type="submit" value="Login" class="btn btn-primary">
                <input type="hidden" name="submitted" value="TRUE">
                <p><?php echo $outcome;?></p>
            </form>
        </div>
    </div>
    <?php
    include 'Partials/footer.php';
    ?>
</body>

</html>