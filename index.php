<?php
    include("lib/koneksi.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand navbar-dark bg-dark">
        <div class="container-fluid">
            <a href="index.php" class="navbar-brand">APP PRESENSI</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a href="?hal=home" class="nav-link">HOME</a>
                    </li>
                        <li class="nav-item">
                            <a href="?hal=siswa" class="nav-link">SISWA</a>
                    </li>
                        <li class="nav-item">
                            <a href="?hal=kelas" class="nav-link">KELAS</a>
                    </li>
                        <li class="nav-item">
                            <a href="?hal=presensi" class="nav-link">PRESENSI</a>
                    </li>
                        <li class="nav-item">
                            <a href="?hal=surat" class="nav-link">Izin/Sakit</a>
                    </li>
                        <li class="nav-item">
                            <a href="?hal=rekap" class="nav-link">Rekap Presensi</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <?php
                    $hal = isset($_GET['hal'])?$_GET['hal']:"";

                    if ($hal){
                        include "page/".$hal.".php";
                    }else{
                        include "page/home.php";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<script src="bootstrap/js/bootstrap.min.js"></script>

