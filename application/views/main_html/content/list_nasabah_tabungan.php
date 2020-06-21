<div class="col-md-12 col-sm-12 col-xs-12" id="dataTabungan">
  <div class="x_panel">
    <div class="x_title">
      <h2>Daftar Nasabah Tabungan</h2>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
      <a href="#" class="btn btn-warning" onclick="prosesbunga()">PROSES BUNGA TABUNGAN</a>
      <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap"  cellspacing="0" width="100%">
        <thead>
          <tr>
            <th>Nama</th>
            <th>Alamat</th>
            <th>No Identitas</th>
            <th>Saldo</th>
          </tr>
        </thead>


        <tbody>
          <?php if($tableAnggota->num_rows() > 0){ ?>
            <?php foreach ($tableAnggota->result_array() as $row) { ?>                        
              <tr>
                <td><?=$row['nama_anggota']?></td>
                <td><?=$row['alamat_anggota']?></td>
                <td><?=$row['no_identitas']?></td>
                <td><?=number_format(modules::run('admin/index/get_saldo_tabungan',$row['no_identitas']))?></td>
              </tr>
            <?php } ?>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<script type="text/javascript">
  function prosesbunga(){
    $.ajax({
      type: 'post',
      url: '<?=base_url('admin/index/do_bunga_tabungan')?>',
      data: $('form').serialize(),
      success: function (i) {
        if(i == 'true'){
            new PNotify({
                title: 'Bunga Bank',
                text: 'Bunga Bank Berhasil Ditambahkan',
                type: 'success',
                hide: true,
                styling: 'bootstrap3'
            });
        }else{
            new PNotify({
                title: 'Bunga Bank',
                text: 'Bunga Bank Gagal Ditambahkan',
                type: 'warning',
                hide: true,
                styling: 'bootstrap3'
            });          
        }
      }    
    });
  }
</script>
