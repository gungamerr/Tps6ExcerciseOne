<?php
	namespace Controllers;
	
	use Models\Cellphone as Cellphone;
	use DAO\CelphoneDao as CelphoneDao;

 class CelphoneController
	{
        
		private $cellDao;

		public function __construct()
		{
			$this->cellDao = new CelphoneDao();
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
            $this->cellDao->removeCell($id);
        }

        public function getData()
        {
            return $this->cellDao->getAll();
        }
	}
?>