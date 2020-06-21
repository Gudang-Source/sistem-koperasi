<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MX_Controller {

	function __construct() {

        parent::__construct();

        $this->load->model('Gmodel');

        $this->isLoggedIn();

    }

    function isLoggedIn(){

    	if($this->session->userdata('loggedin') == true){

    		header("location:".base_url('admin/index'));

    	}

    }

    function index(){

		$this->load->view('main_html/login');

    }

    function do_login(){

        $params = $this->input->post();

        if($params != null){

            $dataSelect['username'] = $params['username'];

            $dataSelect['password'] = md5($params['password']);

            $selectData = $this->Gmodel->select($dataSelect, 'tm_user');

            if($selectData->num_rows() > 0){

                $dataSession = array();

                $dataSession['loggedin'] = true;

                $dataSession['nama'] = $selectData->row()->nama;

                $dataSession['kode_user'] = sha1($selectData->row()->kd_user);

                $dataSession['level'] = $selectData->row()->kd_level;

                $this->session->set_userdata($dataSession);

                // $this->isLoggedIn();

                echo 'true';

            }else{

                echo 'false';

                // header("location:".base_url('admin/login'));

            }

        }else{

            echo 'false';

        }

    }

}