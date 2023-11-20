<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use chriskacerguis\RestServer\RestController;
use phpDocumentor\Reflection\Types\Parent_;

use \Firebase\JWT\JWT;
use \Firebase\JWT\ExpiredException;

class Profile extends RestController {

	private $secretKey;
	public function __construct() {
		parent::__construct();
		$this->load->helper('jwt');
		$this->secretKey = configToken()['secretkey'];
		date_default_timezone_set('Asia/jakarta');
	}


	public function val_param($obj) {
		$json_data = json_decode(file_get_contents('php://input'), true);

		if (is_null($obj) || is_null($json_data)) return '';
		return isset($json_data[$obj]) ? $json_data[$obj] : '';
	}

    public function get_post(){
       echo json_encode(cek_token());
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
