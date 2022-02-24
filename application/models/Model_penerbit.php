<?php

class Model_penerbit extends CI_Model
{
  public function tampilData()
  {
    // $tampil = $this->db->query("SELECT * FROM tabel_penerbit");

    $tampil = $this->db->get('tabel_penerbit');

    // $this->db->select('*')
    //   ->where()
    //   ->order_by()
    //   ->group_by()
    //   ->join('tabel_book', 'tabel_penerbit.id_penerbit = tabel_buku.penerbit', 'left');

    // $tampil = $this->db->get('tabel_penerbit');

    return $tampil->result();
    // return $tampil->result_array();
  }

  public function tambahData()
  {
  }

  public function ubahData()
  {
  }

  public function hapusData()
  {
  }
}
