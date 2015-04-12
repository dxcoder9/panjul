<?php
	class Template{
		protected $_ci;
		function __construct()
		{
			$this->_ci =&get_instance();
		}

		function tampiluser($template,$data=null)
		{
			$data['_content'] = $this->_ci->load->view($template,$data, true);
			$data['_header'] = $this->_ci->load->view('user/main/header',$data, true);
			//$data['_menu'] = $this->_ci->load->view('main/menu',$data, true);
			$data['_sidebar'] = $this->_ci->load->view('user/main/sidebar',$data, true);
			$data['_footer'] = $this->_ci->load->view('user/main/footer',$data, true);
			$this->_ci->load->view('/user/template.php',$data);
		}
		function tampiladmin($template,$data=null)
		{
			$data['_content'] = $this->_ci->load->view($template,$data, true);
			$data['_header'] = $this->_ci->load->view('admin/main/header',$data, true);
			$data['_sidebar'] = $this->_ci->load->view('admin/main/sidebar',$data, true);
			$data['_footer'] = $this->_ci->load->view('admin/main/footer',$data, true);
			$this->_ci->load->view('/admin/template.php',$data);


		}


	}