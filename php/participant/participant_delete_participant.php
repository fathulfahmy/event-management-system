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
    // variables
    $participantid = $_GET["participantid"];
    

    // sql
    $sql = "DELETE FROM participants WHERE participantid = '$participantid'";
    $result = mysqli_query($con, $sql) or die("Error deleting data due to " . mysqli_error($con));

    // response
    if ($result) {
        echo "You have successfully deleted the participant.";
        header("location:participant.php");
    } else {
        echo "Failed to delete the participant.";
        header("location:participant.php");
    }
    ?>

    <script src="../../js/colormodes.js"></script>
    <script src="../../js/navbar.js"></script>
</body>

</html>