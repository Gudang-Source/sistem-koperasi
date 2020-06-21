<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Anggota extends MX_Controller {
	private $tabel = "tm_anggota";
	function __construct() {
        parent::__construct();
        $this->load->model('Gmodel');
        require_once(APPPATH.'modules/admin/controllers/Index.php');
    }
    function detail($id = 0){
        $dataSelect['sha1(kd_anggota)'] = $id;
        $selectData = $this->Gmodel->select($dataSelect, $this->tabel);
        return $selectData;
    }
    function get($data = array()){
        $selectData = $this->Gmodel->select($data, $this->tabel);
        return $selectData;
    }
    function data($type = 'all'){
        if($type == 'umum'){
            $selectData = $this->Gmodel->rawQuery("SELECT * FROM tm_anggota WHERE no_karyawan IN ('0', '', NULL)");
        }else if($type = 'karyawan'){
            $selectData = $this->Gmodel->rawQuery("SELECT * FROM tm_anggota WHERE CHAR_LENGTH(no_karyawan) > 1");
        }else{            
    	   $selectData = $this->Gmodel->get($this->tabel);
        }
    	return $selectData;
    }
    function add($param = null){
        if($param != null){
            $idx = new Index();
            $params = $param;

            $dataNumRow = $this->Gmodel->rawQuery("SELECT * FROM tm_anggota WHERE tm_anggota.no_karyawan IN ('0', '', NULL)");
            

            $dataSelect['no_identitas'] = $params['noidentitas'];
            $selectData = $this->Gmodel->select($dataSelect, $this->tabel);
            if($selectData->num_rows() < 1){
                $dataInsert = array();
                $totalRow = 0;
                if($params['nokaryawan'] == 0 || $params['nokaryawan'] == null || $params['nokaryawan'] == ''){
                    $totalRow = $dataNumRow->num_rows() + 1;
                }

                $dataInsert['no_anggota'] = $totalRow;
                $dataInsert['nama_anggota'] = $params['nama'];
                $dataInsert['alamat_anggota'] = $params['alamat'];
                $dataInsert['tanggal_lahir'] = $params['tanggallahir'];
                $dataInsert['tanggal_masuk'] = $params['tanggalmasuk'];
                $dataInsert['tanggal_daftar'] = date('Y-m-d');
                $dataInsert['no_identitas'] = $params['noidentitas'];
                $dataInsert['no_karyawan'] = $params['nokaryawan'];
                $dataInsert['kd_user'] = $idx->getKdUser();

                $insertData = $this->Gmodel->insert($dataInsert, $this->tabel);
                if($insertData){
                    return true;
                }
                return false;
            }
            return false;
        }
        return false;
    }
    function delete($id){
    	$params = $id;
    	$dataDelete = array();
    	$dataDelete['sha1(kd_anggota)'] = $params;
    	$deleteData = $this->Gmodel->delete($dataDelete, $this->tabel);
    	if($deleteData){
    		return true;
    	}else{
            return false;
        }
    }
    function update($post = null){
        if($post != null){        
            $params = $post;

            $dataUpdate = array();

            $dataUpdate['nama_anggota'] = $params['nama'];
            $dataUpdate['alamat_anggota'] = $params['alamat'];
            $dataUpdate['tanggal_lahir'] = $params['tanggallahir'];
            $dataUpdate['tanggal_masuk'] = $params['tanggalmasuk'];
            // $dataUpdate['tanggal_daftar'] = $params['tanggal_daftar'];
            $dataUpdate['no_identitas'] = $params['noidentitas'];
            $dataUpdate['no_karyawan'] = $params['nokaryawan'];

            $dataCondition['sha1(kd_anggota)'] = $params['kd_anggota'];

            $updateData = $this->Gmodel->update($dataCondition, $dataUpdate, $this->tabel);

            if($updateData){
                return true;
            }       
            return false;
        }
        return false;
    }
}