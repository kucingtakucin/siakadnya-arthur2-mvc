<?php

class User {
    private string $nama = "Adam";

    public function getNama(): string {
        return $this->nama;
    }
}