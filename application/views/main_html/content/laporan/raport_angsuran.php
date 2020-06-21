<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_content">
      <table id="tabelLaporanPinjaman" class="table table-striped table-bordered dt-responsive nowrap"  cellspacing="0" width="100%">
        <thead>
          <tr>
            <th>Tanggal</th>
            <th>Angsuran Ke</th>
            <th>Jumlah Pinjaman</th>
            <th>Pokok Angsuran</th>
            <th>Bunga</th>
            <th>Pinalti</th>
            <th>Denda</th>
            <th>Jumlah Bayar</th>
          </tr>
        </thead>
        <tbody>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td><?=$dataAngsuran->num_rows()>0?number_format($dataAngsuran->row()->jumlah_pinjaman):'&nbsp;'?></td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
          <?php if($dataAngsuran->num_rows() > 0){ ?>
          <?php $jumlahPinjaman = $dataAngsuran->row()->jumlah_pinjaman; ?>
          <?php $i = 1; ?>
            <?php foreach ($dataAngsuran->result_array() as $row) { ?>                        
            <?php $jumlahPinjaman = $jumlahPinjaman - $row['pokok']; ?>
              <tr>
                <td><?=$row['tanggal_transaksi']?></td>
                <td><?=$row['ke']?></td>
                <td><?=number_format($jumlahPinjaman)?></td>
                <td><?=number_format($row['pokok'])?></td>
                <td><?=number_format($row['bunga'])?></td>
                <td><?=number_format($row['pinalti'])?></td>
                <td><?=number_format($row['denda'])?></td>
                <td><?=number_format($row['pokok'] + $row['bunga'] + $row['pinalti'] + $row['denda'])?></td>
              </tr>
            <?php $i++; ?>
            <?php } ?>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>