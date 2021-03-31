<?php include 'header.php'; ?>
<?php
include 'koneksi.php';
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
                $transaksi = mysqli_query($koneksi,"select * from transaksi where transaksi_id='$id'");
                while($t=mysqli_fetch_array($transaksi)){
                    ?>
                    <form method="post" action="transaksi_update.php">
                        <input type="hidden" name="id" value="<?php echo $t['transaksi_id']; ?>">

                        <div class="form-group">
                            <label>Pelanggan</label>
                            <select class="form-control" name="pelanggan" required="required">
                                <option value="">- Pilih Pelanggan</option>
                                <?php
                                $data = mysqli_query($koneksi,"select * from pelanggan");
                                while($d=mysqli_fetch_array($data)){
                                    ?>
                                    <option <?php if($d['pelanggan_id']==$t['transaksi_pelanggan']){echo "selected='selected'";} ?> value="<?php echo $d['pelanggan_id']; ?>"><?php echo $d['pelanggan_nama']; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Layanan</label>
                            <select name="id_layanan" id="id_layanan"  class="form-control">
                            <option value=""></option>
                            <!-- mengambil nilai combo box dari database -->
                             <?php
                             $query=mysqli_query ($koneksi,"select id_layanan,nama_layanan from layanan");
                             while($data2=mysqli_fetch_assoc($query))
                           {
                            if($data1==$data2[id_layanan])
                             echo"<option value=$data2[id_layanan] selected>$data2[nama_layanan]</option>";
                             else echo"<option value=$data2[id_layanan]>$data2[nama_layanan]</option>"; 
                             }
                           ?> 
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Harga</label>
                            <input type="number" class="form-control" id="harga" name="harga" required readonly>
                        </div>


                        <div class="form-group">
                            <label>Tgl. Selesai</label>
                            <input type="date" class="form-control" name="tgl_selesai" required="required" value="<?php echo $t['transaksi_tgl_selesai']; ?>">
                        </div>

                        <br/>

                        <table class="table table-bordered table-striped">
                            <tr>
                                <th>Jenis Sepatu</th>
                                <th width="20%">Jumlah</th>
                            </tr>

                            <?php
                            $id_transaksi = $t['transaksi_id'];
                            $sepatu = mysqli_query($koneksi,"select * from sepatu where sepatu_transaksi='$id_transaksi'");

                            while($p=mysqli_fetch_array($sepatu)){
                                ?>
                                <tr>
                                    <td><input type="text" class="form-control" name="jenis_sepatu[]" value="<?php echo $p['sepatu_jenis']; ?>"></td>
                                    <td><input type="number" class="form-control" name="jumlah_sepatu[]" value="<?php echo $p['sepatu_jumlah']; ?>"></td>
                                </tr>
                                <?php } ?>
                              

                            </table>

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
    <script type='text/javascript'>

        $(document).ready(function(){

        // Nama Change
        $('#id_layanan').change(function(){

            // id User
            var id_layanan = $(this).val();
            //console.log(id);

            // AJAX request 
            $.ajax({
            url: 'Harga.php?id_layanan='+id_layanan,
            type: 'get',
            dataType: 'json',
            success: function(response){

                // var len = 0;
                // if(response['data'] != null){
                // len = response['data'].length;
                // }

                //console.log(len);

                //if(len > 0){
                // Read data and create <option >
                //for(var i=0; i<len; i++){

                    //var id = response['data'].id;
                    var harga = response['data'].harga;

                    $('#harga').val(harga);
                //}
                //}

            }
            });
        });

        });

</script>
<?php include 'footer.php'; ?>
