<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
  public function getUsers()
  {
    $this->db->select('user.id as uID,  user.username, user.image, user.email, user.role_id, user.created_at, user_role.role');
    $this->db->join('user_role', 'user.role_id = user_role.id');
    $this->db->from('user');
    $query = $this->db->order_by('created_at DESC')->get();
    return $query->result();
  }
  public function getUserByID($uID)
  {
    $this->db->select('user.id as uID, user.username,user.image, user.password, user.image , user.email, user.role_id, user.created_at, user_role.role');
    $this->db->join('user_role', 'user.role_id = user_role.id');
    $this->db->from('user');
    $this->db->where('user.id =', $uID);
    $query = $this->db->get();
    return $query->row();
  }
  public function update($uID)
  {
    $data = [
      'username' => $this->input->post('username'),
      'email' => $this->input->post('email'),
      'role_id' => $this->input->post('role_id'),
    ];

    $this->db->where('id', $uID);
    $this->db->update('user', $data);
  }
}
