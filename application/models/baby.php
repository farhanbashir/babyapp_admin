<?php
Class Baby extends CI_Model
{


 function get_total_babies()
 {
     return $this->db->count_all('babies');
 }

function get_user_detail($user_id)
{
    $sql = "select * from users where user_id=$user_id" ;
    $query = $this->db->query($sql);
    $result = $query->result_array();
    $query->free_result();
    return $result[0];
}

function get_admin()
{
    $sql = "select * from users where username='admin@dadone.com'" ;
    $query = $this->db->query($sql);
    $result = $query->result_array();
    $query->free_result();
    return $result[0];
}

 function get_users()
 {
     $sql = "select * from users order by user_id desc" ;
     $query = $this->db->query($sql);
     $result = $query->result_array();
     $query->free_result();
     return $result;
 }

 function get_latest_five_users()
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