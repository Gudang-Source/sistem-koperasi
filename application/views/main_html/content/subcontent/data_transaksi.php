<div class="row">
  <div class="col-md-2 col-sm-2 col-xs-2 profile_details">
    <div class="well profile_view">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <h4 class="brief"><i>Data Anggota</i></h4>
        <div class="left col-xs-7">
          <h2><?=$dataTransaksi->row()->nama_anggota?></h2>
          <ul class="list-unstyled">
            <li><?=$dataTransaksi->row()->alamat_anggota?></li>
            <li><?=$dataTransaksi->row()->no_identitas?></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-10 col-sm-10 col-xs-10 profile_details">
    <div class="well profile_view">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <h4 class="brief"><i>Data Pinjaman</i></h4>
        <div class="left col-xs-7">
          <ul class="list-unstyled">
            <li>Jumlah Pinjaman Rp.<?=number_format($dataTransaksi->row()->jumlah_pinjaman)?></li>
            <li>Bunga Rp.<?=number_format($dataTransaksi->row()->bunga_angsuran)?></li>
            <li>Jangka Waktu <?=$dataTransaksi->row()->jangka_waktu?> Bulan
        </div>
      </div>
    </div>
  </div>
</div>
<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2>Track Transaksi</h2>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
      <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap"  cellspacing="0" width="100%">
        <thead>
          <tr>
            <th>Angsuran Ke</th>
            <th>Saldo</th>
            <th>Pokok Angsuran</th>
            <th>Bunga Angsuran</th>
            <th>Pinalti</th>
            <th>Denda</th>
          </tr>
        </thead>
        <tbody>
            <tr>
              <td>&nbsp;</td>
              <td><?=$dataTransaksi->num_rows()>0?number_format($dataTransaksi->row()->jumlah_pinjaman):'&nbsp;'?></td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
          <?php if($dataTransaksi->num_rows() > 0){ ?>
            <?php $saldo = $dataTransaksi->row()->jumlah_pinjaman; ?>
            <?php foreach ($dataTransaksi->result_array() as $row) { ?>                        
            <?php $saldo = $saldo - $row['pokok'] ?>
              <tr>
                <td><?=$row['ke']?></td>
                <td><?=number_format($saldo)?></td>
                <td><?=number_format($row['pokok'])?></td>
                <td><?=number_format($row['bunga'])?></td>
                <td><?=number_format($row['pinalti'])?></td>
                <td><?=number_format($row['denda'])?></td>
              </tr>
            <?php } ?>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>