<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cari_model extends CI_Model {

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
    public $bulan_id_bulan;
    public $bulan_tahun_id_tahun;


    //untuk validasi input

    //Untuk mengambil data dari tabel laporan
    public function getAll(){
        //SELECT * FROM laporan
        return $this->db->get($this->_table['laporan'])->result();//result = semua baris
        
    }

    //untuk mengambil id dari tabel laporan
    public function getBy($id_tahun, $id_bulan){
        
        return $this->db->get_where($this->_table, ['bulan_tahun_id_tahun'=> $id_tahun, 'bulan_id_bulan'=>$id_bulan])->result();
    }

}
?>