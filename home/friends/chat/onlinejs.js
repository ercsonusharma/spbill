// JavaScript Document
$(document).ready(function() {
	//alert('jw');
	setInterval(function(){
	
	$.post("/new_sb/sbill/home/friends/chat/online.php",{status:'winopen'},function(data){
		$('#mess').html(data);
		});
	$.post('/new_sb/sbill/home/friends/chat/online.php',{status:'list'},function(data){
		$('#online').html(data);
		});
	},500);
	
	$(window).unload(function(){
		
		$.post('online.php',{status:'winclose'},function(data){
		$('#mess').html(data);
		});
		
		});
		
	//	$(window).mouseout(function(){alert('fds');});
		
    
});
