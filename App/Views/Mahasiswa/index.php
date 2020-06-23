<main>
    <div class="container pt-5">
        <h1 class="display-4 text-center font-weight-bold">Daftar Mahasiswa</h1>
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
                <td><p class="mt-auto mb-auto d-block"><?= $student['nama'] ?></p></td>
                <td><p class="mt-auto mb-auto d-block"><?= $student['nim'] ?></p></td>
                <td><p class="mt-auto mb-auto d-block"><?= $student['jurusan'] ?></p></td>
                <td><p class="mt-auto mb-auto d-block"><?= $student['angkatan'] ?></p></td>
                <td class="d-flex flex-column align-items-center justify-content-center">
                    <a href="<?= BASE_URL ?>Mahasiswa/detail/<?= $student['id'] ?>" class="badge badge-info mb-2">Detail</a>
                    <a href="<?= BASE_URL ?>Mahasiswa/update/<?= $student['id'] ?>" class="badge badge-warning mt-2 mb-2">Update</a>
                    <a href="<?= BASE_URL ?>Mahasiswa/delete/<?= $student['id'] ?>" class="badge badge-danger mt-2">Delete</a>
                </td>
            </tr>
            <?php $i++; endforeach ?>
            </tbody>
        </table>
    </div>
</main>