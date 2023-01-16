<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Register_Controller extends CI_Controller {

 public function __construct()
 {
  parent::__construct();
  if($this->session->userdata('id'))
  {
   redirect('private_area');
  }
  $this->load->library('form_validation');
  $this->load->library('encryption');
  $this->load->model('register_model');
 }

 function index()
 {
  $this->load->view('register');
 }

 function validation()
 {
  $this->form_validation->set_rules('user_name', 'Name', 'required|trim');
  $this->form_validation->set_rules('user_email', 'Email Address', 'required|trim|valid_email|is_unique[user_reg.email]');
  $this->form_validation->set_rules('user_password', 'Password', 'required');
 $password=$this->input->post('user_password');
  if($this->form_validation->run())
  {
   $verification_key = md5(rand());
//    $encrypted_password = $this->encrypt->encode( $password);
//    print_r($encrypted_password);
//    exit();
 
   $data = array(
    'name'  => $this->input->post('user_name'),
    'email'  => $this->input->post('user_email'),
    'password' => $password,
    'encr_password' => $verification_key
   );
   $id = $this->register_model->insert($data);
   redirect('login');
  }
  else
  {
   $this->index();
  }
 }


}

?>