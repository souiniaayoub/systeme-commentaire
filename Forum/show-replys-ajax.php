<?php
require 'function.php';
if (isset($_POST['comment_id'])):
    ?>
    <div class="replays-wrapper" data-comment-id ="<?php echo $_POST['comment_id'];?>" data-count-replys = "3" >
        <?php $datare = getreplys($_POST['comment_id'],0);
        if (isset($datare) && !empty($datare)):
            ?>
            <?php foreach ($datare as $rep): ?>
            <div class="reply">
                <div class="reply-details">
                    <div class="reply-profile">
                        <div class="reply-profile-img">
                            <img src="1374076.jpg"/>
                        </div>
                        <a href="profilelink">username</a>
                    </div>
                    <div>
                        <div class="reply-body">
                            <?php echo $rep['body']; ?>
                        </div>
                        <div class="likes-container">
                            <div class="like <?php this_user_like_reply($rep['reply_id'], 1) ?>"
                                 data-id="replayid">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                     viewBox="0 0 24 24">
                                    <path
                                            d="M19.406 14.442c1.426-.06 2.594-.858 2.594-2.506 0-1-.986-6.373-1.486-8.25-.714-2.689-2.471-3.686-5.009-3.686-2.283 0-4.079.617-5.336 1.158-2.585 1.113-4.665 1.842-8.169 1.842v9.928c3.086.401 6.43.956 8.4 7.744.483 1.66.972 3.328 2.833 3.328 3.448 0 3.005-5.531 2.196-8.814 1.107-.466 2.767-.692 3.977-.744zm-.207-1.992c-2.749.154-5.06 1.013-6.12 1.556.431 1.747.921 3.462.921 5.533 0 2.505-.781 3.666-1.679.574-1.993-6.859-5.057-8.364-8.321-9.113v-6c2.521-.072 4.72-1.041 6.959-2.005 1.731-.745 4.849-1.495 6.416-.614 1.295.836 1.114 1.734.292 1.661l-.771-.032c-.815-.094-.92 1.068-.109 1.141 0 0 1.321.062 1.745.115.976.123 1.028 1.607-.04 1.551-.457-.024-1.143-.041-1.143-.041-.797-.031-.875 1.078-.141 1.172 0 0 .714.005 1.761.099s1.078 1.609-.004 1.563c-.868-.037-1.069-.027-1.069-.027-.75.005-.874 1.028-.141 1.115l1.394.167c1.075.13 1.105 1.526.05 1.585z"/>
                                </svg>
                                <span><?php echo count_reply_likes($rep['reply_id']) ?></span>
                            </div>
                            <div class="dislike <?php echo this_user_like_reply($rep['reply_id'], 1) ?>"
                                 data-id="<?php echo $rep['reply_id']; ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                     viewBox="0 0 24 24">
                                    <path
                                            d="M19.406 14.442c1.426-.06 2.594-.858 2.594-2.506 0-1-.986-6.373-1.486-8.25-.714-2.689-2.471-3.686-5.009-3.686-2.283 0-4.079.617-5.336 1.158-2.585 1.113-4.665 1.842-8.169 1.842v9.928c3.086.401 6.43.956 8.4 7.744.483 1.66.972 3.328 2.833 3.328 3.448 0 3.005-5.531 2.196-8.814 1.107-.466 2.767-.692 3.977-.744zm-.207-1.992c-2.749.154-5.06 1.013-6.12 1.556.431 1.747.921 3.462.921 5.533 0 2.505-.781 3.666-1.679.574-1.993-6.859-5.057-8.364-8.321-9.113v-6c2.521-.072 4.72-1.041 6.959-2.005 1.731-.745 4.849-1.495 6.416-.614 1.295.836 1.114 1.734.292 1.661l-.771-.032c-.815-.094-.92 1.068-.109 1.141 0 0 1.321.062 1.745.115.976.123 1.028 1.607-.04 1.551-.457-.024-1.143-.041-1.143-.041-.797-.031-.875 1.078-.141 1.172 0 0 .714.005 1.761.099s1.078 1.609-.004 1.563c-.868-.037-1.069-.027-1.069-.027-.75.005-.874 1.028-.141 1.115l1.394.167c1.075.13 1.105 1.526.05 1.585z"/>
                                </svg>
                                <span><?php echo count_reply_dislikes($rep['reply_id']) ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
            <!--                    <div>-->
            <!--                        <textarea>-->
            <!---->
            <!--                        </textarea>-->
            <!--                        <button type="button"></button>-->
            <!--                    </div>-->
        <?php endif ?>
        <div class="show_more_replys" <?php if(count_replys($_POST['comment_id'])<=3)
            echo "style = 'display : none;'";
        ?>>
            <form onsubmit=" return more_replys(this.parentElement.parentElement);">
                <button type="submit" class="btn btn-outline-success" name="more-post-submit">More Replys</button>
            </form>
        </div>
        <div class="post-reply">
            <form onsubmit=" return reply_comment(this);">
                <textarea name="reply-post-text"></textarea>
                <button type="submit" class="post-reply btn btn-outline-primary" name="reply-post-submit" data-id="<?php echo $_POST['comment_id']?>">post reply
                </button>
            </form>
        </div>
    </div>

<?php    endif;?>
