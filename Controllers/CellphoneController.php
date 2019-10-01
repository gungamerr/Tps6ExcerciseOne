<?php
	namespace Controller;

	class CellphoneController
	{
		public function Index($message = "")
		{
			require_once(VIEWS_PATH."cellphone-list.php");	
		}
	}
?>