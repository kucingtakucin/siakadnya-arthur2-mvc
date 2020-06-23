<?php
namespace Core\Helper;

class Flasher {

    public static function set($message, $action, $type){
        $_SESSION['flash'] = [
            'message' => $message,
            'action' => $action,
            'type' => $type,
        ];
    }

    public static function get(){
        if (isset($_SESSION['flash'])):
            echo '
            <div class="alert alert-' . $_SESSION['flash']['type'] .' alert-dismissible fade show" role="alert">
                Data Mahasiswa <strong>' . $_SESSION['flash']['message'] . '</strong> ' . $_SESSION['flash']['action'] . '
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>            
            ';
            unset($_SESSION['flash']);
        endif;
    }
}