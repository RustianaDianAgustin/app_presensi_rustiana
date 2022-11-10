<div class="card-header">
    <h3>Rekap Presensi</h3>
</div>
<form action="?hal=rekap&aksi=proses" method="post">
<div class="card-body">
        <div class="form-group">
        <label for="">Pilih</label>
        <select name="kelas" id="" class="form-control" required>
            <option value="">--Pilih Kelas--</option>
            <?php
                $query = "select * from tbkelas order by nama_kelas asc";
                $hasil = $koneksi->query($query);
                while($row = $hasil->fetch_assoc()){
                    ?>
                    <option value="<?=$row['id_kelas']?>"><?=$row['nama_kelas']?></option>
                    <?php
                }
            ?>
        </select>
    </div>
</div>
<div class="card-footer">
    <button type="submit" name="kirim" value="kirim" class="btn btn-primary">Proses</button>
</div>
<div class="card-body">
    <table class="table table-striped table-bordered">
            <tr>
                <th>No</th>
                <th>Nama Siswa</th>
                <th>Sakit</th>
                <th>Izin</th>
                <th>Alpha</th>
            </tr>
            <?php
                $aksi = isset($_GET['aksi'])?$_GET['aksi']:"";
                if($aksi=="proses"){
                    if(isset($_POST['kirim'])){
                    extract($_POST);
                    $cari = "select * from tbsiswa where id_kelas=".$kelas;
                    $hkelas = $koneksi->query($cari);
                    $no = 0;
                    while($rowsiswa = $hkelas->fetch_assoc()){
                        $no++;
                        $ceks = "select * from tbpresensi where id_siswa=".$rowsiswa['id_siswa']." and kehadiran='S'";
                        $hasils = $koneksi->query($ceks);
                        $sakit = $hasils->num_rows;
                        $cekI = "select * from tbpresensi where id_siswa=".$rowsiswa['id_siswa']." and upper(kehadiran)='I'";
                        $hasilI = $koneksi->query($cekI);
                        $izin = $hasilI->num_rows;
                        ?>
                        <tr>
                            <td><?=$no?></td>
                            <td><?=$rowsiswa['nama_siswa']?></td>
                            <td><?=$sakit?></td>
                            <td><?=$izin?></td>
                            <td></td>
                    </tr>
                    <?php
                }
            }
        }
    ?>
</table>
</div>
</form>