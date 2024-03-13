git remote add origin url<html>
    <body>
    	<div class="row">
    		<div class="col-md-6">
    			<form action="" method="POST">
    				<b>Enter Vehical Number: </b>
    				<input type="text" name="vehical_no" id="vehical_no" placeholder="Vehical Number" required>
    				<input type="submit" class="btn btn-sm btn-primary" name="search_vehical" value="Search">
    			</form>
    		</div>
    	</div>

    	<div class="row">
    		<div class="col-md-7" id="searchresult">
    			
    		</div>
    	</div>
    <script type="text/javascript">
    	$(document).ready(function(){
    		$("#vehical_no").keyup(function(){
    			var input = $(this).val();
    			// alert(input);
    			if(input!= ""){
    				$.ajax({
    					url:"search_for_history.php",
    					method:"POST",
    					data:{input:input},

    					success:function(data){
    						$("#searchresult").html(data);
    					}
    				});
    			}
    			else{
    				$("$searchresult").css("display","none");
    			}
    		});
    	});
    </script>  
    </body>
</html>