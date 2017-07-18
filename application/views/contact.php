<!-- Contact Section --> 
<section id="contact">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 text-center">
				<h2 class="contact-header-1">Contact Us</h2>
				<h5 class="contact-header-2">GIVE US A SHOUT</h5>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-8 col-lg-offset-2">
				<!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
				<!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently.  -->
				<form name="sentMessage" id="contactForm" novalidate>
					<div class="row control-group">
						<div class="form-group col-xs-12 floating-label-form-group controls">
							<label>Name</label>
							<input type="text" class="form-control" placeholder="Name" id="name" required data-validation-required-message="Please enter your name.">
							<p class="help-block text-danger"></p>
						</div>
					</div>
					<div class="row control-group">
						<div class="form-group col-xs-12 floating-label-form-group controls">
							<label>Email Address</label>
							<input type="email" class="form-control" placeholder="Email Address" id="email" required data-validation-required-message="Please enter your email address.">
							<p class="help-block text-danger"></p>
						</div>
					</div>
					<div class="row control-group">
						<div class="form-group col-xs-12 floating-label-form-group controls">
							<label>Phone Number</label>
							<input type="tel" class="form-control" placeholder="Phone Number" id="phone" required data-validation-required-message="Please enter your phone number.">
							<p class="help-block text-danger"></p>
						</div>
					</div>
					<div class="row control-group">
						<div class="form-group col-xs-12 floating-label-form-group controls">
							<label>Message</label>
							<textarea rows="5" class="form-control" placeholder="Message" id="message" required data-validation-required-message="Please enter a message."></textarea>
							<p class="help-block text-danger"></p>
						</div>
					</div>
					<br>
					<div id="success"></div>
					<div class="row">
						<div class="form-group col-xs-12">
							<button type="submit" class="btn btn-success btn-lg">Send</button>
						</div>
					</div>
				</form>
			</div>
			<div class="col-lg-12 text-center media-icons">
				<a href="https://www.facebook.com/whereshouldieatie/"><img alt="Facebook icon linking to our Facebook page" src="<?php echo base_url() ?>assets/img/social-icons/Facebook-Icon.png"></a>
				<a href="https://twitter.com/WShouldIEatie"><img alt="Twitter icon linking to our Twitter profile" src="<?php echo base_url() ?>assets/img/social-icons/Twitter-Icon.png"></a>
				<a href="https://www.instagram.com/WhereshouldIEatie/"><img alt="Instagram icon linking to our instagram account" src="<?php echo base_url() ?>assets/img/social-icons/Instagram-Icon.png"></a>
				<a href="https://www.youtube.com/channel/UC2frIi8vyyHmJCaGY25_K8A"><img alt="Youtube icon linking to our youtube channel" src="<?php echo base_url() ?>assets/img/social-icons/YouTube-Icon.png"></a>
				<a href="https://plus.google.com/u/0/105988782972634641365"><img alt="Google+ icon linking to our Google+ account" src="<?php echo base_url() ?>assets/img/social-icons/Google-Plus-Icon.png"></a>
			</div>
		</div>
	</div>
</section>
