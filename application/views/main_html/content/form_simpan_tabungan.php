<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2>Setor Tabungan</h2>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
      <br />
      <form id="simpantabungan" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="<?=base_url('admin/index/simpan_tabungan')?>">

        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="no_identitas">Nama <span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="nama" required="required" class="form-control col-md-7 col-xs-12" name="nama" value="<?=$data_anggota->row()->nama_anggota?>"  disabled="disabled">
            <input type="hidden" id="kd_anggota" required="required" class="form-control col-md-7 col-xs-12" name="kd_anggota" value="<?=$data_anggota->row()->kd_anggota?>">
            <input type="hidden" id="nama" required="required" class="form-control col-md-7 col-xs-12" name="nama" value="<?=$data_anggota->row()->nama_anggota?>">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="type">Alamat <span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="alamat" required="required" class="form-control col-md-7 col-xs-12" name="alamat" value="<?=$data_anggota->row()->alamat_anggota?>" disabled="disabled">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="type">Saldo <span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="saldo" required="required" class="form-control col-md-7 col-xs-12" name="saldo" value="<?=$saldo?>" disabled="disabled">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="type">Nominal <span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="nominal" required="required" class="form-control col-md-7 col-xs-12" name="nominal">
          </div>
        </div>
        <div class="ln_solid"></div>
        <div class="form-group">
          <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
            <a class="btn btn-danger" id="batal" href="#">Batal</a>
            <button type="submit" class="btn btn-success" id="simpan">Simpan</button>
          </div>
        </div>

      </form>
    </div>
  </div>
</div>
<script src="<?=base_url()?>assets/jquery/dist/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
  $("#simpantabungan").on('submit', function(e){
    e.preventDefault();
    var base_url = '<?=base_url()?>';

    $.ajax({
      type: $('form').attr("method"),
      url: $('form').attr("action"),
      data: $('form').serialize(),
      success: function (i) {
        if (i == 'true') {
          // tidak ada data jadi buat anggota baru
          new PNotify({
                    title: 'Tabungan',
                    text: 'Tambah Dana Berhasil',
                    type: 'success',
                    hide: true,
                    styling: 'bootstrap3'
                });
          
        }else{
          // tidak ada data jadi buat anggota baru
          new PNotify({
                    title: 'Status Peminjam',
                    text: 'Tambah Dana Gagal, Coba Lagi',
                    type: 'warning',
                    hide: true,
                    styling: 'bootstrap3'
                });        }
      }    
    });
  });
});
</script>