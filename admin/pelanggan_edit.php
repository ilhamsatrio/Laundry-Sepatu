<?php include 'header.php'; ?>
<div class="container">
    <br/>
    <br/>
    <br/>
    <div class="col-md-5 col-md-offset-3">
        <div class="panel">
            <div class="panel-heading">
                <h4>Edit Pelanggan</h4>
            </div>
            <div class="panel-body">
                <?php
                include '../koneksi.php';
                $id = $_GET['id'];
                $data = mysqli_query($koneksi,"select * from pelanggan where pelanggan_id = '$id'");
                while($d=mysqli_fetch_array($data)){
                    ?>
                    <form method="post" action="pelanggan_update.php">
                        <div class="form-group">
                            <label>Nama Pelanggan</label>
                            <input type="hidden" name="pelanggan_id" value="<?php echo $d['pelanggan_id']; ?>">
                            <input type="text" class="form-control" name="pelanggan_nama"  value="<?php echo $d['pelanggan_nama'];?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>No Handphone</label>
                            <input type="text" class="form-control" name="pelanggan_hp"  value="<?php echo $d['pelanggan_hp'];?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="pelanggan_password" placeholder="Masukkan Password ..">
                        </div>
                        <br/>
                        <input type="submit" class="btn btn-primary" value="Update">
                    </form>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>
