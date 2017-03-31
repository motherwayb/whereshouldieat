<?php 
	$this->load->view('header') 
?>
<section id="portfolio" class="index-body">
    <!-- The element that will contain our Google Map. This is used in both the Javascript and CSS above. -->
	<div class="container">
	<!-- Portfolio Grid Section -->
		<div class="row">
			<div class="col-lg-12 text-center">
				<!--<h2>What to eat?</h2>--></br>
				<div class="row">
					<div class="col-lg-5">
						<form class="input-group" id="form1" method="post">
							<input type="text" class="form-control" name="food-type" placeholder="Search food...">
							<span class="input-group-btn">
							  <button class="btn btn-default" type="submit" id="submit" name="submit">GO!</button>
							</span>
						</form><!-- /input-group -->
					</div><!-- /.col-lg-4 -->
					<div class="col-lg-3">
						<div class="input-group">
							<span class="input-group-btn">
							  <a href="#portfolioModal" class="portfolio-link" data-toggle="modal">
								<button class="btn btn-default" type="button">Choose for me!</button>
							  </a>
							</span>
						</div><!-- /input-group -->
					</div><!-- /.col-lg-4 -->
					<div class="col-lg-4">
						<a href="https://www.facebook.com/whereshouldieatie/"><i class="fa fa-facebook-square fa-4x" aria-hidden="true"></i></a>
						<a href="https://twitter.com/WShouldIEatie"><i class="fa fa-twitter-square fa-4x" aria-hidden="true"></i></a>
						<a href="https://www.instagram.com/WhereshouldIEatie/"><i class="fa fa-instagram fa-4x" aria-hidden="true"></i></a>
						<a href="https://www.youtube.com/"><i class="fa fa-youtube-square fa-4x" aria-hidden="true"></i></a>
					</div><!-- /.col-lg-3 -->
				</div><!-- /.row -->
				<hr class="star-primary">
			</div>
		</div>
		<!-- This is the code which presents the images for food-->
		<div id="food-thumbnails" class="row">
			<?php $i=1 ?>
			<?php foreach ($groups as $food_type): ?>
				<div>
					<div class="col-sm-4 portfolio-item">
						<a href="index.php/restaurant/<?php echo $food_type ?>" class="portfolio-link food-type-thumbnail" data-toggle="modal" data-type="<?php print $food_type ?>">
							<div class="caption">
								<div class="caption-content">
									<i class="fa fa-search-plus fa-3x"></i>
								</div>
							</div>
						<img src="<?php echo base_url() ?>assets/img/types/<?php print $food_type ?>.jpg" class="img-responsive" alt="">
						</a>
					</div>
				</div>
				<?php $i++ ?>
			<?php endforeach; ?>
		</div>
	</div>
</section>    
<!-- About Section -->
<section class="success" id="about">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 text-center">
				<h2>About Us</h3></br>
				</div>
		</div>
		<div class="row">
			<div class="col-lg-6 col-lg-offset-0"> <h3>You know those moments where you just can’t seem to decide where to eat? You’ve argued for hours - either with your mates, your girlfriend, or maybe even by yourself - and yet, you still can’t decide which restaurant you should go to for a bit of grub.</h3>
			</div>
			
			<div class="col-lg-6 col-lg-offset-0"> <h3>At WhereShouldIEat.ie, we’re all about answering that vital question: Where should I eat? Of all the many restaurants in Dublin, we know how hard it can be to pick just one. That’s why we’re taking the effort out of deciding where to go for food.</h3> 	
			</div></br>
			
			<div class="col-lg-12 col-lg-offset-0" align="Center"> <h3>With WhereShouldIEat.ie, we do the thinking for you. All you have to do is tell us what sort of food you’re feeling (and maybe give us some extra details on what you’re looking for, if you’re feeling picky), and we’ll recommend a food place for you to visit. It’s that simple.</h3>
			<br> 
			<h3>Give it a go today and find out where you should eat!</h3> 	
			</div>
			
			
		</div>
	</div>
</section>
<?php 
	$this->load->view('contact') 
?>

<!-- Footer -->
<footer class="text-center">
	<div class="footer-below">
		<div class="container">
			<div class="row">
				<div class="col-lg-4">Copyright &copy; WhereShouldIEat.ie</div>
				<div class="col-lg-4">JOBS | CONTACT US | FAQ</div>
				</div>
			</div>
		</div>
	</div>
</footer>

<!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
<div class="scroll-top page-scroll visible-xs visible-sm">
	<a class="btn btn-primary" href="#page-top">
		<i class="fa fa-chevron-up"></i>
	</a>
</div>

<div class="portfolio-modal modal fade" id="portfolioModalSearch" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-content">
		<div class="close-modal" data-dismiss="modal">
			<div class="lr">
				<div class="rl"></div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2">
					<div class="search-modal-body">
						<h2 id="search-business-name"></h2>
						<hr class="star-primary">
						<p>
							<b>Food Type: <span id="search-food-type"></span></b>
						</p>
						<ul class="list-inline item-details">
							<li>
								Address:
								<strong id="search-address"><?php print $businesses[$food_type][$random_business_id]['address'] ?></strong>
							</li>
							<li>
								Rating:
								<div id="search-rating"class="rating" stye="display:inline-block"></div>
							</li>
							<li>
								Phone:
								<strong id="search-phone"><?php print $businesses[$food_type][$random_business_id]['phone'] ?></strong>
							</li>
						</ul>
						<p>
							<iframe id="search-map" width="640" height="480" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="#"></iframe>
							<br />
						</p>
						<p>
							<b>Website:</b>
							<a id="search-website" href="#" target="_blank"></a>
						</p>
					</div>
					<p>
						<b>Opening Hours:</b>
						</br>
						<p id="search-opening-hours"></p>
					</p>
					<div id="google-map-results"></div>
						<button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php require_once(__DIR__ . '/footer.php') ?>

