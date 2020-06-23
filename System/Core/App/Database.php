<?php
namespace Core\App;
use PDO;
use PDOException;

class Database {
    private string $host = 'localhost';
    private string $username = 'root';
    private string $password = 'namaku123';
    private string $database = 'phpdasar';
    private $dbh, $stmt;

    /**
     * Database constructor.
     */
    public function __construct(){
        $data_source_name = "mysql:host={$this->host};dbname={$this->database}";
        $options = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];
        try {
            $this->dbh = new PDO($data_source_name, $this->username, $this->password, $options);
        } catch (PDOException $exception) {
            die($exception->getMessage());
        }
    }

    /**
     * @param string $query
     */
    public function query(string $query): void {
        $this->stmt = $this->dbh->prepare($query);
    }

    /**
     * @param $param
     * @param $value
     * @param null $type
     */
    public function bind($param, $value, $type = null): void {
        if (is_null($type)):
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        endif;
        $this->stmt->bindValue($param, $value, $type);
    }

    public function execute(): void {
        $this->stmt->execute();
    }

    /**
     * @return array
     */
    public function fetchAll(): array {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * @return array
     */
    public function fetch(): array {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }
}