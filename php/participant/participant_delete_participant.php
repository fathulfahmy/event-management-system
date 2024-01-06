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
    session_start();
    if (isset($_SESSION["role"])) :
        if ($_SESSION["role"] == "admin") :
            include "../connect.php";

            // from participant.php
            $participantid = $_GET["participantid"];

            // delete participant from participants table
            $sql = "DELETE FROM participants WHERE participantid = '$participantid'";
            $result = mysqli_query($con, $sql) or die("Error deleting data due to " . mysqli_error($con));
            header("location:participant.php");

        else : ?>

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
        header("location:participant.php");
        exit;
    endif;
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="../../js/colormodes.js"></script>
    <script src="../../js/navbar.js"></script>
</body>

</html>