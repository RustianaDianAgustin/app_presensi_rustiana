<?php
    $id_siswa = "";
    $nama = "";
    $id_kelas = "";
    $jk = "";
    $alamat = "";
    $nis = "";
     $aksi = isset($_GET['aksi'])?$_GET['aksi']:"";
     $id = isset($_GET['id'])?$_GET['id']:"";
     if($aksi=="edit"){
        $query = "select * from tbsiswa where id_siswa = $id";
        $hasil = $koneksi->query($query);
        if($hasil->num_rows > 0){
            $row = $hasil->fetch_assoc();
            $id_siswa = $row['id_siswa'];
            $nama = $row['nama_siswa'];
            $id_kelas = $row['id_kelas'];
            $jk = $row['jk'];
            $alamat = $row['alamat'];
            $nis = $row['nis'];
        }
    }else if($aksi=='update'){
        extract($_POST);
        $query = "update tbsiswa set nis='$nis',nama_siswa = '$nama_siswa',id_kelas = '$id_kelas',alamat = '$alamat',jk = '$jk' where id_siswa = '$id_siswa'";
        $update = $koneksi->query($query);
        if($update){
            ?>
             <script>
                alert('update berhasil');
                location.href='?hal=siswa';
            </script>
            <?php
        }
    }
?>
<div class="card-header bg-secondary">
    <h3>Input data Siswa</h3>
    <a href="?hal=siswa" class="btn btn-success">Lihat data</a>
</div>
<div class="card-body">
    <form action="?hal=edit_siswa&aksi=update" method="post">
        <input type="hidden" name="id_siswa" value="<?=$id_siswa?>">
        <div class="form-group">
            <label for="nis">NIS</label>
            <input type="text" value="<?=$nis?>" name="nis" class="form-control">
        </div>
        <div class="form-group">
            <label for="nama_siswa">Nama Siswa</label>
            <input type="text" value="<?=$nama?>" name="nama_siswa" class="form-control">
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" value="<?=$alamat?>" name="alamat" class="form-control">
        </div>
        <div class="form-group">
            <label for="jk">Jenis Kelamin</label>
            <select name="jk" class="form-control" required>
                <option value="">--Pilih Jenis Kelamin--</option>
                <option value="L" <?=$jk=='L'? 'selected':''?>>Laki-Laki</option>
                <option value="P" <?=$jk=='P'? 'selected':''?>>Perempuan</option>
            </select>
        </div>
        <div class="form-group">
            <label for="id_kelas">Kelas</label>
            <select name="id_kelas" class="form-control" required>
                <option value="">--Pilih Kelas--</option>
                <?php
                $qkelas = "select * from tbkelas";
                $hasilkelas = $koneksi->query($qkelas);
                while($rowkelas=$hasilkelas->fetch_assoc()){
                    if($rowkelas['id_kelas']==$id_kelas){
                        ?>
                    <option value="<?=$rowkelas['id_kelas']?>"selected><?=$rowkelas['nama_kelas']?></option>
                    <?php
                    }else{
                        ?>
                    <option value="<?=$rowkelas['id_kelas']?>"><?=$rowkelas['nama_kelas']?></option>
                    <?php
                    }
                }
            ?>
            </select>
        </div>
        <div class="form-group">
            <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
            <button type="reset" class="btn btn-warning">Reset</button>
        </div>
    </form>
</div>