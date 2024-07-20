<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class View extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('PDF_MC_Table');
        $this->load->model('m_front');
        $this->load->library('form_validation');
        $this->load->helper('short_number');
        $this->load->helper('indonesian_date');
        $this->load->model('m_chart');
        $this->load->model('M_review');
    }

    public function index()
    {
        $data["front"] = $this->m_front->getAll();
        $start_date = $this->input->get('start_date');
        $end_date = $this->input->get('end_date');

        // Log the start and end date for debugging
        log_message('debug', 'Start Date: ' . $start_date);
        log_message('debug', 'End Date: ' . $end_date);

        // Get chart data from the model
        $data['chartDataKejadianfront'] = $this->m_chart->getChartDataKejadianfront($start_date, $end_date);
        $data['chartDataLokasifront'] = $this->m_chart->getChartDataLokasifront($start_date, $end_date);
        $data["reviews"] = $this->M_review->get_reviews();

        // Log the retrieved data for debugging
        log_message('debug', 'Chart Data Kejadian: ' . print_r($data['chartDataKejadianfront'], true));
        log_message('debug', 'Chart Data Lokasi: ' . print_r($data['chartDataLokasifront'], true));

        // Ensure data arrays are always set
        if (!isset($data['chartDataKejadianfront'])) {
            $data['chartDataKejadianfront'] = [];
        }
        if (!isset($data['chartDataLokasifront'])) {
            $data['chartDataLokasifront'] = [];
        }

        $this->load->view("front/overview", $data);
    }

    
    public function submit_feedback() {
		$name = $this->input->post('name');
		$feedback = $this->input->post('feedback');

		$data = array(
			'nama' => $name,
			'isi_review' => $feedback
		);

		if ($this->M_review->insert_review($data)) {
			echo json_encode(array('status' => 'success'));
		} else {
			echo json_encode(array('status' => 'error'));
		}
	}

	public function display_reviews() {
		$data['reviews'] = $this->M_review->get_reviews();
		$this->load->view('front/overview', $data); 
	}


    public function contact()
    {
        $this->load->view("front/contact");
    }

    public function visi_misi()
    {
        $this->load->view("front/visi_misi");
    }

    public function tugas_pokok()
    {
        $this->load->view("front/tugas_pokok");
    }

    public function struktur()
    {
        $this->load->view("front/struktur");
    }

    public function layanan()
    {
        $start_date = $this->input->get('start_date');
        $end_date = $this->input->get('end_date');


        // Get chart data from the model
        $data['chartDataKejadian'] = $this->m_chart->getChartDataKejadianfront($start_date, $end_date);
        $data['chartDataLokasi'] = $this->m_chart->getChartDataLokasifront($start_date, $end_date);
         $this->load->view("front/layanan", $data);
    }

    public function edukasi()
    {
        $this->load->view("front/edukasi");
    }

    public function rpjmd()
    {
        $this->load->view("front/rpjmd");
    }

    public function dok_pb()
    {
        $this->load->view("front/dok_pb");
    }

    public function edukasi_kebencanaan()
    {
        $this->load->view("front/edukasi_kebencanaan");
    }

    public function hukum_kebencanaan()
    {
        $this->load->view("front/hukum_kebencanaan");
    }

    public function laporan_tahunan()
    {
        $this->load->view("front/laporan_tahunan");
    }
    public function laporan()
    {
        $this->load->view("front/laporan");
    }

    public function laporan_keuangan()
    {
        $this->load->view("front/laporan_keuangan");
    }

    public function dokumentasi()
    {
        $this->load->view("front/dokumentasi");
    }

    public function perpus_artikel()
    {
        $this->load->view("front/perpus_artikel");
    }
    public function renstra()
    {
        $this->load->view("front/renstra");
    }

    public function lokasi_pos()
    {
        $this->load->view("front/lokasi_pos");
    }

    public function hasil_survey()
    {
        $this->load->view("front/hasil_survey");
    }

    public function survey()
    {
        $front = $this->m_front;
        $validation = $this->form_validation;
        $validation->set_rules($front->rules1());

        if ($validation->run())
        {
            $post   = $this->input->post();
            $nama_survey       = $post['nama_survey'];
            $alamat_survey     = $post['alamat_survey'];
            $kota_kab_survey   = $post['kota_kab_survey'];
            $kec_survey        = $post['kec_survey'];
            $kel_survey        = $post['kel_survey'];
            $nilai             = $post['nilai'];
            $alasan            = $post['alasan'];

            $qq = $this->db->query("SELECT * from survey_kepuasan where nama_survey = '$nama_survey' AND alamat_survey = '$alamat_survey'")->row();

            if($qq <= "")
            {
                $front->save_survey();
                $this->session->set_flashdata('success', '<i class="fa fa-check"></i> Alhamdulillah, Data berhasil ditambah');
                $this->load->view("front/survey");
            }
            else
            {
                $this->session->set_flashdata('sama', '<i class="fa fa-check"></i> Alhamdulillah, Data berhasil diupdate');
                $data_revisi = array (
                    "nama_survey"  => $nama_survey,
                    "alamat_survey" => $alamat_survey,
                    "kota_kab_survey"  => $kota_kab_survey,
                    "kec_survey"  => $kec_survey,
                    "kel_survey"  => $kel_survey,
                    "nilai"  => $nilai,
                    "alasan"  => $alasan
                  );
                $this->load->view("griya_data/survey", $data_revisi);
            }
        }
        else
        {
            $this->load->view("front/survey");
        }
    }

    public function get_daerah()
    {
        // $data = $_POST['data'];
        // $id   = $_POST['id'];
        $data = $_POST['data'];
        $value_wilayah = $_POST['wilayah'];

        // $n    = strlen($id);
        // $m    = ($n==2?5:($n==5?8:13));
        // $wil=($n==2?'Kota/Kab':($n==5?'Kecamatan':'Desa/Kelurahan'));

        if ($data == "kabupaten")
        {
            ?>
            <div class="col-md-6">
                <label>Kabupaten / Kota</label>
                <select class="single-select" id="form_kab" name="kota_kab_survey" required>
                    <option value="">--- Pilih Kabupaten / Kota ---</option>
                    <?php
                        $daerah = $this->db->query("SELECT wilayah,kab_kota FROM wilayah_2022 WHERE wilayah='$value_wilayah' ORDER BY kab_kota")->result();
                        foreach ($daerah as $d)
                        {
                            ?>
                            <option value="<?= $d->wilayah ?>"><?= $d->kab_kota ?></option>
                            <?php
                        }
                    ?>
                </select>
            </div>                
            <?php
        }
        else if ($data == "kecamatan")
        {
            ?>
            <div class="col-md-6">
                <label>Kecamatan</label>
                <select class="single-select" id="form_kec" name="kec_survey" required>
                    <option value="">--- Pilih Kecamatan ---</option>
                    <?php
                        $daerah = $this->db->query("SELECT wilayah,kecamatan FROM wilayah_2022 WHERE wilayah='$value_wilayah' ORDER BY nama")->result();
                        foreach ($daerah as $d)
                        {
                            ?>
                            <option value="<?= $d->wilayah ?>"><?= $d->kecamatan ?></option>
                            <?php
                        }
                    ?>
                </select>
            </div>
            <?php
        }
        else if ($data == "desa")
        {
            ?>
            <div class="col-md-6">
                <label>Kelurahan / Desa</label>
                <select class="single-select" id="form_kel" name="kel_survey" required>
                    <option value="">--- Pilih Kelurahan / Desa ---</option>
                    <?php
                        $daerah = $this->db->query("SELECT wilayah,desa FROM wilayah_2022 WHERE wilayah='$value_wilayah' ORDER BY nama")->result();
                        foreach ($daerah as $d)
                        {
                            ?>
                            <option value="<?= $d->wilayah ?>"><?= $d->desa ?></option>
                            <?php
                        }
                    ?>
                </select>
            </div>
            <?php
        }
    }

    // public function pra_bencana()
    // {
    //     $this->load->view("front/pra_bencana");
    // }

    // public function tanggap_darurat()
    // {
    //     $this->load->view("front/tanggap_darurat");
    // }

    // public function pasca_bencana()
    // {
    //     $this->load->view("front/pasca_bencana");
    // }

    public function level_bencana()
    {
        $this->load->view("front/level_bencana");
    }

    public function siaga_bencana()
    {
        $this->load->view("front/siaga_bencana");
    }

    public function rekam_kejadian()
    {
        $this->load->view("front/rekam_kejadian");
    }

    public function infografi()
    {
        $this->load->view("front/infografi");
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
