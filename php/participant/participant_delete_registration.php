<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Participants</title>
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

            // from participant.php
            $participantid = $_GET["participantid"];
            $eventid = $_GET["eventid"];

            // sql
            $sql = "DELETE FROM registrations WHERE participantid = '$participantid' AND eventid = '$eventid'";
            $result = mysqli_query($con, $sql) or die("Error deleting data due to " . mysqli_error($con));

            // response
            if ($result) {
                echo "You have successfully deregister the participant .";
                header('Location: ' . $_SERVER['HTTP_REFERER']);
            } else {
                echo "Failed to deregister the participant.";
                header('Location: ' . $_SERVER['HTTP_REFERER']);
            }

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

    <script src="../../js/colormodes.js"></script>
    <script src="../../js/navbar.js"></script>
</body>

</html>