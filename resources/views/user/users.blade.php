<!DOCTYPE html>
<html lang="en">
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale-1.0">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="icon" href="#">
        <title>Website Husein</title>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">CRUD</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="index.blade.php">Home<span class="sr-only"></span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="users.blade.php">List User<span class="sr-only"></span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="add.blade.php">Add User<span class="sr-only"></span></a>
            </li>
            </ul>
        </div>
        </nav>
        <div class="container">
            <div class="card mt-3">
                <div class="card-header bg-success text-white">
                    Data Pengguna
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>No</th>
                            <th>Aksi</th>
                            <th>Avatar</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Role</th>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>