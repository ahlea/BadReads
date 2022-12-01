function addBook (title, btype) {
    $.ajax({
        url:"add.php",    //the page containing php script
        type: "post",    //request type,
        data: {title: title, btype: btype},
        success:function(data){
            $("#addBook").html(data);
        }
    });
}
