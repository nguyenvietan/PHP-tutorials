<?php
abstract class Controller {
    protected $request;
    protected $action;

    public function __construct($action, $request) {
        $this->action = $action;
        $this->request = $request;
    }

    public function executeAction() {
        return $this->{$this->action}();
    }

    protected function returnView($viewModel, $fullView) {
        $view = strtolower('views/'.get_class($this).'/'.$this->action.'.php');
        // echo $view.'</br>';
        if ($fullView) {
            require('views/main.php');
        } else {
            require($view);
        }
    }
}
?>

