<?php
Class User extends CI_Model
{
 function login($username, $password)
 {
   $this -> db -> select('id, username, password');
   $this -> db -> from('users');
   $this -> db -> where('username', $username);
   $this -> db -> where('password', MD5($password));
   $this -> db -> limit(1);

   $query = $this -> db -> get();

   if($query -> num_rows() == 1)
   {
     return $query->result();
   }
   else
   {
     return false;
   }
 }

 function get_total_users()
 {
     return $this->db->count_all('users');
 }

function get_user_detail($user_id)
{
    $sql = "select * from users where id=$user_id" ;
    $query = $this->db->query($sql);
    $result = $query->result_array();
    $query->free_result();
    return $result[0];
}

function get_admin()
{
    $sql = "select * from users where username='admin@wasl.com'" ;
    $query = $this->db->query($sql);
    $result = $query->result_array();
    $query->free_result();
    return $result[0];
}

 function get_users()
 {
     $sql = "select * from users order by id desc" ;
     $query = $this->db->query($sql);
     $result = $query->result_array();
     $query->free_result();
     return $result;
 }

 function get_latest_five_users()
 {
    $sql = "select * from users where username!='admin@wasl.com' order by id desc limit 5";
    $query = $this->db->query($sql);
    $result = $query->result_array();
    $query->free_result();
    return $result;
 }

 function deactivate_user($user_id)
 {
    $sql = "update users set is_active=0 where id=$user_id";
    $query = $this->db->query($sql);

 }

 function activate_user($user_id)
 {
    $sql = "update users set is_active=1 where id=$user_id";
    $query = $this->db->query($sql);

 }

 function edit_user($user_id,$data)
 {
    $this->db->where('id', $user_id);
    $this->db->update('users',$data);
    return ($this->db->affected_rows() != 1) ? false : true;
 }

}
?>