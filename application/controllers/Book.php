<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Book extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    check_not_login();
    $this->load->model('Model_book');
    $this->load->model('Model_penerbit', 'm_penerbit');
  }

  // public function test()
  // {
  //   // load header
  //   $this->load->view('layout_admin/header');
  //   // load nav
  //   $this->load->view('layout_admin/nav');
  //   // load content pages
  //   $this->load->view('pages/book/tampil2');
  //   // load footer
  //   $this->load->view('layout_admin/footer');
  // }

  public function index()
  {

    $data = array(
      'list' => $this->Model_book->tampilData(),
      'nama'  => 'Azzam',
    );

    $data_header = array(
      'header'  => 'Tampil Buku',
    );

    // load header
    $this->load->view('layout_admin/header', $data_header);
    // load nav
    $this->load->view('layout_admin/nav');
    // load content pages
    $this->load->view('pages/book/tampil2', $data);
    // load footer
    $this->load->view('layout_admin/footer');
  }

  public function insertBook()
  {
    $data = array(
      'list_penerbit' => $this->m_penerbit->tampilData(),
    );

    // load header
    $this->load->view('layout_admin/header');
    // load nav
    $this->load->view('layout_admin/nav');
    // load content pages
    $this->load->view('pages/book/input', $data);
    // load footer
    $this->load->view('layout_admin/footer');
  }

  public function insertAction()
  {
    $judul = $this->input->post('judul_buku');
    $tahun = $this->input->post('tahun');
    $penerbit = $this->input->post('penerbit');

    // call function upload data
    $img = $this->uploadFile();

    if ($img['status'] == 'error') {
      $this->session->set_flashdata('error_img', '<span>' . $img['error'] . '</span>');
      $this->insertBook();
    } else {
      $data = array(
        'judul'     => $this->input->post('judul_buku'),
        'tahun'     => $tahun,
        'penerbit'  => $penerbit,
        'gambar'    => $img['upload_data']['file_name']
      );

      $this->Model_book->tambahData($data);
      $this->session->set_flashdata('message', 'Tambah Data Sukses');
      redirect(base_url('book'));
    }
  }

  public function updateBook($id)
  {
    $id_buku = $id;

    $data_buku = $this->Model_book->tampilDataById($id);

    $data = array(
      'row' => $this->Model_book->tampilDataById($id),
      'list_penerbit' => $this->m_penerbit->tampilData(),
    );

    // print_r($data_buku);

    // load header
    $this->load->view('layout_admin/header');
    // load nav
    $this->load->view('layout_admin/nav');
    // load content pages
    $this->load->view('pages/book/edit', $data);
    // load footer
    $this->load->view('layout_admin/footer');
  }

  public function updateAction()
  {
    $judul = $this->input->post('judul_buku');
    $tahun = $this->input->post('tahun');
    $penerbit = $this->input->post('penerbit');
    $id_buku = $this->input->post('id_buku');

    // call function upload data
    $img = $this->uploadFile();

    if ($_FILES['file']['name'] != '' and $img['status'] == 'error') {
      $this->session->set_flashdata('error_img', '<span>' . $img['error'] . '</span>');
      $this->updateBook($id_buku);
    } else {

      $row = $this->Model_book->tampilDataById($id_buku);
      if ($row->gambar != null and $_FILES['file']['name'] != '') {
        unlink("./uploads/$row->gambar");
      }

      $data = array(
        'judul'     => $judul,
        'tahun'     => $tahun,
        'penerbit'  => $penerbit,
      );

      if ($_FILES['file']['name'] != '') $data['gambar'] = $img['upload_data']['file_name'];

      $this->Model_book->ubahData($data, $id_buku);
      $this->session->set_flashdata('message', 'Ubah Data Sukses');
      redirect(base_url('book'));
    }
  }

  public function deleteBook($id)
  {
    $row = $this->Model_book->tampilDataById($id);
    if ($row->gambar != null) {
      unlink("./uploads/$row->gambar");
    }

    $this->Model_book->hapusData($id);
    $this->session->set_flashdata('message', 'Hapus Data Sukses');
    redirect(base_url('book'));
  }

  public function uploadFile()
  {
    $config['upload_path']          = './uploads/';
    $config['allowed_types']        = 'gif|jpg|png|jpeg';
    $config['max_size']             = 1024;

    $this->load->library('upload', $config);

    if (!$this->upload->do_upload('file')) {
      return array('error' => $this->upload->display_errors(), 'status' => 'error');
    } else {
      return array('upload_data' => $this->upload->data(), 'status' => 'success');
    }
  }
}
