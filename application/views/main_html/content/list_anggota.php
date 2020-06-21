<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_content">
      <div class="row">
        <div class="btn-group  btn-group-sm">
          <a class="btn btn-default" href="<?=base_url('admin/index/data/anggota/')?>" id="all">SEMUA</a>
          <a class="btn btn-default" href="<?=base_url('admin/index/data/anggota/umum')?>" id="umum">UMUM</a>
          <a class="btn btn-default" href="<?=base_url('admin/index/data/anggota/karyawan')?>" id="karyawan">KARYAWAN</a>
        </div>
        <div id="result" class="col-md-12 col-sm-12 col-xs-12">
        </div>
      </div>
    </div>  
    <div class="x_title">
      <h2>Daftar Anggota <?=$type?></h2>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
      <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap"  cellspacing="0" width="100%">
        <thead>
          <tr>
            <th>Nomor Anggota</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>No Identitas</th>
            <th>No Karyawan</th>
            <th>Tanggal Lahir</th>
            <th>Tanggal Masuk</th>
            <th>Tanggal Daftar</th>
            <th>Aksi</th>
          </tr>
        </thead>


        <tbody>
          <?php $table = modules::run('anggota/Anggota/data', $type); ?>
          <?php if($table->num_rows() > 0){ ?>
            <?php foreach ($table->result_array() as $row) { ?>                        
              <tr>
                <td><?=$row['no_anggota']?></td>
                <td><strong><a href="<?=base_url('admin/index/detail_anggota/')."/".sha1($row['kd_anggota'])?>" data-original-title="Klik untuk melihat detail" data-toggle="tooltip" data-placement="bottom"><?=$row['nama_anggota']?></a></strong></td>
                <td><?=$row['alamat_anggota']?></td>
                <td><?=$row['no_identitas']?></td>
                <td><?=$row['no_karyawan']?></td>
                <td><?=$row['tanggal_lahir']?></td>
                <td><?=$row['tanggal_masuk']?></td>
                <td><?=$row['tanggal_daftar']?></td>
                <td>
                  <a href="#delete?kd_anggota=<?=sha1($row['kd_anggota'])?>"  id="hapus" class="btn btn-sm btn-danger" data-toggle="modal" data-target=".bs-delete-modal-sm" data-id='<?=sha1($row['kd_anggota'])?>'  onClick="showDialogDelete('<?=sha1($row['kd_anggota'])?>', this)">HAPUS</a>
                  <br>
                  <a href="#ubah?kd_anggota=<?=sha1($row['kd_anggota'])?>" id="ubah" class="btn btn-sm btn-success" data-toggle="modal" data-target=".bs-update-modal-md" data-id='<?=sha1($row['kd_anggota'])?>' onClick="showDialogUpdate('<?=sha1($row['kd_anggota'])?>', this)">UBAH</a>
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
            <h4 class="modal-title" id="myModalLabel2">Hapus Data ?</h4>
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
            <h4 class="modal-title" id="myModalLabel2">Ubah Data Anggota</h4>
          </div>
          <div class="modal-body">

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="nama" required="required" class="form-control col-md-7 col-xs-12" name="nama">
                  <input type="hidden" id="kd" required="required" class="form-control col-md-7 col-xs-12" name="kd_anggota">
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
                  <input id="noidentitas" required="required" class="form-control col-md-7 col-xs-12" type="text" name="noidentitas">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">No Karyawan (Optional)</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="nokaryawan" class="form-control col-md-7 col-xs-12" type="text" name="nokaryawan">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal Lahir <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="birthday" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text" name="tanggallahir">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal Masuk Karyawan <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="dayin" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text" name="tanggalmasuk">
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
              url: '<?=base_url('admin/index/post_get/anggota')?>/'+id,
              data: $('form').serialize(),
              success: function (i) {
                var jsonObjectParse = JSON.parse(i);
                var jsonObjectStringify = JSON.stringify(jsonObjectParse);
                var jsonObjectFinal = JSON.parse(jsonObjectStringify);
                document.getElementById("row").value=iRow;
                document.getElementById("kd").value=jsonObjectFinal.kd_anggota;
                document.getElementById("nama").value=jsonObjectFinal.nama_anggota; 
                document.getElementById("alamat").value=jsonObjectFinal.alamat_anggota; 
                document.getElementById("noidentitas").value=jsonObjectFinal.no_identitas; 
                document.getElementById("nokaryawan").value=jsonObjectFinal.no_karyawan; 
                document.getElementById("birthday").value=jsonObjectFinal.tanggal_lahir; 
                document.getElementById("dayin").value=jsonObjectFinal.tanggal_masuk; 
              }    
            });        
        }
      function showDialogDelete(id, r){
          var i = r.parentNode.parentNode.rowIndex;
          document.getElementById("yDel").href=id+"beni"+i; 
      }
      $(document).ready(function(){
        $('#formupdateanggota').on('submit', function(e){
          var table = document.getElementById("datatable") 
          var rowVal = document.getElementById('row').value;
          var row = table.rows[rowVal];
          e.preventDefault();
          $.ajax({
            type: 'post',
            url: '<?=base_url('admin/index/post_update/anggota')?>',
            data: $('#formupdateanggota').serialize(),
            success: function (i) {
              if(i == 'true'){
                row.cells[0].innerHTML = document.getElementById("nama").value;
                row.cells[1].innerHTML = document.getElementById("alamat").value;
                row.cells[2].innerHTML = document.getElementById("noidentitas").value;
                row.cells[3].innerHTML = document.getElementById("nokaryawan").value;
                row.cells[4].innerHTML = document.getElementById("birthday").value;
                row.cells[5].innerHTML = document.getElementById("dayin").value;
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
            url: '<?=base_url('admin/index/post_del/anggota')?>/'+temp[0],
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