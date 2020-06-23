<?php
use \Core\App\Controller;

class Mahasiswa extends Controller {

    public function index(): void {
        // TODO: Implement index() method.
        $data = [
            'title' => 'Daftar Mahasiswa',
        ];
        $this->view(__CLASS__ . '/index', $data);
    }
}