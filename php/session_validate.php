<?php
session_start();
if (isset($_SESSION["username"])) :
    $userid = $_SESSION["userid"];
    $sessionusername = $_SESSION["username"];
    $role = $_SESSION["role"];
?>

    <?php if ($role == "admin") : ?>
        <!-- admin specific content -->
    <?php elseif ($role == "participant") : ?>
        <!-- participant specific content -->
    <?php endif; ?>

<?php else : ?>
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