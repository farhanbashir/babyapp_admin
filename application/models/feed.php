<?php
Class Feed extends CI_Model
{


 function get_total_feeds()
 {
     return $this->db->count_all('feeds');
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

 function get_feeds($page)
 {
    $start =  $page;
    $limit = $this->config->item('pagination_limit');

     $sql = "select f.*,m.milestone_name from feeds f 
            left join milestones m on f.milestone_id=m.milestone_id 
            order by f.feed_id asc limit $start,$limit" ;
     $query = $this->db->query($sql);
     $result = $query->result_array();
     $query->free_result();
     return $result;
 }

 function get_feed_for_month($month)
 {
    $sql = "select * from feeds where `to`=$month and is_active=1" ;
     $query = $this->db->query($sql);
     $result = $query->result_array();
     $query->free_result();
     if(count($result) > 0)
     {
        return $result[0];   
     }
     else
     {
        return false;
     }   
  
 }

 function edit_feed($feed_id,$data)
 {
    $this->db->where('feed_id', $feed_id);
    $this->db->update('feeds',$data);
    return ($this->db->affected_rows() != 1) ? false : true;
 }

 function create_feed($data)
 {
    $this->db->insert('feeds',$data);
    return $this->db->insert_id();
    //return ($this->db->affected_rows() != 1) ? false : true;
 }

 function deactivate_feed($feed_id)
 {
    $sql = "update feeds set is_active=0 where feed_id=$feed_id";
    $query = $this->db->query($sql);

 }

 function activate_feed($feed_id)
 {
    $sql = "update feeds set is_active=1 where feed_id=$feed_id";
    $query = $this->db->query($sql);

 }
 
}
?>