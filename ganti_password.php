<?php include 'header.php'; ?>
<div class="container">
    <br/>
    <br/>
    <br/>
    <div class="col-md-5 col-md-offset-3">
        <?php
        $pelanggan_id = $_SESSION['pelanggan_id'];
        ?>
        <div class="panel">
            <div class="panel-heading">
                <h4>Ganti Password</h4>
            </div>
            <div class="panel-body">
                <form method="post" action="ganti_password_aksi.php">
                    <div class="form-group">
                        <label>Masukkan Password Baru</label>
                        <input type="hidden" name="id" value="<?php echo $pelanggan_id ?>">
                        <input type="password" class="form-control" name="password_baru" placeholder="Masukkan Password Baru Anda ..">
                    </div>

                    <br/>

                    <input type="submit" class="btn btn-primary" value="Ganti Password">
                </form>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>
