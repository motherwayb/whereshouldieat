<?php 
	$this->load->view('header', [
		'map' => false
	]); 
?>
<div class="modal-content">
	<div class="close-modal" data-dismiss="modal">
		<div class="lr">
			<div class="rl"></div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-lg-10 col-lg-offset-1">
				<div class="modal-body">
					<h1><?php print $restaurant->name ?></h1>
					<?php if (base_url() . '../assets/img/restaurants/' . $restaurant->slug . '.jpg'): ?>
						<img width="100%" alt="A picture of <?php print $restaurant->name ?>, doesnt it look pretty" onerror='this.style.display = "none"' src="<?php print base_url() . 'assets/img/restaurants/' . $restaurant->slug . '.jpg'?>"></img>
					<?php endif; ?>
					<p>
						<br/><b>Food Type: <?php print $restaurant->food_type ?> | 				<input type="button" class="btn-primary" value="Choose somewhere else!" onClick="window.location.href=window.location.href = '../<?php print $restaurant->food_type ?>/?nocache=' + (new Date()).getTime(); //one level up">
</b>
					<ul class="list-inline item-details">
						<li>
							<span>Address:</span>
							<strong><?php print $restaurant->address ?></strong>
						</li>
						<li>
							<span>Rating:</span>
							<div class="rating" stye="display:inline-block">
								<?php for ($i=0;$i<round($restaurant->rating);$i++): ?>
									<span>☆</span>
								<?php endfor; ?>
							</div>
						</li>
						<li>
							<span>Phone:</span>
							<strong><?php print $restaurant->phone_number ?></strong>
						</li>
					</ul>
					<p>	<div class="overlaygooglemaps" onClick="style.pointerEvents='none'"></div>
						<iframe width="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="<?php print $restaurant->map_url ?>&amp;ie=UTF8&amp;output=embed"></iframe>
						<br />
					</p>
					<p>
						<b>Website:</b>
						<a href="<?php print $restaurant->website ?>" target="_blank"><?php print $restaurant->website ?></a>
					</p>
					<p>
						<b>Opening Hours:</b> 
						</br>
						<?php if ($restaurant->opening_hours): ?>
							<?php foreach ($restaurant->opening_hours as $opening_time): ?>
								<?php print $opening_time; ?><br/>
							<?php endforeach; ?>
						<?php endif; ?>
					</p></br>
					<p><?php print $restaurant->name ?> is a place to grab a <?php print $restaurant->food_type ?>. Why not check them out? They have a rating of <?php print $restaurant->rating ?> and you can see the opening times up above. 
				</div>
			</div>
		</div>
	</div>
<!--	<section class="nosuccess" id="whatdowethink">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<h2>What do we think?</h2><br/>
				</div>
			</div>
	</section>
	<section class="whatdowethinkrating" id="whatdowethink">
		<div class="row">
			<div class="col-lg-6 col-lg-offset-0"> 
				<h3>VIDEOS</h3>
			</div>
			<div class="col-lg-6 col-lg-offset-0"> 
				<h3>BRIAN says:</h3></br>
				<h3>PADDY says:</h3></br>
				<h3>PK says:</h3> 	
			</div>			
		</div>
	</section>
</div>-->