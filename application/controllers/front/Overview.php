<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Overview extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model("m_front");
        $this->load->helper('short_number');
        $this->load->helper('indonesian_date');
    }

    public function index()
    {
        $data["front"] = $this->m_front->getAll();
        $this->load->view("front/overview", $data);
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

    public function Artikel($id)
    {
        $data["front"] = $this->m_front->getById($id);
        $this->load->view("front/artikel", $data);
    }
}