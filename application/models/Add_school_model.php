<?php
class Add_school_model extends CI_Model
{
 function update($data)
 { 
    $this->db->where('id', $data['id']);
    $this->db->update('school_list', $data);

    if($this->db->affected_rows() > 0){
        return $data;
     } else {
        return false;
     }
 }
 function insert($data)
 {
  $this->db->insert('school_list', $data);
  return $this->db->insert_id();
 }
 function delete($data)
 {
    $this->db->where('id', $data);
    $this->db->delete('school_list');
 }


 
}

?>