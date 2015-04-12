<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Nyobo extends CI_Controller {
function __construct(){
		parent::__construct(); 
		 
		 $this->load->library('template');
		}
	public function index()
	{
		$this->template->tampiladmin('admin/front/cobo');
	}
	public function upload()
	{
		$config['upload_path'] = './uploads';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '2000';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
		$this->upload->initialize($config);

		 $this->upload->do_upload('foto');
		
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */