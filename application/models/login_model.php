<?php
	class Login_model extends CI_Model{

		function __construct(){
			parent::__construct(); 

		}

		public function validate($username,$password)
        {
		
        
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        
        $query = $this->db->get('t_admin');

        if($query->num_rows == 1)
        {
            $row = $query->row();
            $data = array(
                    'id' => $row->id,
                    'email' => $row->email,
                    'username' => $row->username,
                    'lev' => $row->level,
                    'validated' => true
                    );
            $this->session->set_userdata($data);
            return true;
        }
        return false;
    }
        public function detailAdmin($username)
        {
            $query = $this->db->query("SELECT * FROM t_admin WHERE username = '$username'");
            return $query->result();
        }
   
		}

		
	