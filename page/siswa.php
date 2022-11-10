<?php
    $aksi = isset($_GET['aksi'])?$_GET['aksi']:"";
    $id = isset($_GET['id'])?$_GET['id']:"";
    if($aksi=="hapus"){
        $query = "delete from tbsiswa where id_siswa = $id";
        $hapus = $koneksi->query($query);
        if($hapus){
            ?>
            <script>
                alert('hapus berhasil');
                location.href='?hal=siswa';
            </script>
            <?php
        }
    }
?>
    <div class="card-header bg-light">
    <h3>Data Siswa</h3>
    <a href="?hal=fsiswa" class="btn btn-success">Tambah Data</a>
</div>
<div class="card-body">
    <table class="table table-stripped table-bordered">
        <tr>
            <th>No</th>
            <th>NIS</th>
            <th>Nama Siswa</th>
            <th>Kelas</th>
            <th>Alamat</th>
            <th>L/P</th>
            <th>Opsi</th>
        </tr>
        <?php
        $query = "select * from tbsiswa";
        $hasil = $koneksi->query("select a.*,b.nama_kelas from tbsiswa a, tbkelas b where a.id_kelas = b.id_kelas");
        $no = 0;
        while($row = $hasil->fetch_assoc()){
            $no++;
            ?>
            <tr>
                <td><?=$no?></td>
                <td><?=$row['nis']?></td>
                <td><?=$row['nama_siswa']?></td>
                <td><?=$row['nama_kelas']?></td>
                <td><?=$row['alamat']?></td>
                <td><?=$row['jk']?></td>
                <td>
                    <a href="?hal=edit_siswa&aksi=edit&id=<?=$row['id_siswa']?>" class="btn btn-warning">Edit</a>
                    <a href="?hal=siswa&aksi=hapus&id=<?=$row['id_siswa']?>" class="btn btn-danger" onclick="return confirm('Yakin akan dihapus?');">Hapus</a>
                </td> 
            </tr>
        <?php
         }
        ?>
    </table>
</div>