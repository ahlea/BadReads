function addBook (title, btype) {
    $.ajax({
        url:"add.php",    //the page containing php script
        type: "POST",    //request type,
        data: {title: title, btype: btype},
        success:function(data){
            $("#addBook").html(data);
        }
    });
}
function delBook (ttl) {
    $.ajax({
        url:"del.php",    //the page containing php script
        type: "post",    //request type,
        data: {ttl: ttl},
        success:function(data){
            $("#addBook").html(data);
        }
    });
}
function rate (title) {
    $.ajax({
        url:"rating.php",    //the page containing php script
        type: "post",    //request type,
        data: {title: title},
        success:function(data){
            $("#rating").html(data);
        }
    });
}
function cmt(title) {
    $.ajax({
        url:"comment.php",    //the page containing php script
        type: "post",    //request type,
        data: {title: title},
        success:function(data){
            $("#cmtList").html(data);
        }
    });
}


