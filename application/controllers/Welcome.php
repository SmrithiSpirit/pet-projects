<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	
	public function __construct(){
	parent::__construct();
	$this->load->model('order_model');
	}

	public function index(){
		$this->load->view('welcome_message');
	}
	
	public function chat(){
		$state=$this->input->post('state');
		$data=$this->input->post('input');
		switch($state){
			case 'start' :
					if($data=="1"){
						print_R('order');
					}
					else if($data=="2"){
						print_R('track');
					}
					else{
						print_R('invalid');
					}
			break;
			
			case 'order' :
					if (is_numeric($data)){
						print_R('addr');
					}
					else{
						print_R('num');
					}
			break;
			
			case 'addr' :
					if (is_numeric($data)) {
						print_R('txtonly');
					}
					else{
						print_R('pmode');
					}
			break;
			
			case 'pmode' :
					if($data=="1"){
						print_R('confirm');
					}
					else{
						print_R('invalid');
					}
			break;
			
			case 'auth' :
					if($data=="1"){
						$param['quan']=$this->input->post('quan');
						$param['addr']=$this->input->post('addr');
						$param['pmode']=$this->input->post('pmode');
						$order_id=$this->order_model->createOrder($param);
						if($order_id){
							print_r('<div class="left"><div class="author-name"><span class="flaticon-pizza-1 navbar-brand" style="color:#fac564"></span><small class="chat-date"></small></div><div class="chat-message active">Your order has been successfully placed!</br> here is your order number: '.$order_id.'</div></div>');
						}
					}
					else if($data=="2"){
						print_R('fail');
					}
					else{
						print_R('invalid');
					}
			break;
			
			case 'complete' :
					print_R('restart');
					
			break;
			
			case 'track' :
					$status=$this->order_model->getOrderStatus($data);
					if($status=="cooking"){
						print_r('<div class="left"><div class="author-name"><span class="flaticon-pizza-1 navbar-brand" style="color:#fac564"></span><small class="chat-date"></small></div><div class="chat-message active">Your order is being cooked</div></div>');
					}
					else if($status=="delivery"){
						print_r('<div class="left"><div class="author-name"><span class="flaticon-pizza-1 navbar-brand" style="color:#fac564"></span><small class="chat-date"></small></div><div class="chat-message active">Your order is being delivered</div></div>');
					}
					else if($status=="completed"){
						print_r('<div class="left"><div class="author-name"><span class="flaticon-pizza-1 navbar-brand" style="color:#fac564"></span><small class="chat-date"></small></div><div class="chat-message active">Your order has been completed!</div></div>');	
					}
					else{
						print_r('<div class="left"><div class="author-name"><span class="flaticon-pizza-1 navbar-brand" style="color:#fac564"></span><small class="chat-date"></small></div><div class="chat-message active">Invalid Order number!</div></div>');	
					}
			break;
		}
	}
}
