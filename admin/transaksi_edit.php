<?php include 'header.php'; ?>
<?php
include '../koneksi.php';
?>
<div class="container">
    <div class="panel">
        <div class="panel-heading">
            <h4>Edit Transaksi Laundry</h4>
        </div>
        <div class="panel-body">
            <div class="col-md-8 col-md-offset-2">
                <a href="transaksi.php" class="btn btn-sm btn-info pull-right">Kembali</a>
                <br/>
                <br/>
                <?php
                $id = $_GET['id'];
                $transaksi = mysqli_query($koneksi,"select pelanggan.*,transaksi.*,layanan.* from transaksi 
                    INNER JOIN pelanggan ON transaksi.transaksi_pelanggan=Pelanggan.pelanggan_id
                    INNER JOIN layanan ON transaksi.id_layanan=layanan.id_layanan
                    where transaksi_id='$id'");
                while($t=mysqli_fetch_array($transaksi)){
                    ?>
                    <form method="post" action="transaksi_update.php">
                        <input type="hidden" name="id" value="<?php echo $t['transaksi_id']; ?>">
                        <div class="form-group">
                            <label>Pelanggan</label>
                            <input type="hidden" name="transaksi_pelanggan" class="form-control" 
                            readonly value="<?php echo $t['transaksi_pelanggan'] ?>">
                            <input type="text" class="form-control" readonly value="<?php echo $t['pelanggan_nama'] ?>">
                        </div>

                        <div class="form-group">
                            <label>Layanan</label>
                            <input type="hidden" name="id_layanan" class="form-control" 
                            readonly value="<?php echo $t['id_layanan'] ?>">
                            <input type="text" class="form-control" readonly value="<?php echo $t['nama_layanan'] ?>">
                        </div>

                           <div class="form-group">
                            <label>Deskripsi</label>
                            <input type="text" class="form-control" name="deskripsi" required readonly value="<?php echo $t['deskripsi'] ?>">
                        </div>

                        <div class="form-group">
                            <label>Harga</label>
                            <input type="number" class="form-control" name="transaksi_harga" required readonly value="<?php echo $t['transaksi_harga'] ?>">
                        </div>

                        <div class="form-group">
                            <label>Tgl. Pesan</label>
                            <input type="date" class="form-control" name="transaksi_tgl" value="<?php echo $t['transaksi_tgl']; ?>" readonly>
                        </div>


                        <div class="form-group">
                            <label>Tgl. Selesai</label>
                            <input type="date" class="form-control" name="transaksi_tgl_selesai" required="required" value="<?php echo $t['transaksi_tgl_selesai']; ?>">
                        </div>

                        <br/>
                            <div class="form-group alert alert-info">
                                <label>Status</label>
                                <select class="form-control" name="status" required="required">
                                    <option <?php if($t['transaksi_status']=="0"){echo "selected='selected'";} ?> value="0">PROSES</option>
                                    <option <?php if($t['transaksi_status']=="1"){echo "selected='selected'";} ?> value="1">DI CUCI</option>
                                    <option <?php if($t['transaksi_status']=="2"){echo "selected='selected'";} ?> value="2">SELESAI</option>
                                </select>
                            </div>
                            <input type="submit" class="btn btn-primary" value="Ubah">
                        </form>
                        <?php
                    }
                    ?>
                </div>

            </div>
        </div>
    </div>
<?php include 'footer.php'; ?>
