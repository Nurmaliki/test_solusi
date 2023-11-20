<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class product_model extends CI_Model {
    
    private $column_order;//field yang ada di table user
    private $column_search; //field yang diizin untuk pencarian 
    private $order; 
	private $table;
	private $data_delete;
	private $data_undelete;
	public function __construct() {
        parent::__construct();
		$this->table = 'product';
		$this->data_delete = [
            'deleted_at'=>date('Y-m-d H:i:s'),
            'deleted_by'=>$this->session->userdata('username')
        ];
        $this->data_undelete = [
            'deleted_at'=>NULL,
            'deleted_by'=>NULL
        ];

        $this->column_order = array(
            'nama_pekerjaan'
            ,'no_kontrak_or_po'
            ,'tgl_kontrak_or_po'
            ,'nilai_kontrak_or_po'
            ,'tgl_mulai'
            ,'tgl_selesai'
            ,'target_mulai'
            ,'target_selesai'
            ,'description'
            ,'status'); //field yang ada di table user
        $this->column_search = array('nama_pekerjaan'
        ,'no_kontrak_or_po'
        ,'tgl_kontrak_or_po'
        ,'nilai_kontrak_or_po'
        ,'tgl_mulai'
        ,'tgl_selesai'
        ,'target_mulai'
        ,'target_selesai'
        ,'description'
        ,'status'); //field yang diizin untuk pencarian 
        $this->order = array('tgl_kontrak_or_po' => 'asc'); // default order 
    
	}
    function not_soft_delete(){
        $this->db->where('deleted_at is null');
    }
    function is_soft_delete(){
        $this->db->where('deleted_at is not null');
    }
	function get($id) {
		$this->db->where('id', $id);
        $query = $this->db->get($this->table)->row();
        return $query;
    }
    function result() {
        $query = $this->db->get($this->table)->result();
        return $query;
    }

    function insert($data){
        $data['created_at']=date('Y-m-d H:i:s');
        $data['created_by']=$this->session->userdata('username');
        // print_r($data);
        // die();
        $this->db->insert($this->table,$data);
        $query = $this->db->affected_rows();
        return $query;
    }
    function insert_batch($data){
        $this->db->insert_batch($data);
        $query = $this->db->affected_rows();
        return $query;
    }
    function update($id,$data) {
        $data['updated_at']=date('Y-m-d H:i:s');
        $data['updated_by']=$this->session->userdata('username');
		$this->db->where('id', $id);
        $this->db->update($this->table,$data);
        $query = $this->db->affected_rows();
        return $query;
    }

    function soft_delete($id) {
		$this->db->where('id', $id);
        $this->db->update($this->table,$this->data_delete);
        $query = $this->db->affected_rows();
        return $query;
    }
    function soft_undelete($id) {
		$this->db->where('id', $id);
        $this->db->update($this->table,$this->data_undelete);
        $query = $this->db->affected_rows();
        return $query;
    }


    private function _get_datatables_query()
    {
            $this->db->from($this->table);
           $i = 0;
     
            foreach ($this->column_search as $item) // looping awal
            {
                    if($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
                    {
                             
                            if($i===0) // looping awal
                            {
                                    $this->db->group_start(); 
                                    $this->db->like($item, $_POST['search']['value']);
                            }
                            else
                            {
                                    $this->db->or_like($item, $_POST['search']['value']);
                            }

                            if(count($this->column_search) - 1 == $i) 
                                    $this->db->group_end(); 
                    }
                    $i++;
            }
             
            if(isset($_POST['order'])) 
            {
                    $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
            } 
            else if(isset($this->order))
            {
                    $order = $this->order;
                    $this->db->order_by(key($order), $order[key($order)]);
            }
    }

    function get_datatables()
    {
            $this->_get_datatables_query();
            if($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
            $query = $this->db->get();
            return $query->result();
    }

    function count_filtered()
    {
            $this->_get_datatables_query();
            $query = $this->db->get();
            return $query->num_rows();
    }

    public function count_all()
    {
            $this->db->from($this->table);
           return $this->db->count_all_results();
    }

}
