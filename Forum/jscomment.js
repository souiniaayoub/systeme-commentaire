/*JavaScript ES6*/

// $("#post-comment button").click(function() {
//     let text = $("#post-comment textarea").val();
//     url = $(this).parent().attr('action');
//   if(text != ''){
//   $.ajax({
//       url: url,
//       type: "POST",
//       data: {
//           comment_text: text,
//           comment_posted: 1
//       },
//       success: function(data){
//           //let response = JSON.parse(data);
//           let response = data;
//           if (data === "error") {
//               alert('There was an error adding comment. Please try again');
//           } else {
//               alert("sfdzef");
//               $('#post-comment textarea').val('');
//               $('#comments-wrapper').append(response.comment);
//               // $('#comments_count').text(response.comments_count);
//           }
//       }
//   });
//   }
// });

function post_comment() {
    $.ajax({
        url: "comment-post-ajax.php",
        type: "POST",
        data: {
            comment_post_text: $("#post-comment form textarea").val(),
        },
        success: function (response) {
            //let response = JSON.parse(data);
            if (response != 'error') {
                $("#comment-wrapper").prepend(response);
                $(document.querySelector(".reply-count")).on('click', (event) => {
                    show_replys_wrapper(event.target);
                });

                /*$(".reply-count").on('click',(event)=>{
                      show_replys_wrapper(event.target);
                  });*/
                // $('#comments_count').text(response.comments_count);
            }
        }
    });
    document.querySelector("#post-comment form").reset();
    $("#cout_comments").text(parseInt($("#cout_comments").text()) + 1);
    return false;
}

function reply_comment(form) {

    $.ajax({
        url: "reply-post-ajax.php",
        type: "POST",
        data: {
            reply_post_text: $(form.querySelector("textarea")).val(),
            comment_id: $(form.querySelector("button")).data('id')
        },
        success: function (response) {
            //let response = JSON.parse(data);
            $(form).parent().prepend(response);
            // $('#comments_count').text(response.comments_count);
        }
    });
    form.reset();
    $(".reply-count[data-comment-id = '" + $(form.querySelector("button")).data('id') + "'] span").text(parseInt($(".reply-count[data-comment-id = '" + $(form.querySelector("button")).data('id') + "'] span").text()) + 1);
    return false;
}

function more_comments() {
    let to  = parseInt($('#comment-wrapper').data('id'));
    $.ajax({
        url: "more-comments-ajax.php",
        type: "POST",
        data: {
            to: to
        },
        success: function (response) {
            $("#comment-wrapper").append(response);
            //// Todo Adding reply event to the 3 new cpmments
            console.log(to);
            const btns = document.querySelectorAll(".reply-count");
            for (let i = to ;i<btns.length ;i++){
                $(btns[i]).on('click', (event) => {
                    show_replys_wrapper(event.target);
                });
            }
            if ($("#cout_comments").text() <= $('#comment-wrapper').data('id') + 3) {
                $('#comment-wrapper').data('id', $("#cout_comments").text() - 3);
                $("#show_more_comments").hide();
            } else {
                $('#comment-wrapper').data('id', parseInt($('#comment-wrapper').data('id')) + 3);
            }
        }
    });
    return false;
}

function more_replys(replys_wrapper) {
    var to = parseInt($(replys_wrapper).data('count-replys'));
    $.ajax({
        url: "more-replys-ajax.php",
        type: "POST",
        data: {
            to: to,
            comment_id: $(replys_wrapper).data('comment-id')
        },
        success: function (response) {

            $(response).insertBefore(replys_wrapper.querySelector(".show_more_replys"));
            if ($(".reply-count[data-comment-id = '" + $(replys_wrapper).data('comment-id') + "'] span").text() <= $(replys_wrapper).data('count-replys') + 3) {
                $(replys_wrapper).data('count-replys', $(".reply-count[data-comment-id = '" + $(replys_wrapper).data('comment-id') + "'] span").text() - 3);
                $(replys_wrapper.querySelector(".show_more_replys")).hide();
            } else {
                $(replys_wrapper).data('count-replys', parseInt($(replys_wrapper).data('count-replys')) + 3);
            }
        }
    });
    return false;
}

$(".reply-count").on('click', (event) => {
    show_replys_wrapper(event.target);
});

function show_replys_wrapper(reply_btn) {
    $.ajax({
        url: "show-replys-ajax.php",
        type: "POST",
        data: {
            comment_id: $(reply_btn).data('comment-id')
        },
        success: function (response) {
            $(".comment[data-comment-id = '" + $(reply_btn).data('comment-id') + "']").append(response);
            $(reply_btn).off('click');
        }
    });
}