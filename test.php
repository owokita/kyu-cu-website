


<?php

?php
                                    $artOBJ = new  ARTICLE();
                                    $comments = $artOBJ->getcomments($article['article_id']);
                                    foreach ($comments as $comment):
                                     ?>
                                    <div class="col  ml-5 mt-1 flex-fill text-right border rounded">
                                        <?php  echo $comment['comment'] ?>
                                        <br><span class="font-italic font-weight-bold" style="font-size: 0.7em"><?php  echo $comment['user_fname']; echo " "; echo $comment['user_lname'];  ?></span>
                                    </div>
                                    <?php endforeach ?>
                                    