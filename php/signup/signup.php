<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sign Up</title>
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
        include "../connect.php";
        session_start();
        if (isset($_SESSION["username"])) {
          $role = $_SESSION["role"];

          if ($role == "participant") {
        ?>
            <li class="nav-item">
              <a class="nav-link" href="../registration/registration.php">Join Event</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../profile/profile.php">Profile</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../signout/signout.php">Sign Out</a>
            </li>
          <?php
          } else {
          ?>
            <li class="nav-item">
              <a class="nav-link" href="../event/event.php">Manage Event</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../participant/participant.php">Manage Participant</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../profile/profile.php">Profile</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../signout/signout.php">Sign Out</a>
            </li>
          <?php
          }
        } else {
          ?>
          <li class="nav-item">
            <a class="nav-link" href="../registration/registration.php">Join Event</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../signin/signin.php">Sign In</a>
          </li>

        <?php
        }
        ?>


      </ul>

    </div>
  </div>
</nav>
  <div class="container">
    <main>
      <div class="py-5 text-center">
        <h2>Sign Up</h2>
      </div>

      <div class="row justify-content-center g-5">
        <div class="col-md-7 col-lg-8">
          <form class="needs-validation" method="POST" action="signup_insert.php" novalidate>
            <div class="row g-3">
              <div class="col-sm-6">

                <label for="firstname" class="form-label">First name</label>
                <input type="text" class="form-control" id="firstname" placeholder="" value="" name="firstname" required />
                <div class="invalid-feedback">
                  Valid first name is required.
                </div>
              </div>

              <div class="col-sm-6">
                <label for="lastname" class="form-label">Last name</label>
                <input type="text" class="form-control" id="lastname" placeholder="" value="" name="lastname" required />
                <div class="invalid-feedback">
                  Valid last name is required.
                </div>
              </div>

              <div class="col-12">
                <label for="username" class="form-label">Username</label>
                <div class="input-group has-validation">
                  <span class="input-group-text">@</span>
                  <input type="text" class="form-control" id="username" placeholder="Username" name="username" required />
                  <div class="invalid-feedback">
                    Your username is required.
                  </div>
                </div>
              </div>

              <div class="col-12">
                <label for="email" class="form-label">Email </label>
                <input type="email" class="form-control" id="email" placeholder="you@example.com" name="email" required />
                <div class="invalid-feedback">
                  Please enter a valid email address.
                </div>
              </div>

              <div class="col-12">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" placeholder="" name="password" required />
                <div class="invalid-feedback">
                  Please enter a valid password.
                </div>
              </div>

              <div class="col-12">
                <label for="retypepassword" class="form-label">Re-type password</label>
                <input type="password" class="form-control" id="retypepassword" placeholder="" required />
                <div class="invalid-feedback">Passwords do not match.</div>
              </div>
            </div>

            <button class="my-4 w-100 btn btn-primary btn-lg" type="submit">
              Create account
            </button>
          </form>
          <p class="text-center">
            Already have an account? <a href="../signin/signin.php">Sign In</a>
          </p>
        </div>
      </div>
    </main>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script src="../../js/colormodes.js"></script>
  <script src="../../js/navbar.js"></script>
  <script src="../../js/validateform.js"></script>
  <script src="../../js/validatepassword.js"></script>
</body>

</html>