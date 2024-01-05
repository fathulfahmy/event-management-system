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
              <a class="nav-link" href="../participant/participant.php">Manage Participant</a>
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
