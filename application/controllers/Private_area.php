<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Private_area extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    if (!$this->session->userdata('id')) {
      redirect('login');
    }
    $this->load->model('Add_school_model');
  }

  function index()
  {
    $query = $this->db->get('school_list');
    $page_data['schoollist'] = $query;
    $page_data['title'] = 'School list';
    $page_data['page'] = $this->load->view('school', $page_data,TRUE);
    $this->load->view('index', $page_data);

  }
  function about()
  {
    
    $page_data['title'] = 'About Us';
    $page_data['page'] = $this->load->view('about', $page_data,TRUE);
    $this->load->view('index', $page_data);

  }
  function create()
  {
    if ($this->uri->segment(3)) {
      $school_id = $this->uri->segment(3);
      $this->db->where('id', $school_id);
      $query = $this->db->get('school_list');
      if ($query->num_rows() > 0) {
        $data['school_data'] = $query->result();
      }
      } else {
        $data = [];
      }
      $page_data['title'] = 'Add School';
    $page_data['page'] = $this->load->view('add_school', $data,TRUE);
    $this->load->view('index', $page_data);
  }
  function logout()
  {
    $data = $this->session->all_userdata();
    foreach ($data as $row => $rows_value) {
      $this->session->unset_userdata($row);
    }
    redirect('login');
  }

  public function citylist()
  {
    $city = $this->input->post('city');
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://simplemaps.com/static/data/country-cities/in/in_spreadsheet.json',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'GET',
    ));
    $response = curl_exec($curl);
    curl_close($curl);
    $response = json_decode($response);
    $citylist = [];
    for ($i = 1; $i < count($response); $i++) {
      $arr = $response[$i];
      $ele = $city;
      if (in_array($ele, $response[$i])) {
        array_push($citylist, $response[$i][0]);
      }
    }
    return $this->output->set_content_type('application/json')->set_output(json_encode($citylist));
  }
  public function savedata()
  {
    $this->load->database();
    
    $school_name = $this->input->post('school_name');
    $school_location = $this->input->post('school_location');
    $school_id = $this->input->post('school_id');
    // $inputCity = $this->input->post('inputCity');
    // $inputState = $this->input->post('inputState');    
    if (empty($school_name) || empty($school_location )) {
      $errorMSG .= "<li>school information is required</li>"; 
    }else{
      if ($school_id) {
        $data = array(
          'school_name' => $school_name,
          'school_location' => $school_location,
          'id' => $school_id,
        );
        $result = $this->Add_school_model->update($data);
      } else {
        $data = array(
          'school_name' => $school_name,
          'school_location' => $school_location, 
        );
        $result = $this->Add_school_model->insert($data);      
      }
    }
    if(empty($errorMSG)){
      echo json_encode(['code'=>200, 'msg'=>'School name saved successfully']);
      exit;
    }
    else{
      echo json_encode(['code'=>404, 'msg'=>'Error ']);
    }
  }
  public function delete_school()
  {
    $school_id = $this->input->post('school_id');
    if ($school_id) {
    $result = $this->Add_school_model->delete( $school_id);
    echo json_encode(['code'=>200, 'msg'=>'School Data Deleted successfully']);
      exit;
    }
    else{
      echo json_encode(['code'=>404, 'msg'=>'School Data Not Deleted successfully ']);
    }


  }
}
