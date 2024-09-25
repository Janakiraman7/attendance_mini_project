function add()
{
    document.getElementById("recordform").action="add.php";
   
}
function deleterecord()
{
    document.getElementById("recordform").action="delete.php";
}
function updaterecord()
{
    document.getElementById("recordform").action="update.php";
}
function gettimetable(){
    var year=$('#year').val();
    var dept=$('#ydepartment').val();
    $.ajax({
        url:"getattendance.php",
        type:"post",
        datType:"json",
        data:{dapartment:dept,year:year},
        success:function(data){
            if(data.status=='ok')
            {
                $('#day').text(data.result.day);
                $('#one').text(data.result.day);
                $('#two').text(data.result.day); 
                $('#three').text(data.result.day);
                $('#four').text(data.result.day);
                $('#five').text(data.result.day);
                $('#six').text(data.result.day);

            }
        }
        
    });
}