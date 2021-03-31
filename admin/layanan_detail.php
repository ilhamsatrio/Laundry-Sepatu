<?php include 'header.php'; ?>
<div class="container">
    <br/>
    <br/>
    <br/>
    <div class="col-md-5 col-md-offset-3">
        <div class="panel">
            <div class="panel-heading">
                <h4>Edit Layanan</h4>
            </div>
            <div class="panel-body">
                <?php
                include '../koneksi.php';
                $id = $_GET['id'];
                $data = mysqli_query($koneksi,"select * from layanan where id_layanan = '$id'");
                while($d=mysqli_fetch_array($data)){
                    ?>
                    <table>
                        <tr>
                            <td>Nama Layanan</td>
                            <td>:</td>
                            <td><?php echo $d['nama_layanan'] ?></td>
                        </tr>
                        <tr>
                            <td>Harga</td>
                            <td>:</td>
                            <td><?php echo $d['harga'] ?></td>
                        </tr>
                        <tr>
                            <td>Deskripsi</td>
                            <td>:</td>
                            <td><?php echo $d['deskripsi'] ?></td>
                        </tr>
                    </table>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
