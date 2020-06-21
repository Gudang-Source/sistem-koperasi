<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_content">
      <table id="tabelLaporanTabungan" class="table table-striped table-bordered dt-responsive nowrap"  cellspacing="0" width="100%">
        <thead>
          <tr>
            <th>Nomor</th>
            <th>Nama Anggota</th>
            <th>Nomor Identitas</th>
            <th>Nomor Karyawan</th>
            <th>Debet</th>
            <th>Kredit</th>
            <th>Tanggal</th>
            <th>Saldo</th>
          </tr>
        </thead>
        <tbody>
          <?php if($tableTabungan->num_rows() > 0){ ?>
          <?php $i = 1; ?>
          <?php $saldo = 0; ?>
            <?php foreach ($tableTabungan->result_array() as $row) { ?>                        
              <tr>
                <td><?=$i?></td>
                <td><?=$row['nama_anggota']?></td>
                <td><?=$row['no_identitas']?></td>
                <td><?=$row['no_karyawan']?></td>
                <td><?=number_format($row['debit'])?><?php $saldo -= $row['debit']; ?></td>
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
