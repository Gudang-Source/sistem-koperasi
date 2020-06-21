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
                  <small>Ajukan Perpanjangan</small>
              </span>
            </a>
          </li>
          <li>
            <a href="#step-2">
              <span class="step_no">2</span>
              <span class="step_descr">
                  Step 2<br />
                  <small>Rincian Angsuran</small>
              </span>
            </a>
          </li>
          <li>
            <a href="#step-3">
              <span class="step_no">3</span>
              <span class="step_descr">
                  Step 3<br />
                  <small>Ketentuan Persyaratan</small>
              </span>
            </a>
          </li>
          <li>
            <a href="#step-4">
              <span class="step_no">4</span>
              <span class="step_descr">
                  Step 4<br />
                  <small>Finish</small>
              </span>
            </a>
          </li>
        </ul>
        <div id="step-1">
          <form class="form-horizontal form-label-left">
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="no_identitas">Jangka Waktu <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="hidden" value="<?=$kd_anggota?>" name="kd_anggota" />
                <input type="text" class="rangeWaktu" value="" name="jangkaWaktu" />
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <button type="submit" class="btn btn-success" id="ajukanPerpanjangan">Ajukan</button>
              </div>
            </div>            
          </form>
        </div>
        <div id="step-2">
          <form class="form-horizontal form-label-left">          
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nominal">Nominal Pinjaman
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" value="" class="form-control" name="nominal" id="nominal" disabled="disabled" />
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="jangkawaktu">Jangka Waktu
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" value="" class="form-control" name="jangkaWaktu" id="jangkawaktu" disabled="disabled" />
              </div>
            </div>          
          </form>
        </div>
        <div id="step-3">
          <h2 class="StepTitle">Ketentuan Dan Persyaratan</h2>
          <form class="form-horizontal form-label-left">          
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nominal">Biaya Provision
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" value="" class="form-control" name="nominal" id="provision" disabled="disabled" />
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
        <div id="step-4">
          <h2 class="StepTitle">Finish</h2>
        </div>
      </div>
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
    $('#wizard').smartWizard();
    $('.buttonNext').addClass('btn btn-success');
    $('.buttonNext').attr("disabled", "disabled");
    $('.buttonNext').css({'visibility' : 'hidden'});
    $('.buttonPrevious').addClass('btn btn-primary');
    $('.buttonFinish').addClass('btn btn-default');
    $(".rangeNominal").ionRangeSlider({
      min: +0,
      max: +500000,
      from: +0,
      grid: true,
      force_edges: true,
      step: 5000
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
    $('#ajukanPerpanjangan').on('click', function(e){
      e.preventDefault();
      $.ajax({
        type: 'post',
        url: '<?=base_url('admin/index/do_perpanjang_angsuran')?>',
        data: $('form').serialize(),
        success: function (i) {
          var jsonObjectParse = JSON.parse(i);
          var jsonObjectStringify = JSON.stringify(jsonObjectParse);
          var jsonObjectFinal = JSON.parse(jsonObjectStringify);
          if (jsonObjectFinal.status == 'true') {
              document.getElementById("nominal").value=jsonObjectFinal.data.jumlah_pinjaman;
              document.getElementById("jangkawaktu").value=jsonObjectFinal.data.jangka_waktu;
              document.getElementById("provision").value=jsonObjectFinal.data.provision;
              document.getElementById("admin").value=jsonObjectFinal.data.administrasi;
              $(".buttonFinish").attr("id", jsonObjectFinal.data.kd_pinjaman);              
              new PNotify({
                  title: 'Perpanjangan Angsuran',
                  text: 'Perpanjangan Berhasil, Klik Next untuk Rincian',
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
    $('.buttonFinish').on('click', function(e){
      e.preventDefault();
      var value = $(".buttonFinish").attr("id");
      $.ajax({
        type: 'post',
        url: '<?=base_url('admin/index/finish_perpanjangan')?>/'+value,
        data: $('form').serialize(),
        success: function (i) {
          if(i == 'true'){
              new PNotify({
                  title: 'Perpanjangan Angsuran',
                  text: 'Perpanjangan Berhasil, Klik Next untuk Rincian',
                  type: 'success',
                  hide: true,
                  styling: 'bootstrap3'
              });
              window.location.replace("<?=base_url('admin/index/data_peminjam')?>");
              
          }else{
              new PNotify({
                  title: 'Perpanjangan Angsuran',
                  text: 'Perpanjangan Gagal, Klik Next untuk Rincian',
                  type: 'warning',
                  hide: true,
                  styling: 'bootstrap3'
              });            
          }
        }        
      });
    });
  });
</script>
