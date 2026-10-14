<?php
include "koneksi.php";

$query = mysqli_query($koneksi, "SELECT * FROM laundry");
$total = mysqli_num_rows($query);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Kinclong Laundry</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-size: 14px;
        }
        h1 {
            font-size: 28px;
        }
        h3 {
            font-size: 20px;
        }
        .menu a {
            display: block;
            padding: 8px 0;
            text-decoration: none;
        }
        .judul th {
            background-color: #cfe2ff;
        }
        td, th {
            padding: 12px !important;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand bg-primary navbar-dark px-5">
        <a class="navbar-brand" href="index.php">Kinclong Laundry</a>
        <ul class="navbar-nav ms-auto">
            <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Customer</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Kontak</a></li>
        </ul>
    </nav>

    <div class="container-fluid">
        <div class="row">

            <div class="col-2 menu p-4">
                <a href="index.php">Dashboard</a>
                <a href="#">Orders</a>
                <a href="#">Customers</a>
                <a href="#">Reports</a>
                <a href="#">Integrations</a>
            </div>

            <div class="col-10 p-4">
                <h1>Dashboard</h1>
                <hr>

                <h3 class="mt-4">Data Laundry</h3>
                <p class="text-muted">Total ada <?php echo $total; ?> pelanggan</p>
                <a href="tambah.php" class="btn btn-success btn-sm mb-3">Tambah Pelanggan</a>

                <table class="table table-bordered table-striped">
                    <thead class="judul">
                        <tr>
                            <th width="60">No</th>
                            <th>Nama</th>
                            <th>No HP</th>
                            <th>Alamat</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        while ($data = mysqli_fetch_array($query)) {
                        ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $data['nama']; ?></td>
                            <td><?php echo $data['nohp']; ?></td>
                            <td><?php echo $data['alamat']; ?></td>
                        </tr>
                        <?php
                            $no++;
                        }

                        if ($total == 0) {
                            echo "<tr><td colspan='5' class='text-center'>Belum ada data</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>

</body>
</html>