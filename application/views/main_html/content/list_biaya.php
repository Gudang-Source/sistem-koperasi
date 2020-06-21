<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2>Daftar Biaya Operasional</h2>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
      <a href="#" class="btn btn-success" data-toggle="modal" data-target=".bs-posting-modal-md" >POSTING BIAYA</a>
      <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap"  cellspacing="0" width="100%">
        <thead>
          <tr>
            <th>Nomor</th>
            <th>Nama Biaya</th>
            <th>Biaya</th>
            <th>Aksi</th>
          </tr>
        </thead>


        <tbody>
          <?php if($data_biaya->num_rows() > 0){ ?>
          <?php $nomor = 1;?>
            <?php foreach ($data_biaya->result_array() as $row) { ?>                        
              <tr>
                <td><?=$nomor?></td>
                <td><?=$row['biaya']?></td>
                <td><?=$row['value']?></td>
                <td>
                  <a href="#ubah?kd_biaya=<?=sha1($row['kd_biaya'])?>" id="ubah" class="btn btn-sm btn-success" data-toggle="modal" data-target=".bs-update-modal-md" data-id='<?=sha1($row['kd_biaya'])?>' onClick="showDialogUpdate('<?=sha1($row['kd_biaya'])?>', this)">UBAH</a>
                </td>
              </tr>
              <?php $nomor++; ?>
            <?php } ?>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
    <!-- modals posting -->
    <div class="modal fade bs-posting-modal-md" id="modalPosting" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">

        <form id="formpostingbiaya" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="#">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" id="myModalLabel2">Posting Data Biaya</h4>
          </div>
          <div class="modal-body">
            <p>Posting Semua Data Biaya Operasional Kedalam Jurnal?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
            <button type="button" class="btn btn-primary" id="ya">Ya</button>
          </div>
        </form>

        </div>
      </div>
    </div>
    <!-- /modals posting -->
    <!-- modals update -->
    <div class="modal fade bs-update-modal-md" id="modalUpdate" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">

        <form id="formupdatebiaya" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="#">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" id="myModalLabel2">Ubah Data Biaya</h4>
          </div>
          <div class="modal-body">

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Biaya<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="nama" required="required" class="form-control col-md-7 col-xs-12" name="nama" disabled="disabled">
                  <input type="hidden" id="nama" required="required" class="form-control col-md-7 col-xs-12" name="nama">
                  <input type="hidden" id="kd" required="required" class="form-control col-md-7 col-xs-12" name="kd_biaya">
                  <input type="hidden" id="row" required="required" class="form-control col-md-7 col-xs-12" name="row">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Biaya <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="biaya" required="required" class="form-control col-md-7 col-xs-12" name="biaya">
                </div>
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary" id="save">Simpan Perubahan</button>
          </div>
        </form>

        </div>
      </div>
    </div>
    <!-- /modals update-->
    <!-- jQuery -->
    <script src="<?=base_url()?>assets/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript">
        function showDialogUpdate(id, r){
            var iRow = r.parentNode.parentNode.rowIndex;
            $.ajax({
              type: 'post',
              url: '<?=base_url('admin/index/post_get/biaya')?>/'+id,
              data: $('form').serialize(),
              success: function (i) {
                var jsonObjectParse = JSON.parse(i);
                var jsonObjectStringify = JSON.stringify(jsonObjectParse);
                var jsonObjectFinal = JSON.parse(jsonObjectStringify);
                document.getElementById("row").value=iRow;
                document.getElementById("nama").value=jsonObjectFinal.biaya;
                document.getElementById("kd").value=jsonObjectFinal.kd_biaya;
              }    
            });        
        }
      $(document).ready(function(){
        $('#formupdatebiaya').on('submit', function(e){
          var table = document.getElementById("datatable") 
          var rowVal = document.getElementById('row').value;
          var row = table.rows[rowVal];
          e.preventDefault();
          $.ajax({
            type: 'post',
            url: '<?=base_url('admin/index/post_update/biaya')?>',
            data: $('#formupdatebiaya').serialize(),
            success: function (i) {
              if(i == 'true'){
                row.cells[2].innerHTML = document.getElementById("biaya").value;
                new PNotify({
                                    title: 'Update Success',
                                    text: 'Update Data Success',
                                    type: 'success',
                                    hide: true,
                                    styling: 'bootstrap3'
                                });
                $('#modalUpdate').modal('hide');
              }else{
                new PNotify({
                                  title: 'Update Failed',
                                  text: i,
                                  type: 'error',
                                  hide: true,
                                  styling: 'bootstrap3'
                              });
              }
            }    
          });          
        });
        $('#ya').on('click', function(e){
          e.preventDefault();
          $.ajax({
            type: 'post',
            url: '<?=base_url('admin/index/posting_biaya')?>',
            data: $('#formupdatebiaya').serialize(),
            success: function (i) {
              if(i == 'true'){
                $('#modalPosting').modal('hide');                
                new PNotify({
                                    title: 'Posting Biaya',
                                    text: 'Posting Biaya ke dalam buku jurnal berhasil',
                                    type: 'success',
                                    hide: true,
                                    styling: 'bootstrap3'
                                });
              }else{
                new PNotify({
                                  title: 'Posting Biaya',
                                  text: 'Posting Biaya ke dalam buku jurnal gagal',
                                  type: 'error',
                                  hide: true,
                                  styling: 'bootstrap3'
                              });
              }
            }    
          });            
        });
      });
    </script>            