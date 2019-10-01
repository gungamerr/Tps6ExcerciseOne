<?php
	namespace Controllers;

	class CellphoneController
	{
		public function List($message = "")
		{
			require_once(VIEWS_PATH."cellphone-list.php");	
		}
	}
?>