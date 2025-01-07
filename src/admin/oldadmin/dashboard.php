<?php
include('header.php');
include('slider.php');
?>

<p>
  Time Analize: <span id = "text-date"></span>
</p>
<p>
<select class = "select-date">
    <option value="7days">Last 7 days</option>
    <option value="28days">Last 28 days</option>
    <option value="90days">Last 90 days</option>
    <option value="365days">Last 365 days</option>
  </select>
</p>
<div  id="chart" style="height: 250px;"></div>


</section> 
    </body>
    </html>


<script type="text/javascript">
   	$(document).ready(function(){
   		thongke();
	    var char = new Morris.Area({
		
		  element: 'chart',
		
		  xkey: 'date',
		 
		  ykeys: ['date','order','sales','quantity'],
		
		  labels: ['Date','Order','Revenue','Sell Quantity']
		});
    $('.select-date').change(function(){
            var time = $(this).val();
            if(time=='7days'){
                var text = 'Last 7 days';
            }else if(time=='28days'){
                var text = 'Last 28 days';
            }else if(time=='90days'){
                var text = 'Last 90 days';
            }else{
                var text = 'Last 360 days';
            }

             $.ajax({
                    url:"analise.php",
                    method:"POST",
                    dataType:"JSON",
                    data:{time:time},
                    success:function(data)
                    {
                        char.setData(data);
                        $('#text-date').text(text);
                    }   
                });
        })
		
		 function thongke(){
                var text = 'Last 365 days';
                $('#text-date').text(text);
                $.ajax({
                    url:"analise.php",
                    method:"POST",
                    dataType:"JSON",
                    success:function(data)
                    {
                        char.setData(data);
                        $('#text-date').text(text);
                    }   
                });
            }
	});
    </script>
         
 