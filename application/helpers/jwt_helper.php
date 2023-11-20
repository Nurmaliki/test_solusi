<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH . '/libraries/jwt/JWT.php';
require APPPATH . '/libraries/jwt/ExpiredException.php';
require APPPATH . '/libraries/jwt/BeforeValidException.php';
require APPPATH . '/libraries/jwt/SignatureInvalidException.php';
require APPPATH . '/libraries/jwt/JWK.php';


use chriskacerguis\RestServer\RestController;
use \Firebase\JWT\JWT;
use \Firebase\JWT\ExpiredException;


function configToken(){
	$cnf['exp'] = 3600; //milisecond
	$cnf['secretkey'] = (string)'2212336221';
	return $cnf;        
}


function cek_token(){
    $ci =& get_instance();
    $secret_key = configToken()['secretkey'];
    $token = null;
    $header = (!empty($ci->input->request_headers()['Authorization']))?$ci->input->request_headers()['Authorization']:NULL;
	if (empty($header)) {
		// $result = array('pesan'=>'Kode Signature Tidak Sesuai');
        return FALSE;
    }
	
    $pieces = explode(' ', $header);
    if (count($pieces) < 2) return FALSE;
	
    list($bearer, $token) = $pieces;
	print_r(configToken()['secretkey']);
	$decoded = JWT::decode($token, configToken()['secretkey'],'HS256');
	// print_r($decoded);
	// print_r($token);
    if ($token) {
		try{
			$decoded = JWT::decode($token, configToken()['secretkey']);
            if ($decoded) {
				return TRUE;
            }
        } catch (\Exception $e) {
            // $result = array('pesan'=>'Kode Signature Tidak Sesuai');
            return FALSE;
        }
    }
}
