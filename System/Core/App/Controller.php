<?php
namespace Core\App;

abstract class Controller {

    /**
     * @return mixed
     */
    abstract public function index();

    /**
     * @param string $model
     * @return object
     */
    public function model(string $model): object {
        require_once "../App/Models/{$model}Model.php";
        $model = "{$model}Model";
        return new $model();
    }

    /**
     * @param string $view
     * @param array $data
     */
    public function view(string $view, array $data = []): void{
        require_once "../App/Views/Templates/header.php";
        require_once "../App/Views/{$view}.php";
        require_once "../App/Views/Templates/footer.php";
    }
}