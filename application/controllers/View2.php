<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class View2 extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('m_front');
        $this->load->helper('short_number');
        $this->load->helper('indonesian_date');
    }

    public function index()
    {
        // $indonesia= file_get_contents('https://api.kawalcorona.com/indonesia');
        // $indonesia= file_get_contents(base_url('corona/indonesia'));
        // $data['total_indonesia'] = json_decode($indonesia);
        //indonesia
        //$provinsi= file_get_contents('https://api.kawalcorona.com/indonesia/provinsi');
        // $provinsi= file_get_contents(base_url('corona/provinsi'));
        //$data['total_provinsi'] = json_decode($provinsi);
        
        $data["front"] = $this->m_front->getAll();
        $this->load->view("front/overview2", $data);
    }    

    function lists()
    { //fungsi untuk menampilkan list artikel
        $x['data'] = $this->m_front->get_all_post();
        $this->load->view('v_blog_list',$x);
    }

    function detail($slug)
    { //fungsi untuk menampilkan detail artikel
        $data = $this->m_front->get_post_by_slug($slug);
        if($data->num_rows() > 0)
        { // validasi jika data ditemukan
            $x['data']= $data;
            $this->load->view('front/artikel', $x);
        }else{
            //jika data tidak ditemukan, maka kembali ke blog
            redirect('blog');
        }
         
    }
}
