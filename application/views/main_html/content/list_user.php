<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2>Daftar User</h2>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
      <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap"  cellspacing="0" width="100%">
        <thead>
          <tr>
            <th>Nama</th>
            <th>Alamat</th>
            <th>No Identitas</th>
            <th>No Hp</th>
            <th>Tanggal Lahir</th>
            <th>Tanggal Masuk</th>
            <th>Username</th>
            <th>Aksi</th>
          </tr>
        </thead>


        <tbody>
          <?php $table = modules::run('user/Users/data'); ?>
          <?php if($table->num_rows() > 0){ ?>
            <?php foreach ($table->result_array() as $row) { ?>                        
              <tr>
                <td><?=$row['nama']?></td>
                <td><?=$row['alamat']?></td>
                <td><?=$row['no_identitas']?></td>
                <td><?=$row['no_hp']?></td>
                <td><?=$row['tanggal_lahir']?></td>
                <td><?=$row['tanggal_masuk']?></td>
                <td><?=$row['username']?></td>
                <td>
                  <a href="#delete?kd_user=<?=sha1($row['kd_user'])?>"  id="hapus" class="btn btn-sm btn-danger" data-toggle="modal" data-target=".bs-delete-modal-sm" data-id='<?=sha1($row['kd_user'])?>'  onClick="showDialogDelete('<?=sha1($row['kd_user'])?>', this)">HAPUS</a>
                  <br>
                  <a href="#ubah?kd_user=<?=sha1($row['kd_user'])?>" id="ubah" class="btn btn-sm btn-success" data-toggle="modal" data-target=".bs-update-modal-md" data-id='<?=sha1($row['kd_user'])?>' onClick="showDialogUpdate('<?=sha1($row['kd_user'])?>', this)">UBAH</a>
                </td>
              </tr>
            <?php } ?>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
    <!-- modal hapus -->
    <div class="modal fade bs-delete-modal-sm" id="modalHapus" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" id="myModalLabel2">Hapus Data User?</h4>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
            <a type="button" class="btn btn-danger" id="yDel">Ya</a>
          </div>

        </div>
      </div>
    </div>
    <!-- /modals hapus -->
    <!-- modals update -->
    <div class="modal fade bs-update-modal-md" id="modalUpdate" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">

        <form id="formupdateanggota" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="#">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" id="myModalLabel2">Ubah Data User</h4>
          </div>
          <div class="modal-body">

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="nama" required="required" class="form-control col-md-7 col-xs-12" name="nama">
                  <input type="hidden" id="kd" required="required" class="form-control col-md-7 col-xs-12" name="kd_user">
                  <input type="hidden" id="row" required="required" class="form-control col-md-7 col-xs-12" name="row">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Alamat <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="alamat" required="required" class="form-control col-md-7 col-xs-12" name="alamat">
                </div>
              </div>
              <div class="form-group">
                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">No Identitas (KTP) <span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="no_identitas" required="required" class="form-control col-md-7 col-xs-12" type="text" name="no_identitas">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">No Hp <span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="no_hp" class="form-control col-md-7 col-xs-12" type="text" name="no_hp">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal Lahir <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="tanggal_lahir" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text" name="tanggal_lahir">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal Masuk Karyawan <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="tanggal_masuk" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text" name="tanggal_masuk">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Username <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="username" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text" name="username">
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
              url: '<?=base_url('admin/index/post_get/user')?>/'+id,
              data: $('form').serialize(),
              success: function (i) {
                var jsonObjectParse = JSON.parse(i);
                var jsonObjectStringify = JSON.stringify(jsonObjectParse);
                var jsonObjectFinal = JSON.parse(jsonObjectStringify);
                document.getElementById("row").value=iRow;
                document.getElementById("kd").value=jsonObjectFinal.kd_user; 
                document.getElementById("nama").value=jsonObjectFinal.nama; 
                document.getElementById("alamat").value=jsonObjectFinal.alamat; 
                document.getElementById("no_identitas").value=jsonObjectFinal.no_identitas; 
                document.getElementById("no_hp").value=jsonObjectFinal.no_hp; 
                document.getElementById("tanggal_lahir").value=jsonObjectFinal.tanggal_lahir; 
                document.getElementById("tanggal_masuk").value=jsonObjectFinal.tanggal_masuk; 
                document.getElementById("username").value=jsonObjectFinal.username; 
              }    
            });        
        }
      function showDialogDelete(id, r){
          var i = r.parentNode.parentNode.rowIndex;
          document.getElementById("yDel").href=id+"beni"+i; 
      }
      $(document).ready(function(){
        $('#formupdateanggota').on('submit', function(e){
          var table = document.getElementById("datatable");
          var rowVal = document.getElementById('row').value;
          var row = table.rows[rowVal];
          e.preventDefault();
          $.ajax({
            type: 'post',
            url: '<?=base_url('admin/index/post_update/user')?>',
            data: $('#formupdateanggota').serialize(),
            success: function (i) {
              if(i == 'true'){
                row.cells[0].innerHTML = document.getElementById("nama").value;
                row.cells[1].innerHTML = document.getElementById("alamat").value;
                row.cells[2].innerHTML = document.getElementById("no_identitas").value;
                row.cells[3].innerHTML = document.getElementById("no_hp").value;
                row.cells[4].innerHTML = document.getElementById("tanggal_lahir").value;
                row.cells[5].innerHTML = document.getElementById("tanggal_masuk").value;
                row.cells[6].innerHTML = document.getElementById("username").value;
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
        $('#yDel').on('click', function(e){
          var value = document.getElementById("yDel").getAttribute("href");
          var temp = new Array();
          temp = value.split("beni");
          e.preventDefault();
          $.ajax({
            type: 'post',
            url: '<?=base_url('admin/index/post_del/user')?>/'+temp[0],
            data: $('form').serialize(),
            success: function (i) {
              if(i == 'true'){
                document.getElementById("datatable").deleteRow(temp[1]);
                new PNotify({
                                    title: 'Delete Success',
                                    text: 'Delete Data Success',
                                    type: 'success',
                                    hide: true,
                                    styling: 'bootstrap3'
                                });
                $('#modalHapus').modal('hide');
              }else{
                new PNotify({
                                  title: 'Delete Failed',
                                  text: i,
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