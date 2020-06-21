<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2>Tutup Angsuran</h2>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
      <br />
      <form id="formgetanggota" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="<?=base_url('admin/index/proses_peminjaman')?>">

        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="no_identitas">No Identitas <span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="no_identitas" required="required" class="form-control col-md-7 col-xs-12" name="no_identitas">
          </div>
        </div>
        <div class="ln_solid"></div>
        <div class="form-group">
          <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
            <button type="submit" class="btn btn-success" id="getData">Ambil Data</button>
          </div>
        </div>

      </form>
    </div>
  </div>
</div>
<div class="col-md-12 col-sm-12 col-xs-12" style="visibility: hidden;" id="detailPeminjam">
  <div class="x_panel">
    <div class="x_title">
      <h2>Data Peminjam</h2>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
      <br />
      <form id="formbayarangsuran" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="#">
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="nama" class="form-control col-md-7 col-xs-12" name="nama" disabled="disabled">
            <input type="hidden" id="kd_pinjaman" class="form-control col-md-7 col-xs-12" name="kd_pinjaman">
            <input type="hidden" id="kurang_bayar" class="form-control col-md-7 col-xs-12" name="kurang_bayar">
            <input type="hidden" id="kurang_jangka_waktu" class="form-control col-md-7 col-xs-12" name="kurang_jangka_waktu">
            <input type="hidden" id="pinaltiPelunasan" class="form-control col-md-7 col-xs-12" name="pinaltiPelunasan">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Alamat
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="alamat" class="form-control col-md-7 col-xs-12" name="alamat"  disabled="disabled">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Total Tagihan
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="total_angsuran" class="form-control col-md-7 col-xs-12" name="total_angsuran" >
          </div>
        </div>
<!--         <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tanggal Jatuh Tempo
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="tempo" class="form-control col-md-7 col-xs-12" name="tempo"  disabled="disabled">
          </div>
        </div> -->
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Angsuran Ke <span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="angsuranke" required="required" class="form-control col-md-7 col-xs-12" name="angsuranke">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Sampai Angsuran Ke <span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="max" required="required" class="form-control col-md-7 col-xs-12" name="max">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Jumlah Bayar <span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="bayar" required="required" class="form-control col-md-7 col-xs-12" name="bayar">
          </div>
        </div>
        <div class="ln_solid"></div>
        <div class="form-group">
          <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
            <button type="submit" class="btn btn-success" id="getData">Bayar</button>
          </div>
        </div>

      </form>
    </div>
  </div>
</div>
<script src="<?=base_url()?>assets/jquery/dist/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
  $('#getData').on('click', function (e) {

    e.preventDefault();

    $.ajax({
      type: 'post',
      url: '<?=base_url('admin/index/getDetailLunas')?>',
      data: $('form').serialize(),
      success: function (i) {
        var jsonObjectParse = JSON.parse(i);
        var jsonObjectStringify = JSON.stringify(jsonObjectParse);
        var jsonObjectFinal = JSON.parse(jsonObjectStringify);
        if(jsonObjectFinal.status == 'true'){
          document.getElementById("kd_pinjaman").value=jsonObjectFinal.data.kd_pinjaman;
          document.getElementById("nama").value=jsonObjectFinal.data.nama;
          document.getElementById("alamat").value=jsonObjectFinal.data.alamat;
          document.getElementById("total_angsuran").value=jsonObjectFinal.data.total_angsuran;
          document.getElementById("angsuranke").value=jsonObjectFinal.data.angsuranke;
          // document.getElementById("tempo").value=jsonObjectFinal.data.tempo;
          document.getElementById("max").value=jsonObjectFinal.data.max;
          document.getElementById("kurang_bayar").value=jsonObjectFinal.data.kurang_bayar;
          document.getElementById("kurang_jangka_waktu").value=jsonObjectFinal.data.kurang_jangka_waktu;
          document.getElementById("pinaltiPelunasan").value=jsonObjectFinal.data.pinaltiPelunasan;
          $('#detailPeminjam').css({'visibility' : 'visible'});
        }else{
          // tidak ada data jadi buat anggota baru
          $('#detailPeminjam').css({'visibility' : 'hidden'});
          new PNotify({
                    title: 'Data Pinjaman',
                    text: 'Data Pinjaman Tidak Ditemukan',
                    type: 'warning',
                    hide: true,
                    styling: 'bootstrap3'
                });
        }
      }    
    });

  });
  $('#formbayarangsuran').on('submit', function(e){
    e.preventDefault();

    $.ajax({
      type: 'post',
      url: '<?=base_url('admin/index/do_lunas')?>',
      data: $('form').serialize(),
      success: function (i) {
        var jsonObjectParse = JSON.parse(i);
        var jsonObjectStringify = JSON.stringify(jsonObjectParse);
        var jsonObjectFinal = JSON.parse(jsonObjectStringify);
        if(jsonObjectFinal.status == 'true'){
          $('#detailPeminjam').css({'visibility' : 'hidden'});
          new PNotify({
                    title: 'Pembayaran Angsuran',
                    text: 'Pembayaran Angsuran ke '+document.getElementById("angsuranke").value+' Berhasil',
                    type: 'success',
                    hide: true,
                    styling: 'bootstrap3'
                });          
        }else if(jsonObjectFinal.status == '0'){
          // pembayaran gagal, coba lagi
          $('#detailPeminjam').css({'visibility' : 'hidden'});
          new PNotify({
                    title: 'Pembayaran Angsuran',
                    text: 'Pembayaran Angsuran Gagal, Coba Lagi',
                    type: 'danger',
                    hide: true,
                    styling: 'bootstrap3'
                });
        }else if(jsonObjectFinal.status == '1'){
          // jumlah pembayaran kurang dari yang harus dibayarkan
          $('#detailPeminjam').css({'visibility' : 'hidden'});
          new PNotify({
                    title: 'Pembayaran Angsuran',
                    text: 'Pembayaran Angsuran Kurang Dari yang harus dibayarkan',
                    type: 'danger',
                    hide: true,
                    styling: 'bootstrap3'
                });
        }else if(jsonObjectFinal.status == '2'){
          // tidak ada data yang diterima server
          $('#detailPeminjam').css({'visibility' : 'hidden'});
          new PNotify({
                    title: 'Pembayaran Angsuran',
                    text: 'Pembayaran Angsuran Tidak Dapat Dilanjutkan',
                    type: 'danger',
                    hide: true,
                    styling: 'bootstrap3'
                });
        }
      }    
    });
  });
  $.listen('parsley:field:validate', function() {
    validateFront();
  });
  $('#formgetanggota .btn').on('click', function() {
    $('#formgetanggota').parsley().validate();
    validateFront();
  });
  var validateFront = function() {
    if (true === $('#formgetanggota').parsley().isValid()) {
      $('.bs-callout-info').removeClass('hidden');
      $('.bs-callout-warning').addClass('hidden');
    } else {
      $('.bs-callout-info').addClass('hidden');
      $('.bs-callout-warning').removeClass('hidden');
    }
  };
});

</script>