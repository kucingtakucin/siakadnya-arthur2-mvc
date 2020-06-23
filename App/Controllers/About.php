<?php
use Core\App\Controller;

class About extends Controller {

    public function index(): void {
        $data = [
            'title' => 'About'
        ];
        $this->view(__CLASS__ . '/index', $data);
    }
}