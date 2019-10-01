<?php

	namespace DAO;

	use Models\Cellphone as Cellphone;

	class CelphoneDao
	{
		public function add(Cellphone $cell )
		{
			$list = array();

			$list = $this->retrieveData();

			array_push($list, $cell);

			$this->saveData($list);

			}

		public function getAll()
		{
			//$list = 
			return $this->retrieveData();
		}	

		private function saveData($list)
		{
			$arrayToencode = array();

			foreach ($list as $cell) {

				$valueArray["id"] = $cell->getId();
				$valueArray["code"] = $cell->getCode();
				$valueArray["brand"] = $cell->getBrand();
				$valueArray["model"] = $cell->getModel();
				$valueArray["price"] = $cell->getPrice();

				array_push($arrayToencode, $valueArray);

			}

			$jsonContent = json_encode($arrayToencode,JSON_PRETTY_PRINT);

			file_put_contents("Data/cell.json", $jsonContent);


		}


		private function retrieveData()
		{
			$cellList = array();

			if(file_exists("Data/cell.json"))
			{
				$jsonContent = file_get_contents("Data/cell.json");

				$arrayTodecode = ($jsonContent) ? json_decode($jsonContent,true) : array();

				foreach ($arrayTodecode as $values) 
				{
					$cell = new Cellphone($values["id"],$values["code"],$values["brand"],$values["model"],
						$values["price"]);
					array_push($cellList, $cell);
				}
				return $cellList;
			}

			return $list = array();
		}
	}
?>