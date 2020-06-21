  <div class="x_panel">
    <div class="x_title">
      <h2>Daftar Anggota</h2>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
      <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap"  cellspacing="0" width="100%">
        <thead>
          <tr>
            <th>Nama</th>
            <th>Alamat</th>
            <th>No Identitas</th>
            <th>Status Pinjaman</th>
            <th>Aksi</th>
          </tr>
        </thead>


        <tbody>
          <?php if($table->num_rows() > 0){ ?>
            <?php foreach ($table->result_array() as $row) { ?>
              <tr>
                <td><?=$row['nama_anggota']?></td>
                <td><?=$row['alamat_anggota']?></td>
                <td><?=$row['no_identitas']?></td>
                <td><?=$row['status']==0?"BELUM LUNAS":"LUNAS"?></td>
                <td>
                  <a href="#detail?kd_anggota=<?=sha1($row['kd_pinjaman'])?>"  id="detailTransaksi" class="btn btn-sm btn-warning" data-toggle="modal" data-target=".bs-detail-modal-sm" data-id='<?=sha1($row['kd_pinjaman'])?>'  onClick="showDialogDetail('<?=sha1($row['kd_pinjaman'])?>', this)">DETAIL</a>
                </td>
              </tr>
            <?php } ?>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
    <!-- modal hapus -->
    <div class="modal fade bs-detail-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" id="myModalLabel2">Detail</h4>
          </div>
          <div class="modal-body" id="resultTransaksi">            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">OK</button>
          </div>

        </div>
      </div>
    </div>
    <!-- /modals hapus -->
    <!-- jQuery -->
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
    </script>            