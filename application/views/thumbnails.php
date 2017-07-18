<section id="portfolio" class="index-body">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 text-center">
				<div class="row">
					<div class="col-lg-12">
						<h1 class="thumb-header-1">WELL, WHAT DO YOU FEEL LIKE?</h1>
						<h5 class="thumb-header-2">PICK A CATEGORY</h5>
						<!-- <form class="input-group" id="form1" method="post">
							<input type="text" class="form-control" name="food-type" placeholder="Search food...">
							<span class="input-group-btn">
							  <button class="btn btn-default" type="submit" id="submit" name="submit">GO!</button>
							</span>
						</form> -->
					</div>
					<!-- <div class="col-lg-3">
						<div class="input-group">
							<span class="input-group-btn">
							  <a href="#portfolioModal" class="portfolio-link" data-toggle="modal">
								<button class="btn btn-default" type="button">Choose for me!</button>
							  </a>
							</span>
						</div>
					</div>
					<div class="col-lg-4">
						<a href="https://www.facebook.com/whereshouldieatie/"><i class="fa fa-facebook-square fa-4x" aria-hidden="true"></i></a>
						<a href="https://twitter.com/WShouldIEatie"><i class="fa fa-twitter-square fa-4x" aria-hidden="true"></i></a>
						<a href="https://www.instagram.com/WhereshouldIEatie/"><i class="fa fa-instagram fa-4x" aria-hidden="true"></i></a>
						<a href="https://www.youtube.com/"><i class="fa fa-youtube-square fa-4x" aria-hidden="true"></i></a>
					</div>
				</div>
				<hr class="star-primary"> -->
			</div>
		</div>
		<!-- This is the code which presents the images for food-->
		<div id="food-thumbnails" class="row">
			<?php $i=1 ?>
			<?php foreach ($groups as $food_type): ?>
				<div>
					<div class="col-sm-3 portfolio-item food-thumbnail">
						<a href="restaurant/<?php echo $food_type ?>" class="portfolio-link food-type-thumbnail hvr-float-shadow" data-toggle="modal" data-type="<?php print $food_type ?>">
							<div class="caption">
								<div class="caption-content">
								</div>
							</div>
						<img src="<?php echo base_url() ?>assets/img/types/<?php print $food_type ?>.jpg" class="img-responsive hidden-xs hidden-sm hidden-md" alt="A thumbnail for the <?php print $food_type ?> food type. Clicking this will show you restaurants for that food type.">
						<img src="<?php echo base_url() ?>assets/img/types/<?php print $food_type ?>-Mobile.jpg" class="img-responsive hidden-lg hidden-xl" alt="A thumbnail for the <?php print $food_type ?> food type. Clicking this will show you restaurants for that food type.">
						</a>
					</div>
				</div>
				<?php $i++ ?>
			<?php endforeach; ?>
		</div>
	</div>
</section> 