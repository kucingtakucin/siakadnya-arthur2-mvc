<?php
use Core\App\Controller;

class About extends Controller {

    public function index(): void {
        $data['title'] = 'About';
        $this->view(__CLASS__ . '/index', $data);
    }

    public function page(): void {
        $data['title'] = 'Page';
        $this->view(__CLASS__ . '/page', $data);
    }

}