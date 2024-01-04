<!-- 1. change document title -->
<!-- 2. link css -->
<!-- 3. link js -->
<!-- 4. add main html content -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- 1. document title -->
  <title>Manage Participants</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
  <link rel="stylesheet" href="../css/colormodes.css" />
  <link rel="stylesheet" href="../css/navbar.css" />
  <!-- 2. bootstrap example css -->
  <link rel="stylesheet" href="../assets/bootstrap/examplename/example.css" />
</head>

<body>

  <!-- 4. main content start -->

  <div class="container-fluid">
    <div class="row justify-content-center">
      <main class="col-md-9 col-lg-10 px-md-4">
        <h2 class="my-3">Participants</h2>
        <form class="d-flex col-3" role="search" method="post" action="participant_search.php">
          <input class="form-control me-2" type="search" placeholder="Search" name="searchkey" />
          <button class="btn btn-outline-success" type="submit">
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
            <tbody>

              <?php
              include "../connect.php";
              $viewsql = "SELECT * FROM participants";
              $viewresult = mysqli_query($con, $viewsql) or die("Error in viewing all data due to " . mysqli_error($con));

              while ($row = mysqli_fetch_array($viewresult, MYSQLI_BOTH)) {
                $participantid = $row["participantid"];
                $firstname = $row["firstname"];
                $lastname = $row["lastname"];
                $email = $row["email"];

                echo '<tr>
                <td>' . $participantid . '</td>
                <td> <a class="btn btn-danger" href="participant_delete_participant.php?participantid=' . $participantid . '">Delete</a> </td>
                <td>' . $firstname . '</td>
                <td>' . $lastname . '</td>
                <td>' . $email . '</td>
                <td>';

                $eventsql = "SELECT participants.participantid,participants.firstname,participants.lastname,participants.email,
                          events.eventname, events.eventid FROM participants 
                          LEFT JOIN registrations ON participants.participantid=registrations.participantid
                          LEFT JOIN events ON registrations.eventid=events.eventid WHERE registrations.participantid = $participantid";
                $eventresult = mysqli_query($con, $eventsql) or die("Error in viewing all data due to " . mysqli_error($con));

                while ($row = mysqli_fetch_array($eventresult, MYSQLI_BOTH)) {
                  $eventid = $row["eventid"];
                  echo '
                  <table class="col-12">
                    <tr>
                      <td class="col-8">' . $row["eventname"] . '</td>
                      <td class="col-4"><a class="btn btn-danger" href="participant_delete_registration.php?eventid=' . $eventid . '&participantid=' . $participantid . '">Deregister</a></td>
                    </tr>
                  </table>';
                }

                echo '</td></tr>';
              }
              ?>

            </tbody>
          </table>
        </div>
      </main>
    </div>
  </div>



  <!-- 4. main content end -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script src="../js/colormodes.js"></script>
  <script src="../js/navbar.js"></script>
  <script src="../js/validateform.js"></script>
  <!-- 3. bootstrap example js -->
  <script src="../assets/bootstrap/examplename/example.js"></script>
</body>

</html>