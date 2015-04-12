<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account extends CI_Controller {
	function __construct(){
		parent::__construct(); 
			$this->load->library(array('form_validation','session','template'));
			$this->load->model('user_model');
			
	}


	function registrasi()
	{

		$this->form_validation->set_rules('nama_lengkap','Nama','required');
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','required');
		$this->form_validation->set_rules('email','Email','required');

		$this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert">','</div>');
		
		if ($this->form_validation->run() == FALSE) {
		$notif = "<div class='alert alert-danger'>Harus Diisi</div>";
		$this->session->set_flashdata('pesan',$notif);
		redirect(base_url('home'));
		}else{


				$kode_lab = $this->input->post('kode_lab');
				$nama = $this->input->post('nama_lengkap');
				$nim = $this->input->post('nim');
				$username = $this->input->post('username');
				$password = md5($this->input->post('password'));
				$email = $this->input->post('email');
				$lab = $this->input->post('lab');
				$level = "3";
				$status = "belum aktif";
				$date = date("d-m-Y");

				$cekkode = $this->user_model->cek_kode_lab($lab);

				foreach ($cekkode as $key) {
					$kode = $key->kode_lab;
				}


				if (empty($kode)) {
					$notif = "<div class='alert alert-danger'>PILIH LAB !</div>";
					$this->session->set_flashdata('pesan',$notif);
					redirect(base_url('home'));
				}else{

				if ($kode_lab == $kode) {

					$data_baru = array(
								'nama_lengkap' => $nama,
								'username' => $username,
								'password' => $password,
								'nim' => $nim,
								'email' => $email,
								'lab' => $lab,
								'level' => $level,
								'status' => $status,
								'tanggal_daftar' => $date);
					
					$simpan = $this->user_model->proses_registrasi('t_user',$data_baru);

					$notif = "<div class='alert alert-success'>Berhasil mendaftar</div>";
					$this->session->set_flashdata('pesan',$notif);
					redirect(base_url('home'));


				}else{
					$notif = "<div class='alert alert-danger'>Kode lab salah</div>";
					$this->session->set_flashdata('pesan',$notif);
					redirect(base_url('home'));
				}
				}
		}


	}
	function login()
	{
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','required');

		$this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert">','</div>');
		
		if ($this->form_validation->run() == FALSE) {

			redirect(base_url('home'));

		}else{
			
			$username = $this->input->post('username');
			$password = md5($this->input->post('password'));

			$validate = $this->user_model->proses_login($username,$password);

			if ($validate) {
				

			$cek_status = $this->user_model->cek_status_user($username);

			foreach ($cek_status as $data) {
				$status_user = $data->status;
			}

			if ($status_user == "belum aktif") {
				$notif = "<div class='alert alert-danger'>User belum aktif, hubungi admin PPDU</div>";
				$this->session->set_flashdata('pesan',$notif);
				redirect(base_url('home'));
			}elseif ($status_user == "expired") {
				$notif = "<div class='alert alert-danger'>User expired, hubungi admin PPDU</div>";
				$this->session->set_flashdata('pesan',$notif);
				redirect(base_url('home'));
			}elseif($status_user == "aktif"){
				redirect(base_url('home'));
			
			}
			}else{
				$notif = "<div class='alert alert-danger'>Username atau password salah</div>";
				$this->session->set_flashdata('pesan',$notif);
				redirect(base_url('home'));
			}
			

		}

	
	}
	function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('home'));
	}
}