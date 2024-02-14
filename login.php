<?php
require_once 'config/koneksi.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemrograman Web</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body {
            background-image: url('img/ronaldo.jpeg');
            background-size: cover;
            margin-top: 70px;
        }
    </style>
</head>

<body>
    <div class="row">
        <div class="col-md-5 mx-auto">
            <div class="card mt-5">
                <div class="card-header bg-dark text-white text-center">
                    <h2>LOGIN MAHASISWA</h2>
                </div>
                <div class="card-body pt-4 bg-warning">
                    <form action="cek_login.php" method="POST">
                        <div class="form-floating mb-4">
                            <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com"
                                name="nim" required>
                            <label for="floatingInput">NIM</label>
                        </div>
                        <div class="form-floating mt-2">
                            <input type="password" class="form-control" id="floatingPassword" placeholder="Password"
                                name="password" required>
                            <label for="floatingPassword">Password</label>
                        </div>

                        <div class="mb-2 text-center">
                            <button class="btn btn-primary btn-md mt-3" type="submit">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>