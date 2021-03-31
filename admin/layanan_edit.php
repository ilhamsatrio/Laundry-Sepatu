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
                    <form method="post" action="layanan_update.php">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="hidden" name="id_layanan" value="<?php echo $d['id_layanan']; ?>">
                            <input type="text" class="form-control" name="nama_layanan" placeholder="Masukkan nama .." value="<?php echo $d['nama_layanan']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea name="deskripsi" class="form-control" cols="30" rows="10"><?php echo $d['deskripsi']; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Harga</label>
                            <?php
                                $rp = number_format($d['harga']);
                                $rp_r = str_replace(',', '.', $rp);
                            ?>
                            <input type="text" class="form-control" name="harga" placeholder="Masukkan Harga .." id="rupiah" value="<?php echo $rp_r ?>">
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

<script type="text/javascript">
        
        var rupiah = document.getElementById('rupiah');
        rupiah.addEventListener('keyup', function(e){
            // tambahkan 'Rp.' pada saat form di ketik
            // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
            rupiah.value = formatRupiah(this.value, 'Rp. ');
        });
 
        /* Fungsi formatRupiah */
        function formatRupiah(angka, prefix){
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split           = number_string.split(','),
            sisa            = split[0].length % 3,
            rupiah          = split[0].substr(0, sisa),
            ribuan          = split[0].substr(sisa).match(/\d{3}/gi);
 
            // tambahkan titik jika yang di input sudah menjadi angka ribuan
            if(ribuan){
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }
 
            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ?  rupiah : '');
        }
    </script>
<?php include 'footer.php'; ?>
