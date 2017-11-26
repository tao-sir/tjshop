var i= 1
    	$('.add').click(function(){
    		i++
    		$('.s3-btn>span').text(i)
    	});
    	$('.s3-del').click(function(){
    		if(i==0){
    		return	$('.s3-btn>span').text(0)
    		}
    		i--
    		$('.s3-btn>span').text(i)
    	})