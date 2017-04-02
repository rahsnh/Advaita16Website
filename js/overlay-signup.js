function triggersignup() {
	var triggerBttn = document.getElementById( 'trigger-signup' ),
		overlay = document.querySelector( 'div.overlay-signup' ),
		closeBttn = overlay.querySelector( 'button.overlay-close' );
		transEndEventNames = {
			'WebkitTransition': 'webkitTransitionEnd',
			'MozTransition': 'transitionend',
			'OTransition': 'oTransitionEnd',
			'msTransition': 'MSTransitionEnd',
			'transition': 'transitionend'
		},
		transEndEventName = transEndEventNames[ Modernizr.prefixed( 'transition' ) ],
		support = { transitions : Modernizr.csstransitions };
		s = Snap( overlay.querySelector( 'svg' ) ), 
		path = s.select( 'path' ),
		steps = overlay.getAttribute( 'data-steps' ).split(';'),
		stepsTotal = steps.length;

	function toggleOverlay() {
		if( classie.has( overlay, 'open' ) ) {
			var pos = stepsTotal-1;
			classie.remove( overlay, 'open' );
			classie.add( overlay, 'close' );
			
			var onEndTransitionFn = function( ev ) {
					classie.remove( overlay, 'close' );
				},
				nextStep = function( pos ) {
					pos--;
					if( pos < 0 ) return;
					path.animate( { 'path' : steps[pos] }, 60, mina.linear, function() { 
						if( pos === 0 ) {
							onEndTransitionFn();
						}
						nextStep(pos);
					} );
				};

			nextStep(pos);
		}
		else if( !classie.has( overlay, 'close' ) ) {
			var pos = 0;
			classie.add( overlay, 'open' );
			
			var nextStep = function( pos ) {
				pos++;
				if( pos > stepsTotal - 1 ) return;
				path.animate( { 'path' : steps[pos] }, 60, mina.linear, function() { nextStep(pos); } );
			};

			nextStep(pos);
		}
	}

	toggleOverlay();
	closeBttn.addEventListener( 'click', toggleOverlay );
	document.getElementById('danger').style.display = "none";
	document.getElementById('danger2').style.display = "none";
	
	var hidden2 = $('.right-slide');
    var row2 = $('.signup-container');
    var header2 = $('.register-header');
    var footer2 = $('.register-footer');
    var toggle2 = $('.toggle-button');                    
    if (hidden2.hasClass('visible')){
        row2.animate({"left":"0%"}, "slow");
        hidden2.animate({"left":"100%"}, "slow").removeClass('visible');
        header2.html("REGISTRATION DETAILS");
        footer2.html("Already a member:- ");
        toggle2.html("LOGIN");
    }
}