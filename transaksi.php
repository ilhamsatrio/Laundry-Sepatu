<?php include 'header.php'; ?>
<div class="container">
    <div class="panel">
        <div class="panel-heading">
            <h4>Data Transaksi Laundry</h4>
        </div>
        <div class="panel-body">
            <a href="transaksi_tambah.php" class="btn btn-sm btn-info pull-right">Transaksi Baru</a>
            <br/>
            <br/>
            <table class="table table-bordered table-striped">
                <tr>
                    <th width="1%">No</th>
                    <th>Invoice</th>
                    <th>Tanggal</th>
                    <th>Pelanggan</th>
                    <th>Tgl. Selesai</th>
                    <th>Harga</th>
                    <th>Status</th>
                    <th width="20%">OPSI</th>
                </tr>
                <?php
                include 'koneksi.php';
                $data = mysqli_query($koneksi,"select pelanggan.*,transaksi.* from transaksi INNER JOIN pelanggan ON transaksi.transaksi_pelanggan=Pelanggan.pelanggan_id where pelanggan_id ='$pelanggan_id' order by transaksi_id desc");
                $no = 1;
                while($d=mysqli_fetch_array($data)){
                    ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td>INVOICE-<?php echo $d['transaksi_id']; ?></td>
                        <td><?php echo $d['transaksi_tgl']; ?></td>
                        <td><?php echo $d['pelanggan_nama']; ?></td>
                        <?php if($d['transaksi_tgl_selesai'] == null) { ?>
                            <td>-</td>
                        <?php }else{ ?>
                            <td><?php echo $d['transaksi_tgl_selesai']; ?></td>
                        <?php } ?>
                        <td><?php echo "Rp. ".number_format($d['transaksi_harga']) ." ,-"; ?></td>
                        <td>
                            <?php
                            if($d['transaksi_status']=="0"){
                                echo "<div class='label label-warning'>PROSES</div>";
                            }else if($d['transaksi_status']=="1"){
                                echo "<div class='label label-info'>DICUCI</div>";
                            }else if($d['transaksi_status']=="2"){
                                echo "<div class='label label-success'>SELESAI</div>";
                            }
                            ?>
                        </td>
                        <td>
                            <a href="transaksi_invoice.php?id=<?php echo $d['transaksi_id']; ?>" target="_blank" class="btn btn-sm btn-warning">Invoice</a>
                            <a href="transaksi_hapus.php?id=<?php echo $d['transaksi_id']; ?>" class="btn btn-sm btn-danger">Batalkan</a>
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
