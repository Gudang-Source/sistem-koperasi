<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_content">
      <table id="tabelLaporanPinjaman" class="table table-striped table-bordered dt-responsive nowrap"  cellspacing="0" width="100%">
        <thead>
          <tr>
            <th>Nomor</th>
            <th>Kode Akun</th>
            <th>Kode Transaksi</th>
            <th>Keterangan</th>
            <th>Debet</th>
            <th>Kredit</th>
            <th>Tanggal</th>
          </tr>
        </thead>
        <tbody>
          <?php $saldoDebit = 0; ?>
          <?php $saldoKredit = 0; ?>
          <?php if($dataJurnalUmum->num_rows() > 0){ ?>
          <?php $i = 1; ?>
            <?php foreach ($dataJurnalUmum->result_array() as $row) { ?>                        
              <tr>
                <td><?=$i?></td>
                <td><?=$row['akun']?></td>
                <td><?=$row['kd_transaksi']?></td>
                <td><?=$row['keterangan']?></td>
                <td><?=number_format($row['debet'])?><?php $saldoDebit += $row['debet']; ?></td>
                <td><?=number_format($row['kredit'])?><?php $saldoKredit += $row['kredit']; ?></td>
                <td><?=$row['date']?></td>
              </tr>
            <?php $i++; ?>
            <?php } ?>
          <?php } ?>
        </tbody>
        <tfoot>
          <tr>
            <td colspan='4'>&nbsp;</td>
            <td><?=number_format($saldoDebit)?></td>
            <td><?=number_format($saldoKredit)?></td>
            <td>&nbsp;</td>
          </tr>
        </tfoot>
      </table>
    </div>
  </div>
</div>