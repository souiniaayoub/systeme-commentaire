<?php
require 'function.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap.min.css"/>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<div >
    Comments : 
    <span id="cout_comments"><?php echo count_comments($post_id) ?></span>
</div>
<div id="comment-wrapper" data-id="3">
    <?php
    $data = getcomments(1, 0);
    if (isset($data)):
    foreach ($data
             as $comment): ?>
        <div class="comment" data-comment-id="<?php echo $comment['comment_id']; ?>">
            <div class="comment-details">
                <div class="comment-profile">
                    <div class="comment-profile-img">
                        <img src="1374076.jpg"/>
                    </div>
                    <a href="profilelink">username</a>
                </div>
                <div>
                    <div class="comment-body">
                        <?php echo $comment['body'] ?>
                    </div>
                    <div class="likes-container">
                        <div class="like <?php this_user_like_comment($comment['comment_id'], 1) ?>"
                             data-id="<?php echo $comment['comment_id'] ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path
                                        d="M19.406 14.442c1.426-.06 2.594-.858 2.594-2.506 0-1-.986-6.373-1.486-8.25-.714-2.689-2.471-3.686-5.009-3.686-2.283 0-4.079.617-5.336 1.158-2.585 1.113-4.665 1.842-8.169 1.842v9.928c3.086.401 6.43.956 8.4 7.744.483 1.66.972 3.328 2.833 3.328 3.448 0 3.005-5.531 2.196-8.814 1.107-.466 2.767-.692 3.977-.744zm-.207-1.992c-2.749.154-5.06 1.013-6.12 1.556.431 1.747.921 3.462.921 5.533 0 2.505-.781 3.666-1.679.574-1.993-6.859-5.057-8.364-8.321-9.113v-6c2.521-.072 4.72-1.041 6.959-2.005 1.731-.745 4.849-1.495 6.416-.614 1.295.836 1.114 1.734.292 1.661l-.771-.032c-.815-.094-.92 1.068-.109 1.141 0 0 1.321.062 1.745.115.976.123 1.028 1.607-.04 1.551-.457-.024-1.143-.041-1.143-.041-.797-.031-.875 1.078-.141 1.172 0 0 .714.005 1.761.099s1.078 1.609-.004 1.563c-.868-.037-1.069-.027-1.069-.027-.75.005-.874 1.028-.141 1.115l1.394.167c1.075.13 1.105 1.526.05 1.585z"/>
                            </svg>
                            <span><?php echo count_comment_likes($comment['comment_id']) ?></span>
                        </div>
                        <div class="dislike <?php this_user_like_comment($comment['comment_id'], 1) ?>"
                             data-id="<?php echo $comment['comment_id'] ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path
                                        d="M19.406 14.442c1.426-.06 2.594-.858 2.594-2.506 0-1-.986-6.373-1.486-8.25-.714-2.689-2.471-3.686-5.009-3.686-2.283 0-4.079.617-5.336 1.158-2.585 1.113-4.665 1.842-8.169 1.842v9.928c3.086.401 6.43.956 8.4 7.744.483 1.66.972 3.328 2.833 3.328 3.448 0 3.005-5.531 2.196-8.814 1.107-.466 2.767-.692 3.977-.744zm-.207-1.992c-2.749.154-5.06 1.013-6.12 1.556.431 1.747.921 3.462.921 5.533 0 2.505-.781 3.666-1.679.574-1.993-6.859-5.057-8.364-8.321-9.113v-6c2.521-.072 4.72-1.041 6.959-2.005 1.731-.745 4.849-1.495 6.416-.614 1.295.836 1.114 1.734.292 1.661l-.771-.032c-.815-.094-.92 1.068-.109 1.141 0 0 1.321.062 1.745.115.976.123 1.028 1.607-.04 1.551-.457-.024-1.143-.041-1.143-.041-.797-.031-.875 1.078-.141 1.172 0 0 .714.005 1.761.099s1.078 1.609-.004 1.563c-.868-.037-1.069-.027-1.069-.027-.75.005-.874 1.028-.141 1.115l1.394.167c1.075.13 1.105 1.526.05 1.585z"/>
                            </svg>
                            <span><?php echo count_comment_dislikes($comment['comment_id']) ?></span>
                        </div>
                        <!--                            <button>replays</button>-->
                        <!--                            <form action="Comment-get-reply.php" method="post" >-->
                        <!--                                    <button>Reply</button>-->
                        <!--                            </form>-->
                        <div class="reply-count"  data-comment-id="<?php echo $comment['comment_id']; ?>">
                            Replys : <span><?php echo count_replys($comment['comment_id']); ?></span>
                        </div>
                    </div>
                </div>
            </div>
            <!--                Comment Wraper place-->

        </div>
    <?php endforeach ?>
</div>
<?php endif ?>
<div id="show_more_comments" <?php if (count_comments($post_id) <= 3)
    echo "style = 'display : none;'";
?>>
    <form action="more-comments-ajax.php" method="post" onsubmit=" return more_comments();">
        <button type="submit" class="btn btn-outline-danger" name="more-post-submit">More Comments
        </button>
    </form>
</div>
<div id="post-comment">
    <form action="comment-post-ajax.php" method="post" onsubmit=" return post_comment();">
        <!--        onsubmit=" return post_comment();"-->
        <textarea name="comment-post-text"></textarea>
        <button type="submit" class="post-comment btn btn-outline-warning" name="comment-post-submit">post comment
        </button>
    </form>
</div>
<script src="ajquery-3.4.1.js"></script>
<script src="bootstrap.min.js"></script>
<script type='text/javascript' src="jscomment.js"></script>
</body>
</html>