<?php
	class Shift_model extends CI_Model{

		function simpan($table,$data_baru)
        {

            $query = $this->db->insert($table,$data_baru);
            return $query;
        }
		function hapus($table,$id,$par)
        {
            $this->db->where($par, $id);
            $this->db->delete($table); 

        }
        function ambilShiftUser($id)
        {
           
	        $query = $this->db->query("SELECT * FROM t_shift
                WHERE id_shift = '$id' 
                ORDER BY id_shift ASC");
	        return $query->result();
            
        }
        function validasishift($lab,$shift,$waktu_mulai,$waktu_selesai)
        {
        	$query = $this->db->query("SELECT * FROM t_shift
        		WHERE lab = '$lab' 
        		AND n_shift = '$shift'
        		AND waktu_mulai = '$waktu_mulai'
        		AND waktu_selesai = 'waktu_selesai'
        		");
        	return $query->result();
        }
        function update($id,$data_baru)
        {
        	$this->db->where('id_shift', $id);
			$this->db->update('t_shift', $data_baru); 

        }

 }