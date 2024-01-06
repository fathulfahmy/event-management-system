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

            // from registration.php
            $eventid = $_GET["eventid"];
            $participantid = $_GET["participantid"];

            // check participant on registrations table
            $participantsql = "SELECT * FROM registrations WHERE eventid = $eventid AND participantid = $participantid";
            $participantresult = mysqli_query($con, $participantsql) or die("Unable to fetch from registrations table due to " . mysqli_error($con));
            if (mysqli_num_rows($participantresult) == 0) {

                // get quota from events table
                $eventsql = "SELECT * FROM events WHERE eventid = $eventid";
                $eventresult = mysqli_query($con, $eventsql) or die("Unable to fetch from events table due to " . mysqli_error($con));
                while ($eventrow = mysqli_fetch_array($eventresult, MYSQLI_BOTH)) {
                    $quota = $eventrow["quota"];
                }

                // compare number of rows in registrations table with quota
                $registrationsql = "SELECT * FROM registrations WHERE eventid = $eventid";
                $registrationresult = mysqli_query($con, $registrationsql) or die("Unable to fetch from registrations table due to " . mysqli_error($con));
                if (mysqli_num_rows($registrationresult) < $quota) {

                    // insert participant into registrations table
                    $insertsql = "INSERT INTO registrations VALUES(null, '$participantid', '$eventid')";
                    $insertresult = mysqli_query($con, $insertsql) or die("Error in inserting data due to " . mysqli_error($con));
                    header('Location: ' . $_SERVER['HTTP_REFERER']);
                    exit;
                }
            } else {
                header("location:registration.php");
                exit;
            }

        else :
    ?>

            <div class="container">
                <main>
                    <div class="py-5 text-center">
                        <h2>Unauthorized Access</h2>
                        <p>This page contains features which requires administration authority.
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
        header("location:registration.php");
    endif; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="../../js/colormodes.js"></script>
    <script src="../../js/navbar.js"></script>
</body>

</html>