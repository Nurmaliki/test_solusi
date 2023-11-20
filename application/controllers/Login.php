<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */

	public function __construct() {
		parent::__construct();
		$this->table = 'user';
	}
	public function index()
	{
		
		$this->load->view('login');
	}

	function auth() {

		$this->db->where('user',$_POST['user']);
		$this->db->where('password',$_POST['pw']);
		$this->db->from($this->table);
		$login = $this->db->get()->row();

		if ($login) {
			$this->session->set_userdata((array)$login);
		}

		$res = [
			'status'=>(bool)$login,
			'message'=>($login) ? 'Berhasil login' : 'Password salah atau User tidak terdaftar',
			'link'=>base_url(),
		];
		echo json_encode($res);
		return;

	}

	function logout() {
		$this->session->unset_userdata(array('id', 
		'user', 
		'password', 
		'created_by', 
		'updated_by', 
		'deleted_by', 
		'created_at', 
		'updated_at', 
		'deleted_at', 
		'is_active'));
		cek_login();		
	}
}
