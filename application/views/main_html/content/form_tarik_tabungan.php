<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2>Penarikan Tabungan</h2>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
      <br />
      <form id="simpantabungan" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="<?=base_url('admin/index/tarik_tabungan')?>">

        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="no_identitas">Nama <span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="nama" required="required" class="form-control col-md-7 col-xs-12" name="nama" value="<?=$data_anggota->row()->nama_anggota?>"  disabled="disabled">
            <input type="hidden" id="kd_anggota" required="required" class="form-control col-md-7 col-xs-12" name="kd_anggota" value="<?=$data_anggota->row()->kd_anggota?>">
            <input type="hidden" id="nama" required="required" class="form-control col-md-7 col-xs-12" name="nama" value="<?=$data_anggota->row()->nama_anggota?>">
            <input type="hidden" id="saldoHidden" required="required" class="form-control col-md-7 col-xs-12" name="saldoHidden" value="<?=$saldo?>">
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
    var saldo = document.getElementById('saldoHidden').value;
    var nominal = document.getElementById('nominal').value;
    if(nominal <= saldo){    
      $.ajax({
        type: $('form').attr("method"),
        url: $('form').attr("action"),
        data: $('form').serialize(),
        success: function (i) {
          if(i == 'true'){
            new PNotify({
                      title: 'Tabungan',
                      text: 'Berhasil Tarik Dana',
                      type: 'success',
                      hide: true,
                      styling: 'bootstrap3'
                  });      
          }else{
            new PNotify({
                      title: 'Tabungan',
                      text: 'Gagal Tarik Dana',
                      type: 'alert',
                      hide: true,
                      styling: 'bootstrap3'
                  });            
          }
        }    
      });
    }else{
        new PNotify({
                  title: 'Tabungan',
                  text: ' Saldo Tidak Mencukupi ',
                  type: 'alert',
                  hide: true,
                  styling: 'bootstrap3'
              });      
    }

  });
});
</script>