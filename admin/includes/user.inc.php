<?php

class USER extends DATABASE
{
    protected $db_table = "user";
    public $userId;
    public $userEmail;
    public $fname;
    public $lname;
    public $phoneNo;
    private $password;
    public $joindate;
    private $usertype;
    public $userimg;

    function getuserbyid(){
        $sql= "SELECT rm_no from room  WHERE fkrm_std_id IS NULL;";
        
        $data=[];
        
    }


}
