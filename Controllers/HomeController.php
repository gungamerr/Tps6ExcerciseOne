<?php
    namespace Controllers;
    use Controllers\CelphoneController as CelphoneController;

    class HomeController
    {
        private $cellController;
        
        public function __construct()
        {
            
        }

        public function Index($message = "")
        {
            require_once(VIEWS_PATH."add-cellphone.php");
        }        

        public function List($message = "")
        {
            $this->cellController = new CelphoneController();
            $data = $this->cellController->getData();
            require(VIEWS_PATH."cellphone-list.php");
        }
    }
?>