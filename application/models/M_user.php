<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model
{
    private $_table  = "user";

    public $id_user;
    public $username;
    public $password;
    public $email;
    public $nama_depan;
    public $nama_belakang;
    public $no_telp;

    public function rules()
    {
        return [
            ['field' => 'username',
            'label' => 'Username',
            'rules' => 'required']
        ];
    }

    public function getAll()
    {
        $this->db->select('usr.*, grp.*');
        $this->db->from('users_groups usg');
        $this->db->join('user usr', 'usr.id_user = usg.user_id');
        $this->db->join('tb_group grp', 'grp.id_group = usg.group_id');
        return $this->db->get()->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_user" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();

        $this->username          = strtolower($post['username']);
        $this->password          = md5($post['password']);
        $this->role              = $post['role'];
        $this->email             = $post['email'];
        $this->nama_depan        = ucwords($post['nama_depan']);
        $this->nama_belakang     = ucwords($post['nama_belakang']);
        $this->no_telp           = $post['no_telp'];
        $this->date_created      = date('Y-m-d H:i:s');

        $this->db->insert($this->_table, $this);

        $last_id    = $this->db->insert_id();
        $id_group   = $post['id_group'];

        $this->db->query('INSERT into users_groups(user_id, group_id) VALUES ("'.$last_id.'", "'.$id_group.'")');
    }

    public function update()
    {
        $post = $this->input->post();
        
        $this->id_user           = $post['id_user'];
        $this->username          = $post['username'];
        $this->password          = md5($post['password']);
        $this->email             = $post['email'];
        $this->nama_depan        = ucwords($post['nama_depan']);
        $this->nama_belakang     = ucwords($post['nama_belakang']);
        $this->no_telp           = $post['no_telp'];
        $this->date_updated      = date('Y-m-d H:i:s');

        $this->db->update($this->_table, $this, array('id_user' => $post['id_user']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_user" => $id));
    }

}
