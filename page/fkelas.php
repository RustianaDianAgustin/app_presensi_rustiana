<?php
    $aksi = isset($_GET['aksi'])?$_GET['aksi']:"";
    if($aksi == 'simpan'){
        extract($_POST);
        $query = "insert into tbkelas values('','$nama_kelas','$jurusan','$wali_kelas')";
        $simpan = $koneksi->query($query);
        if($simpan){
            echo "<script>alert('data tersimpan');</script>";
            echo "<script>location.href='?hal=kelas';</script>";
        }else{
            echo "<script>alert('data gagal tersimpan');</script>";
            echo "<script>location.href='?hal=fkelas');</script>";
        }
    }
?>
<div class="card-header bg-secondary">
    <h3>Input data</h3>
    <a href="?hal=kelas" class="btn btn-success">Lihat data</a>
</div>
<div class="card-body">
    <form action="?hal=fkelas&aksi=simpan" method="post">
    <div class="form-group">
        <label for="nama_kelas">Nama Kelas</label>
        <input type="text" name="nama_kelas" class="form-control">
    </div>
        <div class="form-group">
        <label for="jurusan">Kelas</label>
        <select name="jurusan" class="form-control" required>
            <option value="">--Pilih Jurusan--</option>
            <option value="RPL">Rekayasa Perangkat Lunak</option>
            <option value="DKV">Design Komunikasi Visual</option>
            <option value="BD">Bisnis Digital</option>
            <option value="MP">Management Perkantoran</option>
            <option value="AK">Akuntansi Lembaga</option>
        </select>
    <div class="form-group">
        <label for="wali_kelas">Wali Kelas</label>
        <input type="text" name="wali_kelas" class="form-control">
    </div>
    
<div class="form-group">
            <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
            <button type="reset" class="btn btn-success">Reset</button>
        </div>
    </form>
</div>