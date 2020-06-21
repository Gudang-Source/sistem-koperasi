<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Index extends MX_Controller {
	function __construct() {
        parent::__construct();
        $this->load->model('Gmodel');
        require_once(APPPATH.'modules/anggota/controllers/Anggota.php');
        require_once(APPPATH.'modules/user/controllers/Users.php');
        $this->isLoggedIn();
        $this->output->delete_cache();
    }
    function terbilangV1($bilangan){
        $bilangan = abs($bilangan);

        $angka = array("    ","satu","dua","tiga","empat","lima","enam","tujuh","delapan","sembilan","sepuluh","sebelas");
        $temp = "";

        if($bilangan < 12){
            $temp = " ".$angka[$bilangan];
        }else if($bilangan < 20){
            $temp = $this->terbilangV1($bilangan - 10)." belas";
        }else if($bilangan < 100){
            $temp = $this->terbilangV1($bilangan/10)." puluh".$this->terbilangV1($bilangan%10);
        }else if ($bilangan < 200) {
            $temp = " seratus".$this->terbilangV1($bilangan - 100);
        }else if ($bilangan < 1000) {
            $temp = $this->terbilangV1($bilangan/100). " ratus". $this->terbilangV1($bilangan % 100);
        }else if ($bilangan < 2000) {
            $temp = " seribu". $this->terbilangV1($bilangan - 1000);
        }else if ($bilangan < 1000000) {
            $temp = $this->terbilangV1($bilangan/1000)." ribu". $this->terbilangV1($bilangan % 1000);
        }else if ($bilangan < 1000000000) {
            $temp = $this->terbilangV1($bilangan/1000000)." juta". $this->terbilangV1($bilangan % 1000000);
        }

        return ucwords(rtrim(trim($temp)));
    }
    function testTerbilangV1($bilangan = 0){
        $beforeRemoving = $this->terbilangV1($bilangan);
        // $beforeRemoving = rtrim($beforeRemoving);
        // $beforeRemoving = trim($beforeRemoving);
        // $beforeRemoving = ucwords($beforeRemoving);
        // $beforeRemoving = substr($beforeRemoving, 1);


        echo "(".$beforeRemoving.")";
    }
    function isLoggedIn(){
        if($this->session->userdata('loggedin') == false){
            header("location:".base_url('admin/Login'));
        }
    }
    function index(){
        $data['view'] = 'main_html/content/dashboard';
    	$this->load->view('main_html/content', $data);
    }
    function getKdUser(){
        $dataSelect['sha1(kd_user)'] = $this->session->userdata('kode_user');
        $selectData = $this->Gmodel->select($dataSelect, 'tm_user');
        return $selectData->row()->kd_user;
    }
    function logout(){
        $this->session->sess_destroy();
        header('location:'.base_url('admin/login'));
    }
    function data($tabel = 'anggota', $type = 'All'){
        $data = array();
        $data['type'] = $type;
        $data['view'] = 'main_html/content/list_anggota';
        if($tabel == 'anggota'){
            $data['type'] = $type;
            $data['view'] = 'main_html/content/list_anggota';
        }else if($tabel == 'user'){
            $data['view'] = 'main_html/content/list_user';
        }
        $this->load->view('main_html/content', $data);
    }
    function add($tabel = 'anggota'){
        $data = array();
        $data['view'] = 'main_html/content/form_anggota';
        if($tabel == 'anggota'){
            $data['view'] = 'main_html/content/form_anggota';
        }else if($tabel == 'user'){
            $data['view'] = 'main_html/content/form_user';
        }
        $this->load->view('main_html/content', $data);
    }
    function post_add($tabel = 'anggota'){
        $anggota = new Anggota();
        $user = new Users();
        $insert = false;
        if($tabel == 'anggota'){
            $insert = $anggota->add($this->input->post());
        }else if($tabel == 'user'){
            $insert = $user->add($this->input->post());
        }
        if($insert){
            echo "true";
        }else{
            echo "false";
        }
    }
    function post_update($tabel = 'anggota'){
        $anggota = new Anggota();
        $user = new Users();
        $update = false;
        if($tabel == 'anggota'){
            $update = $anggota->update($this->input->post());
        }else if($tabel == 'user'){
            $update = $user->update($this->input->post());
        }else if($tabel == 'biaya'){
            $params = $this->input->post();
            $dataUpdate['value'] = $params['biaya'];
            $dataCondition['kd_biaya'] = $params['kd_biaya'];
            $update = $this->Gmodel->update($dataCondition, $dataUpdate, 'tt_biaya');
        }
        if($update){
            echo "true";
        }else{
            echo "false";
        }
    }
    function post_del($tabel = 'anggota', $id = 0){
        $anggota = new Anggota();
        $user = new Users();
        $delete = false;
        if($tabel == 'anggota'){
            $delete = $anggota->delete($id);
        }else if($tabel == 'user'){
            $delete = $user->delete($id);
        }
        if($delete){
            echo "true";
        }else{
            echo "false";
        }
    }
    function post_get($tabel = 'anggota', $id = 0){
        $anggota = new Anggota();
        $user = new Users();
        $response = array();
        if($tabel == 'anggota'){
            $getAnggota = $anggota->detail($id);
            foreach ($getAnggota->result_array() as $row) {
                $item = array();
                $item['kd_anggota'] = sha1($row['kd_anggota']);
                $item['nama_anggota'] = $row['nama_anggota'];
                $item['alamat_anggota'] = $row['alamat_anggota'];
                $item['no_identitas'] = $row['no_identitas'];
                $item['no_karyawan'] = $row['no_karyawan'];
                $item['tanggal_lahir'] = $row['tanggal_lahir'];
                $item['tanggal_masuk'] = $row['tanggal_masuk'];
                $item['tanggal_daftar'] = $row['tanggal_daftar'];
            }
        }else if($tabel == 'user'){
            $getUser = $user->detail($id);
            foreach ($getUser->result_array() as $row) {
                $item = array();
                $item['kd_user'] = sha1($row['kd_user']);
                $item['nama'] = $row['nama'];
                $item['alamat'] = $row['alamat'];
                $item['no_identitas'] = $row['no_identitas'];
                $item['no_hp'] = $row['no_hp'];
                $item['username'] = $row['username'];
                $item['tanggal_lahir'] = $row['tanggal_lahir'];
                $item['tanggal_masuk'] = $row['tanggal_masuk'];
            }
        }else if($tabel == 'biaya'){
            $dataSelect['sha1(kd_biaya)'] = $id;
            $selectData = $this->Gmodel->select($dataSelect, 'tm_biaya');
            foreach ($selectData->result_array() as $row) {
                $item = array();
                $item['kd_biaya'] = $row['kd_biaya'];
                $item['biaya'] = $row['biaya'];
            }
        }
        echo json_encode($item);
    }

    function buat_pinjaman(){
        $data['view'] = 'main_html/content/form_get_anggota';
        $this->load->view('main_html/content', $data);
    }
    function proses_peminjaman(){
        $params = $this->input->post();
        if($params != null){
            $dataSelect = array();
            $dataSelect['no_identitas'] = $params['no_identitas'];
            $selectData = $this->Gmodel->select($dataSelect, 'tm_anggota');
            $kdanggota = $selectData->row()->kd_anggota;
            $data['kd_anggota'] = $kdanggota;
            $jenis = isset($params['jenis'])?'1':'0';
            $data['jenis'] = $jenis;
            if(isset($params['type'])){
                $data['view'] = 'main_html/content/step_umum';
            }else{
                $data['view'] = 'main_html/content/step_karyawan';
            }
            $this->load->view('main_html/content', $data);
        }else{
            header("location:".base_url('admin/index/buat_pinjaman'));
        }
    }
    function finish_pinjaman($kd_pinjaman){
        // INSERT INTO JURNAL
        $selectData = $this->Gmodel->rawQuery("SELECT * FROM tm_pinjaman
                                                    INNER JOIN tm_anggota ON tm_anggota.kd_anggota = tm_pinjaman.kd_anggota
                                                    WHERE sha1(tm_pinjaman.kd_pinjaman) = '".$kd_pinjaman."'");

        $dataSelectAkun['nama'] = 'Pinjaman';
        $selectDataAkun = $this->Gmodel->select($dataSelectAkun, 'tm_akun');

        $dataInsert = array();
        $dataInsert['kd_akun'] = $selectDataAkun->row()->kode_akun;
        $dataInsert['kd_transaksi'] = $selectData->row()->kd_pinjaman;
        $dataInsert['kd_angsuran'] = 0;
        $dataInsert['keterangan'] = 'Pinjaman '.$selectData->row()->nama_anggota;
        $dataInsert['debet'] = $selectData->row()->jumlah_pinjaman;
        $dataInsert['kredit'] = 0;
        $dataInsert['date'] = date('Y-m-d');
        $insertData = $this->Gmodel->insert($dataInsert, 'tt_jurnal_umum');
        if($insertData){
            $dataSelectAkun['nama'] = 'Administrasi';
            $selectDataAkun = $this->Gmodel->select($dataSelectAkun, 'tm_akun');

            $dataInsertJurnal['kd_akun'] = $selectDataAkun->row()->kode_akun;
            $dataInsertJurnal['kd_transaksi'] = $selectData->row()->kd_pinjaman;
            $dataInsertJurnal['kd_angsuran'] = 0;
            $dataInsertJurnal['keterangan'] = 'Administrasi '.$selectData->row()->nama_anggota;
            $dataInsertJurnal['debet'] = 0;
            $dataInsertJurnal['kredit'] = $selectData->row()->jumlah_pinjaman * (2/100);
            $dataInsertJurnal['date'] = date('Y-m-d');
            $insertDataJurnal = $this->Gmodel->insert($dataInsertJurnal, 'tt_jurnal_umum');
            if($insertDataJurnal){
                $dataSelectAkun['nama'] = 'Provisi';
                $selectDataAkun = $this->Gmodel->select($dataSelectAkun, 'tm_akun');

                $dataInsertJurnal['kd_akun'] = $selectDataAkun->row()->kode_akun;
                $dataInsertJurnal['kd_transaksi'] = $selectData->row()->kd_pinjaman;
                $dataInsertJurnal['kd_angsuran'] = 0;
                $dataInsertJurnal['keterangan'] = 'Provisi '.$selectData->row()->nama_anggota;
                $dataInsertJurnal['debet'] = 0;
                $dataInsertJurnal['kredit'] = $selectData->row()->jumlah_pinjaman * (1/100);
                $dataInsertJurnal['date'] = date('Y-m-d');
                $insertDataJurnal = $this->Gmodel->insert($dataInsertJurnal, 'tt_jurnal_umum');
                if($insertDataJurnal){
                    echo "true";
                }else{
                    echo "false";
                }
            }else{
                echo "false";
            }
        }else{
            echo "false";
        }
    }
    function do_ajukan_pinjaman(){
        $params = $this->input->post();
        $response = array();
        if($params != null){
            $response['status'] = 'true';
            $dataInsert['kd_anggota'] = $params['kd_anggota'];
            $dataInsert['jumlah_pinjaman'] = $params['nominal'];
            $dataInsert['bunga'] = $params['bunga'];
            $dataInsert['jenis_pinjaman'] = $params['jenis_pinjaman'];
            $dataInsert['jangka_waktu'] = $params['jangkaWaktu'];
            $dataInsert['jaminan'] = 0;
            $dataInsert['pokok_angsuran'] = $params['jenis_pinjaman']==1?0:($params['nominal']/$params['jangkaWaktu']);
            $dataInsert['bunga_angsuran'] = ($params['bunga']/100)*$params['nominal'];
            $dataInsert['tanggal_pinjam'] = date('Y-m-d');
            $dataInsert['provision'] = (1/100)*$params['nominal'];
            $dataInsert['administrasi'] = (2/100)*$params['nominal'];
            $dataInsert['status'] = 0;
            $dataInsert['kd_user'] = $this->getKdUser();

            $insertData = $this->Gmodel->insert($dataInsert, 'tm_pinjaman');
            if($insertData){
                $dataSelect = array();
                $dataSelect['kd_anggota'] =$dataInsert['kd_anggota'];
                $dataSelect['jumlah_pinjaman'] = $dataInsert['jumlah_pinjaman'];
                $dataSelect['tanggal_pinjam'] = $dataInsert['tanggal_pinjam'];
                $selectData = $this->Gmodel->select($dataSelect, 'tm_pinjaman');
                $response['status'] = 'true';
                $item = array();
                $item['jumlah_pinjaman'] = ($dataInsert['jumlah_pinjaman']);
                $item['bunga'] = $dataInsert['bunga'];
                $item['jangka_waktu'] = $dataInsert['jangka_waktu'];
                $item['pokok_angsuran'] = ($dataInsert['pokok_angsuran']);
                $item['bunga_angsuran'] = ($dataInsert['bunga_angsuran']);
                $item['provision'] = $dataInsert['provision'];
                $item['administrasi'] = $dataInsert['administrasi'];
                $item['total_angsuran'] = ($dataInsert['pokok_angsuran'] + $dataInsert['bunga_angsuran']);
                $item['kd_pinjaman'] = sha1($selectData->row()->kd_pinjaman!=null?$selectData->row()->kd_pinjaman:0);
                $response['data'] = $item;
            }else{
                $response['status'] = 'false';
            }
        }else{
            $response['status'] = 'false';
        }
        echo json_encode($response);
    }
    function do_save_jaminan($type = 'bpkb'){
        $params = $this->input->post();
        $response = array();
        $response['status'] = 'false';
        if($params != null){
            $response['materai'] = $params['materai'];
            if($type == 'bpkb'){
                $dataSelect['sha1(kd_pinjaman)'] = $params['kd_pinjaman'];
                $selectData = $this->Gmodel->select($dataSelect, 'tm_pinjaman');
                $kdPinjaman = $selectData->row()->kd_pinjaman;
                // nopol
                // merk
                // tahun
                // warna
                // norangka
                // nomesin
                // atasnama
                // alamat
                // status
                $jaminan = 'bpkb';
                $nosurat = $params['nosurat'];
                $nopol = $params['nopol'];
                $merk = $params['merk'];
                $tahun = $params['tahun'];
                $warna = $params['warna'];
                $norangka = $params['norangka'];
                $nomesin = $params['nomesin'];
                $atasnama = $params['atasnama'];
                $alamat = $params['alamat'];
                $status = 0;
                $dataInsert['kd_pinjaman'] = $kdPinjaman;
                $dataInsert['jaminan'] = $params['jaminan'];
                $dataInsert['no_surat'] = $nosurat;
                $dataInsert['nopol'] = $nopol;
                $dataInsert['merk'] = $merk;
                $dataInsert['tahun'] = $tahun;
                $dataInsert['warna'] = $warna;
                $dataInsert['norangka'] = $norangka;
                $dataInsert['nomesin'] = $nomesin;
                $dataInsert['atasnama'] = $atasnama;
                $dataInsert['alamat'] = $alamat;
                $dataInsert['status'] = $status;
                $insertData = $this->Gmodel->insert($dataInsert, 'tm_jaminan');
                if($insertData){
                    $response['status'] = 'true';
                }else{
                    $response['status'] = 'false';
                }
            }else if ($type == 'sertifikat') {
                $dataSelect['sha1(kd_pinjaman)'] = $params['kd_pinjaman'];
                $selectData = $this->Gmodel->select($dataSelect, 'tm_pinjaman');
                $kdPinjaman = $selectData->row()->kd_pinjaman;
                // nopol
                // merk
                // tahun
                // warna
                // norangka
                // nomesin
                // atasnama
                // alamat
                // status
                $jaminan = 'sertifikat';
                $nosurat = $params['nosurat'];
                $atasnama = $params['atasnama'];
                $alamat = $params['alamat'];
                $luastanah = $params['luastanah'];
                $status = 0;
                $dataInsert['kd_pinjaman'] = $kdPinjaman;
                $dataInsert['jaminan'] = $jaminan;
                $dataInsert['no_surat'] = $nosurat;
                $dataInsert['atasnama'] = $atasnama;
                $dataInsert['luastanah'] = $luastanah;
                $dataInsert['alamat'] = $alamat;
                $insertData = $this->Gmodel->insert($dataInsert, 'tm_jaminan');
                if($insertData){
                    $response['status'] = 'true';
                }else{
                    $response['status'] = 'false';
                }
            }
        }else{
            $response['status'] = 'false';
        }
        echo json_encode($response);
    }
    function getAnggota(){
        $params = $this->input->post();
        $anggota = new Anggota();

        $dataTable['no_identitas'] = $params['no_identitas'];
        $getData = $anggota->get($dataTable);

        $response = array();

        if ($getData->num_rows() > 0) {
            $cekTanggungan = $this->Gmodel->rawQuery("select * from tm_pinjaman
                                                            inner join tm_anggota on tm_anggota.kd_anggota = tm_pinjaman.kd_anggota
                                                            where tm_pinjaman.`status` = '0'
                                                            and tm_anggota.no_identitas = '".$dataTable['no_identitas']."'");
            if($cekTanggungan->num_rows() > 0){
                $response['status'] = '1';
                foreach ($getData->result_array() as $row) {
                    $item = array();
                    $item['nama'] = $row['nama_anggota'];
                    $item['alamat'] = $row['alamat_anggota'];
                    $item['no_karyawan'] = $row['no_karyawan'];
                    // array_push($response['data'], $item);
                }
                $response['data'] = $item;
            }else{
                $response['status'] = 'true';
                foreach ($getData->result_array() as $row) {
                    $item = array();
                    $item['nama'] = $row['nama_anggota'];
                    $item['alamat'] = $row['alamat_anggota'];
                    $item['no_karyawan'] = $row['no_karyawan'];
                    // array_push($response['data'], $item);
                }
                $response['data'] = $item;
            }
        }else{
            $response['status'] = '0';
        }
        echo json_encode($response);
    }
    function bayar_angsuran(){
        $data['view'] = 'main_html/content/form_bayar_angsuran';
        $this->load->view('main_html/content', $data);
    }
    function getDetailAngsuran(){
        $params = $this->input->post();
        $response['status'] = 'false';
        if($params!=null){
            $cekMasterPinjam = $this->Gmodel->rawQuery("SELECT * FROM tm_pinjaman
                                                                INNER JOIN tm_anggota ON tm_anggota.kd_anggota = tm_pinjaman.kd_anggota
                                                                WHERE tm_anggota.no_identitas = '".$params['no_identitas']."'  and status = '0'");
            if($cekMasterPinjam->num_rows() > 0){
                // cek angsuran
                $kdMasterPinjam = $cekMasterPinjam->row()->kd_pinjaman;
                $cekAngsuran = $this->Gmodel->rawQuery("SELECT * FROM tt_angsuran WHERE tt_angsuran.kd_pinjaman = '".$kdMasterPinjam."'");
                $maxAngsuran = $cekMasterPinjam->row()->jangka_waktu;
                $jenisPinjaman = $cekMasterPinjam->row()->jenis_pinjaman;
                if($jenisPinjaman == 1){
                    if(($cekAngsuran->num_rows() + 1) <= $maxAngsuran){
                        $response['status'] = 'true';
                        $item = array();
                        $item['nama'] = $cekMasterPinjam->row()->nama_anggota;
                        $item['kd_pinjaman'] = sha1($cekMasterPinjam->row()->kd_pinjaman);
                        $item['alamat'] = $cekMasterPinjam->row()->alamat_anggota;
                        $item['total_angsuran'] = number_format($cekMasterPinjam->row()->pokok_angsuran + $cekMasterPinjam->row()->bunga_angsuran);
                        $item['angsuranke'] = $cekAngsuran->num_rows() + 1;
                        $item['tempo'] = $this->jatuh_tempo($cekMasterPinjam->row()->tanggal_pinjam, $cekAngsuran->num_rows() + 1);
                        $item['max'] = $cekMasterPinjam->row()->jangka_waktu;
                        $item['denda'] = $this->getDenda($cekMasterPinjam->row()->jumlah_pinjaman, $this->jatuh_tempo($cekMasterPinjam->row()->tanggal_pinjam, $cekAngsuran->num_rows() + 1), date('Y-m-d'));
                        $response['data'] = $item;
                    }else if((($cekAngsuran->num_rows() + 1) - $maxAngsuran) == 1){
                        $response['status'] = 'true';
                        $item = array();
                        $item['nama'] = $cekMasterPinjam->row()->nama_anggota;
                        $item['kd_pinjaman'] = sha1($cekMasterPinjam->row()->kd_pinjaman);
                        $item['alamat'] = $cekMasterPinjam->row()->alamat_anggota;
                        $item['total_angsuran'] = number_format($cekMasterPinjam->row()->jumlah_pinjaman);
                        $item['angsuranke'] = $cekAngsuran->num_rows() + 1;
                        $item['tempo'] = $this->jatuh_tempo($cekMasterPinjam->row()->tanggal_pinjam, $cekAngsuran->num_rows() + 1);
                        $item['max'] = $cekMasterPinjam->row()->jangka_waktu;
                        $item['denda'] = $this->getDenda($cekMasterPinjam->row()->jumlah_pinjaman, $this->jatuh_tempo($cekMasterPinjam->row()->tanggal_pinjam, $cekAngsuran->num_rows() + 1), date('Y-m-d'));
                        $response['data'] = $item;
                    }else{
                        $response['status'] = 'false';
                    }
                }else{
                    if(($cekAngsuran->num_rows() + 1) <= $maxAngsuran){
                        $response['status'] = 'true';
                        $item = array();
                        $item['nama'] = $cekMasterPinjam->row()->nama_anggota;
                        $item['kd_pinjaman'] = sha1($cekMasterPinjam->row()->kd_pinjaman);
                        $item['alamat'] = $cekMasterPinjam->row()->alamat_anggota;
                        $item['total_angsuran'] = number_format($cekMasterPinjam->row()->pokok_angsuran + $cekMasterPinjam->row()->bunga_angsuran);
                        $item['angsuranke'] = $cekAngsuran->num_rows() + 1;
                        $item['tempo'] = $this->jatuh_tempo($cekMasterPinjam->row()->tanggal_pinjam, $cekAngsuran->num_rows() + 1);
                        $item['max'] = $cekMasterPinjam->row()->jangka_waktu;
                        $item['denda'] = $this->getDenda($cekMasterPinjam->row()->jumlah_pinjaman, $this->jatuh_tempo($cekMasterPinjam->row()->tanggal_pinjam, $cekAngsuran->num_rows() + 1), date('Y-m-d'));
                        $response['data'] = $item;
                    }else{
                        $response['status'] = 'false';
                    }
                }
            }else{
                $response['status'] = 'false';
            }
        }
        echo json_encode($response);
    }
    function jatuh_tempo($date = '2016-09-18', $loop = 1){
        $next_month = $date;
        $next_month = date("Y-m-d", strtotime("$next_month +3 day"));
        for ($i=1; $i <=$loop ; $i++) {
            $next_month = date("Y-m-d", strtotime("$next_month +1 month"));
        }
        return $next_month_last_day = date("Y-m-d",strtotime('-1 second',strtotime($next_month)));
    }
    function different_date($date1, $date2){
        $datetime1 = new DateTime($date1);

        $datetime2 = new DateTime($date2);

        $difference = $datetime1->diff($datetime2);
        return $difference->days;
    }
    function getDenda($nominal, $jatuh_tempo, $tanggal_sekarang){
        $denda = 0;
        if($this->cekdate($jatuh_tempo, $tanggal_sekarang) == 0){
            // NO DENDA
            $denda = 0;
        }else if($this->cekdate($jatuh_tempo, $tanggal_sekarang) == 1){
            // DENDA
            $denda = $nominal * ($this->different_date($jatuh_tempo, $tanggal_sekarang) / 100);
        }else if($this->cekdate($jatuh_tempo, $tanggal_sekarang) == 2){
            // NO DENDA
            $denda = 0;
        }
        return $denda;
    }
    function cekdate($date1, $date2){
        if($date1>$date2){
            return 0;
        }else if ($date1<$date2) {
            return 1;
        }else{
            return 2;
        }
    }
    function test_date(){
        echo date('Y-m-d');
        echo "<br>";
        echo $this->jatuh_tempo('2016-10-06', 1);
        echo $this->getDenda(10000, $this->jatuh_tempo('2016-10-06', 1), date('Y-m-d'));
        // echo $this->cekdate($this->jatuh_tempo(date('Y-m-d'), 0), $this->jatuh_tempo(date('Y-m-d'), 3));
    }
    function do_bayar(){
        $params = $this->input->post();
        $response = array();
        if($params != null){
            if($params['bayar'] >= $params['total_angsuran']){
                $dataSelect['sha1(kd_pinjaman)'] = $params['kd_pinjaman'];
                $getMasterPinjaman = $this->Gmodel->rawQuery("SELECT * FROM tm_pinjaman
                                            INNER JOIN tm_anggota ON tm_anggota.kd_anggota = tm_pinjaman.kd_anggota
                                            WHERE sha1(tm_pinjaman.kd_pinjaman) = '".$params['kd_pinjaman']."'");
                $kdPinjaman = $getMasterPinjaman->row()->kd_pinjaman;
                $dataSelectTransaksi['kd_pinjaman'] = $kdPinjaman;
                $getDataTransaksi = $this->Gmodel->select($dataSelectTransaksi, 'tt_angsuran');
                $numRowsTransaksi = $getDataTransaksi->num_rows();
                if ($getMasterPinjaman->row()->jenis_pinjaman == 1) {
                    $pokok = $params['angsuranke'] > $getMasterPinjaman->row()->jangka_waktu?$getMasterPinjaman->row()->jumlah_pinjaman:$getMasterPinjaman->row()->pokok_angsuran;
                    $bunga = $params['angsuranke'] > $getMasterPinjaman->row()->jangka_waktu?0:$getMasterPinjaman->row()->bunga_angsuran;

                    $dataSelectUpdate['kd_pinjaman'] = $kdPinjaman;
                    $dataUpdate['status'] = $params['angsuranke'] - $getMasterPinjaman->row()->jangka_waktu == 1?'1':'0';
                    $this->Gmodel->update($dataSelectUpdate, $dataUpdate, 'tm_pinjaman');
                    $response['status'] = 'true';

                }else{
                    $pokok = $getMasterPinjaman->row()->pokok_angsuran;
                    $bunga = $getMasterPinjaman->row()->bunga_angsuran;

                    $dataSelectUpdate['kd_pinjaman'] = $kdPinjaman;
                    $dataUpdate['status'] = $params['angsuranke'] - $getMasterPinjaman->row()->jangka_waktu == 0?'1':'0';
                    $this->Gmodel->update($dataSelectUpdate, $dataUpdate, 'tm_pinjaman');
                    $response['status'] = 'true';
                }
                $dataInsert['kd_pinjaman'] = $kdPinjaman;
                $dataInsert['tanggal_transaksi'] = date('Y-m-d');
                $dataInsert['denda'] = $this->getDenda($getMasterPinjaman->row()->jumlah_pinjaman, $this->jatuh_tempo($getMasterPinjaman->row()->tanggal_pinjam, $params['angsuranke'] + 1), date('Y-m-d'));;
                $dataInsert['ke'] = $params['angsuranke'];
                $dataInsert['pinalti'] = 0;
                $dataInsert['pokok'] = $pokok;
                $dataInsert['bunga'] = $bunga;
                $dataInsert['kd_user'] = $this->getKdUser();
                $insertData = $this->Gmodel->insert($dataInsert, 'tt_angsuran');
                if($insertData){
                    if($getMasterPinjaman->row()->jenis_pinjaman == 1){
                        $kredit = $params['angsuranke'] > $getMasterPinjaman->row()->jangka_waktu?$pokok:$getMasterPinjaman->row()->bunga_angsuran;
                        $keterangan = $params['angsuranke'] > $getMasterPinjaman->row()->jangka_waktu?'Bayar Jumlah Pinjaman ':'Angsuran Bunga ';
                        $dataSelectAkun['nama'] = 'Angsuran';
                        $selectDataAkun = $this->Gmodel->select($dataSelectAkun, 'tm_akun');

                        $dataInsertJurnalUmum = array();
                        $dataInsertJurnalUmum['kd_akun'] = $selectDataAkun->row()->kode_akun;
                        $dataInsertJurnalUmum['kd_transaksi'] = $getMasterPinjaman->row()->kd_pinjaman;
                        $dataInsertJurnalUmum['kd_angsuran'] = 0;
                        $dataInsertJurnalUmum['keterangan'] = $keterangan.$getMasterPinjaman->row()->nama_anggota.' ke '.$params['angsuranke'];
                        $dataInsertJurnalUmum['debet'] = 0;
                        $dataInsertJurnalUmum['kredit'] = $kredit;
                        $dataInsertJurnalUmum['date'] = date('Y-m-d');
                        $insertDataJurnalUmum = $this->Gmodel->insert($dataInsertJurnalUmum, 'tt_jurnal_umum');
                        if($insertDataJurnalUmum){
                            $response['status'] = 'true';
                        }else{
                            $response['status'] = 'false';
                        }
                    }else{
                        $dataSelectAkun['nama'] = 'Angsuran';
                        $selectDataAkun = $this->Gmodel->select($dataSelectAkun, 'tm_akun');

                        $dataInsertJurnalUmum = array();
                        $dataInsertJurnalUmum['kd_akun'] = $selectDataAkun->row()->kode_akun;
                        $dataInsertJurnalUmum['kd_transaksi'] = $getMasterPinjaman->row()->kd_pinjaman;
                        $dataInsertJurnalUmum['kd_angsuran'] = 0;
                        $dataInsertJurnalUmum['keterangan'] = 'Angsuran '.$getMasterPinjaman->row()->nama_anggota.' ke '.$params['angsuranke'];
                        $dataInsertJurnalUmum['debet'] = 0;
                        $dataInsertJurnalUmum['kredit'] = $getMasterPinjaman->row()->pokok_angsuran;
                        $dataInsertJurnalUmum['date'] = date('Y-m-d');
                        $insertDataJurnalUmum = $this->Gmodel->insert($dataInsertJurnalUmum, 'tt_jurnal_umum');

                        if($insertDataJurnalUmum){
                            $dataSelectAkun['nama'] = 'Bunga Angsuran';
                            $selectDataAkun = $this->Gmodel->select($dataSelectAkun, 'tm_akun');
                            $dataInsertJurnalUmumBunga = array();
                            $dataInsertJurnalUmumBunga['kd_akun'] = $selectDataAkun->row()->kode_akun;
                            $dataInsertJurnalUmumBunga['kd_transaksi'] = $getMasterPinjaman->row()->kd_pinjaman;
                            $dataInsertJurnalUmumBunga['kd_angsuran'] = 0;
                            $dataInsertJurnalUmumBunga['keterangan'] = 'Bunga Angsuran '.$getMasterPinjaman->row()->nama_anggota.' ke '.$params['angsuranke'];
                            $dataInsertJurnalUmumBunga['debet'] = 0;
                            $dataInsertJurnalUmumBunga['kredit'] = $getMasterPinjaman->row()->bunga_angsuran;
                            $dataInsertJurnalUmumBunga['date'] = date('Y-m-d');
                            $insertDataJurnalUmumBunga = $this->Gmodel->insert($dataInsertJurnalUmumBunga, 'tt_jurnal_umum');
                            if($insertDataJurnalUmumBunga){
                                $response['status'] = 'true';
                            }else{
                                $response['status'] = 'false';
                            }
                        }else{
                            $response['status'] = 'false';
                        }
                    }
                }else{
                    $response['status'] = '0';
                }
            }else{
                $response['status'] = '1';
            }
        }else{
            $response['status'] = '2';
        }
        echo json_encode($response);
    }

    function tutup_angsuran(){
        $data['view'] = 'main_html/content/form_tutup_angsuran';
        $this->load->view('main_html/content', $data);
    }
    function getDetailLunas(){
        $params = $this->input->post();
        $response['status'] = 'false';
        if($params!=null){
            $cekMasterPinjam = $this->Gmodel->rawQuery("SELECT * FROM tm_pinjaman
                                                                INNER JOIN tm_anggota ON tm_anggota.kd_anggota = tm_pinjaman.kd_anggota
                                                                WHERE tm_anggota.no_identitas = '".$params['no_identitas']."'  and status = '0'");
            if($cekMasterPinjam->num_rows() > 0){
                // cek angsuran
                if($cekMasterPinjam->row()->jenis_pinjaman == 0){
                    $kdMasterPinjam = $cekMasterPinjam->row()->kd_pinjaman;
                    $cekAngsuran = $this->Gmodel->rawQuery("SELECT * FROM tt_angsuran WHERE tt_angsuran.kd_pinjaman = '".$kdMasterPinjam."'");
                    $maxAngsuran = $cekMasterPinjam->row()->jangka_waktu;
                    if(($cekAngsuran->num_rows() + 1) <= $maxAngsuran){
                        $sisaJangkaWaktu = $cekMasterPinjam->row()->jangka_waktu - $cekAngsuran->num_rows();
                        $sisaAngsuran = ($cekMasterPinjam->row()->jumlah_pinjaman / $cekMasterPinjam->row()->jangka_waktu) * $sisaJangkaWaktu;
                        $pinaltiPelunasan = $sisaAngsuran * ($sisaJangkaWaktu/100);
                        $response['status'] = 'true';
                        $item = array();
                        $item['nama'] = $cekMasterPinjam->row()->nama_anggota;
                        $item['kd_pinjaman'] = sha1($cekMasterPinjam->row()->kd_pinjaman);
                        $item['alamat'] = $cekMasterPinjam->row()->alamat_anggota;
                        $item['total_angsuran'] = number_format($sisaAngsuran + $pinaltiPelunasan);
                        $item['angsuranke'] = $cekAngsuran->num_rows() + 1;
                        $item['tempo'] = $cekMasterPinjam->row()->tanggal_pinjam;
                        $item['max'] = $cekMasterPinjam->row()->jangka_waktu;
                        $item['kurang_bayar'] = $sisaAngsuran;
                        $item['kurang_jangka_waktu'] = $sisaJangkaWaktu;
                        $item['pinaltiPelunasan'] = $sisaAngsuran * (1/100);
                        $response['data'] = $item;
                    }else{
                        $response['status'] = 'false';
                    }
                }else{
                    $kdMasterPinjam = $cekMasterPinjam->row()->kd_pinjaman;
                    $cekAngsuran = $this->Gmodel->rawQuery("SELECT * FROM tt_angsuran WHERE tt_angsuran.kd_pinjaman = '".$kdMasterPinjam."'");
                    $maxAngsuran = $cekMasterPinjam->row()->jangka_waktu;
                    if(($cekAngsuran->num_rows() + 1) <= $maxAngsuran){
                        $sisaJangkaWaktu = $cekMasterPinjam->row()->jangka_waktu - ($cekAngsuran->num_rows());
                        $sisaAngsuran = ($cekMasterPinjam->row()->jumlah_pinjaman / $cekMasterPinjam->row()->jangka_waktu) * $sisaJangkaWaktu;
                        $pinaltiPelunasan = $cekMasterPinjam->row()->jumlah_pinjaman * ($sisaJangkaWaktu/100);
                        $response['status'] = 'true';
                        $item = array();
                        $item['nama'] = $cekMasterPinjam->row()->nama_anggota;
                        $item['kd_pinjaman'] = sha1($cekMasterPinjam->row()->kd_pinjaman);
                        $item['alamat'] = $cekMasterPinjam->row()->alamat_anggota;
                        $item['total_angsuran'] = number_format($cekMasterPinjam->row()->jumlah_pinjaman + $pinaltiPelunasan);
                        $item['angsuranke'] = $cekAngsuran->num_rows() + 1;
                        $item['tempo'] = $cekMasterPinjam->row()->tanggal_pinjam;
                        $item['max'] = $cekMasterPinjam->row()->jangka_waktu;
                        $item['kurang_bayar'] = $cekMasterPinjam->row()->jumlah_pinjaman;
                        $item['kurang_jangka_waktu'] = $sisaJangkaWaktu;
                        $item['pinaltiPelunasan'] = $cekMasterPinjam->row()->jumlah_pinjaman * (1/100);
                        $response['data'] = $item;
                    }else{
                        $response['status'] = 'false';
                    }
                }
            }else{
                $response['status'] = 'false';
            }
        }
        echo json_encode($response);
    }
    function do_lunas(){
        $params = $this->input->post();
        $response = array();
        if($params != null){
            if($params['bayar'] >= $params['total_angsuran']){
                $dataSelect['sha1(kd_pinjaman)'] = $params['kd_pinjaman'];
                // $getMasterPinjaman = $this->Gmodel->select($dataSelect, 'tm_pinjaman');
                $getMasterPinjaman = $this->Gmodel->rawQuery("SELECT * FROM tm_pinjaman
                            INNER JOIN tm_anggota ON tm_anggota.kd_anggota = tm_pinjaman.kd_anggota
                            WHERE sha1(tm_pinjaman.kd_pinjaman) = '".$params['kd_pinjaman']."'");
                $kdPinjaman = $getMasterPinjaman->row()->kd_pinjaman;
                $pokokAngsuran = $params['kurang_bayar'] / $params['kurang_jangka_waktu'];
                $pinalti = $params['pinaltiPelunasan'];
                if($getMasterPinjaman->row()->jenis_pinjaman == 1){
                    $pokokAngsuran = $getMasterPinjaman->row()->jumlah_pinjaman * ((($params['max']+1)-$params['angsuranke'])/100) / (($params['max']+1)-$params['angsuranke']);
                    for ($i=$params['angsuranke']; $i <= $params['max']; $i++) {
                        $dataInsert['kd_pinjaman'] = $kdPinjaman;
                        $dataInsert['tanggal_transaksi'] = date('Y-m-d');
                        $dataInsert['denda'] = 0;
                        $dataInsert['ke'] = $i;
                        $dataInsert['pinalti'] = $pokokAngsuran;
                        $dataInsert['pokok'] = 0;
                        $dataInsert['bunga'] = 0;
                        $dataInsert['kd_user'] = $this->getKdUser();
                        $insertData = $this->Gmodel->insert($dataInsert, 'tt_angsuran');

                        $dataSelectAkun['nama'] = 'Angsuran';
                        $selectDataAkun = $this->Gmodel->select($dataSelectAkun, 'tm_akun');

                        $dataInsertJurnalUmum = array();
                        $dataInsertJurnalUmum['kd_akun'] = $selectDataAkun->row()->kode_akun;
                        $dataInsertJurnalUmum['kd_transaksi'] = $getMasterPinjaman->row()->kd_pinjaman;
                        $dataInsertJurnalUmum['kd_angsuran'] = 0;
                        $dataInsertJurnalUmum['keterangan'] = 'Pinalti Angsuran '.$getMasterPinjaman->row()->nama_anggota.' ke '.$i;
                        $dataInsertJurnalUmum['debet'] = 0;
                        $dataInsertJurnalUmum['kredit'] = $pokokAngsuran;
                        $dataInsertJurnalUmum['date'] = date('Y-m-d');
                        $insertDataJurnalUmum = $this->Gmodel->insert($dataInsertJurnalUmum, 'tt_jurnal_umum');
                    }
                    $dataInsert['kd_pinjaman'] = $kdPinjaman;
                    $dataInsert['tanggal_transaksi'] = date('Y-m-d');
                    $dataInsert['denda'] = 0;
                    $dataInsert['ke'] = $i;
                    $dataInsert['pinalti'] = 0;
                    $dataInsert['pokok'] = $getMasterPinjaman->row()->jumlah_pinjaman;
                    $dataInsert['bunga'] = 0;
                    $dataInsert['kd_user'] = $this->getKdUser();
                    $insertData = $this->Gmodel->insert($dataInsert, 'tt_angsuran');

                    $dataSelectAkun['nama'] = 'Angsuran';
                    $selectDataAkun = $this->Gmodel->select($dataSelectAkun, 'tm_akun');

                    $dataInsertJurnalUmum = array();
                    $dataInsertJurnalUmum['kd_akun'] = $selectDataAkun->row()->kode_akun;
                    $dataInsertJurnalUmum['kd_transaksi'] = $getMasterPinjaman->row()->kd_pinjaman;
                    $dataInsertJurnalUmum['kd_angsuran'] = 0;
                    $dataInsertJurnalUmum['keterangan'] = ' Bayar Jumlah Pinjaman '.$getMasterPinjaman->row()->nama_anggota;
                    $dataInsertJurnalUmum['debet'] = 0;
                    $dataInsertJurnalUmum['kredit'] = $getMasterPinjaman->row()->jumlah_pinjaman;
                    $dataInsertJurnalUmum['date'] = date('Y-m-d');
                    $insertDataJurnalUmum = $this->Gmodel->insert($dataInsertJurnalUmum, 'tt_jurnal_umum');
                }else{
                    for ($i=$params['angsuranke']; $i <= $params['max']; $i++) {
                        $dataInsert['kd_pinjaman'] = $kdPinjaman;
                        $dataInsert['tanggal_transaksi'] = date('Y-m-d');
                        $dataInsert['denda'] = 0;
                        $dataInsert['ke'] = $i;
                        $dataInsert['pinalti'] = $pinalti;
                        $dataInsert['pokok'] = $pokokAngsuran;
                        $dataInsert['bunga'] = 0;
                        $dataInsert['kd_user'] = $this->getKdUser();
                        $insertData = $this->Gmodel->insert($dataInsert, 'tt_angsuran');

                        $dataSelectAkun['nama'] = 'Angsuran';
                        $selectDataAkun = $this->Gmodel->select($dataSelectAkun, 'tm_akun');

                        $dataInsertJurnalUmum = array();
                        $dataInsertJurnalUmum['kd_akun'] = $selectDataAkun->row()->kode_akun;
                        $dataInsertJurnalUmum['kd_transaksi'] = $getMasterPinjaman->row()->kd_pinjaman;
                        $dataInsertJurnalUmum['kd_angsuran'] = 0;
                        $dataInsertJurnalUmum['keterangan'] = 'Tutup Angsuran '.$getMasterPinjaman->row()->nama_anggota.' ke '.$i;
                        $dataInsertJurnalUmum['debet'] = 0;
                        $dataInsertJurnalUmum['kredit'] = $pokokAngsuran;
                        $dataInsertJurnalUmum['date'] = date('Y-m-d');
                        $insertDataJurnalUmum = $this->Gmodel->insert($dataInsertJurnalUmum, 'tt_jurnal_umum');

                        $dataInsertJurnalUmumPinalti = array();
                        $dataInsertJurnalUmumPinalti['kd_akun'] = $selectDataAkun->row()->kode_akun;
                        $dataInsertJurnalUmumPinalti['kd_transaksi'] = $getMasterPinjaman->row()->kd_pinjaman;
                        $dataInsertJurnalUmumPinalti['kd_angsuran'] = 0;
                        $dataInsertJurnalUmumPinalti['keterangan'] = 'Pinalti Angsuran '.$getMasterPinjaman->row()->nama_anggota.' ke '.$i;
                        $dataInsertJurnalUmumPinalti['debet'] = 0;
                        $dataInsertJurnalUmumPinalti['kredit'] = $pinalti;
                        $dataInsertJurnalUmumPinalti['date'] = date('Y-m-d');
                        $insertDataJurnalUmumPinalti = $this->Gmodel->insert($dataInsertJurnalUmumPinalti, 'tt_jurnal_umum');
                    }
                }
                if($insertData){

                    $dataUpdate['status'] = '1';
                    $this->Gmodel->update($dataSelect, $dataUpdate, 'tm_pinjaman');
                    $response['status'] = 'true';
                }else{
                    $response['status'] = '0';
                }
            }else{
                $response['status'] = '1';
            }
        }else{
            $response['status'] = '2';
        }
        echo json_encode($response);
    }
    function data_peminjam(){
        $data['view'] = 'main_html/content/list_peminjam';
        $this->load->view('main_html/content', $data);
    }
    function getDataPeminjam($filter = 'all'){
        $data = array();
        if($filter == 'all'){
            // no where
            $data['table'] = $this->Gmodel->rawQuery("SELECT * FROM tm_pinjaman INNER JOIN tm_anggota ON tm_anggota.kd_anggota = tm_pinjaman.kd_anggota WHERE tm_pinjaman.status = 0 GROUP BY tm_pinjaman.kd_anggota DESC");
        }else if($filter == 'umum'){
            // no_karyawan = 0
            $data['table'] = $this->Gmodel->rawQuery("SELECT * FROM tm_pinjaman INNER JOIN tm_anggota ON tm_anggota.kd_anggota = tm_pinjaman.kd_anggota WHERE tm_pinjaman.status = 0 AND tm_anggota.no_karyawan IN ('0', '', NULL) GROUP BY tm_pinjaman.kd_anggota DESC");
        }else if($filter == 'karyawan'){
            // no_karyawan != 0
            $data['table'] = $this->Gmodel->rawQuery("SELECT * FROM tm_pinjaman INNER JOIN tm_anggota ON tm_anggota.kd_anggota = tm_pinjaman.kd_anggota WHERE tm_pinjaman.status = 0 AND CHAR_LENGTH(no_karyawan) > 1 GROUP BY tm_pinjaman.kd_anggota DESC");
        }
        $this->load->view('main_html/content/subcontent/data_peminjam', $data);
    }
    function detail_pinjaman($kd_pinjaman = null){
        if($kd_pinjaman != null){
            $getDataMaster = $this->Gmodel->rawQuery("SELECT * FROM tm_pinjaman
                                                            INNER JOIN tm_anggota ON tm_anggota.kd_anggota = tm_pinjaman.kd_anggota
                                                            LEFT JOIN tt_angsuran ON tt_angsuran.kd_pinjaman = tm_pinjaman.kd_pinjaman
                                                            WHERE sha1(tm_pinjaman.kd_pinjaman) = '$kd_pinjaman'");
            $data['dataTransaksi'] = $getDataMaster;
            $this->load->view('main_html/content/subcontent/data_transaksi', $data);
        }else{
            echo "NO DATA";
        }
    }
    function laporan_pinjaman(){
        $data['view'] = 'main_html/content/laporan/pinjaman';
        $this->load->view('main_html/content', $data);
    }
    function do_laporan_pinjaman(){
        $params = $this->input->post();
        if($params != null){
            $dataPinjaman = $this->Gmodel->rawQuery("SELECT * FROM tm_pinjaman
                                                            INNER JOIN tm_anggota on tm_anggota.kd_anggota = tm_pinjaman.kd_anggota
                                                            WHERE tm_pinjaman.tanggal_pinjam BETWEEN '".$params['datea']."' AND '".$params['dateb']."'");
            $data['dataPinjaman'] = $dataPinjaman;
            $this->load->view('main_html/content/laporan/data_pinjaman', $data);
        }else{
            echo "TIDAK ADA DATA";
        }
    }
    function laporan_angsuran(){
        $data['view'] = 'main_html/content/laporan/angsuran';
        $this->load->view('main_html/content', $data);
    }
    function do_laporan_angsuran(){
        $params = $this->input->post();
        if($params != null){
            $dataAngsuran = $this->Gmodel->rawQuery("SELECT * FROM tm_pinjaman
                                                            INNER JOIN tm_anggota on tm_anggota.kd_anggota = tm_pinjaman.kd_anggota
                                                            WHERE tm_pinjaman.tanggal_pinjam BETWEEN '".$params['datea']."' AND '".$params['dateb']."'");
            $data['dataAngsuran'] = $dataAngsuran;
            $this->load->view('main_html/content/laporan/data_angsuran', $data);
        }else{
            echo "TIDAK ADA DATA";
        }
    }
    function detailAngsuran($kd_pinjaman = null, $output = 'total_angsuran'){
        $dataSelect['sha1(kd_pinjaman)'] = $kd_pinjaman;
        $dataAngsuran = $this->Gmodel->select($dataSelect, 'tt_angsuran');
        if($output == 'total_angsuran'){
            echo $dataAngsuran->num_rows();
        }else if($output == 'angsuran'){
            $total_angsuran = 0;
            foreach ($dataAngsuran->result_array() as $row) {
                $total_angsuran += $row['pokok'];
            }
            echo $total_angsuran;
        }else if($output == 'bunga'){
            $total_bunga = 0;
            foreach ($dataAngsuran->result_array() as $row) {
                $total_bunga += $row['bunga'];
            }
            echo $total_bunga;
        }else if($output == 'pinalti'){
            $total_pinalti = 0;
            foreach ($dataAngsuran->result_array() as $row) {
                $total_pinalti += $row['pinalti'];
            }
            echo $total_pinalti;
        }else{
            echo "Data Tidak Ditemukan";
        }
    }
    function laporan_jurnal(){
        $data['view'] = 'main_html/content/laporan/jurnal_umum';
        $this->load->view('main_html/content', $data);
    }
    function do_laporan_jurnal(){
        $params = $this->input->post();
        if($params != null){
            $getDataJurnalUmum = $this->Gmodel->rawQuery("SELECT * FROM tt_jurnal_umum
                                                                INNER JOIN tm_akun ON tm_akun.kode_akun = tt_jurnal_umum.kd_akun
                                                                WHERE tt_jurnal_umum.date BETWEEN '".$params['datea']."' AND '".$params['dateb']."'
                                                                ORDER BY kd_jurnal ASC");
            $data['dataJurnalUmum'] = $getDataJurnalUmum;
            $this->load->view('main_html/content/laporan/data_jurnal_umum', $data);
        }else{
            echo "NO DATA";
        }
    }
    function getDetailNasabah(){
        $params = $this->input->post();
        $response = array();
        $response['status'] = 'false';
        if($params != null){
            $dataSelect['no_identitas'] = $params['no_identitas'];
            $getAnggota = $this->Gmodel->select($dataSelect, 'tm_anggota');
            if($getAnggota->num_rows() > 0){
                $response['status'] = 'true';
                foreach ($getAnggota->result_array() as $row) {
                    $item = array();
                    $item['kd_anggota'] = sha1($row['kd_anggota']);
                    $item['nama'] = $row['nama_anggota'];
                    $item['alamat'] = $row['alamat_anggota'];
                    $item['saldo'] = $this->get_saldo_tabungan($row['no_identitas']);
                }
                $response['data'] = $item;
            }
        }
        echo json_encode($response);
    }
    function get_saldo_tabungan($no_identitas = null){
        if($no_identitas != null){
            $getSaldo = $this->Gmodel->rawQuery("SELECT * FROM tm_tabungan
                                                        INNER JOIN tm_anggota ON tm_anggota.kd_anggota = tm_tabungan.kd_anggota
                                                        WHERE tm_anggota.no_identitas = '".$no_identitas."'");
            if($getSaldo->num_rows() > 0){
                $saldo = 0;
                foreach ($getSaldo->result_array() as $row) {
                    $saldo -= $row['debit'];
                    $saldo += $row['kredit'];
                }
                return $saldo;
            }else{
                return 0;
            }
        }else{
            return 0;
        }
    }
    function tabungan(){
        $data['tableAnggota'] = $this->Gmodel->rawQuery('SELECT * FROM tm_tabungan
                                                            INNER JOIN tm_anggota ON tm_anggota.kd_anggota = tm_tabungan.kd_anggota
                                                            GROUP BY tm_tabungan.kd_anggota');
        $data['view'] = 'main_html/content/form_tabungan';
        $this->load->view('main_html/content', $data);
    }
    function form_simpan_tabungan($kd_anggota = null){
        if($kd_anggota != null){
            $dataSelect['sha1(kd_anggota)'] = $kd_anggota;
            $selectData = $this->Gmodel->select($dataSelect, 'tm_anggota');
            $data['saldo'] = $this->get_saldo_tabungan($selectData->row()->no_identitas);
            $data['data_anggota'] = $selectData;
            $data['view'] = 'main_html/content/form_simpan_tabungan';
            $this->load->view('main_html/content', $data);
        }else{
            echo "No Data";
        }
    }
    function simpan_tabungan(){
        $params = $this->input->post();
        if($params != null){
            $dataInsert['kd_anggota'] = $params['kd_anggota'];
            $dataInsert['debit'] = 0;
            $dataInsert['kredit'] = $params['nominal'];
            $dataInsert['date'] = date('Y-m-d');
            $insertData = $this->Gmodel->insert($dataInsert, 'tm_tabungan');

            if($insertData){
                $selectData = $this->Gmodel->select($dataInsert, 'tm_tabungan');

                $dataSelectAkun['nama'] = 'Simpan';
                $selectDataAkun = $this->Gmodel->select($dataSelectAkun, 'tm_akun');

                $dataInsert = array();
                $dataInsertTabungan['kd_akun'] = $selectDataAkun->row()->kode_akun;
                $dataInsertTabungan['kd_transaksi'] = $selectData->row()->kd_tabungan;
                $dataInsertTabungan['kd_angsuran'] = 0;
                $dataInsertTabungan['keterangan'] = 'Simpan Tabungan '.$params['nama'];
                $dataInsertTabungan['debet'] = 0;
                $dataInsertTabungan['kredit'] = $params['nominal'];
                $dataInsertTabungan['date'] = date('Y-m-d');
                $insertDataTabungan = $this->Gmodel->insert($dataInsertTabungan, 'tt_jurnal_umum');
                if($insertDataTabungan){
                    echo "true";
                }else{
                    echo "false";
                }
            }
        }else{
            echo "false";
        }
    }
    function form_tarik_tabungan($kd_anggota = null){
        if($kd_anggota != null){
            $dataSelect['sha1(kd_anggota)'] = $kd_anggota;
            $selectData = $this->Gmodel->select($dataSelect, 'tm_anggota');
            $data['saldo'] = $this->get_saldo_tabungan($selectData->row()->no_identitas);
            $data['data_anggota'] = $selectData;
            $data['view'] = 'main_html/content/form_tarik_tabungan';
            $this->load->view('main_html/content', $data);
        }else{
            echo "No Data";
        }
    }
    function tarik_tabungan(){
        $params = $this->input->post();
        if($params != null){
            $dataSelectAnggota['kd_anggota'] = $params['kd_anggota'];
            $selectDataAnggota = $this->Gmodel->select($dataSelectAnggota, 'tm_anggota');
            if($params['nominal'] <= $this->get_saldo_tabungan($selectDataAnggota->row()->no_identitas)){
                $dataInsert['kd_anggota'] = $params['kd_anggota'];
                $dataInsert['debit'] = $params['nominal'];
                $dataInsert['kredit'] = 0;
                $dataInsert['date'] = date('Y-m-d');
                $insertData = $this->Gmodel->insert($dataInsert, 'tm_tabungan');

                if($insertData){
                    $selectData = $this->Gmodel->select($dataInsert, 'tm_tabungan');

                    $dataSelectAkun['nama'] = 'Tarik';
                    $selectDataAkun = $this->Gmodel->select($dataSelectAkun, 'tm_akun');

                    $dataInsert = array();
                    $dataInsertTabungan['kd_akun'] = $selectDataAkun->row()->kode_akun;
                    $dataInsertTabungan['kd_transaksi'] = $selectData->row()->kd_tabungan;
                    $dataInsertTabungan['kd_angsuran'] = 0;
                    $dataInsertTabungan['keterangan'] = 'Tarik Tabungan '.$params['nama'];
                    $dataInsertTabungan['debet'] =  $params['nominal'];
                    $dataInsertTabungan['kredit'] = 0;
                    $dataInsertTabungan['date'] = date('Y-m-d');
                    $insertDataTabungan = $this->Gmodel->insert($dataInsertTabungan, 'tt_jurnal_umum');
                    if($insertDataTabungan){
                        echo "true";
                    }else{
                        echo "false";
                    }
                }
            }else{
                echo "false";
            }
        }else{
            echo "false";
        }

    }
    function do_bunga_tabungan(){
        $dateNow = date('Ym');
        $dataSelect['bulantahun'] = $dateNow;
        $selectData = $this->Gmodel->select($dataSelect, 'tt_bunga_tabungan');
        if($selectData->num_rows() > 0){
            echo "false";
        }else{
            // proses tambah bunga nasabah
            $getDataNasabah = $this->Gmodel->rawQuery('SELECT * FROM tm_tabungan
                                                            INNER JOIN tm_anggota ON tm_anggota.kd_anggota = tm_tabungan.kd_anggota
                                                            GROUP BY tm_tabungan.kd_anggota');
            foreach ($getDataNasabah->result_array() as $row) {
                $kdanggota = $row['kd_anggota'];
                $no_identitas = $row['no_identitas'];
                $saldoTabungan = $this->get_saldo_tabungan($no_identitas);
                $bunga = 0.005 * $saldoTabungan;
                $dataInsert['kd_anggota'] = $kdanggota;
                $dataInsert['debit'] = 0;
                $dataInsert['kredit'] = $bunga;
                $dataInsert['date'] = date('Y-m-d');
                $insert = $this->Gmodel->insert($dataInsert, 'tm_tabungan');

                $dataSelectAkun['nama'] = 'Bunga Bank';
                $selectDataAkun = $this->Gmodel->select($dataSelectAkun, 'tm_akun');

                $dataInsertJurnalUmum = array();
                $dataInsertJurnalUmum['kd_akun'] = $selectDataAkun->row()->kode_akun;
                $dataInsertJurnalUmum['kd_transaksi'] = 0;
                $dataInsertJurnalUmum['kd_angsuran'] = 0;
                $dataInsertJurnalUmum['keterangan'] = 'Bunga Bank '.$row['nama_anggota'];
                $dataInsertJurnalUmum['debet'] = $bunga;
                $dataInsertJurnalUmum['kredit'] = 0;
                $dataInsertJurnalUmum['date'] = date('Y-m-d');

                $insertData = $this->Gmodel->insert($dataInsertJurnalUmum, 'tt_jurnal_umum');
            }

            $dataInsertBungaBank['bulantahun'] = $dateNow;
            $dataInsertBungaBank['status'] = 1;
            $insertBungaBank = $this->Gmodel->insert($dataInsertBungaBank, 'tt_bunga_tabungan');
            if($insertBungaBank){
                echo 'true';
            }else{
                echo "false";
            }
        }
    }
    function data_biaya(){
        $getDataBiaya = $this->Gmodel->rawQuery("SELECT * FROM tt_biaya
                                                        INNER JOIN tm_biaya ON tm_biaya.kd_biaya = tt_biaya.kd_biaya");
        $data['data_biaya'] = $getDataBiaya;
        $data['view'] = 'main_html/content/list_biaya';
        $this->load->view('main_html/content', $data);
    }
    function posting_biaya(){
        $getDataBiaya = $this->Gmodel->rawQuery("SELECT * FROM tt_biaya
                                                        INNER JOIN tm_biaya ON tm_biaya.kd_biaya = tt_biaya.kd_biaya");
        foreach ($getDataBiaya->result_array() as $row) {
            if($row['value'] != 0){

                $dataSelectAkun['nama'] = 'Biaya Operasional';
                $selectDataAkun = $this->Gmodel->select($dataSelectAkun, 'tm_akun');

                $dataInsert = array();
                $dataInsert['kd_akun'] = $selectDataAkun->row()->kode_akun;
                $dataInsert['kd_transaksi'] = 0;
                $dataInsert['kd_angsuran'] = 0;
                $dataInsert['keterangan'] = 'Biaya Operasional '.$row['biaya'];
                $dataInsert['debet'] =  $row['value'];
                $dataInsert['kredit'] = 0;
                $dataInsert['date'] = date('Y-m-d');

                $insertData = $this->Gmodel->insert($dataInsert, 'tt_jurnal_umum');
            }
        }
        if($insertData){
            echo "true";
        }else{
            echo "false";
        }
    }
    function buku_besar(){
        $data['data_akun'] = $this->Gmodel->get('tm_akun');
        $data['view'] = 'main_html/content/laporan/buku_besar';
        $this->load->view('main_html/content', $data);
    }
    function do_laporan_buku_besar(){
        $params = $this->input->post();
        if($params != null){
            $getDataJurnalUmum = $this->Gmodel->rawQuery("SELECT * FROM tt_jurnal_umum
                                                                INNER JOIN tm_akun ON tm_akun.kode_akun = tt_jurnal_umum.kd_akun
                                                                WHERE tt_jurnal_umum.date BETWEEN '".$params['datea']."' AND '".$params['dateb']."'
                                                                AND kd_akun = '".$params['akun']."'
                                                                ORDER BY kd_jurnal ASC");
            $data['dataJurnalUmum'] = $getDataJurnalUmum;
            $this->load->view('main_html/content/laporan/data_buku_besar', $data);
        }else{
            echo "NO DATA";
        }
    }
    function getCountPeminjam($tahun = '2016', $bulan = '09'){
        $getData = $this->Gmodel->rawQuery("SELECT * FROM tm_pinjaman
                                                WHERE tm_pinjaman.tanggal_pinjam BETWEEN '".$tahun."-".$bulan."-01' AND '".$tahun."-".$bulan."-31'");
        if($getData->num_rows() > 0){
            $total = 0;
            foreach ($getData->result_array() as $row) {
                $total += $row['jumlah_pinjaman'];
            }
            echo $total;
        }else{
            echo "0";
        }

    }
    function getCountTabungan($tahun = '2016', $bulan = '09'){
        $getData = $this->Gmodel->rawQuery("SELECT * FROM tm_tabungan
                                                WHERE tm_tabungan.date BETWEEN '".$tahun."-".$bulan."-01' AND '".$tahun."-".$bulan."-31'");
        if($getData->num_rows() > 0){
            $total = 0;
            foreach ($getData->result_array() as $row) {
                $total -= $row['debit'];
                $total += $row['kredit'];
            }
            echo $total;
        }else{
            echo "0";
        }

    }
    function getLevel(){
        $getDataLevel = $this->Gmodel->get('tm_level');
        return $getDataLevel;
    }
    function laporan_tabungan(){
        $data['view'] = 'main_html/content/laporan/tabungan';
        $this->load->view('main_html/content', $data);
    }
    function do_laporan_tabungan(){
        $params = $this->input->post();
        // $params['datea'] = '2016-09-01';
        // $params['dateb'] = '2016-09-31';
        if($params != null){
            $getDataTabungan = $this->Gmodel->rawQuery("SELECT * FROM tm_tabungan
                                                            INNER JOIN tm_anggota ON tm_anggota.kd_anggota = tm_tabungan.kd_anggota
                                                            WHERE date BETWEEN '".$params['datea']."' AND '".$params['dateb']."'");
            if($getDataTabungan->num_rows() > 0){
                $data['tableTabungan'] = $getDataTabungan;
                $this->load->view('main_html/content/laporan/data_tabungan', $data);
            }else{
                echo "No Data";
            }
        }else{
            echo "No Data";
        }
    }
    function getDetailAnggota($kdanggota = null, $tipeData = 'pinjaman'){
        if($kdanggota != null){
            if($tipeData == 'pinjaman'){
                $getDataPinjaman = $this->Gmodel->rawQuery("SELECT * FROM tm_pinjaman
                                                                    INNER JOIN tm_anggota ON tm_anggota.kd_anggota = tm_pinjaman.kd_anggota
                                                                    WHERE sha1(tm_anggota.kd_anggota) = '".$kdanggota."'");
                $data['dataPinjaman'] = $getDataPinjaman;
                $this->load->view('main_html/content/laporan/data_pinjaman', $data);
            }else if($tipeData == 'tabungan'){
                $getDataPinjaman = $this->Gmodel->rawQuery("SELECT * FROM tm_tabungan
                                                                    INNER JOIN tm_anggota ON tm_anggota.kd_anggota = tm_tabungan.kd_anggota
                                                                    WHERE sha1(tm_anggota.kd_anggota) = '".$kdanggota."'");
                $data['tableTabungan'] = $getDataPinjaman;
                $this->load->view('main_html/content/laporan/data_tabungan', $data);
            }
        }
    }
    function getRaportAngsuran($kd_pinjaman){
        $dataAngsuran = $this->Gmodel->rawQuery("SELECT * FROM tm_pinjaman
                                                INNER JOIN tt_angsuran ON tt_angsuran.kd_pinjaman = tm_pinjaman.kd_pinjaman
                                                WHERE sha1(tm_pinjaman.kd_pinjaman) = '".$kd_pinjaman."'");
        $data['dataAngsuran'] = $dataAngsuran;
        $this->load->view('main_html/content/laporan/raport_angsuran', $data);
    }
    function batal($kode_pinjaman = null){
        if($kode_pinjaman != null){
            // DELETE JAMINAN
            $dataDelete['sha1(kd_pinjaman)'] = $kode_pinjaman;
            $deleteJaminan = $this->Gmodel->delete($dataDelete, 'tm_jaminan');

            $deleteMaster = $this->Gmodel->delete($dataDelete, 'tm_pinjaman');

            if($deleteMaster){
                echo "true";
            }else{
                echo "false";
            }
        }else{
            echo "false";
        }
    }
    function detail_anggota($kd_anggota = null){
        if($kd_anggota != null){
            $dataSelect['sha1(kd_anggota)'] = $kd_anggota;
            $getDataAnggota = $this->Gmodel->select($dataSelect, 'tm_anggota');
            $data['tableAnggota'] = $getDataAnggota;
            $data['view'] = 'main_html/content/profile_anggota';
            $this->load->view('main_html/content', $data);
        }else{
            echo "No Data";
        }
    }
    function perpanjang_angsuran(){
            $data['view'] = 'main_html/content/form_perpanjangan';
            $this->load->view('main_html/content', $data);
    }
    function getDetailPinjaman(){
        $params = $this->input->post();
        $response = array();
        $response['status'] = false;
        if($params != null){
            $getDataPinjaman = $this->Gmodel->rawQuery("SELECT * FROM tm_pinjaman
                                                                INNER JOIN tm_anggota ON tm_anggota.kd_anggota = tm_pinjaman.kd_anggota
                                                                WHERE no_identitas = '".$params['no_identitas']."'
                                                                AND jenis_pinjaman = 1
                                                                AND status = 0");
            if($getDataPinjaman->num_rows() > 0){
                $response['status'] = 'true';
                $item = array();
                $item['nama'] = $getDataPinjaman->row()->nama_anggota;
                $item['alamat'] = $getDataPinjaman->row()->alamat_anggota;
                $item['no_karyawan'] = $getDataPinjaman->row()->no_karyawan;
                $item['jumlah_pinjaman'] = $getDataPinjaman->row()->jumlah_pinjaman;
                $item['jangka_waktu'] = $getDataPinjaman->row()->jangka_waktu;
                $response['data'] = $item;
            }
        }
        echo json_encode($response);
    }
    function proses_perpanjangan(){
        $params = $this->input->post();
        if($params != null){
            $dataSelect = array();
            $dataSelect['no_identitas'] = $params['no_identitas'];
            $selectData = $this->Gmodel->select($dataSelect, 'tm_anggota');
            $kdanggota = $selectData->row()->kd_anggota;
            $data['kd_anggota'] = $kdanggota;
            $data['view'] = 'main_html/content/step_perpanjangan';
            $this->load->view('main_html/content', $data);
        }else{
            header("location:".base_url('admin/index/perpanjang_angsuran'));
        }
    }
    function do_perpanjang_angsuran(){
        $params = $this->input->post();
        $response = array();
        $response['status'] = 'false';
        if($params != null){
            // get data awal
            $dataSelectDataAwal = $this->Gmodel->rawQuery("SELECT * FROM tm_pinjaman
                                                                INNER JOIN tm_anggota ON tm_anggota.kd_anggota = tm_pinjaman.kd_anggota
                                                                WHERE tm_anggota.kd_anggota = '".$params['kd_anggota']."'
                                                                AND tm_pinjaman.status = 0
                                                                AND tm_pinjaman.jenis_pinjaman = 1");
            if($dataSelectDataAwal->num_rows() > 0){
                // insert histori
                $dataInsertHistori['kd_pinjaman'] = $dataSelectDataAwal->row()->kd_pinjaman;
                $dataInsertHistori['jumlah_pinjaman'] = $dataSelectDataAwal->row()->jumlah_pinjaman;
                $dataInsertHistori['bunga_jasa'] = $dataSelectDataAwal->row()->bunga;
                $dataInsertHistori['jasa'] = $dataSelectDataAwal->row()->jumlah_pinjaman * (3/100);
                $dataInsertHistori['jangka_waktu_awal'] = $dataSelectDataAwal->row()->jangka_waktu;
                $dataInsertHistori['jangka_waktu_perpanjangan'] = $params['jangkaWaktu'];
                $insertHistori = $this->Gmodel->insert($dataInsertHistori, 'tt_perpanjangan_jangka_waktu');
                if ($insertHistori) {
                    // update data awal
                    $dataCondition['kd_pinjaman'] = $dataSelectDataAwal->row()->kd_pinjaman;
                    $dataUpdate['jangka_waktu'] = $dataSelectDataAwal->row()->jangka_waktu + $params['jangkaWaktu'];
                    $updateData = $this->Gmodel->update($dataCondition, $dataUpdate, 'tm_pinjaman');
                    if($updateData){
                        $response['status'] = 'true';
                        $item = array();
                        $item['kd_pinjaman'] = $dataSelectDataAwal->row()->kd_pinjaman;
                        $item['jumlah_pinjaman'] = $dataSelectDataAwal->row()->jumlah_pinjaman;
                        $item['jangka_waktu'] = $dataSelectDataAwal->row()->jangka_waktu + $params['jangkaWaktu'];
                        $item['provision'] = $dataSelectDataAwal->row()->jumlah_pinjaman * (1/100);
                        $item['administrasi'] = $dataSelectDataAwal->row()->jumlah_pinjaman * (2/100);
                        $response['data'] = $item;
                    }
                }
            }
        }
        echo json_encode($response);
    }
    function finish_perpanjangan($kd_pinjaman = null){
        if($kd_pinjaman != null){
            $dataSelectDataPinjaman = $this->Gmodel->rawQuery("SELECT * FROM tm_pinjaman
                                                                INNER JOIN tm_anggota ON tm_anggota.kd_anggota = tm_pinjaman.kd_anggota
                                                                WHERE kd_pinjaman = '".$kd_pinjaman."'
                                                                AND tm_pinjaman.status = 0
                                                                AND tm_pinjaman.jenis_pinjaman = 1");
            if($dataSelectDataPinjaman->num_rows() > 0){
                // insert ke dalam jurnal
                $dataSelectAkun['nama'] = 'Angsuran';
                $selectDataAkun = $this->Gmodel->select($dataSelectAkun, 'tm_akun');

                $dataInsert = array();
                $dataInsert['kd_akun'] = $selectDataAkun->row()->kode_akun;
                $dataInsert['kd_transaksi'] = $dataSelectDataPinjaman->row()->kd_pinjaman;
                $dataInsert['kd_angsuran'] = 0;
                $dataInsert['keterangan'] = 'Biaya Perpanjangan '.$dataSelectDataPinjaman->row()->nama_anggota;
                $dataInsert['debet'] = 0;
                $dataInsert['kredit'] = $dataSelectDataPinjaman->row()->jumlah_pinjaman * (3/100);
                $dataInsert['date'] = date('Y-m-d');
                $insertData = $this->Gmodel->insert($dataInsert, 'tt_jurnal_umum');
                if($insertData){
                    $dataSelectAkun['nama'] = 'Administrasi';
                    $selectDataAkun = $this->Gmodel->select($dataSelectAkun, 'tm_akun');

                    $dataInsertJurnal['kd_akun'] = $selectDataAkun->row()->kode_akun;
                    $dataInsertJurnal['kd_transaksi'] = $dataSelectDataPinjaman->row()->kd_pinjaman;
                    $dataInsertJurnal['kd_angsuran'] = 0;
                    $dataInsertJurnal['keterangan'] = 'Administrasi '.$dataSelectDataPinjaman->row()->nama_anggota;
                    $dataInsertJurnal['debet'] = 0;
                    $dataInsertJurnal['kredit'] = $dataSelectDataPinjaman->row()->jumlah_pinjaman * (2/100);
                    $dataInsertJurnal['date'] = date('Y-m-d');
                    $insertDataJurnal = $this->Gmodel->insert($dataInsertJurnal, 'tt_jurnal_umum');
                    if($insertDataJurnal){
                        $dataSelectAkun['nama'] = 'Provisi';
                        $selectDataAkun = $this->Gmodel->select($dataSelectAkun, 'tm_akun');

                        $dataInsertJurnal['kd_akun'] = $selectDataAkun->row()->kode_akun;
                        $dataInsertJurnal['kd_transaksi'] = $dataSelectDataPinjaman->row()->kd_pinjaman;
                        $dataInsertJurnal['kd_angsuran'] = 0;
                        $dataInsertJurnal['keterangan'] = 'Provisi '.$dataSelectDataPinjaman->row()->nama_anggota;
                        $dataInsertJurnal['debet'] = 0;
                        $dataInsertJurnal['kredit'] = $dataSelectDataPinjaman->row()->jumlah_pinjaman * (1/100);
                        $dataInsertJurnal['date'] = date('Y-m-d');
                        $insertDataJurnal = $this->Gmodel->insert($dataInsertJurnal, 'tt_jurnal_umum');
                        if($insertDataJurnal){
                            echo "true";
                        }else{
                            echo "false";
                        }
                    }else{
                        echo "false";
                    }
                }else{
                    echo "false";
                }
            }else{
                echo "false";
            }
        }else{
            echo "false";
        }
    }
    function getCountJurnal($tipeData = 'debit', $tahun = '2016', $bulan = '09'){
        $getData = $this->Gmodel->rawQuery("SELECT * FROM tt_jurnal_umum
                                                WHERE tt_jurnal_umum.date BETWEEN '".$tahun."-".$bulan."-01' AND '".$tahun."-".$bulan."-31'");
        if($getData->num_rows() > 0){
            $total = 0;
            foreach ($getData->result_array() as $row) {
                $total += $row[$tipeData];
            }
            echo $total;
        }else{
            echo "0";
        }
    }
    function getSaldo($tahun = '2016', $bulan = '09'){
        $getData = $this->Gmodel->rawQuery("SELECT * FROM tt_jurnal_umum
                                                WHERE tt_jurnal_umum.date BETWEEN '".$tahun."-".$bulan."-01' AND '".$tahun."-".$bulan."-31'");
        if($getData->num_rows() > 0){
            $total = 0;
            foreach ($getData->result_array() as $row) {
                $total -= $row['debet'];
                $total += $row['kredit'];
            }
            echo $total;
        }else{
            echo "0";
        }
    }
    function upload_foto(){
        $data['view'] = 'main_html/content/upload_foto';
        $this->load->view('main_html/content', $data);
    }
    function do_upload_foto(){
        $config['upload_path'] = './assets/upload_foto/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['file_name'] = $this->session->userdata('kode_user').".jpg";
        $config['overwrite'] = true;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ( ! $this->upload->do_upload('file'))
        {
            echo "false";
        }
        else
        {
            $dataCondition['sha1(kd_user)'] = $this->session->userdata('kode_user');
            $dataUpdate['foto'] = $this->session->userdata('kode_user').".jpg";
            $update = $this->Gmodel->update($dataCondition, $dataUpdate, 'tm_user');
            echo "true";
        }
    }
    function list_jaminan(){
        $dataSelect['status'] = 0;
        $dataJaminan = $this->Gmodel->select($dataSelect, 'tm_jaminan');
        $data['data'] = $dataJaminan;
        $data['view'] = 'main_html/content/jaminan';
        $this->load->view('main_html/content', $data);
    }
    function update_jaminan($mode = 'tukar'){
        $params = $this->input->post();
        if($params != null){
            $dataCondition['sha1(kd_jaminan)'] = $params['kd_jaminan'];
            if($mode == 'tukar'){
                // if($type == 'bpkb'){
                    $jaminan = $params['jaminan'];
                    $nosurat = $params['no_surat'];
                    $nopol = $params['nopol'];
                    $merk = $params['merk'];
                    $tahun = $params['tahun'];
                    $warna = $params['warna'];
                    $norangka = $params['norangka'];
                    $nomesin = $params['nomesin'];
                    $atasnama = $params['atasnama'];
                    $alamat = $params['alamat'];
                    $status = 0;

                    $dataUpdate['jaminan'] = $jaminan;
                    $dataUpdate['no_surat'] = $nosurat;
                    $dataUpdate['nopol'] = $nopol;
                    $dataUpdate['merk'] = $merk;
                    $dataUpdate['tahun'] = $tahun;
                    $dataUpdate['warna'] = $warna;
                    $dataUpdate['norangka'] = $norangka;
                    $dataUpdate['nomesin'] = $nomesin;
                    $dataUpdate['atasnama'] = $atasnama;
                    $dataUpdate['alamat'] = $alamat;
                    $dataUpdate['status'] = $status;
                // }else if ($type == 'sertifikat'){
                //     $nosurat = $params['nosurat'];
                //     $dataUpdate['jaminan'] = 'sertifikat';
                //     $dataUpdate['no_surat'] = $nosurat;
                // }
            }else if($mode == 'lepas'){
                $dataUpdate['status'] = 1;
            }
            $updateDataJaminan = $this->Gmodel->update($dataCondition, $dataUpdate, 'tm_jaminan');
            if($updateDataJaminan){
                echo "true";
            }else{
                echo "false";
            }
        }else{
            echo "false";
        }
    }
    function detail_jaminan($kode_jaminan = null){
        $response = array();
        $response['status'] = 'false';
        if($kode_jaminan != null){
            $dataSelect['sha1(kd_jaminan)'] = $kode_jaminan;
            $selectData = $this->Gmodel->select($dataSelect, 'tm_jaminan');
            $item = array();
            $item['kd_jaminan'] = $selectData->row()->kd_jaminan;
            $item['jaminan'] = $selectData->row()->jaminan;
            $item['no_surat'] = $selectData->row()->no_surat;
            $item['nopol'] = $selectData->row()->nopol;
            $item['merk'] = $selectData->row()->merk;
            $item['tahun'] = $selectData->row()->tahun;
            $item['warna'] = $selectData->row()->warna;
            $item['norangka'] = $selectData->row()->norangka;
            $item['nomesin'] = $selectData->row()->nomesin;
            $item['atasnama'] = $selectData->row()->atasnama;
            $item['alamat'] = $selectData->row()->alamat;
            $response['data'] = $item;
            $response['status'] = 'true';
        }
        echo json_encode($response);
    }
    function cetak($id = 0, $materai = 0){
        $this->toPdf('main_html/content/perjanjian',$id,$materai);
    }
    function toPdf($view = 'main_html/content/perjanijan', $id = 0, $materai = 0){
        // ob_start();
        $selectData['sha1(kd_user)'] = $this->session->userdata('kode_user');
        $data['detailUser'] = $this->Gmodel->select($selectData, 'tm_user');
        $data['detailPinjaman'] = $this->Gmodel->rawQuery("SELECT * FROM tm_pinjaman
                                                INNER JOIN tm_anggota ON tm_anggota.kd_anggota = tm_pinjaman.kd_anggota
                                                WHERE sha1(kd_pinjaman) = '".$id."'");
        $data['detailJaminan'] = $this->Gmodel->rawQuery("SELECT * FROM tm_jaminan WHERE sha1(kd_pinjaman) = '".$id."' ORDER BY kd_jaminan DESC");
        $selectDataJaminan['sha1(kd_pinjaman)'] = $id;
        // $data['detailJaminan'] = $this->Gmodel->select($selectDataJaminan, 'tm_jaminan');
        $data['materai'] = $materai;
        $this->load->view($view, $data);
        // $html = ob_get_clean();
        // // ob_end_clean();

        // $this->load->library('html2pdf');
        // try
        // {
        //     $html2pdf = new HTML2PDF('P', 'A4', 'en');
        //     $html2pdf->pdf->SetDisplayMode('fullpage');
        //     $html2pdf->writeHTML($html);
        //     $html2pdf->Output('print.pdf');
        // }
        // catch(HTML2PDF_exception $e) {
        //     echo $e;
        //     exit;
        // }

    }
    function testTerbilang($x){
        echo $this->Terbilang($x);
    }
    function Terbilang($x)
    {
      $abil = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
      if ($x < 12)
        return " " . $abil[$x];
      elseif ($x < 20)
        return $this->Terbilang($x - 10) . " belas";
      elseif ($x < 100)
        return $this->Terbilang($x / 10) . " puluh" . $this->Terbilang($x % 10);
      elseif ($x < 200)
        return " seratus" . $this->Terbilang($x - 100);
      elseif ($x < 1000)
        return $this->Terbilang($x / 100) . " ratus" . $this->Terbilang($x % 100);
      elseif ($x < 2000)
        return " seribu" . $this->Terbilang($x - 1000);
      elseif ($x < 1000000)
        return $this->Terbilang($x / 1000) . " ribu" . $this->Terbilang($x % 1000);
      elseif ($x < 1000000000)
        return $this->Terbilang($x / 1000000) . " juta" . $this->Terbilang($x % 1000000);
    }
    public function cetakJaminan($id = 0){
        // ob_start();
        $selectData['sha1(kd_user)'] = $this->session->userdata('kode_user');
        $data['detailUser'] = $this->Gmodel->select($selectData, 'tm_user');
        $data['detailPinjaman'] = $this->Gmodel->rawQuery("SELECT * FROM tm_pinjaman
                                                INNER JOIN tm_anggota ON tm_anggota.kd_anggota = tm_pinjaman.kd_anggota
                                                WHERE sha1(kd_pinjaman) = '".$id."'");
        $selectDataJaminan['sha1(kd_pinjaman)'] = $id;
        $data['detailJaminan'] = $this->Gmodel->rawQuery("SELECT * FROM tm_jaminan WHERE sha1(kd_pinjaman) = '".$id."' ORDER BY kd_jaminan DESC");
        $this->load->view('main_html/content/stjaminan', $data);
        // $html = ob_get_clean();
        // // ob_end_clean();

        // $this->load->library('html2pdf');
        // try
        // {
        //     $html2pdf = new HTML2PDF('P', 'A4', 'en');
        //     $html2pdf->pdf->SetDisplayMode('fullpage');
        //     $html2pdf->writeHTML($html);
        //     $html2pdf->Output('print.pdf');
        // }
        // catch(HTML2PDF_exception $e) {
        //     echo $e;
        //     exit;
        // }
    }
}