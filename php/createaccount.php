<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="../css/colormodes.css" />
    <link rel="stylesheet" href="../css/navbar.css" />
</head>

<body>
    <?php
    include "connect.php";
    $firstname = @$_POST["firstname"];
    $lastname = @$_POST["lastname"];
    $username = @$_POST["username"];
    $email = @$_POST["email"];
    $password = @$_POST["password"];

    $valididquery = "SELECT * FROM participants WHERE username = '$username'";
    $valididresult = mysqli_query($con, $valididquery);

    if (mysqli_num_rows($valididresult) > 0) {
    ?>
        <div class="container">
            <main>
                <div class="py-5 text-center">
                    <h2>Error</h2>
                    <p>Data already exist.</p>
                </div>
            </main>
        </div>

        <?php
        header("refresh:5;url=signup.php");
    } else {
        $insertsql = "INSERT INTO participants VALUES (null, '$firstname', '$lastname','$username', '$email', '$password')";
        $insertresult = mysqli_query($con, $insertsql) or die("Error in inserting data due t0" . mysqli_error($con));

        if ($insertresult) {
        ?>
            <div class="container">
                <main>
                    <div class="py-5 text-center">
                        <h2>Sign Up</h2>
                        <p>Your account has been created. Redirecting you to signin page...</p>
                    </div>
                </main>
            </div>
        <?php
        } else {
        ?>
            <div class="container">
                <main>
                    <div class="py-5 text-center">
                        <h2>Error</h2>
                        <p>Failed to create your account. Redirecting you to signin page...</p>
                    </div>
                </main>
            </div>
    <?php
        }
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="../js/colormodes.js"></script>
</body>

</html>