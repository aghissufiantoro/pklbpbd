<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{
    private $filename = "import_data";

    public function __construct()
    {
        parent::__construct();
        
        if($this->session->userdata('status') != "login")
        {
            $this->session->set_flashdata('peringatan_login', 'Akses anda ditolak!. Silahkan login terlebih dahulu');
            redirect(base_url("login"));
        }
        
        $this->load->model("m_user");
        $this->load->library('form_validation');
        $this->load->helper('indonesian_date');
    }

    public function index()
    {
        if ($this->session->userdata('role') == "1")
        {
            $data["user"] = $this->m_user->getAll();
            $this->load->view("admin/user/list_user", $data); 
        }
        else
        {
            show_404();
        }
        
    }

    public function add()
    {
        if ($this->session->userdata('role') == "1")
        {
            $user = $this->m_user;
            $validation = $this->form_validation;
            $validation->set_rules($user->rules());

            if ($validation->run())
            {
                $post         = $this->input->post();
                $username     = $post['username'];

                $qq = $this->db->query("SELECT * from user where username = '$username'")->row();

                if($qq <= "")
                {
                    $user->save();
                    $this->session->set_flashdata('success', '<i class="fa fa-check"></i> Alhamdulillah, Data berhasil disimpan');
                }
                else
                {
                    $this->session->set_flashdata('sama', '<i class="fa fa-check"></i> Username sudah ada');
                }
            }

            $this->load->view("admin/user/new_form_user");
        }
        else
        {
            show_404();
        }
    }

    public function edit($id = null)
    {
        if ($this->session->userdata('role') == "1")
        {
            if (!isset($id)) redirect('admin/user');
           
            $user = $this->m_user;
            $validation = $this->form_validation;
            $validation->set_rules($user->rules());

            if ($validation->run()) {
                $user->update();
                $this->session->set_flashdata('success', '<i class="fa fa-check"></i> Alhamdulillah, Data berhasil diupdate');
            }

            $data["user"] = $user->getById($id);
            if (!$data["user"]) show_404();
            
            $this->load->view("admin/user/edit_form_user", $data);
        }
        else
        {
            show_404();
        }
    }

    public function delete($id = null)
    {
        if ($this->session->userdata('role') == "1")
        {
            if (!isset($id)) show_404();
            
            if ($this->m_user->delete($id))
            {
                redirect(site_url('admin/user'));
            }
        }
        else
        {
            show_404();
        }
    }
}
