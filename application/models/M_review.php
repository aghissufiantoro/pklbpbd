<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_review extends CI_Model {

	private $_table  = "review";

	public function getAll()
	{
		return $this->db->get($this->_table)->result();
	}

	public function getById($id)
	{
		return $this->db->get_where($this->_table, ["id" => $id])->row();
	}

	public function delete($id)
	{
		return $this->db->delete($this->_table, array("id" => $id));
	}
	public function insert_review($data) {
		return $this->db->insert('review', $data);
	}

	public function get_reviews() {
		$this->db->where('tampilkan', 1);
		$query = $this->db->get('review');
		return $query->result();
	}

	public function update_review($id, $data) {
		$this->db->where('id', $id);
		return $this->db->update($this->_table, $data);
	}
}

