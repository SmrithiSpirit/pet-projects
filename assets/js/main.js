	// loader
	var loader = function() {
		setTimeout(function() { 
			if($('#ftco-loader').length > 0){
				$('#ftco-loader').removeClass('show');
			}
		}, 1);
	};
	loader();

	var carousel = function() {
		$('.home-slider').owlCarousel({
	    loop:true,
	    autoplay: true,
	    margin:0,
	    animateOut: 'fadeOut',
	    animateIn: 'fadeIn',
	    nav:false,
	    autoplayHoverPause: false,
	    items: 1,
	    navText : ["<span class='ion-md-arrow-back'></span>","<span class='ion-chevron-right'></span>"],
	    responsive:{
	      0:{
	        items:1,
	        nav:false
	      },
	      600:{
	        items:1,
	        nav:false
	      },
	      1000:{
	        items:1,
	        nav:false
	      }
	    }
		});
		$('.carousel-work').owlCarousel({
			autoplay: true,
			center: true,
			loop: true,
			items:1,
			margin: 30,
			stagePadding:0,
			nav: true,
			navText: ['<span class="ion-ios-arrow-back">', '<span class="ion-ios-arrow-forward">'],
			responsive:{
				0:{
					items: 1,
					stagePadding: 0
				},
				600:{
					items: 2,
					stagePadding: 50
				},
				1000:{
					items: 3,
					stagePadding: 100
				}
			}
		});

	};
	carousel();

	var contentWayPoint = function() {
		var i = 0;
		$('.ftco-animate').waypoint( function( direction ) {

			if( direction === 'down' && !$(this.element).hasClass('ftco-animated') ) {
				
				i++;

				$(this.element).addClass('item-animate');
				setTimeout(function(){

					$('body .ftco-animate.item-animate').each(function(k){
						var el = $(this);
						setTimeout( function () {
							var effect = el.data('animate-effect');
							if ( effect === 'fadeIn') {
								el.addClass('fadeIn ftco-animated');
							} else if ( effect === 'fadeInLeft') {
								el.addClass('fadeInLeft ftco-animated');
							} else if ( effect === 'fadeInRight') {
								el.addClass('fadeInRight ftco-animated');
							} else {
								el.addClass('fadeInUp ftco-animated');
							}
							el.removeClass('item-animate');
						},  k * 50, 'easeInOutExpo' );
					});
					
				}, 100);
				
			}

		} , { offset: '95%' } );
	};
	contentWayPoint();

	//Main order box
	$('#main-order-now').click(function () {
		$('.open-small-chat').click();
	});

	//small chat box
    // Open close small chat
    $('.open-small-chat').on('click', function (e) {
        e.preventDefault();
        $(this).children().toggleClass('icon-chat').toggleClass('icon-close');
        $('.small-chat-box').toggleClass('active');
    });

    // Initialize slimscroll for small chat
    $('.small-chat-box .main-content').slimScroll({
        height: '560px',
        railOpacity: 0.4,
		start: 'bottom'
    });

	//to restart the chat
	$('#restart-chat').click( function () {
		var target='#refresh-chat';
		$(target).load(location.href +" "+target+">*");
 
	});	
	
	// to send required information from chat text box
	$('#chat-box-send-button').click( function () {	
	var data=$('#chat-box-ip-content').val(); //fetch the entered value
	var state=$('#chat-state').val();
	var quan=$('#chat-order-quantity').val();
	var addr=$('#chat-addr').val();
	var pmode=$('#chat-pmode').val();
	
	if(data.trim()!=""){
		$("#chat-box-ip-content").val('');
		$("#chat-box-content").append('<div class="right"><div class="author-name">You<small class="chat-date"><?php echo date("h:i a"); ?></small></div><div class="chat-message">'+data+'</div></div>');
		$('.small-chat-box .main-content').slimScroll({ scrollTo: $("#chat-box-content").height()+500 });
		
		//to set the quantity in hidden variable since sessions are not used
		if(state=='order' && $.isNumeric(data))
		{
			$('#chat-order-quantity').val(data);
		}
		if(state=='addr' && !$.isNumeric(data))
		{
			$('#chat-addr').val(data);
		}
		if(state=='pmode' && $.isNumeric(data))
		{
			$('#chat-pmode').val('cod');
		}
		
		$.ajax({
			type: "POST",
			url: Surl+"welcome/chat",
			data: {input:data,state:state,quan:quan,addr:addr,pmode:pmode},
			success: function(data) {
				console.log(data);
				if(data=="fail"){
					var target='#refresh-chat';$(target).load(location.href +" "+target+">*");
					setTimeout(function() { $('.small-chat-box').children('.main-content').slimScroll({height: '560px',railOpacity: 0.4,start: 'bottom'}); }, 100);
				}
				if($('#chat-state').val()=='auth' || $('#chat-state').val()=='track'){	
					$("#chat-box-content").append(data);
					$('#chat-state').val('complete');
					$('.small-chat-box .main-content').slimScroll({ scrollTo: $("#chat-box-content").height()+560 });
				}
				else{
					if(data=="order"){
						$("#chat-box-content").append('<div class="left"><div class="author-name"><span class="flaticon-pizza-1 navbar-brand" style="color:#fac564"></span><small class="chat-date"></small></div><div class="chat-message active">Please mention the number of pizzas you want to order.(Each pizza cost Rs.150/-)</div></div>');
						$('#chat-state').val('order');
						$('.small-chat-box .main-content').slimScroll({ scrollTo: $("#chat-box-content").height()+500 });
					}
					if(data=="addr"){
						var quan =$('#chat-order-quantity').val();
						var price= quan*150;
						$("#chat-box-content").append('<div class="left"><div class="author-name"><span class="flaticon-pizza-1 navbar-brand" style="color:#fac564"></span><small class="chat-date"></small></div><div class="chat-message active">Total price for '+quan+' pizzas is Rs.'+price+'/- <br> Please provide your complete address</div></div>');
						$('#chat-state').val('addr');
						$('.small-chat-box .main-content').slimScroll({ scrollTo: $("#chat-box-content").height()+500 });
					}
					if(data=="pmode"){
						$("#chat-box-content").append('<div class="left"><div class="author-name"><span class="flaticon-pizza-1 navbar-brand" style="color:#fac564"></span><small class="chat-date"></small></div><div class="chat-message active">Please choose the payment mode</br></br><h6>1. Cash on Delivery</h6></div></div>');
						$('#chat-state').val('pmode');
						$('.small-chat-box .main-content').slimScroll({ scrollTo: $("#chat-box-content").height()+500 });
					}
					if(data=="confirm"){
						$("#chat-box-content").append('<div class="left"><div class="author-name"><span class="flaticon-pizza-1 navbar-brand" style="color:#fac564"></span><small class="chat-date"></small></div><div class="chat-message active">Please confirm your details</br></br>Quantity: Pizza X '+$('#chat-order-quantity').val()+'</br>Price: Rs.'+$('#chat-order-quantity').val()*150+'/-</br>Address: '+$('#chat-addr').val()+'</br>Payment Mode: '+$('#chat-pmode').val()+'</br></br><h6>1. Place an order</h6><h6>2. Cancel order</h6></div></div>');
						$('#chat-state').val('auth');
						$('.small-chat-box .main-content').slimScroll({ scrollTo: $("#chat-box-content").height()+500 });
					}
					if(data=="track"){
						$("#chat-box-content").append('<div class="left"><div class="author-name"><span class="flaticon-pizza-1 navbar-brand" style="color:#fac564"></span><small class="chat-date"></small></div><div class="chat-message active">Please Enter your order number</div></div>');
						$('#chat-state').val('track');
						$('.small-chat-box .main-content').slimScroll({ scrollTo: $("#chat-box-content").height()+500 });
					}
					if(data=="num"){
						$("#chat-box-content").append('<div class="left"><div class="author-name"><span class="flaticon-pizza-1 navbar-brand" style="color:#fac564"></span><small class="chat-date"></small></div><div class="chat-message active">Please enter numeric value only!</div></div>');
						$('.small-chat-box .main-content').slimScroll({ scrollTo: $("#chat-box-content").height()+500 });
					}
					if(data=="txtonly"){
						$("#chat-box-content").append('<div class="left"><div class="author-name"><span class="flaticon-pizza-1 navbar-brand" style="color:#fac564"></span><small class="chat-date"></small></div><div class="chat-message active">Please enter Your residential address</div></div>');
						$('.small-chat-box .main-content').slimScroll({ scrollTo: $("#chat-box-content").height()+500 });
					}
					if(data=="restart"){
						$("#chat-box-content").append('<div class="left"><div class="author-name"><span class="flaticon-pizza-1 navbar-brand" style="color:#fac564"></span><small class="chat-date"></small></div><div class="chat-message active">Please Restart the chat </div></div>');
						$('.small-chat-box .main-content').slimScroll({ scrollTo: $("#chat-box-content").height()+500 });
					}
					if(data=="invalid"){
						$("#chat-box-content").append('<div class="left"><div class="author-name"><span class="flaticon-pizza-1 navbar-brand" style="color:#fac564"></span><small class="chat-date"></small></div><div class="chat-message active">Invalid option, Please type in the correct option</div></div>');
						$('.small-chat-box .main-content').slimScroll({ scrollTo: $("#chat-box-content").height()+500 });
					}
				}
			}
		});
	}
	else{
		alert('Please enter a value');
	}
});

