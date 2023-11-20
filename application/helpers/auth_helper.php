
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('cek_login'))
{
    function cek_login()
    {
        $CI = &get_instance();

        if ($CI->session->userdata('user')) {

		}else{
			redirect(base_url('login'));

        }
    }   
}
