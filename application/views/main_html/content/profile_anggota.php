              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Laporan Anggota <small>Laporan Transaksi</small></h2>

                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                      <div class="profile_img">
                        <div id="crop-avatar">
                          <!-- Current avatar -->
                          <img class="img-responsive avatar-view" src="images/picture.jpg" alt="Avatar" title="Change the avatar">
                        </div>
                      </div>
                      <h3><?=$tableAnggota->row()->nama_anggota?></h3>

                      <ul class="list-unstyled user_data">
                        <li><i class="fa fa-map-marker user-profile-icon"></i> <?=$tableAnggota->row()->alamat_anggota?>
                        </li>
                        <li>
                          <i class="fa fa-briefcase user-profile-icon"></i> <?=$tableAnggota->row()->no_identitas?>
                        </li>
                      </ul>
                      <br />

                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <div class="" role="tabpanel" data-example-id="togglable-tabs">
                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                          <li role="presentation" class="active"><a href="#tab_content1" id="pinjaman-tab" role="tab" data-toggle="tab" aria-expanded="true">Peminjaman</a>
                          </li>
                          <li role="presentation" class=""><a href="#tab_content2" role="tab" id="tabungan-tab" data-toggle="tab" aria-expanded="true">Tabungan</a>
                          </li>
                        </ul>
                        <div id="myTabContent" class="tab-content">
                          <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="pinjaman-tab">
                            <?=modules::run('admin/index/getDetailAnggota',sha1($tableAnggota->row()->kd_anggota))?>
                          </div>
                          <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="tabungan-tab">
                            <?=modules::run('admin/index/getDetailAnggota',sha1($tableAnggota->row()->kd_anggota), 'tabungan')?>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>