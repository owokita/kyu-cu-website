<?php

class USER extends SESSION
{
    public function getuserbyid($id)
    {
        $sql= "SELECT * from user where user_id = ?;";
        $data = $this->query_1($sql, $id);
        return $data;
    }
    //checks if the email address entered alredy exists in the db
    public function getuserbyEmail($email)
    {
        $sql = ("SELECT user_email FROM user WHERE user_email = ?");
        
        if ($stmt = $this->conn()->prepare($sql)) {
            $stmt->execute([$email]);
            if ($stmt->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function getAllUsers($start, $limit)
    {
        $sql = ("SELECT *  FROM user LIMIT $start,$limit");
        $data = $this->queryNone($sql);
        return $data;
    }

    public function count($field,$table)
    {
        $sql = "SELECT count($field) as id from $table";
        $stmt = $this->conn()->prepare($sql);
        $stmt->execute();
        $row =$stmt->fetch();
        return $row;
    }

    public function countSpecific($field,$table,$condition)
    {
        $sql = "SELECT count($field) as id from $table where $field = '$condition';";
        $stmt = $this->conn()->prepare($sql);
        $stmt->execute();
        $row =$stmt->fetch();
        return $row;
    }


    //Gets all records of the  privided email
    public function getUserDataByEmail($email)
    {
        $sql = ("SELECT * FROM user WHERE user_email = ?");
        return $data= $this->query_1($sql, $email);
    }


    //gets all the admin records
    public function getAdmins(){
        $sql = "SELECT user_id,user_email,user_fname,user_lname,user_phobeNo,admin_registered_by from user 
        inner join admin on user_id = admin_fk_user_id;";
        $data = $this->queryNone($sql);
        return $data;
    }

    

}
