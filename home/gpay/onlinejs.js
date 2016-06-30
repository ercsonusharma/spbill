// JavaScript Document
$(document).ready(function() {
	//alert('jw');
	setInterval(function(){
	
	$.post('online.php',{status:'winopen'},function(data){
		$('#mes').html(data);
		});
	$.post('online.php',{status:'list'},function(data){
		$('#frame').html(data);
		});
	},500);
	
	$(window).unload(function(){
		
		$.post('online.php',{status:'winclose'},function(data){
		$('#mes').html(data);
		});
		
		});
		
	//	$(window).mouseout(function(){alert('fds');});
		
    
});
