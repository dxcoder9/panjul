<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {
	function __construct(){
		parent::__construct(); 
			$this->load->library(array('template','encrypt','fpdf'));
			$this->load->model(array('login_model','user_model','jadwal_model','presensi_model','bap_model' ));

		}
	
		function index()
		{ 
			if ( $this->session->userdata('status') != "aktif") {				
			redirect(base_url('home'));
			}
				if ($this->session->userdata('status') == "aktif") {				
					$username = $this->session->userdata('username');
					$data['detail'] = $this->user_model->detailuser($username);
					if ($this->session->userdata('level') == "3") {
						$data['title'] = "Asisten page";
					}elseif($this->session->userdata('level') == "2"){
						$data['title'] = "Adminlab page";
					}
					$this->template->tampiluser('user/welcome',$data);
		
			}else{
			redirect(base_url('home'));
			}
			
		
	}
	function inputjadwaljaga()
	{
		if ( $this->session->userdata('status') != "aktif") {				
			redirect(base_url('home'));
			}

					$username = $this->session->userdata('username');
					$data['detail'] = $this->user_model->detailuser($username);
					if ($this->session->userdata('level') == "3") {
						$data['title'] = "Asisten page";
					}elseif($this->session->userdata('level') == "2"){
						$data['title'] = "Adminlab page";
					}
					$this->template->tampiluser('user/front/input_jadwaljaga',$data);

	}
	function inputmanual()
	{
		if ( $this->session->userdata('status') != "aktif") {				
			redirect(base_url('home'));
			}

			$username = $this->session->userdata('username');
			$data['detail'] = $this->user_model->detailuser($username);
			if ($this->session->userdata('level') == "3") {
			$data['title'] = "Asisten page";
			}elseif($this->session->userdata('level') == "2"){
			$data['title'] = "Adminlab page";
			}

			$id = $this->session->userdata('id');
			$lab = $this->session->userdata('lab');

			$data['ambiljadwal'] = $this->jadwal_model->ambiljadwal($id);

			$data['ambilhari'] = $this->jadwal_model->get('t_hari');
			$data['ambilshift'] = $this->jadwal_model->getwhere('t_shift',$lab);
			$this->template->tampiluser('user/front/input_jadwal_manual',$data);

	}
	function addjadwal()
	{
		if ( $this->session->userdata('status') != "aktif") {				
			redirect(base_url('home'));
			}
			$id_user = $this->session->userdata('id');
			$lab = $this->session->userdata('lab');
			$hari = "1";
			$shift = "1";

			$data_baru = array(
								'id_user' => $id_user,
								'hari' => $hari,
								'shift' => $shift,
								'lab' => $lab,
								);
			$simpan = $this->jadwal_model->simpan('t_jadwal',$data_baru);

	}
	function simpanjadwal()
	{
		if ( $this->session->userdata('status') != "aktif") {				
			redirect(base_url('home'));
			}
			
			$hari = $this->input->post('hari');
			$shift = $this->input->post('shift');
			
				
				//ketika datakosong
				if (empty($shift) OR empty($hari)) {
					redirect(base_url('user'));
				}else{

					for ($i=0; $i < count($hari); $i++) { 
						
					
							
							//validasi jadwal kembar
							$hari1 = $hari[$i];
							$shift1 = $shift[$i];
							$id_user = $this->session->userdata('id');
							$validasi = $this->jadwal_model->cekjadwal($hari1,$shift1,$id_user);

							

							if($validasi){

								$notif = "<div class='alert alert-warning alert-dismissable'>
						                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
						                    <h4><i class='icon fa fa-warning'></i> Alert!</h4>
						                    Jadwal Sudah Ada !
						                  </div>";
								$this->session->Set_flashdata('pesan',$notif);
								redirect(base_url('user/inputmanual'));
							}else{
								for ($z=0; $z < count($hari); $z++) { 
									
								$data_baru = array('hari' => $hari[$z],
								'shift' => $shift[$z],
								'id_user' => $this->session->userdata('id'),
								'lab' => $this->session->userdata('lab') );	
								
								$simpan = $this->jadwal_model->simpan('t_jadwal',$data_baru);
							}
								if ($simpan) {
									$notif = "<div class='alert alert-success alert-dismissable'>
							                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
							                    <h4>	<i class='icon fa fa-check'></i> Alert!</h4>
							                    Jadwal Berhasil Diinput.
							                  </div>";
									$this->session->Set_flashdata('pesan',$notif);
									redirect(base_url('user/inputmanual'));
								}else{
									$notif = "<div class='alert alert-danger'>Jadwal gagal diinput</div>";
									$this->session->Set_flashdata('pesan',$notif);
									redirect(base_url('user/inputmanual'));
								}
							}
						}
				
			
			}
			
	}
	function hapusjadwal($id)
	{
		if ( $this->session->userdata('status') != "aktif") {				
			redirect(base_url('home'));
			}
		
		if (empty($id)) {
			redirect(base_url('user'));
		}else{

			$this->jadwal_model->hapus('t_shift',$id);
			$notif = "<div class='alert alert-success alert-dismissable'>
							                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
							                    <h4>	<i class='icon fa fa-check'></i> Alert!</h4>
							                    Jadwal Berhasil Dihapus.
							                  </div>";
			$this->session->Set_flashdata('pesan',$notif);
			redirect(base_url('user/inputmanual'));
		}
	}
	function updatejadwal($id)
	{
		if ( $this->session->userdata('status') != "aktif") {				
			redirect(base_url('home'));
			}

		$hari1 = $this->input->post('hari');
		$shift1 = $this->input->post('shift');
		$id_user = $this->session->userdata('id');

		$validasi = $this->jadwal_model->cekjadwal($hari1,$shift1,$id_user);

		if ($validasi) {
			$notif = "<div class='alert alert-warning alert-dismissable'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <h4><i class='icon fa fa-warning'></i> Alert!</h4>
                    Jadwal Sudah Ada !
                  </div>";
			$this->session->Set_flashdata('pesan',$notif);
			redirect(base_url('user/inputmanual'));
		}else{

		$this->jadwal_model->updatejadwal($hari1,$shift1,$id);
		$notif = "<div class='alert alert-success alert-dismissable'>
						                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
						                    <h4>	<i class='icon fa fa-check'></i> Alert!</h4>
						                    Jadwal Berhasil Diupdate.
						                  </div>";
		$this->session->Set_flashdata('pesan',$notif);
		redirect(base_url('user/inputmanual'));
		}

	}
	function presensi()
	{
		if ( $this->session->userdata('status') != "aktif") {				
			redirect(base_url('home'));
			}
				if ($this->session->userdata('status') == "aktif") {				
					$username = $this->session->userdata('username');
					$data['detail'] = $this->user_model->detailuser($username);
					if ($this->session->userdata('level') == "3") {
						$data['title'] = "Asisten page";
					}elseif($this->session->userdata('level') == "2"){
						$data['title'] = "Adminlab page";
					}
					$id = $this->session->userdata('id');

					date_default_timezone_set('Asia/Jakarta');
					$hari = date('l');
					$jam_sekarang = date("H:i");
					$tanggal_sekarang = date("d-m-Y");

					$cekjadwal = $this->presensi_model->cekjadwal($id,$hari);

					if (!$cekjadwal) {
						echo "<script>alert('ente ga ada jaga !');history.go(-1);</script>";
					}else{
				

				
						
						$data['cekjadwal'] = $this->presensi_model->cekjadwal($id,$hari);
						$data['cekpresensi'] = $this->presensi_model->cekpresensi($id,$tanggal_sekarang);

						$this->template->tampiluser('user/front/hal_absensi',$data);

						
					
					}
						}else{
						redirect(base_url('home'));
						}



	}
	function prosespresensi()
	{
		if ( $this->session->userdata('status') != "aktif") {				
			redirect(base_url('home'));
			}
		$id = $this->session->userdata('id');

		$kelas = $this->input->post('kelas');
		$kelompok = $this->input->post('kelompok');
		$judul_praktikum = $this->input->post('judul_praktikum');
		$kehadiran = $this->input->post('kehadiran');
		$status = "belum dikirim";


		
		if (empty($status)) {
			redirect(base_url('user'));
		}else{


		date_default_timezone_set('Asia/Jakarta');
		$jam_sekarang = date("H:i");
		$hari = date("l");
		$tanggal = date("d-m-Y");

		$cekjadwal = $this->presensi_model->cekjadwal($id,$hari);
		foreach ($cekjadwal as $key) {
			
				$waktu_mulai = $key->waktu_mulai;
				$waktu_selesai = $key->waktu_selesai;
				
				$id_jadwal = $key->id_jadwal;
		
			
		}

		$data_baru = array('user' => $id,
							'jadwal' => $id_jadwal,
							'kelas' => $kelas,
							'kelompok' => $kelompok,
							'judul_praktikum' => $judul_praktikum,
							'kehadiran' => $kehadiran,
							'waktu_presensi' => $jam_sekarang,
							'tanggal_presensi' => $tanggal,
							'status' => $status);

		$simpanpresensi = $this->presensi_model->simpan('t_presensi',$data_baru);

		if ($simpanpresensi) {
			$notif = "<div class='alert alert-success alert-dismissable'>
						                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
						                    <h4>	<i class='icon fa fa-check'></i> Alert!</h4>
						                    Presensi sukses.
						                  </div>";
			$this->session->Set_flashdata('pesan',$notif);
			redirect(base_url('user/presensi'));
		}
	}

	}
	function updatepresensi()
	{
		if ( $this->session->userdata('status') != "aktif") {				
			redirect(base_url('home'));
			}

		$id_presensi = $this->input->post('id_presensi');
		$kelas = $this->input->post('kelas');
		$kelompok = $this->input->post('kelompok');
		$judul_praktikum = $this->input->post('judul_praktikum');

		if (empty($kelas)) {
			redirect(base_url('user'));
		}else{

			$data_baru = array('kelas' => $kelas,
								'kelompok' => $kelompok,
								'judul_praktikum' => $judul_praktikum );

			$perbarui = $this->presensi_model->update('t_presensi',$data_baru,'id_presensi',$id_presensi);

			if ($perbarui) {
				$notif = "<div class='alert alert-success alert-dismissable'>
							                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
							                    <h4>	<i class='icon fa fa-check'></i> Alert!</h4>
							                    Update BAPP sukses.
							                  </div>";
				$this->session->Set_flashdata('pesan',$notif);
				redirect(base_url('user/presensi'));
			}else{
				$notif = "<div class='alert alert-danger alert-dismissable'>
							                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
							                    <h4>	<i class='icon fa fa-check'></i> Alert!</h4>
							                    Update BAPP gagal.
							                  </div>";
				$this->session->Set_flashdata('pesan',$notif);
				redirect(base_url('user/presensi'));
			}
		}

	}
	function cekbap()
	{
		if ( $this->session->userdata('status') != "aktif") {				
			redirect(base_url('home'));
			}

				if ($this->session->userdata('status') == "aktif") {				
					$username = $this->session->userdata('username');
					$data['detail'] = $this->user_model->detailuser($username);
					if ($this->session->userdata('level') == "3") {
						$data['title'] = "Asisten page";
					}elseif($this->session->userdata('level') == "2"){
						$data['title'] = "Adminlab page";
					}
				}
		$id_user = $this->session->userdata('id');
		$status = "belum dikirim";
		$data['ambilbap'] = $this->bap_model->ambilsemua($id_user,$status);
		$this->template->tampiluser('user/front/cek_bap',$data);		
	}
	function kirimbap()
	{
		if ( $this->session->userdata('status') != "aktif") {				
			redirect(base_url('home'));
			}
		$id_user = $this->session->userdata('id');
		$id_presensi = $this->input->post('id_presensi');
		$data_bap = implode(",", $id_presensi);

		$honor = $this->input->post('honor');

		$tanggal_pengajuan = date("d-m-Y");
		$waktu_pengajuan = date("H:i");
		$status = "belum acc";

		if (empty($honor)) {
			redirect(base_url('user'));
		}else{

			$data_baru = array(	'user_id' => $id_user,
								'data_bap' => $data_bap,
								'honor' => $honor,
								'tanggal_pengajuan' => $tanggal_pengajuan,
								'waktu_pengajuan' => $waktu_pengajuan,
								'status_bap' => $status );

			$simpanbap = $this->bap_model->simpan('t_bap',$data_baru);

			if ($simpanbap) {
				
				
				for ($d=0; $d < count($id_presensi); $d++) { 
					
				$status = "sudah dikirim";	
				$updatepresensi = $this->bap_model->update('t_presensi',$status,$id_presensi[$d]);
				
				}
				$notif = "<div class='alert alert-success alert-dismissable'>
							                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
							                    <h4>	<i class='icon fa fa-check'></i> Alert!</h4>
							                    BAP sukses dikirim.
							                  </div>";
				$this->session->Set_flashdata('pesan',$notif);
				redirect(base_url('user/cekbap'));


			}else{
				$notif = "<div class='alert alert-danger alert-dismissable'>
							                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
							                    <h4>	<i class='icon fa fa-check'></i> Alert!</h4>
							                    BAP tidak dikirim.
							                  </div>";
				$this->session->Set_flashdata('pesan',$notif);
				redirect(base_url('user/bap'));
			}
		}
	}
	function lihatbap()
	{
		if ( $this->session->userdata('status') != "aktif") {				
			redirect(base_url('home'));
			}

				if ($this->session->userdata('status') == "aktif") {				
					$username = $this->session->userdata('username');
					$data['detail'] = $this->user_model->detailuser($username);
					if ($this->session->userdata('level') == "3") {
						$data['title'] = "Asisten page";
					}elseif($this->session->userdata('level') == "2"){
						$data['title'] = "Adminlab page";
					}
				}
			$id_user = $this->session->userdata('id');

			$ambilbap = $this->bap_model->ambil('t_bap','user_id',$id_user);
		if (!$ambilbap) {
			$this->template->tampiluser('user/front/lihat_bap',$data);
		}else{
			foreach ($ambilbap as $key) {
				$data_presensi = $key->data_bap;
				$explodepresensi = explode(",", $data_presensi);
			}
			
			for ($d=0; $d < count($explodepresensi); $d++) { 
				$data['ambildatapresensi'][] = $this->bap_model->ambil('t_presensi','id_presensi',$explodepresensi[$d]);		
			}

			$data['ambilbap'] = $this->bap_model->ambiljoin('t_bap','user_id',$id_user);

			$this->template->tampiluser('user/front/lihat_bap',$data);
		}
		
	}
	function cetakbap()
		{

		$data['no'] = $this->input->post('no');
		$data['tanggal_praktikum'] = $this->input->post('tanggal_presensi');
		$data['kelas'] = $this->input->post('kelas');
		$data['deskripsi'] = $this->input->post('deskripsi');
		$data['pengajuan'] = $this->input->post('pengajuan');
		
		$data['honor'] = $this->input->post('honor');
		$data['nama_lengkap'] = $this->input->post('nama');


			define('FPDF_FONTPATH',$this->config->item('fonts_path'));
        
         $this->load->view('laporanpdf',$data);
		}
}