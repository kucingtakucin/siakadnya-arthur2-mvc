<?php
use Core\App\Model;

class MahasiswaModel extends Model {

    public function add(){
        $query = "INSERT INTO {$this->tableName} (nama, nim, jurusan, angkatan, foto) VALUES (:nama, :nim, :jurusan, :angkatan, :foto)";
        $this->db->query($query);
        $this->db->bind('nama', $_POST['nama']);
        $this->db->bind('nim', $_POST['nim']);
        $this->db->bind('jurusan', $_POST['jurusan']);
        $this->db->bind('angkatan', $_POST['angkatan']);
        $this->db->bind('foto', $this->upload_image());
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function upload_image(): string {
        $filename = $_FILES['foto']['name'];
        $filesize = $_FILES['foto']['size'];
        $errorfile = $_FILES['foto']['error'];
        $tmpname = $_FILES['foto']['tmp_name'];
        if ($errorfile === 4):
            throw new \RuntimeException("Gagal mengupload gambar karena kesalahan yang tidak diketahui!", 1);
        endif;

        $validextension = ['jpg', 'jpeg', 'png', 'svg'];
        $array = explode('.', $filename);
        $prefixfilename = strtolower($array[0]);
        $fileextension = strtolower(end($array));
        if (!in_array($fileextension, $validextension)):
            throw new \RuntimeException("Yang kamu masukkan bukan gambar!", 1);
        endif;
        if ($filesize > 1000000):
            throw new \RuntimeException("Ukuran gambar kamu terlalu besar! Max. 1MB", 1);
        endif;

        $newfilename = uniqid($prefixfilename, true) . ".$fileextension";
        move_uploaded_file($tmpname, "img/$newfilename");
        return $newfilename;
    }
}