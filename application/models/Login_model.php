<?php
class Login_model extends CI_Model
{
 function can_login($email, $password)
 {
  $this->db->where('email', $email);
  $query = $this->db->get('user_reg');
  if($query->num_rows() > 0)
  {
   foreach($query->result() as $row)
   {
  
    //  $store_password = $this->encrypt->decode($row->password);
     if($password == $password)
     {
      $this->session->set_userdata('id', $row->id);
     }
     else
     {
      return 'Wrong Password';
     }
    // }
  
   }
  }
  else
  {
   return 'Wrong Email Address';
  }
 }
}
