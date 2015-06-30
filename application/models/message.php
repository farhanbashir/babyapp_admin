<?php
Class Message extends CI_Model
{


 function get_total_messages()
 {
     return $this->db->count_all('message');
 }


 function get_messages($page)
 {
 	$start =  $page;
     $limit = $this->config->item('pagination_limit');

     $sql = "select * from message order by id desc limit $start,$limit" ;
     $query = $this->db->query($sql);
     $result = $query->result_array();
     $query->free_result();
     return $result;
 }

 
 function create_message($data)
 {
    $this->db->insert('message',$data);
    return $this->db->insert_id();
    //return ($this->db->affected_rows() != 1) ? false : true;
 }

 
}
?>