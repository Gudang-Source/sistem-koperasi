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
            <th>Total Angsuran</th>
            <th>Angsuran Terbayar</th>
            <th>Bunga Terbayar</th>
            <th>Pinalti Terbayar</th>
          </tr>
        </thead>
        <tbody>
          <?php if($dataAngsuran->num_rows() > 0){ ?>
          <?php $i = 1; ?>
            <?php foreach ($dataAngsuran->result_array() as $row) { ?>                        
              <tr>
                <td><?=$i?></td>
                <td><?=$row['nama_anggota']?></td>
                <td><?=$row['no_identitas']?></td>
                <td><?=number_format($row['jumlah_pinjaman'])?></td>
                <td><?=number_format(modules::run('admin/index/detailAngsuran',sha1($row['kd_pinjaman']),'total_angsuran'))?></td>
                <td><?=number_format(modules::run('admin/index/detailAngsuran', sha1($row['kd_pinjaman']),'angsuran'))?></td>
                <td><?=number_format(modules::run('admin/index/detailAngsuran',sha1($row['kd_pinjaman']),'bunga'))?></td>
                <td><?=number_format(modules::run('admin/index/detailAngsuran',sha1($row['kd_pinjaman']),'pinalti'))?></td>
              </tr>
            <?php $i++; ?>
            <?php } ?>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
