<?php
    $nama_kelas = "";
    $jurusan = "";
    $wali_kelas = "";
     $aksi = isset($_GET['aksi'])?$_GET['aksi']:"";
     $id = isset($_GET['id'])?$_GET['id']:"";
     if($aksi=="edit"){
        $query = "select * from tbkelas where id_kelas = $id";
        $hasil = $koneksi->query($query);
        if($hasil->num_rows > 0){
            $row = $hasil->fetch_assoc();
            $nama_kelas = $row['nama_kelas'];
            $jurusan = $row['jurusan'];
            $wali_kelas = $row['wali_kelas'];
        }
    }else if($aksi=='update'){
        extract($_POST);
        $query = "update tbkelas set nama_kelas='$nama_kelas',jurusan = '$jurusan',wali_kelas = '$wali_kelas' where id_kelas =$id_kelas";
        $update = $koneksi->query($query);
        if($update){
            ?>
             <script>
                alert('update berhasil');
                location.href='?hal=kelas';
            </script>
            <?php
        }
    }
?>
<div class="card-header bg-secondary">
    <h3>Input data Kelas</h3>
    <a href="?hal=kelas" class="btn btn-success">Lihat data</a>
</div>
<div class="card-body">
    <form action="?hal=edit_kelas&aksi=update" method="post">
        <input type="hidden" name="id_kelas" value="<?=$id?>">
        <div class="form-group">
            <label for="nama_kelas">Nama Kelas</label>
            <input type="text" value="<?=$nama_kelas?>" name="nama_kelas" class="form-control">
        </div>
        <div class="form-group">
            <label for="jurusan">Jurusan</label>
            <select name="jurusan" class="form-control" required>
                <option value="">--Pilih Jurusan--</option>
                <option value="RPL" <?=$jurusan=='RPL'? 'selected':''?>>Rekayasa Perangkat Lunak</option>
                <option value="DKV" <?=$jurusan=='DKV'? 'selected':''?>>Design Komunikasi Visual</option>
                <option value="BD" <?=$jurusan=='BD'? 'selected':''?>>Bisnis Digital</option>
                <option value="MP" <?=$jurusan=='MP'? 'selected':''?>>Management Perkantoran</option>
                <option value="AK" <?=$jurusan=='AK'? 'selected':''?>>Akuntansi Lembaga</option>
            </select>
        </div>
        <div class="form-group">
            <label for="wali_kelas">Wali Kelas</label>
            <input type="text" value="<?=$wali_kelas?>" name="wali_kelas" class="form-control">
        </div>
        <div class="form-group">
            <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
            <button type="reset" class="btn btn-warning">Reset</button>
        </div>
    </form>
</div>