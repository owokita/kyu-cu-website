

class INDEX {
    constructor(){
       
        this.porpular = document.getElementById('porpularPost');
    }

    listen(){

    }
    //this function will get allt the aricles with highest number of likes
    porpularpost(){
        $.ajax({
            url: "user/includes/article.inc.php",
            method: "POST",
            data: { porpularArticles: 'porpularArticles' },
            dataType: "json",
            success: function (data) {
                console.log(data);
                var output = '';
                for(let i in data)
                {   let string = data[i].content.article_text;
                    output += `
                    
                    <div class="col-md-6 w3ls-left wow fadeInDown " data-wow-duration=".8s" data-wow-delay=".2s">
                        
                        <div class="tc-ch">
                            <div class="tch-img">
                                <a href="article.php?id=">
                                    <img loading="lazy" style="max-height:200px" src="user/includes/images/${data[i].content.articleimg}" class="img-responsive" alt=""></a>
                            </div>

                            <h3><a href="article.php?id=${data[i].content.article_id}">${data[i].content.article_tittle}</a></h3>

                            <h6>By <a href="article.php">${data[i].content.user_fname} ${data[i].content.user_lname} </a>${data[i].content.article_pub_date}</h6>
                            <div class="d-flex">
                                <div class="mx-3 comment"><span> <i class="far fa-comment-alt"></i> </span><span
                                        id="coment_count">${data[i].comments}</span> </div>
                                <div class="mx-3"><span> <i
                                            id="<?php echo $urlID ?>"
                                            onclick="react(this,<?php echo $urlID ?>)"
                                            class="fas fa-thumbs-up"></i> <span id="count">${data[i].likes}</span> </span> </div>
                                <span id="loginfirst" class=""></span>
                            </div>
                            <div class="readmore" > ${string}</div>
                            <div class="bht1">
                                <a href="article.php">Read More</a>
                            </div>
                            <div class="soci">
                                <ul>

                                    <li class=""><a class="" href="${data[i].content.article_id}"><i class="fab fa-whatsapp-square fa-2x"></i></a>
                                    </li>

                                </ul>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                `; 

                }
                $('#porpularPost').html(output)
                $('.readmore').readmore({ speed: 75,collapsedHeight: 80, lessLink: '',moreLink: '' });
                
                

                         
            },
            error: function (error) {
                console.log(error);
                
            }
        })
    }

}

const index = new INDEX;
index.porpularpost();