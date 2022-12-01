function showBooks (tabName) {
    $.ajax({
        url:"addBook.php",    //the page containing php script
        type: "post",    //request type,
        data: {btype: tabName},
        success:function(data){
            $("#currentTab").html(data);
        }
    });
}