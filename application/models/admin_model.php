<?php
	class Admin_model extends CI_Model{

		function __construct(){
			parent::__construct(); 

		}
        function simpan($table,$data_baru)
        {

            $query = $this->db->insert($table,$data_baru);
            return $query;
        }
        function ambillab()
        {
            $query = $this->db->query("SELECT * FROM t_lab");
            return $query->result();
        }
        function ambilshift()
        {
            $query =$this->db->query("SELECT t_shift.*, t_lab.* 
                                        FROM t_shift
                                        JOIN t_lab
                                        ON t_lab.id_lab = t_shift.lab
                                        ORDER BY lab ASC");
            return $query->result();
        }

        function insertAdmin($table,$data_baru)
        {
            $this->db->insert($table,$data_baru);
        }
        function fetch_image($path)
        {
            $this->load->helper('file');
            return get_filenames($path);
        }
        function ambilsemuauser()
        {
            $query = $this->db->query("SELECT t_user.*, t_level.*, t_lab.*
                    FROM t_user
                        JOIN t_level
                            ON t_level.id_level = t_user.level
                        JOIN t_lab
                            ON t_lab.id_lab = t_user.lab");
            return $query->result();
        }
        function aktifuser($id,$status,$tanggal_expired,$tanggal_konfirmasi)
        {
            $query = $this->db->query("UPDATE `t_user` SET 
                `status` = '$status', `tanggal_expired` = '$tanggal_expired', tanggal_konfirmasi = '$tanggal_konfirmasi' WHERE `id_user` = '$id'");
            return $query;
        }
        function blokir($id,$status)
        {
            $query = $this->db->query("UPDATE `t_user` SET 
                `status` = '$status' WHERE `id_user` = '$id'");
            return $query;
        }
        
   
}

		
	