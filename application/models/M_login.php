<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_login extends CI_Model
{
  function cek_login($table, $where)
  {
    return $this->db->get_where($table, $where);
  }
  function tampil($table, $where)
  {
    return $this->db->get_where($table, $where);
  }

  function get_AfterLogin($table, $where)
  {
    $this->db->select('*');
    $this->db->from('users_groups usg');
    $this->db->join('user usr', 'usr.id_user = usg.user_id', 'left');
    $this->db->join('tb_group grp', 'grp.id_group = usg.group_id', 'left');
    return $this->db->get_where($table, $where);
  }
}