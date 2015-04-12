<?php
	class User_model extends CI_Model{

		function __construct(){
			parent::__construct(); 

		}
        function detailuser($username)
        {
            $query = $this->db->query("SELECT t_user.*, t_lab.* FROM t_user 
                JOIN t_lab
                ON t_lab.id_lab = t_user.lab
                WHERE username = '$username'");
            return $query->result();
        }
        function ambillab()
        {
            $query = $this->db->query("SELECT * FROM t_lab");
            return $query->result();
        }
        function cek_kode_lab($lab)
        {
        	$query = $this->db->query("SELECT * FROM t_lab WHERE id_lab = '$lab'");
        	return $query->result();
        }
        function proses_registrasi($table,$data_baru)
        {
        	$query = $this->db->insert($table,$data_baru);
        	return $query;
        }
        function proses_login($username,$password)
        {
            $this->db->where('username', $username);
            $this->db->where('password', $password);
            
            $query = $this->db->get('t_user');

            if($query->num_rows == 1)
            {
                $row = $query->row();
                $data = array(
                        'id' => $row->id_user,
                        'email' => $row->email,
                        'username' => $row->username,
                        'level' => $row->level,
                        'status' => $row->status,
                        'lab' => $row->lab,
                        'valid' => true
                        );
                $this->session->set_userdata($data);
                return true;
            }
            return false;
        }
        function cek_status_user($username)
        {
            $query = $this->db->query("SELECT * FROM t_user where username = '$username'");
            return $query->result();
        }
        function get($table)
        {
            $query = $this->db->query("SELECT * FROM $table");
            return $query->result();
        }

    }