<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Manage Event</title>
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
                <a class="nav-link" href="../profile/profile.php">Profile</a>
              </li>
              <li class="nav-item">
        </ul>

        <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-flex flex-fill justify-content-end">
          <a class="nav-link" href="../signout/signout.php">Sign Out</a>
          </li>
        </ul>

      <?php else : ?>

        <!-- admin -->
        <li class="nav-item">
          <a class="nav-link active" href="../event/event.php">Manage Event</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../participant/participant.php">Manage Participant</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../profile/profile.php">Profile</a>
        </li>
        </ul>

        <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-flex flex-fill justify-content-end">
          <li class="nav-item">
            <a class="nav-link" href="../signout/signout.php">Sign Out</a>
          </li>
        </ul>

      <?php
            endif;
          else : ?>

      <!-- visitor -->
      <li class="nav-item">
        <a class="nav-link" href="../registration/registration.php">Join Event</a>
      </li>
      </ul>

      <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-flex flex-fill justify-content-end">
        <li class="nav-item">
          <a class="nav-link" href="../signin/signin.php">Sign In</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../signup/signup.php">Sign Up</a>
        </li>
      </ul>

    <?php endif; ?>
      </div>
    </div>
  </nav>

  <?php
  if (isset($_SESSION["role"])) :
    if ($_SESSION["role"] == "admin") :
      include "../connect.php";
  ?>

      <div class="container">
        <main>
          <div class="py-5 text-center">
            <h2>Add Event</h2>
          </div>

          <div class="row justify-content-center g-5">
            <div class="col-md-7 col-lg-8">
              <form class="needs-validation" novalidate action="event_insert.php" method="post">
                <div class="row g-3">
                  <div class="col-lg-10">
                    <label for="eventname" class="form-label">Event name</label>
                    <input type="text" class="form-control" id="eventname" name="eventname" placeholder="" required />
                    <div class="invalid-feedback">Event name is required.</div>
                  </div>

                  <div class="col-lg-2">
                    <label for="quota" class="form-label">Quota</label>
                    <input type="number" class="form-control" id="quota" name="quota" placeholder="0" min="2" required />
                    <div class="invalid-feedback">Minimum quota is 2.</div>
                  </div>
                </div>

                <button class="my-4 w-100 btn btn-primary btn-lg" type="submit" name="submit">
                  Create event
                </button>
              </form>
            </div>
          </div>
        </main>
      </div>

    <?php else : ?>

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
    ?>

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

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script src="../../js/colormodes.js"></script>
  <script src="../../js/navbar.js"></script>
  <script src="../../js/validateform.js"></script>
</body>

</html>