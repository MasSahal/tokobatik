<style>

.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.container2 {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #04AA6D;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #45a049;
}

a {
  color: #2196F3;
}

hr {
  border: 1px solid lightgrey;
}

span.price {
  float: right;
  color: grey;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
}
</style>
<main id="main">      
  <!-- ======= Our Portfolio Section ======= -->
  <section id="portfolio" class="portfolio section-bg">
    <div class="container">
      <div class="card card-solid mt-5">
        <div class="card-body pb-0">
          <br>
          <div class="row">
      
      <div class="col-sm-12">
        <h3>Data Pembelian</h3>
        <div class="row">
          <div class="col-75">
            <div class="container2">
              <form id=""form_checkout action="<?php echo base_url() ?>keranjang/cekout">
              
                <div class="row">
                  <div class="col-50">
                    <label for="fname"> Nama Penerima</label>
                    <input type="text" id="fname" name="nama_penerima" placeholder="">

                    <label for="email">HP Penerima</label>
                    <input type="text" id="phone_number" name="hp_penerima" placeholder="">
                    <input type="hidden" name="berat" id="berat" value="<?php echo $tot_berat; ?>">
                    <input type="hidden" name="total_harga" id="total_harga" value=""> 
                    <input type="hidden" name="ongkir" id="ongkir" value=""> 


                    <label for="email">Provinsi</label>
                    <!-- jika ada onchange, maka akan memanggil fungsi javascript getKota dibawah, untuk mendapatkan list kota-->
                    <select class="form-control" name="provinsi" id="provinsi" onchange="getKota()"> 
                      <option value="">- Pilih Provinsi -</option> 
                      <?php  
                        foreach ($data_provinsi as $prov) {
                            echo "<option value='".$prov->province_id.'#'.$prov->province."'>".$prov->province."</option>";
                        }
                      ?>
                    </select>

                    <label for="email">Kota</label>
                    <!-- jika ada onchange, maka akan memanggil fungsi javascript resetEkspedisi dibawah, ini diperlukan agar tidak ada kesalahan ongkos kirim jika terjadi perubahan data kota / provinsi-->
                    <select class="form-control" name="kota" id="kota" onchange="resetEkspedisi()">
                    </select> 

                    
                    <label for="email">Alamat Detail</label>
                    <input type="text" id="alamat_detail" name="alamat_detail" placeholder="">

                    <label for="email">Kode Pos</label>
                    <input type="text" id="kode_pos" name="kode_pos" placeholder="">

                     <label for="email">Pilih Ekspedisi</label>
                     <!-- jika ada onchange, maka akan memanggil fungsi javascript getOngkir dibawah, ini digunakan untuk menghitung ongkos kirim berdasarkan data kota yang sudah pilih sebelumnya-->
                    <select class="form-control" name="ekspedisi" id="ekspedisi" onchange="getOngkir()">
                      <option value="">- Pilih Ekspedisi -</option>
                      <option value="JNE">JNE</option>
                      <option value="POS">POS</option>
                      <option value="TIKI">TIKI</option>
                    </select>

                    <label for="email">Pilih Pengiriman</label>

                     <!-- jika ada onchange, maka akan meng assign data data ongkos kirim ke input type hidden dan untuk ditampilkan-->
                    <select class="form-control" name="pengiriman" id="pengiriman" onchange="setOngkir()">
                      <option value="">- Pilih Pengiriman -</option>
                    </select> 
 
                  </div>
 
                  
                </div>
            </div>
          </div>
          <div class="col-25">
            <div class="container2">
              <h4>Keranjang <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> <b><?=count($this->cart->contents()) ?></b></span></h4>
              <?php 
                $totalHarga = 0;
                foreach ($dataCart as $cart) {
                  $totalHarga = $totalHarga+$cart['subtotal'];
                  echo "<p> ".$cart['nama_produk']." <span class='price'>Rp ".number_format($cart['subtotal'],0,',','.')."</span></p>";
                }
              ?>
              
              <hr>
              <p>Pengiriman <span id="t_pengiriman_ekspedisi"></span><span class='price t_pengiriman_harga'></span>
              <hr>
              <p>Total <span class="price" id="t_total_harga" style="color:black"><b>Rp <?php echo number_format($totalHarga,0,',','.'); ?></b></span></p>


              <!-- jika diklik, maka akan simpan data transaksi ke controller keranjang di fungsi do_checkout, dan untuk mendapatkan token akses dari controller tersebut untuk digunakan menampilkan halaman midtrans -->
                <input type="button" id="btn_bayar" value="Lanjutkan Pembayaran"  onclick="doPayment()" class="btn">
            </div>
          </div>
              </form>
        </div>
      </div>
    </div>
      </div>
    </div>
  </div>
</section><!-- End Our Portfolio Section -->

<section id="contact" class="contact">
      <div class="container">
        <div class="row justify-content-center text-center mb-5">
          <div class="col-lg-9 " data-bs-aos="fade-right"><br>
          </div>
 
          <div class="row justify-content-center text-center mb-5">
          <div class="col-lg-9" data-bs-aos="fade-up" data-bs-aos-delay="100">
            </div> 
        </div>
      </div>
  </section><!-- End Contact Section -->
  <script type="text/javascript">
  	$(function(){
	    $('.formInput').change(function(){ 
	    	$('#form_Cart').submit();
	    });
	});

    function resetEkspedisi()
    {
       $('#ekspedisi').val(''); // kosongkan input type yg ber ID ekspedisi
       $('#pengiriman').empty();  // kosongkan select option di kolom pengiriman
    }

  function getKota()
    {
      var provinsi = $('#provinsi').val();
        $('#kota').empty();
        $('#kota').append("<option value=''>- Pilih Kota -</option>");

       $('#ekspedisi').val('');
       $('#pengiriman').empty(); 

      $('#btn_bayar').prop('disabled', true);

      if(provinsi == '')
      {
        alert('Silakan Pilih Provinsi'); 
        return;
      }

       var formData = {'provinsi': provinsi};   

        $.ajax({ 
            url: "<?php echo base_url();?>keranjang/listKota",
            type: "post",
            data: formData,
            success: function(data) { 
                var json = $.parseJSON(data);

                // looping data yang didapat dari keranjang/listkota dan masukan kedalam option Kota.
                 $.each(json, function(index, element) {                         
                        $('#kota').append("<option value='" +element.city_id+'#'+element.city_name+"#"+ element.city_name + "'>" + element.type+' '+element.city_name + "</option>");
                    });
            }
        });
    }

  function getOngkir()
    {
      var ekspedisi = $('#ekspedisi').val();
      var provinsi  = $('#provinsi').val();
      var kota      = $('#kota').val();
      var berat     = $('#berat').val();

      if(kota == '')
      {
        alert('Silakan Pilih Kota terlebih dahulu'); 
        return;
      }

      if(ekspedisi == '')
      {
        alert('Silakan Pilih Ekspedisi Pengiriman');
        return;
      }

        var formData = {
          'ekspedisi': ekspedisi,
          'provinsi': provinsi,
          'kota': kota, 
          'berat' : berat
        }; 

        //kosongkan terlebih dahulu option kolom pengiriman agar datanya terreset.
        $('#pengiriman').empty();
        $('#pengiriman').append("<option value=''>- Pilih Pengiriman -</option>");

        $.ajax({ 
            url: "<?php echo base_url();?>keranjang/hitungOngkir", //lakukan perhitungan ongkos kirim
            type: "post",
            data: formData,
            success: function(data) {  
                var json = $.parseJSON(data);
                 $.each(json, function(index, element) {                         
                        $('#pengiriman').append("<option value='" +ekspedisi+'#'+element.services+'#'+element.cost+"'>" + element.services+' - '+element.cost_formatted + "</option>");
                    });
            }
        });
    }  

  function setOngkir()
  {
      var ekspedisi          = $('#ekspedisi').val();
      var ongkir             = $('#pengiriman :selected').val().split("#");
      var total_harga_produk = '<?php echo $totalHarga; ?>';

      var t_total_harga = parseInt(total_harga_produk)+parseInt(ongkir[2]);

      $('#t_pengiriman_ekspedisi').text(ekspedisi);
      $('.t_pengiriman_harga').text(formatRupiah(ongkir[2],'Rp'));
      $('#total_harga').val(parseInt(total_harga_produk)+parseInt(ongkir[2]));
      $('#ongkir').text(ongkir[2]);
      $('#t_total_harga').text(formatRupiah(t_total_harga,'Rp'));
      $('#btn_bayar').prop('disabled', false);
  }

  function formatRupiah(angka, prefix){
      var number_string = angka.toString(),
      split       = number_string.split(','),
      sisa        = split[0].length % 3,
      rupiah        = split[0].substr(0, sisa),
      ribuan        = split[0].substr(sisa).match(/\d{3}/gi);
 
      // tambahkan titik jika yang di input sudah menjadi angka ribuan
      if(ribuan){
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
      }
 
      rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
      return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
  }

  function doPayment()
  {

    //kirim data transaksi ke controller keranjang ke fungsi do_cekout
     $.ajax({ 
            url: "<?php echo base_url();?>keranjang/do_cekout",
            type: "post",
            data: $('form').serialize(),
            success: function(data) {
            console.log(data);  
                var json = $.parseJSON(data);
                  if(json.status_code == "00")
                  {
                    // snap.pay ini untuk membuka halaman midtrans, dengan mengirim json.token, json.token ini adalah data token akses yang sudah digenerate dari fungsi do_cekout yg ada di controller keranjang
                    snap.pay(json.token, {

                        // jika sukses payment / biasanya kartu kredit atau gopay, maka kirim data notifikasi ke controller payment_notif lalu redirect ke halaman pesanan
                          onSuccess: function(result) {
                            $.ajax({ 
                                    url: "<?php echo base_url();?>payment_notif/notifikasi",
                                    type: "post",
                                    data: JSON.stringify(result),
                                    contentType: "application/json; charset=utf-8",
                                    success: function(data) {    
                                      window.location.replace("<?php echo BASE_URL() ?>pesanan");
                                    }
                                });
                          },
                           // jika pembayaran pending (biasanya transfer bank), maka kirim data notifikasi ke controller payment_notif lalu redirect ke halaman pesanan
                          onPending: function(result) {
                            console.log(result)
                              $.ajax({ 
                                    url: "<?php echo base_url();?>payment_notif/notifikasi",
                                    type: "post",
                                    data: JSON.stringify(result),
                                    contentType: "application/json; charset=utf-8",
                                    success: function(data) {    
                                      window.location.replace("<?php echo BASE_URL() ?>pesanan");
                                    }
                                });
                          },
                          onError: function(result) { 
                            alert('terjadi kesalahan');
                            window.location.replace("<?php echo BASE_URL() ?>buyer/produk");

                          }
                      });
                  }else 
                  {
                    alert(json.message);
                  }
            }
        });
  }
  </script>
 