<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {

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

    private $_table = "users"; //nama tabel

    //nama kolom pada tabel
    //harus sama huruf besar dan kecilnya
    public $user_id;
    public $nama;
    public $username;
    public $password;
    public $status;
    public $level;

    public function auth_validation($username, $password){
        return $this->db->get_where($this->_table, ['username'=>$username, 'password'=>$password])->result_array();
    }
}

?>