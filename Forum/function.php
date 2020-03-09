<?php
$post_id = 1;
$user_id = 1;
$db = mysqli_connect('localhost', 'root', '', 'forum') or die("Cant Connect To The DB");
//like('comment', 2);
//like('post', 2);
//like('reply', 2);
//dislike('comment', 2);
//dislike('post', 2);
//dislike('reply', 2);
/*
function like($type, $id)
{
    global $db; //this refer to the global var $db
    global $user_id;
    $is_liked_post_by_user = "SELECT pos_nega FROM likes WHERE user_id = " . $user_id . " and ";
    $insert = "INSERT INTO likes (user_id,post_id,comment_id,reply_id,like_type,pos_nega) VALUES (" . $user_id . ",";
    $update = "UPDATE likes set pos_nega = 1 WHERE user_id = " . $user_id . " and ";
    if ($type == "comment") {
        $is_liked_post_by_user = $is_liked_post_by_user . "comment_id = " . $id;
        $insert = $insert . "-1," . $id . ",-1,1,1)";
        $update = $update . "comment_id = " . $id;
    } else {
        if ($type == "reply") {
            $is_liked_post_by_user = $is_liked_post_by_user . "reply_id = " . $id;
            $insert = $insert . "-1,-1," . $id . ",2,1)";
            $update = $update . "reply_id = " . $id;

        } else {
            if ($type == "post") {
                $is_liked_post_by_user = $is_liked_post_by_user . "post_id = " . $id;
                $insert = $insert . $id . ",-1,-1,0,1)";
                $update = $update . "post_id = " . $id;
            }
        }
    }
    if ($type != 'post' && $type != 'reply' && $type != 'comment') {
        echo "type error";
    } else {
        echo $update;
        $results = mysqli_query($db, $is_liked_post_by_user);
        if (mysqli_num_rows($results) == 0) {
            mysqli_query($db, $insert);
        } else {
            mysqli_query($db, $update);
        }
    }
}*/
/*
function dislike($type, $id)
{
    global $db;
    global $user_id;
    $is_liked_post_by_user = "SELECT pos_nega FROM likes WHERE user_id = " . $user_id . " and ";
    $insert = "INSERT INTO likes (user_id,post_id,comment_id,reply_id,like_type,pos_nega) VALUES (" . $user_id . ",";
    $update = "UPDATE likes set pos_nega = -1 WHERE user_id = " . $user_id . " and ";
    if ($type == "comment") {
        $is_liked_post_by_user = $is_liked_post_by_user . "comment_id = " . $id;
        $insert = $insert . "-1," . $id . ",-1,1,-1)";
        $update = $update . "comment_id = " . $id;
    } else {
        if ($type == "reply") {
            $is_liked_post_by_user = $is_liked_post_by_user . "reply_id = " . $id;
            $insert = $insert . "-1,-1," . $id . ",2,-1)";
            $update = $update . "reply_id = " . $id;

        } else {
            if ($type == "post") {
                $is_liked_post_by_user = $is_liked_post_by_user . "post_id = " . $id;
                $insert = $insert . $id . ",-1,-1,0,-1)";
                $update = $update . "post_id = " . $id;
            }
        }
    }
    $results = mysqli_query($db, $is_liked_post_by_user);
    if (mysqli_num_rows($results) == 0) {
        mysqli_query($db, $insert);
    } else {
        mysqli_query($db, $update);
    }
}*/

function getcomments($postid,$from)
{
    global $db;
   // $sql = "SELECT * FROM comment WHERE post_id = " . $postid . " ORDER BY created_at DESC" ;/*."LIMIT 7"*/
    $sql = "SELECT * FROM comment WHERE post_id = " . $postid . " ORDER BY created_at DESC LIMIT $from,3" ;/*."LIMIT 7"*/
    //  $results = $db->query($sql);
    $results = mysqli_query($db, $sql);
    return mysqli_fetch_all($results, MYSQLI_ASSOC);
}

function getreplys($commentid ,$from)
{
    global $db;
    $sql = "SELECT * FROM reply WHERE comment_id = " . $commentid . " ORDER BY created_at DESC LIMIT $from,3";
    //  $results = $db->query($sql);
    $results = mysqli_query($db, $sql);
    $data = mysqli_fetch_all($results, MYSQLI_ASSOC);
    return $data;
}

function count_post_likes($post_id)
{
    global $db;
    $sql = "SELECT COUNT(*) AS num FROM post_likes WHERE value = 1 and  post_id = " . $post_id;
    $results = mysqli_query($db, $sql);
    $data = mysqli_fetch_assoc($results);
    return $data['num'];
}

function count_reply_likes($reply_id)
{
    global $db;
    $sql = "SELECT COUNT(*) AS num FROM reply_likes WHERE value = 1  and reply_id = " . $reply_id;
    $results = mysqli_query($db, $sql);
    $data = mysqli_fetch_assoc($results);
    return $data['num'];
}

function count_comment_likes($comment_id)
{
    global $db;
    $sql = "SELECT COUNT(*) AS num FROM comment_likes WHERE value = 1 and comment_id = " . $comment_id;
    $results = mysqli_query($db, $sql);
    $data = mysqli_fetch_assoc($results);
    return $data['num'];

}

function count_post_dislikes($post_id)
{
    global $db;
    $sql = "SELECT COUNT(*) AS num FROM post_likes WHERE value = -1  and post_id = " . $post_id;
    $results = mysqli_query($db, $sql);
    $data = mysqli_fetch_assoc($results);
    return $data['num'];
}

function count_reply_dislikes($reply_id)
{
    global $db;
    $sql = "SELECT COUNT(*) AS num FROM reply_likes WHERE value = -1  and reply_id = " . $reply_id;
    $results = mysqli_query($db, $sql);
    $data = mysqli_fetch_assoc($results);
    return $data['num'];
}

function count_comment_dislikes($comment_id)
{
    global $db;
    $sql = "SELECT COUNT(*) AS num FROM comment_likes WHERE value = -1  and comment_id = " . $comment_id;
    $results = mysqli_query($db, $sql);
    $data = mysqli_fetch_assoc($results);
    return $data['num'];
}

function this_user_like_comment($comment_id, $value)
{
    global $db;
    global $user_id;
    $sql = "SELECT COUNT(*) AS num FROM comment_likes WHERE value = $value and comment_id = " . $comment_id . " and user_id = $user_id";
    $results = mysqli_query($db, $sql);
    $data = mysqli_fetch_assoc($results);
    if ($data['num'] == 1)
        return "likes";
}

function this_user_like_reply($reply_id, $value)
{
    global $db;
    global $user_id;
    $sql = "SELECT COUNT(*) AS num FROM reply_likes WHERE value = $value and  reply_id = " . $reply_id . " and user_id = $user_id";
    $results = mysqli_query($db, $sql);
    $data = mysqli_fetch_assoc($results);
    if ($data['num'] == 1)
        return "likes";
}

function get_user_info($user_id)
{
    global $db;
    $sql = "SELECT * FROM user WHERE   user_id = " . $user_id;
    $results = mysqli_query($db, $sql);
    $data = mysqli_fetch_assoc($results);
    return $data;
}

function count_comments($post_id){
    global $db;
    $sql = "SELECT COUNT(*) as N FROM comment WHERE   post_id = " . $post_id;
    $results = mysqli_query($db, $sql);
    $data = mysqli_fetch_assoc($results);
    return $data['N'];
}
function count_replys($comment_id){
    global $db;
    $sql = "SELECT COUNT(*) as N FROM reply WHERE   comment_id = " . $comment_id;
    $results = mysqli_query($db, $sql);
    $data = mysqli_fetch_assoc($results);
    return $data['N'];
}