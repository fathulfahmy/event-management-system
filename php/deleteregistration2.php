<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Join Event</title>
</head>

<body>
    <?php
    include "connect.php";
    // variables
    $eventid = $_GET["eventid"];
    $participantid = $_GET["participantid"];

    // sql
    $sql = "DELETE FROM registrations WHERE participantid = '$participantid' AND eventid = '$eventid'";
    $result = mysqli_query($con, $sql) or die("Error deleting data due to " . mysqli_error($con));

    // response
    if ($result) {

        echo "You have successfully left the event.";
        header("location:profile.php#events");
    } else {
        echo "Failed to leave the event.";
        header("location:profile.php#events");
    }
    ?>

</body>

</html>