function resize() {
	var containerW = $('.rsection').width();
	var innerCount = $('.rcol').length;
	var percentage = ((100 - ((innerCount - 1) * 1.6)) / 100);
	console.log(percentage)
	$('.rcol').css({
	    width: percentage * (containerW / innerCount)
	});
}