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
    // variables
    $eventid = $_GET["eventid"];
    $participantid = $_GET["participantid"];

    // sql
    $sql = "INSERT INTO registrations VALUES(null, '$participantid', '$eventid')";
    $result = mysqli_query($con, $sql) or die("Error in inserting data due to " . mysqli_error($con));

    // response
    if ($result) {

        echo "You have successfully joined the event.";
        header("location:registration.php");
    } else {
        echo "Failed to join the event.";
        header("location:registration.php");
    }
    ?>

    <script src="../../js/colormodes.js"></script>
    <script src="../../js/navbar.js"></script>
</body>

</html>