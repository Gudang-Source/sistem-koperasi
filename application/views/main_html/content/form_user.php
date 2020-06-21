<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2>Tambah User</h2>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
      <br />
      <form id="formadduser" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="#">

        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Nama <span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="nama" required="required" class="form-control col-md-7 col-xs-12" name="nama">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="alamt">Alamat <span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="last-name" required="required" class="form-control col-md-7 col-xs-12" name="alamat">
          </div>
        </div>
        <div class="form-group">
          <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">No Identitas (KTP) <span class="required">*</span></label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input id="middle-name" required="required" class="form-control col-md-7 col-xs-12" type="text" name="no_identitas">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">No HP <span class="required">*</span></label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input id="nohp" class="form-control col-md-7 col-xs-12" type="text" name="no_hp">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal Lahir <span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input id="birthday" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text" name="tanggal_lahir">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal Masuk <span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input id="date" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text" name="tanggal_masuk">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Username <span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input id="username" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text" name="username">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Password <span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input id="password" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text" name="password">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Level <span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <?php $dataLevel = modules::run('admin/index/getLevel'); ?>
            <select name="level"  class="select2_single form-control" tabindex="-1">
              <?php foreach ($dataLevel->result_array() as $row) { ?>
                <option value="<?=$row['kd_level']?>"><?=$row['level']?></option>
              <?php } ?>
            </select>
          </div>
        </div>
        <div class="ln_solid"></div>
        <div class="form-group">
          <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
            <button type="submit" class="btn btn-primary">Cancel</button>
            <button type="submit" class="btn btn-success">Tambah</button>
          </div>
        </div>

      </form>
    </div>
  </div>
</div>
<script src="<?=base_url()?>assets/jquery/dist/jquery.min.js"></script>
<script src="<?=base_url()?>assets/select2/dist/js/select2.full.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
  $(".select2_single").select2({
    placeholder: "Pilih Salah Satu",
    allowClear: true
  });
});
</script>
<script type="text/javascript">
$(document).ready(function() {
  $('#formadduser').on('submit', function (e) {

    e.preventDefault();

    $.ajax({
      type: 'post',
      url: '<?=base_url('admin/index/post_add/user')?>',
      data: $('form').serialize(),
      success: function (i) {
        if(i == 'true'){
          new PNotify({
                              title: 'Insert Success',
                              text: 'Insert Data Success',
                              type: 'success',
                              hide: true,
                              styling: 'bootstrap3'
                          });
              window.location.replace("<?=base_url('admin/index/data/user')?>");          

        }else{
          new PNotify({
                            title: 'Insert Failed',
                            text: i,
                            type: 'error',
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
  $('#formadduser .btn').on('click', function() {
    $('#formadduser').parsley().validate();
    validateFront();
  });
  var validateFront = function() {
    if (true === $('#formadduser').parsley().isValid()) {
      $('.bs-callout-info').removeClass('hidden');
      $('.bs-callout-warning').addClass('hidden');
    } else {
      $('.bs-callout-info').addClass('hidden');
      $('.bs-callout-warning').removeClass('hidden');
    }
  };
});

</script>