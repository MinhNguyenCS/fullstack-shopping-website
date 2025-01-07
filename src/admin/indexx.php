<?php
include "header2.php";
include "slider2.php";
?>
       
        <!-- Left navbar-header end -->
        <!-- Page Content -->
        <div id="page-wrapper" style = "margin-top: 20px; background-color: #201f1f;">
            <div class="container-fluid" >
                <div class="row bg-title" style = "margin: 0px 0px 25px 0px; background-color: black; ">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12" >
                        <h4 class="page-title" style = "color: white;">Dashboard</h4>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row" style = "padding-left: 20px;">
            <p style ="margin-left: 20px;">
  Time Analize: <span id = "text-date"></span>
</p>
<p>
<select class = "select-date" style ="margin-left: 20px;" >
    <option value="7days">Last 7 days</option>
    <option value="28days">Last 28 days</option>
    <option value="90days">Last 90 days</option>
    <option value="365days">Last 365 days</option>
  </select>
</p>
<div  id="chart" style="height: 250px; margin-right: 50px; margin-left: 20px;"></div>


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
            </div>
        </div>
       
        

<?php
include "footer2.php";
?>