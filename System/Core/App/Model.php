<?php
namespace Core\App;

abstract class Model {
    protected Database $db;
    protected string $tableName;

    public function __construct(){
        $this->db = new Database();
        if (isset($_SERVER['REDIRECT_URL'])):
            $this->tableName = strtolower(explode('/', $_SERVER['REDIRECT_URL'])[2]);
        endif;
    }

    public function all(): array {
        $query = "SELECT * FROM {$this->tableName}";
        $this->db->query($query);
        return $this->db->fetchAll();
    }

    public function single($id): array {
        $query = "SELECT * FROM {$this->tableName} WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        return $this->db->fetch();
    }

}