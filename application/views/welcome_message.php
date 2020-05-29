<!DOCTYPE html>
<html lang="en">
  <head>
    <title>San's-Pizza - Order Online</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nothing+You+Could+Do" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/animate.css">
    
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/owl.theme.default.min.css">

    
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/flaticon.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/icomoon.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
  </head>
  <body>
  	<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
		      <a class="navbar-brand" href="index.html"><span class="flaticon-pizza-1 mr-1"></span>San's<br><small>Pizza</small></a>
		      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
		        <span class="oi oi-menu"></span> Menu
		      </button>
			  <p><button id="main-order-now" class="btn btn-primary btn-sm">Order Now</button></p>
		  </div>
	  </nav>
    <!-- END nav -->
    <section class="home-slider owl-carousel img" style="background-image: url(<?php echo base_url();?>assets/images/bg_3.jpg);">
      <div class="slider-item">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row slider-text align-items-center" data-scrollax-parent="true">
            <div class="col-md-6 col-sm-12 ftco-animate">
            	<span class="subheading">Luscious</span>
              <h1 class="mb-4">Italian Cuizine</h1>
              <p class="mb-4 mb-md-5">Enjoy the delicacy till the edge of the crust</p>              
            </div>
			<div class="col-md-6 ftco-animate">
				<img src="<?php echo base_url();?>assets/images/bg_1.png" class="img-fluid" alt="">
			</div>
          </div>
        </div>
      </div>
    </section>
	<div class="small-chat-box fadeInRight animated">
		<div class="main-content">
		<div id="refresh-chat">
			<input type="hidden" id="chat-state" value="start"/>
			<input type="hidden" id="chat-order-quantity" value=""/>
			<input type="hidden" id="chat-addr" value=""/>
			<input type="hidden" id="chat-pmode" value=""/>
			<div id="chat-box-content" class="content">
				<div class="left">
				<div class="author-name"><span class="flaticon-pizza-1 navbar-brand" style="color:#fac564"></span><small class="chat-date"></small></div>
					<div class="chat-message active">
						Welcome to San's Pizza ordering center, please select an option to proceed.</br></br>
						<h6>1. Place an Order</h6>
						<h6>2. Track order status</h6>
					</div>

				</div>
				
			</div>
		</div>
		</div>
		<div class="form-chat">
			<div class="input-group input-group-sm">
				<input id="chat-box-ip-content" type="text" class="form-control">
				<span class="input-group-btn"><button class="btn btn-primary mr-1" id="chat-box-send-button" type="button">Send</button></span>
				<span class="input-group-btn"><button class="btn btn-success" id="restart-chat" type="button"><i title="Restart the Converstation" class="icon-refresh" ></i></button></span>
			 
			</div>
		</div>
	</div>	
	<div id="small-chat">
		<a class="open-small-chat" href=""><i class="icon-chat"></i></a>
	</div>
  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

  <script src="<?php echo base_url();?>assets/js/jquery-3.2.1.min.js"></script>
  <script src="<?php echo base_url();?>assets/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="<?php echo base_url();?>assets/js/popper.min.js"></script>
  <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url();?>assets/js/jquery.waypoints.min.js"></script>
  <script src="<?php echo base_url();?>assets/js/owl.carousel.min.js"></script>
  <script src="<?php echo base_url();?>assets/js/jquery.slimscroll.min.js"></script>
  <script src="<?php echo base_url();?>assets/js/main.js"></script>
  <script>var Surl="<?php echo site_url()."/"?>";</script>
  </body>
</html>