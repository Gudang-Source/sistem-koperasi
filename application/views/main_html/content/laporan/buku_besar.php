<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2>Laporan Buku Besar</h2>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
      <br />
      <form id="formgetanggota" data-parsley-validate class="form-vertical form-label-left" method="POST" action="<?=base_url('admin/index/do_laporan_buku_besar')?>">

        <div class="form-group">
          <div class="col-md-4 col-sm-4 col-xs-4">
            <input type="text" id="datea" required="required" class="form-control col-md-7 col-xs-4" name="datea" placeholder="Tanggal Awal">
          </div>
          <div class="col-md-4 col-sm-4 col-xs-4">
            <input type="text" id="dateb" required="required" class="form-control col-md-7 col-xs-4" name="dateb" placeholder="Tanggal Akhir">
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-8 col-sm-8 col-xs-8">
            <select name="akun"  class="select2_single form-control" tabindex="-1">
              <?php foreach ($data_akun->result_array() as $row) { ?>
                <option value="<?=$row['kode_akun']?>"><?=$row['nama']?></option>
              <?php } ?>
            </select>
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-8 col-sm-8 col-xs-8">
            <button type="submit" class="btn btn-success" id="getData">PROSES</button>
          </div>
        </div>

      </form>
    </div>
  </div>
</div>
<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2>Laporan Buku Besar</h2>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
      <div id="resultLaporan"></div>
    </div>
  </div>
</div>
<script src="<?=base_url()?>assets/jquery/dist/jquery.min.js"></script>
<script src="<?=base_url()?>assets/select2/dist/js/select2.full.min.js"></script>

<script src="<?=base_url()?>assets/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>assets/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="<?=base_url()?>assets/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?=base_url()?>assets/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
<script src="<?=base_url()?>assets/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="<?=base_url()?>assets/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="<?=base_url()?>assets/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="<?=base_url()?>assets/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
<script src="<?=base_url()?>assets/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="<?=base_url()?>assets/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?=base_url()?>assets/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
<script src="<?=base_url()?>assets/datatables.net-scroller/js/datatables.scroller.min.js"></script>
<script src="<?=base_url()?>assets/jszip/dist/jszip.min.js"></script>
<script src="<?=base_url()?>assets/pdfmake/build/pdfmake.min.js"></script>
<script src="<?=base_url()?>assets/pdfmake/build/vfs_fonts.js"></script>
<script type="text/javascript">
$(document).ready(function() {
  $(".select2_single").select2({
    placeholder: "Select a state",
    allowClear: true
  });
  $('#getData').on('click', function (e) {
    e.preventDefault();
    $.ajax({
      type: 'post',
      url: '<?=base_url('admin/index/do_laporan_buku_besar')?>',
      data: $('form').serialize(),
      success: function (i) {
        document.getElementById('resultLaporan').innerHTML = i;
        $('#tabelLaporanPinjaman').DataTable({
          dom: "Bfrtip",
          buttons: [
            {
              extend: "copy",
              className: "btn-sm"
            },
            {
              extend: "csv",
              className: "btn-sm"
            },
            {
              extend: "excel",
              className: "btn-sm"
            },
            {
              extend: "pdfHtml5",
              className: "btn-sm"
            },
            {
              extend: "print",
              className: "btn-sm"
            },
          ],
          responsive: true
        });        
      }    
    });
  });
});
</script>