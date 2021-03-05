<?php
class Message {

    public static function setMsg($text, $type) {
        if ($type == 'error') {
            $_SESSION['error'] = $text;
        } else {
            $_SESSION['info'] = $text;  
        }
    }

    public static function display() {
        if(isset($_SESSION['error'])) {
            echo '<div class="alert alert-danger">'.$_SESSION['error'].'</div>';
            unset($_SESSION['error']);
        }
        if(isset($_SESSION['info'])) {
            echo '<div class="alert alert-danger">'.$_SESSION['info'].'</div>';
            unset($_SESSION['info']);
        }
    }

}
