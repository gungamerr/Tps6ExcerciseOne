<?php
	namespace Controllers;
	
	use Models\Cellphone as Cellphone;
	use DAO\CelphoneDao as CelphoneDao;
	use Controllers\HomeController as HomeController;
 class CelphoneController
	{
        
		private $cellDao;
		private $homeC;

		public function __construct()
		{
			$this->cellDao = new CelphoneDao();
			$this->homeC = new HomeController();
		}


		public function agregar($code,$brand,$model,$price)
		{
			

			if(empty($_SESSION["id"]))
			{
				$_SESSION["id"] = 1;

			}else
			{
				
				$aidi = $_SESSION["id"];
				$list = $this->cellDao->getAll();
				foreach ($list as $value) 
				{
					if($aidi === $value->getId())
						$_SESSION["id"]++;
				}

			}


			
			$id = $_SESSION["id"];
			$_SESSION["id"]++;
			$cell = new Cellphone($id,$code,$brand ,$model,$price);
			$this->cellDao->add($cell);
			header("Location: http://localhost/tps/ExerciseOne");
        }
        
        public function remove($id)
        {
			if($this->cellDao->removeCell($id))
			{
				$this->homeC->List();
			}
			
        }

        public function getData()
        {
            return $this->cellDao->getAll();
        }
	}
?>