<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="../../css/colormodes.css" />
    <link rel="stylesheet" href="../../css/navbar.css" />
</head>

<body>

    <?php
    session_start();
    if (isset($_SESSION["userid"])) {
        session_destroy();
    ?>
        <div class="container">
            <main>
                <div class="py-5 text-center">
                    <h2>Success</h2>
                    <p>You have successfully signed out.</p>
                    <a class="btn btn-primary" href="../signin/signin.php">Sign In</a>
                </div>
            </main>
        </div>

    <?php

        header("refresh: 3; url='../home/home.php'");
    } else {
    ?>
        <div class="container">
            <main>
                <div class="py-5 text-center">
                    <h2>Error</h2>
                    <p>Unauthorized access.</p>
                    <a class="btn btn-primary" href="../signin/signin.php">Sign In</a>
                </div>
            </main>
        </div>
    <?php
    }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="../../js/colormodes.js"></script>
    <script src="../../js/navbar.js"></script>
</body>

</html>