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
  <title>Manage Events</title>
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
        <h2 class="my-3 pb-3">Events</h2>

        <a class="btn btn-primary" href="addevent.php">Add event</a>

        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">Event ID</th>
                <th scope="col" class="col-2">Event Name</th>
                <th scope="col" class="col-2">Quota</th>
              </tr>
            </thead>
            <tbody>
              <?php
              include "connect.php";

              //display event sql
              $manageeventsql = "SELECT * FROM events";
              $result = mysqli_query($con, $manageeventsql) or die("Unable to execute sql");

              //loop events
              while ($eventrow =  mysqli_fetch_array($result, MYSQLI_NUM)) {
                $eventid = $eventrow[0];
                $eventname = $eventrow[1];
                $quota = $eventrow[2];

                echo "<tr>
                  <td>$eventid</td>
                  <td>$eventname</td>
                  <td>$quota</td>
                  </tr>";
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
  <!-- 3. bootstrap example js -->
  <script src="../assets/bootstrap/examplename/example.js"></script>
</body>

</html>