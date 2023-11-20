<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use chriskacerguis\RestServer\RestController;
use phpDocumentor\Reflection\Types\Parent_;

use \Firebase\JWT\JWT;
use \Firebase\JWT\ExpiredException;

class Auth extends RestController {

	private $secretKey;
	public function __construct() {
		parent::__construct();
		$this->load->helper('jwt');
		$this->load->model('Auth_model','am',TRUE);
		$this->secretKey = configToken()['secretkey'];
		date_default_timezone_set('Asia/jakarta');
	}


	public function val_param($obj) {
		$json_data = json_decode(file_get_contents('php://input'), true);

		if (is_null($obj) || is_null($json_data)) return '';
		return isset($json_data[$obj]) ? $json_data[$obj] : '';
	}

    public function login_post(){
        if (empty($this->input->post('username')) || empty($this->input->post('password')) ) {
            # jika username atau password kosong
            return $this->response([
                'status' => false,
                'message' => 'Data not found'
            ], 404);
        }

        $login = $this->am->auth($this->input->post('username')); # cek username
        if (!$login) {
            # jika username tidak ditemukan
            return $this->response([
                'status' => false,
                'message' => 'Authorization failed'
            ], 404);
        }

        $exp = time() + 3600; # setting exp jwt
        $time_exp = date('Y-m-d H:i:s', $exp); # info time exp jwt

        // try {
        //     $access = $this->access->login();
        // } catch (\Exception $e) {
        //     $access = null;
        // }

        $param = [
            "username" => $this->input->post('username'),
            "password" => $this->input->post('password'),
            // 'access' => $access, // tambah result login ke access
        ];
        $token = $this->parseData($exp, $param);

        $jwt = JWT::encode($token, $this->secretKey,'HS256'); # create token jwt
        $data = [
            "key"       => 'Bearer',
            "token"     => $jwt,
            "expired"   => $time_exp,
            // 'access' => $access,
        ];

        return $this->response($data, 200);
    }

	   /**
     * @param int   $expired Timestamp waktu token expired
     * @param array $data
     *
     * @return array
     */
    private function parseData($expired, $data) {
        $token = array(
            "iss" => 'apprestservice',
            "aud" => 'pengguna',
            "iat" => time(),
            "nbf" => time(),
            "exp" => $expired,
            "data" => $data
        );

        return $token;
    }
}
