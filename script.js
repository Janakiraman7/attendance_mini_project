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
$(document).ready(function(){
    $("#getbtn").click(function(){
        
            var year = $('#year').val();
            var department = $('#department').val();
            
            $.ajax({
                url:"gettimetable.php",
                type:"POST",
                dataType:"json",
                data:{dept:department,yr:year},
                beforeSend:function(){
                    alert(department);
                },
                success:function(data){

                    if(data['status']=='ok')
                    {
                        alert("data retrived");
                        $('#day').text(data.result.day);
                        $('#one').text(data.result.period1);
                        $('#two').text(data.result.period2); 
                        $('#three').text(data.result.period3);
                        $('#four').text(data.result.period4);
                        $('#five').text(data.result.period5);
                        $('#six').text(data.result.period6);
        
                    }
                }
                
            });
    });
 });
