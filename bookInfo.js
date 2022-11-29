function change() 
{
    var elem = document.getElementById("add");
    if (elem.value=="Remove This Book From Your Library") elem.value = "Add This Book to Your Library!";
    else elem.value = "Remove This Book From Your Library";
}
