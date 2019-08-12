<?php

class SESSION extends DATABASE
{
    public $signed_in = false;
    public $session_id;
    public $usertype;
    
    public function __construct()
    {
        
    }
    
    public function login($user)
    {
        if ($user) {
            $_SESSION['user_id'] = $user;
            $this->signed_in = true;
            $this->session_id= $user;
        }
    }

    public function is_admin(){
        if (isset($_SESSION['user_type'])) {
            if ($_SESSION['user_type'] === "admin" ) {
                redirect("index.php");
            } 
        } 
    }

    

    

    public function redirect($location)
    {
        header("Location: {$location}");
    }
}
