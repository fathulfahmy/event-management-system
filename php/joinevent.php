<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Join Events</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
  <link rel="stylesheet" href="../css/colormodes.css" />
  <link rel="stylesheet" href="../css/navbar.css" />
</head>

<body>
  <div class="container-fluid">
    <div class="row justify-content-center">
      <main class="col-md-9 col-lg-10 px-md-4">
        <h2 class="my-3">Events</h2>
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
              include "connect.php";
              $userid = 002;

              // display events sql
              $eventsql = "SELECT * FROM events";
              $eventresult = mysqli_query($con, $eventsql) or die("Unable to execute sql");

              // loop events
              while ($eventrow = mysqli_fetch_array($eventresult, MYSQLI_NUM)) {
                $joined = 'No';
                $eventid = $eventrow[0];
                $eventname = $eventrow[1];
                $quota = $eventrow[2];

                // existing participant sql
                $participantsql = "SELECT * FROM registrations WHERE eventid = $eventid AND participantid = $userid";
                $participantresult = mysqli_query($con, $participantsql);

                // existing participant response
                if (mysqli_num_rows($participantresult) > 0) {
                  $joined = 'Yes';
                }

                // display events response
                echo '
                <tr>
                  <td>' . $eventname . '</td>
                  <td>' . $joined . '</td>';

                // quota sql
                $registrationsql = "SELECT * FROM registrations WHERE eventid = $eventid";
                $registrationresult = mysqli_query($con, $registrationsql);

                // quota response
                if (mysqli_num_rows($registrationresult) < $quota) {
                  echo '<td><a class="btn btn-success" href="insertregistration.php?eventid=' . $eventid . '&participantid=' . $userid . '">Join</a></td>';
                } else {
                  echo '<td><button type="button" class="btn btn-secondary" disabled>FULL</button></td>';
                }

                echo '
                  <td><a class="btn btn-danger" href="deleteregistration.php?eventid=' . $eventid . '&participantid=' . $userid . '">Leave</a></td>
                </tr>
                ';
              };
              ?>
            </tbody>
          </table>
        </div>
      </main>
    </div>
  </div>

  <!-- display events response -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script src="../js/colormodes.js"></script>
  <script src="../js/navbar.js"></script>
</body>

</html>