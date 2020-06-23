<?php
use Core\App\Model;

class MahasiswaModel extends Model {

    public function all(): array {
        $this->db->query("SELECT * FROM mahasiswa");
        return $this->db->fetchAll();
    }

    public function single($id): array {
        $this->db->query("SELECT * FROM mahasiswa WHERE id = :id");
        $this->db->bind('id', $id);
        return $this->db->fetch();
    }
}