<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>SPK Login</title>
    <!-- FontAwesome for icons -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- Google Fonts for better typography -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,400,600,700,800,900" rel="stylesheet">
    <!-- Custom Stylesheet for Admin -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <!-- SweetAlert for error popup -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.8/dist/sweetalert2.all.min.js"></script>
    <style>
        /* Custom Background for Login Page */
        body {
            background: linear-gradient(90deg, rgba(42, 87, 141, 1) 0%, rgba(39, 74, 111, 1) 100%);
            font-family: 'Nunito', sans-serif;
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .card {
            width: 400px;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        .text-center img {
            width: 120px; /* Increased logo size */
            margin-bottom: 20px;
        }
        h1 {
            font-size: 1.5rem;
            font-weight: 600;
            color: #333;
        }
        .form-group {
            position: relative;
        }
        .form-control,
        .form-control-user {
            border-radius: 0 !important; /* Ensure square edges */
            margin-bottom: 15px;
            padding: 12px 12px 12px 40px; /* Add padding for icon space */
            font-size: 1rem;
            border: 1px solid #ccc;
        }
        .form-control-user {
            padding-left: 40px; /* Ensure space for the icon */
        }
        .form-control-icon {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: #666;
        }

        /* Button styling */
        .btn-primary,
        .btn-back {
            padding: 12px;
            width: 100%; /* Same width for both buttons */
            border-radius: 5px;
            font-size: 1.1rem;
            transition: background-color 0.3s ease;
            text-align: center;
        }

        /* Login button */
        .btn-primary {
            background-color: #4e73df;
            color: white;
        }

        .btn-primary:hover {
            background-color: #2e59d9;
        }

        /* Kembali button */
        .btn-back {
            background-color: #28a745;
            color: white;
            margin-top: 15px; /* Space between Login and Kembali button */
        }

        .btn-back:hover {
            background-color: #218838;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="card o-hidden border-0 shadow-lg">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <!-- Logo Image -->
                                <img src="assets/img/logo-sman-15-kota-tangerang-__1_-removebg-preview.png" alt="Logo">
                                <h1 class="h3 text-gray-900 mb-4">Login</h1>
                            </div>
                            <!-- Login Form -->
                            <form class="user" action="pages/auth/login.php" method="POST">
                                <div class="form-group">
                                    <label for="username" class="sr-only">Username</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                        <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Masukkan Username" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="sr-only">Password</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                        </div>
                                        <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Masukkan Password" required>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">Login</button>
                                <!-- Back Button -->
                                <a href="javascript:history.back()" class="btn btn-back btn-user btn-block">Kembali</a>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- SweetAlert for Error Messages -->
    <?php
    if (isset($_SESSION['error'])) {
    ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Login Gagal',
                text: '<?php echo $_SESSION['error']; ?>',
            })
        </script>
    <?php
        unset($_SESSION['error']);
    }
    ?>

    <!-- Scripts -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>
</body>
</html>
