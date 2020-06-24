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

    public function show(): void {
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
        if ($contentType === "application/json"):
            $content = trim(file_get_contents("php://input"));
            try {
                $data = json_decode($content, true, 512, JSON_THROW_ON_ERROR);
            } catch (JsonException $exception) {
                echo "<h1>{$exception->getMessage()}</h1>";
                die;
            }

            try {
                echo json_encode($this->model()->single($data['id']), JSON_THROW_ON_ERROR);
            } catch (JsonException $exception) {
                echo "<h1>{$exception->getMessage()}</h1>";
                die;
            }
        endif;
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

    public function update(): void {
        try {
            if ($this->model()->save() > 0):
                Flasher::set('berhasil', 'diupdate', 'success');
                header('Location: ' . BASE_URL . 'Mahasiswa');
                exit(0);
            else:
                Flasher::set('gagal', 'diupdate', 'danger');
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