<?php

class Model_auth extends CI_Model
{
  public function login($username, $password)
  {
    $this->db->where('username', $username)
      ->where('password', $password);

    return $this->db->get('tabel_user');
  }

  public function register($data)
  {
    $this->db->insert('tabel_user', $data);
  }

  public function cekUsername($username)
  {
    $this->db->where('username', $username);
    return $this->db->limit(1)->get('tabel_user')->row();
  }
}
