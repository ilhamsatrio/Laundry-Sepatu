<?php include 'header.php'; ?>
<div class="container">
    <div class="panel">
        <div class="panel-heading">
            <h4>Data Admin</h4>
        </div>
        <div class="panel-body">
            <a href="admin_tambah.php" class="btn btn-sm btn-info pull-right">Tambah</a>
            <br/>
            <br/>
            <table class="table table-bordered table-striped">
                <tr>
                    <th width="1%">No</th>
                    <th>Username</th>
                    <th width="15%">OPSI</th>
                </tr>
                <?php
                include '../koneksi.php';
                $data = mysqli_query($koneksi,"select * from admin where hak_akses='admin'");
                $no = 1;
                while($d=mysqli_fetch_array($data)){
                    ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $d['username'] ?></td>
                        <td>
                            <a href="admin_edit.php?id=<?php echo $d['id']; ?>" class="btn btn-sm btn-info">Edit</a>
                            <a href="admin_hapus.php?id=<?php echo $d['id']; ?>" class="btn btn-sm btn-danger">Hapus</a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>
