<?php
namespace Core\App;
use PDO;
use PDOException;

class Database {
    private string $host = 'localhost';
    private string $username = 'root';
    private string $password = 'namaku123';
    private string $database = 'phpdasar';
    private $db_handler, $statement;

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
            $this->db_handler = new PDO($data_source_name, $this->username, $this->password, $options);
        } catch (PDOException $exception) {
            die($exception->getMessage());
        }
    }

    /**
     * @param string $query
     */
    public function query(string $query): void {
        $this->statement = $this->db_handler->prepare($query);
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
        $this->statement->bindValue($param, $value, $type);
    }

    public function execute(): void {
        $this->statement->execute();
    }

    /**
     * @return array
     */
    public function fetchAll(): array {
        $this->execute();
        return $this->statement->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * @return array
     */
    public function fetch(): array {
        $this->execute();
        return $this->statement->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * @return int
     */
    public function rowCount(): int {
        return $this->statement->rowCount();
    }
}