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
                
            
                success:function(data){

                    if(data['status']=='ok')
                    {
                        document.getElementById("hidetable").style.display="block";
                        $('#m').text(data.result1.day);
                        $('#m1').text(data.result1.period1);
                        $('#m2').text(data.result1.period2); 
                        $('#m3').text(data.result1.period3);
                        $('#m4').text(data.result1.period4);
                        $('#m5').text(data.result1.period5);
                        $('#m6').text(data.result1.period6);
                        $('#t').text(data.result2.day);
                        $('#t1').text(data.result2.period1);
                        $('#t2').text(data.result2.period2); 
                        $('#t3').text(data.result2.period3);
                        $('#t4').text(data.result2.period4);
                        $('#t5').text(data.result2.period5);
                        $('#t6').text(data.result2.period6);
        
                    }
                }
                
            });
    });
 });
