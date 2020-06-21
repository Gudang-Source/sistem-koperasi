<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2>Daftar Peminjam</h2>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
      <div class="row">
        <div class="btn-group  btn-group-sm">
          <button class="btn btn-default" type="button" id="all">SEMUA</button>
          <button class="btn btn-default" type="button" id="umum">UMUM</button>
          <button class="btn btn-default" type="button" id="karyawan">KARYAWAN</button>
        </div>
        <div id="result" class="col-md-12 col-sm-12 col-xs-12">
        </div>
      </div>
    </div>
  </div>
</div>
<script src="<?=base_url()?>assets/jquery/dist/jquery.min.js"></script>
<script type="text/javascript">
  function showDialogDetail(id, r){
      var iRow = r.parentNode.parentNode.rowIndex;
      $.ajax({
        type: 'post',
        url: '<?=base_url('admin/index/detail_pinjaman')?>/'+id,
        data: $('form').serialize(),
        success: function (i) {
          document.getElementById('resultTransaksi').innerHTML = i;
        }    
      });        
  }
  $(document).ready(function(){
    $('#all').on('click', function(e){
      e.preventDefault();
      $('#all').addClass('active');
      $('#umum').removeClass('active');
      $('#karyawan').removeClass('active');

      $.ajax({
        type: 'post',
        url: '<?=base_url('admin/index/getDataPeminjam/')?>',
        data: $('form').serialize(),
        success: function (i) {
          document.getElementById('result').innerHTML = i;
        }
      });

    });
    $('#umum').on('click', function(e){
      e.preventDefault();
      $('#umum').addClass('active');
      $('#all').removeClass('active');
      $('#karyawan').removeClass('active');
      $.ajax({
        type: 'post',
        url: '<?=base_url('admin/index/getDataPeminjam/umum')?>',
        data: $('form').serialize(),
        success: function (i) {
          document.getElementById('result').innerHTML = i;
        }
      });
    });
    $('#karyawan').on('click', function(e){
      e.preventDefault();
      $('#karyawan').addClass('active');
      $('#all').removeClass('active');
      $('#umum').removeClass('active');
      $.ajax({
        type: 'post',
        url: '<?=base_url('admin/index/getDataPeminjam/karyawan')?>',
        data: $('form').serialize(),
        success: function (i) {
          document.getElementById('result').innerHTML = i;
        }
      });
    });
  });

</script>