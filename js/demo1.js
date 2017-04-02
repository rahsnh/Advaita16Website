(function(){

	var button = document.getElementById('cn-button'),
    wrapper = document.getElementById('cn-wrapper'),
    overlay = document.getElementById('cn-overlay');
    var span = document.getElementById('zipun');
	//open and close menu when the button is clicked
	var open = false;
	button.addEventListener('click', handler, false);
	wrapper.addEventListener('click', cnhandle, false);

	function cnhandle(e){
		e.stopPropagation();
	}

	function handler(e){
		if (!e) var e = window.event;
	 	e.stopPropagation();//so that it doesn't trigger click event on document

	  	if(!open){
	    	openNav();
	  	}
	 	else{
	    	closeNav();
	  	}
	}
	function openNav(){
		open = true;
	    
	    classie.add(span,'glyphicon-chevron-down');
	    classie.add(overlay, 'on-overlay');
	    classie.add(wrapper, 'opened-nav');
	}
	function closeNav(){
		open = false;
		
		classie.remove(span,'glyphicon-chevron-down');
		classie.remove(overlay, 'on-overlay');
		classie.remove(wrapper, 'opened-nav');
	}
	document.addEventListener('click', closeNav);

})();

