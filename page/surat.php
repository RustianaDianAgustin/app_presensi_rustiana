<div class="card-header">
    <h3>Upload Surat Izin/Sakit</h3>
</div>
<form action="?hal=surat&aksi=simpan" method="post" enctype="multipart/form-data">
<div class="card-body">
    <div class="form-group">
        <label for="">ID siswa</label>
        <input type="text" name="id_siswa" id="" class="form-control">
    </div>
    <div class="form-group">
        <label for="">Status</label>
        <select name="status" id="" class="form-control">
            <option value="S">Sakit</option>
            <option value="i">Izin</option>
        </select>
    </div>
    <div class="form-control">
        <label for="">File Surat Keterangan</label>
        <input type="file" name="file_surat" id="" class="form-control">
    </div>
</div>
<div class="card-footer">
    <button type="submit" class="btn btn-primary">Upload</button>
    <button type="reset" class="btn btn-secondary">Reset</button>
</div>
</form>

<?php
    $aksi = isset($_GET['aksi'])?$_GET['aksi']:"";
    if($aksi=="simpan"){
        extract($_POST);
        $qcek = "select * from tbpresensi where id_siswa=$id_siswa and tanggal='".date('Y-m-d')."' and file_surat <> ''";
        $cek = $koneksi->query($qcek);
        if($cek->num_rows > 0){
            ?>
                <script>
                    alert('Anda Sudah Upload Surat Izin/Sakit');
                    location.href='?hal=surat';
                </script>
            <?php
        }else{
            $namafile= $id_siswa." - ".date('Y-m-d')." - ".$_FILES['file_surat'] ['name'];
            $upload = move_uploaded_file($_FILES['file_surat'] ['tmp_name'], 'img/'.$namafile);
            if($upload){
                $query = "insert into tbpresensi values('',$id_siswa,'".date('Y-m-d')."','".date('H:i:s')."','$status','','$namafile')";
                $ins = $koneksi->query($query);
                if($ins){
                    ?>
                        <script>
                            alert('upload berhasil');
                            location.href='?hal=surat';
                        </script>
                    <?php
                }
            }else{
                ?>
                    <script>
                        alert('upload gagal');
                        location.href='?hal=surat';
                    </script>
                <?php
            }
        }
    }
?>