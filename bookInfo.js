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
