<div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark navbar-fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand">Employees Portal</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index.php">Homepage</a>
                    </li>
                    <?php
                    if ($ThereIsUser) {
                        if ($didCheckIn) {
                            echo '
                            <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="Checkin.php">Check Out Page</a>
                            </li>
                            ';
                        } else {
                            echo '
                            <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="Checkin.php">Check In Page</a>
                            </li>
                            ';
                        }
                    }
                    ?>
                </ul>
                <ul class="navbar-nav d-flex">
                    <?php
                    if ($ThereIsUser) {
                        echo '
                        <li class="nav-item">
                            <a href="logout.php" class="nav-link">Logout</a>
                        </li>
                        ';
                    } else {
                        echo '
                        <li class="nav-item">
                            <a href="login.php" class="nav-link">Login</a>
                        </li>
                        ';
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
</div>