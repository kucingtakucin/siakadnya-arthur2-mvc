<?php
use Core\App\Controller;

class MahasiswaController extends Controller {

    public function index(): void {
        // TODO: Implement index() method.
        $data = [
            'title' => 'Daftar Mahasiswa',
            'mahasiswa' => $this->model('Mahasiswa')->all()
        ];
        $this->view('Mahasiswa/index', $data);
    }

    public function detail($id){
        $data = [
            'title' => 'Detail Mahasiswa',
            'mahasiswa' => $this->model('Mahasiswa')->single($id),
        ];
        $this->view('Mahasiswa/detail', $data);
    }

    public function update(){

    }

    public function delete(){

    }
}