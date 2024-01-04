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
                <th scope="col">First name</th>
                <th scope="col">Last name</th>
                <th scope="col">Email</th>

              </tr>
            </thead>
            <?php
            include "../connect.php";
            $searchkey = $_POST["searchkey"];

            $sql = "SELECT * FROM participants WHERE participantid LIKE '%$searchkey%' OR firstname LIKE '%$searchkey%' OR lastname LIKE '%$searchkey%' OR email LIKE '%$searchkey%'";
            $result = mysqli_query($con, $sql) or die("Cannot execute sql.");
            while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
              $participantid = $row["participantid"];
              $firstname = $row["firstname"];
              $lastname = $row["lastname"];
              $email = $row["email"];

            ?>
              <!-- 4. main content start -->

              <tbody>
                <tr>
                  <td><?php echo "$participantid"; ?></td>
                  <td><?php echo "$firstname"; ?></td>
                  <td><?php echo "$lastname"; ?></td>
                  <td><?php echo "$email"; ?></td>

                  <td><button class="btn btn-danger">Delete</button></td>
                </tr>
                </tr>
              <?php
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