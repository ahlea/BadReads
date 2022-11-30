function addBook (title) {
    $.ajax({
        url:"add.php",    //the page containing php script
        type: "post",    //request type,
        data: {title: title},
        success:function(data){
            $("#addBook").text(data);
        }
    });
}
