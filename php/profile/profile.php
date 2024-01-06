<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>User Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="../../css/colormodes.css" />
    <link rel="stylesheet" href="../../css/navbar.css" />
</head>

<body>
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark" aria-label="Main navigation">
        <div class="container-fluid">
            <a class="navbar-brand" href="../home/home.php">Uniten Esports</a>
            <button class="navbar-toggler p-0 border-0" type="button" id="navbarSideCollapse" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="../home/home.php">Home</a>
                    </li>

                    <?php
                    session_start();
                    if (isset($_SESSION["role"])) :
                        if ($_SESSION["role"] == "participant") :
                    ?>

                            <!-- participant -->
                            <li class="nav-item">
                                <a class="nav-link" href="../registration/registration.php">Join Event</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="../profile/profile.php">Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../signout/signout.php">Sign Out</a>
                            </li>

                        <?php else : ?>

                            <!-- admin -->
                            <li class="nav-item">
                                <a class="nav-link" href="../event/event.php">Manage Event</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../participant/participant.php">Manage Participant</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link admin" href="../profile/profile.php">Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../signout/signout.php">Sign Out</a>
                            </li>

                        <?php
                        endif;
                    else : ?>

                        <!-- visitor -->
                        <li class="nav-item">
                            <a class="nav-link" href="../registration/registration.php">Join Event</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../signin/signin.php">Sign In</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../signup/signup.php">Sign Up</a>
                        </li>

                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <?php
    if (isset($_SESSION["role"])) :
        include "../connect.php";
        $userid = $_SESSION["userid"];
        $role = $_SESSION["role"];

        if ($role == "participant") {
            // get participant information from participants table
            $sql = "SELECT * FROM participants WHERE participantid = $userid";
            $result = mysqli_query($con, $sql) or die("Unable to fetch from participants table due to " . mysqli_error($con));
            $row = mysqli_fetch_array($result, MYSQLI_BOTH);
        } else {
            // get admin information from admins table
            $sql = "SELECT * FROM admins WHERE adminid = $userid";
            $result = mysqli_query($con, $sql) or die("Unable to fetch from admins table due to " . mysqli_error($con));
            $row = mysqli_fetch_array($result, MYSQLI_BOTH);
        }

        // variables
        $firstname = $row["firstname"];
        $lastname = $row["lastname"];
        $username = $row["username"];
        $email = $row["email"];
        $password = $row["password"];
    ?>

        <div class="container">
            <main>
                <div class="py-5 text-center">
                    <h2>User Profile</h2>
                </div>
                <div class="row justify-content-center g-5">
                    <div class="col-md-7 col-lg-8">
                        <form class="needs-validation" novalidate method="post" action="profile_update.php">
                            <div class="row g-3">

                                <p class="valid-feedback" id="validupdatemsg">Successfully updated.</p>

                                <div class="col-sm-6">
                                    <label for="firstname" class="form-label">First name</label>
                                    <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $firstname ?>" placeholder="<?php echo $firstname ?>" required />
                                    <div class="invalid-feedback">
                                        First name is required.
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label for="lastname" class="form-label">Last name</label>
                                    <!-- response 2 -->
                                    <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $lastname ?>" placeholder="<?php echo $lastname ?>" required />
                                    <div class="invalid-feedback">
                                        Last name is required.
                                    </div>
                                </div>

                                <div class="col-lg-2">
                                    <label for="participantid" class="form-label">Participant ID</label>
                                    <div class="input-group has-validation">
                                        <span class="input-group-text">ID</span>
                                        <!-- response 3 -->
                                        <input type="text" class="form-control" id="userid" name="userid" value="<?php echo $userid ?>" required readonly />
                                        <div class="invalid-feedback">
                                            Participant ID is required.
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-10">
                                    <label for="username" class="form-label">Username</label>
                                    <div class="input-group has-validation">
                                        <span class="input-group-text">@</span>
                                        <!-- response 4 -->
                                        <input type="text" class="form-control" id="username" name="username" value="<?php echo $username ?>" required readonly />
                                        <div class="invalid-feedback">
                                            Username is required.
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label for="email" class="form-label">Email </label>
                                    <!-- response 5 -->
                                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $email ?>" placeholder="<?php echo $email ?>" required />
                                    <div class="invalid-feedback">
                                        Please enter a valid email address.
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required />
                                    <div class="invalid-feedback">
                                        Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label for="retypepassword" class="form-label" id="retypepasswordlabel">Re-type password</label>
                                    <input type="password" class="form-control" id="retypepassword" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required />
                                    <div class="invalid-feedback" id="retypepasswordmsg">
                                        Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters.
                                    </div>
                                </div>

                                <div>
                                    <input type="checkbox" id="showpassword"> Show password
                                </div>
                            </div>

                            <button class="my-4 w-100 btn btn-primary btn-lg" type="submit" name="submit">
                                Update
                            </button>
                        </form>

                        <?php if ($role == "participant") {
                        ?>
                            <hr class="my-4" />

                            <h3 class="my-3" id="events">Events</h3>
                            <!-- copy pasta registration.php -->
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="col-2">Event ID</th>
                                            <th scope="col">Event name</th>
                                            <th scope="col" class="col-1">Registered</th>
                                            <th scope="col" class="col-1">Quota</th>
                                            <th scope="col" class="col-1">Joined</th>
                                            <th scope="col" class="col-1">Join</th>
                                            <th scope="col" class="col-1">Leave</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                    <?php
                                    // display all events
                                    $eventsql = "SELECT * FROM events";
                                    $eventresult = mysqli_query($con, $eventsql) or die("Unable to fetch from events table due to " . mysqli_error($con));
                                    while ($eventrow = mysqli_fetch_array($eventresult, MYSQLI_NUM)) {
                                        $eventid = $eventrow[0];
                                        $eventname = $eventrow[1];
                                        $quota = $eventrow[2];

                                        // check participant on registrations table
                                        $joined = 'No';
                                        $participantsql = "SELECT * FROM registrations WHERE eventid = $eventid AND participantid = $userid";
                                        $participantresult = mysqli_query($con, $participantsql) or die("Unable to fetch from registrations table due to " . mysqli_error($con));

                                        // get number of rows in registrations table
                                        $registrationsql = "SELECT * FROM registrations WHERE eventid = $eventid";
                                        $registrationresult = mysqli_query($con, $registrationsql) or die("Unable to fetch from registrations table due to " . mysqli_error($con));

                                        if (mysqli_num_rows($participantresult) > 0) {
                                            $joined = 'Yes';
                                        }

                                        echo '
                                            <tr>
                                                <td>' . $eventid . '</td>
                                                <td>' . $eventname . '</td>
                                                <td>' . mysqli_num_rows($registrationresult) . '</td>
                                                <td>' . $quota . '</td>
                                                <td>' . $joined . '</td>
                                        ';


                                        if (mysqli_num_rows($registrationresult) < $quota) {
                                            echo '<td><a class="btn btn-success" href="registration_insert.php?eventid=' . $eventid . '&participantid=' . $userid . '">Join</a></td>';
                                        } else {
                                            echo '<td><button type="button" class="btn btn-secondary" disabled>FULL</button></td>';
                                        }

                                        echo '
                                                <td><a class="btn btn-danger" href="registration_delete.php?eventid=' . $eventid . '&participantid=' . $userid . '">Leave</a></td>
                                            </tr>
                                        ';
                                    };
                                }
                                    ?>
                                    </tbody>
                                </table>
                            </div>

                    </div>
                </div>
            </main>
        </div>

    <?php else : ?>
        <div class="container">
            <main>
                <div class="py-5 text-center">
                    <h2>Please sign in</h2>
                    <p>This page contains features which requires sign in.</p>
                    <a class="btn btn-primary" href="../signin/signin.php">Sign In</a>
                </div>
            </main>
        </div>
    <?php endif; ?>

    <!-- main content end -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="../../js/colormodes.js"></script>
    <script src="../../js/navbar.js"></script>
    <script src="../../js/validateform.js"></script>
    <script src="../../js/validatepassword.js"></script>
</body>

</html>