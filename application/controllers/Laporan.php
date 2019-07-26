<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

    //Load laporan_model dan form_validation
    //form_validation diguanakan untuk validasi input pada method Add() dan Edit()
    public function __construct(){
        parent::__construct();
        $this->load->helper('bulan');
        $this->load->helper('html');
        $this->load->model('laporan_model');
        $this->load->model('cari_model');
        $this->load->library('form_validation');
        $this->output->enable_profiler(TRUE);
    }

	public function index()
	{
        //Mengambil data dari model
        $data['laporan'] = $this->laporan_model->getALL();
        //Menampilkan view list
		$this->load->view('Administrator/Dashboard',$data);
    }

    public function Dashboard(){
        $this->load->view('Administrator/Dashboard');
    }
    
    public function Add(){
        //form valiation
        $validation = $this->form_validation;
        $validation->set_rules($laporan->rules());

        //Menjalankan Validasi
        if ($validation->run()){
            //Jika berhasil disimpan
            $laporan->save();
            //Menampilkan alert succes
            $this->session->set_flashdata('succes','Berhasil');
        }
        //jika tidak berhasil validasi kembali ke view new_form
        $this->load->view('Administrator/Dashboard');

    }

    public function Edit($id=null){
        //cek ketersedian id
        //jika id tidak ada kembali ke view laporan
        if(!isset($id)) redirect('laporan');

        $laporan =
        $validation =
        $validation->set_rules($laporan->rules());

        if  ($validation->run()){
             $laporan->update();
             $this->session->set_flashdata('succes','Berhasil');
        }

        $data["laporan"] = $laporan->getById($id);
        if (!data["laporan"]) show_404();
        
        $this->load->view('edit', $data);
    }

    public function delete($id=null){
        if (!isset($id)) show_404();

        if ($this->laporan_model->delete($id)){
            redirect(site_url('laporan'));
        }
    }

    public function Search(){
        
        $id_tahun         = $this->input->post('bulan_tahun_id_tahun');
        $id_bulan         = $this->input->post('bulan_id_bulan');
        $data["laporan"]  = $this->cari_model->getBy($id_tahun, $id_bulan);
        $array = array('tahun' => $data['bulan_tahun_id_tahun'],
                       'bulan' => $data['bulan_id_bulan'],
                        );
       
        if ( $id_tahun > 0){
            if ($id_bulan > 0){
                $this->load->view('Administrator/DataLaporan', $data);
            } else{
                $this->session->set_flashdata('warning', 'Bulan Kosong');
                redirect('Laporan/Dashboard');
            }
        }else{
            $this->session->set_flashdata('warning', 'Tahun Kosong');
                redirect('Laporan/Dashboard');
        }
        

    }

    public function dataLaporan($id_tahun, $id_bulan){
        $data['laporan']    = $this->cari_model->getBy($id_tahun, $id_bulan);
        $this->load->view('Administrator/Laporan');

    }
    
}
