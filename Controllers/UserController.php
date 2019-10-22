<?php
    namespace Controllers;

    use DAO\UserDao as UserDao;
    class UserController
    {

        private $userDao;


        public function __construct()
        {
            $this->userDao = new UserDao();
        }

        public function Index($message = "")
        {
            require_once(VIEWS_PATH."home.php");
        }
        public function validator($name,$pass)
        {
           // $flag = false;
           
            $arr = $this->userDao->getAll();
            foreach ($arr as $user) 
            {
                if($user->getUsername() == $name && $user->getPassword() == $pass)
                {
                    require_once("Views/add-cellphone.php");
                }
            }
            $this->Index();
        }
    }
?>