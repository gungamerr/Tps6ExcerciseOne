<?php
    namespace Controllers;
    use Controllers\CelphoneController as CelphoneController;

    class HomeController
    {
        private $cellController;
        
        public function __construct()
        {
            $this->cellController = new CelphoneController();
        }

        public function Index($message = "")
        {
            require_once(VIEWS_PATH."add-cellphone.php");
        }        

        public function List($message = "")
        {
            $data = $this->cellController->getData();
            require_once(VIEWS_PATH."cellphone-list.php");
        }
    }
?>