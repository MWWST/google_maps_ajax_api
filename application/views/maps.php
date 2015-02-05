<?php

 ?>

 <html>
 <head>
 	<title>Get Directions</title>
 	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">
 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
 	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
 	<script> 
 	$(document).ready(function(){
 		// alert('test');
 		
 		$('form').submit(function() {
 		var direction_data = $("form").serialize();
			// console.log(weatherdata);	
 			$.ajax({
 				type:'post',
 				url: "/directions/get", 
 				data: direction_data,
				dataType: 'json',
 				success: function(go){
 				var newdata =go;
 					console.log(newdata);	
 				$("#directions").append("<h2>Directions From:" + newdata.routes[0].legs[0].start_address + " To: " + newdata.routes[0].legs[0].end_address+"</h2>");
 				for (var i=1;i< newdata.routes[0].legs[0].steps.length+1;i++){ 
 				$("#directions").append("<h3>"+i +  " . " + newdata.routes[0].legs[0].steps[i].html_instructions + "</h3><br>");
 				}
 				
			}

	 	});
 			
 			// .done(function(data) {
 			// 	console.log(data);
 			// });
 			return false;

 	});
 			
});

 	</script>

 </head>
 <body>

 	<div class="container">
 		<h2>Get Directions</h2>
 		<form class="form-horizontal" method ="">
  <div class="form-group">
    <div class="col-sm-5">
      <input type="text" class="form-control" id="from" name="origin" placeholder="From" value="San Francisco">
    </div>
    
    <div class="col-sm-5">
      <input type="text" class="form-control" id="to"  name="destination" placeholder="To" value="San Jose">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-success">Get Directions</button>
      <input type="hidden" name="get_directions" value="get_directions">
    </div>
  </div>
</form>
	<div id="directions" class="row">
		</div>
 	</div>
 
 </body>
 </html>
