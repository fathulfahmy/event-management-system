<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Manage Participant</title>
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
                <a class="nav-link" href="../signout/signout.php">Sign Out</a>
              </li>

            <?php else : ?>

              <!-- admin -->
              <li class="nav-item">
                <a class="nav-link" href="../event/event.php">Manage Event</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="../participant/participant.php">Manage Participant</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../profile/profile.php">Profile</a>
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
    if ($_SESSION["role"] == "admin") :
      include "../connect.php";
  ?>

      <div class="container-fluid">
        <div class="row justify-content-center">
          <main class="col-md-9 col-lg-10 px-md-4">
            <h2 class="my-3">Participants</h2>

            <form class="d-flex col-3" role="search" method="get" action="participant.php">
              <input class="form-control me-2" type="search" placeholder="Search" name="searchkey" />
              <button class="btn btn-outline-success" type="submit" name="submit">
                Search
              </button>
            </form>

            <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Delete</th>
                    <th scope="col">First name</th>
                    <th scope="col">Last name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Events</th>
                  </tr>
                </thead>

                <?php
                if (isset($_GET["submit"])) {
                  // display searched participant
                  $searchkey = $_GET["searchkey"];
                  $participantsql = "SELECT * FROM participants WHERE participantid LIKE '%$searchkey%' OR firstname LIKE '%$searchkey%' OR lastname LIKE '%$searchkey%' OR email LIKE '%$searchkey%'";
                } else {
                  // display all participants
                  $participantsql = "SELECT * FROM participants";
                }

                $participantresult = mysqli_query($con, $participantsql) or die("Unable to fetch data from participants table due to " . mysqli_error($con));
                while ($participantrow = mysqli_fetch_array($participantresult, MYSQLI_BOTH)) {
                  $participantid = $participantrow["participantid"];
                  $firstname = $participantrow["firstname"];
                  $lastname = $participantrow["lastname"];
                  $email = $participantrow["email"];

                  echo '
                    <tr>
                      <td>' . $participantid . '</td>
                      <td> <a class="btn btn-danger" href="participant_delete_participant.php?participantid=' . $participantid . '">Delete</a> </td>
                      <td>' . $firstname . '</td>
                      <td>' . $lastname . '</td>
                      <td>' . $email . '</td>
                      <td>
                  ';

                  // join participants table with events table with registrations table
                  $eventsql = "SELECT participants.participantid,participants.firstname,participants.lastname,participants.email,
                          events.eventname, events.eventid FROM participants 
                          LEFT JOIN registrations ON participants.participantid=registrations.participantid
                          LEFT JOIN events ON registrations.eventid=events.eventid WHERE registrations.participantid = $participantid";
                  $eventresult = mysqli_query($con, $eventsql) or die("Unable to join participants table with registrations table and events table due to " . mysqli_error($con));

                  // display eventname if participant is in registrations table
                  while ($eventrow = mysqli_fetch_array($eventresult, MYSQLI_BOTH)) {
                    $eventid = $eventrow["eventid"];
                    $eventname = $eventrow["eventname"];
                    echo '
                      <table class="col-12">
                        <tr>
                          <td class="col-8">' . $eventname . '</td>
                          <td class="col-4"><a class="btn btn-danger" href="participant_delete_registration.php?eventid=' . $eventid . '&participantid=' . $participantid . '">Deregister</a></td>
                        </tr>
                      </table>
                    ';
                  }

                  echo '
                      </td>
                    </tr>
                  ';
                }
                ?>

                </tbody>
              </table>
            </div>
          </main>
        </div>
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