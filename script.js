function add()
{
    document.getElementById("recordform").action="add.php";
    document.getElementById("add").style="background-color:green";
}
function deleterecord()
{
    document.getElementById("recordform").action="delete.php";
    document.getElementById("delete").style="background-color:green";
}
function message{
    alert("sucessfull!");
}