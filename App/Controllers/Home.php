<?php
use Core\App\Controller;

class Home extends Controller {

    public function index(): void {
        $data['title'] = 'Home';
        $this->view(__CLASS__ . '/index', $data);
    }
}