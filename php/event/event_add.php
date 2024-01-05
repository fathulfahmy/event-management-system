<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Add Event</title>
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

    if ($role == "admin") :
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
                    <input type="number" class="form-control" id="quota" name="quota" placeholder="0" required />
                    <div class="invalid-feedback">Event quota is required.</div>
                  </div>
                </div>

                <button class="my-4 w-100 btn btn-primary btn-lg" type="submit">
                  Create event
                </button>
              </form>
              <p class="text-center">
                Go to Admin page. <a href="event.php">Click here</a>
              </p>
            </div>
          </div>
        </main>
      </div>

    <?php else : ?>

      <div class="container">
        <main>
          <div class="py-5 text-center">
            <h2>Error</h2>
            <p>Restricted to admin. Redirecting you to homepage...</p>
          </div>
        </main>
      </div>

    <?php
      header("refresh:3;url='../home/home.php'");
      exit;
    endif;
  else :
    ?>

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
  <script src="../../js/validateform.js"></script>
</body>

</html>