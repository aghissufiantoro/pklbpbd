<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_kegiatan extends CI_Model
{
    private $_table  = "giat_kel";

    function data($number, $offset)
    {
        $this->db->order_by("tgl_giat_kel", "desc");
        return $query = $this->db->get('giat_kel', $number, $offset)->result();       
    }

    function jumlah_data()
    {
        return $this->db->get('giat_kel')->num_rows();
    }

    // function get_post_by_slug($slug)
    // { 
    //     $hsl = $this->db->query("SELECT * FROM giat_kel WHERE slug_giat_kel = '$slug'");
    //     return $hsl;
    // }

    function get_giat_kel_list($limit, $start)
    {
        $query = $this->db->get('giat_kel', $limit, $start);
        return $query;
    }
    
    // function get_all_post()
    // { 
    //     $hsl = $this->db->query("SELECT * FROM giat_kel ORDER BY slug_giat_kel DESC");
    //     return $hsl;
    // }

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
        return $this->db->get_where($this->_table, ["id_giat_kel" => $id])->row();
    }
}