<?php
namespace Core\App;
abstract class Controller {

    public function view(string $view, array $data = []): void{
        require_once "../App/Views/Templates/header.php";
        require_once "../App/Views/{$view}.php";
        require_once "../App/Views/Templates/footer.php";
    }
}