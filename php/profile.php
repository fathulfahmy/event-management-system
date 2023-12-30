<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- document title -->
    <title>User Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="../css/colormodes.css" />
    <link rel="stylesheet" href="../css/navbar.css" />
</head>

<body>

    <!-- sql display -->
    <?php
    include "connect.php";
    $participantid = 0001;
    $sql = "SELECT * FROM participants WHERE participantid = $participantid";
    $result = mysqli_query($con, $sql) or die("Unable to execute sql insert query.");
    $row = mysqli_fetch_array($result, MYSQLI_NUM);
    ?>

    <!-- main content start -->
    <div class="container">
        <main>
            <div class="py-5 text-center">
                <h2>User Profile</h2>
            </div>

            <div class="row justify-content-center g-5">
                <div class="col-md-7 col-lg-8">
                    <!-- submit to sql update -->
                    <form class="needs-validation" novalidate method="post" action="updateprofile.php">
                        <div class="row g-3">

                            <p class="valid-feedback" id="validupdatemsg">Successfully updated.</p>

                            <div class="col-sm-6">
                                <label for="firstname" class="form-label">First name</label>
                                <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $row[1] ?>" placeholder="<?php echo $row[1] ?>" required />
                                <div class="invalid-feedback">
                                    Valid first name is required.
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <label for="lastname" class="form-label">Last name</label>
                                <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $row[2] ?>" placeholder="<?php echo $row[2] ?>" required />
                                <div class="invalid-feedback">
                                    Valid last name is required.
                                </div>
                            </div>

                            <div class="col-2">
                                <label for="participantid" class="form-label">Participant ID</label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text">ID</span>
                                    <input type="text" class="form-control" id="participantid" name="participantid" value="<?php echo $row[0] ?>" required readonly />
                                    <div class="invalid-feedback">
                                        Your username is required.
                                    </div>
                                </div>
                            </div>

                            <div class="col-10">
                                <label for="username" class="form-label">Username</label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text">@</span>
                                    <input type="text" class="form-control" id="username" name="username" value="<?php echo $row[3] ?>" required readonly />
                                    <div class="invalid-feedback">
                                        Your username is required.
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="email" class="form-label">Email </label>
                                <input type="email" class="form-control" id="email" name="email" value="<?php echo $row[4] ?>" placeholder="<?php echo $row[4] ?>" required />
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

                        <hr class="my-4" />

                        <h3 class="my-3">Events</h3>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Event name</th>
                                        <th scope="col" class="col-2">Participants</th>
                                        <th scope="col" class="col-2">Quota</th>
                                        <th scope="col" class="col-2">Joined</th>
                                        <th scope="col" class="col-1">Join</th>
                                        <th scope="col" class="col-1">Leave</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Valorant</td>
                                        <td>30</td>
                                        <td>60</td>
                                        <td>Yes</td>
                                        <td>
                                            <button class="btn btn-success">Join</button>
                                        </td>
                                        <td>
                                            <button class="btn btn-danger">Leave</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Counter-Strike 2</td>
                                        <td>30</td>
                                        <td>60</td>
                                        <td>No</td>
                                        <td>
                                            <button class="btn btn-success">Join</button>
                                        </td>
                                        <td>
                                            <button class="btn btn-danger">Leave</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>EA Sports FC 24</td>
                                        <td>30</td>
                                        <td>60</td>
                                        <td>No</td>
                                        <td>
                                            <button class="btn btn-success">Join</button>
                                        </td>
                                        <td>
                                            <button class="btn btn-danger">Leave</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <hr class="my-4" />

                        <button class="my-4 w-100 btn btn-primary btn-lg" type="submit" id="submitbtn">
                            Update
                        </button>
                    </form>
                </div>
            </div>
        </main>
    </div>

    <!-- main content end -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="../js/colormodes.js"></script>
    <script src="../js/formvalidation.js"></script>
    <script src="../js/passwordvalidation.js"></script>
</body>

</html>