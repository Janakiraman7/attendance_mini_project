$(document).ready(function(){

            $.ajax({
                url:"gettimetable.php",
                dataType:"json",
                success:function(data){

                    if(data['status']=='ok')
                    {
                       
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
                        $('#W').text(data.result3.day);
                        $('#W1').text(data.result3.period1);
                        $('#W2').text(data.result3.period2); 
                        $('#W3').text(data.result3.period3);
                        $('#W4').text(data.result3.period4);
                        $('#W5').text(data.result3.period5);
                        $('#W6').text(data.result3.period6);
                        $('#th').text(data.result4.day);
                        $('#th1').text(data.result4.period1);
                        $('#th2').text(data.result4.period2); 
                        $('#th3').text(data.result4.period3);
                        $('#th4').text(data.result4.period4);
                        $('#th5').text(data.result4.period5);
                        $('#th6').text(data.result4.period6);
                        $('#f').text(data.result5.day);
                        $('#f1').text(data.result5.period1);
                        $('#f2').text(data.result5.period2); 
                        $('#f3').text(data.result5.period3);
                        $('#f4').text(data.result5.period4);
                        $('#f5').text(data.result5.period5);
                        $('#f6').text(data.result5.period6);
        
                    }
                }
                
            });


            


 });
 
 