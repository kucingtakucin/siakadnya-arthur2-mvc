<main>
    <div class="container pt-5">
        <div class="row">
            <div class="col-lg-12">
                <?php use Core\Helper\Flasher;
                Flasher::get() ?>
            </div>
        </div>
        <section id="header" class="mb-3">
            <h1 class="display-4 text-center font-weight-bold">
                Daftar Mahasiswa
            </h1>
            <button type="button" class="btn btn-primary d-block m-auto font-weight-bold" data-toggle="modal" data-target="#insertModal">
            Insert
            </button>
        </section>
        <section id="main">
            <table class="table table-striped">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Nama</th>
                    <th scope="col">NIM</th>
                    <th scope="col">Jurusan</th>
                    <th scope="col">Angkatan</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                <?php
                $i = 1;
                /** @var array $data */
                foreach ($data['mahasiswa'] as $student):?>
                    <tr>
                        <th scope="row"><?= $i ?></th>
                        <td><img src="<?= BASE_URL ?>img/<?= $student['foto'] ?>" alt="<?= $student['nama']?>" width="100" class="img-fluid"></td>
                        <td><p><?= $student['nama'] ?></p></td>
                        <td><p><?= $student['nim'] ?></p></td>
                        <td><p><?= $student['jurusan'] ?></p></td>
                        <td><p><?= $student['angkatan'] ?></p></td>
                        <td class="d-flex flex-column align-items-center justify-content-center">
                            <h5><a href="<?= BASE_URL ?>Mahasiswa/detail/<?= $student['id'] ?>" class="badge badge-info mb-2 mt-3">Detail</a></h5>
                            <h5><a href="<?= BASE_URL ?>Mahasiswa/update/<?= $student['id'] ?>" class="badge badge-warning mt-2 mb-2">Update</a></h5>
                            <h5><button type="button" class="btn badge badge-danger mt-2" data-toggle="modal" data-target="#deleteModal<?= $i ?>">Delete</button></h5>
                        </td>
                    </tr>

                    <!-- Delete Modal -->
                    <div class="modal fade" id="deleteModal<?= $i ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModal<?= $i ?>Label" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteModal<?= $i ?>Label">Delete Data Mahasiswa</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Apakah kamu yakin untuk menghapus data?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <a href="<?= BASE_URL ?>Mahasiswa/delete/<?= $student['id'] ?>" class="btn btn-primary">Delete Data</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php $i++; endforeach ?>
                </tbody>
            </table>
        </section>
    </div>

    <!-- Insert Modal -->
    <div class="modal fade" id="insertModal" tabindex="-1" role="dialog" aria-labelledby="insertModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="<?= BASE_URL ?>Mahasiswa/insert" method="post" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="insertModalLabel">Insert Data Mahasiswa</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nim">NIM</label>
                            <input type="text" class="form-control" maxlength="8" required id="nim" autocomplete="off" name="nim">
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" maxlength="30" required id="nama" autocomplete="off" name="nama">
                        </div>
                        <div class="form-group">
                            <label for="jurusan">Jurusan</label>
                            <select class="form-control custom-select" id="jurusan" required autocomplete="off" name="jurusan">
                                <option selected></option>
                                <option value="Teknik Elektro">Teknik Elektro</option>
                                <option value="Teknik Informatika">Teknik Informatika</option>
                                <option value="Teknik Mesin">Teknik Mesin</option>
                                <option value="Teknik Industri">Teknik Industri</option>
                                <option value="Teknik Sipil">Teknik Sipil</option>
                                <option value="Teknik Lingkungan">Teknik Lingkungan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="angkatan">Angkatan</label>
                            <input type="number" class="form-control" min="0" max="3000" maxlength="4" required id="angkatan" autocomplete="off" name="angkatan">
                        </div>
                        <div class="custom-file">
                            <label for="foto">Foto</label>
                            <input type="file" class="form-control-file" required id="foto" name="foto">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Insert Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>