<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_artikel extends CI_Model
{
    private $_table  = "artikel";

    function data($number, $offset)
    {
        $this->db->order_by("tgl_artikel", "desc");
        return $query = $this->db->get('artikel', $number, $offset)->result();       
    }
function artikel()
{
    $this->db->select('*');
    $this->db->from('artikel');

    return $this->db->get()->num_rows();
}
    function jumlah_data()
    {
        return $this->db->get('artikel')->num_rows();
    }

    function get_post_by_slug($slug)
    { 
        $hsl = $this->db->query("SELECT * FROM artikel WHERE slug_artikel = '$slug'");
        return $hsl;
    }

    function get_artikel_list($limit, $start)
    {
        $query = $this->db->get('artikel', $limit, $start);
        return $query;
    }
    
    function get_all_post()
    { 
        $hsl = $this->db->query("SELECT * FROM artikel ORDER BY slug_artikel DESC");
        return $hsl;
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getAllHasilSurvey()
    {
        return $this->db->get($this->_table1)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_artikel" => $id])->row();
    }
    
}