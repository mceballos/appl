if (typeof RTOOLBAR == 'undefined') var RTOOLBAR = {};

RTOOLBAR['mini'] = {	
	bold:
	{
		title: RLANG.bold,
		exec: 'bold'
	}, 
	italic: 
	{
		title: RLANG.italic,
		exec: 'italic',
		separator: true		
	},
	insertunorderedlist:
	{
		title: '&bull; ' + RLANG.unorderedlist,
		exec: 'insertunorderedlist'
	},
	insertorderedlist: 
	{
		title: '1. ' + RLANG.orderedlist,
		exec: 'insertorderedlist'
	},
	fontcolor:
	{
		title: RLANG.fontcolor, 
		func: 'show'
	},	
	backcolor:
	{
		title: RLANG.backcolor, 
		func: 'show',
		separator: true		
	},
	justifyleft:
	{	
		exec: 'JustifyLeft', 
		name: 'JustifyLeft', 
		title: RLANG.align_left
	},					
	justifycenter:
	{
		exec: 'JustifyCenter', 
		name: 'JustifyCenter', 
		title: RLANG.align_center
	},
	justifyright: 
	{
		exec: 'JustifyRight', 
		name: 'JustifyRight', 
		title: RLANG.align_right
	},	
	justify: 
	{
		exec: 'justifyfull', 
		name: 'justifyfull', 
		title: RLANG.align_justify, separator: true
	}
};