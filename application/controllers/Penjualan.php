<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan extends CI_Controller {

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

	 public function __construct(){
		parent::__construct();
		$this->load->model('product_model','pro');
		$this->load->model('trans_model','trans');
		cek_login();
	 }
	public function index()
	{
		$product = $this->pro->result();
		$data = [
			'page'    =>'pages/penjualan',
			'product' => $product
		];
		$this->load->view('layout/index',$data);
	}

	function addtocart()  {
		
		$data['id_product'] =$_POST['id']; 
		$data['qty'] =$_POST['qty_beli']; 
		$data['id_user'] =$this->session->userdata('id'); 

		$this->db->insert('cart',$data);
		$run = $this->db->affected_rows();

		$res = [
			'status'=>$run? true :false,
			'message'=>($run) ? 'Berhasil ':' Gagal',
		];

		echo json_encode($res);
	}


	function show_cart() {	
		
		$this->db->select('product.*,cart.id as id_cart,cart.qty');
		$this->db->where('cart.id_user',$this->session->userdata('id'));
		$this->db->from('cart');
		$this->db->join('product','product.id=cart.id_product');
		$cart = $this->db->get()->result();
		$data = [
			'cart'=>$cart
		];

		$this->load->view('pages/cart',$data);

	}

	function show_history() {	
		
		// $this->db->select('trans_product.*,trans.id as id_trans,trans.total_price');
		// $this->db->where('trans.id_user',$this->session->userdata('id'));
		// $this->db->from('trans');
		// $this->db->join('trans_product','trans_product.id_trans=trans.id');
		// $pembelian = $this->db->get()->result();

		// $this->db->select('trans_product.*,trans.id as id_trans,trans.total_price');
		$this->db->where('trans.id_user',$this->session->userdata('id'));
		$this->db->from('trans');
		// $this->db->join('trans_product','trans_product.id_trans=trans.id');
		$trans = $this->db->get()->result();
		$data = [
			// 'pembelian'=>$pembelian
			'trans'=>$trans
		];

		$this->load->view('pages/h_pembelian',$data);

	}

	function beli(){

		$this->db->select('product.*,cart.id as id_cart,cart.qty');
		$this->db->where('cart.id_user',$this->session->userdata('id'));
		$this->db->from('cart');
		$this->db->join('product','product.id=cart.id_product');
		$cart = $this->db->get()->result();

		if(!$cart){
			$res = [
				'status'=>false,
				'message'=>' Tidak ada produk di keranjang',
			];
	
			echo json_encode($res);
			return;
		}

		$total_price = 0 ;
		foreach ($cart as $key => $value) {
			$diskon = ($value->discount) ? ($value->price*($value->discount/100)) : 0 ;
			$total_price += $value->price - $diskon;
		}
		$data_trans = [
			'trans_code'=>time(),
			'id_user'=>$this->session->userdata('id'),
			'total_price'=> $total_price
		];
		$this->db->insert('trans',$data_trans);
		$insert_id = $this->db->insert_id();

		$data_trans_product = [];
		foreach ($cart as $key => $value) {
			$diskon = ($value->discount) ? ($value->price*($value->discount/100)) : 0 ;
			$total_price += ($value->price - $diskon)*$value->qty;
			$row = [
				'id_trans' => $insert_id ,
				'id_product' =>$value->id,
				'product_code' =>$value->product_code,
				'product_name' =>$value->product_name,
				'price' =>$value->price,
				'qty' =>$value->qty,
				'currency' =>$value->currency,
				'discount' =>$value->discount,
				'dimention' =>$value->dimention,
				'unit' =>$value->unit,			

			];
			array_push($data_trans_product,$row);
		}		
		$this->db->insert_batch('trans_product',$data_trans_product);

		$this->db->where('id_user',$this->session->userdata('id'));
		$this->db->delete('cart');

		$res = [
			'status'=>true,
			'message'=>' Berhasil',
		];

		echo json_encode($res);

		return;

	}


	function detail_trans() {

		$this->db->select('trans_product.*,trans.id as id_trans,trans.total_price');
		$this->db->where('trans.trans_code',$_POST['id']);
		$this->db->from('trans');
		$this->db->join('trans_product','trans_product.id_trans=trans.id');
		$detail = $this->db->get()->result();

		$this->db->where('trans.trans_code',$_POST['id']);
		$this->db->from('trans');
		$trans = $this->db->get()->result();
		$data = [
			'trans'=>$trans,
			'detail'=>$detail
		];

		$this->load->view('pages/detail',$data);
	}
}
