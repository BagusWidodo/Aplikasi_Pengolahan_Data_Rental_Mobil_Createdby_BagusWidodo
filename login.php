<?php include 'koneksi.php'; 
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login - SB Admin</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
</head>
<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                <div class="card-body">
                                    <form method="POST" autocomplete="off">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" name="username" placeholder="Username" />
                                            <label>Username</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" name="pass" id="inputPassword" type="password" placeholder="Password" />
                                            <label for="inputPassword">Password</label>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <a class="small" href="password.html">Lupa Password?</a>
                                            <button class="btn btn-primary" name="login">Login</button>
                                        </div>
                                    </form>

                                    <?php

                                    if (isset($_POST['login']))
                                    {
                                        $ambil=$koneksi->query("SELECT * FROM admin WHERE username='$_POST[username]' AND password='$_POST[pass]'");
                                        $hasrow=$ambil->num_rows;
                                        if ($hasrow==1) 
                                        {
                                            $_SESSION['admin']=$ambil->fetch_assoc();
                                            echo "<div class='alert alert-info'>Login SUkses</div>";
                                            echo "<meta http-equiv='refresh' content='1; url=index.php'>";
                                        }
                                        else
                                        {
                                            echo "<div class='alert alert-danger'>Login Gagal</div>";
                                            echo "<meta http-equiv='refresh' content='1; url=login.php'>";
                                        }
                                    }

                                    ?>
                                </div>
                                <div class="card-footer text-center py-3">
                                    <div class="small"><a href="register.php">Belum Memiliki Akun? Sign Up</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2021</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
</body>
</html>
