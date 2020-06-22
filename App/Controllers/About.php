<?php
use Core\App\Controller;

class About extends Controller {

    public function index(): void {
        $this->view(__CLASS__ . '/' . __METHOD__);
    }

}