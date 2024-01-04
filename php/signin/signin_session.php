<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign In</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="../../css/colormodes.css" />
    <link rel="stylesheet" href="../../css/navbar.css" />
</head>

<body>
    <?php
    include "../connect.php";

    if (isset($_POST["username"])) {
        // from signin.php
        $username = $_POST["username"];
        $password = $_POST["password"];

        // check username on admins table
        $adminsql = "SELECT * FROM admins WHERE username = '$username'";
        $adminresult = mysqli_query($con, $adminsql);

        if (mysqli_num_rows($adminresult) > 0) {
            while ($adminrow = mysqli_fetch_array($adminresult, MYSQLI_BOTH)) {
                if ($password == $adminrow["password"]) {
                    // user is admin and password match
                    session_start();
                    $_SESSION["userid"] = $adminrow["adminid"];
                    $_SESSION["username"] = $username;
                    $_SESSION["role"] = "admin";
                    header("location:../home/home.php");
                    exit;
                } else {
                    echo "Wrong password. Redirecting you back...";
                    header("refresh:3;url='signin.php'");
                    exit;
                }
            }
        } else {

            // check username on participants table
            $participantsql = "SELECT * FROM participants WHERE username = '$username'";
            $participantresult = mysqli_query($con, $participantsql);

            if (mysqli_num_rows($participantresult) > 0) {
                while ($participantrow = mysqli_fetch_array($participantresult, MYSQLI_BOTH)) {
                    if ($password == $participantrow["password"]) {
                        // user is participant and password match
                        session_start();
                        $_SESSION["userid"] = $participantrow["participantid"];
                        $_SESSION["username"] = $username;
                        $_SESSION["role"] = "participant";
                        header("location: ../home/home.php");
                        exit;
                    } else {
                        echo "Wrong password. Redirecting you back...";
                        header("refresh:3;url='signin.php'");
                        exit;
                    }
                }
            } else {
                echo "Username  does not exist. Redirecting you back...";
                header("refresh:3;url='signin.php'");
                exit;
            }
        }
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="../../js/colormodes.js"></script>
    <script src="../../js/navbar.js"></script>
    <script src="../../js/validateform.js"></script>
</body>

</html>