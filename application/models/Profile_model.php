<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile_model extends CI_Model
{
  public function getuser($email)
  {
    $this->db->select('user.id as uID,  user.username,user.image, user.email, user.role_id, user.created_at, user_role.role');
    $this->db->join('user_role', 'user.role_id = user_role.id');
    $this->db->from('user');
    $this->db->where('user.email =', $email);
    $query = $this->db->get();
    return $query->row();
  }
}
