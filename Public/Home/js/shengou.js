		window.onload =function(){

			var a1=$('#a1').text();
			var a2=$('#a2').text();
			var a3=$('#a3').text();
			

			if( a3== ''){
				$('#a3').parent().hide();			
			};
			if( a2== ''){
				$('#a2').parent().hide();			
			}
			if( a1== ''){
				$('#a1').parent().hide();			
			}
		}
 		
 		$('.showon').click(function(e){
 			e.stopPropagation();
 			$('.all').show();
 			$(this).parent().siblings('.pop').show();
 			
 			// var t= $(this).parent().siblings('.single').text();
 			// $(this).parent().siblings('.pop').find('.s-total').text(t);//把单价的值赋给弹窗的总价
 			
 		});
// 		点击申请
 		
 		var v =1
 		$('.add').click(function(e){ 
 			e.stopPropagation();
 			v++;
 			$(this).siblings('.count').val(v);
 			var total=$(this).parent().next().children('.s-total');
 			var single =$(this).parent().parent().siblings('.single').text();
 			var s =v;
 			total.text(s*single);
			 			 			 			
 		})
 		
 		$('.sub').click(function(e){
 			e.stopPropagation();
 			if(v==1){
 				return $(this).siblings('.count').val(1)
 			}
 			v--;
 			$(this).siblings('.count').val(v);
 			var total=$(this).parent().next().children('.s-total');
 			var single =$(this).parent().parent().siblings('.single').text();
 			var s =v;
 			total.text(s*single);			
 		});
 		$('.close').click(function(){
 			$('.all').hide();
 			$(this).parent().hide();
 		})
 		/*$('body').click(function(){
 			$('.all').hide();
 			$('.pop').hide();
 		})*/
 		

 		
 		
 		
 		