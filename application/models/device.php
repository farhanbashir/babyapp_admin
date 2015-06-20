<?php
Class Device extends CI_Model
{


 function get_total_devices()
 {
     return $this->db->count_all('devices');
 }


 function get_devices()
 {
     $sql = "select * from devices" ;
     $query = $this->db->query($sql);
     $result = $query->result_array();
     $query->free_result();
     return $result;
 }

}
?>