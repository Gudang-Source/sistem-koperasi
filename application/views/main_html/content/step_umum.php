<style type="text/css">

</style>

<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2>Pinjaman Karyawan</h2>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
      <!-- Smart Wizard -->
      <div id="wizard" class="form_wizard wizard_horizontal">
        <ul class="wizard_steps">
          <li>
            <a href="#step-1">
              <span class="step_no">1</span>
              <span class="step_descr">
                  Step 1<br />
                  <small>Ajukan Pinjaman</small>
              </span>
            </a>
          </li>
          <li>
            <a href="#step-2">
              <span class="step_no">2</span>
              <span class="step_descr">
                  Step 2<br />
                  <small>Masukkan Jaminan</small>
              </span>
            </a>
          </li>
          <li>
            <a href="#step-3">
              <span class="step_no">2</span>
              <span class="step_descr">
                  Step 3<br />
                  <small>Rincian Angsuran</small>
              </span>
            </a>
          </li>
          <li>
            <a href="#step-4">
              <span class="step_no">3</span>
              <span class="step_descr">
                  Step 3<br />
                  <small>Ketentuan Persyaratan</small>
              </span>
            </a>
          </li>
          <li>
            <a href="#step-5">
              <span class="step_no">4</span>
              <span class="step_descr">
                  Step 4<br />
                  <small>Pencairan</small>
              </span>
            </a>
          </li>
        </ul>
        <div id="step-1">
          <form class="form-horizontal form-label-left">          
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="no_identitas">Nominal Pinjaman <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="hidden" value="<?=$kd_anggota?>" name="kd_anggota" />
                <input type="hidden" value="<?=$jenis?>" name="jenis_pinjaman" />
                <input type="text" class="form-control rangeNominals" value="" name="nominal" />
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="no_identitas">Bunga <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" class="form-control" value="<?=$jenis==1?'3':'2.5'?>" name="bunga" />
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="no_identitas">Jangka Waktu <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" class="form-control rangeWaktus" value="" name="jangkaWaktu" />
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <button type="submit" class="btn btn-success" id="ajukanPinjaman">Ajukan</button>
              </div>
            </div>            
          </form>
        </div>        
        <div id="step-2">
          <form class="form-horizontal form-label-left">
            <div class="form-group form-item" id="inputmsg">
                <select name="selectmsg" id="selectmsg" class="form-control">
                    <option value="0">- Pilih Tipe Jaminan -</option>
                    <option value="1">Jaminan BPKB</option>
                    <option value="2">Jaminan SERTIFIKAT</option>
                </select>
            </div>
          </form>
          <form class="form-horizontal form-label-left" id="inputbpkb">          
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="no_identitas">Rupiah Materai <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" class="form-control" value="" name="materai" id="materai" />
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="no_identitas">Jaminan BPKB<span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="hidden" value="1" name="kd_pinjaman" id="kd_pinjaman" />
<!--                 <input type="text" class="form-control" value="" name="jaminan" />
 -->              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="no_identitas">Nomor Surat <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" class="form-control" value="" name="nosurat" />
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="no_identitas">Nomor Polisi <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" class="form-control" value="" name="nopol" />
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="no_identitas">Merk <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" class="form-control" value="" name="merk" />
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="no_identitas">Tahun <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" class="form-control" value="" name="tahun" />
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="no_identitas">Warna <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" class="form-control" value="" name="warna" />
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="no_identitas">Nomor Rangka <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" class="form-control" value="" name="norangka" />
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="no_identitas">Nomor Mesin <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" class="form-control" value="" name="nomesin" />
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="no_identitas">Atas Nama <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" class="form-control" value="" name="atasnama" />
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="no_identitas">Alamat <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" class="form-control" value="" name="alamat" />
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <button type="submit" class="btn btn-success" id="simpanJaminan">Simpan Jaminan</button>
              </div>
            </div>            
          </form>
          <form class="form-horizontal form-label-left" id="inputsertifikat">          
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="no_identitas">Rupiah Materai <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" class="form-control" value="" name="materai" id="materai" />
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="no_identitas">Jaminan Sertifikat<span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="hidden" value="1" name="kd_pinjaman" id="kd_pinjaman_sertifikat" />
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="no_identitas">Nomor Surat <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" class="form-control" value="" name="nosurat" />
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="no_identitas">Atas Nama <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" class="form-control" value="" name="atasnama" />
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="no_identitas">Luas Tanah <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" class="form-control" value="" name="luastanah" />
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="no_identitas">Alamat <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" class="form-control" value="" name="alamat" />
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <button type="submit" class="btn btn-success" id="simpanJaminan">Simpan Jaminan</button>
              </div>
            </div>            
          </form>
        </div>
        <div id="step-3">
          <form class="form-horizontal form-label-left">          
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nominal">Nominal Pinjaman
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" value=""  class="form-control" name="nominal" id="nominal" disabled="disabled" />
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="jangkawaktu">Jangka Waktu
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" value=""  class="form-control" name="jangkaWaktu" id="jangkawaktu" disabled="disabled" />
              </div>
            </div>           
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="bunga">Bunga
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" value=""  class="form-control" name="bunga" id="bunga" disabled="disabled" disabled="disabled" />
              </div>
            </div>
            <div class="ln_solid"></div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="angsuran_pokok">Angsuran Pokok
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" value=""  class="form-control" name="angsuran_pokok" id="angsuran_pokok" disabled="disabled" />
              </div>
            </div>           
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="hasilBunga">Bunga
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" value=""  class="form-control" name="hasilBunga" id="hasilBunga" disabled="disabled" />
              </div>
            </div>           
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="totalAngsuran">Total
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" value=""  class="form-control" name="totalAngsuran" id="totalAngsuran" disabled="disabled" />
              </div>
            </div>           
          </form>
        </div>
        <div id="step-4">
          <h2 class="StepTitle">Ketentuan Dan Persyaratan</h2>
          <form class="form-horizontal form-label-left">          
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nominal">Biaya Provision
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" value=""  class="form-control" name="nominal" id="provision" disabled="disabled" />
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="jangkawaktu">Biaya Administrasi
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" value=""  class="form-control" name="jangkaWaktu" id="admin" disabled="disabled" />
              </div>
            </div>           
          </form>
        </div>
        <div id="step-5">
          <h2 class="StepTitle">Pencairan</h2>
          <form class="form-horizontal form-label-left">          
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nominal">Total Pinjaman
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" value=""  class="form-control" name="nominal" id="result_total_pinjam" disabled="disabled" />
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="jangkawaktu">Angsuran Perbulan
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" value=""  class="form-control" name="jangkaWaktu" id="result_angsuran" disabled="disabled" />
              </div>
            </div>           
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="jangkawaktu">Jangka Waktu
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" value=""  class="form-control" name="jangkaWaktu" id="result_jangka_waktu" disabled="disabled" />
              </div>
            </div>
            <div class="ln_solid"></div>            
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="jangkawaktu">Biaya Administrasi
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" value=""  class="form-control" name="jangkaWaktu" id="result_administrasi" disabled="disabled" />
              </div>
            </div>           
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="jangkawaktu">Biaya Provision
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" value=""  class="form-control" name="jangkaWaktu" id="result_provision" disabled="disabled" />
              </div>
            </div>           
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="jangkawaktu">Biaya Materai
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" value=""  class="form-control" name="jangkaWaktu" id="result_materai" disabled="disabled" />
              </div>
            </div>           
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="jangkawaktu">Total Terima
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" value=""  class="form-control" name="jangkaWaktu" id="result_terima" disabled="disabled" />
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-6 col-sm-6 col-xs-12">
                <a href="#" class="btn btn-primary" id="perjanjianKredit" target="_blank">CETAK PERJANJIAN KREDIT</a>
              </div>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <a href="#" class="btn btn-primary" id="serahTerimaJaminan" target="_blank">CETAK TANDA TERIMA JAMINAN</a>
              </div>
            </div>

          </form>          
        </div>
      </div>
      <input type="hidden" class="form-control" value="" name="materai" id="materaiOut" />
      <a href="#" id="cancel" class="btn btn-danger" style="pointer-events:none;">BATAL</a>
      <!-- End SmartWizard Content -->
    </div>
  </div>
</div>
<script src="<?=base_url()?>assets/jquery/dist/jquery.min.js"></script>
<!-- jQuery Smart Wizard -->
<script src="<?=base_url()?>assets/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>
<!-- Ion.RangeSlider -->
<script src="<?=base_url()?>assets/ion.rangeSlider/js/ion.rangeSlider.min.js"></script>
<!-- jQuery Smart Wizard -->
<script type="text/javascript">
  (function($) {
    $("#wizard").smartWizard("fixHeight");
    // $('#wizard').css({'height': window.screen.height+'px'});
   
    $('#wizard').smartWizard();
    $('.buttonNext').addClass('btn btn-success');
    $('.buttonNext').addClass("buttonDisable");
    $('.buttonNext').attr("disabled", "disabled");
    $('.buttonNext').css({'visibility' : 'hidden'});

    $('.buttonPrevious').addClass('btn btn-primary');
    $('.buttonFinish').addClass('btn btn-default');
    $(".rangeNominal").ionRangeSlider({
      min: +0,
      max: +100000000,
      from: +0,
      grid: true,
      force_edges: true,
      step: 50000
    });
    $(".rangeWaktu").ionRangeSlider({
      min: +3,
      max: +36,
      from: +3,
      grid: true,
      force_edges: true,
      step: 3
    });
  })(jQuery);
</script>
<!-- /jQuery Smart Wizard -->
<script type="text/javascript">
  $(document).ready(function(){
    $('.buttonFinish').on('click', function(e){
      e.preventDefault();
      var value = $(".buttonFinish").attr("id");
      $.ajax({
        type: 'post',
        url: '<?=base_url('admin/index/finish_pinjaman')?>/'+value,
        data: $('form').serialize(),
        success: function (i) {
          if(i == 'true'){
              new PNotify({
                  title: 'Pengajuan Pinjaman',
                  text: 'Pinjaman Berhasil',
                  type: 'success',
                  hide: true,
                  styling: 'bootstrap3'
              });
              // redirect
              window.location.replace("<?=base_url('admin/index/data_peminjam')?>");

          }else{
              new PNotify({
                  title: 'Pengajuan Pinjaman',
                  text: 'Peminjaman Gagal, Silakan Coba Lagi',
                  type: 'warning',
                  hide: true,
                  styling: 'bootstrap3'
              });            
          }
        }        
      });      
    });
    $('#cancel').on('click', function(e){
      e.preventDefault();
      var urls = document.getElementById("cancel").href;
      $.ajax({
        type: 'post',
        url: urls,
        data: $('form').serialize(),
        success: function (i) {
          if(i == 'true'){
              new PNotify({
                  title: 'Pembatalan Pinjaman',
                  text: 'Pembatalan Berhasil',
                  type: 'success',
                  hide: true,
                  styling: 'bootstrap3'
              });            
              window.location.replace("<?=base_url('admin/index/buat_pinjaman')?>");
          }
        }        
      });      
    });
    $('#ajukanPinjaman').on('click', function(e){
      e.preventDefault();
      $.ajax({
        type: 'post',
        url: '<?=base_url('admin/index/do_ajukan_pinjaman')?>',
        data: $('form').serialize(),
        success: function (i) {
          $("#cancel").removeAttr("style");
          var jsonObjectParse = JSON.parse(i);
          var jsonObjectStringify = JSON.stringify(jsonObjectParse);
          var jsonObjectFinal = JSON.parse(jsonObjectStringify);
          if (jsonObjectFinal.status == 'true') {
              document.getElementById("nominal").value=jsonObjectFinal.data.jumlah_pinjaman;
              document.getElementById("jangkawaktu").value=jsonObjectFinal.data.jangka_waktu;
              document.getElementById("bunga").value=jsonObjectFinal.data.bunga;
              document.getElementById("angsuran_pokok").value=jsonObjectFinal.data.pokok_angsuran;
              document.getElementById("hasilBunga").value=jsonObjectFinal.data.bunga_angsuran;
              document.getElementById("totalAngsuran").value=jsonObjectFinal.data.total_angsuran;
              document.getElementById("provision").value=jsonObjectFinal.data.provision;
              document.getElementById("admin").value=jsonObjectFinal.data.administrasi;
              document.getElementById("kd_pinjaman").value=jsonObjectFinal.data.kd_pinjaman;
              document.getElementById("kd_pinjaman_sertifikat").value=jsonObjectFinal.data.kd_pinjaman;
              var total_angsuran = jsonObjectFinal.data.pokok_angsuran + jsonObjectFinal.data.bunga_angsuran;
              document.getElementById("result_angsuran").value=total_angsuran;
              document.getElementById("result_jangka_waktu").value=jsonObjectFinal.data.jangka_waktu;
              document.getElementById("result_total_pinjam").value=jsonObjectFinal.data.jumlah_pinjaman;
              document.getElementById("result_administrasi").value=jsonObjectFinal.data.administrasi;
              document.getElementById("result_provision").value=jsonObjectFinal.data.provision;

              $("#cancel").attr("href", "<?=base_url('admin/index/batal')?>/"+jsonObjectFinal.data.kd_pinjaman);
              $(".buttonFinish").attr("id", jsonObjectFinal.data.kd_pinjaman);
              new PNotify({
                  title: 'Pengajuan Pinjaman',
                  text: 'Pengajuan Berhasil, Klik Next untuk Rincian',
                  type: 'success',
                  hide: true,
                  styling: 'bootstrap3'
              });
              $("#ajukanPinjaman").attr("disabled", "disabled");
              $(".buttonNext").removeAttr("disabled");
              $('.buttonNext').css({'visibility' : 'visible'});
          }
        }        
      });
    });
    $('#simpanJaminan').on('click', function(e){
      e.preventDefault();
      $.ajax({
        type: 'post',
        url: '<?=base_url('admin/index/do_save_jaminan')?>',
        data: $('#inputbpkb').serialize(),
        success: function (i) {
          var jsonObjectParse = JSON.parse(i);
          var jsonObjectStringify = JSON.stringify(jsonObjectParse);
          var jsonObjectFinal = JSON.parse(jsonObjectStringify);

          var materai = jsonObjectFinal.materai;          
          var totalPinjam = document.getElementById("result_total_pinjam").value;
          var administrasi = document.getElementById("result_administrasi").value;
          var provision = document.getElementById("result_provision").value;
          var terima = parseInt(totalPinjam) - (administrasi + provision + parseInt(jsonObjectFinal.materai));
          document.getElementById("result_materai").value=jsonObjectFinal.materai;
          document.getElementById("result_terima").value=terima;

          document.getElementById("materaiOut").value = materai;
          document.getElementById("result_materai").value=materai;

          var value = $(".buttonFinish").attr("id");
          document.getElementById("perjanjianKredit").href = "<?=base_url('admin/index/cetak')?>/"+value+"/"+materai;
          document.getElementById("serahTerimaJaminan").href = "<?=base_url('admin/index/cetakJaminan')?>/"+value;


          if (jsonObjectFinal.status == 'true') {
              new PNotify({
                  title: 'Jaminan',
                  text: 'Jaminan Tersimpan, Klik Next untuk Rincian',
                  type: 'success',
                  hide: true,
                  styling: 'bootstrap3'
              });
              $("#simpanJaminan").attr("disabled", "disabled");
              $(".buttonNext").removeAttr("disabled");
              $('.buttonNext').css({'visibility' : 'visible'});

          }
        }        
      });
    });    
    $('#inputsertifikat').on('submit', function(e){
      e.preventDefault();
      $.ajax({
        type: 'post',
        url: '<?=base_url('admin/index/do_save_jaminan/sertifikat')?>',
        data: $('#inputsertifikat').serialize(),
        success: function (i) {
          var jsonObjectParse = JSON.parse(i);
          var jsonObjectStringify = JSON.stringify(jsonObjectParse);
          var jsonObjectFinal = JSON.parse(jsonObjectStringify);

          var materai = jsonObjectFinal.materai;
          document.getElementById("materaiOut").value = materai;

          var totalPinjam = document.getElementById("result_total_pinjam").value;
          var administrasi = document.getElementById("result_administrasi").value;
          var provision = document.getElementById("result_provision").value;
          var terima = parseInt(totalPinjam) - (parseInt(administrasi) + parseInt(provision) + parseInt(jsonObjectFinal.materai));
          document.getElementById("result_materai").value=materai;
          document.getElementById("result_terima").value=terima;
          document.getElementById("materaiOut").value = materai;

          var value = $(".buttonFinish").attr("id");
          document.getElementById("perjanjianKredit").href = "<?=base_url('admin/index/cetak')?>/"+value+"/"+materai;
          document.getElementById("serahTerimaJaminan").href = "<?=base_url('admin/index/cetakJaminan')?>/"+value;

          if (jsonObjectFinal.status == 'true') {
              new PNotify({
                  title: 'Jaminan',
                  text: 'Jaminan Tersimpan, Klik Next untuk Rincian',
                  type: 'success',
                  hide: true,
                  styling: 'bootstrap3'
              });
              $("#simpanJaminan").attr("disabled", "disabled");
              $(".buttonNext").removeAttr("disabled");
              $('.buttonNext').css({'visibility' : 'visible'});

          }
        }        
      });
    });    
  });
</script>
<script type="text/javascript">
        $('#inputbpkb').hide();
        $('#inputsertifikat').hide();
        var recipienttype = 0;
    
        $('#selectmsg').change(function(){
            var tipe = $(this).val();
            if(tipe == '1'){
                $('#inputbpkb').show();
                $('#inputsertifikat').hide();
            }else if(tipe == '2'){
                $('#inputbpkb').hide();
                $('#inputsertifikat').show();
            }
            $('.stepContainer').css({'height' : '120%'});            
            $("#wizard").smartWizard("fixHeight");
            // $('#wizard').css({'height': window.screen.height+'px'});
        });
    
</script>
