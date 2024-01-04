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

    $eventname = $_POST["eventname"];
    $quota = $_POST["quota"];

    $inserteventsql = "INSERT INTO events VALUES (null, '$eventname', '$quota' )";
    $result = mysqli_query($con, $inserteventsql);

    if ($result) {
    ?>
        <div class="container">
            <main>
                <div class="py-5 text-center">
                    <h2>Insert Event</h2>
                    <p>Event successfully inserted. Redirecting you to manage event page...</p>
                </div>
            </main>
        </div>
    <?php
        header("refresh:5;url=event.php");
    } else {
    ?>
        <div class="container">
            <main>
                <div class="py-5 text-center">
                    <h2>Error</h2>
                    <p>Failed to add event. Redirecting you to manage event...</p>
                </div>
            </main>
        </div>
    <?php
        header("refresh:5;url=event.php");
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="../../js/colormodes.js"></script>
    <script src="../../js/navbar.js"></script>
</body>

</html>