<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('m_artikel');
        $this->load->library('pagination');
        $this->load->library('form_validation');
        $this->load->helper('short_number');
        $this->load->helper('indonesian_date');
        $this->load->helper('time_ago');
    }

    public function index()
    {
        //konfigurasi pagination
        $jumlah_data = $this->m_artikel->jumlah_data();
        $config['base_url'] = base_url('blog/index');
        $config['total_rows'] = $jumlah_data;
        $config['per_page'] = 5;

        $config['first_link']       = '&laquo;';
        $config['last_link']        = '&raquo;';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only"></span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Selanjutnya</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $from = $this->uri->segment(3);
        $this->pagination->initialize($config);     
        $data['user'] = $this->m_artikel->data($config['per_page'],$from);
        // $config['base_url'] = base_url('view_v2/blog'); //site url
        // $config['total_rows'] = $this->db->count_all('artikel'); //total row
        // $config['per_page'] = 5;  //show record per halaman
        // $config["uri_segment"] = 3;  // uri parameter
        // $choice = $config["total_rows"] / $config["per_page"];
        // $config["num_links"] = floor($choice);

        // $config['first_link']       = 'First';
        // $config['last_link']        = 'Last';
        // $config['next_link']        = 'Next';
        // $config['prev_link']        = 'Prev';
        // $config['full_tag_open']    = '<ul class="pagination justify-content-center">';
        // $config['full_tag_close']   = '</ul>';
        // $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        // $config['num_tag_close']    = '</span></li>';
        // $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        // $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        // $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        // $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        // $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        // $config['prev_tagl_close']  = '</span>Next</li>';
        // $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        // $config['first_tagl_close'] = '</span></li>';
        // $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        // $config['last_tagl_close']  = '</span></li>';
 
        // $this->pagination->initialize($config);
        // $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
 
        // //panggil function get_artikel_list yang ada pada mmodel artikel_model. 
        // $data['data'] = $this->m_artikel->get_artikel_list($config["per_page"], $data['page']);           
 
        // $data['pagination'] = $this->pagination->create_links();
 
        //load view artikel view
        $this->load->view('front/v_blog',$data);

        // $x['data'] = $this->m_artikel->get_all_post();
        // $this->load->view('front/view_blog',$x);
    }

    public function jenis_artikel()
    {
        $jenis_artikel = $_GET['jenis'];
        $jenis_artikel1 = $this->uri->segment(3);
        
        if (empty($jenis_artikel))
        {
            show_404();
        }
        else
        {
            $db_jenis = $this->db->query("SELECT * FROM artikel WHERE jenis_artikel = '$jenis_artikel'");
            $data['res_jen'] = $db_jenis->result();

            $this->load->view('front/j_blog', $data);
        }

    }

    public function cari_artikel()
    {
        if (isset($_GET['judul_artikel']))
        {
            $get = $this->input->get();
            $judul_artikel = $get['judul_artikel'];

            if (empty($judul_artikel))
            {
                $this->session->set_flashdata('kosong', '<i class="fa fa-check"></i> Data kosong');
            }
            else
            {
                $db_res = $this->db->query("SELECT * FROM artikel WHERE judul_artikel LIKE '%$judul_artikel%'");
                $data['res_art'] = $db_res->result();
            }

            $this->load->view('front/s_blog', $data);
        }
        else
        {
            show_404();
        }
    }

    function lists()
    { //fungsi untuk menampilkan list artikel
        $x['data'] = $this->m_artikel->get_all_post();
        $this->load->view('v_blog_list',$x);
    }

    function detail($slug)
    { //fungsi untuk menampilkan detail artikel
        $data = $this->m_artikel->get_post_by_slug($slug);
        if($data->num_rows() > 0)
        { // validasi jika data ditemukan
            $x['data']= $data;
            $this->load->view('front/artikel', $x);
        }else{
            //jika data tidak ditemukan, maka kembali ke blog
            show_404();
        }
         
    }
}
