<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Join Event</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="../../css/colormodes.css" />
    <link rel="stylesheet" href="../../css/navbar.css" />
</head>

<body>
    <?php
    session_start();
    if (isset($_SESSION["role"])) :
        if ($_SESSION["role"] == "participant") :
            include "../connect.php";

            // variables
            $eventid = $_GET["eventid"];
            $participantid = $_GET["participantid"];

            // sql
            $sql = "DELETE FROM registrations WHERE participantid = '$participantid' AND eventid = '$eventid'";
            $result = mysqli_query($con, $sql) or die("Unable to delete from registrations table due to " . mysqli_error($con));
            header("location:profile.php#events");

        else :
    ?>

            <div class="container">
                <main>
                    <div class="py-5 text-center">
                        <h2>Unauthorized Access</h2>
                        <p>This page contains features which requires participant account.
                            <br>
                            Redirecting you to homepage...
                        </p>
                    </div>
                </main>
            </div>

    <?php
            header("refresh:5;url='../home/home.php'");
            exit;
        endif;
    else :
        header("location:profile.php#event");
    endif; ?>

    <script src="../../js/colormodes.js"></script>
    <script src="../../js/navbar.js"></script>
</body>

</html>