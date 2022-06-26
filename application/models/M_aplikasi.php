<?php
class M_aplikasi extends CI_Model
{
	public function insert($data)
	{
		$this->db->insert('data', $data);
	}

	public function getData()
	{
		return $this->db->get('data')->result();
	}

	public function update($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->set($data);
		$this->db->update('data');
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('data');
	}
}
