<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	function __construct(){
		parent::__construct(); 
			$this->load->library(array('form_validation','session','template'));
			$this->load->model('user_model');
	}
	
	public function index()
	{
		$cek = $this->session->userdata('status');

		if ( $cek == "aktif") {
				redirect(base_url('user'));	
			}else{
				
				$data['ambil'] = $this->user_model->ambillab();
				$this->load->view('index',$data);
				
			}
		
	}
	
	
	}


