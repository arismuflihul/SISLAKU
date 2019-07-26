<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_model extends CI_Model {

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

    private $_table = "laporan"; //nama tabel

    //nama kolom pada tabel
    //harus sama huruf besar dan kecilnya
    public $id_laporan;
    public $keterangan;
    public $debit;
    public $kredit;


    //untuk validasi input
    public function rules(){
        return [
            ['field' => 'keterangan',
             'label' => 'Keterangan',
             'rules' => 'required'],

             ['field' => 'debit',
             'label' => 'debit',
             'rules' => 'required'],

             ['field' => 'kredit',
             'label' => 'kredit',
             'rules' => 'required'],

             ['field' => 'bulan_id_bulan',
             'label' => 'bulan_id_bulan',
             'rules' => 'required'],

             ['field' => 'bulan_tahun_id_tahun',
             'label' => 'bulan_tahun_id_tahun',
             'rules' => 'required'],
        
        ];
    }

    //Untuk mengambil data dari tabel laporan
    public function getAll(){
        //SELECT * FROM laporan
        return $this->db->get($this->_table)->result();//result = semua baris
        
    }

    //untuk mengambil id dari tabel laporan
    public function getById($id){
        //SELECT * FROM laporan where laporan_id
        return $this->db->get_where($this->_table, ['laporan_id'=>$id])->row();//row=satu baris
    }

    public function Save(){
        $post = $this->$input->post(); //Ambil data dari form
        $this->id_laporan = uniqid(); //Membuat id uniq
        $this->keterangan = $post['keterangan']; //Isi field
        $this->debit = $post['debit']; //Isi field
        $this->kredit = $post['kredit']; //Isi field
        $this->bulan_id_bulan = $post['bulan_id_bulan'];
        $this->bulan_tahun_id_tahun = $post['bulan_tahun_id_tahun'];
        $this->db->insert($this->_table, $this); //Simpan ke database
    }

    public function Update(){
        $post = $this->$input->post();
        $this->laporan_id = uniqid();
        $this->keterangan = $post['keterangan'];
        $this->debit = $post['debit'];
        $this->kredit = $post['kredit'];
        $this->db->update($this->_table, $this, array('laporan_id' => $post['id']));
    }

    public function Delete($id){
        return $this->db->delete($this->_table, array('laporan_id' => $id));
    }
}

?>