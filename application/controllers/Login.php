<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('m_login');
    }

    function index()
    {
        // $data = array(
        //     'captcha' => $this->recaptcha->getWidget(),
        //     'script_captcha' => $this->recaptcha->getScriptTag()
        // );

        // $this->load->view('v_login', $data);

        $this->load->view('v_login');
    }

    function aksi_login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $recaptcha = $this->input->post('g-recaptcha');
        $response = $this->recaptcha->verifyResponse($recaptcha);

        $where    = array(
            'usr.username' => $username,
            'usr.password' => md5($password)
        );

        // $recaptchaResponse = trim($this->input->post('g-recaptcha-response'));
        // $userIp=$this->input->ip_address();
        // $secret = $this->config->item('google_secret');
        // $url="https://www.google.com/recaptcha/api/siteverify?secret=".$secret."&response=".$recaptchaResponse."&remoteip=".$userIp;
 
        // $ch = curl_init();
        // curl_setopt($ch, CURLOPT_URL, $url);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // $output = curl_exec($ch);
        // curl_close($ch);
         
        // $status= json_decode($output, true);


        $cek = $this->m_login->cek_login("user usr", $where)->num_rows();

        // if ($status['success'])
        // {
            // if($cek > 0 || isset($response['success']) || $response['success'] <> FALSE)
            if($cek > 0)
            {
                $result = $this->m_login->get_AfterLogin("user", $where)->result();
                foreach ($result as $us)
                {
                    $data_session = array(
                        // DATA LOGIN
                        'username'      => $us->username,
                        'nama_group'    => $us->nama_group,
                        'keterangan_grp'=> $us->keterangan,
                        'email'         => $us->email,
                        'nama_depan'    => $us->nama_depan,
                        'nama_belakang' => $us->nama_belakang,
                        'no_telp'       => $us->no_telp,
                        'role'          => $us->role,
                        'status'        => 'login'
                    );
                }

                $this->session->set_userdata($data_session);
                redirect(base_url("admin"));
            }
            else
            {
                $this->session->set_flashdata('gagal', '<p style="font-size: 12px;"><i class="fa fa-exclamation-triangle"></i> Username or password didn\'t match.</p>');
                redirect(base_url("login"));
            }
        //}
        // else
        // {
        //     $this->session->set_flashdata('captcha_error', '<p style="font-size: 12px;"><i class="fa fa-exclamation-triangle"></i> Username or password didn\'t match.</p>');
        //     redirect(base_url("login"));
        // }


        // if($cek > 0 || isset($response['success']) || $response['success'] <> FALSE)
        // {
        //     $result = $this->m_login->get_AfterLogin("user", $where)->result();
        //     foreach ($result as $us)
        //     {
        //         $data_session = array(
        //             // DATA LOGIN
        //             'username'      => $us->username,
        //             'nama_group'    => $us->nama_group,
        //             'keterangan_grp'=> $us->keterangan,
        //             'email'         => $us->email,
        //             'nama_depan'    => $us->nama_depan,
        //             'nama_belakang' => $us->nama_belakang,
        //             'no_telp'       => $us->no_telp,
        //             'status'        => 'login'
        //         );
        //     }

        //     $this->session->set_userdata($data_session);
        //     if ($this->session->userdata('username') == "op_masker")
        //     {
        //         redirect(base_url("admin/masker"));
        //     }

        //     if ($this->session->userdata('username') == "panwil")
        //     {
        //         redirect(base_url("admin/panwil"));
        //     }
        //     else
        //     {
        //         redirect(base_url("admin"));
        //     }
        // }
        // else
        // {
        //     $this->session->set_flashdata('gagal', '<p style="font-size: 12px;"><i class="fa fa-exclamation-triangle"></i> Username or password didn\'t match.</p>');
        //     redirect(base_url("login"));
        // }
    }

    function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('login'));
    }
}