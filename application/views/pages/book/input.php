<div class="container-fluid">

  <section class="mt-3">
    <h3 align="center">Tambah Data Buku</h3>

    <form method="POST" action="<?= base_url('book/insertAction') ?>" enctype="multipart/form-data">
      <div class="mb-3">
        <label for="exampleInputJudul" class="form-label">Judul * </label>
        <input type="text" name="judul_buku" class="form-control" id="exampleInputJudul" required>
      </div>

      <div class="mb-3">
        <label for="exampleInputTahun" class="form-label">Tahun * </label>
        <input type="text" name="tahun" class="form-control" id="exampleInputTahun" required>
      </div>

      <div class="mb-3">
        <label for="exampleInputPenerbit" class="form-label">Penerbit * </label>

        <select class="form-control" name="penerbit" id="penerbit" required>
          <option value="">Select Penerbit</option>

          <?php foreach ($list_penerbit as $key => $value) : ?>
            <option value="<?= $value->id_penerbit ?>"><?= $value->nama_penerbit ?></option>
          <?php endforeach ?>

        </select>
      </div>

      <div class="mb-3">
        <label for="exampleInputGambar" class="form-label">Gambar</label>
        <input type="file" name="file" class="form-control" id="exampleInputGambar">
        <?= $this->session->flashdata('error_img') ?>
      </div>

      <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>
  </section>

</div>