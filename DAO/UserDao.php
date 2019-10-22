<?php 
    namespace DAO;

    use Models\ClientUser as ClientUser;
    class UserDao
    {

       
       public function getAll()
       {
           return $this->retrieveData();
       }
        
        private function retrieveData()
		{
			$userList = array();

			if(file_exists("Data/user.json"))
			{
				$jsonContent = file_get_contents("Data/user.json");

				$arrayTodecode = ($jsonContent) ? json_decode($jsonContent,true) : array();

				foreach ($arrayTodecode as $values) 
				{
					$user = new ClientUser($values["id"],$values["username"],$values["password"]);
					array_push($userList, $user);
				}
				return $userList;
			}

			return $list = array();
		}
        
    }
?>