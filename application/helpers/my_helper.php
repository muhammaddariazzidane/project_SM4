<?php

function cek_aktif($is_active)
{
  $data = [
    'is_active' => $is_active,
  ];
  if ($data['is_active'] == 1) {
    return "checked='checked'";
  }
}
function is_logged_in()
{
  $ci = get_instance();
  if (!$ci->session->userdata('username')) {
    redirect('auth');
  }
}
// function
