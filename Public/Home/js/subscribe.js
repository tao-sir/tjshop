$('.arrow').click(function(){
 			$('.subnav').toggle();
 		});
 		$('.home1').click(function(){
 			$('.all').show()
 			$('.popup').show() 	
 		});
 		$('.home2').click(function(){
 			$('.all').show()
 			$('.popup').show() 	
 		});
 		$('#sure').click(function(){
 			$('.all').hide()
 			$('.popup').hide()
 		});
 		$('.showon').click(function(){
 			$('.all').show()
 			$('.popup2').show() 
 		});
 		$('#sure2').click(function(){
 			$('.all').hide()
 			$('.popup2').hide()
 		});
 		var v = $('#count').val();
 		$('#add').click(function(){
 			v++;
 			$('#count').val(v);
 			
 			
 		})
 		$('#sub').click(function(){
 			if(v == 1){
 				return $('#count').val(1);
 			}
 			v--
 			$('#count').val(v);
 		});
 		
 		