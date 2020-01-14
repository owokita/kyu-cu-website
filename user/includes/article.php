<?php

class ARTICLE extends USER
{
    protected $art_id;
    protected $art_title;
    protected $art_content;
    protected $art_poster;
    protected $art_img;
    protected $art_categ = "comp";
    
    public function setArt_id($art_id)
    {
        $this->art_id = $art_id;
    }
    public function getArt_id()
    {
        return $this->art_id;
    }
    public function setArt_title($art_title)
    {
        $this->art_title = $art_title;
    }
    public function getArt_title()
    {
        return $this->art_title;
    }
    public function setArt_content($art_content)
    {
        $this->art_content = $art_content;
    }
    public function getArt_content()
    {
        return $this->art_content;
    }
    public function setArt_poster($art_poster)
    {
        $this->art_poster =$this->getSessionID();
    }
    public function getArt_poster()
    {
        return $this->art_poster;
    }
    public function setArt_img($art_img)
    {
        $this->art_img = $art_img;
    }
    public function getArt_img()
    {
        return $this->art_img;
    }
    public function setArt_categ($art_categ)
    {
        $this->art_categ = $art_categ;
    }
    public function getArt_categ()
    {
        return $this->art_categ;
    }
    
    public function __construct()
    {
    }

    public function insertArt()
    {
        $sql ="INSERT INTO article (article_tittle, article_text, articleimg, article_fk_user_id, category_fk_category_name) VALUES (:title, :content, :img, :sessid, :category);
        ";
        $stmt= $this->conn()->prepare($sql);
        $stmt->execute(['title' =>$this->art_title,
                        'content' =>$this->art_content,
                        'img'=>$this->art_img,
                        'sessid'=>$this->art_poster,
                        'category'=>$this->art_categ,
        ]);
    }


    public function getArt($id)
    {
        $sql = "SELECT * FROM article where article_fk_user_id = $id";
        $data = $this->queryNone($sql);
        return $data;
    }

    public function getArtUnverified()
    {
        $sql = "SELECT * FROM article where article_status = 0";
        $data = $this->queryNone($sql);
        return $data;
    }

    public function getArtVerified()
    {
        $sql = "SELECT article_id,article_tittle,article_text,article_pub_date,articleimg,user_fname,user_lname,article_fk_user_id,likes,article_status,category_fk_category_name,verified_by  FROM article 
        inner join user on user_id= article_fk_user_id
        where article_status = 1 ";
        $data = $this->queryNone($sql);
        return $data;
    }

    public function getArtSpecific($id)
    {
        $sql = "SELECT * FROM article where article_id = $id";
        $data = $this->queryNone($sql);
        return $data;
    }
    public function getArtSpecificWhere($id)
    {
        $sql = "SELECT article_id,article_tittle,article_text,article_pub_date,articleimg,user_fname,user_lname,article_fk_user_id,likes,article_status,category_fk_category_name,verified_by  FROM article 
        inner join user on user_id= article_fk_user_id
        where article_id = $id ";
        $data = $this->query_1($sql, $id);
        if (empty($data)) {
            return false;
        } else{
            return $data;
        }
        
    }

    public function getArtResent()
    {
        $sql = "SELECT article_id,article_tittle,articleimg  FROM article where article_status = 1 order by article_id DESC LIMIT 5 ;";
        $data = $this->queryNone($sql);
        return $data;
    }

    public function getArtPorpular()
    {
        $sql = "SELECT article_id,article_tittle,article_text,article_pub_date,articleimg,user_fname,user_lname,article_fk_user_id,likes,article_status,category_fk_category_name,verified_by  FROM article 
        inner join user on user_id= article_fk_user_id order by article_id DESC LIMIT 5 ;";
        $data = $this->queryNone($sql);
        return $data;
    }

    public function getcomments($id)
    {
        $sql ="SELECT comment,user_fname,user_lname from article_comments 
        inner join user on article_comments_fk_user_id = user_id
        where article_comment_fk_article_id =$id";
        $data = $this->queryNone($sql);
        return $data;
    }
    public function get_reply_comment($parent_id = 0, $marginleft = 0)
    {
        $sql = "SELECT * from article_comments inner join user on article_comments_fk_user_id = user_id WHERE parent_comment_id = '".$parent_id."'";
           $output = '';
           $result = $this->queryNone($sql);
           if ($parent_id == 0) {
               $marginleft = 0;
           } else {
               $marginleft = $marginleft + 30;
           }
           
               foreach ($result as $row) {
                   $output .= '
                   <div class="row flex-row" style="margin-left:' . $marginleft . 'px">
                   <!-- <div class="col-1"><img loading="lazy" src="user/images/userimgs/user.jpg"
                           class="img-fluid rounded-circle" alt=""></div> -->
                           <!-- comment -->
                   <div class="col-11">
                       <div class="row p-0 m-0 flex-column ">
                           <div class="col px-0 "><span class="text-primary"> '.$row["user_fname"]. ' '.$row["user_fname"] .' </span> - <span class="font-weight-lighter font-italic timeago">'.$row["article_comment_date"]. '</span> </div>
                           <div class="col px-0"> '.$row["comment"]. '
                               Blanditiis, corporis? </div>
                               <div class="col px-0 d-flex justify-content-end"> <input class="btn btn-primary btn-sm py-0 reply" id="'.$row["article_comments_id"].'" type="submit" value="Reply"> </div>
                       </div>
                   </div>
               </div>
          ';
                   $output .= $this->get_reply_comment( $row["article_comments_id"], $marginleft);
               }
           
           return $output;
    }

    
}
