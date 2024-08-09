<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Sett_bio_os extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('status') != "login")
        {
            $this->session->set_flashdata('peringatan_login', 'Akses anda ditolak!. Silahkan login terlebih dahulu');
            redirect(base_url("login_v3"));
        }


        if ($this->session->userdata('role') == "1" || $this->session->userdata('role') == "2" || $this->session->userdata('role') == "3" || $this->session->userdata('role') == "4")
        {
            $this->load->model("m_bio_os");
            $this->load->library('form_validation');
            $this->load->helper('short_number');
            $this->load->helper('indonesian_date');
            $this->load->helper('time_ago');
        }
    }

    public function index()
    {
        if ($this->session->userdata('role') == "1" || $this->session->userdata('role') == "2" || $this->session->userdata('role') == "3" || $this->session->userdata('role') == "4")
        {
            $this->load->view("admin/v3/bio_os/list_bio_os");
        }
        else
        {
            show_404();
        }
            
    }

    public function print($id = null)
    {
        $this->load->view("admin/_partials/giat_os/print");
    }

    public function print_month()
    {
        $giat_os = $this->m_bio_os;

        $post    = $this->input->post();
        $nama    = $post['nama_os'];
        $bulan   = $post['t1'];
        $tahun   = $post['t2'];

        //$que = $this->db->query("SELECT * FROM giat_os WHERE nama_os = '$nama' AND month(tgl_os) = '$bulan' AND year(tgl_os) = '$tahun'")->result();
        $this->db->where('nama_os', $nama);
        $this->db->where('MONTH(tgl_os)', $bulan, FALSE);
        $this->db->where('YEAR(tgl_os)', $tahun, FALSE);
        $data['print_data'] = $this->db->get('giat_os')->result();
        $this->load->view("admin/_partials/giat_os/print_fix", $data);
    }

    public function add()
    {
        if ($this->session->userdata('role') == "2")
        {
            $giat_os = $this->m_bio_os;
            $validation = $this->form_validation;
            $validation->set_rules($giat_os->rules());

            if ($validation->run())
            {
                $post   = $this->input->post();
                $nama_giat_os = $post['nama_giat_os'];
                $tgl_os  = $post['tgl_os'];

                $qq = $this->db->get_where('giat_os', ['nama_giat_os' => $nama_giat_os, 'tgl_os' => $tgl_os])->row();

                if($qq <= "")
                {
                    $giat_os->save();
                    $this->session->set_flashdata('success', '<i class="fa fa-check"></i> Alhamdulillah, Data berhasil ditambah');
                }
                else
                {
                    $this->session->set_flashdata('sama', '<i class="fa fa-check"></i> Alhamdulillah, Data berhasil diupdate');
                }
            }
            $this->load->view("admin/giat_os/new_form_bio_os");
        }
        else
        {
            show_404();
        }
    }

    function do_upload(){
        $config['upload_path']="./upload/bio_os";
        $config['allowed_types']='gif|jpg|png|jpeg';
        $config['encrypt_name'] = TRUE;
         
        $this->load->library('upload',$config);
        if($this->upload->do_upload("file")){
            $data = array('upload_data' => $this->upload->data());
            $image= $data['upload_data']['file_name']; 
             
            $result= $this->m_bio_os->simpan_upload($image);
            echo json_decode($result);
        }
 
     }

    public function upload_image()
    {
        if(!empty($_FILES["file"]["name"]))
        {
           $nama_file = explode('.', $_FILES["file"]["name"]);
           $ext = end($nama_file);
           $nama_baru = mt_rand().".".$ext;
           $nama_dir = base_url("upload/bio_os");
           if(!is_dir($nama_dir)) mkdir($nama_dir);
           $lokasi_file = $nama_dir . $nama_baru;
           $move = move_uploaded_file($_FILES["file"]["tmp_name"], $lokasi_file);
           if($move){
             echo $lokasi_file;
           }else{
             echo "";
           }
        }
    }

    public function edit($id = null)
    {
        if ($this->session->userdata('role') == "1" || $this->session->userdata('role') == "2" || $this->session->userdata('role') == "3" || $this->session->userdata('role') == "4")
        {
            if (!isset($id)) redirect('admin/giat_os');
           
            $giat_os = $this->m_bio_os;
            $validation = $this->form_validation;
            $validation->set_rules($giat_os->rules());

            if ($validation->run()) {
                $giat_os->update();
                $this->session->set_flashdata('success', '<i class="fa fa-check"></i> Alhamdulillah, Data berhasil diupdate');
            }

            $data["giat_os"] = $giat_os->getById($id);
            if (!$data["giat_os"]) show_404();
            
            $this->load->view("admin/giat_os/edit_form_bio_os", $data);
        }
        else
        {
            show_404();
        }
    }

    public function update_password()
    {
        if ($this->session->userdata('role') == "1" || $this->session->userdata('role') == "2" || $this->session->userdata('role') == "3" || $this->session->userdata('role') == "4")
        {
            $username   = $_POST['username']; 
            $pw_lama    = $_POST['currentPassword'];

            $cek        = $this->db->get_where('user',['username' => $username]);
            if ($cek->num_rows() > 0)
            {
                $hasil = $cek->row();
                if (password_verify($pw_lama, $hasil->password))
                {
                    $model = $this->m_bio_os;
                    $model->update_pass();
                    $this->session->set_flashdata('success_up_pw', '<i class="fa fa-check"></i> Alhamdulillah, Data berhasil diupdate');
                }
            }
            
            $this->load->view("admin/v3/bio_os/list_bio_os");
        }
        else
        {
            show_404();
        }
    }

    public function view_kegiatan()
    {
        if ($this->session->userdata('role') == "4" || $this->session->userdata('username') == "198410242002122001" || $this->session->userdata('role') == "3")
        {
            $nik = $this->uri->segment(4);
            if (!empty($nik))
            {
                $this->load->view("admin/bio_os/view_kegiatan");
            }
            else
            {
                show_404();
            }
        }
            
    }

    public function perbaharui()
    {
        if ($this->session->userdata('role') == "1" || $this->session->userdata('role') == "2" || $this->session->userdata('role') == "3" || $this->session->userdata('role') == "4")
        {           
            $giat_os = $this->m_bio_os;
            $validation = $this->form_validation;
            $validation->set_rules($giat_os->rules());

            if ($validation->run())
            {
                $nm_os = $this->session->userdata('nama_depan')." ".$this->session->userdata('nama_belakang');
                $tmp_db = $this->db->get_where('bio_os', ['nama_bio_os' => $nm_os])->row();
                if ($tmp_db != "" || $tmp_db != NULL)
                {
                    $giat_os->update_bio();
                    $this->session->set_flashdata('success_up_bio', '<i class="fa fa-check"></i> Alhamdulillah, Data berhasil diupdate');
                }
                else
                {
                    $giat_os->tambah_bio();
                    $this->session->set_flashdata('success_up_bio', '<i class="fa fa-check"></i> Alhamdulillah, Data berhasil ditambah');
                }
            }
            
            $this->load->view("admin/v3/bio_os/list_bio_os");
        }
        else
        {
            show_404();
        }
    }

    public function approve($id=null)
    {
        if ($this->session->userdata('role') == "3" || $this->session->userdata('role') == "4")
        {
            if (!isset($id)) show_404();
            
            if ($this->m_bio_os->approvel($id))
            {
                redirect(site_url('admin/eperformance'));
            }
        }
        else
        {
            show_404();
        }
    }

    public function delete($id=null)
    {
        if ($this->session->userdata('role') == "2")
        {
            if (!isset($id)) show_404();
            
            if ($this->m_bio_os->delete($id))
            {
                redirect(site_url('admin/v3/giat_os'));
            }
        }
        else
        {
            show_404();
        }
    }
}
