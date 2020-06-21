<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2>Pinjaman</h2>
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
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="type">Tipe Anggota <span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="checkbox" name="type" id="type" type="checkbox" data-off-text="Karyawan" data-on-text="Umum" checked="false" class="BSswitch"/>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="type">Jenis Pinjaman <span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="checkbox" name="jenis" id="jenis" type="checkbox" data-off-text="Pokok + Bunga" data-on-text="Bunga" checked="false" class="BSswitch"/>
          </div>
        </div>
        <div class="ln_solid"></div>
        <div class="form-group">
          <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
            <button type="submit" class="btn btn-success" id="getData">Ambil</button>
            <button type="submit" class="btn btn-success" id="nextStep" disabled="disabled">Lanjut</button>
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
      <form id="#" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="#">
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama <span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="nama" required="required" class="form-control col-md-7 col-xs-12" name="nama" disabled="disabled">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Alamat <span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="alamat" required="required" class="form-control col-md-7 col-xs-12" name="alamat"  disabled="disabled">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">No Karyawan (Optional)</label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input id="nokaryawan" class="form-control col-md-7 col-xs-12" type="text" name="nokaryawan"  disabled="disabled">
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<script src="<?=base_url()?>assets/jquery/dist/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
  $('.BSswitch').bootstrapSwitch('state', false);
  $('#getData').on('click', function (e) {
    e.preventDefault();

    $.ajax({
      type: 'post',
      url: '<?=base_url('admin/index/getAnggota')?>',
      data: $('form').serialize(),
      success: function (i) {
        var jsonObjectParse = JSON.parse(i);
        var jsonObjectStringify = JSON.stringify(jsonObjectParse);
        var jsonObjectFinal = JSON.parse(jsonObjectStringify);
        if(jsonObjectFinal.status == 'true'){
          // console.log(jsonObjectFinal.data.nama);
          document.getElementById("nama").value=jsonObjectFinal.data.nama;
          document.getElementById("alamat").value=jsonObjectFinal.data.alamat;
          document.getElementById("nokaryawan").value=jsonObjectFinal.data.no_karyawan;
          if(jsonObjectFinal.data.no_karyawan == '0' || jsonObjectFinal.data.no_karyawan == 0 || jsonObjectFinal.data.no_karyawan == '' || jsonObjectFinal.data.no_karyawan == null){
            // umum
            document.getElementById("type").checked = true;
            $('#type').bootstrapSwitch('state', true);
            if ($('#type').attr('readonly')) {
            } else {
                $('#type').bootstrapSwitch('readonly', true);
                // $('#type').attr('readonly','readonly');
            }            
          }else{
            // karyawan
            document.getElementById("type").checked = false;
            $('#type').bootstrapSwitch('state', false);
            if ($('#type').attr('readonly')) {
                $('#type').bootstrapSwitch('readonly', false);
                // $('#type').removeAttr('readonly');
            } else {
            }            
          }
          
          $('#detailPeminjam').css({'visibility' : 'visible'});
          $("#nextStep").removeAttr("disabled");

        }else if(jsonObjectFinal.status == '0'){
          // tidak ada data jadi buat anggota baru
          new PNotify({
                    title: 'Status Peminjam',
                    text: 'Data Peminjam Tidak Ditemukan, Tambah Baru Peminjam',
                    type: 'warning',
                    hide: true,
                    styling: 'bootstrap3'
                });
          // document.getElementById("nama").value=jsonObjectFinal.data.nama;
          // document.getElementById("alamat").value=jsonObjectFinal.data.alamat;
          // document.getElementById("nokaryawan").value=jsonObjectFinal.data.no_karyawan;
          
          $('#detailPeminjam').css({'visibility' : 'hidden'});
          $("#nextStep").attr("disabled", "disabled");
        }else if(jsonObjectFinal.status == '1'){
          // punya tanggungan pinjaman
          new PNotify({
                    title: 'Status Peminjam',
                    text: 'Peminjam masih mempunyai tanggungan',
                    type: 'warning',
                    hide: true,
                    styling: 'bootstrap3'
                });
          $('#detailPeminjam').css({'visibility' : 'hidden'});
          $("#nextStep").attr("disabled", "disabled");
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