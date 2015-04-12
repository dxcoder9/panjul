<?php
	class Presensi_model extends CI_Model{
	function simpan($table,$data_baru)
    {
        $query = $this->db->insert($table,$data_baru);
        return $query;
    }
    function update($table,$data_baru,$parameter,$value)
    {
        $this->db->where($parameter, $value);
        return $this->db->update($table, $data_baru); 

    }
    function cekjadwal($id,$hari)
        {
            $jam = date("H:i");
        	$query = $this->db->query("SELECT t_jadwal.*, t_shift.*, t_hari.* FROM t_jadwal 
        		JOIN t_shift
        		ON t_shift.id_shift = t_jadwal.shift 
        		JOIN t_hari
        		ON t_hari.id_hari = t_jadwal.hari
                    	 WHERE id_user = '$id' AND day = '$hari' 
                         AND '$jam' >= waktu_mulai AND '$jam' < waktu_selesai
                         ORDER BY hari,shift asc");
        	return $query->result();
        }
    function cekpresensi($id,$tanggal_sekarang)
    {
        $jam = date("H:i");
        $query = $this->db->query("SELECT t_presensi.*,t_jadwal.*, t_shift.* 
            FROM t_presensi 
            JOIN t_jadwal 
            ON t_jadwal.id_jadwal = t_presensi.jadwal
            JOIN t_shift
            ON t_jadwal.shift = t_shift.id_shift
         WHERE user = '$id'
         AND tanggal_presensi = '$tanggal_sekarang'
         AND '$jam' >= waktu_mulai AND '$jam' < waktu_selesai");
        return $query->result();
    }
    function ambildata($id_presensi)
    {
        $query = $this->db->query("SELECT * FROM t_presensi WHERE id_presensi = '$id_presensi'");
        return $query->result();
    }
}