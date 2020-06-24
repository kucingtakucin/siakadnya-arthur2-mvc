<?php
use Core\App\Controller;
use Core\Helper\Flasher;

class MahasiswaController extends Controller {

    public function index(): void {
        // TODO: Implement index() method.
        $data = [
            'title' => 'Daftar Mahasiswa',
            'mahasiswa' => $this->model()->all()
        ];
        $this->view('index', $data);
    }

    /**
     * @param $id
     */
    public function detail($id): void {
        $data = [
            'title' => 'Detail Mahasiswa',
            'mahasiswa' => $this->model()->single($id),
        ];
        $this->view('detail', $data);
    }

    public function insert(): void {
        try {
            if ($this->model()->add() > 0):
                Flasher::set('berhasil', 'ditambahkan', 'success');
                header('Location: ' . BASE_URL . 'Mahasiswa');
                exit(0);
            else:
                Flasher::set('gagal', 'ditambahkan', 'danger');
                header('Location: ' . BASE_URL . 'Mahasiswa');
                exit(0);
            endif;
        } catch (Exception $exception) {
            echo "<h1>{$exception->getMessage()}</h1>";
            die;
        }
    }

    /**
     * @param $id
     */
    public function update($id): void {
        try {
            if ($this->model()->save($id) > 0):
                Flasher::set('berhasil', 'ditambahkan', 'success');
                header('Location: ' . BASE_URL . 'Mahasiswa');
                exit(0);
            else:
                Flasher::set('gagal', 'ditambahkan', 'danger');
                header('Location: ' . BASE_URL . 'Mahasiswa');
                exit(0);
            endif;
        } catch (Exception $exception) {
            echo "<h1>{$exception->getMessage()}</h1>";
            die;
        }

    }

    /**
     * @param $id
     */
    public function delete($id): void {
        try {
            if ($this->model()->remove($id) > 0):
                Flasher::set('berhasil', 'dihapus', 'success');
                header('Location: ' . BASE_URL . 'Mahasiswa');
                exit(0);
            else:
                Flasher::set('gagal', 'dihapus', 'danger');
                header('Location: ' . BASE_URL . 'Mahasiswa');
                exit(0);
            endif;
        } catch (Exception $exception) {
            echo "<h1>{$exception->getMessage()}</h1>";
            die;
        }
    }
}