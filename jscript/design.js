

$(function(){
	var options = {
			pixelSize: 10, 
			stepDelay: 40, 
			horizontalPixelsCount:5,
			verticalPixelsCount:5,
			pixelRatio: 0.8,
			runImmidiatly: false
		};
	$('.crl').leddisplay(options);
	
	$('.crl').find('div').click(function(){
		if ($(this).css('background-color') == 'rgb(255, 0, 0)')
			$(this).css('background-color', "#404040")
		else
			$(this).css('background-color', 'red')

	});
})