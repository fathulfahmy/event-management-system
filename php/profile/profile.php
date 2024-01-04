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

    <?php
    include "../connect.php";
    session_start();
    if (isset($_SESSION["username"])) :
        $userid = $_SESSION["userid"];
        $sessionusername = $_SESSION["username"];
        $role = $_SESSION["role"];

        // get participant information from participants table
        $sql = "SELECT * FROM participants WHERE participantid = $userid";
        $result = mysqli_query($con, $sql) or die("Unable to execute sql insert query.");
        $row = mysqli_fetch_array($result, MYSQLI_NUM);

        // variables
        $participantid = $row[0];
        $firstname = $row[1];
        $lastname = $row[2];
        $username = $row[3];
        $email = $row[4];
        $password = $row[5];
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
                                        Valid first name is required.
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label for="lastname" class="form-label">Last name</label>
                                    <!-- response 2 -->
                                    <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $lastname ?>" placeholder="<?php echo $lastname ?>" required />
                                    <div class="invalid-feedback">
                                        Valid last name is required.
                                    </div>
                                </div>

                                <div class="col=sm-2">
                                    <label for="participantid" class="form-label">Participant ID</label>
                                    <div class="input-group has-validation">
                                        <span class="input-group-text">ID</span>
                                        <!-- response 3 -->
                                        <input type="text" class="form-control" id="participantid" name="participantid" value="<?php echo $participantid ?>" required readonly />
                                        <div class="invalid-feedback">
                                            Participant ID is required.
                                        </div>
                                    </div>
                                </div>

                                <div class="col=sm-10">
                                    <label for="username" class="form-label">Username</label>
                                    <div class="input-group has-validation">
                                        <span class="input-group-text">@</span>
                                        <!-- response 4 -->
                                        <input type="text" class="form-control" id="username" name="username" value="<?php echo $username ?>" required readonly />
                                        <div class="invalid-feedback">
                                            Your username is required.
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
                                    <input type="password" class="form-control" id="password" name="password" placeholder="" required />
                                    <div class="invalid-feedback">
                                        Please enter a valid password.
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label for="retypepassword" class="form-label" id="retypepasswordlabel">Re-type password</label>
                                    <input type="password" class="form-control" id="retypepassword" required />
                                    <div class="invalid-feedback" id="retypepasswordmsg"></div>
                                </div>
                            </div>

                            <button class="my-4 w-100 btn btn-primary btn-lg" type="submit" id="submitbtn">
                                Update
                            </button>
                        </form>

                        <hr class="my-4" />

                        <h3 class="my-3" id="events">Events</h3>
                        <!-- copy pasta registration.php -->
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Event name</th>
                                        <th scope="col" class="col-2">Joined</th>
                                        <th scope="col" class="col-1">Join</th>
                                        <th scope="col" class="col-1">Leave</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    <?php
                                    // display all events
                                    $eventsql = "SELECT * FROM events";
                                    $eventresult = mysqli_query($con, $eventsql) or die("Unable to execute sql");
                                    while ($eventrow = mysqli_fetch_array($eventresult, MYSQLI_NUM)) {
                                        $eventid = $eventrow[0];
                                        $eventname = $eventrow[1];
                                        $quota = $eventrow[2];
                                        $joined = 'No';

                                        // check participant on registrations table
                                        $participantsql = "SELECT * FROM registrations WHERE eventid = $eventid AND participantid = $userid";
                                        $participantresult = mysqli_query($con, $participantsql);

                                        if (mysqli_num_rows($participantresult) > 0) {
                                            $joined = 'Yes';
                                        }

                                        echo '
                                            <tr>
                                              <td>' . $eventname . '</td>
                                              <td>' . $joined . '</td>
                                        ';

                                        // compare number of rows with quota
                                        $registrationsql = "SELECT * FROM registrations WHERE eventid = $eventid";
                                        $registrationresult = mysqli_query($con, $registrationsql);

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
                    <h2>Error</h2>
                    <p>Unauthorized access.</p>
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