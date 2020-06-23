<main>
    <div class="container pt-5">
        <div class="jumbotron d-flex flex-column align-items-center justify-content-center">
            <h1 class="display-4 font-weight-bold">Selamat datang di Website saya</h1>
            <p class="lead">Halo namaku <?= /** @var array $data */
                $data['nama'] ?>, biasa dipanggil <?= $data['panggil'] ?>!</p>
            <hr class="my-4">
            <p>Web Developer | Mobile App Developer | Cyber Security</p>
            <a class="btn btn-primary btn-lg" href="<?= BASE_URL ?>About" role="button">About Me</a>
        </div>
    </div>
</main>