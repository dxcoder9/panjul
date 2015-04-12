<?php
	class Jadwal_model extends CI_Model{

		function __construct(){
			parent::__construct(); 

		}
		function simpan($table,$data_baru)
        {

        	$query = $this->db->insert($table,$data_baru);
        	return $query;
        }
        function ambiljadwal($id)
        {
        	$query = $this->db->query("SELECT t_jadwal.*, t_shift.*, t_hari.* FROM t_jadwal 
        		JOIN t_shift
        		ON t_shift.id_shift = t_jadwal.shift 
        		JOIN t_hari
        		ON t_hari.id_hari = t_jadwal.hari
                    	 WHERE id_user = '$id' 
                         ORDER BY hari,shift asc");
        	return $query->result();
        }
        function cekjadwal($hari1,$shift1,$id_user)
        {
                $query = $this->db->query("SELECT * FROM t_jadwal WHERE id_user = '$id_user' AND hari = '$hari1' AND shift = '$shift1'");
                return $query->result();
        }
         function getwhere($table,$lab)
        {
            $query = $this->db->query("SELECT * FROM $table WHERE lab = '$lab'");
            return $query->result();
        }
        function get($table)
        {
            $query = $this->db->query("SELECT * FROM $table");
            return $query->result();
        }
        function hapus($table,$par)
        {
            $query = $this->db->query("DELETE FROM t_jadwal WHERE id_jadwal = '$par'");
            return $query;
        }
        function editjadwal($id)
        {
            $query = $this->db->query("SELECT t_jadwal.*, t_shift.*, t_hari.* FROM t_jadwal 
                JOIN t_shift
                ON t_shift.id_shift = t_jadwal.shift 
                JOIN t_hari
                ON t_hari.id_hari = t_jadwal.hari
                         WHERE id_jadwal = '$id' ");
            return $query->result();
        }
        function updatejadwal($hari1,$shift1,$id)
        {
            $query = $this->db->query("UPDATE t_jadwal SET shift = '$shift1' , hari = '$hari1' WHERE id_jadwal = '$id';");
            return $query;
        }





	}
	