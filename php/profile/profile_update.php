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
    if (isset($_POST["submit"])) :
        session_start();
        include "../connect.php";

        $userid = $_POST["userid"];
        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $email = $_POST["email"];
        $password = $_POST["password"];


        if ($_SESSION["role"] == "participant") {
            // get participant email
            $participantsql = "SELECT * FROM participants WHERE participantid = $userid";
            $participantresult = mysqli_query($con, $participantsql);
            $participantrow = mysqli_fetch_array($participantresult, MYSQLI_BOTH);

            $emailsql = "SELECT * FROM participants WHERE email = '$email'";
            $emailresult = mysqli_query($con, $emailsql);

            // email already exist
            if (mysqli_num_rows($emailresult) > 0 && $email != $participantrow["email"]) :
    ?>

                <div class="container">
                    <main>
                        <div class="py-5 text-center">
                            <h2>Email already exist</h2>
                            <p>Please try again. Redirecting you to user profile...</p>
                        </div>
                    </main>
                </div>

            <?php
                header("refresh:3;url=profile.php");
                exit;

            else :
                // update participant in particiants table
                $sql = "UPDATE participants SET firstname = '$firstname', lastname = '$lastname', 
                email = '$email', password = '$password' WHERE participantid = $userid";
            endif;
        } else {
            // get admin email
            $adminsql = "SELECT * FROM admins WHERE adminid = $userid";
            $adminresult = mysqli_query($con, $adminsql);
            $adminrow = mysqli_fetch_array($adminresult, MYSQLI_BOTH);

            $emailsql = "SELECT * FROM admins WHERE email = '$email'";
            $emailresult = mysqli_query($con, $emailsql);

            // email already exist
            if (mysqli_num_rows($emailresult) > 0 && $email != $adminrow["email"]) :
            ?>

                <div class="container">
                    <main>
                        <div class="py-5 text-center">
                            <h2>Email already exist</h2>
                            <p>Please try again. Redirecting you to user profile...</p>
                        </div>
                    </main>
                </div>

            <?php
                header("refresh:3;url=profile.php");
                exit;
            else :

                // update admin in admins table
                $sql = "UPDATE admins SET firstname = '$firstname', lastname = '$lastname', 
                email = '$email', password = '$password' WHERE adminid = $userid";
            endif;
        }

        $result = mysqli_query($con, $sql);

        if ($result) :
            ?>

            <div class="container">
                <main>
                    <div class="py-5 text-center">
                        <h2>Success</h2>
                        <p>Your profile has been updated. Redirecting you to user profile...</p>
                    </div>
                </main>
            </div>

        <?php
            header("refresh:3;profile.php");
            exit;
        else :
        ?>

            <div class="container">
                <main>
                    <div class="py-5 text-center">
                        <h2>Error</h2>
                        <p>Failed to update your profile. Redirecting you to user profile...</p>
                    </div>
                </main>
            </div>

    <?php
            header("refresh:3;profile.php");
            exit;


        endif;

    else :
        header("location:profile.php");
    endif;
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="../../js/colormodes.js"></script>
    <script src="../../js/navbar.js"></script>
</body>

</html>