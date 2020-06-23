<main>
    <div class="container mt-5 d-flex align-items-center justify-content-center">
        <div class="card rounded-lg shadow" style="max-width: 500px;">
            <img src="<?= BASE_URL ?>img/<?= /** @var array $data */
            $data['mahasiswa']['foto']?>" class="card-img" alt="<?= $data['mahasiswa']['id'] ?>">
            <div class="card-body">
                <h3 class="card-title m-0 text-center"><?= $data['mahasiswa']['nama'] ?></h3>
                <h4 class="card-subtitle m-0 text-center text-muted"><?= $data['mahasiswa']['nim'] ?></h4>
                <h4 class="card-text m-0 text-center"><?= $data['mahasiswa']['jurusan'] ?></h4>
                <h4 class="card-text m-0 text-center"><?= $data['mahasiswa']['angkatan'] ?></h4>
                <a href="<?= BASE_URL ?>Mahasiswa" class="btn btn-primary mt-3">Kembali</a>
            </div>
        </div>
    </div>
</main>