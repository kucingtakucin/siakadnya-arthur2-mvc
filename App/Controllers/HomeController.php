<?php
use Core\App\Controller;

class HomeController extends Controller {

    public function index(): void {
        // TODO: Implement index() method.
        $data = [
            'title' => 'Home',
            'nama' => 'Adam',
            'panggil' => 'Arthur'
        ];
        $this->view('Home/index', $data);
    }
}