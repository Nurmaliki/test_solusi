<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth_model extends CI_Model {

	private $table;
	public function __construct() {
		$this->table = 'login';
	}
	function auth($q) {
		$this->db->where('username', $q);
        $query = $this->db->get($this->table)->row();
        if ($query) {
            return TRUE;
        } else {
           return FALSE;
        }
    }

}
