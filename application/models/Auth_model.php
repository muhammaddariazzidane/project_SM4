<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{
  public function store()
  {
    $data = [
      'username' =>  $this->input->post('username'),
      'image' =>  "default.jpg",
      'email' =>  htmlspecialchars($this->input->post('email', TRUE)),
      'password' =>  password_hash($this->input->post('password'), PASSWORD_DEFAULT),
      'role_id' =>  3,
      'created_at' =>  time(),
    ];
    // var_dump($data['username']);
    $this->db->insert('user', $data);
  }
  public function store_admin()
  {
    $data = [
      'username' =>  $this->input->post('username'),
      'image' =>  "default.jpg",
      'email' =>  htmlspecialchars($this->input->post('email', TRUE)),
      'password' =>  password_hash($this->input->post('password'), PASSWORD_DEFAULT),
      'role_id' =>  1,
      'created_at' =>  time(),
    ];
    // var_dump($data['username']);
    $this->db->insert('user', $data);
  }
}
