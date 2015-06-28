<?php
Class Baby extends CI_Model
{


 function get_total_babies()
 {
     return $this->db->count_all('babies');
 }

function get_baby_detail($baby_id)
{
    $sql = "select b.*, concat(u.first_name,' ',u.last_name) as parent from babies b 
            inner join users u on u.user_id=b.user_id
             where baby_id=$baby_id" ;
    $query = $this->db->query($sql);
    $result = $query->result_array();
    $query->free_result();
    return $result[0];
}


 function get_babies()
 {
     $sql = "select b.*, concat(u.first_name,' ',u.last_name) as parent from babies b 
            inner join users u on u.user_id=b.user_id
            where b.baby_id=59  
            order by baby_id desc" ;
     $query = $this->db->query($sql);
     $result = $query->result_array();
     $query->free_result();
     return $result;
 }

 function get_latest_five_babies()
 {
    $sql = "select * from users where is_admin=0 order by user_id desc limit 5";
    $query = $this->db->query($sql);
    $result = $query->result_array();
    $query->free_result();
    return $result;
 }

 function deactivate_user($user_id)
 {
    $sql = "update users set is_active=0 where user_id=$user_id";
    $query = $this->db->query($sql);

 }

 function activate_user($user_id)
 {
    $sql = "update users set is_active=1 where user_id=$user_id";
    $query = $this->db->query($sql);

 }

 function edit_user($user_id,$data)
 {
    $this->db->where('user_id', $user_id);
    $this->db->update('users',$data);
    return ($this->db->affected_rows() != 1) ? false : true;
 }

}
?>