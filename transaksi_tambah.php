<?php include 'header.php'; ?>
<?php
include 'koneksi.php';
?>
<div class="container">
    <div class="panel">
        <div class="panel-heading">
            <h4>Transaksi Laundry Baru</h4>
        </div>
        <div class="panel-body">
            <div class="col-md-8 col-md-offset-2">
                <a href="transaksi.php" class="btn btn-sm btn-info pull-right">Kembali</a>
                <br/>
                <br/>
                <form method="post" action="transaksi_aksi.php">
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
                            <label>Deskripsi</label>
                            <textarea name="deskripsi" id="deskripsi" class="form-control" readonly="" cols="30" rows="10"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Harga</label>
                            <input type="number" class="form-control" id="harga" name="harga" required readonly>
                        </div>
                    <div class="form-group">
                        <label>Jumlah Sepatu</label>
                        <input type="hidden" class="form-control" name="transaksi_pelanggan" value="<?php echo $pelanggan_id ?>">
                        <input type="number" class="form-control" id="jml_sepatu" name="transaksi_jml_sepatu" placeholder="Masukkan sepatu cucian .." required="required" min="1">
                    </div>
                    <div class="form-group">
                        <label>Total Harga</label>
                        <input type="number" id="total_harga" name="transaksi_harga" class="form-control" required readonly>
                    </div>
                    <input type="submit" class="btn btn-primary" value="Simpan">
                </form>
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
                        var deskripsi = response['data'].deskripsi;

                        $('#harga').val(harga);
                        $('#deskripsi').val(deskripsi);
                    //}
                    //}

                }
                });
            });

            $('#jml_sepatu').keyup(function() {
                var harga = $('#harga').val();
                var jml = $('#jml_sepatu').val();
                var total = parseInt(harga) * parseInt(jml);
                $('#total_harga').val(total);
              });
        });
</script>

<?php include 'footer.php'; ?>
