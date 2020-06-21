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
            <th>Saldo</th>
          </tr>
        </thead>
        <tbody>
          <?php if($dataJurnalUmum->num_rows() > 0){ ?>
          <?php $i = 1; ?>
          <?php $saldo = 0; ?>
            <?php foreach ($dataJurnalUmum->result_array() as $row) { ?>                        
              <tr>
                <td><?=$i?></td>
                <td><?=$row['akun']?></td>
                <td><?=$row['kd_transaksi']?></td>
                <td><?=$row['keterangan']?></td>
                <td><?=number_format($row['debet'])?><?php $saldo -= $row['debet']; ?></td>
                <td><?=number_format($row['kredit'])?><?php $saldo += $row['kredit']; ?></td>
                <td><?=$row['date']?></td>
                <td><?=number_format($saldo)?></td>
              </tr>
            <?php $i++; ?>
            <?php } ?>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
