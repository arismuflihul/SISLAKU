<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

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

    //Load auth_model dan form_validation
    //form_validation diguanakan untuk validasi input pada method Add() dan Edit()
    function __construct(){
        parent::__construct();
        $this->load->helper('html');
        $this->load->helper('form');
        $this->load->model('auth_model');
    }

    //load halaman Login
    public function index(){
        if ($this->session->userdata('logged_in')==TRUE){
            redirect('Administrator/Dashboard','refresh');
        }

        $this->load->view('auth');
    }

    //validasi user dan password
    public function auth_validation(){
        $username   = strtolower($this->input->post('username'));
        $password   = sha1($this->input->post('password'));

        $result     = $this->auth_model->auth_validation($username, $password);
        //cek user & pass
        if ($result) {
            //cek status user
            if ($result[0]['status'] == 1) {
                //cek akses user
                if (($result[0]['level'] == 1) || ($result[0]['level'] == 2)) {
                    $sess = array(
                        'level'     => $result[0]['level'],
                        'user'      => $result[0]['user_id'],
                        'nama'      => $result[0]['nama'],
                        'logged_in' => TRUE
                    );
                    $this->session->set_userdata($sess);
                    redirect('Laporan/Dashboard');
                }
            }else{
                $this->session->set_flashdata('warning', 'Username Anda '.ucwords($username).' Sedang Dinonaktifkan');
                redirect(base_url());
            }
        } else {
            $this->session->set_flashdata('warning', 'Kombinasi Username atau Password Salah');
            redirect(base_url());
        }
    }

    public function logout(){
        session_destroy();
        redirect(base_url());
    }
}

?>