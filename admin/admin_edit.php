<?php include 'header.php'; ?>
<div class="container">
    <br/>
    <br/>
    <br/>
    <div class="col-md-5 col-md-offset-3">
        <div class="panel">
            <div class="panel-heading">
                <h4>Edit Admin</h4>
            </div>
            <div class="panel-body">
                <?php
                include '../koneksi.php';
                $id = $_GET['id'];
                $data = mysqli_query($koneksi,"select * from admin where id = '$id'");
                while($d=mysqli_fetch_array($data)){
                    ?>
                    <form method="post" action="admin_update.php">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="hidden" name="id" value="<?php echo $d['id']; ?>">
                            <input type="text" class="form-control" name="username"  value="<?php echo $d['username'];?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Masukkan Password ..">
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
