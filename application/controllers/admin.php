<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
	function __construct(){
		parent::__construct(); 
			$this->load->library('template');
			$this->load->model(array('login_model' , 'admin_model' , 'shift_model'));
		}
	
	public function index()
	{
		$this->load->view('admin/login');	
	}
	public function proses_login()
	{
		
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));

		$hasil = $this->login_model->validate($username,$password);
			
			if (! $hasil) {
				$notif= "<div class='alert alert-danger'>Username atau password salah</div>";
				$this->session->set_flashdata('pesan',$notif);
				redirect('admin');
			}else{
				
				redirect(base_url('admin/home'));
			}	
	}
	public function home()
	{
		if ($this->session->userdata('validated') != 'TRUE' ) {
				redirect(base_url('admin'));
			}

		$data['title'] = "Admin page";
		$username = $this->session->userdata('username');
		$data['detail'] = $this->login_model->detailAdmin($username);



		$this->template->tampiladmin('admin/front/welcome',$data);
	
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('admin'));
	}
	public function tambahadminlab()
	{
		if ($this->session->userdata('validated') != 'TRUE') {
				redirect('admin');
			}
		$data['title'] = "Admin page";
		$username = $this->session->userdata('username');
		$data['detail'] = $this->login_model->detailAdmin($username);
		$data['ambil'] = $this->admin_model->ambillab();
		
		$this->template->tampiladmin('admin/front/add_user',$data);

	}
	
	public function simpandataadmin()
	{
		if ($this->session->userdata('validated') != 'TRUE') {
				redirect(base_url('admin'));
			}

		
	
		$this->form_validation->set_rules('nama_lengkap','Nama','required');
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','required');
		$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('lab','Laboratorium','required');

		$this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert">','</div>');
		
		if ($this->form_validation->run() == FALSE) {
		$notif = "<div class='alert alert-danger'>Harus Diisi</div>";
		$this->session->set_flashdata('pesan',$notif);
		redirect(base_url('admin/tambahadminlab'));
		}else{


			
///bagian upload////
		$config['upload_path'] = './uploads';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '2000';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
		$this->upload->initialize($config);

		

		$this->upload->do_upload('foto');
/*		{
			$error = array('error' => $this->upload->display_errors());

			$this->template->tampiladmin('admin/front/add_user', $error);
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());

			$this->load->view('admin/front/add_user', $data);
		}
*/


			$nama =	$this->input->post('nama_lengkap');
			$username = $this->input->post('username');
			$password = md5($this->input->post('password'));
			$lab = $this->input->post('lab');
			$foto = $this->input->post('foto');
			$email = $this->input->post('email');
			$level = "1";
			$status = "aktif";


//upload///
			$data_baru = array(
				'nama_lengkap' => $nama,
				'username' => $username,
				'password' => $password,
				'email' => $email,
				'lab' => $lab,
				'foto' => $foto,
				'level' => $level,
				'status' => $status);

		
			

			$perintah = $this->admin_model->insertAdmin('t_user',$data_baru);
			
			$notif = "<div class='alert alert-success'>Data berhasil diinputkan</div>";
			$this->session->set_flashdata('pesan',$notif);
			
			redirect(base_url('admin/tambahadminlab'));
		}


		}
		function lihatuser()
		{
			if ($this->session->userdata('validated') != 'TRUE') {
				redirect('admin');
			}
			$data['title'] = "Admin page";
			$username = $this->session->userdata('username');
			$data['detail'] = $this->login_model->detailAdmin($username);
			$data['ambiluser'] = $this->admin_model->ambilsemuauser();
			$this->template->tampiladmin('admin/front/view_user',$data);
		}
		function aktifasiuser($id)
		{
			if ($this->session->userdata('validated') != 'TRUE') {
				redirect(base_url('admin'));
			}
			

			$set = "6";
			$status = "aktif";
			$tanggal_konfirmasi = date('d-m-Y');

			$tanggal_expired = date('d-m-Y',strtotime("+$set month",strtotime($tanggal_konfirmasi)));
			
			$aktif = $this->admin_model->aktifuser($id,$status,$tanggal_expired,$tanggal_konfirmasi);

			if ($aktif) {
				$notif = "<div class='alert alert-success'>User telah aktif</div>";
				$this->session->set_flashdata('pesan',$notif);
				redirect(base_url('admin/lihatuser'));
			}else{
				$notif = "<div class='alert alert-danger'>User gagal aktif</div>";
				$this->session->set_flashdata('pesan',$notif);
				redirect(base_url('admin/lihatuser'));
			}
		}
		function blokiruser($id)
		{
			if ($this->session->userdata('validated') != 'TRUE') {
				redirect(base_url('admin'));
			}
			$status = "blokir";

			$updatestatus = $this->admin_model->blokir($id,$status);
			if ($updatestatus) {

				$notif = "<div class='alert alert-danger'>User diblokir</div>";
				$this->session->set_flashdata('pesan',$notif);
				redirect(base_url('admin/lihatuser'));

				}	else{
					echo "sdas";
				}
		}
		function tambahshift()
		{
			if ($this->session->userdata('validated') != 'TRUE') {
				redirect(base_url('admin'));
			}
			$data['title'] = "Admin page";
			$username = $this->session->userdata('username');
			$data['detail'] = $this->login_model->detailAdmin($username);
			$data['ambillab'] = $this->admin_model->ambillab();
			$data['ambilshift'] = $this->admin_model->ambilshift();
			//$data['ambilshiftuser'] = $this->shift_model->edit();
			$this->template->tampiladmin('admin/front/tambahshift',$data);

		}
		function simpanshift()
		{
			if ($this->session->userdata('validated') != 'TRUE') {
				redirect(base_url('admin'));
			}
			$lab = $this->input->post('lab');
			$shift = $this->input->post('shift');
			$waktu_mulai = $this->input->post('waktu_mulai');
			$waktu_selesai = $this->input->post('waktu_selesai');

			$cek = $this->shift_model->validasishift($lab,$shift,$waktu_mulai,$waktu_selesai);
			if($cek){
				$notif = "<div class='alert alert-danger alert-dismissable'>
						                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
						                    <h4>	<i class='icon fa fa-check'></i> Alert!</h4>
						                    Shift sudah ada
						                  </div>";

				$this->session->set_flashdata('pesan',$notif);
				redirect(base_url('admin/tambahshift'));
			}else{

			$data_baru = array('n_shift' => $shift,
								'waktu_mulai' => $waktu_mulai,
								'waktu_selesai' => $waktu_selesai,
								'lab' => $lab);

			

			$simpan = $this->shift_model->simpan('t_shift',$data_baru);

			if ($simpan) {
				$notif = "<div class='alert alert-success alert-dismissable'>
						                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
						                    <h4>	<i class='icon fa fa-check'></i> Alert!</h4>
						                    Shift berhasil ditambah.
						                  </div>";

				$this->session->set_flashdata('pesan',$notif);
				redirect(base_url('admin/tambahshift'));
			}else{
				$notif = "<div class='alert alert-warning alert-dismissable'>
		                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
		                    <h4><i class='icon fa fa-warning'></i> Alert!</h4>
		                    Gagal menyimpan
		                  </div>";

				$this->session->set_flashdata('pesan',$notif);
				redirect(base_url('admin/tambahshift'));
			}
		}
		}
		function hapusshift($id)
		{
			if ($this->session->userdata('validated') != 'TRUE') {
				redirect(base_url('admin'));
			}
			if (empty($id)) {
				redirect(base_url('admin'));
			}

			$hapus = $this->shift_model->hapus('t_shift',$id,'id_Shift');

			if(!$hapus){
				$notif = "<div class='alert alert-success alert-dismissable'>
						                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
						                    <h4>	<i class='icon fa fa-check'></i> Alert!</h4>
						                    Shift berhasil dihapus.
						                  </div>";

				$this->session->set_flashdata('pesan',$notif);
				redirect(base_url('admin/tambahshift'));
			}else{
				$notif = "<div class='alert alert-warning alert-dismissable'>
		                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
		                    <h4><i class='icon fa fa-warning'></i> Alert!</h4>
		                    Gagal menghapus
		                  </div>";

				$this->session->set_flashdata('pesan',$notif);
				redirect(base_url('admin/tambahshift'));
			}
		}
		function updateshift()
		{
			if ($this->session->userdata('validated') != 'TRUE') {
				redirect(base_url('admin'));
			}
			$lab = $this->input->post('lab');
			$shift = $this->input->post('shift');
			$waktu_mulai = $this->input->post('waktu_mulai');
			$waktu_selesai = $this->input->post('waktu_selesai');
			$id = $this->input->post('id');

			$cek = $this->shift_model->validasishift($lab,$shift,$waktu_mulai,$waktu_selesai);
			if($cek){
				$notif = "<div class='alert alert-danger alert-dismissable'>
						                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
						                    <h4>	<i class='icon fa fa-check'></i> Alert!</h4>
						                    Shift sudah ada
						                  </div>";

				$this->session->set_flashdata('pesan',$notif);
				redirect(base_url('admin/tambahshift'));
			}else{

			$data_baru = array('lab' => $lab,
						'n_shift' => $shift,
						'waktu_selesai' => $waktu_selesai,
						'waktu_mulai' => $waktu_mulai );

			$update = $this->shift_model->update($id,$data_baru);

			if (!$update) {
				$notif = "<div class='alert alert-success alert-dismissable'>
						                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
						                    <h4>	<i class='icon fa fa-check'></i> Alert!</h4>
						                    Shift berhasil diupdate.
						                  </div>";

				$this->session->set_flashdata('pesan',$notif);
				redirect(base_url('admin/tambahshift'));
			}else{
				$notif = "<div class='alert alert-danger alert-dismissable'>
						                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
						                    <h4>	<i class='icon fa fa-check'></i> Alert!</h4>
						                    Shift gagal diupdate.
						                  </div>";

				$this->session->set_flashdata('pesan',$notif);
				redirect(base_url('admin/tambahshift'));
			}

			}
		}

	}

	
	
	


