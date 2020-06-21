<table width="100%" border="0">
	<thead>
		<tr align="center">
			<td colspan="3">BERITA ACARA SERAH TERIMA JAMINAN</td>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td colspan="3">Pada hari ini <?=date('D')?> Tanggal <?=date('d')?> Bulan <?=date('M')?> Tahun <?=date('Y')?>. Kami yang bertanda tangan dibawah ini :</td>
		</tr>
		<tr>
			<td width="17%">Nama</td>
			<td width="1%">:</td>
			<td width="81%"><?=$detailUser->row()->nama?></td>
		</tr>
		<tr>
			<td>Jabatan</td>
			<td>:</td>
			<td>........................................</td>
		</tr>
		<tr>
			<td>Alamat</td>
			<td>:</td>
			<td><?=$detailUser->row()->alamat?></td>
		</tr>
		<tr>
			<td colspan="3">Selanjutnya disebut PIHAK PERTAMA</td>
		</tr>
		<tr>
			<td>Nama</td>
			<td>:</td>
			<td><?=$detailPinjaman->row()->nama_anggota?></td>
		</tr>
		<tr>
			<td>Jabatan</td>
			<td>:</td>
			<td>........................................</td>
		</tr>
		<tr>
			<td>Alamat</td>
			<td>:</td>
			<td><?=$detailPinjaman->row()->alamat_anggota?></td>
		</tr>
		<tr>
			<td colspan="3">Selanjutnya disebut PIHAK KEDUA</td>
		</tr>
		<tr>
			<td colspan="3">PIHAK PERTAMA menyerahkan barang kepada PIHAK KEDUA, dan PIHAK KEDUA menyatakan telah menerima barang dari PIHAK PERTAMA berupa daftar terlampir :</td>
		</tr>		
		<tr>
			<td>Jenis Jaminan</td>
			<td>:</td>
			<td><?=strtoupper($detailJaminan->row()->jaminan)?></td>
		</tr>
		<tr>
			<td colspan="3">
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
			<td colspan="3">
				Demikianlah berita acara serah terima barang ini dibuat oleh kedua belah pihak, adapun barang-barang tersebut dalam keadaan baik dan cukup, sejak penandatanganan berita acara ini, maka barang tersebut, menjadi tanggung jawab PIHAK KEDUA, memlihara / merawat dengan baik serta dipergunakan untuk keperluan (tempat dimana barang itu dibutuhkan).	
			</td>
		</tr>
		<tr align="center">
			<td colspan="3">&nbsp;</td>
		</tr>
		<tr align="center">
			<td colspan="3">&nbsp;</td>
		</tr>
		<tr align="center">
			<td colspan="3">
            	<table width="100%">
                	<tr align="center">
                    	<td>Yang menerima</td>
                    	<td>&nbsp;</td>
                        <td>Yang menyerahkan</td>
                    </tr>
                    <tr align="center">
                        <td>PIHAK PERTAMA</td>
                        <td>&nbsp;</td>
                        <td>PIHAK KEDUA</td>
                    </tr>
                    <tr align="center">
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr align="center">
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr align="center">
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr align="center">
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr align="center">
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr align="center">
                        <td>(...................................................)</td>
                        <td>&nbsp;</td>
                        <td>(...................................................)</td>
                    </tr>
                    <tr align="center">
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                </table>
            </td>
		</tr>
	</tbody>
</table>