$(function() {
	'use strict';
	$('[placeholder]').focus(function(){
		$(this).attr('data-text',$(this).attr('placeholder'));
		$(this).attr('placeholder','');
	}).blur(function(){
		$(this).attr('placeholder', $(this).attr('data-text'));

	});
	//add asterisk
	$('input').each(function(){
		if($(this).attr('required') === 'required'){
		$(this).after('<span class="asterisk">*</span>');
	}
	});
	if($("#order").text().length == 23)
	{
		$("#order").hide();
		$(".order").hide();
	}
	if($("#hall").text().length == 23)
	{
		$("#hall").hide();
		$(".hall").hide();
	}
	if($("#travel").text().length == 23)
	{
		$("#travel").hide();
		$(".travel").hide();
	}		

});