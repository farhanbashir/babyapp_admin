<?php
Class Milestone extends CI_Model
{


 function get_total_milestones()
 {
     return $this->db->count_all('milestones');
 }

function get_feed_detail($feed_id)
{
    $sql = "select f.*,m.milestone_name from feeds f 
            inner join milestones m on f.milestone_id=m.milestone_id 
            where f.feed_id=$feed_id" ;
    $query = $this->db->query($sql);
    $result = $query->result_array();
    $query->free_result();
    return $result[0];
}

 function get_milestones()
 {
     $sql = "select m.* from milestones m 
            order by m.milestone_id asc" ;
     $query = $this->db->query($sql);
     $result = $query->result_array();
     $query->free_result();
     return $result;
 }

 function edit_feed($feed_id,$data)
 {
    $this->db->where('id', $feed_id);
    $this->db->update('feeds',$data);
    return ($this->db->affected_rows() != 1) ? false : true;
 }

 
}
?>