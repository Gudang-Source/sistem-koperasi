<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Users extends MX_Controller {
	private $tabel = "tm_user";
	function __construct() {
        parent::__construct();
        $this->load->model('Gmodel');
    }
    function detail($id = 0){
        $dataSelect['sha1(kd_user)'] = $id;
        $selectData = $this->Gmodel->select($dataSelect, $this->tabel);
        return $selectData;
    }
    function data(){
        $selectData = $this->Gmodel->get($this->tabel);
        return $selectData;
    }
    function add($param = null){
        if($param != null){
            $params = $param;

            $dataSelect['no_identitas'] = $params['no_identitas'];
            $selectData = $this->Gmodel->select($dataSelect, $this->tabel);
            if($selectData->num_rows() < 1){
                $dataInsert = array();

                $dataInsert['nama'] = $params['nama'];
                $dataInsert['alamat'] = $params['alamat'];
                $dataInsert['tanggal_lahir'] = $params['tanggal_lahir'];
                $dataInsert['tanggal_masuk'] = $params['tanggal_masuk'];
                $dataInsert['no_identitas'] = $params['no_identitas'];
                $dataInsert['no_hp'] = $params['no_hp'];
                $dataInsert['username'] = $params['username'];
                $dataInsert['password'] = md5($params['password']);
                $dataInsert['kd_level'] = $params['level'];

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
        $dataDelete['sha1(kd_user)'] = $params;
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

            $dataUpdate['nama'] = $params['nama'];
            $dataUpdate['alamat'] = $params['alamat'];
            $dataUpdate['tanggal_lahir'] = $params['tanggal_lahir'];
            $dataUpdate['tanggal_masuk'] = $params['tanggal_masuk'];
            $dataUpdate['no_identitas'] = $params['no_identitas'];
            $dataUpdate['no_hp'] = $params['no_hp'];
            $dataUpdate['username'] = $params['username'];
            // $dataUpdate['password'] = md5($params['password']);
            // $dataUpdate['kd_level'] = $params['kd_level'];

            $dataCondition['sha1(kd_user)'] = $params['kd_user'];

            $updateData = $this->Gmodel->update($dataCondition, $dataUpdate, $this->tabel);

            if($updateData){
                return true;
            }       
            return false;
        }
        return false;
    }
}