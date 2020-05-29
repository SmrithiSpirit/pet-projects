<?php
class Order_model extends CI_Model {
    function __construct(){
        // Call the Model constructor
        parent::__construct();
 	  	
    }

	public function createOrder($param){
		$data = array(
			'quantity' => $param['quan'],
			'price' => $param['quan']*5,
			'address' => $param['addr'],
			'payment_mode' => $param['pmode'],
			'datetime' => date('Y-m-d H:i:s'),
			'status' => 'cooking',
			'order_id' => $this->get_ORDERID()
   
        ); 
	
        $this->db->insert('sans-pizza-orders',$data);
        $val= $this->db->insert_id();
		
		$this->db->select('order_id');
		$this->db->from('sans-pizza-orders');
		$this->db->where('order_no',$val);
		$ans= $this->db->get();
		$ans=$ans->result();
		$ans=$ans[0];
		return $ans->order_id;					
	}

	function getOrderStatus($order_id){
		$this->db->select('status');
		$this->db->from('sans-pizza-orders');
		$this->db->where('order_id',$order_id);
		$ans= $this->db->get();
		$ans=$ans->result();
		if($ans==null){
			return $ans;
		}
		else{
			$ans=$ans[0];
			return $ans->status;
		}		
    }
	
	function get_ORDERID(){
		$charid = strtoupper(md5(uniqid(rand(), true)));
		$hyphen = chr(45);// "-"
		$uuid =
		substr($charid, 0, 4).$hyphen
		.substr($charid, 4, 4).$hyphen
		.substr($charid,8, 4).$hyphen
		.substr($charid,12, 4).$hyphen
		.substr($charid,26,4);
		return $uuid;
	}
	
 }
 ?>