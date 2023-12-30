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
    <title>Sign In</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="../css/colormodes.css" />
    <link rel="stylesheet" href="../css/navbar.css" />
    <!-- 2. bootstrap example css -->
    <link rel="stylesheet" href="../assets/bootstrap/examplename/example.css" />
</head>

<body>
    <!-- 4. main content start -->
    <div class="container">
        <main>
            <div class="py-5 text-center">
                <h2>Sign In</h2>
            </div>

            <div class="row justify-content-center g-5">
                <div class="col-md-7 col-lg-8">
                    <form class="needs-validation" novalidate>
                        <div class="row g-3">
                            <div class="col-12">
                                <label for="username" class="form-label">Username</label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text">@</span>
                                    <input type="text" class="form-control" id="username" placeholder="Username" required />
                                    <div class="invalid-feedback">
                                        Your username is required.
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" placeholder="" required />
                                <div class="invalid-feedback">
                                    Please enter a valid password.
                                </div>
                            </div>
                        </div>

                        <button class="my-4 w-100 btn btn-primary btn-lg" type="submit">
                            Sign In
                        </button>
                    </form>
                    <p class="text-center">
                        Don't have an account? <a href="signup.html">Sign Up</a>
                    </p>
                </div>
            </div>
        </main>
    </div>

    <!-- 4. main content end -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="../js/colormodes.js"></script>
    <script src="../js/validateform.js"></script>
    <!-- 3. bootstrap example js -->
    <script src="../assets/bootstrap/example/example.js"></script>
</body>

</html>