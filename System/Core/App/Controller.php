<?php
namespace Core\App;

abstract class Controller {
    protected string $className;

    /**
     * Controller constructor.
     */
    public function __construct(){
        if (isset($_SERVER['REDIRECT_URL'])):
            $this->className = explode('/', $_SERVER['REDIRECT_URL'])[2];
            if (!file_exists("../App/Controllers/{$this->className}Controller.php")):
                $this->className = 'Home';
            endif;
        else: $this->className = 'Home';
        endif;
    }

    /**
     * @return mixed
     */
    abstract public function index();

    /**
     * @return object
     */
    public function model(): object {
        require_once "../App/Models/{$this->className}Model.php";
        $model = "{$this->className}Model";
        return new $model();
    }

    /**
     * @param string $view
     * @param array $data
     */
    public function view(string $view, array $data = []): void{
        require_once "../App/Views/Templates/header.php";
        require_once "../App/Views/{$this->className}/{$view}.php";
        require_once "../App/Views/Templates/footer.php";
    }
}