<?php

class Model_book extends CI_Model
{
  public function tampilData()
  {
    $tampil = $this->db->query("SELECT * FROM tabel_buku LEFT JOIN tabel_penerbit ON tabel_penerbit.id_penerbit = tabel_buku.penerbit ORDER BY id_buku DESC");

    return $tampil->result();
    // return $tampil->result_array();
  }

  public function tampilDataById($id)
  {
    $this->db->where('id_buku', $id);

    return $this->db->get('tabel_buku')->row();
  }

  public function tambahData($data)
  {
    $this->db->insert('tabel_buku', $data);
  }

  public function ubahData($data, $id)
  {
    $this->db->where('id_buku', $id);
    $this->db->update('tabel_buku', $data);
  }

  public function hapusData($id)
  {
    $this->db->where('id_buku', $id)
      ->delete('tabel_buku');
  }
}
