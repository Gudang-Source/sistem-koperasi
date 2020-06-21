<?php
    $date = date('w');
    switch ($date) {
        case 0:
            $date = "Minggu";
            break;
        case 1:
            $date = "Senin";
            break;
        case 2:
            $date = "Selasa";
            break;
        case 3:
            $date = "Rabu";
            break;
        case 4:
            $date = "Kamis";
            break;
        case 5:
            $date = "Jumat";
            break;
        case 6:
            $date = "Sabtu";
            break;
        default:
            # code...
            break;
    }
?>

<style>
table{
    border-collapse:collapse;
    vertical-align: top;
    valign: top;
}
.border-bottom{
    border-bottom: 1px solid #000;
}
.border-dot{
    border-bottom: 1px dashed #000;
}
.duapuluh{
    font-size: 20px;
}
.empatbelas{
    font-size: 14px;
}
table-parent{
        margin-top: 60px;
}
</style>
<table border="0" width="100%" align="center" class="table-parent">
    <tbody>
        <tr  align="center" class="border-bottom">
            <td colspan="2">
                <table width="100%">
                    <tr align="center">
                        <td>
                            <img src="<?=base_url('assets/images/logo.png')?>" alt="Koperasi Weta" style="width:100px;height:auto;">                        
                        </td>
                        <td>
                            <div class="duapuluh">KOPERASI "WETA"</div>
                            <div class="duapuluh">UNIT SIMPAN PINJAM</div>
                            <div class="empatbelas">BADAN HUKUM: NOMOR 488/BH/XVI.14/VIII/2015</div>
                            <div class="empatbelas">JL. RAYA WAGIR. NO. 17 TELP. 08816285865 - 081333182262 KODE POS 65158</div>
                            <div class="empatbelas">KECAMATAN WAGIR KABUPATEN MALANG</div>                                
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr align="center">
            <td colspan="2">&nbsp;</td>
        </tr>
        <tr align="center">
            <td colspan="2">&nbsp;</td>
        </tr>
        <tr align="center">
            <td colspan="2" class="duapuluh">PERJANJIAN KREDIT</td>
        </tr>
        <tr align="center">
            <td colspan="2" class="empatbelas">NOMOR:</td>
        </tr>
        <tr>
            <td width="2%">i</td>
            <td width="98%">Yang bertanda tangan dibawah ini</td>
        </tr>
        <tr>
          <td width="2%">&nbsp;</td>        
            <td class="border-dot"><?=$detailUser->row()->nama?></td>
        </tr>
        <tr>
            <td width="2%">&nbsp;</td>        
            <td align="justify">Bertindak untuk dan atas nama KOPERASI Simpan Pinjam "WETA" berkedudukan di jl. Raya Parangorgo Wagir No. 17 Malang untuk selanjutnya di sebut KOPERASI</td>
        </tr>
        <tr>
            <td width="2%">ii</td>        
            <td class="border-dot"><?=$detailPinjaman->row()->nama_anggota?></td>
        </tr>
        <tr>
            <td width="2%">&nbsp;</td>        
            <td align="justify">Bertindak untuk diri sendiri dan / atau atas nama ..................................................................................... untuk selanjutnya disebut DEBITUR</td>
        </tr>
        <tr align="justify">
            <td colspan="2">Kedua pihak dengan ini menyatakan bahwa antara KOPERASI dan DEBITUR sepakat mengadakan perjanjian hutang piutang dengan ketentuan dan syarat-syarat yang telah disepakati bersama sebagaimana diatur dalam pasal-pasal sebagai berikut:</td>
        </tr>
        <tr align="center">
            <td colspan="2">&nbsp;</td>
        </tr>
        <tr align="center">
            <td colspan="2">PASAL I (SATU)</td>
        </tr>
        <tr align="justify">
            <td colspan="2">KOPERASI telah memberikan kepada DEBITUR fasilitas Kredit berupa Kredit "Installment" / Reguler sebesar Rp. <?=$detailPinjaman->row()->jumlah_pinjaman?> Terbilang <?=modules::run('admin/index/Terbilang',$detailPinjaman->row()->jumlah_pinjaman)?> Jumlah mana tidak termasuk beban bunga dan biaya biaya lainnya.</td>
        </tr>
        <tr align="center">
            <td colspan="2">&nbsp;</td>
        </tr>
        <tr align="center">
            <td colspan="2">PASAL II(DUA)</td>
        </tr>
        <tr align="justify">
            <td colspan="2">
                <table>
                    <tr>
                        <td colspan="2">DEBITUR harus membayar kepada KOPERASI :</td>
                    </tr>
                    <tr>
                        <td>1.</td>
                        <td>Bunga Terhadap Kredit Installment / Reguler sebesar Rp. <?=$detailPinjaman->row()->pokok_angsuran+$detailPinjaman->row()->bunga_angsuran?>(<?=modules::run('admin/index/Terbilang',$detailPinjaman->row()->pokok_angsuran+$detailPinjaman->row()->bunga_angsuran)?>) per bulan sejak tanggal penarikan sampai dengan pelunasan.</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>
                            <table width="100%" border="0">
                                <tr>
                                    <td width="12">a.</td>  
                                    <td colspan="2">Kewajiban harus dibayar setiap bulan:</td>  
                                </tr>
                                <tr>
                                    <td width="12">&nbsp;</td> 
                                    <td width="135">Pokok Kredit:</td>  
                                    <td width="1082" class="border-dot">Rp. <?=$detailPinjaman->row()->pokok_angsuran?></td>    
                                </tr>
                                <tr>
                                    <td>&nbsp;</td> 
                                    <td>Bunga:</td> 
                                    <td class="border-dot">Rp. <?=$detailPinjaman->row()->bunga_angsuran?></td>    
                                </tr>
                                <tr>
                                    <td>&nbsp;</td> 
                                    <td>Lainnya:</td>   
                                    <td class="border-dot">Rp.</td>    
                                </tr>
                                <tr>
                                    <td>&nbsp;</td> 
                                    <td>Total Kewajiban:</td>   
                                    <td>Rp. <?=$detailPinjaman->row()->pokok_angsuran+$detailPinjaman->row()->bunga_angsuran?></td>    
                                </tr>
                                <tr>
                                    <td width="12">b.</td>  
                                    <td colspan="2">Untuk sistem angsuran jasa. Pokok pinjaman sebesar Rp <?=$detailPinjaman->row()->jumlah_pinjaman?>(<?=modules::run('admin/index/Terbilang',$detailPinjaman->row()->jumlah_pinjaman)?>) dibayar lunas pada saat jatuh tempo.</td>    
                                </tr>
                                <tr>
                                    <td width="12">c.</td>  
                                    <td colspan="2">Kewajiban pembayaran angsuran dan / atau bunga mana harus dibayar DEBITUR paling lambat tanggal <?=date('d')+2?>(<?=modules::run('admin/index/Terbilang',date('d')+2)?>) hingga batas waktu pelunasan berakhir.</td>    
                                </tr>
                                <tr>
                                    <td width="12">d.</td>  
                                    <td colspan="2">Apabila di kemudian hari DEBITUR terbukti terlambat membar kwajiban angsuran pokok atau pembayaranbunga kepada KOPERASI sebagaimana telah ditetapkan, maka KOPERASI berhak untuk mengenakan sanksi denda (Penalty Overdue) sebesar 2%(dua persen) dari jumlah kewaiban DEBITUR setiap bulan. KOPERASI berhak menambah atau mengurangi tingkat suku bugna sesuai dengna perhitungan KOPERASI, untuk itu KOPERASI akan memberitahukan secara tertulis kepada DEBITUR.</td>   
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>2.</td>
                        <td>Administrasi 2% Rp. <?=$detailPinjaman->row()->jumlah_pinjaman*(2/100)?>(<?=modules::run('admin/index/Terbilang',$detailPinjaman->row()->jumlah_pinjaman*(2/100))?>)</td>
                    </tr>
                    <tr>
                        <td>3.</td>
                        <td>Provisi 1% Rp. <?=$detailPinjaman->row()->jumlah_pinjaman*(1/100)?>(<?=modules::run('admin/index/Terbilang',$detailPinjaman->row()->jumlah_pinjaman*(1/100))?>)</td>
                    </tr>
                    <tr>
                        <td>4. </td>
                        <td>Biaya materai secukupnya di bayar di muka Rp. <?=$materai?>(<?=modules::run('admin/index/Terbilang',$materai)?>)</td>
                    </tr>
                    
                </table>
            </td>
        </tr>
        <tr align="center">
            <td colspan="2">&nbsp;</td>
        </tr>        
        <tr align="center">
            <td colspan="2">PASAL III(TIGA)</td>
        </tr>
        <tr align="justify">
            <td colspan="2">
                Fasilitas Kredit Installment / Reguler tersebut diberikan untuk jangka waktu <?=$detailPinjaman->row()->jangka_waktu?> (<?=modules::run('admin/index/Terbilang',$detailPinjaman->row()->jangka_waktu)?>) bulan, terhitung sejak tanggal <?=date('d-m-Y')?>
            </td>
        </tr>
        <tr align="center">
            <td colspan="2">&nbsp;</td>
        </tr>        
        <tr align="center">
            <td colspan="2">PASAL IV(EMPAT)</td>
        </tr>
        <tr align="justify">
            <td colspan="2">
                Pernjanjian ini akan berhenti dan semua kewajiban berupa pokok kredit, bunga dan biaya-biaya lainnya harus dibayar dengan seketika dan sekaligus lunas jika DEBITUR:
            </td>
        </tr>        
        <tr align="justify">
            <td colspan="2">
                <table>
                    <tr>
                        <td width="1%" valign="top">1.</td>
                        <td width="99%">Tidak membayar pokok dan / atau pembayaran bunga selama 3(tiga) bulan berturut turut dan / atau tidak memenuhi salah satu dari kewajiban yang telah ditetapkan.</td>
                    </tr>
                    <tr>
                        <td width="1%" valign="top">2.</td>
                        <td width="99%">Terlibat atau ikut terlibat dalam tindak pidana dan / atau perbuatan hukum lainnya yang menurut pertimbangan KOPERASI dapat mencemarkan nama baik DEBITUR, untuk itu KOPERASI tidak perlu menunggu sampai adanya keputusan pengadilan.</td>
                    </tr>
                    <tr>
                        <td width="1%" valign="top">3.</td>
                        <td width="99%">Meninggal dunia.</td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr align="center">
            <td colspan="2">&nbsp;</td>
        </tr>       
        <tr align="center">
            <td colspan="2">PASAL V(LIMA)</td>
        </tr>
        <tr align="justify">
            <td colspan="2">
                <table>
                    <tr>
                        <td width="1%" valign="top">1.</td>
                        <td width="99%">Untuk menjamin guna kepastian pembayaran kembali seluruh jumlah kredit dipergunakan termasuk bunga dan biaya-biaya lainnya yang timbul karena pernjanjian ini, DEBITUR menyerahkan barang jaminan kredit berupa : <?=strtoupper($detailJaminan->row()->jaminan)?> dengan
                            <!-- BPKB -->
                            <?php if($detailJaminan->row()->jaminan == 'bpkb'){ ?>
                                <table width="100%">
                                    <tr>
                                        <td width="1%">-</td>
                                        <td width="9%">Nopol</td>
                                        <td width="1%">:</td>
                                        <td width="89%"><?=$detailJaminan->row()->nopol?></td>                                                                        
                                    </tr>
                                    <tr>
                                        <td>-</td>
                                        <td>Merk</td>
                                        <td>:</td>
                                        <td><?=$detailJaminan->row()->merk?></td>                                                                        
                                    </tr>
                                    <tr>
                                        <td>-</td>
                                        <td>Tahun</td>
                                        <td>:</td>
                                        <td><?=$detailJaminan->row()->tahun?></td>                                                                        
                                    </tr>
                                    <tr>
                                        <td>-</td>
                                        <td>Warna</td>
                                        <td>:</td>
                                        <td><?=$detailJaminan->row()->warna?></td>                                                                        
                                    </tr>
                                    <tr>
                                        <td>-</td>
                                        <td>No. Rangka</td>
                                        <td>:</td>
                                        <td><?=$detailJaminan->row()->norangka?></td>                                                                        
                                    </tr>
                                    <tr>
                                        <td>-</td>
                                        <td>No. Mesin</td>
                                        <td>:</td>
                                        <td><?=$detailJaminan->row()->nomesin?></td>                                                                        
                                    </tr>
                                    <tr>
                                        <td>-</td>
                                        <td>No. BPKB</td>
                                        <td>:</td>
                                        <td><?=$detailJaminan->row()->no_surat?></td>                                                                        
                                    </tr>
                                    <tr>
                                        <td>-</td>
                                        <td>Atas Nama</td>
                                        <td>:</td>
                                        <td><?=$detailJaminan->row()->atasnama?></td>                                                                        
                                    </tr>
                                    <tr>
                                        <td>-</td>
                                        <td>Alamat</td>
                                        <td>:</td>
                                        <td><?=$detailJaminan->row()->alamat?></td>                                                                        
                                    </tr>
                                </table>

                            <?php }else if($detailJaminan->row()->jaminan == 'sertifikat'){ ?>
                                <!-- SERTIFIKAT -->
                                <table width="100%">
                                    <tr>
                                        <td width="1%">-</td>
                                        <td width="9%">Atas Nama</td>
                                        <td width="1%">:</td>
                                        <td width="89%"><?=$detailJaminan->row()->atasnama?></td>                                                                        
                                    </tr>
                                    <tr>
                                        <td>-</td>
                                        <td>Alamat</td>
                                        <td>:</td>
                                        <td><?=$detailJaminan->row()->alamat?></td>                                                                        
                                    </tr>
                                    <tr>
                                        <td>-</td>
                                        <td>Luas Tanah</td>
                                        <td>:</td>
                                        <td><?=$detailJaminan->row()->luastanah?></td>                                                                        
                                    </tr>
                                </table>                            
                            <?php  } ?>
                        </td>
                    </tr>
                    <tr>
                        <td width="1%" valign="top">2.</td>
                        <td width="99%">Bila di kemudian hari terjadi sesuatu hal yang mengakibatkan nilai ekonomis jaminan / anggunan kredit tidak lagi mencukupi nilai kredit dan kewajiban lainnya, dan / atau terjadi hal sedemikian rupa, maka KOPERASI berha menentukan sendiri jaminan / anggunan kredit tambahan / pengganti yang telah dimiliki / dikuasai DEBITUR hingga nilainya dapat mencukupi jumlah kewajibannya.</td>
                    </tr>
                    <tr>
                        <td width="1%" valign="top">3.</td>
                        <td width="99%">Apabila sampai dengan jatuh tempo DEBITUR ingkar janji atau tidak dapat melunasi hutangnya dan / atau terjadi hal hal sebagaimana dimaksud pada pasal IV(EMPAT) perjanjian ini, maka KOPERASI tanpa meminta persetujuan terebih dahulu dari DEBITUR, berhak mengasai, menarik kembali dan selanjutnya menjual barang jaminan /  agunan kredit baik di muka umum maupun di bawah tangan untuk kemudian diperhatikan dengan kewajiban DEBITUR tanpa mempersulit pihak KOPERASI. Bila terjadi kekurangan, DEBITUR harus membayar sejumlah kekurangan tersebut.</td>
                    </tr>
                </table>
            </td>
        </tr>        
        <tr align="center">
            <td colspan="2">&nbsp;</td>
        </tr>        
        <tr align="center">
            <td colspan="2">PASAL VI(ENAM)</td>
        </tr>
        <tr align="justify">
            <td colspan="2">Terhadap jaminan ini dan segala akibat hukumnya, KOPERASI dan DEBITUR sepakat untuk menyelesaikan melalui kantor Panitera Pengadilan, Pengadilan Negeri Malang.</td>
        </tr>
        <tr align="center">
            <td colspan="2">&nbsp;</td>
        </tr>        
        <tr align="center">
            <td colspan="2">PASAL VII(TUJUH)</td>
        </tr>
        <tr align="justify">
            <td colspan="2">Segala sesuatu yang belum cukup diatur dalam perjanjian ini yang oleh KOPERASI diatur dalam surat menyurat dan kertas-kertas lain merupakan bagian yang dilampirkan dan tidak dapat dipisahkan dari perjanjian ini.<br>
            Demikian perjanjian ini telah dibaca oleh DEBITUR dan / atau dibacakan oleh petugas KOPERASI, disetujui dan di tandatangani di kantor KOPERASI SIMPAN PINJAM "WETA" pada hari <?=$date?> tanggal <?=date('d/m/Y')?></td>
        </tr>
        <tr align="center">
            <td colspan="2">&nbsp;</td>
        </tr>        
        <tr>
            <td colspan="2">
                <table width="100%" align="center">
                    <tr align="center">
                        <td width="45%">&nbsp;</td>
                        <td width="10%">&nbsp;</td>
                        <td width="45%">KOPERASI "WETA"</td>
                    </tr>
                    <tr align="center">
                        <td width="50%">&nbsp;</td>
                        <td width="10%">&nbsp;</td>
                        <td width="50%">JAWA TIMUR</td>
                    </tr>
                    <tr align="center">
                        <td width="50%">&nbsp;</td>
                        <td width="10%">&nbsp;</td>
                        <td width="50%">MALANG</td>
                    </tr>
                    <tr align="center">
                        <td width="50%">&nbsp;</td>
                        <td width="10%">&nbsp;</td>
                        <td width="50%">&nbsp;</td>
                    </tr>
                    <tr align="center">
                        <td width="50%">&nbsp;</td>
                        <td width="10%">&nbsp;</td>
                        <td width="50%">&nbsp;</td>
                    </tr>
                    <tr align="center">
                        <td width="50%" class="border-bottom">&nbsp;</td>
                        <td width="10%">&nbsp;</td>
                        <td width="50%" class="border-bottom">&nbsp;</td>
                    </tr>
                    <tr align="center">
                        <td width="50%">DEBITUR</td>
                        <td width="10%">&nbsp;</td>
                        <td width="50%">&nbsp;</td>
                    </tr>
                    <tr align="center">
                        <td width="50%">&nbsp;</td>
                        <td width="10%">Mengetahui</td>
                        <td width="50%">&nbsp;</td>
                    </tr>
                    <tr align="center">
                        <td width="50%">&nbsp;</td>
                        <td width="10%">&nbsp;</td>
                        <td width="50%">&nbsp;</td>
                    </tr>
                    <tr align="center">
                        <td width="50%">&nbsp;</td>
                        <td width="10%">&nbsp;</td>
                        <td width="50%">&nbsp;</td>
                    </tr>
                    <tr align="center">
                        <td width="50%">&nbsp;</td>
                        <td width="10%">&nbsp;</td>
                        <td width="50%">&nbsp;</td>
                    </tr>
                    <tr align="center">
                        <td width="50%">&nbsp;</td>
                        <td width="10%">&nbsp;</td>
                        <td width="50%">&nbsp;</td>
                    </tr>
                    <tr align="center">
                        <td width="50%">&nbsp;</td>
                        <td width="10%">&nbsp;</td>
                        <td width="50%">&nbsp;</td>
                    </tr>
                    <tr align="center">
                        <td width="50%" class="border-bottom">&nbsp;</td>
                        <td width="10%">&nbsp;</td>
                        <td width="50%" class="border-bottom">&nbsp;</td>
                    </tr>
                    <tr align="center">
                        <td width="50%">SUAMI / ISTRI</td>
                        <td width="10%">&nbsp;</td>
                        <td width="50%">&nbsp;</td>
                    </tr>
                </table>
            </td>
        </tr>
    </tbody>
</table>