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
    include "../connect.php";
    session_start();
    if (isset($_SESSION["username"])) :
        $userid = $_SESSION["userid"];
        $sessionusername = $_SESSION["username"];
        $role = $_SESSION["role"];

        // from registration.php
        $eventid = $_GET["eventid"];
        $participantid = $_GET["participantid"];

        // delete participant from registrations table
        $sql = "DELETE FROM registrations WHERE participantid = '$participantid' AND eventid = '$eventid'";
        $result = mysqli_query($con, $sql) or die("Error deleting data due to " . mysqli_error($con));
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    else : ?>
        <div class="container">
            <main>
                <div class="py-5 text-center">
                    <h2>Error</h2>
                    <p>Unauthorized access. Redirecting you to signin page...</p>
                    <a class="btn btn-primary" href="../signin/signin.php">Sign In</a>
                </div>
            </main>
        </div>
    <?php endif; ?>

    <script src="../../js/colormodes.js"></script>
    <script src="../../js/navbar.js"></script>
</body>

</html>