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
            <th>Nomor</th>
            <th>Jenis Jaminan</th>
            <th>Nomor Surat</th>
            <th>Aksi</th>
          </tr>
        </thead>


        <tbody>
          <?php if($data->num_rows() > 0){ ?>
          <?php $i = 1; ?>
            <?php foreach ($data->result_array() as $row) { ?>                        
              <tr>
                <td><?=$i?></td>
                <td><?=$row['jaminan']?></td>
                <td><?=$row['no_surat']?></td>
                <td>
                  <a href="#" class="btn btn-primary">LEPAS JAMINAN</a>
                  <a href="#" class="btn btn-primary"   data-toggle="modal" data-target=".bs-update-modal-md" onClick="showDialogUpdate('<?=sha1($row['kd_jaminan'])?>', this)">TUKAR JAMINAN</a>
                </td>
              </tr>
              <?php $i++; ?>
            <?php } ?>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

    <!-- modals update -->
    <div class="modal fade bs-update-modal-md" id="modalUpdate" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">

          <form class="form-horizontal form-label-left" id="formJaminan">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" id="myModalLabel2">Ubah Jaminan</h4>
          </div>
          <div class="modal-body">          
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="no_identitas">Jenis Jaminan<span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="hidden" id="row" required="required" class="form-control col-md-7 col-xs-12" name="row">              
                <input type="hidden" value="1" name="kd_jaminan" id="kd_jaminan" />
                <select name="jaminan" class="form-control" id="jaminan">
                  <option value="bpkb">BPKB</option>
                  <option value="sertifikat">SERTIFIKAT</option>                  
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="no_identitas">Nomor Surat <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" class="form-control" value="" name="no_surat" id="no_surat" />
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="no_identitas">Nomor Polisi <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" class="form-control" value="" name="nopol" id="nopol" />
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="no_identitas">Merk <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" class="form-control" value="" name="merk" id="merk" />
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="no_identitas">Tahun <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" class="form-control" value="" name="tahun" id="tahun" />
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="no_identitas">Warna <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" class="form-control" value="" name="warna" id="warna" />
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="no_identitas">Nomor Rangka <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" class="form-control" value="" name="norangka" id="norangka" />
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="no_identitas">Nomor Mesin <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" class="form-control" value="" name="nomesin" id="nomesin" />
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="no_identitas">Atas Nama <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" class="form-control" value="" name="atasnama" id="atasnama" />
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="no_identitas">Alamat <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" class="form-control" value="" name="alamat" id="alamat" />
              </div>
            </div>
<!--             <div class="form-group">
              <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <button type="submit" class="btn btn-success" id="simpanJaminan">Simpan Jaminan</button>
              </div>
            </div>            
 -->          <div class="modal-footer">
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
              url: '<?=base_url('admin/index/detail_jaminan')?>/'+id,
              data: $('form').serialize(),
              success: function (i) {
                var jsonObjectParse = JSON.parse(i);
                var jsonObjectStringify = JSON.stringify(jsonObjectParse);
                var jsonObjectFinal = JSON.parse(jsonObjectStringify);
                document.getElementById("row").value=iRow;
                document.getElementById("kd_jaminan").value=jsonObjectFinal.data.kd_jaminan; 
                document.getElementById("jaminan").value=jsonObjectFinal.data.jaminan; 
                document.getElementById("no_surat").value=jsonObjectFinal.data.no_surat; 
                document.getElementById("nopol").value=jsonObjectFinal.data.nopol; 
                document.getElementById("merk").value=jsonObjectFinal.data.merk; 
                document.getElementById("tahun").value=jsonObjectFinal.data.tahun; 
                document.getElementById("warna").value=jsonObjectFinal.data.warna; 
                document.getElementById("norangka").value=jsonObjectFinal.data.norangka; 
                document.getElementById("nomesin").value=jsonObjectFinal.data.nomesin; 
                document.getElementById("atasnama").value=jsonObjectFinal.data.atasnama; 
                document.getElementById("alamat").value=jsonObjectFinal.data.alamat;  
              }    
            });        
        }
      function showDialogDelete(id, r){
          var i = r.parentNode.parentNode.rowIndex;
          document.getElementById("yDel").href=id+"beni"+i; 
      }
      $(document).ready(function(){
        $('#formJaminan').on('submit', function(e){
          e.preventDefault();
          $.ajax({
            type: 'post',
            url: '<?=base_url('admin/index/update_jaminan')?>',
            data: $('#formJaminan').serialize(),
            success: function (i) {
              if(i == 'true'){
                row.cells[1].innerHTML = document.getElementById("jaminan").value;
                row.cells[2].innerHTML = document.getElementById("no_surat").value;
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
      });
    </script>            