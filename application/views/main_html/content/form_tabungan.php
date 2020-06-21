<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2>Simpanan</h2>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
      <br />
      <form id="formgetanggota" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="<?=base_url('admin/index/getDetailNasabah')?>">

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
<?php $data['tableAnggota'] = $tableAnggota; ?>
<?php $this->load->view('main_html/content/list_nasabah_tabungan', $data) ?>
<div class="col-md-12 col-sm-12 col-xs-12" style="visibility: hidden;" id="detailNasabah">
  <div class="x_panel">
    <div class="x_title">
      <h2>Data Nasabah</h2>
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
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Saldo
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="saldo" class="form-control col-md-7 col-xs-12" name="saldo"  disabled="disabled" >
          </div>
        </div>
        <div class="ln_solid"></div>
        <div class="form-group">
          <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
            <a class="btn btn-success" id="simpan" href="#">Setor</a>
            <a class="btn btn-success" id="ambil" href="#">Penarikan</a>
          </div>
        </div>

      </form>
    </div>
  </div>
</div>
<script src="<?=base_url()?>assets/jquery/dist/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
  $('#formgetanggota').on('submit', function (e) {

    e.preventDefault();

    var base_url = '<?=base_url()?>';

    $.ajax({
      type: $('form').attr("method"),
      url: $('form').attr("action"),
      data: $('form').serialize(),
      success: function (i) {
        var jsonObjectParse = JSON.parse(i);
        var jsonObjectStringify = JSON.stringify(jsonObjectParse);
        var jsonObjectFinal = JSON.parse(jsonObjectStringify);
        document.getElementById("nama").value=jsonObjectFinal.data.nama;
        document.getElementById("alamat").value=jsonObjectFinal.data.alamat;
        document.getElementById("saldo").value=jsonObjectFinal.data.saldo;
        document.getElementById("simpan").href = base_url+'admin/index/form_simpan_tabungan/'+jsonObjectFinal.data.kd_anggota;
        document.getElementById("ambil").href = base_url+'admin/index/form_tarik_tabungan/'+jsonObjectFinal.data.kd_anggota;
        $('#detailNasabah').css({'visibility' : 'visible'});
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