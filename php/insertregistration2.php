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
    $sql = "INSERT INTO registrations VALUES(null, '$participantid', '$eventid')";
    $result = mysqli_query($con, $sql) or die("Error in inserting data due to " . mysqli_error($con));

    // response
    if ($result) {

        echo "You have successfully joined the event.";
        header("location:profile.php#events");
    } else {
        echo "Failed to join the event.";
        header("location:profile.php#events");
    }
    ?>
</body>

</html>