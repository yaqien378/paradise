<?php  
/**
* 
*/
class M_Hasil_Lab extends CI_Model
{
	public function get(array $cond)
	{
		$this->db->select("*");
		$this->db->from("hasil_lab");
		$this->db->join("pemeriksaan_lab", "hasil_lab.id_lab = pemeriksaan_lab.id_lab");
		$this->db->join("rekam_medis", "hasil_lab.id_rekam_medis = rekam_medis.id_rekam_medis");
		$this->db->join("pasien", "rekam_medis.id_pasien = pasien.id_pasien");
		$this->db->join("dokter", "rekam_medis.id_dokter = dokter.id_dokter");
		$this->db->where($cond);
		$this->db->order_by("rekam_medis.tgl_periksa", "desc");
		return $this->db->get()->result();
	}

	public function create(array $value)
	{
		return $this->db->insert('hasil_lab', $value);
	}

	public function patch(array $cond, array $value)
	{
		$this->db->where($cond);
		return $this->db->update('hasil_lab', $value);
	}

	public function remove(array $cond)
	{	
		$this->db->where($cond);
		return $this->db->delete('hasil_lab');
	}
}
?>