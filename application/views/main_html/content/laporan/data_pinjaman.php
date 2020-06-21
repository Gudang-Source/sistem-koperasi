<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_content">
      <table id="tabelLaporanPinjaman" class="table table-striped table-bordered dt-responsive nowrap"  cellspacing="0" width="100%">
        <thead>
          <tr>
            <th>Nomor</th>
            <th>Nama Anggota</th>
            <th>Nomor Identitas</th>
            <th>Jumlah Pinjaman</th>
            <th>Jangka Waktu</th>
            <th>Bunga</th>
            <th>Tanggal Pinjam</th>
            <th>Status Pinjaman</th>
            <th>Detail</th>
          </tr>
        </thead>
        <tbody>
          <?php if($dataPinjaman->num_rows() > 0){ ?>
          <?php $i = 1; ?>
            <?php foreach ($dataPinjaman->result_array() as $row) { ?>                        
              <tr>
                <td><?=$i?></td>
                <td><?=$row['nama_anggota']?></td>
                <td><?=$row['no_identitas']?></td>
                <td><?=number_format($row['jumlah_pinjaman'])?></td>
                <td><?=$row['jangka_waktu']?> Bulan</td>
                <td><?=$row['bunga']?> %</td>
                <td><?=$row['tanggal_pinjam']?></td>
                <td><?=$row['status']==0?"BELUM LUNAS":"LUNAS"?></td>
                <td><a href="#" class="btn btn-default" data-toggle="modal" data-target=".bs-update-modal-md" onClick="showRaportAngsuran('<?=sha1($row['kd_pinjaman'])?>')">DETAIL</a></td>
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
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" id="myModalLabel2">Detail Raport Anggota</h4>
          </div>
          <div class="modal-body" id="resultDetail">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
          </div>
        </div>
      </div>
    </div>
    <!-- /modals update-->

    <!-- jQuery -->
    <script src="<?=base_url()?>assets/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript">
        function showRaportAngsuran(id){
            $.ajax({
              type: 'post',
              url: '<?=base_url('admin/index/getRaportAngsuran')?>/'+id,
              data: $('form').serialize(),
              success: function (i) {
                document.getElementById('resultDetail').innerHTML = i;
              }    
            });        
        }
    </script>    