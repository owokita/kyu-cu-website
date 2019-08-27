<?php
require_once 'init.php';
class ARTICLE extends USER
{
    protected $art_id;
    protected $art_title;
    protected $art_content;
    protected $art_poster;
    protected $art_img = "dfdfd";
    protected $art_categ = "comp";
    
    function setArt_id($art_id) { $this->art_id = $art_id; }
    function getArt_id() { return $this->art_id; }
    function setArt_title($art_title) { $this->art_title = $art_title; }
    function getArt_title() { return $this->art_title; }
    function setArt_content($art_content) { $this->art_content = $art_content; }
    function getArt_content() { return $this->art_content; }
    function setArt_poster($art_poster)
    {
        $this->art_poster =$this->getSessionID();
    }
    function getArt_poster() { return $this->art_poster; }
    function setArt_img($art_img) { $this->art_img = $art_img; }
    function getArt_img() { return $this->art_img; }
    function setArt_categ($art_categ) { $this->art_categ = $art_categ; }
    function getArt_categ() { return $this->art_categ; }
    
    public function __construct()
    {

    }

    public  function insertArt()
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

}


if (isset($_POST['post_article'])) {
    $artOBJ = new ARTICLE();
    $artOBJ->setArt_title($_POST['post-title']);
    $artOBJ->setArt_content($_POST['editor1']);
  $artOBJ->setArt_poster($artOBJ->getSessionID());



    if ($artOBJ->insertArt()) {
       echo "data has been inserted";
    } else {
        echo "data has failed";
    }
    

} else {
   echo "you are trying to access this page the wrong way";
}
