<?php
	class Bap_model extends CI_Model{
	function simpan($table,$data_baru)
	{
		return $this->db->insert($table,$data_baru);

	}
	function hapus($table,$id_presensi,$parameter)
	{
		$this->db->where($parameter, $id_presensi);
		$this->db->delete($table); 
	}
	function update($table,$status,$id_presensi)
	{
		$data_baru = array('status' => $status );
		$this->db->where('id_presensi', $id_presensi);
		$this->db->update($table, $data_baru); 

	}
	function ambil($table,$parameter,$value)
	{
		$this->db->select('*');
		$this->db->where($parameter,$value);
		$this->db->order_by($parameter,'asc');
		$query = $this->db->get($table);

		return $query->result();

	}
	function ambilsemua($id_user,$status)
	{	

		$this->db->select('*');
		
		$this->db->where('user', $id_user);
		$this->db->where('status', $status);
		$query = $this->db->get('t_presensi');

		return $query->result();

	}
	function ambiljoin($table,$parameter,$value)
	{
		$this->db->select('*');
		
		$this->db->join('t_user', 't_bap.user_id = t_user.id_user');

		$this->db->where($parameter,$value);
		$this->db->order_by($parameter,'asc');
		$query = $this->db->get($table);

		return $query->result();
	}
	
}