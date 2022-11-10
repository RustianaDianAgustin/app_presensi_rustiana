<?php
    $aksi = isset($_GET['aksi'])?$_GET['aksi']:"";
    if($aksi == 'simpan'){
        extract($_POST);
        $query = "insert into tbsiswa values('','$id_kelas','$nis','$nama_siswa','$alamat','$jk')";
        $simpan = $koneksi->query($query);
        if($simpan){
            echo "<script>alert('data tersimpan');</script>";
            echo "<script>location.href='?hal=siswa';</script>";
        }else{
            echo "<script>alert('data gagal tersimpan');</script>";
            echo "<script>location.href='?hal=fsiswa');</script>";
        }
    }
?>
<div class="card-header bg-secondary">
    <h3>Input data Siswa</h3>
    <a href="?hal=siswa" class="btn btn-success">Lihat data</a>
</div>
<div class="card-body">
    <form action="?hal=fsiswa&aksi=simpan" method="post">
    <div class="form-group">
        <label for="nis">NIS</label>
        <input type="text" name="nis" class="form-control">
    </div>
        <div class="form-group">
        <label for="id_kelas">Kelas</label>
        <select name="id_kelas" class="form-control" required>
            <option value="">--Pilih Kelas--</option>
            <?php
            $qkelas = "select * from tbkelas";
            $hasilkelas = $koneksi->query($qkelas);
            while($rowkelas=$hasilkelas->fetch_assoc()){
                ?>
                <option value="<?=$rowkelas['id_kelas']?>"><?=$rowkelas['nama_kelas']?></option>
                <?php
            }
            ?>
            
        </select>
    <div class="form-group">
        <label for="nama_siswa">Nama Siswa</label>
        <input type="text" name="nama_siswa" class="form-control">
    </div>
    <div class="form-group">
        <label for="alamat">Alamat</label>
        <input type="text" name="alamat" class="form-control">
    </div>
    <div class="form-group">
        <label name="jk">Jenis Kelamin</label>
        <select name="jk" class="form-control" required>
            <option values="">--Pilih Jenis Kelamin--</option>
            <option values="">Laki-Laki</option>
            <option values="">Perempuan</option>
        </select>
            </div>
            <div class="form-group">
            <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
            <button type="reset" class="btn btn-success">Reset</button>
        </div>
    </form>
</div>