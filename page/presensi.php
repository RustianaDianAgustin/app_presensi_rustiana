<div class="card-header bg-secondary">
    <h3>Presensi</h3>
</div>
<div class="card-body">
    <form action ="?hal=presensi&aksi=rekam" method="post">
        <div class="form-group">
            <input class="form-check-input" type="radio" name="pilihan" id="rdpilihan1" value="datang">
                <label class="form-check-label" for="rdpilihan1">
                     Datang
                </label>
            <input class="form-check-input" type="radio" name="pilihan" id="rdpilihan2" value="pulang">
                <label class="form-check-label" for="rdpilihan2">
                     Pulang
                </label>
        </div>
        <div class="form-group">
            <label>ID SISWA<span class="text-danger">scan QR Code</span></label>
            <input type="text" name="id_siswa" class="form-control">
        </div>
    </form>
    <hr class="mt-3">
    <?php
    date_default_timezone_set("Asia/Jakarta");
    $nis = "";
    $nama_siswa= "";
    $jam = "";
    $jenis = "";
    $aksi = isset($_GET['aksi'])?$_GET['aksi']:"";
    if($aksi=="rekam"){
        extract($_POST);
        $jenis = $pilihan;
        $query ="select * from tbsiswa where id_siswa=$id_siswa";
        $hasil = $koneksi->query($query);
        if($hasil->num_rows > 0){
            $row = $hasil->fetch_assoc();
            $nis = $row['nis'];
            $nama_siswa = $row['nama_siswa'];
            $jam = date('d-m-Y : H:i:s');
            $qcek = "select * from tbpresensi where id_siswa=$id_siswa and tanggal='".date('Y-m-d')."' and keterangan='$jenis'";
            $cek = $koneksi->query($qcek);
            if($cek->num_rows > 0){
                ?>
                <script>
                alert('Anda Sudah Melakukan Presensi');
                location.href='?hal=presensi'
                </script>
                <?php
            }else{
                $qinsert = "insert into tbpresensi values ('','$id_siswa',now(),'".date('H:i:s')."','','$jenis','')";
                $ins = $koneksi->query($qinsert);
                if($ins){
                    ?>
                    <script>alert('Presensi Berhasil');</script>
                    <?php 
                }
            }
        }
    }
    ?>
    <table>
        <tr>
            <td>NIS</td>
            <td>:</td>
            <td><?=$nis?></td>
        </tr>
        <tr>
            <td>Nama Siswa</td>
            <td>:</td>
            <td><?=$nama_siswa?></td>
        </tr>
        <tr>
            <td>Jam <?=$jenis?></td>
            <td>:</td>
            <td><?=$jam?></td>
        </tr>
    </table>
</div>