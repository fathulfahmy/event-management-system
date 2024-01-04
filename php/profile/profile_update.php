<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
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

        // variables
        $participantid = $_POST["participantid"];
        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $email = $_POST["email"];
        $password = $_POST["password"];

        // sql
        $sql = "UPDATE participants SET firstname = '$firstname', lastname = '$lastname', 
                email = '$email', password = '$password' WHERE participantid = $participantid";
        $result = mysqli_query($con, $sql);

        // response
        if ($result) {
    ?>
            <div class="container">
                <main>
                    <div class="py-5 text-center">
                        <h2>User Profile</h2>
                        <p>Your profile has been updated. Redirecting you to user profile...</p>
                    </div>
                </main>
            </div>
        <?php
            header("refresh:3;profile.php");
            exit;
        } else {
        ?>
            <div class="container">
                <main>
                    <div class="py-5 text-center">
                        <h2>User Profile</h2>
                        <p>Failed to update your profile. Redirecting you to user profile...</p>
                    </div>
                </main>
            </div>
        <?php
            header("refresh:5;profile.php");
            exit;
        }
        ?>

    <?php else : ?>
        <div class="container">
            <main>
                <div class="py-5 text-center">
                    <h2>Error</h2>
                    <p>Unauthorized access.</p>
                    <a class="btn btn-primary" href="../signin/signin.php">Sign In</a>
                </div>
            </main>
        </div>
    <?php endif; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="../../js/colormodes.js"></script>
    <script src="../../js/navbar.js"></script>
</body>

</html>