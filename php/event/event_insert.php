<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="../../css/colormodes.css" />
    <link rel="stylesheet" href="../../css/navbar.css" />
</head>

<body>
    <?php
    include "../connect.php";
    session_start();
    if (isset($_SESSION["username"])) :
        $userid = $_SESSION["userid"];
        $sessionusername = $_SESSION["username"];
        $role = $_SESSION["role"];

        if ($role == "admin") :

            // from event.php
            $eventname = $_POST["eventname"];
            $quota = $_POST["quota"];

            // insert new event into events table
            $sql = "INSERT INTO events VALUES (null, '$eventname', '$quota' )";
            $result = mysqli_query($con, $sql);

            if ($result) :
    ?>
                <div class="container">
                    <main>
                        <div class="py-5 text-center">
                            <h2>Added</h2>
                            <p>Successfully added event. Redirecting you back...</p>
                        </div>
                    </main>
                </div>
            <?php
                header("refresh:3;url=event.php");
                exit;
            else :
            ?>
                <div class="container">
                    <main>
                        <div class="py-5 text-center">
                            <h2>Error</h2>
                            <p>Failed to add event. Redirecting you back...</p>
                        </div>
                    </main>
                </div>
            <?php
                header("refresh:3;url=event.php");
                exit;
            endif;
        else : ?>

            <div class="container">
                <main>
                    <div class="py-5 text-center">
                        <h2>Error</h2>
                        <p>Restricted to admin. Redirecting you to homepage...</p>
                    </div>
                </main>
            </div>

        <?php
            header("refresh:3;url='../home/home.php'");
            exit;
        endif;
    else :
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

    <?php endif; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="../../js/colormodes.js"></script>
    <script src="../../js/navbar.js"></script>
</body>

</html>